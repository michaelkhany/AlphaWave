<!--
    Project AlphaWave
    Dev.: Michael B.Kh.
-->
<?php
    #require_once("user.php");
    $result = -1;
    if(isset($_POST['un']) && !empty($_POST['pw']) && !empty($_POST['un'])){
        $username = $_POST['un'];
        $password = $_POST['pw'];
        #$result = User::register($username,$password);        
    }

//    echo $result;
?>
