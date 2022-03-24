<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>
<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kamar Hotel SCADA</h2>
          </div>
        <div class="row">
        <?php
        foreach($ListKamar as $row){
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
              <img class="card-img-top" src="<?=base_url("/gambar/".$row['foto']);?>" width="100" height="100"" alt="No image"> 
              </div>
              <h4><a href="">Tipe Kamar : <?=$row['tipe_kamar'];?></a></h4>
              <h4><a href="">RP.<?=$row['tarif'];?> / per malam</a></h4>
              <p>Fasilitas Kamar : <?=$row['fasilitas'];?></p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Services Section -->
<?= $this->endSection() ?>