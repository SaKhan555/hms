<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RenterRoom;

class Room extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function user_2()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


public function allotedRenters(){
    return $this->belongsToMany(Renter::class,'allotments')->withPivot('id','date');
}
    // public function room_renter()
    // {
    //     return $this->hasMany(RenterRoom::class,'id','room_id');
    // }

}
