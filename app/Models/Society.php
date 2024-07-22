<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class Society extends Model
{
    use HasFactory;
    protected $fillable = ['name','registration_date','subscription_id','status'];

    public function subscription()
    {
        return $this->hasOne(Subscription::class,'id','subscription_id');
    }
}
