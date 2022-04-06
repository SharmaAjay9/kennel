<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Asset;
class PostAttachment extends Model
{
    use HasFactory;

    protected function Path(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => asset('storage'.str_replace('public','',$value))
        );
    }

}
