<?php $html_head = array(
'title'       => 'liên hệ đăng ký vay tín dụng tiêu dùng ngân hàng vpbank',
'description' => 'liên hệ đăng ký vay tín dụng tiêu dùng ngân hàng vpbank',
'keywords'    => 'dang ky vay tin dung ngan hang vpbank',
);
$this->load->view('includes/header', $html_head);?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Liên hệ</h2>
                    <span>Trang chủ / <a href="<?=current_url()?>">Liên hệ</a></span>
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
                    <h2>Liên hệ đăng ký vay</h2>
                    <img src="<?=VIEW_THEME?>images/under-heading.png" alt="" >
                </div>
            </div>
        </div>
        <div id="contact-us">
            <div class="container">
                <div class="row">
                    <div class="product-item col-md-12">
                        <div class="row">
                            <div class="col-md-8">  
                                <div class="message-form">
                                    <?php $this->load->view('includes/form_contact');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <p>Xin vui lòng thông tin vào form liên hệ. <br /> Chúng tôi sẽ liên hệ ngay với bạn.</p>
                                    <ul>
                                         <li><i class="fa fa-phone"></i><a href="tel:<?php echo $setting->phone?>"><?php echo $setting->phone?></a></li>
                                        <li><i class="fa fa-globe"></i><?php echo $setting->address?></li>
                                        <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $setting->email?>"><?php echo $setting->email?></a></li>
                                    </ul>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>


<?php $this->load->view('includes/footer');?>