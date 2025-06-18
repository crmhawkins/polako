<?php
namespace App\Models\Statistics;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistics extends Model
{
    use BelongsToCompany;
    use SoftDeletes;

    protected $table = 'balance_trimester';
    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'trimester',
        'month',
        'year',
        'quantity',
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
