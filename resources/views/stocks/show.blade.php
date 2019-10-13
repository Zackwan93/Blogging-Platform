@extends('layouts.app')

@section('content')
     <a href = '/stocks' class ='btn btn-default'> Go Back </a>
     <h1>Stock Item</h1>
     
     <div>
          <div class="well">
                    <div class="row">
                         <div class="col-md-8 col-sm-8">
                         <h2><b>{{$stock->item}}</b></h2>
                              <p><br><h4><b>{{$stock->stock_process}} -> {{$stock->day}}/{{$stock->month}}/{{$stock->year}}</b></h4><p>
                              <p><br><b>Cost/kg:</b> <u>{{$stock->cost_kg}}</u> gram<p>
                              <p><br><b>Weight of Bird Nest:</b>  <u>{{$stock->weight}}</u> gram<p>
                              
                              @if ($stock->remark!=null)
                              <p><br><b>Remark:</b>   <u>{!!$stock->remark!!}</u>
                              @else
                              @endif    

                              <div class=cities>
                             <p><b>Total Price:<b>    RM <u>{{$stock->price}}</u>
                             </div>
                             <p> 
                         </div>
                    </div>
     </div>
     <hr>
     <p><p><p>
     <small>Written on {{$stock->created_at}} by {{$stock->user->name}}</small> 
     <hr>
     @if(!Auth::guest())
          @if(Auth::user()->id == $stock->user_id)
               <a href = "/stocks/{{$stock->id}}/edit" class="btn btn-default">Edit</a>

               {!!Form::open(['action' => ['DailystocksController@destroy', $stock->id] , 'method' => 'POST' , 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
               {!!Form::close()!!}
          @endif
     @endif
@endsection