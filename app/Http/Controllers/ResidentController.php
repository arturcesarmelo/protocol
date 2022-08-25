<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Tenentment;
use Illuminate\Http\Request;

class ResidentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $tenentmentId)
    {
        $tenentment = Tenentment::findOrFail($tenentmentId);
        return view('resident.form', compact('tenentment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $tenentmentId)
    {
        $tenentment = Tenentment::findOrFail($tenentmentId);
        $tenentment->residents()->create($request->all());

        return redirect(route('tenentment_view', $tenentmentId));
    }
}
