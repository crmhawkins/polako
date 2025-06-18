<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToCompany;

class CuentasContable extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToCompany;

    protected $table = 'cuentas_contable';

    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sub_grupo_id',
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
    public function grupo()
    {
        return $this->belongsTo(SubGrupoContable::class,'sub_grupo_id');
    }
    public function subCuentas()
    {
        return $this->hasMany(SubCuentaContable::class, 'cuenta_id')->orderBy('numero', 'asc');
    }
}
