<?php

namespace App\Http\Controllers;

use App\Models\Administrator;

class AdministratorController extends ControllerBase
{
    public function __construct()
    {
        $this->model = Administrator::class;
        $this->user_level = 'administrator';
    }
}
