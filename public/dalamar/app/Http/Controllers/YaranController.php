<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use DB;
use GuzzleHttp\Psr7\Request;

class YaranController extends Controller
{
    public function showorder($id) {
        $types = DB::select("SELECT * FROM types");
        $driverdata = DB::select("SELECT * FROM `drivers`");
        $selected = DB::select("SELECT `suborder`.`sub_id`, `orders`.`customer_id`, `orders`.`order_done` , `customer`.`customer_name`, `types`.`type_name`,
         `suborder`.`sub_weight`,`suborder`.`sub_price`, `suborder`.`sub_date`, `drivers`.`driver_name`, `suborder`.`sub_note`, `suborder`.*
        FROM `suborder`
            LEFT JOIN `orders` ON `suborder`.`order_id` = `orders`.`order_id`
            LEFT JOIN `customer` ON `orders`.`customer_id` = `customer`.`customer_id`
            LEFT JOIN `types` ON `orders`.`type_id` = `types`.`type_id`
            LEFT JOIN `drivers` ON `suborder`.`sub_driver` = `drivers`.`driver_id`
             WHERE `orders`.`order_id`=$id");
        return view('order', ["selected" => $selected, "drivers"=> $driverdata, "types"=>$types]);
    }

    public function index(){
        $selected = DB::select("SELECT `orders`.`order_id`, `customer`.`customer_name`, `customer`.`customer_phone`, `drivers`.`driver_name`, `orders`.`order_location`, `orders`.`order_weight`, `orders`.`order_price`, `orders`.`order_time`, `orders`.`order_note`, `orders`.`order_done`, `types`.`type_name`
        FROM `orders`
            LEFT JOIN `customer` ON `orders`.`customer_id` = `customer`.`customer_id`
            LEFT JOIN `drivers` ON `orders`.`driver_id` = `drivers`.`driver_id`
            LEFT JOIN `types` ON `orders`.`type_id` = `types`.`type_id` ORDER BY `orders`.`order_date`DESC");

        return view('orders', ["selected" => $selected]);
    }

    public function search() {
        $cname = \request("cname");
        $cphone = \request("cphone");
        $driveridf = \request("driveridf");
        $startdate = \request("startdate");
        $enddate = \request("enddate");



        $driverdata = DB::select("SELECT * FROM `drivers`");
        $selected = DB::select("SELECT `orders`.`order_id`, `customer`.`customer_name`, `customer`.`customer_phone`, `drivers`.`driver_name`, `orders`.`order_location`, `orders`.`order_weight`, `orders`.`order_price`, `orders`.`order_date`, `orders`.`order_note`, `orders`.`order_done`, `types`.`type_name`
        FROM `orders`
            LEFT JOIN `customer` ON `orders`.`customer_id` = `customer`.`customer_id`
            LEFT JOIN `drivers` ON `orders`.`driver_id` = `drivers`.`driver_id`
            LEFT JOIN `types` ON `orders`.`type_id` = `types`.`type_id`
            WHERE
            (`customer`.`customer_name` LIKE '$cname')
            OR (`customer`.`customer_phone` LIKE '$cphone')
            OR (`orders`.`driver_id` LIKE '$driveridf')
            OR (`orders`.`order_date` between '$startdate' AND '$enddate')
            ORDER BY `orders`.`order_date`DESC");

        return view('search', ["selected" => $selected, "driverdata" => $driverdata]);
    }

    public function neworder(){

        $types = DB::select("SELECT * FROM types");
        $drivers = DB::select("SELECT * FROM drivers");
        $customer = DB::select("SELECT * FROM customer");

        return view('neworder', ["types" => $types, "drivers" => $drivers , "customers" => $customer]);
    }

    public function customers(){
        $data = DB::select("SELECT * FROM `customer` ");

        return view('/related/customers' , ["data" => $data]);
    }

}
