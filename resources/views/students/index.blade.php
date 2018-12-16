@extends('layouts.master')

@section('title', 'Liste des etudiants')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-user"></i> Etudiants</h1> 
	<a href="{{ route('student.create') }}" class="btn btn-success ml-auto"><i class="fe fe-user-plus"></i> Nouveau etudiant</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Etudiants</h3>
	</div>
	<div class="table-responsive">
		<table class="table card-table table-vcenter text-nowrap">
			<thead>
				<tr>
					<th class="w-1">No.</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Tel</th>
					<th>Filiere</th>
					<th>Groupe</th>
					<th>Actions</th>
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
						<td>
							<a href="{{ route('student.edit', $student->id) }}" class="btn btn-success btn-sm">
								Editer
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('student.destroy', $student->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
							</form>
							<a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm">
								Détails
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		{!! $students->links() !!}
	</div>
</div>
@endsection