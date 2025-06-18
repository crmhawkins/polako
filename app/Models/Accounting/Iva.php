<?php
namespace App\Models\Accounting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToCompany;
class Iva extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToCompany;

    protected $table = 'iva';

    protected $fillable = [
        'nombre',
        'valor',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
