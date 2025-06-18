<?php
namespace App\Models\Contacts;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactBy extends Model
{
    use BelongsToCompany;
    use HasFactory;

    protected $table = 'contact_by';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
}
