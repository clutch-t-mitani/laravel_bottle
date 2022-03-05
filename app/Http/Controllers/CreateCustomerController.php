<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBottle;
use DB;

class CreateCustomerController extends Controller
{
    /**
     * 顧客登録画面追加
     */
    public function create_customer()
    {
        return view('create_customer');
    }

    /**
     * 顧客登録⇨DB登録
     */
    public function store_customer(Request $request)
    {
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->company = $request->company;
        $customers->memo = $request->memo;
        $customers->user_id =  \Auth::id();
        $customers->save();

        return redirect('/');  
    }
}
