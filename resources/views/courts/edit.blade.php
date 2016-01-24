@extends('layout')


@section('content')

<form method="POST" action="/courts/{{$court->id}}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PATCH">
<div class="row">
   {{ csrf_field() }}

   <div class="col-md-6">

    	<div class="form-group">
    		<label for="title">Title:</label>
    		<input type="text" name="title" id="title" class="form-control" value="{{ $court->title }}"> 
    	</div>

    
        <div class="form-group">		
        	<label for="description">Court Description:</label>
        	<textarea type="text" name="description" id="description" class="form-control" rows="10" >{{ $court->description }}</textarea>

        </div>

    </div>    

        

    <div class="col-md-12">
    <hr>

        <div class="form-group">
        	<button type="submit" class="btn btn-primary">Create Flyer</button>        	
        </div>

    </div>    

</div>
</form>
 

@stop