<?php
    function lang($phrase)
     
    {
        static $lang = array(

        // Dashboard Page

        'HOME_ADMIN' => 'Home',
        'CATEGORIES' => 'categories',
        'ITEMS' => 'Item',
        'MEMBERS' => 'Members',
        'COMMENTS' => 'Comments',
        'STATISTICS' => 'Statistics',
        'LOGS' => 'logs',
        '' =>'',
        '' =>'',
        '' =>'',
        '' =>'',
        '' =>'',
        '' =>'',

        
        );
        return $lang[$phrase];
    }
?>