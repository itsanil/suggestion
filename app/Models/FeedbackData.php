<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackData extends Model
{
    use HasFactory;

    protected $table = 'feedback_datas';

    public function getCoardinator()
    {
        return $this->hasOne(User::class,'id','feedback_given_by1');
    }
}
