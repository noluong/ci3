<?php $html_head = array(
'pageID' => 'pageHome',
'title'=>'',
'description'=>'',
'keywords'=>'',
'canonical'=>'',
'css'=> array('home')
);
$this->load->view('includes/header', $html_head);?>
<div class="container">
	<!-- Image Slider -->
		<ul id="slider" class="slider">
	      <li><img src="/public/sp/images/stock/6.jpg" alt="" /></li>
	      <li><img src="/public/sp/images/stock/2.jpg" alt="" /></li>
	      <li><img src="/public/sp/images/stock/3.jpg" alt="" /></li>
	      <li><img src="/public/sp/images/stock/4.jpg" alt="" /></li>
	      <li><img src="/public/sp/images/stock/5.jpg" alt="" /></li>
	      <li><img src="/public/sp/images/stock/1.jpg" alt="" /></li>
	    </ul>
<div class="content">
	<h2>Welcome</h2>
	<p>Good news, everyone! I've taught the toaster to feel love! You guys go on without me! I'm going to go… look for more stuff to steal! Oh right.</p>
	<p>Good news, everyone! I've taught the toaster to feel love! You guys go on without me! I'm going to go… look for more stuff to steal! Oh right.</p>
	<p>Good news, everyone! I've taught the toaster to feel love! You guys go on without me! I'm going to go… look for more stuff to steal! Oh right.</p>
</div> <!-- content -->
	<hr class="separator"/>
		<aside>
			<a name="menu"></a>
				<ul class="menu">
					<li class="icon home"><a href="index.html">Home</a></li>
					<li class="icon info"><a href="about.html">About</a></li>
					<li class="icon gear"><a href="services.html">Services</a></li>
					<li class="icon bubble"><a href="contact.html">Contact Us</a></li>
					<li class="icon add"><a href="referance.html">Referance</a></li>
				</ul>
		</aside>
</div> <!-- container -->
<?php $this->load->view('includes/footer');?>