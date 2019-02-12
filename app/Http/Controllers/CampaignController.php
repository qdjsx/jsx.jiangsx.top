<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;


class CampaignController extends Controller
{

    public  function jsx(){
        $a = \DB::table('admin')->get();
        //var_dump($a);
        var_dump(1);
    }


}
