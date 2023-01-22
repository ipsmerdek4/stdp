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
                        <h6 class="m-0 font-weight-bold text-primary">Edit Iuran</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?= base_url('/kas/ubah/'.$data['data']->id)?>" method="post" enctype="multipart/form-data">
                            <div class="row">  
                                <div class=" offset-xl-4 col-12 col-sm col-xl-4">  
                                    <div class="form-group">
                                        <label class="text-primary">Tanggal Pembayaran</label>
                                        <!-- <input name="b&t" type="month" 
                                                class="form-control text-primary border border-primary" 
                                                value="<?php // $data['var'] ?>">   -->
                                        <input name="b&t" type="datetime-local" 
                                                class="form-control text-primary border border-primary" 
                                                value="<?= $data['data']->created_at_iuran ?>">  
                                    </div>  
                                </div>   
                                <div class=" offset-xl-4 col-12 col-sm col-xl-4">   
                                    <div class="form-group">
                                            <label class="<?= ($data['validation']->hasError('tipe')) ? 'text-danger' : 'text-primary' ?>">Tipe Pembayaran</label>
                                            <select name="tipe" class="form-control <?= ($data['validation']->hasError('tipe')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>"  >
                                            <option value="">-- Pilih Tipe Pembayaran</option> 
                                            <option value="1" <?= ($data['data']->sts_iuran == 1) ? 'selected' : '' ?>>Uang Masuk</option> 
                                            <option value="2" <?= ($data['data']->sts_iuran == 2) ? 'selected' : '' ?>>uang Keluar</option> 
                                            </select>
                                            <small class="text-danger  ">  
                                                <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('tipe')) ?>
                                            </small>  
                                    </div>  
                                </div>   

                                <div class=" offset-xl-4 col-12 col-sm col-xl-4">  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('eiuran')) ? 'text-danger' : 'text-primary' ?>">Kas Bulanan</label>
                                        <input name="eiuran" type="text" 
                                            class="rupiah2 form-control <?= ($data['validation']->hasError('eiuran')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" 
                                            placeholder="Rp. " 
                                            value="<?= "Rp. " . number_format($data['data']->nominal_iuran,0,',','.')  ?>"> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('eiuran')) ?>
                                        </small>  
                                    </div>  
                                </div>   



                                <div class=" offset-lg-2 col-lg-8 text-right  ">
                                    <hr class="border border-primary">
                                    <a href="<?=base_url('kas')?>" class="btn btn-danger btn-sm">Kembali</a> 
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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css"/> 

        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.js"></script>        

    <script>    
        
            <?php if (!empty(session()->getFlashdata('error'))) : ?>    
                Swal.fire({
                            title: 'Warning',
                            html: '<?php echo session()->getFlashdata('error'); ?>',
                            icon: 'warning', 
                        });

            <?php endif; ?>
    
        $('.rupiah2').keyup(function (e) {   
            $('.rupiah2').val(formatRupiah(this.value, 'Rp. '));
        }); 

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa             = split[0].length % 3,
            rupiah             = split[0].substr(0, sisa),
            ribuan             = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }


    </script>


<?= $this->endSection() ?>