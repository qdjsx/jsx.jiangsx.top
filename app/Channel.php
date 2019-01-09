<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected  $table = 'channel';
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
