<?php
namespace App\Models\Jornada;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pause extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $fillable = [
        'jornada_id',
        'start_time',
        'end_time'
    ];

    public function jornada() {
        return $this->belongsTo(\App\Models\Jornada\Jornada::class);
    }

}
