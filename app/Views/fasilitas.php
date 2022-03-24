<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>
<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Fasilitas Hotel SCADA</h2>
          </div>
        <div class="row">
        <?php
        foreach($ListFasilitas as $row){
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
              <img class="card-img-top" src="<?=base_url("/gambar/".$row['gambar']);?>" width="100" height="100"" alt="No image"> 
              </div>
              <h4><a href=""><?=$row['jenis'];?></a></h4>
              <p><?=$row['deskripsi'];?></p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Services Section -->
<?= $this->endSection() ?>