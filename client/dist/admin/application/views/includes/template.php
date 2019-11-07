<?php
	$data = array(
		'title' => $this->uri->segment(1),
		'method' => $this->uri->segment(2)
	);
?>
<?php $this->load->view('includes/sections/header', $data);?>
<input type="hidden" name="base_url" id="base_url" value=""/>

<div class="content-wrapper">
	<div class="div-principal-wrapper wrapper wrapper-content" id="div-principal-wrapper">
		<div id="tabs">
		  <ul class="nav nav-tabs">
		  	
		  </ul>
		</div>
	</div>
</div>
<?php $this->load->view('includes/sections/footer', $data);?>