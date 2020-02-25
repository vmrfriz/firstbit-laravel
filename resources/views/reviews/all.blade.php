<div id="reviews" class="card-body">
@foreach ($reviews as $review)

    @if (!$review->published_at && isset($not_published))

        @if (in_array($not_published, ['false', 'hide']) === true)
            @continue

        @elseif ($not_published === 'admin' && Auth::check() === false)
            @continue

        @endif

    @endif

    @include('reviews.single')

@endforeach
</div>
