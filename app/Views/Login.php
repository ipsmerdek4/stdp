<?= $this->section('title') ?>
SEKAA TERUNA TERUNI DHARMA PUTRA
<?= $this->endSection() ?>
<!--  -->
<?= $this->extend('layout_login/app') ?>
<?= $this->section('content') ?>


    <div class="row justify-content-center pt-2 mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">`

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body --> 
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block p-5 ">  
                            <img class="w-100" src="<?=base_url('Asset') ?>/img/logo/logo.png" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang </h1> 
                    

                                </div>

                                <form action="<?= url_to('login') ?>" method="post" class="user">
						            <?= csrf_field() ?>

                                    <?php if ($config->validFields === ['email']): ?>
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" 
                                                placeholder="Masukan Email atau Username"  name="login" > 
                                        </div> 
                                    <?php else: ?> 
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" 
                                                placeholder="Masukan Email atau Username"  name="login" > 
                                        </div>  
                                    <?php endif; ?>
 
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>


                                    <?php if ($config->allowRemembering): ?> 

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> 
 
                                    <?php endif; ?>
 
                                    <button type="submit" class="btn btn-primary btn-user btn-block"><?=lang('Auth.loginAction')?></button>


                                </form>
                                
                                <hr>
 

                                <div class="text-center"> 
                                        <?php if ($config->activeResetter): ?>
                                            <p><a class="small" href="<?= url_to('forgot') ?>">Forgot Password?</a></p>
                                        <?php endif; ?>
                                </div> 


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
 
            <!-- login massage Modal-->
            <div class="modal fade" id="mssglogin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title <?= (session()->has('message')) ? 'text-success' : 'text-danger '?>" id="">Pesan</h5>
                            <button class="close  <?= (session()->has('message')) ? 'text-success' : 'text-danger '?>" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"> 
                        
                            <?php if (session()->has('message')) : ?>
                                <div class="alert alert-success">
                                    <?= session('message') ?>
                                </div>
                            <?php endif ?>
                                                    
                            <?php if (session()->has('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session('error') ?>
                                </div>
                            <?php endif ?>

                            <?php if (session()->has('errors')) : ?>
                                <ul class="alert alert-danger ">
                                    <?php foreach (session('errors') as $error) : ?>
                                        <li class="mx-2"> <?= $error ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>


                        </div> 
                    </div>
                </div>
            </div>




    
<?= $this->endSection() ?> 
<!--  -->
<?= $this->section('styles') ?>
 


<?= $this->endSection() ?>
<!--  -->
<?= $this->section('javascript') ?>



        <?php if (session()->has('message')) : ?>
            <script>
                $('#mssglogin').modal('show');  
            </script> 
        <?php endif ?>
                                
        <?php if (session()->has('error')) : ?>
            <script>
                $('#mssglogin').modal('show');  
            </script> 
        <?php endif ?>

        <?php if (session()->has('errors')) : ?> 
            <script>
                $('#mssglogin').modal('show');  
            </script> 
        <?php endif ?>

 


<?= $this->endSection() ?>
