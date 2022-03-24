<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/edit" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nomor Kamar</label>
<input type="text" name="txtNoKamar"class="form-control"  value="<?=$detailKamar['no_kamar'];?>">
<input type="hidden" name="txtIdKamar"class="form-control"  value="<?=$detailKamar['id_kamar'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold"> Tipe Kamar</label>
<select class="form-control" name="txtInputTipeKamar" required>
        <option value="<?=$detailKamar['id_fasilitas'];?>"><?=$detailKamar['tipe_kamar'];?></option>
        <?php foreach($ListTipe as $row):?>
        <option value="<?php echo $row['id_fasilitas'];?>"><?php echo $row['tipe_kamar'];?></option>
        <?php endforeach;?>
</select>
</div>
<div class="form-group">
<label class="font-weight-bold">Tarif Kamar /per malam</label>
<input type="text" name="txtTarif" class="form-control" value="<?=$detailKamar['tarif'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto Kamar</label><br/>
<input type="hidden" name="txtFoto"class="form-control"  value="<?=$detailKamar['foto'];?>">
<?php
    if (!empty($detailKamar['foto'])) {
    echo '<img src="'.base_url("/gambar/".$detailKamar['foto']).'" width="150">';
    }
?>
<input type="file" name="txtFotoKamar" class="form-control"/>
</div>
<div class="form-group">
<button class="btn btn-primary">Update Kamar</button>
</div>
</form>
<?=$this->endSection();?>