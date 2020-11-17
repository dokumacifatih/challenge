<?php

namespace Tests\Unit;

use App\Models\FiniteStateMachine;
use App\Models\General;
use PHPUnit\Framework\TestCase;

class GeneralTest extends TestCase
{
    /**
     * Binary Check False.
     *
     * @return void
     */
    public function testCheckBinaryFalse()
    {
        $general = new General();
        $status = $general->checkBinary('101010a');
        $this->assertFalse($status);
    }

    /**
     * Binary Check True.
     *
     * @return void
     */
    public function testCheckBinaryTrue()
    {
        $general = new General();
        $status = $general->checkBinary('101010');
        $this->assertTrue($status);
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
