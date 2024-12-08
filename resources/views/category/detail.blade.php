@extends('layouts.master')

@section('content')
    <div class="container padding">
        <h1 class="my-3 text-primary">{{$categories->name}}</h1>
        <div class="row">
            @forelse ($categories->news as $item )
            <div class="col-4">
                    <div class="card px-2 py-2">
                        <img src="{{asset('/uploads/' . $item->thumbnail)}}"
                        class="card-img-top" width="100%" height="200px" alt="...">
                        <div class="card-body">
                            <h1>{{$item->title}}</h1>
                            <p class="card-text">{{Str::limit($item->content, 100)}}</p>
                            <small>{{$item->created_at->diffForHumans()}}</small>
                            <a href="/news/detail/{{$item->id}}" class="btn btn-primary btn-block">Read More </a>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Tidak Ada Berita di Kategori ini</h3>
            @endforelse
        </div>

        <a href="/" class="btn btn-secondary btn-block my-5">Home</a>
    </div>
@endsection