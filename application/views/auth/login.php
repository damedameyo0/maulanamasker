<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container centered">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <?php echo $this->session->flashdata('message') ?>
                            <div class="card-body">
                                <form class="form" method="post" action="<?= base_url('User/index'); ?>">
                                    <div class="row mb-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-2" id="email" name="email" type="text" value="<?= set_value('email'); ?>" placeholder="Enter Email Address" />
                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-2" id="password" name="password" type="password" value="<?= set_value('password'); ?>" placeholder="Enter Password" />
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group d-grid mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="<?= base_url('User/registration'); ?>">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; <?php echo SITE_NAME . " " . Date('Y') ?> </div>
                </div>
            </div>
        </footer>
    </div>
</div>