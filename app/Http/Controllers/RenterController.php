<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Allotment;
use App\Exports\RenterExport;
use App\Imports\RenterImport;
use Maatwebsite\Excel\Facades\Excel;

class RenterController extends Controller {
    protected function store_datetime() {
      $datetime = Carbon::now('Asia/Karachi');
      return $datetime;
    }

    protected function store_date($date) {
        $store_date = strtotime($date); 
        return date("Y-m-d",$store_date);
    }

    protected function show_date($date) {
        $show_date = strtotime($date); 
        return date("d-m-Y",$show_date);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $renters = Renter::where('status','=','1')->latest('id','DESC')->get();
        return view('admin.renter.index')->with('renters',$renters);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.renter.create');
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
        'name' => 'required',
        'father_name' => 'required',
        'nic_number' => 'required|unique:renters,nic_number',
        'contact' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'profession' => 'required',
        'marital_status' => 'required',
        'nic_copy' => 'required',
        'photo' => 'required',
        'gender' => 'required',
        // 'email' => 'requred|email|',dob

       ];
       $this->validate($request,$rules);



    
    if($request->hasfile('photo')) 
            { 
          $photo = $request->file('photo');
          $photoname = $photo->getClientOriginalName();
          $filename1 =rand().'_'.$photoname;
          $photo->move('uploads/images/', $filename1);
        }

    if($request->hasfile('nic_copy')) 
            { 
          $nic_copy = $request->file('nic_copy');
          $nic_copyname = $nic_copy->getClientOriginalName();
          $filename2 =rand().'_'.$nic_copyname;
          $nic_copy->move('uploads/images/', $filename2);
        }

         $renter = new Renter;
         $renter->name = $request->name;
         $renter->father_name = $request->father_name;
         $renter->nic_number = $request->nic_number;
         $renter->contact = $request->contact;
         $renter->email = $request->email;
         $renter->address = $request->address;
         $renter->gender = $request->gender;
         $renter->marital_status = $request->marital_status;
         $renter->dob = $this->store_date($request->dob);
         $renter->profession = $request->profession;
         $renter->other_details = $request->other_details;
         $renter->photo_url = $filename1;
         $renter->nic_copy = $filename2;
         $renter->added_by = Auth::user()->id;
         $renter->added_on = $this->store_datetime();
        $renter->save();
        if($renter->save()){

            session()->flash('success_msg', 'Renter '.$request->name.' added successfully.');
            return redirect('/admin/renter/');
        }else{
            session()->flash('failure_msg', 'Renter '.$request->name.' Failed to add.');
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
        $si_renter = Renter::find($id);
          return view('admin.renter.show',compact('si_renter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ed_renter = Renter::find($id);
      return view('admin.renter.edit',compact('ed_renter'));
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

        $renter = Renter::where([
            ['status','=','1'],['id','=',$id]
        ])->first();

         $rules = [
        'name' => 'required',
        'father_name' => 'required',
        'nic_number' => 'required',
        'contact' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'profession' => 'required',
        'marital_status' => 'required',
        'gender' => 'required',
        // 'email' => 'requred|email|',dob

       ];
       $this->validate($request,$rules);
    
    if($request->hasfile('photo')) 
            { 
          $photo = $request->file('photo');
          $photoname = $photo->getClientOriginalName();
          $filename1 =rand().'_'.$photoname;
          $photo->move('uploads/images/', $filename1);
                 $renter->photo_url = $filename1;
        }
    if($request->hasfile('nic_copy')) 
            { 
          $nic_copy = $request->file('nic_copy');
          $nic_copyname = $nic_copy->getClientOriginalName();
          $filename2 =rand().'_'.$nic_copyname;
          $nic_copy->move('uploads/images/', $filename2);
              $renter->nic_copy = $filename2;
        }

         $renter->name = $request->name;
         $renter->father_name = $request->father_name;
         $renter->nic_number = $request->nic_number;
         $renter->contact = $request->contact;
         $renter->email = $request->email;
         $renter->address = $request->address;
         $renter->gender = $request->gender;
         $renter->marital_status = $request->marital_status;
         $renter->dob = $this->store_date($request->dob);
         $renter->profession = $request->profession;
         $renter->other_details = $request->other_details;
  
     
         $renter->updated_by = Auth::user()->id;
         $renter->updated_on = $this->store_datetime();
        $renter->save();
        if($renter->save()){

            session()->flash('success_msg', 'Renter '.$request->name.' Updated successfully.');
            return redirect('/admin/renter/');
        }else{
            session()->flash('failure_msg', 'Renter '.$request->name.' Failed to add.');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $renter = Renter::where([['status','=','1'],['id','=',$id]])->first();
        $renter->status = 0;
        $renter->save();
        if($renter->save()){
          return "success";
        }else{
            return "fail";
            }
    }

        public function export() 
    {
        return Excel::download(new RenterExport, 'renters.xlsx');
    }
    
    public function import() 
    {
        return Excel::import(new RenterImport, 'renter.xlsx');
    }
}
