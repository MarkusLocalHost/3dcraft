@extends('layouts.blog')

@section('title')
    Dking - Блог
@endsection

@section('content-blog')

        <div class="blog-details-wrap ml-20">
            <div class="blog-details-content">
                <div class="blog-details-img">
                    <img src="{{ $post->getImage() }}" alt="blog">
                </div>
                <h3>{{ $post->title }}</h3>
                <div class="blog-meta-5">
                    <ul>
                        <li>By {{ $post->user->name }}</li>
                        <li>-</li>
                        <li>{{ $post->getPostDate() }}</li>
                    </ul>
                </div>
                {!! $post->content !!}
                </div>
            <div class="blog-details-tag-social">
                <div class="blog-details-tag">
                    <ul>
                        <li>Теги : </li>
                        @foreach($post->tags as $tag)
                            <li><a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }},</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="blog-details-social">
                    <ul>
                        <li>Поделиться :</li>
                        <li><a class="facebook" href="blog-details.html#"><i class="icon-social-facebook-square"></i></a></li>
                        <li><a class="twitter" href="blog-details.html#"><i class="icon-social-twitter"></i></a></li>
                        <li><a class="instagram" href="blog-details.html#"><i class="icon-social-instagram"></i></a></li>
                        <li><a class="pinterest" href="blog-details.html#"><i class="icon-social-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="next-prev-wrap">
                <div class="next-wrap next-prev-conent">
                    @if($previous_post)
                        <h4><a href="{{ route('blog.show', ['slug' => $previous_post->slug]) }}">{{ $previous_post->title }}</a></h4>
                        <a href="{{ route('blog.show', ['slug' => $previous_post->slug]) }}">Prev Post</a>
                    @endif
                </div>
                <div class="prev-wrap next-prev-conent">
                    @if($next_post)
                        <h4><a href="{{ route('blog.show', ['slug' => $next_post->slug]) }}">{{ $next_post->title }}</a></h4>
                        <a href="{{ route('blog.show', ['slug' => $next_post->slug]) }}">Next Post</a>
                    @endif
                </div>
            </div>
            <div class="blog-comments-area">
                <h4 class="blog-details-title">4 Comment</h4>
                <div class="blog-comments-wrap">
                    <div class="single-blog-bundel">
                        <div class="single-blog-comment mb-40">
                            <div class="blog-comment-img">
                                <img alt="" src="assets/images/blog/user1.png">
                            </div>
                            <div class="blog-comment-content">
                                <p>“Theme is very flexible and easy to use. Perfect for us. Customer support has been excellent and answered every question we've thrown at them</p>
                                <div class="comment-name-reply">
                                    <h5>35 mins ago, 15 November 2019 </h5>
                                    <a href="blog-details.html#">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-blog-comment child-blog-comment ml-80">
                            <div class="blog-comment-img">
                                <img alt="" src="assets/images/blog/user2.png">
                            </div>
                            <div class="blog-comment-content">
                                <p>“This theme is indeed a great purchase. Support center is also helpful and quick to answer. No issues so far.”</p>
                                <div class="comment-name-reply">
                                    <h5>35 mins ago, 15 November 2019</h5>
                                    <a href="blog-details.html#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog-bundel">
                        <div class="single-blog-comment">
                            <div class="blog-comment-img">
                                <img alt="" src="assets/images/blog/user3.png">
                            </div>
                            <div class="blog-comment-content">
                                <p>“Exceptional service, beautiful and straightforward theme! Can't recommend enough.”</p>
                                <div class="comment-name-reply">
                                    <h5>35 mins ago, 15 November 2019</h5>
                                    <a href="blog-details.html#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog-bundel">
                        <div class="single-blog-comment">
                            <div class="blog-comment-img">
                                <img alt="" src="assets/images/blog/user4.png">
                            </div>
                            <div class="blog-comment-content">
                                <p>“Highly customizable. Excellent design. Customer services has exceeded my expectation. They are quick to answer and even when they don't know the answer right away. They'll work with you towards a solution.”</p>
                                <div class="comment-name-reply">
                                    <h5>35 mins ago, 15 November 2019</h5>
                                    <a href="blog-details.html#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-form">
                <h3>Leave a Reply </h3>
                <p>Your email address will not be published. Required fields are marked *</p>
                <form action="blog-details.html#">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="leave-form">
                                <input placeholder="Name *" type="text">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="leave-form">
                                <input placeholder="Email *" type="text">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="leave-form">
                                <input placeholder="Website" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="leave-form">
                                <textarea placeholder="Your Comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-submit">
                        <input type="submit" value="Post Comment">
                    </div>
                </form>
            </div>
        </div>

@endsection
