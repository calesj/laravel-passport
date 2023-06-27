<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial2 extends Model
{
    use HasFactory;
    protected $table = 'financials_2';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
