<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBottle;
use App\Models\Bottle;
use App\Models\Bill;
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

        //来店記録
        $latest_bill = Bill::IsUserId()
        ->where('customer_id','=',$id)
        ->orderBy('visit_date','ASC')
        ->get();    
        // dd($latest_bill);


        return view('edit',compact('edit_customers','cutomer_bottles','bottles','latest_bill'));
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

            return back()->with('flash_message', '更新しました');
            ;   
        }

        if($request->has('delete')){
            Customer::where('id',$request->id)->delete();
            return redirect('/')->with('flash_message', '削除が完了しました');  
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
            return back()->with('flash_message', '更新しました');   
        }

        if($request->has('delete')){
            CustomerBottle::where('id',$request->id)->delete();
            return back()->with('flash_message', '削除が完了しました');   
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
        return back()->with('flash_message', '登録しました');   
    }

    /**
     * 登録ボトルの編集⇨DB登録
     */

    public function register_bottle(Request $request)
    {
        $posts = $request->all();
        $results = explode("\r\n",$posts['product_name']);

        DB::transaction(function() use($results){
            Bottle::IsUserId()->delete();

            foreach($results as $result){
                $bottles  = new Bottle();        
                $bottles->product_name = $result;
                $bottles->user_id =  \Auth::id();
                $bottles->save();
            }
        });

        return back()->with('flash_message', '更新しました');  

    }

}
