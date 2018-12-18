@extends('layouts.master')

@section('title', 'Liste des absences')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-bell"></i> Absences</h1> 
	<a href="{{ route('absence.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-bell"></i> Nouveau absence</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Absences</h3>
		<div class="card-options">
			<form class="input-icon my-3 my-lg-0" action="{{ route('absence.searche') }}" method="post">
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
					<th>Etudiant</th>
					<th>Date d'absence</th>
					<th>Module</th>
					<th>Type</th>
					<th>Justification</th>
					<th>Nbr heurs</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($absences as $absence)
					<tr>
						<td><a href="{{ route('student.show', $absence->student->id) }}" class="btn btn-link">{{ $absence->student->fullName }}</a></td>
						<td>{{ dateTimeToFrFormat($absence->absence_date) }}</td>
						<td>{{ $absence->module->name }}</td>
						<td>{{ $absence->type }}</td>
						<td>{{ $absence->justification }}</td>
						<td><span class="badge badge-default">{{ $absence->nb_hours }} Heure</span></td>
						<td>
							<a href="{{ route('absence.edit', $absence->id) }}" class="btn btn-success btn-sm">
								Editer
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('absence.destroy', $absence->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer text-right ml-auto">
			{!! $absences->links() !!}
	</div>
</div>
@endsection