document.addEventListener('DOMContentLoaded', function() {
    function id(id, context) {
        context = context === undefined ? document : context;
        return context.getElementById(id);
    }

    // Button: clear file input
    let btnClearFile = id('review-image-clear');
    if (btnClearFile) btnClearFile.addEventListener('click', function() {
        let imageInput = id('review-image');
        imageInput.value = null;
        imageInput.dispatchEvent(new Event('change'));
    });

    // Button "Предварительный просмотр"
    let btnPreview = id('btn-preview-review');
    if (btnPreview) btnPreview.addEventListener('click', function (event) {
        let name = id('review-name').value;
        let email = id('review-email').value;
        let review = id('review-text').value;

        if (!name || !email || !review) return false;

        let authorNode = id('preview-author');
        authorNode.innerText = name;
        authorNode.href = 'mailto:' + email;
        id('preview-text').innerText = review;

        let imageInput = id('review-image');
        let imageNode = id('preview-image');
        let reader = new FileReader();
        reader.onloadend = function () {
            imageNode.src = reader.result;
        };
        if (imageInput.files.length) {
            reader.readAsDataURL(imageInput.files[0]);
            imageNode.parentNode.classList.remove('hidden');
        } else {
            imageNode.src = '';
            imageNode.parentNode.classList.add('hidden');
        }

        id('review-preview').classList.remove('hidden');
    });
});
