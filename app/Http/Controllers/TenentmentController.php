<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Tenentment;
use Illuminate\Http\Request;

class TenentmentController extends Controller
{
    public function create(int $buildingId)
    {
        $building = Building::findOrFail($buildingId);
        return view('tenentment.form', compact('building'));
    }

    public function store(Request $request, int $buildingId)
    {
        $building = Building::findOrFail($buildingId);
        $building->tenentments()->create($request->all());
        return redirect(route('building_view', $building->id));
    }

    public function view(int $tenentmentId)
    {
        $tenentment = Tenentment::findOrFail($tenentmentId);
        return view('tenentment.view', compact('tenentment'));
    }
}
