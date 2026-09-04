<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GoodieOrder extends Model {
    protected $fillable = ['name', 'email', 'roll_number', 'phone', 'items', 'notes', 'status'];
    protected $casts = ['items' => 'array'];
}
