@extends('layouts.first')

@section('content')
<h1 class="text-center">Отзывы</h1>
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <div id="review-form" class="card">
            <div class="card-body">
                @include('components.errors')
                @include('components.info')

                @include('reviews.form')
            </div>
        </div>
    </div>
</div>

<div id="review-preview" class="row justify-content-center mb-3 hidden">
    <div class="col-md-6">
        <div class="card bg-light">
            <div class="card-header">Так будет выглядеть Ваш отзыв</div>
            <div class="card-body">
                <article class="review mb-0">
                    <header class="review_header">
                        <a id="preview-author" class="review_author" href=""></a>
                    </header>
                    <div class="review_text">
                        <div id="preview-text"></div>
                        <div><img id="preview-image" class="review_image" src="" alt=""></div>
                    </div>
                    <footer class="review_footer">
                        <time class="review_time">только что</time>
                    </footer>
                </article>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mb-3">
    @if ($reviews ?? false)
    <div class="col-md-6">
        <div class="card">
            @include('reviews.all', ['not_published' => 'admin'])
        </div>
    </div>
    @endif
</div>
@endsection
