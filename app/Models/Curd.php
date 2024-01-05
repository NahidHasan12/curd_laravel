<?php

namespace App\Models;

use App\Models\type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curd extends Model
{
    use HasFactory;
    protected $fillable =[
        'type_id',
        'name',
        'address',
        'image',
        'status',
    ];

    public function type(){
        return $this->belongsTo(type::class);
    }
}
