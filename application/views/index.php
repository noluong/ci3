<?php $html_head = array(
'title'       => $setting->title,
'description' => $setting->description,
'keywords'    => $setting->keywords,
);
$this->load->view('includes/header', $html_head);
$this->load->view('includes/slider');?>
<div id="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>Chương trình vay tín dụng tiêu dùng</h2>
                    <img src="<?=VIEW_THEME?>images/under-heading.png" alt="chuong-trinh-vay-tin-dung-tieu-dung" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="<?=VIEW_THEME?>images/vay-tin-dung-tieu-dung.jpg" alt="vay-tin-dung-tieu-dung" />
                    </div>
                    <div class="blog-content">
                        <div class="content-show" >
                            <h4 itemprop="name"><a itemprop="url" href="/vay-tin-dung-tieu-dung/">Vay tín dụng tiêu dùng</a></h4>
                        </div>
                        <div class="content-hide">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
             <?php 
            if($consumer_credit){
                foreach ($consumer_credit as $key => $item) {
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="<?=UPLOAD_NEWS.$item['photo']?>" alt="<?=$item['title_seo']?>" />
                    </div>
                    <div class="blog-content">
                        <div class="content-show">
                            <h4 itemprop="name"><a itemprop="url" href="/vay-tin-dung-tieu-dung/<?=$item['title_seo']?>/<?=$item['id']?>" rel="category tag"><?=$item['title']?></a></h4>
                        </div>
                        <div class="content-hide" itemprop="articleSection">
                            <p><?=$item['summary']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>

           
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer');?>