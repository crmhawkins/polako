<?php

namespace App\Models\Accounting;

use App\Models\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    use HasFactory;
    use BelongsToCompany;


    protected $table = 'anio';

    protected $fillable = [
        'anio'
    ];

}
