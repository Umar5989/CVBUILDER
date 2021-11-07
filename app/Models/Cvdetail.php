<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cvdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'number', 
        'date',
        'email',
        'nation',
        'gender',
        'file',
        'address',
        'about',
         'projects',
         'collegeName',
         'intermediate',
         'intermediatestart',
         'intermediateend',
         'Universtyname',
         'Bachelor',
         'Universtystart',
         'Universtyend',
          'Company',
           'Designation',
          'Skills',
          'created_by',
    ]; 

}
