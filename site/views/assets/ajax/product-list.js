const baseUrlSite = '/book';
var level = $('.levelType').val();
var firstIdCategory = $('.category').first().val();

var filterOb = [];

// level là các lớp
// level 1 = 0 Mầm non
// level 2 = 1, 2, 3, 4, 5 tiểu học
// level 3 = 6, 7, 8, 9 THCS
// level 4 = 10, 11, 12 THPT
// level 6 = mặc định
if (level == 1) {
    filterOb = [
        { 'type': [] },
        { 'class': ["0"] },
        { 'category': [] }
    ];
} else if (level == 2) {
    filterOb = [
        { 'type': [] },
        { 'class': ["1"] },
        { 'category': [] }
    ];
} else if (level == 3) {
    filterOb = [
        { 'type': [] },
        { 'class': ["6"] },
        { 'category': [] }
    ];
} else if (level == 4) {
    filterOb = [
        { 'type': [] },
        { 'class': ["10"] },
        { 'category': [] }
    ];
} else {
    var filterOb = [
        { 'type': ["1"] },
        { 'class': ["0"] },
        { 'category': [firstIdCategory] }
    ];
}

var checkReloadPage = false;

var timeRequest;

$('.filter').click(function(e) {
    console.log(filterOb);
    checkReloadPage = true;
    if ($('.ftco-loader').hasClass('show') == false) {
        $('.product-box .product-item').remove();
        $('.ftco-loader').addClass('show');
    }
    e.preventDefault();

    clearTimeout(timeRequest);

    var checkType = $(this).attr('data-type');

    if (checkType == 1) { // class
        let dataClass = filterOb[checkType].class;
        var keyFilter = $(this).text();

        if (keyFilter == 'Mầm Non') { keyFilter = 0; }

        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active');

            findAndDeleteItemInArray(dataClass, keyFilter);
        } else {
            $(this).parent().addClass('active');
            dataClass.push(keyFilter);
        }
    } else {
        var keyFilter = $(this).val();

        var data = getDataByTypeCheck(checkType);

        if ($(this).parent().hasClass('btn-primary')) { // remove
            $(this).parent().removeClass('btn-primary');
            $(this).parent().addClass('btn-dark');

            findAndDeleteItemInArray(data, keyFilter);
        } else { // add
            $(this).parent().removeClass('btn-dark');
            $(this).parent().addClass('btn-primary');

            data.push(keyFilter);
        }
    }

    var url = `${baseUrlSite}/site/controllers/ajax/product.php`;

    timeRequest = setTimeout(
        function() {
            setDataAndRequest(filterOb, 0, url);
        }, 600);
});

function findAndDeleteItemInArray(array, find) {
    for (let i = 0; i < array.length; i++) {
        if (array[i] == find) {
            array.splice(i, 1);
        }
    }
}

function getDataByTypeCheck(checkType) {
    if (checkType == 0) {
        var data = filterOb[checkType].type;
    } else {
        var data = filterOb[checkType].category;
    }

    return data;
}

function getDataByFilterOb(data, url) {
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(response) {
            console.log(response);
            if ($('.notice-h3')) {
                $('.notice-h3').remove();
                $('.pagina-box').show();
            }
            if ($('.ftco-loader').hasClass('show') == true) {
                $('.ftco-loader').removeClass('show');
            }

            if (response[1] > 0) {
                response[0].forEach(element => {
                    console.log(element);
                    var html = htmlProductItem(element);
                    $('.product-box').append(html);
                });

                if (checkReloadPage == true) {
                    var page = (response[1] / 9);
                    pageNumber = Math.ceil(page);
                    reloadPage();
                    checkReloadPage = false;
                }
            } else {
                var html = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
                $('.product-box').prepend(html);
                $('.pagina-box').hide();
            }
        },
        error: function(e) {
            // Swal.fire({
            //     timer: 3000,
            //     type: 'error',
            //     title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng tải lại trang !.',
            //     showConfirmButton: false,
            //     showCancelButton: false,
            // });
            alert('loi khi load book');
        }
    });
}

function setDataAndRequest(filterOb, form, url) {
    if (form > 0) {
        form = form - 1;
    }
    var dataToSring = JSON.stringify(filterOb);

    var dataSend = new FormData();

    dataSend.append('filterOb', dataToSring);
    dataSend.append('form', form);
    dataSend.append('action', 'getData');


    getDataByFilterOb(dataSend, url);
}

function htmlProductItem(product) {
    var html = `
    <div class="col-md-4 d-flex product-item align-items-stretch ftco-animate fadeInUp ftco-animated">
        <div class="project-wrap">
            <a href="${baseUrlSite}/sach/${product['slug']}" class="img" style="background-image: url('${baseUrlSite}/uploads/` + product['img'] + `');">
                <span class="price">Sách</span>
            </a>
            <div class="text p-4">
                <h3><a href="${baseUrlSite}/sach/${product['slug']}">${product['name']}</a></h3>
                <p class="advisor">Tác Giả: <span>${product['author']}</span></p>
            </div>
        </div>
    </div>
    `;

    return html;
}

obj.url = baseUrlSite + '/site/controllers/ajax/product.php';
obj.filterOb = filterOb;