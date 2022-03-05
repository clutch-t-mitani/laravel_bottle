<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBottle;

class HomeController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {
        //顧客一覧取得
        $customers = Customer::IsUserId()
        ->orderBy('created_at','ASC')
        ->get();

        //顧客に紐づいてるボトル取得
        $bottles = CustomerBottle::IsUserId()
        ->orderBy('created_at','ASC')
        ->get();

        $results = [];
        foreach ($bottles as $bottle) {
            $results[$bottle['id']] = $bottle;
        }

        $customer_bottles = [];   
        foreach ($results as $result) {
            $customer_id = $result['customer_id'];
            if (!array_key_exists($customer_id,$customer_bottles)) {
                $customer_bottles[$customer_id] = [];
            }
                $customer_bottles[$customer_id][] = $result;
            }

        return view('home',compact('customers','customer_bottles'));
    }
}
