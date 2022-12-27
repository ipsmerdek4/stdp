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

            <h1 class="h3 mb-0 text-gray-800">Laporan</h1> 
        </div>

    
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Laporan</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?= base_url('/laporan/ubah/'.$data['laporan']->id)?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="offset-xl-2  col-12 col-sm col-xl-4">  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('judul')) ? 'text-danger' : 'text-primary' ?>">Judul Laporan</label>
                                        <input name="judul" type="text" 
                                                class="form-control <?= ($data['validation']->hasError('judul')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" 
                                                placeholder="..."
                                                value="<?=$data['laporan']->judul_lpr?>"> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('judul')) ?>
                                        </small>  
                                    </div>  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('keterangan')) ? 'text-danger' : 'text-primary' ?>">Keterangan Laporan</label>
                                        <textarea name="keterangan"
                                                class="form-control <?= ($data['validation']->hasError('keterangan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>"
                                                ><?=$data['laporan']->ket_lpr?></textarea> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('keterangan')) ?>
                                        </small>  
                                    </div>  
                                </div>     
                                <div class=" col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('fileup')) ? 'text-danger' : 'text-primary' ?>">File</label><br>
                                        <input type="file" name="fileup" 
                                                accept=".xlsx, .xls, image/*, .doc, .docx, .ppt, .pptx, .txt, .pdf"
                                                class="p-1 w-100 <?= ($data['validation']->hasError('fileup')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" >
                                        <input type="hidden" name="efileup" readonly 
                                                value="<?=$data['laporan']->file_lpr?>">
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('fileup')) ?>
                                        </small>  
                                    </div>  
                                </div>   



                                <div class=" offset-lg-2 col-lg-8 text-right  ">
                                    <hr class="border border-primary">
                                    <a href="<?=base_url('laporan')?>" class="btn btn-danger btn-sm">Kembali</a> 
                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
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
 
        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?= base_url('Asset/datatables') ?>/datatables.js"></script>      

    <script>        
            

    </script>


<?= $this->endSection() ?>