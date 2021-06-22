<section class="ftco-section ftco-about img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex about-wrap">
                            <div
                                class="about-teacher bg-size-100 w-100 d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">GIỚI THIỆU</span>
                                <p>Với hệ thống hợp phần bổ trợ đi kèm vô cùng đầy đủ, phong phú đáp ứng đầy đủ cho
                                    nhu cầu giảng dạy của giáo viên: Tài liệu kiểm tra đánh giá, Bài giảng điện tử
                                    PowerPoint, Video tiết giảng minh họa, Giáo án mẫu, Vở tập viết, Bộ truyện đọc,
                                    Bộ Thẻ từ,… Đặc biệt, Sách Mềm - phần mềm hỗ trợ giảng dạy và kho học liệu được
                                    đánh giá là công cụ hỗ trợ “không thể thiếu” của cộng đồng giáo viên Tiếng Anh
                                    toàn quốc từ bao nhiêu năm nay tại trang web sachmem.vn.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="col-12 text-center">
                    <div class="block-27">
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <li><a href="#" class="big filter class" data-type="1">Mầm Non</a></li>
                                    <li><a href="#" class="filter class" data-type="1">1</a></li>
                                    <li><a href="#" class="filter class" data-type="1">2</a></li>
                                    <li><a href="#" class="filter class" data-type="1">3</a></li>
                                    <li><a href="#" class="filter class" data-type="1">4</a></li>
                                    <li><a href="#" class="filter class" data-type="1">5</a></li>                             
                                    <li><a href="#" class="filter class" data-type="1">6</a></li>
                                    <li><a href="#" class="filter class" data-type="1">7</a></li>
                                    <li><a href="#" class="filter class" data-type="1">8</a></li>
                                    <li><a href="#" class="filter class" data-type="1">9</a></li>                             
                                    <li><a href="#" class="filter class" data-type="1">10</a></li>
                                    <li><a href="#" class="filter class" data-type="1">11</a></li>
                                    <li><a href="#" class="filter class" data-type="1">12</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5 text-center">
                    <div class="w-100">
                        <label class="btn box-shadow-none p-0">
                            <div id="option1" class="btn show-option option-active " data-show-op="1">Sách Mềm</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option2" class="btn show-option" data-show-op="2"> Tài
                                nguyên hỗ trợ giảng dạy</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option3 " class="btn show-option" data-show-op="3"> Kiểm tra đánh
                                giá</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option3" class="btn show-option" data-show-op="4"> Đào tạo - Bồi
                                dưỡng</div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="option-item active option_1 w-100" data-option="1">
                        <div class="row product-box">    
                            <?php 
                                if (isset($mess)) {
                                    echo $mess;
                                }
                            ?>                                
                            <?php foreach ($listProduct as $product) { 
                                $link = ROOT_URL."/sach/".$product['slug'];
                            ?>
                            <div class="col-md-4 product-item d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="<?=$link?>" class="img" style="background-image: url(<?=PATH_IMG_SITE?><?= $product['img']?>);">
                                        <span class="price">Sách</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="<?=$link?>"><?= $product['name'] ?></a></h3>
                                        <p class="advisor">Tác Giả: <span><?= $product['author'] ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="w-100 text-center">
                                <div class="ftco-loader mr-0-auto">
                                    <svg class="circular" width="48px" height="48px">
                                        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                                        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
                                    </svg>
                                </div>
                            </div>
                            <!-- <div class="box-on-top hide"></div> -->
                        </div>

                        <div class="row mt-5 pagina-box " style="<?php echo ($pageNumber == 0) ? 'display: none' : ''?>">
                            <div class="col">
                                <div class="block-27 text-center">
                                    <input type="hidden" class="pageNumber" value="<?=$pageNumber?>">
                                    <ul class="page-num">
                                            <li><a href="javascript:void(0)" class="pagination-control prev" onclick="moveBack();">&lt;</a></li>                
                                            <div class="page-list d-inline-block">
                                            <?php 
                                            if ($pageNumber <= 6) {
                                                for ($i = 1; $i < $pageNumber + 1; $i++) { 
                                                    ?>
                                                        <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                    <?php 
                                                }
                                            } else {
                                                for ($i = 1; $i < $pageNumber + 1; $i++) {
                                                    if ($i < 4) { 
                                                    ?>
                                                        <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                    <?php } 
                                                } if ($pageNumber > 6) { ?>       
                                                    <li><span data-item="near-end">...</span></li>
                                                    <li><a href="javascript:void(0)" data-item="<?=$pageNumber - 1?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber - 1 ?></a></li>                                    
                                                    <li><a href="javascript:void(0)" data-item="<?=$pageNumber ?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber ?></a></li>                                    
                                            <?php } 
                                            } ?>
                                            </div>                            
                                        <li><a href="javascript:void(0)" class="pagination-control next" onclick="moveNext()">&gt;</a></li>                                                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option-item option_2 w-100" data-option="2">
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/Sách\ học\ sinh.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Sách học sinh</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/Sách\ bài\ tập.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Sách bài tập</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/Sách\ giáo\ viên.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Sách giáo viên</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/Bộ\ quan\ roi.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Bộ quân rối</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/tranh\ tinh\ huong.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Tranh tình huống</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="#" class="img" style="background-image: url(<?=PATH_URL?>images/bo\ the\ tu.png);">
                                        <span class="price">Tài nguyên</span>
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="course-detail.html">Bộ thẻ từ</a></h3>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap p-4">
                                    <div class="img-cirle">
                                        <img src="<?=PATH_URL?>images/exam.svg" alt="" class="img-fluid">
                                    </div>

                                    <div class="text">
                                        <h3><a href="#">Đề kiểm tra
                                        </a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap p-4">
                                    <div class="img-cirle">
                                        <img src="<?=PATH_URL?>images/online-learning.svg" alt="" class="img-fluid">
                                    </div>

                                    <div class="text">
                                        <h3><a href="#">Bài giảng điện tử</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap p-4">
                                    <div class="img-cirle">
                                        <img src="<?=PATH_URL?>images/folders.svg" alt="" class="img-fluid">
                                    </div>

                                    <div class="text">
                                        <h3><a href="#">Kho dữ liệu media</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require 'right.php'; ?>

        </div>
</section>
