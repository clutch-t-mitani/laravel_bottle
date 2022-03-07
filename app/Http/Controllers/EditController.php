<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBottle;
use App\Models\Bottle;
use DB;

class EditController extends Controller
{
    /**
     * 顧客情報編集の表示
     * 顧客に紐づいてるボトル情報を表示
     * 登録ボトル一覧を表示
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

        //登録ボトル一覧を表示
        $bottles = Bottle::IsUserId()
        ->orderBy('created_at','ASC')
        ->get();

        return view('edit',compact('edit_customers','cutomer_bottles','bottles'));
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

    /**
     * ボトル情報更新
     */
    public function customer_bottle(Request $request)
    {
        if($request->has('update'))
        {
            $edit_customer_bottles = CustomerBottle::where('id',$request->id)->first();
            $edit_customer_bottles->bottle_name = $request->bottle_name;
            $edit_customer_bottles->amount = $request->amount;
            $edit_customer_bottles->save();
            return back();   
        }

        if($request->has('delete')){
            CustomerBottle::where('id',$request->id)->delete();
            return back();   
        }
    }

    /**
     * /顧客に紐づいてるボトル情報登録⇨DB登録
     */

    public function register_customer_bottle(Request $request)
    {
        $customer_bottles = new CustomerBottle();
        $customer_bottles->product_name = $request->product_name;
        $customer_bottles->bottle_name = $request->bottle_name;
        $customer_bottles->amount = $request->amount;
        $customer_bottles->user_id =  \Auth::id();
        $customer_bottles->customer_id =  $request->customer_id;
        $customer_bottles->save();
        return back();   
    }

}
