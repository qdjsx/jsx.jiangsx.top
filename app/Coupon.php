<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Channel;

class Coupon extends Model
{
    //
    protected  $arra  = [
        '-1' =>'状态-1',
        '1' =>'状态1',

    ];
    public $timestamps = false;
    protected  $table = 'coupon';

    public function Channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public  function arrays($id)
    {
        $this->arra[$id];
    }
}
