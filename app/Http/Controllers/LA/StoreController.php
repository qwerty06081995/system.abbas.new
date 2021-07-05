<?php


namespace App\Http\Controllers\LA;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Overhead;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public $show_action = true;
    public function index(){
        $show_actions = $this->show_action;
        $orders  = Order::where('status', 'Курьер забрал')->where('courier_id', '!=', 0)->get();
        //dd($orders);
        return view('la.store.index', compact('orders', 'show_actions'));
    }

    public function show($id = 0){
        //dd($id);
        $order = Order::find($id);
        $overheads = $order->overheads();

//        //dd($order);
//        $overhead = Overhead::where('overhead_code', $order->overhead_id)->get()->first();
        //dd($overhead);
        return view('la.store.show', compact('order', 'overheads'));
    }
    public function editer($id){
        $overhead = Overhead::find($id);
        dd($overhead);
    }
    public function check(){
        //dd($_GET);
        $order_id = intval($_GET['order_id']);
        $overhead_code = intval($_GET['overhead_code']);
        //dd($order_id);
        $overhead = Overhead::where('overhead_code', $overhead_code)->get()->first();
        //dd($overhead == null);
        if ($overhead == null){
            $overhead = Overhead::create([
                'overhead_code' =>$overhead_code,
                'order_id'      =>$order_id
            ]);

        }else{
            $overhead = false;
        }
        if ($overhead){
            //$order->overhead_id = $overhead_id;
            //$order->save();
            Session::flash('message1', 'Накладной успешно добавлен');
            return redirect()->route('la.store.show', $order_id);
        }else{
            Session::flash('message2', 'Такой накладной существует');
            return redirect()->route('la.store.show', $order_id);
        }
    }
//    public function sendEvaluate(){
//
//    }

}