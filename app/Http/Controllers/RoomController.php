<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RoomController extends Controller
{

	public function datetime() {
		$datetime = Carbon::now('Asia/Karachi');
		return $datetime;
	}
    
    public function room() {
    	$room = Room::where(['status' => 1])->get();
    	return view('admin.room.room')->with('rooms',$room);
    }

    public function add_room() {
    return view('admin.room.add_room');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
    		'room_number' => 'required',
    		'room_type' => 'required',
    		'rent' => 'required',
    		'beds' => 'required',
			]);

        $room = new Room;
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->beds = $request->beds;
        $room->rent = $request->rent;
        $room->added_by = Auth::id();
        $room->added_on = $this->datetime();
        $room->updated_by = Auth::id();
        $room->updated_on = $this->datetime();
        $room->save();

		if($room->save()){

        	session()->flash('success_msg', 'Room '.$request->room_number.' added successfully.');
        	return redirect('/admin/room/room');
    	}else{
        	session()->flash('failure_msg', 'Room '.$request->room_number.' Failed to add.');
    		}
        
    }

    public function edit_room($id) {

    	$rooms = Room::where([
        ['status', '=', '1'],
        ['id', '=', $id]
    ])->first();  
    	return view('admin.room.edit_room',compact('rooms'));	
    
    }

    public function update_room(Request $request,$id) {
    	$room = Room::where([
        ['status', '=', '1'],
        ['id', '=', $id]
    	])->first();  
  
    	$request->validate([
    		'room_number' => 'required',
    		'room_type' => 'required',
    		'rent' => 'required',
    		'beds' => 'required',
			]);
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->beds = $request->beds;
        $room->rent = $request->rent;
        $room->updated_by = '1';
        $room->updated_on = $this->datetime();
        $room->save();

		if($room->save()){
       	session()->flash('success_msg', 'Room '.$request->room_number.' updated successfully.');
        	return redirect('/admin/room/room');
    	}else{
        	session()->flash('failure_msg', 'Room '.$request->room_number.' Failed to update.');
    		}
        
    }

    public function remove_room($id) {
    	 $room = Room::where([
        ['status', '=', '1'],
        ['id', '=', $id]
    	])->first(); 

    	$room->status = '0';
        $room->save();
		
		if($room->save()){
       	session()->flash('success_msg', 'Room '.$room->room_number.' delted successfully.');
        	return redirect('/admin/room/room');
    	}else{
        	session()->flash('failure_msg', 'Room '.$room->room_number.' Failed to delete.');
    		} 
    }
}