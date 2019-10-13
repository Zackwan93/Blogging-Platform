@extends('layouts.app')

@section('content')
       <h1>{{$title}}</h1>
       @if(count($list)>0)
            <ul class='list-group'>
                @foreach ($list as $listdown)
                    <li class="list-group-item">{{$listdown}}</li>
                @endforeach
        @endif
@endsection
