@extends('layouts.app')

@section('content')
    <h1>Edit Stock Record</h1>

     {!! Form::open(['action' => ['DailystocksController@update',$stock->id],'method' => 'POST']) !!}
      
      <div class="form-check"><br>
      {{Form::label('stock_process','Stock Process')}}<p>
      <input class="form-check-input" type="radio" name="stock_process" id="stock_process_in" value="Stock In">
      <label class="form-check-label pl-4" for="stock_process_in">
      Stock In
      </label><p>

      <input class="form-check-input" type="radio" name="stock_process" id="stock_process_out" value="Stock Out">
      <label class="form-check-label pl-4" for="stock_process_out">
      Stock Out
      </label>
      </div>

      <div class="form-group"><br>
        {{Form::label('item','Item')}}
        {{Form::text('item',$stock->item, ['class' => 'form-control', 'placeholder' => 'Item' ])}}
      </div>
      
      <div class="form-group"><br>
        {{Form::label('date','Date')}}<p>
        {{Form::selectRange('day', 1, 31)}}{{Form::selectMonth('month')}}{{Form::selectYear('year',2019,2025)}}<br>  
      </div>

      <div class="form-group"><br>
        {{Form::label('cost_kg','Item Cost/kg')}}<p>
        <label>RM</label>{{Form::number('cost_kg', 'value')}}<label>/kg</label>  
      </div>

      <div class="form-group"><br>
        {{Form::label('weight','Weight')}}<p>
        {{Form::number('weight', 'value')}}<label>gram</label>
      </div> 

      <div class="form-group"><br>
            {{Form::label('remark', 'Remark')}}
            {{Form::textarea('remark', $stock->remark, ['id' => 'article-ckeditor', 'placeholder' => 'Body Text'])}}
      </div>
      {{Form::hidden('_method','PUT')}}
      {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection