<?php
    function lang($phrase)
     {
        static $lang = array(
            'MESSAGE' => "Welcome in Arabic",
            'ADMIN' => "Adminstrator" ,
        );
        return $lang[$phrase];
    }
?>