<section class="ftco-section ftco-about img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex about-wrap">
                            <div
                                class="about-student bg-size-100 w-100 d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">GIỚI THIỆU</span>
                                <p>Với hệ thống hợp phần bổ trợ đi kèm vô cùng đầy đủ, phong phú đáp ứng đầy đủ cho
                                    nhu cầu học tập bộ môn Tiếng Anh bao gồm Sách Mềm - phần mềm hỗ trợ học tập,
                                    tương tác với thầy cô ở mọi thiết bị, mọi lúc, mọi nơi. Đánh giá được năng lực
                                    và kiến thức của mình.; Các ứng dụng luyện tập Tiếng Anh khác trên website
                                    sachmem.vn,......</p>
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
                            <div class="col" id="nav-chil">
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
                <div class="col-lg-12 text-center">
                    <div class="containerleft">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn p-0">
                                <div id="option1" class="btn show-option option-active" data-show-op="1">Sách Mềm
                                </div>
                            </label>
                            <label class="btn p-0">
                                <div id="option2" class="btn show-option" data-show-op="2"> Luyện tập
                                </div>
                            </label>
                            <label class="btn p-0">
                                <div id="option3" class="btn show-option" data-show-op="3"> Kiểm tra đánh
                                    giá</div>
                            </label>

                        </div>
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
                                if($product['sachmem'] ==1 ){
                                    $link =$product['link'];
                                }else{
                                    $link = ROOT_URL."/sach/".$product['slug'];
                                }
                            ?>
                            <div class="col-md-4 product-item d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap">
                                    <a href="<?=$link?>" class="img" style="background-image: url('<?=PATH_IMG_SITE?>/<?= $product['img']?>');">
                                        <span class="price">Sách <?=($product['type'] == 1)? "Học Sinh": "Giáo Viên"?></span>
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
                        <div style="margin-bottom: 100px">
                            <div class="container">

                                <div class="row justify-content-center ftco-animate">
                                    <div class="title">
                                        <div
                                            class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
                                            <h2 class="fz-1em">ỨNG DỤNG VÀ PHẦN MỀM BỔ TRỢ</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4 ftco-animate">
                                        <div class="row my-2">
                                            <div class="col-6 display-icon-block-4">
                                                <img
                                                    src="https://s.sachmem.vn/public/temp-sm-questions/image/ungdung_phanmem_icon1_tcc3.svg">
                                            </div>
                                            <div class="col-6 p-0">
                                                <a href="https://hoclieu.sachmem.vn/" style="color: #636363">Hệ
                                                    thống quản lý học tập</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-4 ftco-animate">
                                        <div class="row my-2">
                                            <div class="col-6 display-icon-block-4">
                                                <img
                                                    src="https://s.sachmem.vn/public/temp-sm-questions/image/ungdung_phanmem_icon2_tcc3.svg">
                                            </div>
                                            <div class="col-6 p-0">
                                                <a href="https://tuvung.sachmem.vn" style="color: #636363">
                                                    <p class="custom-text-block-ungdung-phanmem">
                                                        Ứng dụng luyện kiến thức ngôn ngữ:
                                                    </p>
                                                    <p class="custom-text-block-ungdung-phanmem">Từ vựng</p>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-4 ftco-animate">
                                        <div class="row my-2">
                                            <div class="col-6 display-icon-block-4">
                                                <img
                                                    src="https://s.sachmem.vn/public/temp-sm-questions/image/ungdung_phanmem_icon4_tcc3.svg">
                                            </div>
                                            <div class="col-6 p-0">
                                                <a href="#" style="color: #636363">
                                                    <p class="custom-text-block-ungdung-phanmem">Ứng dụng</p>
                                                    <p class="custom-text-block-ungdung-phanmem">
                                                        luyện từ theo thẻ từ.
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
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
