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

                        <h4 class="header-title mt-0 mb-3">Bài Viết</h4>

                        <form data-parsley-validate id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php if($message) echo "<h2 class='text-danger'>".$mesage."</h2>"; ?>    
                                <?php if ($_SESSION['message']) echo "<h2 class='text-danger text-center'>". $_SESSION['message'] ."</h2>"; ?>
                            </div>

                            <div class="boxform boxshowimg ">
                                <div class="ouputimg">
                                    <br>
                                    <div class="output-fet"><output id="list"></output></div>
                                    <a href="#" id="clear">Xoá</a>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <label for="">Image</label><span style="color:red;"> (*)</span>
                                <br>
                                <?php
                                    $img = PATH_IMG_SITE.explode(",",$oneRecode['img'])[0];
                                ?>
                                <img width="200" style="object-fit: cover;" height="200" src="<?= $img?>" alt="">
                                <br>
                                <input class="mt-2" type="file" name="img[]" multiple>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Tên Bài Viết</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="name" value="<?=$oneRecode['name']?>"  parsley-trigger="change" required
                                            placeholder="Sản phẩm" class="form-control" >
                                    </div>
                                </div>
           
                            </div>

                            <div class="row">
                               
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Source</label><span style="color:red;"> </span>
                                        <input type="text" name="source" value="<?=$oneRecode['source']?>"  parsley-trigger="change" 
                                            placeholder="Source"  class="form-control" >
                                    </div>
                                </div> 
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Danh Mục</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="iddm">                                            
                                           <?php 
                                            foreach ($showDmBlog as $row) {
                                                if($row['id'] == $oneRecode['iddm']){
                                                    echo '<option selected value="'.$row['id'].'">'.$row['name'].'</option>';
                                                }else{
                                                    echo '<option  value="'.$row['id'].'">'.$row['name'].'</option>';
                                                }
                                            }
                                           ?>
                                        </select>
                                    </div>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Mô tả</label><span style="color:red;"> (*)</span>
                                            <textarea name="description" width="100%" class="form-control" id="" cols="8" rows="3"><?=$oneRecode['description']?></textarea>
                                        </div>
                                </div>
                                        
                            </div>
                            
                            
                            <label for="">Mô tả</label>
                            <textarea id="editor1"  style="height: 300px;width:100%" name="content" >   
                            <?=$oneRecode['content']?>                         
                            </textarea>                                                                                    
                            
                            <div class="form-group text-right mb-0 mt-5">
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Sửa" id='add_product'>
                                <a href="<?=ROOT_URL?>/admin/?ctrl=blogs&act=index" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>