<?php

namespace App\Http\Controllers;

use App\Form\FormValidation;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorController extends ControllerBase
{
    public function __construct()
    {
        $this->model = Administrator::class;
        $this->user_level = 'administrator';
    }
}
