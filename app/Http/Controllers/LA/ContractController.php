<?php

namespace App\Http\Controllers\LA;

use App\Models\Contract;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $contracts = Contract::where('author', Auth::user()->id)->get();
        //dd($contracts);

        return view('la.contract.index', compact('contracts'));
    }
    public function add(Request $request){
        //dd($request);
        $company_name   = $request->company_name;
        $plan           = $request->plan;
        $toCity         = $request->to_city;
        $mass           = $request->mass;
        $price          = $request->price;
        $purePrice      = $request->pure_price;
        $description    = $request->description;
        $from_city      = "Алматы";
        $code           = "ABBAS".rand(5, 15);
        $author         = Auth::user()->id;
        $status         = "Новый"; // 1-Новый, 2-В процессе, 3-Не выполнено, 4-Выполнено
        $zone           = 0;
        if ($toCity>=0 && $toCity<=15){
            $zone = 1;
        }elseif ($toCity>=16 && $toCity<=28){
            $zone = 2;
        }elseif($toCity==99){
            $zone = 3;
        }else{
            $zone = 0;
        }
        $date = date("Y-m-d H:i:s");



        $contract = Contract::create([
            'code' => $code,
            'author'=>$author,
            'plan'=>$plan,
            'zone'=>$zone,
            'mass'=>$mass,
            'price'=>$price,
            'pure_price'=>$purePrice,
            'company_name'=>$company_name,
            'from_city'=>$from_city,
            'to_city'=>$toCity,
            'description'=>$description,
            'status'=>$status,
            'creation_date'=>$date
        ]);
        if ($contract){
            Session::flash('message1', 'Договор успешно создан');
            return redirect()->route('la.contract');
        }else{
            Session::flash('message2', 'Произошла ошибка обратитесь к администратору');
            return redirect()->route('la.contract');
        }
    }
    public function change(Request $request){
        //print_r($_GET);
        $contract_id    = $_GET['contract_id'];
        $status         = $_GET['status'];
        $contract = Contract::find($contract_id);
        $contract->status = $status;
        $contract->save();
        if($contract){
            return 1;
        }else{
            return 0;
        }

    }
}
