<?php
    require_once "link.php";
    $str='/brokfree/filter.php';
    $val=link_check($str);
    if($val):
        ob_start();
        include "templates/error.html";
        $out=ob_get_clean();
        echo $out;
        exit();
    endif;
    if(isset($_GET['min']) && isset($_GET['min']))
    {
        $min=(int)$_GET['min'];
        $max=(int)$_GET['max'];
        $q1=' AND rent BETWEEN :min AND :max';
        $array['min']=$min;
        $array['max']=$max;
    }
    if(isset($_GET['radio'])):
        $q1.=' AND bedroom=:bed';
        $array['bed']=(int)$_GET['radio'];
    endif;
    if(isset($_GET['radio1'])):
        $q1.=' AND water=:water';
        $array['water']=$_GET['radio1'];
    endif;
    if(isset($_GET['radio2'])):
        $q1.=' AND pt=:pt';
        $array['pt']=$_GET['radio2'];
    endif;
    if(isset($_GET['radio3'])):
        $q1.=' AND furnishing=:fur';
        $array['fur']=$_GET['radio3'];
    endif;