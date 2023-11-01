<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',    // Foreign key for Company model
        'shed_id', // Foreign key for Shed model
        'client_id', // Foreign key for Client model
        'vehicle_no',
        'initial_weight',
        'final_weight',
        'total_weight',
        'rate',
        'total_price',
        'payment_type',
        'payment_status',
    ];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id')->where('is_active', 1);
    }

    public function sheds(){
        return $this->belongsTo(Shed::class, 'shed_id', 'id')->where('is_active', 1);
    }

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
