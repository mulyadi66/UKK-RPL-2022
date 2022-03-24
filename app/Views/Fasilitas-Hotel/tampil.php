<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel</h2>
<p>Berikut ini daftar fasilitas hotel yang sudah terdaftar dalam database.</p>
<p>
<a href="/fasilitashotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
</p>
<?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
            <table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nomor</th>
<th>Fasilitas Hotel</th>
<th>Foto</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$nomor=null;
$htmlData=null;
foreach ($ListFasilitas as $row){
$nomor++;
$htmlData ='<tr>';
$htmlData .='<td>'.$nomor.'</td>';
$htmlData .='<td>'.$row['jenis'].'</td>';
$htmlData .='<td>'.'<img src="'.base_url("/gambar/".$row['gambar']).'" width="150">'.'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/fasilitashotel/edit/'.$row['idfasilitas'].'" class="btn btn-info btn-sm mr-1">Edit</a>';
$htmlData .='<a href="/fasilitashotel/hapus/'.$row['idfasilitas'].'" class="btn btn-danger btn-sm">Hapus</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
<?= $this->endSection() ?>