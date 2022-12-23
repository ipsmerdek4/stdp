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

            <h1 class="h3 mb-0 text-gray-800">Presensi</h1>
            <a href="<?= base_url('presensi/view') ?>" class="btn btn-sm btn-warning shadow-sm mt-4 mt-sm-0">
                <i class="fa-solid fa-ellipsis-vertical fa-sm text-white-50 pr-1"></i> 
                View Presensi
            </a>
        </div>

    
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3   ">
                        <h6 class="m-0 font-weight-bold text-primary text-center">
                            <div id="date"></div> 
                            <div id="clock" style="font-size: 40px;"></div>     
                        </h6> 
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?=base_url('presensi/tambah')?>" method="POST"> 
                            <div class="row">
                                <div class="offset-xl-4  col-12 col-sm col-xl-4">
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('kegiatan')) ? 'text-danger' : 'text-primary' ?>">Kegiatan</label>
                                        <select name="kegiatan" class="form-control form-control-sm <?= ($data['validation']->hasError('kegiatan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>">
                                            <option value="">-- Pilih Kegiatan</option>
                                            <?php foreach ($data['kegiatan'] as $v ) : ?>
                                                <option value="<?= $v->id?>"><?= $v->nama_kgt?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('kegiatan')) ?>
                                        </small>  
                                    </div>  
                                </div> 
                                <div class="offset-xl-4  col-12 col-sm col-xl-4  text-center">
                                    <hr class="border border-primary mt-0"> 
                                    <button type="submit" class="btn btn-primary btn-sm">Absen</button>   
                                </div> 
                            </div>
                        </form>


                    </div>
                </div>
            </div>
 
        </div>

        

    </div>
    <!-- /.container-fluid -->


  


 
<?= $this->endSection() ?> 
<!--  -->
<?= $this->section('styles') ?>
        <link rel="stylesheet" type="text/css" href="<?= base_url('Asset/datatables') ?>/datatables.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css"/> 

        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?= base_url('Asset/datatables') ?>/datatables.js"></script>     
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.js"></script>        
    <script type="text/javascript" src="<?= base_url('Asset/jQuery-Clock-Plugin/jqClock.min.js')?>"></script>


    <script>


            <?php if (!empty(session()->getFlashdata('error'))) : ?>    
                Swal.fire({
                            title: 'Warning',
                            html: '<?php echo session()->getFlashdata('error'); ?>',
                            icon: 'warning', 
                        });

            <?php endif; ?>
 
            // jenis kayu
            <?php if (!empty(session()->getFlashdata('msg_sccs'))) : ?>    
                Swal.fire({
                            title: 'Success',
                            html: '<?php echo session()->getFlashdata('msg_sccs'); ?>',
                            icon: 'success', 
                        }); 
            <?php endif; ?>
                    
            $(document).ready(function(){    
                $("#date").clock({"langSet":"id", "dateFormat":"d-M-Y", "timeFormat":" " });
                var waktu = $("#clock").clock({"langSet":"id", "dateFormat":" ", "timeFormat":" H:i:s"}); 
            });   
 

              

 


    </script>



<?= $this->endSection() ?>