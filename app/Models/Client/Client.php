<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $fillable=['website','site_url','cpanel_username','cpanel_password','dashobord_link','dashobord_username','dashboard_password'];
}
