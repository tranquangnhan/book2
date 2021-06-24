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

                        <form data-parsley-validate id="formabout" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php if($message) echo "<h2 class='text-danger'>".$mesage."</h2>"; ?>    
                                <?php if ($_SESSION['message']) echo "<h2 class='text-danger text-center'>". $_SESSION['message'] ."</h2>"; ?>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Tên Giới Thiệu</label><span style="color:red;"> (* Ngắn)</span>
                                        <input type="text" name="name"  parsley-trigger="change" required
                                            placeholder="80 kí tự" class="form-control" >
                                    </div>
                                </div>           
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="radio" id="content" class="checkabout" name="checkabout" checked value="0">
                                    <label for="content">Nội dung</label>
                                    <input type="radio" id="link" class="checkabout" name="checkabout" value="1">
                                    <label for="Link">Link</label><br>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="anhienAbout" value="1">
                                        <label class="form-check-label" for="anhienAbout">
                                            Ẩn
                                        </label>
                                    </div>                          
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link giới thiệu</label><span style="color:red;"> (* Ngắn)</span>
                                        <input type="text" name="link" id="iplink"  parsley-trigger="change" required placeholder="80 kí tự" class="form-control" disabled>
                                    </div>
                                </div>  
                                <!-- <div class="col-lg-6">
                                
                                    <div class="form-group">
                                        <label for=""></label><span style="color:red;"> (* Lớn hơn 0)</span>
                                        <input type="number" min="1"  parsley-trigger="change" required placeholder="80 kí tự" class="form-control">
                                    </div>
                                </div>       -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Thứ tự</label><span style="color:red;"> (* đổi vị trí lên đầu)</span>
                                        <select class="form-control" name="ordinal" id="thutu">
                                            <option value="<?=$maxOrdinal + 1?>">1 - Đầu tiên</option>;
                                                                                        
                                            <?php $stt = 1; foreach ($list as $row) { $stt++; ?>                                                
                                                <option value="<?=$row['ordinal']?>"><?=$stt?> - <?=$row['name']?></option>;
                                            <?php } ?>
                                        </select>
                                    </div>                                                
                                </div>   
                            </div>
                            
                            <label for="">Nội dung</label>
                            <textarea id="editor1"  style="height: 300px;width:100%" name="content-about">                            
                            </textarea>                                                                                    
                            
                            <div class="form-group text-right mb-0 mt-5">
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm" id='add_product'>
                                <a href="<?=ROOT_URL?>/admin/?ctrl=about&act=index" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>