<?php

namespace App\Http\Controllers;
use App\Payment;
use App\Renter;
use Carbon\Carbon;
use App\Custome\Custome;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    
$payments = Payment::where([['status','=','1']])->get();
return view('admin.payment.index',compact('payments'));

}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create() {
    // $cutome = new Custome();
    // $dates = $cutome->store_date(now());
    // return $dates;
    // // $payments = Payment::where(['payment_status'=>'1','renter_id' => ])
    // // ->whereYear('date', '=', $year)
    // // ->whereMonth('date', '=', $month)
    // // ->get();
    $renters = Renter::where(['status'=>'1'])->get();
// $year = array();
    // foreach($payments as $payment) {
//     $year[] =  $payment->date->format('m Y');
// }

return view('admin.payment.create',compact('renters'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
//    $d = Carbon::createFromFormat('Y-m', $request->date);
//      return $d;

    $request->validate([
        'occupant' => 'required',
        'payment' => 'required',
        'date' => 'required',
    ]);

    $d = strtotime($request->date);
    $year = date("Y", $d);
    $month = date("m", $d);

    $payments = Payment::where(['payment_status'=>'1','renter_id' => $request->occupant])
    ->whereYear('date', '=', $year)
    ->whereMonth('date', '=', $month)
    ->get();

    if(count($payments) > 0){ 
         session()->flash('failure_msg', 'For '.$request->date.' already paid.');
         return back();
    } else {
        $payment = new Payment();
        $payment->renter_id = $request->occupant;
        $payment->payment = $request->payment;
        $payment->date = Custome::store_full_date($request->date);
        $payment->payment_status = '1';
        $payment->added_by = Auth::user()->id;
        $payment->added_on = Custome::store_datetime();
        $payment->updated_by = Auth::user()->id;
        $payment->updated_on = Custome::store_datetime();
        $payment->save();

        if($payment->save()) {
        session()->flash('success_msg', 'Payment of '.$request->occupant.' added successfully.');
        return redirect('/admin/payment/');
        } else {
        session()->flash('failure_msg', 'Payment of '.$request->occupant.' Failed to add.');
        }

    }
}

/**
* Display the specified resource.
*
* @param  \App\Payment  $payment
* @return \Illuminate\Http\Response
*/
public function show(Payment $payment)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Payment  $payment
* @return \Illuminate\Http\Response
*/
public function edit(Payment $payment)
{
//
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Payment  $payment
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Payment $payment)
{
//
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Payment  $payment
* @return \Illuminate\Http\Response
*/
public function destroy(Payment $payment)
{
//
}
}