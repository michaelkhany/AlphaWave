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
        <link href="../assets/css/style_main.css" rel="stylesheet">
        <!--    <link rel="stylesheet" href="assets/css/bootstrap.css">  To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/bootstrap.js"></script>   To add bootstrap to the project(download the whole zip file and copy into assets directory)
        <script src="assets/js/jquery-3.5.1.js"></script>    To add jquery into the prj(download the *.js file and add into assets dir) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>Alpha Wave</title>
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

        <main class="container">
            <div class="jumbotron jumbo-main shadow-sm bg-primary justify-content-center alight-items-center">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <form action="">
                            <input class="text text-sm-center search" type="text" name="target" value="" placeholder="What are you looking for?" size="50%" onkeydown="search(this.value)" onkeyup="showHint(this.value)"/>     
                            <a href="#" class="btn btn-submit btn-info btn-sm" role="button">Search</a>
                        </form>
                        <p>>><span id="txtHint"></span></p>  
                        <script>
                            function showHint(str) {
                                if (str.length == 0) {
                                    document.getElementById("txtHint").innerHTML = "";
                                    return;
                                } else {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function () {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("txtHint").innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "../controllers/gethint.php?q=" + str, true);
                                    xmlhttp.send();
                                }
                            }

                        </script>
                    </div>
                    <div class="col-sm-3"></div>
                </div>            
                
            </div>
            <div class="well well-sm shadow-sm bg-secondary">
                <h4>Crypto-currency News(from LunarCrush.com):</h4>
                <!--<iframe src="https://lunarcrush.com/widgets/wordcloud?symbol=BTC&interval=1 Week&animation=false&theme=light" id="wordcloud" frameBorder="0" border="0" cellspacing="0" scrolling="no" style="width: 100%; height: 200px;"></iframe>-->
                <iframe class="shadow-sm bg-secondary" src="https://lunarcrush.com/widgets/news?interval=0 Week&animation=true&theme=light" id="news-articles" frameBorder="0" border="0" cellspacing="0" scrolling="yes" style="width: 100%; height: 150px;"></iframe>
                
            </div>
        </main> 
        <div class="page-footer">
        </div>
    </body>
</html>
