<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/administrator/assets/')  ?>" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Login - Online Shopping</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/website/images/favicon.ico')  ?>" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/helpers.js"></script>

</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="<?php base_url(); ?>" class="app-brand-link gap-2">
                                <img src="<?= base_url('assets/website/images/logo.png'); ?>" alt="Logo" width="160px">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Welcome to Online Shopping! 👋</h4>
                        <small class="mb-4  text-center">Please sign-in to your account and start the adventure</small>

                        <form class="mb-3 mt-3" method="POST" action="<?= base_url('administrator/login') ?>">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter your email or username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <!-- <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a> -->
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary d-grid w-100" type="submit" name="submit" value="Sign in">
                            </div>
                        </form>

                        <!-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> -->
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
</body>

</html>