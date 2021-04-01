<?php
session_start();
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel='shortcut icon' type='image/icon' href='favicon.ico'/>
        <link href="../assets/css/style_main.css" rel="stylesheet">

        <!--    <link rel="stylesheet" href="assets/css/bootstrap.css">  To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/bootstrap.js"></script>   To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <script src="assets/js/jquery-3.5.1.js"></script>    To add jquery into the prj(download the *.js file and add into assets dir) -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>Alpha Wave</title>
        <?php
        include('../controllers/login.php');
        try {
            if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
                header('Location: ../controllers/login.php');
                exit; // stop further executing, very important
            }
        } catch (Exception $exp) {
            
        }
        ?>

    </head>
    <body>
        <!--Navigation bar-->
        <div id="nav-placeholder">
        </div>
        <script>
            $(function () {
                $("#nav-placeholder").load("menu_static.html");
            });
        </script>
        <!--end of Navigation bar-->


        <!-- To apply style on whole page -->

        <main class="container">
            <div class="jumbotron shadow-sm bg-gradient">
                <div class="login-reg-panel bg-primary">
                    <div class="login-info-box">
                        <h2>Have an account?</h2>
                        <!--<p>Lorem ipsum dolor sit amet</p>-->
                        <label id="label-register" for="log-reg-show">Login</label>
                        <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
                    </div>

                    <div class="register-info-box">
                        <h2>Don't have an account?</h2>
                        <!--<p>Lorem ipsum dolor sit amet</p>-->
                        <label id="label-login" for="log-login-show">Register</label>
                        <input type="radio" name="active-log-panel" id="log-login-show">
                    </div>

                    <div class="white-panel">
                        <div class="login-show">
                            <h2>LOGIN</h2>
                            <input type="text" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <input type="button" value="Login">
                            <a href="">Forgot password?</a>
                        </div>
                        <div class="register-show">
                            <h2>REGISTER</h2>
                            <input type="text" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm Password">
                            <input type="button" value="Register">
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="page-footer">            
        </div>
        
        <script>
            $(document).ready(function () {
                $('.login-info-box').fadeOut();
                $('.login-show').addClass('show-log-panel');
            });

            $('.login-reg-panel input[type="radio"]').on('change', function () {
                if ($('#log-login-show').is(':checked')) {
                    $('.register-info-box').fadeOut();
                    $('.login-info-box').fadeIn();

                    $('.white-panel').addClass('right-log');
                    $('.register-show').addClass('show-log-panel');
                    $('.login-show').removeClass('show-log-panel');

                } else if ($('#log-reg-show').is(':checked')) {
                    $('.register-info-box').fadeIn();
                    $('.login-info-box').fadeOut();

                    $('.white-panel').removeClass('right-log');

                    $('.login-show').addClass('show-log-panel');
                    $('.register-show').removeClass('show-log-panel');
                }
            });
        </script>
    </body>
</html>
