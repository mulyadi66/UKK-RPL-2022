<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="row">
<h2><?=$title?></h2>
    <div class="col-4">
    <form action="" method="post" >
        <div class="input-group mb-3">
        <input type="date" class="form-control" name="keyword">
        <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
        </div>
    </form>
    </div>
    <div class="col-4">
    <form action="" method="post" >
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukan Nama Tamu" name="keyword">
        <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
        </div>
    </form>
    </div>

</div>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>No</th>
<th>Nama Pemesan (Tamu)</th>
<th>Kamar</th>
<th>Tanggal Cek In</th>
<th>Tanggal Cek Out</th>
<th>Status</th>
</tr>
</thead>
<tbody  class="bg-light text-center">
<?php $i = 1 + (10 * ($currentPage - 1));?>
<?php
    if(isset($tamu)){
        $no=null;
        foreach($tamu as $row){
        $no++; 
        if($row['status']=='proses' ){
            $tombol=site_url('/reservasi/in/'.$row['id_reservasi']);
            $classTombol='badge-success';
            $labelTombol='Cek In';
        } else if($row['status']=='cek in' ){
            $tombol=site_url('/reservasi/out/'.$row['id_reservasi']);
            $classTombol='badge-danger';
            $labelTombol='Cek Out';
        }  else {
            $tombol='#';
            $classTombol='badge-dark';
            $labelTombol='Selesai';
        }
        ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$row['nama_pemesan'].' ('.$row['nama_tamu'].')';?></td>
            <td><?=$row['jumlah_kamar_dipensan'];?> kamar</td>
            <td><?=$row['tgl_cek_in'];?></td>
            <td><?=$row['tgl_cek_out'];?></td>
            <td>
                <a href="<?=$tombol;?>" class="badge <?=$classTombol;?>"><?=$labelTombol;?></a>            
            </td>
        </tr>
        <?php
        }
    }
    ?>
</tbody>
</table>
<?= $pager->links('reservasi', 'pagination') ?>
<?= $this->endSection() ?>