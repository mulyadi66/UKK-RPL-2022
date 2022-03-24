<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar kamar yang sudah terdaftar dalam database.</p>
<p>
<a href="/kamar/tambah" class="btn btn-primary btn-sm">Tambah Kamar</a>
</p>
<?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
<div class="row">
<?php

foreach($ListKamar as $row){

?>
<div class="col-md-3">
        <div class="card"">
        <img class="card-img-top" src="<?=base_url("/gambar/".$row['foto']);?>" width="150" alt="No image">
        <div class="card-body">
            <h4 class="card-title">Nomor Kamar</h4>
            <p class="card-text"> <?=$row['no_kamar'];?>  </p>
            <h4 class="card-title">Tipe Kamar</h4>
            <p class="card-text"> <?=$row['tipe_kamar'];?>  </p>
            <p class="card-text"> Tarif Kamar /per malam Rp.<?=$row['tarif'];?>  </p>
            <a href="/kamar/edit/<?=$row['id_kamar'];?>" class="btn btn-primary">Edit</a>
            <a href="/kamar/hapus/<?=$row['id_kamar'];?>" class="btn btn-primary">Hapus</a>
        </div>
        </div>
</div>
<?php } ?>

</div>
<?= $this->endSection() ?>