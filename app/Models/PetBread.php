<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetBread extends Model
{
    protected $fillable = ['breads_name','pet_id'];
    use HasFactory;
}
