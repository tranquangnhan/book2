<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Danh mục</h4>                    
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th width="50%">Video</th> 
                                    <th width="50%">Tên</th> 
                                    <th>Sửa</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                $stt = 0;
                                foreach ($list as $row) {
                                    $stt++;
                                    $linkEdit = '?ctrl=video&act=edit&id='.$row['id'];
                                                                        
                                    echo '<tr>
                                            <td>'.$stt.'</td>
                                            <td><iframe width="200px" height="100px" src="https://www.youtube.com/embed/'.$row['linkyoutube'].'"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe></td>
                                            <td>'.$row['name'].'</td>
                                            <td><a><a name="" id="" class="btn btn-primary" href="'.$linkEdit.'" role="button"><i class="fa fa-edit"></i></a></a></a></td>
                                        </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>      
        </div> 
    </div> 
</div>
