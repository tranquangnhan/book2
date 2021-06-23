<?php if (isset($test)) {
    echo '123';
    exit();
}?>
<div class="col-lg-3 sidebar fixed-location">
    <div class="right fix">
        <div class="sidebar-box bg-white ftco-animate">
            <form action="<?=ROOT_URL?>/san-pham" method="post" class="search-form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-10 p-r-0">
                        <input type="text" name="keysearch" class="form-control" placeholder="Search...">
                    </div>
                    <div class="col-lg-2">
                        <button style="background: none;border: none;" type="submit"><span type="submit" class="icon fa fa-search"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="sidebar-box bg-white ftco-animate">
            <h3 class="heading-sidebar">Tin Mới</h3>
            <?php
                foreach ($getLastestNews as $row) {
                    $id = $row['id'];
                    $link = ROOT_URL . "/bai-viet/" . $row['slug'] . '-' . $id;
                    $img = PATH_IMG_SITE . explode(",", $row['img'])[0];
                    echo '<div class="container-sider">
                            <div class="left-sider">
                                <a href="' . $link . '">
                                    <img src="' . $img . '" width="50%" alt="">
                                </a>
                            </div>
                            <div class="containerright-sider">
                                <div class="row pb-4">
                                    <div class="col-md-7 heading-section ftco-animate">
                                        <a href="' . $link . '"><h6>' . substr($row['name'], 0, 50) . '</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>';
                }
                ?>
        </div>

        <div class="sidebar-box bg-white p-4 ftco-animate ">
            <h3 class="heading-sidebar color-main">Youtube Sách Mềm</h3>
            <!-- <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?=$video['linkyoutube']?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe> -->
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="g-ytsubscribe" data-channelid="UCGzhS0mRNympJQQ0PStn7CQ" data-layout="full" data-count="default"></div>
        </div>

        <div class="sidebar-box bg-white p-4 ftco-animate">
            <h3 class="heading-sidebar">Fanpage</h3>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsachmem.vn&tabs=timeline&width=220&height=220&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1259082827813860" 
                width="100%" height="220" style="border:none;overflow:hidden" 
                scrolling="no" frameborder="0" allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
        </div>
    </div>
</div>