<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Giới Thiệu</h4>
                        
                        <table class="table mb-0 table-striped" id="table_product">
                            <thead class="thead-light">
                                <tr>
                                    <th width="">STT</th>
                                    <th width="">Tên</th>           
                                    <th width="">Hình</th>                                                                                                
                                    <th width="20%">Link</th>   
                                    <th width="20%">
                                        <div class="row">
                                            <div class="col-2">Class</div>                                            
                                        </div>                                                                                
                                    </th>  
                                    <!-- <th width="10%">Xóa</th> -->
                                    <th width="10%">Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stt = 0;

                            foreach ($list as $row) {  
                                $stt++;
                                $img      = PATH_IMG_SITE . $row['img'];
                                $class    = ($row['class']==0) ? 'Mầm non' : $row['class'];
                                $linkDel  = "'?ctrl=supportresources&act=delete&id=" . $row['id'] . "'";
                                $linkEdit = '?ctrl=supportresources&act=edit&id=' . $row['id'];                                
                                $noidung  = trim(strip_tags($row['content']));                                
                                ?>
                                <tr>
                                    <td><?=$stt?></td>
                                    <td class="" ><?=$row['name']?></td>
                                    <td><img style="object-fit:cover;" class="img-admin" width="100" height="100" src="<?=$img?>"></td>                                    
                                    <td class="" ><a href="<?=$row['link']?>"><?=$row['link']?></a></td>                                                                  
                                    <td><?=$class?></td>
                                           
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
