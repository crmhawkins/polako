<?php

namespace App\Models\Holidays;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HolidaysPetitions extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'holidays_petition';

    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'admin_user_id',
        'holidays_status_id',
        'from',
        'to',
        'total_days',
        'half_day',
        
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
     * Obtener el usuario 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo(User::class,'admin_user_id');
    }
    
    /**
     * Obtener el estado 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(HolidaysStatus::class,'holidays_status_id');
    }
}
