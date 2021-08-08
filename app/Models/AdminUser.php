<?php

namespace App\Models;

use App\Models\Comment\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminUser extends User
{
    protected $guarded='admin';
    protected $fillable= ['name','username','email','password','image','status','admin_type','role'];

}
