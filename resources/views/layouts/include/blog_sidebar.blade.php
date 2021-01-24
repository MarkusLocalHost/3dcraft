<div class="col-lg-3">
    <div class="sidebar-search mb-70">
        <form class="search-form" action="blog.html#">
            <input type="text" placeholder="Поиск по постам">
            <button class="button-search"><i class="icofont-search-1"></i></button>
        </form>
    </div>
    <div class="sidebar-widget">
        <h4 class="pro-sidebar-title">Популярные посты </h4>
        <div class="sidebar-post-wrap mt-45 mb-70">
            @foreach($popular_posts as $post)
                <div class="single-sidebar-post">
                    <div class="sidebar-post-img">
                        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                    </div>
                    <div class="sidebar-post-content">
                        <h4><a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                        <span>{{ $post->getPostDate() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="sidebar-widget">
        <h4 class="pro-sidebar-title">Категории</h4>
        <div class="sidebar-widget-categori mt-45 mb-70">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('blog.category', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-widget">
        <h4 class="pro-sidebar-title">Теги</h4>
        <div class="sidebar-widget-tag mt-50 mb-70">
            <ul>
                @foreach($tags as $tag)
                    <li><a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
