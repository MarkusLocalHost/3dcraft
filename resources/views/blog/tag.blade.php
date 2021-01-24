@extends('layouts.blog')

@section('title')
    Dking - {{ $tag->title }}
@endsection

@section('breadcrumb')
    <div class="breadcrumb-area breadcrumb-mt bg-gray breadcrumb-ptb-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>{{ $tag->title }}</h2>
                <p>{{ $tag->description }}</p>
            </div>
        </div>
        <div class="breadcrumb-img-1">
            <img src="{{ asset('assets/front/img/about/breadcrumb-1.png') }}" alt="">
        </div>
        <div class="breadcrumb-img-2">
            <img src="{{ asset('assets/front/img/about/breadcrumb-2.png') }}" alt="">
        </div>
    </div>
@endsection

@section('content-blog')

    <div class="main-blog-wrap ml-20">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-wrap mb-50">
                        <div class="blog-img mb-35">
                            <a href="{{ route('blog.show', ['slug' => $post->slug]) }}"><img
                                    src="{{ $post->getImage() }}" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <h3><a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }} </a></h3>
                            <span class="mrg-top-inc">on {{ $post->getPostDate() }} | <i class="icofont-eye"></i> {{ $post->views }}</span>
                            <p>{!! $post->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pro-pagination-style text-center mt-20">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
