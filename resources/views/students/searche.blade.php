@extends('layouts.master')

@section('title', 'Liste des etudiants')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-search"></i> Resultats de la recherche</h1> 
	<a href="{{ route('student.index') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-user"></i> Liste des etudiants</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Resultats de la recherche</h3>
		<div class="card-options">
			<form class="input-icon my-3 my-lg-0" action="{{ route('student.searche') }}" method="post">
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
					<th>Tel</th>
					<th>Filiere</th>
					<th>Groupe</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($students as $student)
					<tr>
						<td class="w-1">{{ $student->id }}</td>
						<td>{{ $student->fullName }}</td>
						<td>{{ $student->email }}</td>
						<td>{{ $student->tel }}</td>
						<td>{{ $student->branch->name }}</td>
						<td>{{ $student->group->name }}</td>
						<td class="text-center">
							<a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline-success btn-sm">
								Editer
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('student.destroy', $student->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
							</form>
							<a href="{{ route('student.show', $student->id) }}" class="btn btn-outline-info btn-sm">
								Détails
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer"></div>
</div>
@endsection