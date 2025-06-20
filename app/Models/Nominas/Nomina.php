<?php
namespace App\Models\Nominas;

use App\Models\Traits\BelongsToCompany;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use BelongsToCompany;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nominas';

    protected $fillable = [
        'admin_user_id',
        'fecha',
        'archivo',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];


    public function usuario() {
        return $this->belongsTo(User::class,'admin_user_id');
    }
}
