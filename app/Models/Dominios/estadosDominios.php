<?php
namespace App\Models\Dominios;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadosDominios extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $table = 'estados_dominios';

    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
