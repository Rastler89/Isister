<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Vaccine extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'pet_id',
        'name',
        'batch',
        'init',
        'next'
    ];

    public $sortable = [
        'pet_id',
        'name',
        'batch',
        'init',
        'next'
    ];

    public function pet() {
        return $this->hasOne(Pet::class);
    }

    public function diseases() {
        return $this->belongsToMany(Disease::class);
    }
}
