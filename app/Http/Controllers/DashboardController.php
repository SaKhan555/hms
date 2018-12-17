<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Renter;

class DashboardController extends Controller
{

public function index(){
	$countRenter = Renter::where(['status' => 1])->count();
	$countRoom = Room::where(['status' => 1])->count();
return view('admin.index')->with(['countRenter'=>$countRenter,'countRoom'=>$countRoom]);
}
}
