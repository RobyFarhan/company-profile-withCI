public function edit_artikel ($id)
{

$where =  array(
'halaman_id'=>$id
);
$data['halaman']=$this->m_data->edit_data($where,'halaman')->result();
$this->load->view('dashboard/v_header');
$this->load->view('dashboard/v_artikel_edit',$data);
$this->load->view('dashboard/v_footer');
}

<div class="content-wrapper">
<section class="content-header">
<h1>
Pages
<small>Edit Halaman</small>
</h1>
</section>

<section class="content">

<a href="<?php echo base_url().'dashboard/pages';?>" class="btn btn-sm btn-primary">Kembali</a>

<br/>
<br/>

<?php foreach($halaman as $h){?>

<form method="post" action="<?php echo base_url('dashboard/pages_update')?>">
<div class="row">
<div class="col-lg-12">

<div class="box  box-primary">
<div class="box-body">

<div class="box-body">
<div class="form-group">
<label>judul</label>
<input type="hidden" name="id" value="<?php echo $h->halaman_id;?>">
<input type="text" name="judul" class="form-control" placeholder="masukkan judul halaman.." value="<?php 
echo $h->halaman_judul;?>">
<br/>
<?php echo form_error('judul');?>
</div>
</div>

</div>
</div>
<div class="box-body">
<div class="form-group">
<label>Konten</label>
<?php echo form_error('konten');?>
<br/>
<textarea class="form-control" id="editor" name="konten">
<?php eccho $h->halaman_konten; ?> </textarea>
</div>
</div>
<input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
</div>
</div>
</div>
</div>
</form>
<?php }?>
</section>
</div>

<--!DASHBOARD.PHP-->

public function pages_update()
{
	//wajib isi judul, konten
	$this->form_validation->set_rules('judul','judul','required');
	$this->form_validation->set_rules('konten','Konten','required');
	
	if($this->form_validation->run()!=false){
		$id=$this->input->post('id);
		$judul=$this->input->post('judul');
		$slug= strtolower(url_title($judul));