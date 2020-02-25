<form action="/" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="review-name">Имя <span class="red">*</span></label>
            <input type="text" name="author" class="form-control" id="review-name" value="{{ old('author') }}" required="required">
        </div>
        <div class="form-group col-md-6">
            <label for="review-email">Email <span class="red">*</span></label>
            <input type="email" name="email" class="form-control" id="review-email" value="{{ old('email') }}" required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="review-text">Ваш отзыв <span class="red">*</span></label>
        <textarea class="form-control" name="text" id="review-text" rows="3" required="required">{{ old('text') }}</textarea>
    </div>
    <div class="form-group">
        <label for="review-image">Изображение <small>(png, jpg или gif, максимум 320х240)</small></label>
        <div class="d-flex">
            <div class="custom-file">
                <input type="file" id="review-image" name="image" class="custom-file-input" value="{{ old('image') }}" accept=".jpg,.png,.gif">
                <label class="custom-file-label" for="review-image" data-browse="Выбрать">Выберите файл</label>
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm ml-3 border-0" id="review-image-clear">&times;</button>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div>
            <button type="button" id="btn-preview-review" class="btn btn-outline-secondary">Предварительный просмотр</button>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>
</form>
