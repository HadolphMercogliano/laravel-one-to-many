@extends('layouts.app')

@section('title')
<div class="container">
  <div class="d-flex align-items-center justify-content-between">
    <h3 class="my-4"> Progetto: {{$project->title}}</h3>

    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna all'indice</a>

  </div>
</div>

@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center align-items-center g-2 mb-3">  
    <div class="card col-6 p-3">
      <div class="card-body">
        <div class="col-12">
          <img class="img-fluid mb-3" src="{{$project->link}}" alt="Immagine">
        </div>
        <div class="col-12">
          <h3 class="card-title text-center mb-4 "> {{ $project->title }}</h3>
          <p class="">{{ $project->description}}</p>
        </div>
      </div>     
      <a href="{{ route('admin.projects.edit', $project) }}" class=" btn btn-primary"> Modifica progetto</a>
    </div>
  </div>
</div>

@endsection