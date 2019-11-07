<?php
	$data = array(
		'title' => $this->uri->segment(1),
		'method' => $this->uri->segment(2)
	);
?>
<?php $this->load->theme_view('includes/sections/header', $data);?>

<?php $this->load->theme_view('includes/sections/sidebar',array() );?>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url('index.php');?>/"/>

<div class="content-wrapper">
	<div class="div-principal-wrapper wrapper wrapper-content" id="div-principal-wrapper">
		<div id="tabs">
		  <ul class="nav nav-tabs">
		  	
		  </ul>
		</div>
	</div>
</div>
<?php $this->load->theme_view('includes/sections/footer', $data);?>