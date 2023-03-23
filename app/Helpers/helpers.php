<?php 

if (! function_exists('getAge')) {
    function getAge($birthday)
    {
        $birth = new DateTime($birthday);
        $now = new DateTime(date("Y-m-d"));
        $age = $now->diff($birth);
        return $age->format("%y");
    }
}