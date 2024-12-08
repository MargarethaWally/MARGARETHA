@extends('layouts.master')


@section('content')

<div class="container paddding">
    <h1 class="text-primary my-2">Update Profile</h1>
    <form action="/profile/{{$profile->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" value="{{ $profile->age }}" id="age" name="age">
        </div>
        @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="bio">Biodata</label>
            <textarea name="bio" id="bio" class="form-control" cols="30" rows="10">{{ $profile->bio }}</textarea>
        </div>
        @error('bio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="10">{{ $profile->address }}</textarea>
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="photo_profile">Photo Profile</label>
            <input type="file" name="photo_profile" id="photo_profile" class="form-control">
        </div>
        @error('photo_profile')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection