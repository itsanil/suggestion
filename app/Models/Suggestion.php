<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    public function getSuggestionData()
    {
        return $this->hasOne(SuggestionData::class,'suggestion_id','id');
    }

    public function getFeedbackData()
    {
        return $this->hasOne(FeedbackData::class,'suggestion_id','id');
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function getPlant()
    {
        return $this->hasOne(Plant::class,'id','plant_id');
    }

    public function getType()
    {
        return $this->hasOne(Type::class,'id','type_id');
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

    // public function getCreatedBy()
    // {
    //     return $this->hasOne(User::class,'id','created_by');
    // }
}
