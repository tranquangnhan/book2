async function addView(id) {
    let formData = new FormData();
    formData.append('action', 'addview');
    formData.append('idsp', id);

    await $.ajax({
        type: "POST",
        url: "controllers/ajax/main.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {},
        error: function() {
            Swal.fire({
                timer: 3000,
                type: 'error',
                title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                showConfirmButton: false,
                showCancelButton: false,
            });
        }
    });
}

$("#comment").click(async function() {

    let review = $("#review").val();
    let name = $("#name").val();
    let iddt = $("#iddt").val();
    let iduser = $("#iduser").val();

    let formData = new FormData();
    formData.append('review', review);
    formData.append('name', name);
    formData.append('iddt', iddt);
    formData.append('iduser', iduser);
    formData.append('action', 'comment');
    $.ajax({
        type: "POST",
        url: "controllers/ajax/main.php",
        contentType: false,
        processData: false,
        dataType: 'JSON',
        data: formData,
        success: function(response) {
            if (response.statusCode == 1) {

                var content = '<li class="review__item">' +
                    '<div class="review__container">' +
                    '<img src="views/assets/img/logo/avt.png" alt="Review Avatar" class="review__avatar">' +
                    '<div class="review__text">' +
                    '<div class="d-flex flex-sm-row flex-column justify-content-between">' +
                    '<div class="review__meta">' +
                    '<strong class="review__author">' + response.datacmt.TenKh + ' </strong>' +
                    '<span class="review__dash">-</span>' +
                    '<span class="review__published-date"> ' + response.datacmt.ThoiDiemBL + '</span>' +
                    '</div>' +
                    '</div>' +
                    '<p class="review__description">' + response.datacmt.NoiDungBL + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</li>';

                $("#reviewlist").append(content);
            }

        }
    });

})

