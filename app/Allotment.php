<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Room;
use App\Renter;
use App\User;

class Allotment extends Model
{
 use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
	public $timestamps = false;
	protected $fillable = ['room_id','renter_id','date'];
	protected $table = 'allotments';
	protected $dates = ['updated_at','deleted_at'];

	// public function room() {
	// 	return $this->belongsTo(Room::class,'room_id','id');
	// }

	// public function renter() {
	// 	return $this->hasOne(Renter::class,'id','renter_id');
	// }
}


