<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Console\Attributes\Hidden;

#[Fillable(['id_inc', 'amount', 'date', 'type', 'id_user'])]
#[Hidden(['id_inc', 'id_user'])]
class Income extends Model
{
    protected $table = 'incomes';
    protected $primaryKey = 'id_inc';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
