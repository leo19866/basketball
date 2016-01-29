
@extends('layout')


@section('content')

     <div class="col-md-3">
     <h1>{!! $court->title !!}</h1>
     

     <hr>

     <div class="description">{!! nl2br($court->description) !!}</div>
     </div>
    
     <hr>
   
     <div>
     	@foreach($court->discussions->chunk(4) as $set)
          <div>
          	  @foreach($set as $discussion)
          	    <div class="col-md-12">
                 {{$discussion->discussion}}
                </div>
          	  @endforeach
          </div> 
     	  
     	@endforeach

     </div>
    
     <div class="col-md-12">
      <form method="POST" action="{{ route('store_discussion',[ $court->id ]) }}" >
       {{ csrf_field() }}
     	<div class="form-group">		
        	<label for="description">Discussion:</label>
        	<textarea type="text" name="discussion" id="discussion" class="form-control" rows="10" ></textarea>

        </div>

        <div class="col-md-12">
        <hr>

        <div class="form-group">
        	<button type="submit" class="btn btn-primary">Add Discussion</button>        	
        </div>

        </div>    
      </form>
     </div>

      
@stop