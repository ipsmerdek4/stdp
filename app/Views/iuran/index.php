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

            <a href="<?= base_url('iuran/create/'.date("Y-m")) ?>" class="btn btn-sm btn-primary shadow-sm mt-4 mt-sm-0">
                <i class="fa-solid fa-plus fa-sm text-white-50 pr-1"></i> 
                Tambah Iuran
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
                        <h6 class="m-0 font-weight-bold text-primary">View Iuran</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <form action="<?=base_url('iuran')?>" method="post">
                        <div class="row">
                            <div class="col-2">
                                    <div class="form-group"> 
                                        <select name="tahun" class="form-control <?= ($data['validation']->hasError('kegiatan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>">
                                            <option value="">-- Pilih Tahun</option>
                                            <?php for ($i=date('Y')-5; $i < date('Y')+5; $i++) { ?>
                                                <option value="<?= $i ?>" <?= ($i == $data['tahunXX'])? 'selected' : '' ?> ><?= $i ?></option> 
                                            <?php }  ?>
                                        </select>  
                                    </div>  
                            </div>
                            <div class="col-3">
                                    <div class="form-group">
                                        <select name="anggota" class="form-control <?= ($data['validation']->hasError('kegiatan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>">
                                            <option value="">-- Pilih Anggota</option>
                                            <?php foreach ($data['anggota'] as $v):?>
                                                <option value="<?= $v->id ?>" <?= ($v->id == $data['user_id'])? 'selected' : '' ?> ><?= $v->nama_lengkap ?></option> 
                                            <?php endforeach;  ?>
                                        </select>  
                                    </div>  
                            </div>
                            <div class="col-2">
                                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                            </div>
                        </div>
                        </form>

                        <div class="table-responsive">
                            <table id="tableAll" class="table table-bordered text-center" style="width:100%">
                                <thead>
                                    <tr> 
                                        <th class="text-sm-center">No</th>  
                                        <th class="text-sm-center">Bulan</th>  
                                        <th class="text-sm-center">Total<br>Pembayaran</th> 
                                        <th class="text-sm-center">Status</th>  
                                        <th class="text-sm-center">Tanggal<br>Pembayaran</th> 
                                        <th class="text-sm-center">Opsi</th> 
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        foreach ($data['iuran'] as $vviuran) {   
                                    ?> 
                                            <tr>
                                                <td><?= $vviuran['datem'] ?></td>
                                                <td><?= $vviuran['bulan'] ?></td>
                                                <td><?= "Rp " . number_format($vviuran['nominal_iuran'],2,',','.') ?></td>
                                                <td> 
                                                    <?php
                                                    if ($vviuran['status'] == 0) {
                                                        echo '<span class="badge badge-danger">Belum<br>Membayar</span>';
                                                    }elseif ($vviuran['status'] == 1) {
                                                        echo '<span class="badge badge-success p-2">Sudah<br>Membayar</span>';
                                                    } 
                                                    ?>
                                                </td>
                                                <td><?= $vviuran['tgl_bayar'] ?></td>
                                                <td> 
                                                    <?php
                                                    if ($vviuran['status'] == 0) { ?> 
                                                        <div class="btn-group" role="group" aria-label="Basic example"> 
                                                            <a href="<?= base_url('iuran/create/'.date("Y-").(($vviuran['datem'] < 10)? '0'.$vviuran['datem'] : $vviuran['datem'])) ?>" class="btn btn-success btn-sm pt-1" style="width:33px;">
                                                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                                            </a>  
                                                        </div> 
                                                    <?php }elseif ($vviuran['status'] == 1) { ?> 
                                                        <div class="btn-group" role="group" aria-label="Basic example"> 
                                                            <a href="javascript:void(0)" data-id="<?= $vviuran['id'] ?>" class="btn btn-success btn-sm pt-1 e-kgt" style="width:33px;">
                                                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                                            </a> 
                                                            <a data-id="<?= $vviuran['id'] ?>" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 d-kgt" style="width:33px;">
                                                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                                                            </a>
                                                        </div> 
                                                    <?php }  ?>
                                                </td>
                                            </tr> 
                                    <?php
                                        }   
                                    ?>
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
                                    [ -1, 5, 10, 25, 50],
                                    ['All', 5, 10, 25, 50],
                                ],   
                                responsive: true, 
                                order: [
                                    [ 0, 'asc' ],
                                ],   
                        });
 

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
                                        window.location.replace("/iuran/edit/" + id); 
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
                                        window.location.replace("/iuran/hapus/" + id); 
                                    } else{
                                        // $('#epersediaan').modal('show'); 
                                    }
                            });  

                });

 


    </script>



<?= $this->endSection() ?>