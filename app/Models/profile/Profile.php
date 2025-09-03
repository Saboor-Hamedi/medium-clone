<?php

namespace App\Models\profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\Profile\ProfileFactory> */
    use HasFactory;

    protected $table = 'profiles';
    protected $guarded = [
       'id', 'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
