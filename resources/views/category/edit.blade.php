@extends('layouts.master')

@section('content')
<div class="container padding">
    <h1 class="text-primary my-2">Edit Categories</h1>
    <form action="/categories/{{$category->id}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" value="{{$category->name}}" class="form-control" id="name" name="name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
       @enderror
       <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection