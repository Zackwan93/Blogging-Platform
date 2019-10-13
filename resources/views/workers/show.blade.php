@extends('layouts.app')

@section('content')
     <a href = '/workers' class ='btn btn-default'> Go Back </a>
     <h1>{{$worker->name}}</h1>
     
     <div>
          <div class="well">
                    <div class="row">
                         <div class="col-md-8 col-sm-8">
                         <h2><b>JOB DETAIL</b></h2>
                              <p><br><h4><b>{{$worker->day}}/{{$worker->month}}/{{$worker->year}}</b></h4><p>
                              @if ($worker->method==400)
                                   <b>Methods of Cleaning:</b> <u>Full Clean</u>
                              @elseif ($worker->method==200)
                                   <b>Methods of Cleaning:</b> <u>Half Clean</u>
                              @endif

                             <p> <b>Weight of Bird Nest:</b>  <u>{{$worker->weight}}</u> gram<p>
                              
                              @if ($worker->remark!=null)
                              <b>Remark:</b>   <u>{!!$worker->remark!!}</u>
                              @else
                              @endif    

                              <div class=cities>
                             <p><b>Total Salary:<b>    RM <u>{{$worker->salary}}</u>
                             </div>
                             <p> 
                         </div>
                    </div>
     </div>
     <hr>
     <p><p><p>
     <small>Written on {{$worker->created_at}} by {{$worker->user->name}}</small> 
     <hr>
     @if(!Auth::guest())
          @if(Auth::user()->id == $worker->user_id)
               <a href = "/workers/{{$worker->id}}/edit" class="btn btn-default">Edit</a>

               {!!Form::open(['action' => ['WorkersController@destroy', $worker->id] , 'method' => 'POST' , 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
               {!!Form::close()!!}
          @endif
     @endif
@endsection