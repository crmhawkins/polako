<?php
namespace App\Models\Contacts;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CivilStatus extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $table = 'clients_faxes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];


}
