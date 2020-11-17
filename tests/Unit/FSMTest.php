<?php

namespace Tests\Unit;

use App\Models\FiniteStateMachine;
use PHPUnit\Framework\TestCase;

class FSMTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanGetProperties()
    {
        $status = FiniteStateMachine::S[0][0];
        $this->assertEquals($status, 0);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStates()
    {
        $testData = new FiniteStateMachine();

        $this->assertEquals($testData->initialState, 0);
        $this->assertEquals($testData->currentState, 0);
    }


}
