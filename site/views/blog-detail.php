<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-detail">
                    <div class="blog-header">
                        <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated">
                            <h3 class="text-uppercase"><?=$oneBlog['name'] ?></h3>
                            <small><?= date('m/d/Y', $oneBlog['date'])  ?></small>
                        </div>
                    </div>
                    <div class="blog-content col-md-12 mt-4">
                         <?=addslashes($oneBlog['content'])?>
                    </div>
                </div>
            </div>
            <?php require 'right.php';?>
        </div>
</section>
