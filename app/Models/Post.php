<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;
use App\Models\PetBread;
use App\Models\States;
use App\Models\City;
use App\Models\User;
use App\Models\PostAttachment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
                            'ad_type',
                            'title',
                            'price',
                            'desc',
                            'pet_gender',
                            'pet_age',
                            'mobile',
                            'status',
                            'pet_id',
                            'bread_id', 
                            'state_id',
                            'city_id',
                            'user_id',
                            'expiry'
                        ];


    public function Pet()
    {
        return $this->belongsTo(Pet::class,'pet_id','id');
    }
    public function PetBread()
    {
        return $this->belongsTo(PetBread::class,'bread_id','id');
    }
    public function States()
    {
        return $this->belongsTo(States::class,'state_id','id');
    }
    public function City()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function attachments()
    {
        return $this->hasMany(PostAttachment::class);
    }

}
