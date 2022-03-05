<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBottle;
use DB;

class EditController extends Controller
{
    /**
     * 顧客情報編集の表示
     * 顧客に紐づいてるボトル情報を表示
     */
    public function edit($id)
    {
        // 顧客情報編集の表示
        $edit_customers = Customer::IsUserId()
        ->where('id','=',$id)
        ->orderBy('created_at','ASC')
        ->get();

        //顧客に紐づいてるボトル情報を表示
        $cutomer_bottles = CustomerBottle::IsUserId()
        ->where('customer_id','=',$id)
        ->orderBy('created_at','ASC')
        ->get();

        return view('edit',compact('edit_customers','cutomer_bottles'));
    }

    /**
     * 顧客情報更新
     */
    public function update(Request $request)
    {
        if($request->has('update')){
            $edit_customers = Customer::where('id',$request->id)->first();
            $edit_customers->name = $request->name;
            $edit_customers->company = $request->company;
            $edit_customers->memo = $request->memo;
            $edit_customers->save();

            return back();   
        }

        if($request->has('delete')){
            Customer::where('id',$request->id)->delete();
            return redirect('/');  
        }

    }


}
