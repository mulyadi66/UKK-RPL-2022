<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Update Foto Kamar</h2>
<p>Silahkan udate foto Kamar pada form dibawah ini</p>
<form method="POST" action="/kamar/updatefoto" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nomor Kamar</label>
<input type="hidden" name="txtIdKamar" class="form-control" value="<?=$detailKamar[0]['id_kamar'];?>" readonly>
<input type="hidden" name="txtFoto" class="form-control" value="<?=$detailKamar[0]['foto'];?>" readonly>
<input type="text" name="txtNoKamar" class="form-control" value="<?=$detailKamar[0]['no_kamar'];?>" readonly>
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto Kamar</label><br/>
<?php
    if (!empty($detailKamar[0]['foto'])) {
    echo '<img src="'.base_url("/gambar/".$detailKamar[0]['foto']).'" width="150">';
    }
?>
<input type="file" name="txtInputFoto" class="form-control">

</div>
<div class="form-group">
<button class="btn btn-primary">Update Kamar</button>
</div>
</form>
<?=$this->endSection();?>