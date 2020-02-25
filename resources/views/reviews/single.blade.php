<article class="review" id="review-{{ $review->id }}">
    <header class="review_header">
        <a class="review_author" href="mailto:{{ $review->email }}">{{ $review->author }}</a>
        @auth
        <div>
            <a class="adm-btn ml-3" href="/edit/{{ $review->id }}">изменить</a>
            @if ($review->published_at ?? false)
            <a class="adm-btn adm-btn_disabled ml-3 js-publish-btn" href="#">скрыть</a>
            @else
            <a class="adm-btn ml-3 js-publish-btn" href="#">опубликовать</a>
            @endif
        </div>
        @endauth
    </header>
    <div class="review_text">
        <div>{{ $review->text }}</div>
    @if ($review->image ?? false)
        <div><img src="{{ $review->image }}" class="review_image" alt=""></div>
    @endif
    </div>
    <footer class="review_footer">
        <time class="review_time" datetime="{{ $review->created_at }}">{{ $review->created_at_diff }}</time>
        @if ($review->is_edited ?? false)
        <span class="review_edited">с правками администратора</span>
        @endif
    </footer>
</article>
