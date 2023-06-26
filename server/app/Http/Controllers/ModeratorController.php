<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use Illuminate\Http\Request;

class ModeratorController extends ControllerBase
{
    public function __construct()
    {
        $this->model = Moderator::class;
        $this->user_level = 'moderator';
    }
}
