<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Allotment;

class Renter extends Model
{
public $timestamps = false;
protected $guarded = [];


public function user()
{

return $this->belongsTo(User::class, 'added_by');

}

public function payments() {
	return $this->hasMany(Payment::class,'id','renter_id');
}

public function Allotment(){
	return $this->belongsTo('\App\Allotment','id','renter_id');
}

public function rooms() {
	return $this->belongsToMany(Room::class,'allotments');
}

}