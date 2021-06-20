window.onload = function() {
    function CheckStrength(Password) {
        let Error = "";
        let Strength = 0;

        if (Password.length < 8) {
            return "Mật khẩu phải có ít nhất 8 kí tự. Bao gồm chữ HOA, thường, số và ký tự đặt biệt.";
        }

        if (Password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) Strength += 1;
        if (Password.match(/([a-zA-Z])/) && Password.match(/([0-9])/)) Strength += 1;
        if (Password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) Strength += 1;
        if (Password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) Strength += 1;

        if (Strength < 2) {
            return "Mật khẩu phải có ít nhất 8 kí tự. Bao chữ HOA, thường, số và ký tự đặt biệt.";
        } else if (Strength === 2) {
            return 0;
        } else {
            return 1;
        }
    }

    function fireErr(text) {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: text,
            showConfirmButton: true,
            showCancelButton: false,
            icon: "error"
        });
    }
    // khi click vào login
    $("#login").click(async function(e) {
        e.preventDefault();
        let userName = $("#username").val();
        let passWord = $("#password").val();
        let remember = $("#remember").val();

        let Loading = Swal.fire({ // sweetAlert
            allowEscapeKey: false,
            title: 'Đang kiểm tra',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: 'Vui lòng chờ trong giây lát...',
            imageUrl: 'views/assets/img/Default/Loading.gif',
        });

        if (userName !== "" && passWord !== "") { // check nếu có tài khoản và mật khẩu
            let CheckUserIsExist = new FormData();

            CheckUserIsExist.append('Login', userName); //tên
            CheckUserIsExist.append('Action', 'CheckExist'); //check tài khoản đã tồn tại hay chưa
            // khởi tạo ajax

            await $.ajax({
                type: 'POST',
                url: 'controllers/ajax/loginregister.php',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: CheckUserIsExist,
                success: async function(response) {
                    console.log(response)
                    if (response.StatusCode === 1) {
                        Loading.close();
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi.',
                            text: 'Tài khoản không tồn tại trên hệ thống.',
                            showConfirmButton: true,
                            showCancelButton: false,
                            icon: 'error',
                        });
                    } else if (response.StatusCode === 0) {
                        let LoginData = new FormData();

                        LoginData.append('Login', userName); //gửi lên user và pass để kiểm tra
                        LoginData.append('Password', passWord);
                        LoginData.append('Remember', remember);
                        LoginData.append('Action', 'Login');

                        await $.ajax({
                            type: 'POST',
                            url: 'controllers/ajax/loginregister.php',
                            dataType: 'JSON',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: LoginData,
                            success: function(response) {
                                if (response.StatusCode === 0) {
                                    Swal.fire({
                                        timer: 3000,
                                        type: 'success',
                                        title: 'Thành công',
                                        text: 'Đăng nhập hoàn tất. Đang chuyển hướng về trang chủ.',
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        icon: "success"
                                    });

                                    window.location.href = ('?act=home');
                                } else if (response.StatusCode === 1) {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Lỗi.',
                                        text: 'Mật khẩu không chính xác hoặc tài khoản chưa được kích hoạt.',
                                        showConfirmButton: true,
                                        showCancelButton: false,
                                        icon: "error"
                                    });

                                }
                            }
                        });
                    }
                },
                error: function() {
                    Loading.close();
                    Swal.fire({
                        timer: 3000,
                        type: 'error',
                        title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                        showConfirmButton: false,
                        showCancelButton: false,
                    });
                }
            });

        } else if (userName === "" && passWord === "") {
            fireErr('Vui lòng nhập tên đăng nhập hoặc mật khẩu.');
            return;
        } else if (userName === "") {
            fireErr('Vui lòng nhập tên đăng nhập.');
            return;
        } else if (passWord === "") {
            fireErr('Vui lòng nhập mật khẩu.');
            return;
        }
    });

    $('#CheckReset').click(async function(Event) {
        Event.preventDefault();

        let email = $('#Email').val();

        if (email === "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'Vui lòng nhập Email đã đăng ký.',
                showConfirmButton: true,
            });
            return;
        }

        let Loading = Swal.fire({
            allowEscapeKey: false,
            title: 'Đang kiểm tra',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: 'Vui lòng chờ trong giây lát...',
            imageUrl: 'views/assets/img/Default/Loading.gif',
        });

        let CheckUserIsExist = new FormData();

        CheckUserIsExist.append('Login', email);
        CheckUserIsExist.append('Action', 'CheckEmailNamePhoneExist');

        await $.ajax({
            type: 'POST',
            url: 'controllers/ajax/loginregister.php',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: CheckUserIsExist,
            success: async function(Respond) {
                if (Respond.StatusCode === 1) {
                    Loading.close();

                    Swal.fire({
                        type: 'error',
                        title: 'Lỗi.',
                        text: 'Tài khoản không tồn tại trên hệ thống.',
                        showConfirmButton: true,
                        showCancelButton: false,
                    });
                } else if (Respond.StatusCode === 0) {
                    let LoginData = new FormData();

                    LoginData.append('Login', email);
                    LoginData.append('Action', 'Token');

                    await $.ajax({
                        type: 'POST',
                        url: 'controllers/ajax/loginregister.php',
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: LoginData,
                        success: function(Respond) {
                            Loading.close();

                            if (Respond.StatusCode === 1) {
                                Swal.fire({
                                    timer: 3000,
                                    type: 'success',
                                    title: 'Thành công',
                                    text: 'Chúng tôi đã gửi mã khôi phục đến địa chỉ mail của bạn.',
                                    showConfirmButton: true,
                                    showCancelButton: false,
                                });

                                $('#DoCheckForm').hide();
                                $('#DoResetForm').show();
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Lỗi.',
                                    text: 'Có lỗi xảy ra vui lòng thử lại sau.',
                                    showConfirmButton: true,
                                    showCancelButton: false,
                                });
                            }
                        }
                    })
                }
            },
            error: function() {
                Loading.close();
                Swal.fire({
                    timer: 3000,
                    type: 'error',
                    title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            }
        });
    });
    $('#DoReset').click(async function(Event) {
        Event.preventDefault();

        let Token = $('#ResetToken').val(),
            NewPass = $('#ResetPass').val(),
            ConfirmNewPass = $('#ConfirmResetPass').val();

        let ErrorMessage = "";

        if (Token === "") ErrorMessage += "Vui lòng nhập mã khôi phục.";
        if (NewPass === "") ErrorMessage += "Vui lòng nhập mã khôi phục.";
        if (ConfirmNewPass === "") ErrorMessage += "Vui lòng nhập mã khôi phục.";

        if (NewPass !== "" && ConfirmNewPass !== "") {
            if ((CheckStrength(NewPass) !== 0) && (CheckStrength(NewPass) !== 1)) ErrorMessage += CheckStrength(NewPass);
            if (NewPass !== ConfirmNewPass) ErrorMessage += "Mật khẩu không khớp.";
        }

        if (ErrorMessage !== "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                html: ErrorMessage,
                showConfirmButton: true,
            });
            return;
        }

        let Loading = Swal.fire({
            allowEscapeKey: false,
            title: 'Đang kiểm tra',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: 'Vui lòng chờ trong giây lát...',
            imageUrl: 'views/assets/img/Default/Loading.gif',
        });

        let DoChangePass = new FormData();

        DoChangePass.append('NewPass', NewPass);
        DoChangePass.append('ResetCode', Token);
        DoChangePass.append('Action', 'Reset');

        await $.ajax({
            type: 'POST',
            url: 'controllers/ajax/loginregister.php',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: DoChangePass,
            success: async function(Respond) {
                Loading.close();
                if (Respond.StatusCode === 1) {
                    await Swal.fire({
                        type: 'success',
                        title: 'Thành Công',
                        text: 'Đổi mật khẩu thành công.',
                        showConfirmButton: true,
                        confirmButtonText: 'Quay về trang chủ.'
                    });
                    window.location.href = "?act=home";
                } else if (Respond.StatusCode === 2) {
                    await Swal.fire({
                        type: 'error',
                        title: 'Oops',
                        text: 'Mã khôi phục không đúng.',
                    });
                }
            },
            error: function() {
                Loading.close();
                Swal.fire({
                    timer: 3000,
                    type: 'error',
                    title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            }
        });
    });
    $("#changpass").click(async function(Event) {
        Event.preventDefault();

        let OldPass = $('#oldpass').val(),
            NewPass = $('#ResetPass').val(),
            ConfirmNewPass = $('#ConfirmResetPass').val();

        let ErrorMessage = "";

        if (OldPass === "") ErrorMessage += "Vui lòng nhập mật khẩu cũ.";
        if (NewPass === "") ErrorMessage += "Vui lòng nhập mật khẩu mới.";
        if (ConfirmNewPass === "") ErrorMessage += "Vui lòng nhập mật khẩu xác nhận.";

        if (NewPass !== "" && ConfirmNewPass !== "") {
            if ((CheckStrength(NewPass) !== 0) && (CheckStrength(NewPass) !== 1)) ErrorMessage += CheckStrength(NewPass);
            if (NewPass !== ConfirmNewPass) ErrorMessage += "Mật khẩu không khớp.";
        }

        if (ErrorMessage !== "") {
            Swal.fire({
                icon: 'warning',
                title: 'Oops',
                html: ErrorMessage,
                showConfirmButton: true,
            });
            return;
        }
        let Loading = Swal.fire({
            allowEscapeKey: false,
            title: 'Đang kiểm tra',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: 'Vui lòng chờ trong giây lát...',
            imageUrl: 'views/assets/img/Default/Loading.gif',
        });
        let DoChangePass = new FormData();

        DoChangePass.append('NewPass', NewPass);
        DoChangePass.append('OldPass', OldPass);
        DoChangePass.append('Action', 'ChangePass');

        await $.ajax({
            type: 'POST',
            url: 'controllers/ajax/loginregister.php',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: DoChangePass,
            success: async function(Respond) {
                Loading.close();
                if (Respond.StatusCode === 1) {
                    await Swal.fire({
                        type: 'success',
                        title: 'Thành Công',
                        text: 'Đổi mật khẩu thành công.',
                        showConfirmButton: true,
                        confirmButtonText: 'Quay về trang chủ.'
                    });
                    window.location.href = "/asmphp2/";
                } else if (Respond.StatusCode === 2) {
                    await Swal.fire({
                        type: 'error',
                        title: 'Oops',
                        text: 'Mật khẩu cũ không đúng.',
                    });
                }
            },
            error: function() {
                Loading.close();
                Swal.fire({
                    timer: 3000,
                    type: 'error',
                    title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng thử lại sau.',
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            }
        });
    });

}