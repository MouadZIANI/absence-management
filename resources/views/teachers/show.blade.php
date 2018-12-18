@extends('layouts.master')

@section('title', 'informations de l\'etudiants')

@section('content')

@include('layouts.partials._messages')

<div class="row">
	<div class="col-lg-3">
		<div class="card card-profile">
			<div class="card-header" style="background-color: #333"></div>
			<div class="card-body text-center">
				<img class="card-profile-img" src="{{ asset('assets/images/avatar5.png') }}">
				<h3 class="mb-3">{{ $student->fullName }}</h3>
				<p class="mb-4">
					<strong>{{ $student->email }}</strong>
					<br>
					<strong>{{ $student->tel }}</strong>
					<br>
					<strong>{{ $student->branch->name }}</strong>
					<br>
					<strong>{{ $student->group->name }}</strong>
				</p>
			</div>
			<div class="card-footer">
				<a class="btn btn-outline-success btn-block" href="{{ route('student.edit', $student->id) }}" class="btn btn-success btn-sm">Editer les infos de l'etudiant</a>
			</div>	
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Absences de l'etudiant</h3>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap">
					<thead>
						<tr>
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
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
@endsection