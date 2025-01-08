<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rmunate\Utilities\SpellNumber;

class AppController extends Controller
{
    public function getAmountInWords($number)
    {
        $in_words = SpellNumber::value($number)
            ->locale('en')
            ->currency('Kwacha')
            ->fraction('Tambala')
            ->toMoney();

        return str_replace(" of "," ",$in_words);
    }

    public function getZeroedNumber($number, $revision = 0)
    {
        $zeroed_number = '';
        switch ($number) {
            case $number < 10:
                $zeroed_number = "0000$number";
                break;
            case $number < 100:
                $zeroed_number = "000$number";
                break;
            case $number < 1000:
                $zeroed_number = "00$number";
                break;
            case $number < 10000:
                $zeroed_number = "0$number";
                break;
            default:
                $zeroed_number = $number;
        }

//        if($revision > 0){
//            $zeroed_number = $zeroed_number."REV$revision";
//        }

        return $zeroed_number;
    }
}
