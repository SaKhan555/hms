<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Permission;

class Role extends Model
{
	use SoftDeletes;
    protected $fillable = ['name','permissions'];
    protected $dates = ['deleted_at'];

    public function users(){
    	return $this->belongsToMany('App\User','roles_users');
    }  
    
      public function permissions(){
    	return $this->belongsToMany(Permission::class,'role_permission');
    }
}
