<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Property extends Model
{
    use HasFactory,Sortable;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'town',
        'city',
        'address',
        'price',
        'rooms',
        'bedrooms',
        'leavingrooms',
        'bathrooms',
        'kitchens',
        'disponible',
        'prixvisite',
    ];

    public $sortable = ['price', 'address', 'category_id', 'operation'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function visits(){
        return $this->hasMany(Visite::class);
    }
}
