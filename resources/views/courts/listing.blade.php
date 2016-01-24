@extends('layout')


@section('content')
   <div>
   	 
   	 @foreach($courts as $court)
        
        <div>
           <a href="/courts/{!! $court->id !!}"> 

             <h1> {{ $court->title }} </h1>
             
           </a>
        </div>


        <div>
          
          <h3>{{ $court->description }}</h3>

        </div>

        <hr>

   	 @endforeach

   </div>

@stop