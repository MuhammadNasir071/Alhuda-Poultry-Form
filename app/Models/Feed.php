<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    protected $table = "feeds";

    protected $fillable = [
        'company_id',    // Foreign key for Company model
        'shed_id', // Foreign key for Shed model
        'day_feed',
        'night_feed',
        'avg_weight',
        'fcr',
        'date',
    ];

    public function sheds()
    {
        return $this->belongsTo(Shed::class, 'shed_id', 'id')->where('is_active', 1);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id')->where('is_active', 1);
    }
}
