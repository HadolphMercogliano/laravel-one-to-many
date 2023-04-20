@extends('layouts.app')

@section('title')
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">
			<h3 class="my-4"> Crea nuova tipologia</h3>

			<a href="{{ route('admin.types.index') }}" class="btn btn-primary">Torna all'indice</a>

		</div>
	</div>
@endsection

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ route('admin.types.store') }}">
					@csrf

					<label for="label">Label</label>
					<input type="text" name="label" id="label" class="form-control mb-3">

					<label for="color">Colore</label>
					<input type="text" name="color" id="color" class="form-control mb-3">

					<input type="submit" class="btn btn-primary" value="Salva">
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
