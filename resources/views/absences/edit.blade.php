@extends('layouts.master')

@section('title', 'Editer etudiant')

@section('page-title')
	<h1 class="page-title"><i class="fe fe-user-edit"></i> Editer etudiant</h1>
	<a href="{{ route('student.index') }}" class="btn btn-success ml-auto"><i class="fe fe-user"></i> liste des etudiants</a>
@endsection

@section('content')
<div class="card">
	<div class="card-status bg-blue"></div>
	<div class="card-header">
		<h3 class="card-title">Editer l'etudiant</h3>
	</div>
	<form method="post" action="{{ route('student.update', $student->id) }}">
		<div class="card-body">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Nom</label>
						<input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Nom" value="{{ old('last_name', $student->first_name) }}" required autofocus />
						@if ($errors->has('last_name'))
							<div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Prénom</label>
						<input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="Prénom" value="{{ old('first_name', $student->last_name) }}" required autofocus />
						@if ($errors->has('first_name'))
							<div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">E-mail</label>
						<input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email', $student->email) }}" required autofocus />
						@if ($errors->has('email'))
							<div class="invalid-feedback">{{ $errors->first('email') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Telephone</label>
						<input type="text" name="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" placeholder="Telephone" value="{{ old('tel', $student->tel) }}" required autofocus />
						@if ($errors->has('tel'))
							<div class="invalid-feedback">{{ $errors->first('tel') }}</div>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Filière</label>
                        <select name="branch_id" id="select-beast" class="form-control custom-select{{ $errors->has('tel') ? ' is-invalid' : '' }}">
                          @foreach ($branches as $branch)
                          	<option {!! old('branch_id', $student->branch_id) == $branch->id ? "selected" : '' !!} value="{{ $branch->id }}">{{ $branch->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('branch_id'))
							<div class="invalid-feedback">{{ $errors->first('branch_id') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Groupe</label>
                        <select name="group_id" id="select-beast" class="form-control custom-select{{ $errors->has('tel') ? ' is-invalid' : '' }}">
                          @foreach ($groupes as $group)
                          	<option {!! old('group_id', $student->group_id) == $group->id ? "selected" : '' !!} value="{{ $group->id }}">{{ $group->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('group_id'))
							<div class="invalid-feedback">{{ $errors->first('group_id') }}</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<a href="javascript:void(0)" class="btn btn-warning ml-auto">Cancel</a>
			<button type="submit" class="btn btn-success ml-auto"><i class="fe fe-edit"></i> Moifier</button>
		</div>
	</form>
</div>
@endsection