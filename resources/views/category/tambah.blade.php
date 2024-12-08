@extends('layouts.master')

@section('content')
    <div class="container padding">
        <h1 class="text-primary mr-2">Add Categories</h1>
        <form action="/categories" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
