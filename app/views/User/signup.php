<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Home</a></li>
                <li>Register</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>REGISTER</h2>
                    </div>

                    <div class="register-main">
                            <form data-toggle="validator" method="post" action="user/signup" id="signup" role="form" required>
                                <div class="col-md-6 account-left">
                                    <div class="form-group has-feedback">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control" data-minlength="4" id="login" placeholder="Login" data-error="Login must be at least 4 characters"
                                               value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']): '';?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors">Minimum of 4 characters</div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                               value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']): '';?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                               value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']): '';?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" data-minlength="6" id="address" placeholder="Address"
                                               value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']): '';?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                                <div class="col-md-6 account-left">
                                    <div class="form-group has-feedback">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" data-minlength="6" id="password" placeholder="Password" data-error="Password must be at least 6 characters" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors">Minimum of 6 characters</div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="password_retype">Confirm password</label>
                                        <input type="password" name="password_retype" class="form-control" id="password_retype" placeholder="Retype password" data-match="#password" data-match-error="Whoops, these don't match" required
                                               data-required-error="Fill in this field">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->
