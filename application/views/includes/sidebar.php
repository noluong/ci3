<div class="col-md-3 col-md-offset-1">
    <div class="side-bar">
        <div class="news-letters">
            <h4>Vay tín dụng tiêu dùng</h4>
            <div class="archives-list">
                <ul>
                	<?php 
						if($consumer_credit){
						    foreach ($consumer_credit as $key => $item) {
						?>
						<li itemprop="name"><a itemprop="url" href="/vay-tin-dung-tieu-dung/<?=$item['title_seo']?>/<?=$item['id']?>" title="<?=$item['title']?>"><i class="fa fa-angle-right"></i><?=$item['title']?></a></li>
						<?php
						    }
						}
					?>
                </ul>
            </div>        
        </div>
        <div class="recent-post">
            <h4>Đăng ký vay</h4>
            <div class="posts">
           
                    <?php $this->load->view('includes/form_contact');?>
         
            </div> 
        </div>
    </div>
</div>  

