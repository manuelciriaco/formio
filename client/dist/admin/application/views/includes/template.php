<?php
	$data = array(
		'title' => $this->uri->segment(1),
		'method' => $this->uri->segment(2)
	);
?>
<?php $this->load->view('includes/sections/header', $data);?>

<div class="content-wrapper">
	<div class="div-principal-wrapper wrapper wrapper-content" id="div-principal-wrapper">
        <h1> hola mundo </h1>
	</div>
</div>


<?php $this->load->view('includes/sections/footer', $data);?>