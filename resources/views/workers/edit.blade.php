@extends('layouts.app')

@section('content')
    <h1>Edit Job</h1>

    {!! Form::open(['action' => 'WorkersController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
      
      <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$worker->name, ['class' => 'form-control', 'placeholder' => 'Name' ])}}<br>  
      </div>
      
      <div class="form-group">
        {{Form::label('day','Date')}}<p>
        {{Form::selectRange('day', 1, 31)}}{{Form::selectMonth('month')}}{{Form::selectYear('year',2019,2025)}}<br>  
      </div>

      <div class="form-group"><br>
        {{Form::label('method','Method')}}<p>
        {{Form::select('method', array('400' => 'Cucian Penuh (RM400/kg)', '200' => 'Cucian Separuh (RM200/kg)'), '400')}}  
      </div>

      <div class="form-group"><br>
        {{Form::label('weight','Weight')}}<p>
        {{Form::number('weight', 'value')}}<label>gram</label>
      </div> 

      <div class="form-group"><br>
            {{Form::label('remark', 'Remark')}}
            {{Form::textarea('remark', $worker->remark, ['id' => 'article-ckeditor', 'placeholder' => 'Body Text'])}}
      </div>
      {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection