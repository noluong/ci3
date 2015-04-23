<div id="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flexslider">
                  <ul class="slides">
                    <?php
                        if($slider){
                            foreach ($slider as $key => $item) {
                    ?>
                        <li>
                            <div class="slider-caption">
                                <h1 itemprop="name">Vay tín dụng tiêu dùng </h1>
                                <a href="<?php echo $item->link; ?>" itemprop="url">Đăng ký ngay</a>
                            </div>
                          <img src="<?php echo UPLOAD_SLIDER.$item->photo; ?>" alt="vay-tieu-dung-moi-doi-tuong-vpbank" />
                        </li>    
                    <?php
                            }
                        }
                    ?>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>