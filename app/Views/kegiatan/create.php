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
     <!-- <script src="<?= base_url('Asset/editor/ckeditor4/ckeditor.js') ?>"></script>  -->
    <!-- <script src="<?= base_url('Asset/editor/ckfinder/ckfinder.js') ?>"></script>  -->

    <script>
















//                 var editor = CKEDITOR.replace( 'ket_kegiatan', { 
//                     toolbar: [
//                         { name: 'document',
//                             items: [ 'Source', '-' ] 
//                         },	 
//                         [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],				
//                         { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
//                         { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },	
//                         { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },																		 
//                         { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
//                         { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
						 
//                     ], 
// 					filebrowserBrowseUrl: '/browser/browse.php',
// 					filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
// 					filebrowserUploadUrl: '/uploader/upload.php',
// 					filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
					 
//                 }); 
				
				
// // Let's wait for CKEditor is initialized...
// editor.on('instanceReady', function () {
//     // ...and get Flmngr API
//     editor.getFlmngr((Flmngr) => {
//         // In this demo we pass Flmngr API into inner functions and callbacks.
//         // You can save it somewhere and reuse without passing as an argument.
//         attachOnClickListenerToButton(Flmngr);
//     });
// });
// function attachOnClickListenerToButton(Flmngr) {
//     let elBtn = document.getElementById("btn");
//     // Style button as ready to be pressed
//     elBtn.style.opacity = 1;
//     elBtn.style.cursor = "pointer";
//     let elLoading = document.getElementById("loading");
//     elLoading.parentElement.removeChild(elLoading);
//     // Add a listener for selecting files
//     elBtn.addEventListener("click", () => {
//         selectFiles(Flmngr);
//     });
// }
// function selectFiles(Flmngr) {
//     // Collect URLs of images of existing gallery set
//     let elsExistingImages = document.querySelectorAll("#images img");
//     let urls = [];
//     for (let i = 0; i < elsExistingImages.length; i++)
//         urls.push(elsExistingImages.item(i).src);
//     Flmngr.open({
//         list: urls,
//         isMultiple: true,
//         acceptExtensions: ["png", "jpeg", "jpg", "webp", "gif"],
//         onFinish: (files) => {
//             showSelectedImages(Flmngr, files);
//         }
//     });
// }
// function showSelectedImages(Flmngr, files) {
//     let elImages = document.getElementById("images");
//     elImages.innerHTML = "";
//     /*let elP =  document.createElement("p");
//     elP.textContent = files.length + " images selected";
//     elImages.appendChild(elP);*/
//     for (let file of files) {
//         let urlOriginal = Flmngr.getNoCacheUrl(file.url);
//         let el = document.createElement("div");
//         el.className = "image";
//         elImages.appendChild(el);
//         let elDiv = document.createElement("div");
//         el.appendChild(elDiv);
//         let elImg = document.createElement("img");
//         elImg.src = urlOriginal;
//         elImg.alt = "Image selected in Flmngr";
//         elDiv.appendChild(elImg);
//         let elP = document.createElement("p");
//         elP.textContent = file.url;
//         el.appendChild(elP);
//     }
// }
				
                //CKEDITOR.config.extraPlugins='colorbutton';
                //CKFinder.setupCKEditor();
 
    </script>



<?= $this->endSection() ?>