<?php
namespace App\Models;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductividadMensual extends Model
{
    use BelongsToCompany;
    use HasFactory, SoftDeletes;

    protected $table = 'productividades_mensuales';

    protected $fillable = [
        'admin_user_id',
        'mes',
        'año', // Agregar el año aquí
        'productividad',
    ];
}
