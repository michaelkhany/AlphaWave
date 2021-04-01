<?php

function getContent($subject) {
    if (!isset($subject))
        $subject = "";

    $title_info = "";   //Title
    $short_info = "";   //Short description
    $content_info = ""; //Content file path
// lookup all articles from models if $subject is not empty
    if ($subject !== "") {
        $subject = strtolower(htmlspecialchars($subject));

        $len = strlen($subject);
        $a = _contentSubjects2Array(); //array of content's subjects
        /////<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< TODO: Extract subjects from contents files

        $result = ""; //The list of content's names related to the subject to fill
        foreach ($a as $name) {
            if (strtolower($name) === strtolower($subject)) { //If the $name is same as $subject
                $result = '../models/contents/'.$name;
                break;
            }
//        if (strpos($a, 'are') !== false) { //If the $name contains $subject
//            if ($subject === "") {
//                $result = $name;
//            } else {
//                $result .= ", $name";
//            }
//        }
        }

        if (strlen($result) == 0) {
            header("Location: 404.html");
            return "404";
            exit;
        } else if (file_exists($result)) {
            return $result;
        } else {
            return "502";
        }
//                                    $_res = explode("<;>", this.responseText);
//                                        $_title_info = $_res[0];
//                                        $_short_info = $_res[1];
//                                        $_content_info = $_res[2];
    }
}

function getAllContents() {
    $a = _contentSubjects2Array(); //array of content's subjects
    /////<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< TODO: Extract subjects from contents files
    return $a;
}

function _contentSubjects2Array() {
    $path = '../models/contents/';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    return $files;
}

function alert($msg) { //MessageBox in php environment
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>
