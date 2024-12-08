@extends('layouts.master')


@section('content')

<div class="container paddding">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <img src="{{ asset('/uploads/' . $news->thumbnail) }}" class="img-fluid" alt="" style="height: 500px;">
    <div class="my-3">
        <h1 class="text-primary">{{ $news->title }}</h1>
        <span class="badge badge-primary">
            <a href="/categories/{{ $news->category->id }}" class="text-decoration-none">{{ $news->category->name }}</a>
        </span>
        <hr>
        <p>{{ $news->content }}</p>
        <hr>
        <h3>List Komentar</h3>
        @forelse ($news->comments as $comment)
            <div class="media">
                <img src="{{ asset('/uploads/profile/' . $comment->user->profile->photo_profile) }}" class="mr-3 rounded-circle" width="75" height="75" alt="...">
                <div class="media-body">
                    <h5 class="mt-0 text-info">{{ $comment->user->name }}</h5>
                    {{ $comment->content }}
                    @forelse ($comment->replies as $reply)
                        <div class="reply">
                            <strong>{{ $reply->user->name }}:</strong> {{ $reply->content }}
                        </div>
                    @empty
                        <p>Tidak Ada Balasan</p>
                    @endforelse
                    @auth
                        <hr>
                        <form action="{{ route('reply.store', $comment->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" id="content" placeholder="Isi Balasan" class="form-control" cols="10" rows="5"></textarea>
                            </div>
                            <input type="submit" class="btn btn-info btn-sm" value="Reply">
                        </form>
                    @endauth
                </div>
            </div>
        @empty
            <p>Tidak Ada Komentar</p>
        @endforelse
        @auth
            <hr>
            <form action="/comment/{{ $news->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" id="content" placeholder="Isi Komentar" class="form-control" cols="30" rows="10"></textarea>
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-primary btn-lg" value="Kirim">
            </form>
        @endauth
        <hr>
        <a href="/" class="btn btn-lg btn-secondary">Home</a>
    </div>
</div>
@endsection

