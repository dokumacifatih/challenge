<?php

namespace Tests\Unit;

use App\Http\Controllers\ModuloThreeController;
use App\Models\ModuloThree;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class ModuloThreeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanCalculate()
    {
        $request = new Request();
        $request['binary'] = '1010';
        $mtc = new ModuloThreeController();
        $data = $mtc->moduloThreeCalculate($request);
        $result1 = json_decode($data)->mtc;
        $this->assertEquals($result1, 1);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testResultCheck()
    {
        $request = new Request();
        $request['binary'] = '1010';
        $mtc = new ModuloThreeController();
        $data = $mtc->moduloThreeCalculate($request);
        $result1 = json_decode($data)->mtc;

        $result2 = $mtc->modThree($request['binary']);//regular modulo calculation by X%3
        $this->assertEquals($result1, $result2);
    }
}
