<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class AjaxController extends Controller
{
    public function checkcustomer(Request $request){
        $customerphone = $request->customerp;

        $data = DB::select("SELECT * FROM `customer` WHERE `customer_phone` = $customerphone");
        if($data){
            $status = 1;
            foreach ($data as $datas) {
           $customerid = $datas->customer_id;
           $customername = $datas->customer_name;
        }
        } else {
            $status = 0;
            $data->customer_id = 0;
            $data->customer_name = 0;
        }


      return response()->json([
           'status'=>$status,
           'customer_id'=>$customerid,
           'customer_name'=>$customername,
           'customer_phone'=>$customerphone
        ]);
    }

    public function addcustomer(Request $request){
        $customername = $request->customername;
        $customerphone = $request->customerphone;
        DB::insert("INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_note`) VALUES (NULL, '$customername', '$customerphone', '')");

        return response()->json(['status'=>1]);
    }

    public function addorder(Request $request){
        $order_weight = $request->order_weight;
        $order_type = $request->order_type;
        $order_price = $request->order_price;
        $order_location = $request->order_location;
        $customer_phone = $request->customer_phone;
        $date = date("Y-m-d");
        $order_driver = $request->order_driver;
        $customerdata = DB::select("SELECT `customer_id` From `customer` WHERE `customer_phone` = '$customer_phone'");
        foreach ($customerdata as $customers) {
            $customer_id = $customers->customer_id;
            break;
        }

        $status = DB::insert("INSERT INTO `orders`
        (`order_id`, `customer_id`, `order_location`, `order_weight`, `type_id`, `order_price`, `order_date`, `order_time`, `driver_id`, `order_note`, `order_done`) VALUES
        (NULL, '$customer_id', '$order_location', '$order_weight', '$order_type', '$order_price', '$date', current_timestamp(), '$order_driver', NULL, '2')");

        return response()->json(['status'=>$customer_id]);
    }

    public function updateorderstatus(Request $request){
        $orderid = \request("orderid");
        $state = \request("state");
        $status = DB::update("UPDATE `orders` set order_done = $state WHERE order_id = $orderid");
        return response()->json(['status'=>$status]);
    }

    public function buttonstate(Request $request){
        $orderid = \request("orderid");
        $status = DB::select("SELECT * FROM `orders` WHERE order_id = $orderid");
        foreach ($status as $data) {
            $orderstate = $data->order_done;
        }
        return response()->json(['status'=>$orderstate]);
    }

    public function submitsubstring(Request $request){
        $orderid = \request("orderid");
        $weight = \request("weight");
        $price = \request("price");
        $type = \request("type");
        $driver = \request("driver");
        $status = DB::update("INSERT INTO `suborder`
        (`sub_id`, `order_id`, `sub_weight`, `sub_price`, `sub_type`, `sub_driver`, `sub_date`, `sub_note`)
         VALUES (NULL, '$orderid', '$weight', '$price', '$type', '$driver', current_timestamp(), '')");
        return response()->json(['status'=>1]);
    }
}
