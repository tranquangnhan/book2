<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Giới Thiệu</h4>
                        <!-- <p class="text-muted font-14 mb-3">
                        This is product.
                        </p> -->
                        <table class="table mb-0 table-striped" id="table_product">
                            <thead class="thead-light">
                                <tr>
                                    <th width="">STT</th>
                                    <th width="">Tên</th>                                                                       
                                    <th width="50%">Nội dung/Link</th> 
                                    <th width="150px" class="text-center" >Thứ tự</th>                                                                                                          
                                    <th width="">Xóa</th>
                                    <th width="">Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stt = 0;

                            foreach ( $list as $row) {  
                                $stt++;
                                
                                $linkDel = "'?ctrl=about&act=delete&id=" . $row['id'] . "'";
                                $linkEdit = '?ctrl=about&act=edit&id=' . $row['id'];                                
                                $noidung = trim(strip_tags($row['content']));
                                ?>
                                <tr>
                                    <td><?=$stt?></td>
                                    <td class="" ><?=$row['name']?></td>
                                    
                                    <?php 
                                        if ($row['link'] != '') { ?>
                                            <td class="" ><a href="<?=$row['link']?>"><?=$row['link']?></a></td>
                                        <?php } else { ?>
                                            <td class="limit-text-3" ><?=$noidung?></td>  
                                            <!-- content-about -->
                                    <?php } ?>
                                                                  
                                    <td class="text-center"><?= ($row['ordinal'] == 0) ? 'Ẩn' : $row['ordinal']?></td>

                                    <td><div  onclick="checkDelete(<?=$linkDel?>)"  class="btn btn-danger" role="button"><i class="fa fa-trash"></i></div></td>
                                    <td><a class="btn btn-primary" href="<?=$linkEdit?>" role="button"><span class="mdi mdi-pencil"></span></a></td>
                                </tr>   
                                <?php } ?>
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
