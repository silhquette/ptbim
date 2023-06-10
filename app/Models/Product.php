<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Product extends Model
{
    use HasFactory, Uuid;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
