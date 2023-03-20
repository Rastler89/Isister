<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\I18n\LocalizableModel;
use Kyslik\ColumnSortable\Sortable;

class Specie extends LocalizableModel
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name_en',
        'name_es',
        'display'
    ];

    protected $localizable = [
        'name'
    ];

    public $sortable = [
        'name_es', 'name_en', 'display'
    ];

    public function races() {
        return $this->hasMany(Race::class);
    }
}
