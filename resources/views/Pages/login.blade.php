@extends('layouts.app')
@section('content')

<div class="jumbotron text-center">
  <h1 class="display-4">{{$title}}</h1>
  <p class="lead">This is a simple website to be test by optimize the clarity of its designs and improve its functionality by measuring people's first impressions. </p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead ">
    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a> 
    <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a>
  </p>
</div>

@endsection  