<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';//ini pemanggilan nama table
    protected $primarykey = 'id';
    protected $fillable = ['username','password','email','role'];
}
