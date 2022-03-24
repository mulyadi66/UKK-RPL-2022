<?=$this->include('Layout-Home/Header');?>
<!-- Awal Konten Aplikasi --> 
<main role="main" class="flex-shrink-0">
<section id="hero" >
  <div id="section2" class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
					<h1 class="mainText">
					<?=isset($judulhalaman) ? $judulhalaman : 'Selamat Datang';?>

					</h1>
					<div class="col-md-12 text-justify" style="min-height:300px;">
          <?php 
          if(empty($intro)){
          $this->renderSection('content');
          } else {
        echo $intro;
    }
    ?>
					</div>
			</div>
  </section>
</main>
<?=$this->include('Layout-Home/Footer');?> 