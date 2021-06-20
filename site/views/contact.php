<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="contact-background"></div>
                    
                    <div class="row no-gutters">
                        <div class="col-12 text-center">
                            <div class="dbox w-100 mt-5">                                        
                                <div class="img-logo">
                                    <img src="<?=PATH_URL?>images/logo.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 order-md-last d-flex align-items-stretch contact-form">
                            <div class="contact-wrap position-relative w-100 p-md-5 p-4">
                                <h3 class="mb-4">Thông Tin Liên Hệ</h3>
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Họ Tên</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email"  value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Tiêu Đề</label>
                                                <input type="text" class="form-control" name="subject" id="subject"
                                                    placeholder="Subject" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Lời Nhắn</label>
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                    rows="4" placeholder="Message"><?php if(isset($_POST['message'])) echo $_POST['message'];?>"</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" name="submitMessage" value="Gửi" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-md-5 p-4">
                                <h3 class="color-black-2">Công ty Cổ phần Đầu tư và <br> Phát triển Giáo dục Hà Nội</h3>
                                
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Địa Chỉ:</span> Tòa nhà VP HEID, ngõ 12 Láng Hạ, <br> Thành Công, Ba
                                            Đình, Hà Nội</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Điện Thoại:</span> <a href="tel://+84243512 2222">(024) 3512
                                                2222</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Email:</span> <a href="mailto:info@heid.vn">info@heid.vn</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Website:</span> <a href="#">heid.vn</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2892414381145!2d105.81451001533205!3d21.02110969341436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6548d6aaab%3A0x101deafeb41b3016!2zVMOyYSBuaMOgIEhlaWQ!5e0!3m2!1sen!2s!4v1622657625669!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

