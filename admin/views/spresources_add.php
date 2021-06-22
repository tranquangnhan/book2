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
                                        <img id="reviewImage" width="200px" src="#" alt="your image" />
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
                                        <input type="text" name="name"  parsley-trigger="change" required
                                            placeholder="Tài nguyên" class="form-control" >
                                    </div>
                                </div>          
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Class</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="class">                                            
                                            <option value="0">Mầm Non</option>
                                            <option value="1">Lớp 1</option>
                                            <option value="2">Lớp 2</option>
                                            <option value="3">Lớp 3</option>
                                            <option value="4">Lớp 4</option>
                                            <option value="5">Lớp 5</option>
                                            <option value="6">Lớp 6</option>
                                            <option value="7">Lớp 7</option>
                                            <option value="8">Lớp 8</option>
                                            <option value="9">Lớp 9</option>
                                            <option value="10">Lớp 10</option>
                                            <option value="11">Lớp 11</option>
                                            <option value="12">Lớp 12</option>
                                        </select>
                                    </div>                                                
                                </div>  
                            </div>                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Link tài nguyên</label><span style="color:red;"></span>
                                        <input type="text" name="link"  parsley-trigger="change"
                                            placeholder="Link tài nguyên..." class="form-control" >
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