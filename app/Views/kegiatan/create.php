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

            <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1> 
        </div>

    
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?= base_url('/kegiatan/tambah')?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class=" offset-xl-2 col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('nama_anggota')) ? 'text-danger' : 'text-primary' ?>">Nama Kegiatan</label>
                                        <textarea rows="5" placeholder="...." class="form-control <?= ($data['validation']->hasError('nama_anggota')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>"></textarea> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('nama_anggota')) ?>
                                        </small>  
                                    </div> 
                                </div> 
                                <div class=" col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('date_anggota')) ? 'text-danger' : 'text-primary' ?>">Tanggal Mulai</label>
                                        <input name="date_anggota" type="date" class="form-control <?= ($data['validation']->hasError('date_anggota')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('date_anggota')) ?>
                                        </small>  
                                    </div>  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('date_anggota')) ? 'text-danger' : 'text-primary' ?>">Tanggal Berakhir</label>
                                        <input name="date_anggota" type="date" class="form-control <?= ($data['validation']->hasError('date_anggota')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('date_anggota')) ?>
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



    <!-- View Modal-->
    <div class="modal fade" id="v-gt" tabindex="-1" role="dialog" aria-labelledby="v-gt" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center text-sm-left">
                        <div class="col-12 col-sm-4 font-weight-bold">  Username    </div>
                        <div class="col-12 col-sm-8 usr-angota">  username    </div>
                    </div>    
                    <div class="row mt-3 text-center text-sm-left">
                        <div class="col-12 col-sm-4 font-weight-bold">  Email    </div>
                        <div class="col-12 col-sm-8 eml-angota">  Email    </div>
                    </div>    
                    <div class="row mt-3 text-center text-sm-left">
                        <div class="col-12 col-sm-4 font-weight-bold">  Password    </div>
                        <div class="col-12 col-sm-8 pss-angota">  Password    </div>
                    </div>      
                    <div class="row mt-3 text-center text-sm-left">
                        <div class="col-12 col-sm-4 font-weight-bold">  Tanggal Masuk    </div>
                        <div class="col-12 col-sm-8 tgl-angota">  Tanggal Masuk    </div>
                    </div>       
                    <div class="row mt-3 text-center text-sm-left">
                        <div class="col-12 col-sm-4 font-weight-bold">  Picture    </div>
                        <div class="col-12 col-sm-8 foto-angota">   </div>
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
        <link rel="stylesheet" type="text/css" href="<?= base_url('Asset/datatables') ?>/datatables.css"/>  

        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?= base_url('Asset/datatables') ?>/datatables.js"></script>            


    <script>
   
                $(document).ready(function() {
                        // table Persediaan
                        $('#tableAll').DataTable({  
                                lengthMenu: [
                                    [5, 10, 25, 50, -1],
                                    [5, 10, 25, 50, 'All'],
                                ],   
                                responsive: true,
                                processing: true,
                                serverSide: true,
                                order: [[ 2, 'asc' ],],  
                                ajax: "/anggota/boxview-anggota", 
                                columns: [
                                    {data: '0', orderable: false, className: "text-center"}, 
                                    {data: '1', className: "text-center"}, 
                                    {data: '2', className: "text-center"},  
                                    {data: '3', className: "text-center"},  
                                    {data: '4', className: "text-center"},  
                                    {data: '5', className: "text-center"},    
                                    {data: '6', orderable: false, className: "text-center"},   
                                ],    
                        }); 

                });

                $("#tableAll").on("click", ".v-gt", function () {  
                    const id = $(this).data("id");  
                    $.ajax({
                        type: "post",
                        url: "anggota/list-view-anggota",
                        data: {id:id},
                        dataType: "json",
                        success: function (response) { 
                            $.each(response, function (iii, vvv) {  
                                $('.usr-angota').html(vvv.username);
                                $('.eml-angota').html(vvv.email);
                                $('.pss-angota').html(vvv.log);
                                $('.tgl-angota').html(vvv.tanggal_masuk);
                                $('.foto-angota').html('<img src="/Foto/anggota/'+ vvv.foto +'" alt="" class="img w-50 border rounded">'  );
                            })


                        }
                    });
                });



                
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                    }
                };







    </script>



<?= $this->endSection() ?>