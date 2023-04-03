<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\i18n\LocalizableModel;
use Kyslik\ColumnSortable\Sortable;

class Disease extends LocalizableModel
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'display'
    ];

    protected $localizable = [
        'name',
        'description'
    ];

    public $sortable = [
        'name_es', 'name_en', 'display'
    ];

    public function species() {
        return $this->belongsToMany(Specie::class);
    }
}
