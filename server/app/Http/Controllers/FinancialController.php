<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use Illuminate\Http\Request;

class FinancialController extends ControllerBase
{
    public function __construct()
    {
        $this->model = Financial::class;
        $this->user_level = 'financial';
    }
}
