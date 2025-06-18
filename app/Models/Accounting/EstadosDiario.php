<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToCompany;

class EstadosDiario extends Model
{
    use HasFactory;
    use BelongsToCompany;

    public $timestamps = false;

     /**
     * El nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'estados_diario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre'
    ];
}
