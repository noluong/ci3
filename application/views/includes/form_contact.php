<?php 
if($this->session->flashdata('msg')){
    echo "<div class='success green'>".$this->session->flashdata('msg')."</div>";
}
if($this->session->flashdata('error')){
    echo "<div class='error'>".$this->session->flashdata('error')."</div>";
}
?>
<?php echo form_open('/contact/send/', ['class' => 'send-message']);?>
    <div class="row">
        <div class="name col-md-12">
            <input type="text" name="contact[name]" value="<?php echo set_value('contact[name]', @$contact->name); ?>" id="name" class="form_input" placeholder="Tên" />
            <?php echo form_error("contact[name]");?>
        </div>
    </div>
    <div class="row">
        <div class="email col-md-12">
            <input type="text" name="contact[phone]" value="<?php echo set_value('contact[phone]', @$contact->phone); ?>" id="phone" class="form_input" placeholder="Điện thoại" />
            <?php echo form_error("contact[phone]");?>
        </div>
    </div>
    <div class="row">
        <div class="email col-md-12">
            <input type="text" name="contact[email]" value="<?php echo set_value('contact[email]', @$contact->email); ?>" id="email" class="form_input" placeholder="Email" />
            <?php echo form_error("contact[email]");?>
        </div>
    </div>
    <div class="row">
        <div class="subject col-md-12">
            <input type="text" name="contact[address]" value="<?php echo set_value('contact[address]', @$contact->address); ?>" id="address" class="form_input" placeholder="Địa chỉ" />
            <?php echo form_error("contact[address]");?>
        </div>
    </div>
    <div class="row">
        <div class="subject col-md-12">
            <input type="text" name="contact[summary]" value="<?php echo set_value('contact[summary]', @$contact->summary); ?>" id="summary" class="form_input" placeholder="Chương trình vay" />
            <?php echo form_error("contact[summary]");?>
        </div>
    </div>
    <div class="row">
        <div class="subject col-md-12">
            <input type="text" name="contact[subject]" value="<?php echo set_value('contact[subject]', @$contact->subject); ?>" id="subject" class="form_input" placeholder="Tiêu đề" />
            <?php echo form_error("contact[subject]");?>
        </div>
    </div>
    <div class="row">        
        <div class="text col-md-12">
            <textarea name="contact[content]" placeholder="Nội dung"><?php echo set_value('contact[content]', @$contact->content); ?></textarea>
            <?php echo form_error("contact[content]");?>
        </div>   
    </div>                              
    <div class="send">
        <input type="submit" name="submit[confirm]"  value="Gửi" />
    </div>
<?php echo form_close();?>