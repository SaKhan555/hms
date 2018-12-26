<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Allotment;
use App\Room;
use App\Renter;
use App\Custome\Custome;
use Illuminate\Support\Facades\Auth;

class AllotmentController extends Controller
{

  private $custome;
  private $room;
  private $renter;
  public function __construct(Custome $custome,Room $room,Renter $renter){
    $this->custome = $custome;
    $this->room = $room;
    $this->renter = $renter;
  }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
// $countRoomRenter = Allotment::countRoomRenter();
// $store_array = array();
// foreach ($countRoomRenter as $key) {
//     $store_array[] = $key['count_alloted'];
// }
// return $store_array;

// return $countRoomRenter[0]['count_alloted']; 
  $rooms = $this->room->where(['status' => 1])->whereHas('allotedRenters')->get();
  // $renters = Renter::where('status','=','1')->latest('id','DESC')->get();
  return view('admin.allotment.index',compact('rooms'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//<!-----------------select all non full of size --------------------->
  $room = $this->room->where([ 'status' => 1 ])->get();

//<!-----------------Allotment is a function defined in renter --------------------->

  $renter = $this->renter->whereDoesntHave('Allotment')->where([['status','=','1']])->get();
  return view('admin.allotment.create',compact('room','renter'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

  $rules = [
    'room' => 'required',
    'renter' => 'required',
    'date' => 'required',
  ];
  $this->validate($request,$rules);


foreach($request->renter as $x=>$si_x) {
  $Allotment = new Allotment;
    $Allotment->renter_id = $si_x;
    $Allotment->room_id = $request->room;
    $Allotment->date = $this->custome->store_full_date($request->date);
    $Allotment->created_by = auth()->user()->id;
    $Allotment->created_at = $this->custome->store_datetime();
    $Allotment->updated_by = auth()->user()->id;
    $Allotment->updated_at = $this->custome->store_datetime();
    $Allotment->save();
}

  if($Allotment->save()){
    session()->flash('success_msg', 'Room alloted successfully.');
    return redirect()->route('admin.allotment');
  }else{
    session()->flash('failure_msg', 'Some error occuring while room alloting.');
    return back();
  }

}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
//<!-----------------select all non full of size --------------------->
  $rooms = $this->room->where(['status' => 1])->whereHas('allotedRenters')->get();
//<!-----------------Allotment is a function defined in renter --------------------->
  $renters = $this->renter->where(['status' => 1])->get();
  return view('admin.allotment.edit',compact('rooms','renters'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
//
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
//
}

function isFull(Request $request) 
{
//   SELECT COUNT(room_id) AS 'size'  FROM hms.Allotments WHERE room_id = 1 AND status = 1
// select beds from rooms where id = 1 and status = 1

  $room_id = $request->id;
  $alloted_renter = Allotment::where(['room_id' => $room_id])->count();
  $room = Room::where(['status' => '1'])->where(['id' => $room_id])->get();
  $diff = ($room[0]->beds)-($alloted_renter);
  $data = ['_size' => $room[0]->beds,'alloted'=>($alloted_renter == 0) ? 'None' : $alloted_renter];
  if($diff < 1){
    $data['msg'] = 'Room is Full.';
    $data['available'] = 'no availability';  
  }else{
    $data['msg'] = 'Available: ';
    $data['available'] = $diff;  
  }
  return $data;
}

}
