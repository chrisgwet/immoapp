<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Visite extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'dateVisite',
        'property_id',
        'user_id',
        'isdone',
        'isread',
    ];

    public $sortable = ['dateVisite', 'user_id', 'isdone'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
