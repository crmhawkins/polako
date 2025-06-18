<?php
// app/Http/Middleware/SetActiveCompany.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\Company\CompanyDetails;

class SetActiveCompany
{
    public function handle($request, Closure $next)
    {
        if (session()->has('company_id')) {
            $empresa = CompanyDetails::find(session('company_id'));
            // Compartir en todas las vistas
            View::share('activeCompany', $empresa);
        }

        return $next($request);
    }
}
