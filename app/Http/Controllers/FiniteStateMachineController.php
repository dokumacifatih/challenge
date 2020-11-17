<?php

namespace App\Http\Controllers;

use App\Models\FiniteStateMachine;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FiniteStateMachineController extends Controller
{
    private $initialState;
    private $currentState;
    private $nextState;

    public function __construct()
    {
        $this->initialState = $this->currentState = 0;
    }


    /**
     * set State.
     *
     * @param integer
     */
    public function set()
    {
        // $records = FiniteStateMachine::all();
        // return view('fsm.index', compact('records'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $records = FiniteStateMachine::all();
        // return view('fsm.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\FiniteStateMachine  $finiteStateMachine
     * @return \Illuminate\Http\Response
     */
    public function show(FiniteStateMachine $finiteStateMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiniteStateMachine  $finiteStateMachine
     * @return \Illuminate\Http\Response
     */
    public function edit(FiniteStateMachine $finiteStateMachine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiniteStateMachine  $finiteStateMachine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FiniteStateMachine $finiteStateMachine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiniteStateMachine  $finiteStateMachine
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiniteStateMachine $finiteStateMachine)
    {
        //
    }


    /**
     * Calculate the FSM by binary 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fsmCalculate(Request $request)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $general = new General();
        if (!$general->checkBinary($request['binary'])) {
            return response()->json(['message' => 'Invalid Binary Entered (message from controller) '], Response::HTTP_BAD_REQUEST);
        }

        $binary = $request['binary']; //(string)$request['binary'];

        for ($i = 0; $i < strlen($binary); $i++) {
            $this->nextState = FiniteStateMachine::S[$this->currentState][$binary[$i]];
            $response['detail'][$i] = 'Current state= S' . $this->currentState . ', Input = ' . $binary[$i] . ', result state = S' . $this->nextState . ',<br>';
            $this->currentState = $this->nextState;
        }
        $response['result'] = 'S' . $this->nextState . ' = ' . $this->nextState; // create a class for response
        return response()->json($response);
    }

    /**
     * Show the form for FSM Calc
     *
     * @return \Illuminate\Http\Response
     */
    public function fsmNew()
    {
        return view('fsm.new');
    }
}
