filterOb = [
    { 'type': [2] },
    { 'class': [] },
    { 'category': [] }
];

obj.pageTeacher = true;
var classe = 100;

function getDataSupportResource(classhe, form) {
    var dataSend = new FormData();
    classe = classhe;
    dataSend.append('class', classhe);
    dataSend.append('form', form);
    dataSend.append('action', 'getDataSpResources');
    
    var url = `${baseUrlSite}/site/controllers/ajax/product.php`;
    
    getDataSpResourceClass(dataSend, url);
}

function getDataSpResourceClass(data, url) {    
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(response) {            
            if ($('.notice-h3')) {
                $('.notice-h3').remove();
                $('.pagina-box').show();
            }

            if ($('.ftco-loader').hasClass('show') == true) {
                $('.ftco-loader').removeClass('show');
            }
            console.log(response);
            if (response[1] > 0) {
                response[0].forEach(element => {                    
                    var ResourcesItem = htmlResourcesItem(element);
                    $('.spre').append(ResourcesItem);                    
                });

                if (checkReloadPage == true) {
                    var page = (response[1] / 9);
                    pageNumber = Math.ceil(page);
                    reloadPage();
                    checkReloadPage = false;
                }
            } else {
                var html = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
                $('.spre').prepend(html);
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
            alert('loi khi load tai nguyen ho tro');
        }
    });
}

function htmlResourcesItem(data) {
    if (data['class'] == 0) {
        var classz = 'Mầm non';
    } else {
        var classz = 'Lớp ' + data['class'];
    }
    var html = `
    <div class="col-md-4 Resources-item d-flex align-items-stretch ftco-animate fadeInUp ftco-animated">
        <div class="project-wrap">
            <a href="${data['link']}" class="img" style="background-image: url(${baseUrlSite}/uploads/${data['img']});">
                <span class="price">${classz}</span>
            </a>
            <div class="text p-4">
                <h3><a href="${data['link']}">${data['name']} - ${data['id']}</a></h3>
            </div>
        </div>
    </div>
    `;

    return html;
}
