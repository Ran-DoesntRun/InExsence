<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Console\Attributes\Hidden;

#[Fillable(['id_exp', 'amount', 'date', 'type', 'category', 'id_user'])]
#[Hidden(['id_inc', 'id_user'])]
class Expense extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id_exp';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
