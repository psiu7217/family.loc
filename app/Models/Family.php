<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public static function get_all(){
        return Family::all()->toArray();
    }
}
