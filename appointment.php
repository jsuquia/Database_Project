<?php
            
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['lense']) || isset($_POST['eye'])) {
            $price=null;
            $type=null;
            $time=null;
        if(isset($_POST['eye']))
        {
            $price=null;
            $type="eye";
            $time=30; 
        }
        if(isset($_POST['lense'])) {
            $price=25;
            $type="lense";
            $time=20; 
    }
    } else {
        //assume btnSubmit
    }
}
        ?>