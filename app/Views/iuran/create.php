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

            <h1 class="h3 mb-0 text-gray-800">Iuran</h1> 
        </div>

    
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Iuran</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?= base_url('/iuran/tambah')?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="offset-xl-2  col-12 col-sm col-xl-4">  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('b&t')) ? 'text-danger' : 'text-primary' ?>">Bulan & Tahun Pembayaran</label>
                                        <input name="b&t" type="month" 
                                                class="form-control <?= ($data['validation']->hasError('b&t')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" 
                                                value="<?= date("Y-m") ?>">     
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('b&t')) ?>
                                        </small>  
                                    </div>  
                                </div>  
                                <div class=" col-12 col-sm col-xl-4">  
                                </div>  


                                <div class=" offset-xl-2 col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('str_date')) ? 'text-danger' : 'text-primary' ?>">Nama Anggota</label>
                                        <select name="" class="form-control <?= ($data['validation']->hasError('b&t')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>"  >
                                            <option value="">-- Pilih Anggota</option>
                                        </select>
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('str_date')) ?>
                                        </small>  
                                    </div>  
                                </div> 
                                <div class=" col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('brk_date')) ? 'text-danger' : 'text-primary' ?>">Total Bayar</label>
                                        <input name="" type="text" 
                                            class="form-control <?= ($data['validation']->hasError('brk_date')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" 
                                            placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('brk_date')) ?>
                                        </small>  
                                    </div>  
                                </div>   



                                <div class=" offset-lg-2 col-lg-8 text-right  ">
                                    <hr class="border border-primary">
                                    <a href="<?=base_url('kegiatan')?>" class="btn btn-danger btn-sm">Kembali</a> 
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
       
        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
   
    <script>     
 

 

    </script>



<?= $this->endSection() ?>