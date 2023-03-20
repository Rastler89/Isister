<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\I18n\LocalizableModel;

class Race extends LocalizableModel
{
    use HasFactory;

    protected $fillable = [
        'name_en', 
        'name_es'
    ];

    protected $localizable = [
        'name'
    ];

    public function specie() {
        return $this->belongsTo(Specie::class);
    }
}
