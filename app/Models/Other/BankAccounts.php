<?php
namespace App\Models\Other;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $table = 'bank_accounts';
    public $timestamps = false;
    /**
     * Atributos asignados en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cuenta',
    ];
}
