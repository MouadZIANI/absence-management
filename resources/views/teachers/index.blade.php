@extends('layouts.master')

@section('title', 'Liste des enseignants')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-user"></i> Enseignants</h1> 
	<a href="{{ route('teacher.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-user-plus"></i> Nouveau enseignants</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Enseignants</h3>
		<div class="card-options">
			<form class="input-icon my-3 my-lg-0" action="{{ route('teacher.searche') }}" method="post">
				@csrf
				<input type="search" class="form-control input-searche-card header-search" placeholder="Search…" tabindex="1" name="searched_query">
				<div class="input-icon-addon">
					<i class="fe fe-search"></i>
				</div>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table card-table table-hover table-outline table-vcenter table-striped table-bordered">
			<thead>
				<tr>
					<th class="w-1">No.</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Departement</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($teachers as $teacher)
					<tr>
						<td class="w-1">{{ $teacher->id }}</td>
						<td>{{ $teacher->user->fullName }}</td>
						<td>{{ $teacher->user->email }}</td>
						<td>{{ $teacher->department->name }}</td>
						<td class="text-center">
							<a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-outline-success btn-sm">
								Editer
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('teacher.destroy', $teacher->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
							</form>
							<a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-outline-info btn-sm">
								Détails
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer text-right ml-auto">
			{!! $teachers->links() !!}
	</div>
</div>
@endsection