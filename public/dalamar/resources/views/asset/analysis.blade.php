@extends('layout.layout')
@section('content')


<div class="card posts">
    <h5 class="card-header">بەشی شیکاریی</h5>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">@for ($i = 0 ; $i < 8 ; $i++)
        <h5>سڵاوتان لێبێت هاوڕێیان</h5>
        @endfor</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>






@endsection
