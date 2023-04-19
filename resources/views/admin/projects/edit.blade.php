@extends('layouts.app')

@section('title')
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">
			<h3 class="my-4"> Modifica Progetto</h3>

			<a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna all'indice</a>

		</div>
	</div>
@endsection

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
					@csrf
					@method('put')

					<label for="title">title</label>
					<input type="text" name="title" id="title" class="form-control mb-3"
						value="{{ old('title') ?? $project->title }}">

					<select class="form-select">
						<option value="">Nessun tipo</option>
						@foreach ($types as $type)
							<option value="{{ $type->id }}">{{ $type->label }}</option>
						@endforeach
					</select>

					<label for="is_published">published</label>
					<input type="checkbox" name="is_published" id="is_published" class="form-check-control mb-3"
						@checked(old('is_published', $project->is_published)) value="1" />

					<div class="row align-items-center">
						<div class="col-10">
							<label for="link">link</label>
							<input type="file" name="link" id="link" class="form-control mb-3"
								value="{{ old('link') ?? $project->link }}">
						</div>
						<div class="col-2">
							<img class="img-fluid" src="{{ $project->getLinkUri() }}" alt="">
						</div>
					</div>

					<label for="description">description</label>
					<textarea type="textarea" name="description" id="description" class="form-control mb-3" rows="3">{{ old('description') ?? $project->description }}</textarea>

					<input type="submit" class="btn btn-primary" value="Salva">
				</form>
			</div>
		</div>
	</div>
@endsection
