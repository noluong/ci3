<footer>
    <div class="container">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-9">
                    <div class="subscribe-form">
                        <a href="/contact"><span>Đăng ký tư vấn vay tiêu dùng miễn phí</span></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-bottom">
                        <span>Mạng xã hội:</span>
                        <ul>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <div class="row">
                <div class="col-md-4">
                    <div class="shop-list">
                        <h4 class="footer-title">Chương trình vay tiêu dùng</h4>
                        <ul>
                            <?php 
                            if($consumer_credit){
                                foreach ($consumer_credit as $key => $item) {
                            ?>
                            <li><a href="/vay-tin-dung-tieu-dung/<?=$item['title_seo']?>/<?=$item['id']?>" title="<?=$item['title']?>"><i class="fa fa-angle-right"></i><?=$item['title']?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-posts">
                        <h4 class="footer-title">Tin Tức</h4>
                        <?php 
                            if($new_footer){
                                foreach ($new_footer as $key => $item) {
                            ?>
                            <div class="recent-post">
                                <div class="recent-post-thumb">
                                    <img src="<?=UPLOAD_NEWS.$item['photo']?>" alt="<?=$item['title']?>">
                                </div>
                                <div class="recent-post-info">
                                    <h6><a href="/tin-tuc/<?=$item['title_seo']?>/<?=$item['id']?>"><?=$item['title']?></a></h6>
                                    <span><?=date("d/m/Y", strtotime($item['created']))?></span>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="more-info">
                        <h4 class="footer-title">Liên hệ</h4>
                        <ul>
                            <li><i class="fa fa-phone"></i><a href="tel:<?php echo $setting->phone?>"><?php echo $setting->phone?></a></li>
                            <li><i class="fa fa-globe"></i><?php echo $setting->address?></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $setting->email?>"><?php echo $setting->email?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p>Copyright © 2015 <a href="http://vaytindungvpbank.com.vn">Vay tín dụng tiêu dùng VPBank</a></p>
        </div>
        
    </div>
</footer>   