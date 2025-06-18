<?php

namespace App\Models\Alerts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToCompany;

class AlertStatus extends Model
{
    use BelongsToCompany;

    protected $table = 'alert_status';
    public $timestamps = false;

    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];

      /**
     * ESTADO: Pendiente
     *
     * @var string
     */
    const ALERT_STATUS_PENDING = 1;
    /**
     * ESTADO: Resuelta
     *
     * @var string
     */
    const ALERT_STATUS_SOLVED = 2;


}


