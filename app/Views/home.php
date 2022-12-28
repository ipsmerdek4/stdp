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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Anggota</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_anggota ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Uang KAS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "Rp. " . number_format($hasil_iuran, 2,',','.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-regular fa-money-bills-simple fa-2x text-gray-300"></i> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

             <div class="col-lg-8 col-xm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Pengumuman</h4>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area h-100">

                        <?php foreach ($pengumanan as $value) : ?>
                            <div class="row mb-2">
                                <div class="col-12 col-sm col-lg-7">
                                    <h5 class="pb-0 mb-0   "><a href="" > <?php  $limit = 18; echo (strlen($value->nama_kgt) > $limit)? mb_substr($value->nama_kgt,0,$limit).'...'  :  $value->nama_kgt; ?></a></h5>
                                    <div  class="mt-0 mb-2" style="font-size: 12px; "><small> <?= date_format(date_create($value->tgl_start_kgt),"d M Y") ?> ~ <?= date_format(date_create($value->tgl_end_kgt),"d M Y") ?></small></div>
                                </div>
                                <div class="col-12 col-sm col-lg-5"> 
                                    <button 
                                        class="btn btn-primary btn-sm p-2 float-sm-right v-ket-kgt" 
                                        data-id="<?= $value->id ?>" 
                                        data-toggle="modal" 
                                        data-target="#v-ket-kgt"  
                                        data-backdrop="static" 
                                        data-keyboard="false" 
                                        >
                                        <i class="fa-solid fa-up-right-from-square fa-sw"></i>
                                        Rincian Kegiatan
                                    </button>
                                </div>
                                <div class="col-12"> 
                                    <hr>
                                </div> 
                            </div> 
                        <?php endforeach; ?>
                            <div class="d-flex justify-content-center">
                                <?= $kegiatan_pager->links('kegiatan', 'bootstrap_pagination') ?> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
 

    </div>
    <!-- /.container-fluid -->
  


    <!-- View Modal-->
    <div class="modal fade" id="v-ket-kgt" tabindex="-1" role="dialog" aria-labelledby="v-gt" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Rincian Kegiatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="w-100">
                        <div class="view-rincian-kegiatan"></div> 
                    </div>  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> 
                </div>
            </div>
        </div>
    </div>



 
<?= $this->endSection() ?> 
<!--  -->
<?= $this->section('styles') ?>

        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>

<script>
    
    $('.v-ket-kgt').click(function ( ) {  
            const id = $(this).data("id");  
            $.ajax({
                type: "post",
                url: "/views-home",
                data: {id:id },
                dataType: "json",
                success: function (response) {
                    $('.view-rincian-kegiatan').html(response);     
                }
            });


    }); 

</script>




<?= $this->endSection() ?>