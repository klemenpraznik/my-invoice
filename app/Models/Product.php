<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function invoices(){
    //     return $this->belongsToMany(Invoice::class)
    // }

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
