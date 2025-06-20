<?php
namespace App\Models\Contacts;

use App\Models\Traits\BelongsToCompany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactFaxes extends Model
{
    use BelongsToCompany;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contacts_faxes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact_id',
        'number',

    ];

     /**
     * Mutaciones de fecha.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function contacto() {
        return $this->belongsTo(\App\Models\Contacts\Contact::class,'contact_id');
    }

}
