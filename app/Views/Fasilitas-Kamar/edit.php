<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitas/edit" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtKamar"class="form-control"  value="<?=$detailFasilitas['tipe_kamar'];?>">
<input type="hidden" name="txtIdKamar"class="form-control"  value="<?=$detailFasilitas['id_fasilitas'];?>" readonly>
</div>
<div class="form-group">
<label class="font-weight-bold">Fasilitas Kamar</label>
<input type="text" name="txtFasilitas" class="form-control" value="<?=$detailFasilitas['fasilitas'];?>">
</div>
<div class="form-group">
<button class="btn btn-primary">Update</button>
</div>
</form>
<?=$this->endSection();?>