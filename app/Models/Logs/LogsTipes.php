<?php
namespace App\Models\Logs;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsTipes extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $table = 'logs_tipes';

     /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Mutaciones de fecha.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

}
