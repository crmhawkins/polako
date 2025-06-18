<?php
namespace App\Models\Settings;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $fillable = [
        'settings_id',
        'tipo',
        'dia',
        'inicio',
        'fin',
    ];
}
