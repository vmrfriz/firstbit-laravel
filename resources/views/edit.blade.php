@extends('layouts.first')

@section('content')
<h1 class="text-center"><a href="/">&laquo;&ndash;</a> Редактирование отзыва</h1>
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <div id="review-form" class="card">
            <div class="card-body">
                @include('components.errors')
                @include('components.info')

                <form action="/" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="review-name">Имя</label>
                            <input type="text" class="form-control" id="review-name" value="{{ $review->author }}" readonly="readonly">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="review-email">Email</label>
                            <input type="email" class="form-control" id="review-email" value="{{ $review->email }}" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-text">Текст отзыва <span class="red">*</span></label>
                        <textarea class="form-control" name="text" id="review-text" rows="3" required="required">{{ $review->text }}</textarea>
                    </div>
                    @if ($review->image ?? false)
                    <div class="form-group">
                        <div>Изображение <small>(png, jpg или gif)</small></div>
                        <div><img src="{{ $review->image }}" class="review_image" alt=""></div>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
