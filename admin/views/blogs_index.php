<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Product</h4>
                        <p class="text-muted font-14 mb-3">
                        This is product.
                        </p>
                        <table class="table mb-0" id="table_product">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5px">STT</th>
                                    <th width="120px">Tên</th>
                                    <th width="20px">Hình</th>                                    
                                    <th width="55px">Ngày</th>
                                    <th width="55px">Mô Tả</th>
                                    <th width="5px">Xóa</th>
                                    <th width="5px">Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stt = 0;

                            foreach ( $list as $row) {
                                $stt++;
                                
                                $linkDel = "'?ctrl=blogs&act=delete&id=" . $row['id'] . "'";
                                $linkEdit = '?ctrl=blogs&act=edit&id=' . $row['id'];
                             
                                $img = PATH_IMG_SITE . explode(",", $row['img'])[0];
                                
                                echo '<tr style="background-color:#efefef;color:black">
                                    <td>' . $stt . '</td>
                                    <td class="" >' . $row['name'] . '</td>
                                    <td><img style="object-fit:cover;" class="img-admin" width="100" height="100" src="' . $img . '"></td>
                                    <td> ' . date('m/d/Y H:i:s', $row['date']) . '</td>
                                    <td> ' . addslashes(substr($row['description'],0,50)) . '</td>
                                    <td><div  onclick="checkDelete(' . $linkDel . ')"  class="btn btn-danger" role="button"><i class="fa fa-trash"></i></div></td>
                                    <td><a href=""><a name="" id="" class="btn btn-primary" href="' . $linkEdit . '" role="button"><span class="mdi mdi-pencil"></span></a></a></a></td>
                                </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row d-flex justify-content-end">
                <div class="col-lg-5">
                    <nav>
                        <ul class="pagination pagination-split">

                        </ul>
                    </nav>
                </div>
            </div>
        </div> 
    </div> 
</div>
