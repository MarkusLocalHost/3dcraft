@extends('layouts.main')

@section('title')
    Отзыв
@endsection

@section('content')
    <div class="breadcrumb-area breadcrumb-mt bg-gray breadcrumb-ptb-1">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Отзыв</h2>
                <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
            </div>
        </div>
        <div class="breadcrumb-img-1">
            <img src="{{ $product->getImage() }}" alt="">
        </div>
        <div class="breadcrumb-img-2">
            <img src="{{ asset('assets/front/img/about/breadcrumb-2.png') }}" alt="">
        </div>
    </div>
    <div class="description-review-wrapper pb-155">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content dec-review-bottom">
                        <div id="des-details4" class="tab-pane active">
                            <div class="ratting-form-wrapper">
                                <div class="ratting-form">
                                    <form role="form" method="post" action="{{ route('review.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Оценка</label>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="star-box-wrap">
                                                    <div class="single-ratting-star" id="star_one">
                                                        <a><i class="icon-rating"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star" id="star_two">
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star" id="star_three">
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star" id="star_four">
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star" id="star_five">
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                        <a><i class="icon-rating"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-20">
                                                    <label>Ваш отзыв</label>
                                                    <textarea name="content"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <input type="hidden" name="uuid" value="{{ $uuid }}">
                                                    <input type="hidden" name="rating" id="rating">
                                                    <input type="submit" value="Отправить">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#star_one').click(function () {
                $('i.icon-rating').css('color', '')
                $('#star_one > a > i.icon-rating').css('color', '#f5b223')
                $('input#rating').val(1)
            })

            $('#star_two').click(function () {
                $('i.icon-rating').css('color', '')
                $('#star_two > a > i.icon-rating').css('color', '#f5b223')
                $('input#rating').val(2)
            })

            $('#star_three').click(function () {
                $('i.icon-rating').css('color', '')
                $('#star_three > a > i.icon-rating').css('color', '#f5b223')
                $('input#rating').val(3)
            })

            $('#star_four').click(function () {
                $('i.icon-rating').css('color', '')
                $('#star_four > a > i.icon-rating').css('color', '#f5b223')
                $('input#rating').val(4)
            })

            $('#star_five').click(function () {
                $('i.icon-rating').css('color', '')
                $('#star_five > a > i.icon-rating').css('color', '#f5b223')
                $('input#rating').val(5)
            })
        })
    </script>
@endsection

