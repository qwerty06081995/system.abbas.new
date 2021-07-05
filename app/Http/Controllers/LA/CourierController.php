<?php


namespace App\Http\Controllers\LA;


use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Employee;
use App\Models\Order;

class CourierController extends Controller
{
    public $show_action = true;
    public function index(){
        $orders1  = Order::where('status', 'В процессе')->where('courier_id', 0)->get();
        //dd($orders1);
        $orders2  = Order::where('status', 'Курьер назначен')->where('courier_id', '!=', 0)->get();
        $orders3  = Order::where('status', 'Курьер забрал')->where('courier_id', '!=', 0)->get();

        $show_actions = $this->show_action;

        $couriers = Employee::where('designation','Курьер')->get();
        return view('la.courier.index', compact('orders1','orders2', 'orders3', 'show_actions', 'couriers'));
    }

    public function courier_appoint(){
        $order_id = $_POST['order_id'];
        $courier_id = $_POST['courier_name'];
        $update_order = Order::where('id', $order_id)->first()->update(['courier_id'=>$courier_id, 'status'=>'Курьер назначен']);
        return redirect()->route('la.courier');
        //dd($_POST);
        //return 0;
    }
}