<?php
namespace App\Models\Holidays;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidaysStatus extends Model
{
    use BelongsToCompany;
    use HasFactory;
    /**
     * USER HOLIDAYS - ESTADO DE VACACIONES
     * ESTADO: Aceptadas
     * 
     * @var int
     */
    const HOLIDAYS_ACCEPTED = "Aceptadas";
    /**
    * USER HOLIDAYS - ESTADO DE VACACIONES
    * ESTADO: Denegadas
     *
     * @var int
     */
    const HOLIDAYS_DENIED = "Denegadas";
    /**
    * USER HOLIDAYS - ESTADO DE VACACIONES
    * ESTADO: Pendientes
     *
     * @var int
     */
    const HOLIDAYS_PENDING = "Pendientes";
    
}
