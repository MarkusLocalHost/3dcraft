@extends('layouts.main')

@section('content')
    @yield('breadcrumb')

    <div class="blog-area pt-160 pb-160">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    @yield('content-blog')
                </div>
                @include('layouts.include.blog_sidebar')
            </div>
        </div>
    </div>
@endsection
