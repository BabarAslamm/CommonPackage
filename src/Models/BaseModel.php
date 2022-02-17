<?php

namespace Insyghts\Common\Models;

use Insyghts\Common\Observers\ModelObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model {
    use HasFactory, SoftDeletes;

    public static function boot() {
        parent::boot();
        $class = get_called_class();
        $class::observe(new ModelObserver());
    }

    public static function insert(array $values)
    {
        if(empty($values)) {
            return true;
        }

        foreach($values as $value) {
            $class = get_called_class();
            try {
                $class::create($value);
            } catch (\Throwable $e) {
                return 0;
            }
        }
        return 1;
    }
}



