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
            <?php if (in_groups('sekretaris')) : ?> 
            <a href="<?= base_url('presensi/create') ?>" class="btn btn-sm btn-primary shadow-sm mt-4 mt-sm-0">
                <i class="fa-solid fa-plus fa-sm text-white-50 pr-1"></i> 
                Tambah Presensi
            </a>
            <?php endif; ?>
        </div>
  
        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Presensi</h6>
                        
                        <button class="btn btn-sm btn-info">
                            <i class="fa-solid fa-print px-1"></i>
                            Cetak Absensi
                        </button>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        

                        <div class="table-responsive">
                            <table id="tableAll" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-sm-center">No</th>  
                                        <th class="text-sm-center">Kode<br>Kegiatan</th> 
                                        <th class="text-sm-center">Nama</th> 
                                        <th class="text-sm-center">Kegiatan</th> 
                                        <th class="text-sm-center">Waktu Presensi</th>  
                                        <th class="text-sm-center">Dokument</th>  
                                        <?=(in_groups('sekretaris'))? '<th class="text-sm-center">Opsi</th> ' : '' ?> 
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
        <link rel="stylesheet" type="text/css" href="<?= base_url('Asset/datatables') ?>/datatables.css"/>  
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css"/> 

        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?= base_url('Asset/datatables') ?>/datatables.js"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.js"></script>        

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
                                ajax: "/presensi/view/boxview-presensi", 
                                columns: [
                                    {data: '0', orderable: false, className: "text-center"}, 
                                    {data: '1', className: "text-center"}, 
                                    {data: '2', className: "text-center"},  
                                    {data: '3', className: "text-center"},   
                                    {data: '4', className: "text-center"},   
                                    {data: '5', className: "text-center"},   
                                    <?=(in_groups('sekretaris'))? '{data: "6", orderable: false, className: "text-center"},' : '' ?> 
                                ],    
                        }); 

                });




                $("#tableAll").on("click", ".v-ket-kgt", function () {  
                    const id = $(this).data("id");  
                    $('.view-rincian-kegiatan').html(id);   
                });


                $("#tableAll").on("click", ".e-kgt", function () { 
                    // $('#epersediaan').modal('hide'); 
                    const id = $(this).data("id");  

                    Swal.fire({
                                title: 'Are you sure?',
                                html: '',
                                icon: 'warning',
                                showCancelButton: true,
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Edit'
                            }).then((result) => {
                                    if (result.isConfirmed) {   
                                        window.location.replace("/presensi/edit/" + id); 
                                    } else{
                                        // $('#epersediaan').modal('show'); 
                                    }
                            });  

                });

                $("#tableAll").on("click", ".d-kgt", function () { 
                    // $('#epersediaan').modal('hide'); 
                    const id = $(this).data("id");  

                    Swal.fire({
                                title: 'Are you sure?',
                                html: '',
                                icon: 'warning',
                                showCancelButton: true,
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Hapus'
                            }).then((result) => {
                                    if (result.isConfirmed) {   
                                        window.location.replace("/presensi/hapus/" + id); 
                                    } else{
                                        // $('#epersediaan').modal('show'); 
                                    }
                            });  

                });

    </script>



<?= $this->endSection() ?>