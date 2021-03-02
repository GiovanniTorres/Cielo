<?php
    $admin = "" ;
    $a = "" ;
    $admincontroller = new AdminController () ;
    $getadmin = $admincontroller->getAdmin ($admin = $a) ;
    $countadmin = count ($getadmin) ;