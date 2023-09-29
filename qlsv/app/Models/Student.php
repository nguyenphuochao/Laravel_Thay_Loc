<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    public $timestamps = false;
    function getGenderName()
    {
        $genderMap = [0 => "Nam", 1 => "Nữ", 2 => "KXĐ"];
        return $genderMap[$this->gender];
    }
}
