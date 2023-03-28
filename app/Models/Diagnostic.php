<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Diagnostic extends Model
{
    use HasFactory, Sortable;

    public function surgeries() {
        return $this->hasMany(Surgery::class);
    }

    public function medications() {
        return $this->hasMany(Medication::class);
    }
}
