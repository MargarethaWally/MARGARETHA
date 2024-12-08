@extends('layouts.master')


@section('content')

<div class="container paddding" style="height: 80vh">
    @auth
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="/profile" class="btn btn-primary btn-lg my-5">Edit Profile</a>
        <div class="row mx-0">
            <div class="col-4">
                @if ($profile->photo_profile)
                    <img src="{{ asset('/uploads/profile/' . $profile->photo_profile) }}" class="rounded-circle" alt="Profile Photo" width="304" height="236">
                @else
                    <img src="https://dummyimage.com/480x320/000/fff" class="rounded-circle" alt="Default Profile Photo" width="304" height="236">
                @endif
                <ul class="my-5">
                    @forelse ($profile->user->news as $item)
                        <li class="">
                            <a class="text-primary" href="/news/detail/{{$item->id}}">{{$item->title}}</a>
                        </li>
                    @empty
                        <li class="">belum ada berita yang dikomentari</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-8">
                <h1>{{ $profile->user->name }} ({{ $profile->age }})</h1>
                <small>{{ $profile->user->email }}</small>
                <h3>Biodata Saya adalah</h3>
                <p>{{ $profile->bio }}</p>
            </div>
        </div>
    @endauth
    @guest
        <h1>Belum Login</h1>
    @endguest
</div>
@endsection