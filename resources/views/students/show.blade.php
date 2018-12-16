@extends('layouts.master')

@section('title', 'informations de l\'etudiants')

@section('content')

@include('layouts.partials._messages')

<div class="row">
	<div class="col-lg-4">
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
				<a class="btn btn-outline-success btn-block" href="{{ route('student.edit', $student->id) }}" class="btn btn-success btn-sm">Editer les informations de l'etudiant</a>
			</div>	
		</div>
	</div>
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Absences de l'etudiant</h3>
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
				</table>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
@endsection