<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Отзывы &ndash; Первый Бит</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container py-4 mb-3">
            <h1 class="text-center">Отзывы</h1>
            <div class="row justify-content-center">
                <div id="review-form" class="card col-md-6">
                    <div class="card-body">

                        {{-- Block: Alert mistakes --}}
                        @if ($mistakes ?? false)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            @foreach ($mistakes as $mistake)
                                <li>{{ $mistake }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- Block: Alert mistakes --}}
                        @if ($alerts ?? false)
                        <div class="alert alert-success" role="alert">
                            <ul>
                            @foreach ($alerts as $alert)
                                <li>{{ $mistake }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="review-name">Имя <span class="red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="review-name" value="{{ old('name') }}" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="review-email">Email <span class="red">*</span></label>
                                    <input type="email" name="email" class="form-control" id="review-email" value="{{ old('email') }}" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review-text">Ваш отзыв <span class="red">*</span></label>
                                <textarea class="form-control" name="review" id="review-text" rows="3" required="required">{{ old('review') }}</textarea>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-6"><button type="submit" class="btn btn-outline-secondary">Предпросмотр</button></div>
                                <div class="col-12 col-sm-6 text-right"><button type="submit" class="btn btn-primary">Отправить отзыв</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div id="review-preview" class="card"></div>
            <div id="reviews" class="card">
            @if ($reviews ?? false)
            @foreach ($reviews as $review)
                <div class="review">
                    <div class="review_name">
                        <a href="mailto:{{ $review->email }}">{{ $review->author }}</a>
                    </div>
                    <div class="review_text">
                        <div>{{ $review->text }}</div>
                    @if ($review->image ?? false)
                        <div><img src="{{ $review->image }}" alt=""></div>
                    @endif
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
