<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    
    /**
     * Check binary 
     *
     * @param string
     * @return boolean
     */
    public function checkBinary(String $data)
    {
        // check data, if it could pass js control
        $pattern = "/[^0-1]/";
        if (preg_match($pattern, $data)) {
            return false;
        }else{
            return true;
        }

    }
}
