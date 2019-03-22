<?php
    function link_check(string $str){
        $val=false;
        $url=$_SERVER['REQUEST_URI'];
        if(strcasecmp($str,$url)==0)
            $val=true;
        return $val;
    }
    $str='/brokfree/link.php';
    if(link_check($str)):
        ob_start();
        include "templates/error.html";
        $out=ob_get_clean();
        echo $out;
    endif;
?>