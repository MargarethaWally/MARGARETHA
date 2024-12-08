@extends('layouts.master')

@section('content')
    <div class="container padding my-5">
        <h1 class="text-primary my-2">Login</h1>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" autocomplete="email" autofocus>
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                {{__('Login')}}
            </button>
        </form>
    </div>
@endsection