imageresources.onchange = evt => {
    const [file] = imageresources.files
    if (file) {
        reviewImage.src = URL.createObjectURL(file)
    }
}

$('#clearReviewImage').click(function (e) { 
    e.preventDefault();
    reviewImage.src = '';
});