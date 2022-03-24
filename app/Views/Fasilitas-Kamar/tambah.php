<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitas/tambah" >
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtKamar"class="form-control" placeholder="Masukan Tipe kamar" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold">Fasilitas Kamar</label>
<input type="text" name="txtFasilitas"class="form-control" placeholder="Masukan Fasilitas kamar">
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan</button>
</div>
</form>
<?=$this->endSection();?>