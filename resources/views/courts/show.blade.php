
@extends('layout')


@section('content')

     <div class="col-md-3">
     <h1>{!! $court->title !!}</h1>
     

     <hr>

     <div class="description">{!! nl2br($court->description) !!}</div>
    </div>

      
@stop