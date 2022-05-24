    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form form class="form" action="<?php echo base_url('user/registration'); ?>" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" name="name" type="text" value="<?= set_value('name'); ?>" placeholder="Enter fullname" />
                                            <label for="inputName">Enter fullname</label>
                                            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="text" value="<?= set_value('email'); ?>" placeholder="email@example.com" />
                                            <label for="inputName">Enter Email</label>
                                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group mb-3">
                                            <select name="level" class="form-control" style="width: 100%;" required>
                                                <option value="">-Pilih Level-</option>
                                                <?php
                                                foreach ($level->result_array() as $i) :
                                                    $level_id = $i['level_id'];
                                                    $name = $i['name'];
                                                ?>
                                                    <option value="<?php echo $level_id; ?>"><?php echo $name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 ">
                                                    <input class="form-control mb-md-0" id="password1" name="password1" type="password" placeholder="Enter password" />
                                                    <label for="inputPassword">Enter Password</label>
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 ">
                                                    <input class="form-control mb-md-0" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m/t-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">Create Account </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('User'); ?> ">Have an account? Go to login</a>
                                    </div>
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
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    </body>

    </html>