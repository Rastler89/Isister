<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\i18n\LocalizableModel;
use Kyslik\ColumnSortable\Sortable;

class Race extends LocalizableModel
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name_en', 
        'name_es'
    ];

    protected $localizable = [
        'name'
    ];

    public $sortable = [
        'name_es', 'name_en', 'display'
    ];

    public function specie() {
        return $this->belongsTo(Specie::class);
    }
}
