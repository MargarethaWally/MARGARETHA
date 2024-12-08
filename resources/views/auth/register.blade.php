@extends('layouts.master')

@section('content')
    <div class="container padding my-5">
        <h1 class="text-primary my-2">Register</h1>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" autocomplete="name" autofocus>
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" autocomplete="email">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password"  type="password" class="form-control" name="password" autocomplete="new-password">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{old('age')}}">
                @error('age')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" cols="10" rows="5"></textarea>
                @error('address')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control" id="bio" cols="10" rows="5"></textarea>
                @error('bio')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Register')}}</button>
        </form>
    </div>
@endsection