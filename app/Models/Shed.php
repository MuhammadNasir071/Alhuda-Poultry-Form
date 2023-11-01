<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shed extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id', // Foreign key for Company model
        'user_id',    // Foreign key for User model
        'name',
        'quantity',
        'price',
        'is_active',
    ];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id')->where('is_active', 1);
    }
}
