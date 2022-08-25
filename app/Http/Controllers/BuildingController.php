<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $buildings = Building::get();
        return view('building.index', compact('buildings'));
    }

    public function create(Request $request)
    {
        return view('building.form');
    }

    public function new(Request $request)
    {
        $building = new Building($request->all());
        $building->save();
        return redirect('buildings');
    }

    public function view(int $id)
    {
        $building = Building::findOrFail($id);
        return view('building.view', compact('building'));
    }
}
