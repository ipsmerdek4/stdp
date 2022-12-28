<?= $this->section('title') ?>
SEKAA TERUNA TERUNI DHARMA PUTRA
<?= $this->endSection() ?>
<!--  -->
<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

 

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>  
        </div>
  
        <div class="row">

            <!-- Area Chart -->
            <div class="col-12 col-lg-8  col-xl-6">
                <div class="card shadow mb-4">  
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col">
                                <img src="<?=base_url('Foto/anggota')?>/<?= ($build->foto != '') ? $build->foto  : 'default.jpg' ?> " class="img w-100" alt="">
                            </div>
                            <div class="col" >
                                <ul class="list-unstyled">
                                    <li class="py-2 mt-1" style="font-size: 20px;"><?= $build->nama_lengkap ?></li>
                                        <?php  
                                            $rubahnmanggota = [
                                                'sekretaris'    => 'Sekretaris',
                                                'bendahara'     => 'Bendahara',
                                                'ketuadanwakil' => 'Ketua Atau Wakil Ketua',
                                                'user'          => 'Anggota',
                                            ];
                                        ?>
                                    <li class="pt-2 mt-1  "><small>Jabatan : <?= $rubahnmanggota[$build->name_jabatan ] ?></small></li>
                                    <li class=""><small>Email : <?= $build->email?></small></li>
                                    <li class=""><small>Telp/Hp : <?= $build->no_telp?></small></li>
                                    <li class=""><small><?= $build->alamat?></small></li>
                                    <li class="mt-5 bg-secondary text-white px-2 text-center"><small> Bergabung Sejak  <?= date_format(date_create($build->tanggal_masuk),"d M Y") ?> </small></li>
                                    <li class="mt-5 text-center">
                                        <button class="btn btn-success btn-sm e-gt" data-id="<?= $build->anggota_id?>"  >
                                            <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                            Edit
                                        </button>
                                    </li>
                                </ul> 
                            </div>
                        </div>


                    </div>
                </div>
            </div>
 
        </div>

        

    </div>
    <!-- /.container-fluid -->

  
 


 
<?= $this->endSection() ?> 
<!--  -->
<?= $this->section('styles') ?>
 
        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
 
    <script>       

                $(".e-gt").click(function () {   
                    const id = $(this).data("id");    
                    window.location.replace("/anggota/edit/" + id +"/profil");  
                });
 
    </script>



<?= $this->endSection() ?>