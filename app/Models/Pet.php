<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pet extends Model
{
    use HasFactory, Sortable;

    protected $sortable = [

    ];

    public function race() {
        return $this->belongsTo(Race::class);
    }

    public function vaccines() {
        return $this->hasMany(Vaccine::class);
    }

    public function historial() {
        return $this->hasMany(Diagnostic::class);
    }

    public function diets() {
        return $this->hasMany(Diet::class);
    }
}
