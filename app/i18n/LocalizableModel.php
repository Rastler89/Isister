<?php

namespace App\i18n;

use Illuminate\Database\Eloquent\Model;

abstract class LocalizableModel extends Model {

    protected $localizable = [];

    public function __get($attribute) {
        if(in_array($attribute, $this->localizable)) {
            $localeSpecificAttribute = $attribute.'_'.app()->getLocale();
            return $this->{$localeSpecificAttribute};
        }

        return parent::__get($attribute);
    }
}