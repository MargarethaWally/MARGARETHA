@extends('layouts.master')

@section('content')

<div class="container paddding">
    <div class="row mx-0">
        <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            @forelse ($news as $item)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <img src="{{ asset('/uploads/' . $item->thumbnail) }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="/news/detail/{{$item->id}}" class="fh5co_magna py-2"> {{$item->title}} </a>
                        <small>{{ $item->created_at->diffForHumans() }}</small>
                        <h6>
                            <span class="badge badge-primary">
                                {{$item->category->name}}
                            </span>
                        </h6>
                        <div class="fh5co_consectetur"> {{ Str::limit($item->content, 200) }}</div>
                        @forelse ($categories as $item)
                            <a href="/categories/{{$item->id}}" class="fh5co_tagg">{{ $item->name }}</a>
                        @empty
                            <a href="">Tidak Ada Kategori</a>
                        @endforelse
                    </div>
                </div>
            @empty
                <h3>Tidak Ada Berita</h3>
            @endforelse
        </div>
        <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Category</div>
            </div>
            <div class="clearfix"></div>
            <div class="fh5co_tags_all">
                @forelse ($categories as $item)
                    <a href="/categories/{{$item->id}}" class="fh5co_tagg">{{ $item->name }}</a>
                @empty
                    <a href="">Tidak Ada Kategori</a>
                @endforelse
            </div>
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
@endsection