<?php
    ($oneRecode['class']) == '0' ? $class = 'Mầm non' : $class = $oneRecode['class'];
    
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Sản phẩm</h4>

                        <form data-parsley-validate id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php if($message) echo "<h2 class='text-danger'>".$mesage."</h2>"; ?>    
                                <?php if ($_SESSION['message']) echo "<h2 class='text-danger text-center'>". $_SESSION['message'] ."</h2>"; ?>
                            </div>

                            <div class="boxform boxshowimg ">
                                <div class="ouputimg">
                                    <br>
                                    <div class="output-fet w-100 text-center">
                                        <?php $img = PATH_IMG_SITE . $oneRecode['img']; ?>
                                        <img id="reviewImage" style="object-fit: cover;" width="200px" src="<?=$img?>" alt="your image" />
                                    </div>
                                    <a href="#" id="clearReviewImage">Xoá</a>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <div class="inputhinh">
                                    <label for="">Image Url</label><span style="color:red;"> (*)</span>
                                    <input type="file" name="img[]" style=" position: absolute;" class="imageresources" id="imageresources">
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tên tài nguyên</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="name"  parsley-trigger="change" required value="<?=$oneRecode['name']?>" placeholder="Tài nguyên" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Class</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="class">      
                                            <option value="<?=$oneRecode['class']?>">Lớp - <?= $class ?></option>  
                                            <?php 
                                                for ($i = 0; $i < 13; $i++) {
                                                    if ($i != $oneRecode['class']) { 
                                                        if ($i == 0) { ?>
                                                            <option value="<?= $i ?>">Mầm Non</option>
                                                        <?php } else { ?>
                                                        <option value="<?= $i ?>">Lớp - <?= $i ?></option>
                                                    <?php }
                                                    }
                                                }
                                            ?>
                                            <!-- <option value="0">Mầm Non</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option> -->
                                        </select>
                                    </div>                                                
                                </div> 
          
                            </div>          

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Link tài nguyên</label><span style="color:red;"></span>
                                        <input type="text" name="link"  parsley-trigger="change" value="<?=$oneRecode['link']?>" placeholder="Link tài nguyên..." class="form-control" >
                                    </div>
                                </div>              
                            </div>
                                                                                                        
                            <div class="form-group text-right mb-0 mt-5">
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm" id='add_supportresources'>
                                <a href="<?=ROOT_URL?>/admin/?ctrl=supportresources&act=index" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>