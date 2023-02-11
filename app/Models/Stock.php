<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = ['nama', 'persediaan', 'deskripsi', 'gambar', 'slug', 'harga'];
    public function users() {
        return $this->belongsToMany(Product::class, 'products');
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}