<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Comment extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'content',
        'user_id',
        'property_id',
        'isread'
    ];

    public $sortable = ['id','created_at'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function property(){
        return $this->belongsTo('App\Models\Property');
    }
}
