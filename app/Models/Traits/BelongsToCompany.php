<?php
namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToCompany
{
    protected static function bootBelongsToCompany()
    {
        static::addGlobalScope('company', function (Builder $builder) {
            if (session()->has('company_id')) {
                $table = $builder->getModel()->getTable();
                $builder->where("{$table}.company_id", session('company_id'));
            }
        });

        static::creating(function ($model) {
            if (session()->has('company_id') && empty($model->company_id)) {
                $model->company_id = session('company_id');
            }
        });
    }
}

