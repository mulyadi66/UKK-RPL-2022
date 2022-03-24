<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/tambah" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nomor Kamar</label>
<input type="text" name="txtNoKamar"
class="form-control" placeholder="Masukan nomor kamar, misal : 1A" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold"> Tipe Kamar</label>
<select class="form-control" name="txtInputTipeKamar" required>
        <option value="">No Selected</option>
        <?php foreach($ListTipe as $row):?>
        <option value="<?php echo $row['id_fasilitas'];?>"><?php echo $row['tipe_kamar'];?></option>
        <?php endforeach;?>
</select>
</div>
<div class="form-group">
<label class="font-weight-bold">Tarif Kamar /per malam</label>
<input type="text" name="txtTarif" class="form-control" placeholder="Masukan tarif kamar" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto Kamar</label>
<input type="file" name="txtInputFoto" class="form-control">
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Kamar</button>
</div>
</form>
<?=$this->endSection();?>