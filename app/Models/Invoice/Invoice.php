<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

   protected $fillable=['company_name','name','contact','address','zip_code','location','descriptions','service','quantity','rate'];
}
