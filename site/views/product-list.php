<input type="hidden" name="" class="levelType" value="<?=$level?>">

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="col-lg-12" id="nav-chil">
                    <div class="container" style="width: fit-content; margin-bottom: 5%;">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="type btn <?php echo ($level != 1) ? 'btn-primary' : 'btn-dark';?> font-weight-600">
                                <input type="radio" class="filter type" data-type="0" value="1" name="options">Học Sinh
                            </label>
                            <label class="type btn btn-dark font-weight-600">
                                <input type="radio" class="filter type" data-type="0" value="2" name="options"> Giáo Viên
                            </label>
                        </div>
                    </div>
                </div>
                <?php if ($level > 1) { ?>
                <div class="col-12 text-center">
                    <div class="block-27">
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <?php if ($level == 6) { ?>
                                        <li class="active"><a href="#" class="big filter class" data-type="1">Mầm Non</a></li>
                                    <?php } else { ?>
                                        <li class="big class">Lớp</li>
                                        <?php } ?>
                                    <?php if ($level == 2 || $level == 6) { ?>
                                    <li <?php echo ($level != 6) ? 'class="active"' : ''?>><a href="#" class="filter class" data-type="1">1</a></li>
                                    <li><a href="#" class="filter class" data-type="1">2</a></li>
                                    <li><a href="#" class="filter class" data-type="1">3</a></li>
                                    <li><a href="#" class="filter class" data-type="1">4</a></li>
                                    <li><a href="#" class="filter class" data-type="1">5</a></li>
                                    <?php }
                                    if ($level == 3 || $level == 6) { ?>
                                    <li <?php echo ($level == 3) ? 'class="active"' : ''?>><a href="#" class="filter class" data-type="1">6</a></li>
                                    <li><a href="#" class="filter class" data-type="1">7</a></li>
                                    <li><a href="#" class="filter class" data-type="1">8</a></li>
                                    <li><a href="#" class="filter class" data-type="1">9</a></li>
                                    <?php }
                                    if ($level == 4 || $level == 6) { ?>
                                    <li <?php echo ($level == 4) ? 'class="active"' : ''?>><a href="#" class="filter class" data-type="1">10</a></li>
                                    <li><a href="#" class="filter class" data-type="1">11</a></li>
                                    <li><a href="#" class="filter class" data-type="1">12</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } if ($level > 1) { ?>             
                <div class="col-lg-12 ">
                    <div class="container" style="width: fit-content; margin-bottom: 5%;">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <?php                                                                 
                                $num = 1;
                                foreach ($categories as $cate) { ?>
                                    <label class="category btn btn-<?php echo ($num == 1 && $level != 1) ? 'primary' : 'dark' ?> font-weight-600 ">
                                        <input type="radio" class="filter category" data-type="2" value="<?= $cate['id'] ?>" name="" id="" class="filter" ><?=$cate['name']?>
                                    </label>                                    
                                <?php $num++; 
                                } ?>                            
                        </div>
                    </div>
                </div>
                <?php } ?>
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
                            <a href="<?=$link?>" class="img" style="background-image: url(<?=PATH_IMG_SITE?>/<?= $product['img']?>);">
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

            <?php require 'right.php'; ?>
            
        </div>
</section>
