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

            <h1 class="h3 mb-0 text-gray-800">Anggota</h1>

            <a href="#" class="btn btn-sm btn-primary shadow-sm mt-4 mt-sm-0">
                <i class="fa-solid fa-plus fa-sm text-white-50 pr-1"></i> 
                Tambah Anggota
            </a>
        </div>

    
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Anggota</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="tableAll" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-sm-center">No</th>  
                                        <th class="text-sm-center">Nama</th> 
                                        <th class="text-sm-center">Jabatan</th> 
                                        <th class="text-sm-center">Telp</th> 
                                        <th class="text-sm-center">Alamat</th> 
                                        <th class="text-sm-center">Status</th>  

                                        
                                      <!--   <th class="text-sm-center">username</th>   
                                        <th class="text-sm-center">Email</th>  
                                        <th class="text-sm-center">Password</th>  
                                        <th class="text-sm-center">Foto</th>  
                                        <th class="text-sm-center">Tanggal<br>Masuk</th>  --> 

                                        <th class="text-sm-center">Opsi</th> 
                                    </tr>
                                </thead>
                                <tbody> 

                                </tbody>  
                            </table>

                        </div>



                    </div>
                </div>
            </div>
 
        </div>

        

    </div>
    <!-- /.container-fluid -->



    <!-- Logout Modal-->
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
                    <div class="row">
                        <div class="col col-sm-4">  Username    </div>
                        <div class="col col-sm-8 usr-angota">  username    </div>
                    </div>    
                    <div class="row mt-3">
                        <div class="col col-sm-4">  Email    </div>
                        <div class="col col-sm-8 eml-angota">  Email    </div>
                    </div>    
                    <div class="row mt-3">
                        <div class="col col-sm-4">  Password    </div>
                        <div class="col col-sm-8 pss-angota">  Password    </div>
                    </div>      
                    <div class="row mt-3">
                        <div class="col col-sm-4">  Tanggal Masuk    </div>
                        <div class="col col-sm-8 tgl-angota">  Tanggal Masuk    </div>
                    </div>       
                    <div class="row mt-3">
                        <div class="col-12 col-sm-4">  Picture    </div>
                        <div class="col-12 col-sm-8 foto-angota">  Picture </div>
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
                                    {data: '5', className: "text-center"},   /* 
                                    {data: '6', className: "text-center"},   
                                    {data: '7', className: "text-center"},   
                                    {data: '8', className: "text-center"},   
                                    {data: '9', className: "text-center"},   
                                    {data: '10', className: "text-center"},  */  
                                    {data: '11', orderable: false, className: "text-center"},   
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
                                $('.foto-angota').html(vvv.foto);
                            })


                        }
                    });
                });
    </script>



<?= $this->endSection() ?>