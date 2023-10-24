<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    function getGenderName()
    {
        $genderMap = [0 => "nam", 1 => "nữ", 2 => "khác"];
        return $genderMap[$this->gender];
    }

    public $timestamps = false;

    // function registers() {
    // 	return $this->hasMany(Register::class);
    // }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
