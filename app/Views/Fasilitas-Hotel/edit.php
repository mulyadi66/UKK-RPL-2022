<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitashotel/edit" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Fasilitas Hotel</label>
<input type="text" name="txtFasilitas"class="form-control"  value="<?=$detailFasilitasHotel['jenis'];?>">
<input type="hidden" name="txtId"  value="<?=$detailFasilitasHotel['idfasilitas'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi</label>
<input type="text" name="txtDes" class="form-control" value="<?=$detailFasilitasHotel['deskripsi'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto</label><br/>
<input type="hidden" name="txtFoto"  value="<?=$detailFasilitasHotel['gambar'];?>">
<?php
    if (!empty($detailFasilitasHotel['gambar'])) {
    echo '<img src="'.base_url("/gambar/".$detailFasilitasHotel['gambar']).'" width="150">';
    }
?>
<input type="file" name="txtFotoFasilitas" class="form-control"/>
</div>
<div class="form-group">
<button class="btn btn-primary">Update</button>
</div>
</form>
<?=$this->endSection();?>