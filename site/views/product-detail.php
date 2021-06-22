<section class="ftco-section-detail bg-light">
    <div class="container ftco-section ftco-about img">
        <div class="row">
            <div class="col-lg-9">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-md-12 about-intro">
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="d-flex about-wrap">
                                        <div class="imgbig-detail d-flex align-items-center justify-content-center"
                                            style="background-image:url('<?=PATH_IMG_SITE.explode(',',$oneproduct['img'])[0]?>');">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-md-5 py-5">
                                    <div class="row justify-content-start pb-3">
                                        <div class="col-md-12 heading-section ftco-animate">
                                            <span class="subheading"><?=$oneproduct['publishing']?></span>
                                            <h2 class="mb-4"><?=$oneproduct['name']?></h2>
                                            <p>Năm xuất bản: <?=$oneproduct['year']?></p>
                                            <p>Tác giả: <?=$oneproduct['author']?>
                                            </p>
                                            <div class="btn-group">
                                            <?php 
                                              foreach ($checkOnePart as $row) {
                                                if($row['part'] == $oneproduct['id'] ||$row['id']==  $oneproduct['id'] ){?>
                                                            
                                                  
                                                        <button type="button" class="btn btn-success dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Chọn Tập
                                                        </button>
                                                        <div class="dropdown-menu">

                                                            <a class="dropdown-item" href="<?=ROOT_URL?>/sach/<?=$slugPart1?>">Tập 1</a>
                                                            <a class="dropdown-item" href="<?=ROOT_URL?>/sach/<?=$slugPart2?>">Tập 2</a>
                                                        </div>
                                                     
                                                    
                                               <?php   }
                                            }?>
                                               <a href="<?=$oneproduct['link']?>" class="mx-2"><button type="button"
                                                                class="btn btn-primary">edubook.com.vn</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Dành Cho Giáo Viên
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Sách Mềm giáo viên</a>
                                    <a class="dropdown-item" href="#">Sách Mềm học sinh</a>
                                    <a class="dropdown-item" href="<?=$oneproduct['linkgv']?>">Sách giáo viên </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Đề kiểm tra</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Ứng dụng Luyện từ vựng</a>
                                    <a class="dropdown-item" href="#">Story Land</a>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Dành Cho Học Sinh
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <br><br>
                            <p><?=addslashes($oneproduct['description'])?></p>
                            <hr>
                            <div class="kind">
                                <div class="detail-tittle">
                                    <h2 style="color: white;">Sách Cùng Khối Lớp</h2>
                                </div>                                    
                                <div class="row">
                                    <div class="owl-carousel owl-theme slide-video" id="kind-carousel">
                                        <?php 
                                            foreach ($getProductsSameClass as $row) {
                                                $link =SITE_URL . '?act=productdetail&slug='.$row['slug'];
                                                $img = PATH_IMG_SITE.explode(",",$row['img'])[0];
                                                echo '<div class="item slide-video-item">
                                                        <div class="w-100 d-flex align-items-stretch ftco-animate">
                                                            <div class="project-wrap">
                                                                <a href="'.$link .'" class="img-product position-relative"
                                                                    style="background-image: url(\''.$img.'\');">
                                                                    <span class="price">Sách</span>
                                                                </a>
                                                                <div class="text p-4">
                                                                    <h3><a href="'.$link .'">'.$row['name'].'</a></h3>
                                                                    <p class="advisor">Tác Giả: <span>'.$row['author'].'</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                        ?>
  
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="detail-tittle">
                                <h2 style="color: white;">Đầu Mối Phát Hành</h2>
                            </div>
                            <div>
                                <Strong>Miền Bắc: </Strong> <span>CTCP Đầu tư và Phát triển Giáo dục Hà Nội</span>
                            </div>
                            <div>
                                <ul>
                                    <li>Địa chỉ: Toà nhà văn phòng HEID ngõ 12 Làng Hạ, Ba Đình, Hà Nội</li>
                                    <li>Điện thoại: 024 3512 3939</li>
                                </ul>
                            </div>
                            <div>
                                <Strong>Miền Trung: </Strong> <span>CTCP Đầu tư và Phát triển Giáo dục Đà
                                    Nẵng</span>
                            </div>
                            <div>
                                <ul>
                                    <li>Địa chỉ: 145 Lê Lợi, Hải Châu, Đà Nẵng</li>
                                    <li>Điện thoại: 0236 3859 954</li>
                                </ul>
                            </div>
                            <div>
                                <Strong>Miền Nam: </Strong> <span>CTCP Đầu tư và Phát triển Giáo dục Phương
                                    Nam</span>
                            </div>
                            <div>
                                <ul>
                                    <li>Địa chỉ: 231 Nguyễn Văn Cừ, Quận 5, Hồ Chí Minh</li>
                                    <li>Điện thoại: 028 7303 5556</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require 'right.php'; ?>
            
        </div>
</section>