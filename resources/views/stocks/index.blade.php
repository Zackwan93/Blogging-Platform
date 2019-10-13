@extends('layouts.app')

@section('content')
     <h1>Stock Management List</h1>
     @if(count($stocks) > 0)
          @foreach($stocks as $stock)
               <div class="well well-sm">
                    <div class="row">
                         <div class="col-md-8 col-sm-8">
                              <h3><a href="/stocks/{{$stock->id}}">{{$stock->item}}</a></h3>
                              <small>Written on {{$stock->created_at}} by {{$stock->user->name}}</small>
                         </div>
                    </div>
               </div>
          @endforeach
          
     @else
          <p>Not any job found</p>
     @endif
@endsection

