<?php
	$data = array(
		'title' => $this->uri->segment(1),
		'method' => $this->uri->segment(2)
	);
?>
<?php $this->load->view('includes/sections/header', $data);?>
<input type="hidden" name="base_url" id="base_url" value="<?= base_url()?>"/>
<div class="content-wrapper">
	<div class="div-principal-wrapper wrapper wrapper-content" id="div-principal-wrapper">
        <h1> Cargando </h1>
	</div>
</div>


<?php $this->load->view('includes/sections/footer', $data);?>