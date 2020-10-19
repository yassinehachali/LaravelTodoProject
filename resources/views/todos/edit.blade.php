@extends('layouts/app')

@section('content')

<h1 class="text-center">Edit Todo</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit Todo</div>
            <div class="card-body">
                
 <form action="/update-todos/{{ $todo->id }}" method="POST">
    @csrf
    
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $todo->name }}">
    </div>
    <div class="form-group">
        <textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control">{{ $todo->description }}</textarea>
    </div>
    <div class="form-group text-center">

        <button type="submit" class="btn btn-success">Update Todo</button>
    </div>
    </form>
        
            </div>
        </div>
    </div>
</div>
    
@endsection