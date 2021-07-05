<?php


namespace App\Http\Controllers\LA;


use App\Http\Controllers\Controller;

class EvaluateController extends Controller
{

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

        return view('la.evaluate.index');
    }
}