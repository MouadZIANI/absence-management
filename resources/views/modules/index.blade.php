@extends('layouts.master')

@section('title', 'Liste des modules')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-user"></i> modules</h1> 
	<a href="{{ route('module.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-user-plus"></i> Nouveau module</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Modules</h3>
	</div>
	<div class="table-responsive">
		<table class="table card-table table-hover table-outline table-vcenter table-striped table-bordered">
			<thead>
				<tr>
					<th class="w-1">No.</th>
					<th>Nom</th>
					<th>Desciption</th>
					<th>Filiere</th>
					<th>Departement</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($modules as $module)
					<tr>
						<td class="w-1">{{ $module->id }}</td>
						<td>{{ $module->name }}</td>
						<td>{{ substr($module->description, 0, 50) }}</td>
						<td>{{ $module->branch->name }}</td>
						<td>{{ $module->branch->department->name }}</td>
						<td>
							<a href="{{ route('module.edit', $module->id) }}" class="btn btn-outline-success btn-sm">
								Editer
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('module.destroy', $module->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
							</form>
							<a href="{{ route('module.show', $module->id) }}" class="btn btn-outline-info btn-sm">
								Détails
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		{!! $modules->links() !!}
	</div>
</div>
@endsection