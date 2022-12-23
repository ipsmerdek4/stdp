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
                                <div class="offset-xl-2  col-12 col-sm col-xl-4">  
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('kegiatan')) ? 'text-danger' : 'text-primary' ?>">Nama Kegiatan</label>
                                        <input name="kegiatan" type="text" class="form-control <?= ($data['validation']->hasError('kegiatan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('kegiatan')) ?>
                                        </small>  
                                    </div>  
                                </div>  
                                <div class=" col-12 col-sm col-xl-4">  
                                </div>  


                                <div class=" offset-xl-2 col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('str_date')) ? 'text-danger' : 'text-primary' ?>">Tanggal Mulai</label>
                                        <input name="str_date" type="date" class="form-control <?= ($data['validation']->hasError('str_date')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('str_date')) ?>
                                        </small>  
                                    </div>  
                                </div> 
                                <div class=" col-12 col-sm col-xl-4"> 
                                    <div class="form-group">
                                        <label class="<?= ($data['validation']->hasError('brk_date')) ? 'text-danger' : 'text-primary' ?>">Tanggal Berakhir</label>
                                        <input name="brk_date" type="date" class="form-control <?= ($data['validation']->hasError('brk_date')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>" placeholder="..."> 
                                        <small class="text-danger  ">  
                                            <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('brk_date')) ?>
                                        </small>  
                                    </div>  
                                </div>  
                                <div class="offset-xl-2  col-12 col-sm col-xl-8">  
                                        <div class="form-group">
                                            <label class="<?= ($data['validation']->hasError('ket_kegiatan')) ? 'text-danger' : 'text-primary' ?>">Keterangan Kegiatan</label>
                                            <textarea name="ket_kegiatan" id="ket_kegiatan" placeholder="...." class=" form-control <?= ($data['validation']->hasError('ket_kegiatan')) ? 'text-danger border border-danger' : 'text-primary border border-primary' ?>"></textarea> 
                                            <small class="text-danger  ">  
                                                <?=preg_replace("/[^a-zA-Z0-9]/", " ", $data['validation']->getError('ket_kegiatan')) ?>
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
        <link rel="stylesheet" type="text/css" href="<?= base_url('Asset/datatables') ?>/datatables.css"/>  
 
        <style>

        </style>


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?= base_url('Asset/datatables') ?>/datatables.js"></script>            
    <script src="<?= base_url('Asset/textarea_editor/tinymce/tinymce.min.js') ?>"></script> 
    <script src="<?= base_url('Asset/textarea_editor/tinymce/init.js') ?>"></script>  

    <script>        
            tinymce.init({
                    selector: "textarea",theme: "modern", height: 00,
                    plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                    ],
                    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                    image_advtab: true ,

                    /* file_browser_callback:  function (field_name, url, type, win) { 
                        tinyMCE.activeEditor.windowManager.open({
                            // file : cmsURL,
                            title : 'My File Browser',
                            width : 420,  // Your dimensions may differ - toy around with them!
                            height : 400,
                            url : '/Asset/textarea_editor/filemanager/dialog.php?type=1&field_id=' + field_name,
                            
                        }, {
                            window : win,
                            input : field_name
                        });
                        return false;
                    },
                    */
                    external_filemanager_path:"/Asset/textarea_editor/filemanager/",
                    filemanager_title:"My File Browser" , 
                    external_plugins: { "filemanager" : "/Asset/textarea_editor/filemanager/plugin.min.js"},

                });


    </script>



<?= $this->endSection() ?>