<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToCompany;
class SubCuentaHijo extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToCompany;

    protected $table = 'sub_cuenta_hija';

    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sub_cuenta_id',
        'numero',
        'nombre',
        'descripcion'
    ];

    /**
     * Mutaciones de fecha.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Obtener el Grupo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cuenta()
    {
        return $this->belongsTo(SubCuentaContable::class,'sub_cuenta_id');
    }
}
