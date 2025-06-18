<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function seleccionar(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:company_details,id',
        ]);

        session(['company_id' => $request->company_id]);

        return back(); // o redirect()->route('dashboard');
    }
}
