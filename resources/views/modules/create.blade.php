@extends('layouts.master')

@section('title', 'Nouveau module')

@section('page-title')
	<h1 class="page-title"><i class="fe fe-box"></i> Nouveau module</h1>
	<a href="{{ route('module.index') }}" class="btn btn-success ml-auto"><i class="fe fe-box"></i> liste des modules</a>
@endsection

@section('content')
	<div class="card">
		<div class="card-status bg-blue"></div>
		<div class="card-header">
			<h3 class="card-title">Ajouter nouveau module</h3>
		</div>
		<form method="post" action="{{ route('module.store') }}">
			<div class="card-body">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label">Filière</label>
							<select name="branch_id" id="select-beast" class="form-control custom-select{{ $errors->has('tel') ? ' is-invalid' : '' }}">
								@foreach ($branches as $branch)
								<option {!! old('branch_id') == $branch->id ? "selected" : '' !!} value="{{ $branch->id }}">{{ $branch->name }}</option>
								@endforeach
							</select>
							@if ($errors->has('branch_id'))
							<div class="invalid-feedback">{{ $errors->first('branch_id') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label">Nom du module</label>
							<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom du module" value="{{ old('name') }}" required autofocus />
							@if ($errors->has('name'))
							<div class="invalid-feedback">{{ $errors->first('name') }}</div>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Description</label>
					<textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Nom du module">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
						<div class="invalid-feedback">{{ $errors->first('description') }}</div>
					@endif
				</div>
				<br>
				<h3 class="border-bottom-gray">Elements de module <button id="addItem" class="btn add-more btn-primary float-right" type="button"><i class="fa fa-plus"></i></button></h3>
				<div id="module_itemes">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label">Nom element</label>
								<input type="text" name="name_item[]" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nom du module" value="{{ old('name') }}" required autofocus />
								@if ($errors->has('name'))
									<div class="invalid-feedback">{{ $errors->first('name') }}</div>
								@endif
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="form-label">Decription element</label>
								<input type="text" name="description_item[]" class="form-control {{ $errors->has('description_item') ? ' is-invalid' : '' }}" placeholder="Nom du module" value="{{ old('description_item') }}" required autofocus />
								@if ($errors->has('description_item'))
									<div class="invalid-feedback">{{ $errors->first('description_item') }}</div>
								@endif
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<button style="margin-top: 27px;" type="button" class="deleteItem btn btn-danger btn-block"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<a href="javascript:void(0)" class="btn btn-warning ml-auto">Cancel</a>
				<button type="submit" class="btn btn-primary ml-auto">Enregitster</button>
			</div>
		</form>
	</div>
@endsection

@section('scriptes')
	<script type="text/javascript">
		$(document).ready(function() {
			// when the Add Field button is clicked
			$("#addItem").click(function(e) {
				//Append a new row of code to the "#items" div
				$("#module_itemes").append(
					`<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label">Nom element</label>
								<input type="text" name="name_item[]" class="form-control" placeholder="Nom element" required autofocus />
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label class="form-label">Decription element</label>
								<input type="text" name="description_item[]" class="form-control" placeholder="description element" required />
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<button style="margin-top: 27px;" type="button" class="deleteItem btn btn-danger btn-block"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</div>`
				);
			});

			$('body').on("click", ".deleteItem", function(e) {
				console.log("Test");
				$(this).parent().parent().parent().remove();
			});
		});
	</script>
@endsection