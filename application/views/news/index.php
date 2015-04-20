<?php $html_head = array(
'title'       => $news->title,
'description' => $news->description,
'keywords'    => $news->keywords,
);
$this->load->view('includes/header', $html_head);?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2><?=$news->title?></h2>
                    <span>Trang chủ / <a href="/vay-tin-dung-tieu-dung/<?=$news->title_seo?>/<?=$news->id?>"><?=$news->title?></a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="product-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h1><?=$news->title?></h1>
                    <img src="<?=VIEW_THEME?>images/under-heading.png" alt="<?=$news->title?>" />
                </div>
            </div>
        </div>
        <div id="single-blog" class="page-section first-section">
            <div class="container">
                <div class="row">
                    <div class="product-item col-md-12">
                        <div class="row">
                            <div class="col-md-8">  
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h3><?=$news->title?></h3>
                                        </div>
                                        <?=$news->content?>
                                    </div>
                                    <div class="divide-line">
                                    <img src="<?=VIEW_THEME?>images/div-line.png" alt="" />
                                    </div>
                                    <div class="comments-title">
                                        <div class="comment-section">
                                            <h4>Comments</h4>
                                        </div>
                                    </div>
                                     <div class="comments">
	                                    <div class="fb-comments" data-href="<?=current_url()?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
	                                </div>
                            </div>
                           <?php $this->load->view('includes/sidebar');?>   
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</div>


<?php $this->load->view('includes/footer');?>