<?php

namespace App\Http\Controllers;

use App\Models\ModuloThree;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModuloThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = ModuloThree::all();
        return view('moduloThree.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moduloThreeNew()
    {
        return view('moduloThree.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModuloThree  $moduloThree
     * @return \Illuminate\Http\Response
     */
    public function show(ModuloThree $moduloThree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuloThree  $moduloThree
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuloThree $moduloThree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuloThree  $moduloThree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuloThree $moduloThree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuloThree  $moduloThree
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuloThree $moduloThree)
    {
        //
    }

    /**
     * Calculate the moduleThree by given binary
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function moduloThreeCalculate(Request $request)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // check data, if it could pass js control
        $pattern = "/[^0-1]/";
        if (preg_match($pattern, $request['binary'])) {
            return response()->json(['Message' => 'Invalid Binary Entered (message from controller) '], Response::HTTP_BAD_REQUEST);
        }

        $binary = $request['binary']; //(string)$request['binary'];
        $sum = 0;
        for ($i = 0; $i < strlen($binary); $i++) {
            if ($i % 2 == 0) {
                $sum += $binary[strlen($binary) - $i - 1];
            } else {
                $sum -= $binary[strlen($binary) - $i - 1];
            }
        }
        $result['mtc'] = $this->setResult($sum); //$sum can be negative or more than 3; fix it
        $result['mt'] = $this->modThree($binary); //regular way to calc
        if(env('RECORD')){
            $record = new ModuloThree;
            $record->number = $binary;
            $record->result = $result['mtc'] ;
            $record->ip = request()->ip();
            $record->save();
        }
        return json_encode($result);
    }

    /**
     * Calculate the given binary number to moduloThree reqularWay
     *
     * @param  binary
     * @return integer
     */
    public function modThree(string $number)
    {
        $result = bindec($number) % 3;
        return $result;
    }

    /**
     * set number between 0 and 3
     *
     * @param  integer
     * @return integer
     */
    public function setResult(int $number)
    {
        if ($number < 0) {
            $number = $number + 3;
        }
        if ($number > 3) {
            $number = $number - 3;
        }
        if ($number >= 0 && $number < 3) {
            return $number;
        } else {
            return $this->setResult($number);
        }
    }
}
