<?php $html_head = array(
'title'=>'Tư vấn vay tín dụng tiêu dùng',
'description'=>'Tư vấn vay tín dụng tiêu dùng ngân hàng vpbank',
'keywords'=>'tu-vay-vay-tin-dung-vpbank, vay-tin-dung-tieu-dung-vpbank',
);
$this->load->view('includes/header', $html_head);?>


<div id="product-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h1>Tư vấn vay tín dụng tiêu dùng</h1>
                    <img src="<?=VIEW_THEME?>images/under-heading.png" alt="Tư vấn vay tín dụng tiêu dùng" />
                </div>
            </div>
        </div>
        <div id="single-blog" class="page-section first-section">
            <div class="container">
                <div class="row">
                    <div class="product-item col-md-12">
                        <div class="row">
                            <div class="col-md-8">  
                            <?php 
                            if($advisory_s){
                                foreach ($advisory_s as $key => $item) {
                            ?>
                                <article class="post type-post status-publish format-standard hentry post-entry animate blog-style-1" data-effect="fadeInUp" itemscope itemtype="http://schema.org/Article">
                                    <aside class="post-date-type">
                                        <div class="date entry-date updated" itemprop="datePublished">
                                            <div class="day"><?php echo date("d", strtotime($item['created']));?></div>
                                            <div class="month-year"><?php echo date("m-Y", strtotime($item['created']));?></div>
                                        </div>
                                        <div class="post-type"><i class="fa fa-file"></i></div>
                                    </aside>
                                    <section class="post-content">
                                        <header class="entry-header">
                                            <h3 class="entry-title" itemprop="name">
                                                <a href="/tu-van-vay-tieu-dung/<?php echo $item['title_seo'];?>/<?php echo $item['id'];?>" itemprop="url"><?php echo $item['title'];?></a>
                                            </h3>            
                                            <div class="entry-meta">
                                                <span class="author vcard">
                                                <a class="url fn n" href="" rel="author">
                                                <span itemprop="author">Admin</span></a></span> đã viết <span class="cat-links" itemprop="genre">
                                                <a href="/tu-van-vay-tieu-dung/<?php echo $item['title_seo'];?>/<?php echo $item['id'];?>" rel="tag">Vay tiêu dùng ngân hàng vpbank</a>, 
                                                <a href="/tu-van-vay-tieu-dung/<?php echo $item['title_seo'];?>/<?php echo $item['id'];?>" rel="tag">Tư vấn vay tiêu dùng</a></span>
                                        .   </div>
                                        </header><!-- .entry-header -->
                                        <div class="entry-summary" itemprop="articleSection">
                                            <p><?php echo $item['summary'];?></p>
                                        </div><!-- .entry-summary -->
                                        <a class="more-link btn btn-border" href="/tu-van-vay-tieu-dung/<?php echo $item['title_seo'];?>/<?php echo $item['id'];?>">Chi tiết</a>    
                                    </section>
                                </article>
                                 <?php
                                    }
                                }
                                ?>
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