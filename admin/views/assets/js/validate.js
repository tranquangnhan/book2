$(function() {
    $("#formlogin").validate({
        rules: {
            user: { required: true, maxlength: 20, minlength: 4 },
            password: { required: true, minlength: 6 }
        },
        messages: {
            user: {
                required: "<span class='badge badge-danger'>Mời bạn nhập họ tên vào",
                maxlength: "<span class='badge badge-warning'>Họ tên dài quá, phải<20 ký tự</span>",
                minlength: "<span class='badge badge-warning'>Username phải trên 4 ký tự</span>"
            },
            password: {
                required: "<span class='badge badge-danger'>Không để trống password</span>",
                minlength: "<span class='badge badge-warning'>Password phải trên 6 ký tự</span>",

            }
        }
    });
});

$(function() {
    $("#formadd").validate({
        rules: {
            name: { required: true },
            author: { required: true },
            year: { required: true, minlength: 3 },
            publishing: { required: true },
            link: { required: true },
        },
        messages: {
            name: {
                required: "<span class='badge badge-danger'>Không được để trống</span>",
            },
            author: {
                required: "<span class='badge badge-danger'>Không được để trống</span>",
            },
            publishing: {
                required: "<span class='badge badge-danger'>Không được để trống</span>",
            },
            link: {
                required: "<span class='badge badge-danger'>Không được để trống</span>",
            },
            year: {
                required: "<span class='badge badge-danger'>Không được để trống</span>",
                minlength: "<span class='badge badge-warning'>năm phải đủ 4 số</span>",
            },
        }
    });
});


// $(function() {
//     $("#form_category").validate({
//         rules: {
//             name: required 
//         },
//         messages: {
//             name: {
//                 required: "<span class='badge badge-danger'>Mời bạn nhập họ tên vào</span>"
//             }
//         }
//     })
// });

