<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortality extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',    // Foreign key for Company model
        'shed_id', // Foreign key for Shed model
        'day_mortality',
        'night_mortality',
        'date',
    ];

    public function sheds()
    {
        return $this->belongsTo(Shed::class, 'shed_id', 'id')->where('is_active', 1);
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id')->where('is_active', 1);
    }
}
