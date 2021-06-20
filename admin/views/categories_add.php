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

                        <h4 class="header-title mt-0 mb-3">Danh mục</h4>

                        <form data-parsley-validate id="form_category" novalidate onsubmit="return submitForm()" method="post">
                            <div class="form-group">
                                <label for="">Tên Danh Mục</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="name"  parsley-trigger="change" required
                                            placeholder="Sản phẩm" class="form-control" >
                            </div>                

                            <div class="form-group text-right mb-0 ">
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm mới">
                                <a href="<?=ROOT_URL?>/admin/?ctrl=categories" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>