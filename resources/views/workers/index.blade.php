@extends('layouts.app')

@section('content')
     <h1>Job List</h1>
     @if(count($workers) > 0)
          @foreach($workers as $worker)
               <div class="well">
                    <div class="row">
                         <div class="col-md-8 col-sm-8">
                              <h3><a href="/workers/{{$worker->id}}">{{$worker->name}}</a></h3>
                              <small>Written on {{$worker->created_at}} by {{$worker->user->name}}</small>
                         </div>
                    </div>
               </div>
          @endforeach
          
     @else
          <p>Not any job found</p>
     @endif
@endsection

