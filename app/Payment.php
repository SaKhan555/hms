<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $dates = ['date'];

    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }

    public function paid_renter() {
    	return $this->belongsTo(Renter::class,'renter_id','id');
    }

}
