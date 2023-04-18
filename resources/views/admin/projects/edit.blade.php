@extends('layouts.app')

@section('title')
<div class="container">
<div class="d-flex align-items-center justify-content-between">
  <h3 class="my-4"> Modifica Progetto</h3>

<a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna all'indice</a>

  </div>
</div>

    
@endsection

@section('content')
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{route('admin.projects.update', $project)}}">
          @csrf
          @method('put')

            <label for="title">title</label>
            <input type="text" name="title" id="title" class="form-control mb-3" value="{{ old('title') ?? $project->title }}">

            <label for="link">link</label>  
            <input type="text" name="link" id="link" class="form-control mb-3" value="{{ old('link') ?? $project->link }}">

            <label for="description">description</label>  
            <textarea type="textarea" name="description" id="description" class="form-control mb-3" rows="3">{{ old('description') ?? $project->description }}</textarea>

            <input type="submit" class="btn btn-primary" value="Salva">
          </form>
        </div>
      </div>
    </div>
@endsection