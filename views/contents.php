<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <link rel='shortcut icon' type='image/icon' href='favicon.ico'/>
        <link href="../assets/css/style_pages.css" rel="stylesheet">
        <!--    <link rel="stylesheet" href="assets/css/bootstrap.css">  To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/bootstrap.js"></script>   To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <script src="assets/js/jquery-3.5.1.js"></script>    To add jquery into the prj(download the *.js file and add into assets dir) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <?php
        require_once('../controllers/getContent.php');

        if (filter_input(INPUT_GET, 'subject', FILTER_SANITIZE_STRING) !== null) {
            $_subject = filter_input(INPUT_GET, 'subject', FILTER_SANITIZE_STRING);
        }

        $_content_path = getContent($_subject);
        if ((strlen($_content_path) > 0) && ($_content_path !== "404")) {
            if ($_content_path === "502") {
                alert("Error 502: Server does not respond(Internal gateway error).");
            } else {
                try {
                    $xml = file_get_contents($_content_path);
                    // replace '&' followed by a bunch of letters, numbers
                    // and underscores and an equal sign with &amp;
                    $xml = preg_replace('#&(?=[a-z_0-9]+=)#', '&amp;', $xml);   /* Avoiding some parsing errors of SimpleXML */
                    $xml = simplexml_load_string($xml) or alert(">>Error 500: Content does not supported(Internal error).");

                    if (isset($xml->subject))
                        $_content_subject = $xml->subject;
                    else
                        $_content_subject = "";
                    if (isset($xml->detail))
                        $_content_detail = $xml->detail;
                    else
                        $_content_detail = "";
                    if (isset($xml->body))
                        $_content_body = $xml->body;
                    else
                        $_content_body = "";
                } catch (Exception $exp) {
                    header("Location: 404.html");
                    die();
                }
            }
        } else {
            header("Location: 404.html");
            die;
        }
        ?>

        <title>Contents</title>
    </head>
    <body>>
        <div id="nav-placeholder">
        </div>
        <script>
            $(function () {
                $("#nav-placeholder").load("menu_static.html");
            });
        </script>
        <!--end of Navigation bar-->

        <main class="container">
            <div class="jumbotron p-3 p-md-3 text-white rounded bg-dark">
                <div class="col-md-12 px-0">
                    <h1 class="display-4 font-italic">
                        <span id="_title_info">
                            <?php
                            if (($_content_subject !== "") || ($_content_subject != null))
                                echo $_content_subject;
                            else { //If content doesn't load, replace the content
                                echo("About");
                            }
                            ?> 
                        </span>   
                    </h1>
                    <p class="lead my-3">
                        <span id="_short_info">
                            <?php
                            if (($_content_detail !== "") || ($_content_detail != null))
                                echo $_content_detail;
                            else { //If content doesn't load, replace the content
                                echo("The body's encoding is just manipulated simply by string html encoding function.");
                            }
                            ?> 
                        </span>                 
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <?php
                        if (($_content_body !== "") || ($_content_body != null))
                            echo html_entity_decode($_content_body);
                        else { //If content doesn't load, replace the content
                            echo("             
                                <!--about content's body-->
                                <div id = \"about-placeholder\">
                                </div>
                                <script>
                                $(function () {
                                            $(\"#about-placeholder\") . load(\"../models/about_raw_body\");                                                                                     
                                    });
                                </script>
                                <!--end of about content's body-->
                            ");
                        }
                        ?>                     

                    </div><!-- /.blog-main -->
                </div>
                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">About</h4>
                        <p class="mb-0">AlphaWave Project <em>GNU GENERAL PUBLIC LICENSE, 2021.03</em> Developed by ENG. Michael B.Kh. Follow the project on github/sourceforge to support open source development society.</p>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Sources</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">SourceForge</a></li>
                            <li><a href="#">LunarCrush</a></li>
                        </ol>
                    </div>
                </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->

            <!--Footer bar-->
            <div id="footer-placeholder">
            </div>
            <script>
                $(function () {
                    $("#footer-placeholder").load("footer_static.html");
                });
            </script>
            <!--end of Footer bar-->
        </main>     
    </body>
</html>
