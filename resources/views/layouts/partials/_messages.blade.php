@if (Session::has('success'))
	<div class="alert alert-success margint-15">
        <strong>Succès! </strong> {{ Session::get('success') }}
    </div>
@endif

@if(count($errors) > 0)
	
	<div class="alert alert-danger">
        <strong>Erreurs:</strong>
        <ul>
        	@foreach ($errors->all() as $error)
        		<li>{{ $error }}</li>
        	@endforeach
        </ul>
    </div>
	
@endif