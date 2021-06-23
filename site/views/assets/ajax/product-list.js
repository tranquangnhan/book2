const baseUrlSite = '/book2';

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
        { 'type': ["1"] },
        { 'class': ["1"] },
        { 'category': [firstIdCategory] }
    ];
} else if (level == 3) {
    filterOb = [
        { 'type': ["1"] },
        { 'class': ["6"] },
        { 'category': [firstIdCategory] }
    ];
} else if (level == 4) {
    filterOb = [
        { 'type': ["1"] },
        { 'class': ["10"] },
        { 'category': [firstIdCategory] }
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

//////// trang teacher ////////
var classe = 100;
$('.btn.show-option').click(function(e) {
    e.preventDefault();
    if (!$(this).hasClass('active')) {
        if ($(this).hasClass('product')) {
            if ($('.filter.class').parent('.active')) {
                $('.filter.class').parent('.active').removeClass('active');
                var needActive = $('[data-class=' + filterOb[1].class[0] + ']').parent();
                needActive.addClass('active');
            }
            pageNumber = $('.pageNumber').val();
        }

        if ($(this).hasClass('support-resources')) {
            if ($('.filter.class').parent('.active')) {
                $('.filter.class').parent('.active').removeClass('active');
                var needActive = $('[data-class=' + classe + ']').parent();
                needActive.addClass('active');
            }
            pageNumber = $('.pageNumberTeacher').val();
        }
    }
    console.log(pageNumber);
});

$('.filter').click(function(e) {
    e.preventDefault();
    if ($('.support-resources').hasClass('option-active')) {
        checkReloadPage = true;
        if ($('.ftco-loader.teacher').hasClass('show') == false) {
            $('.spre .Resources-item').remove();
            $('.ftco-loader.teacher').addClass('show');
        }

        var keyFilter = $(this).text();

        classe = keyFilter;
        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active');
            getDataSupportResource(100, 0);
        } else {
            var elementActive = $('.filter.class').parent('.active');
            elementActive.removeClass('active');
            $(this).parent().addClass('active');
            getDataSupportResource(keyFilter, 0);
        }

    } else {
        checkReloadPage = true;
        if ($('.ftco-loader').hasClass('show') == false) {
            $('.product-box .product-item').remove();
            $('.ftco-loader').addClass('show');
        }

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
                var elementActive = $('.filter.class').parent('.active');
                elementActive.removeClass('active');

                $(this).parent().addClass('active');

                filterOb[1].class[0] = keyFilter;
            }
        } else {
            var keyFilter = $(this).val();

            var data = getDataByTypeCheck(checkType);

            if ($(this).parent().hasClass('btn-primary')) { // remove
                $(this).parent().removeClass('btn-primary');
                $(this).parent().addClass('btn-dark');

                findAndDeleteItemInArray(data, keyFilter);

            } else { // add
                if ($(this).hasClass('type')) {
                    var elementActive = $('.type.btn-primary');
                    elementActive.removeClass('btn-primary');
                    elementActive.addClass('btn-dark');
                    filterOb[0].type[0] = keyFilter;
                }

                if ($(this).hasClass('category')) {
                    var elementActive = $('.category.btn-primary');
                    elementActive.removeClass('btn-primary');
                    elementActive.addClass('btn-dark');
                    filterOb[2].category[0] = keyFilter;
                }

                $(this).parent().removeClass('btn-dark');
                $(this).parent().addClass('btn-primary');
            }
        }

        var url = `${baseUrlSite}/site/controllers/ajax/product.php`;

        timeRequest = setTimeout(
            function() {
                setDataAndRequest(filterOb, 0, url);
            }, 600);
    }
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
                    // console.log(element);
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
    var link = '';
    if (product['sachmem'] == 1) {
        link = product['link'];
    } else {
        link = `${baseUrlSite}/sach/${product['slug']}`;
    }

    var html = `
    <div class="col-md-4 d-flex product-item align-items-stretch ftco-animate fadeInUp ftco-animated">
        <div class="project-wrap">
            <a href="${link}" class="img" style="background-image: url('${baseUrlSite}/uploads/` + product['img'] + `');">
                <span class="price">Sách ${(product['type'] == 2)? 'Giáo Viên': 'Học Sinh'}</span>
            </a>
            <div class="text p-4">
                <h3><a href="${link}">${product['name']}</a></h3>
                <p class="advisor limit-content-2">Tác Giả: <span>${product['author']}</span></p>
            </div>
        </div>
    </div>
    `;

    return html;
}

obj.url = baseUrlSite + '/site/controllers/ajax/product.php';
obj.filterOb = filterOb;