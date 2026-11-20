<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable = ['num1', 'num2', 'operation', 'result'];

    protected function casts(): array
    {
        return ['num1' => 'float', 'num2' => 'float', 'result' => 'float'];
    }
}
