<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Tenentment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create(int $tenentmentId)
    {
        $tenentment = Tenentment::findOrFail($tenentmentId);
        return view('package.form', compact('tenentment'));
    }

    public function store(Request $request, int $tenentmentId)
    {
        $tenentment = Tenentment::findOrFail($tenentmentId);
        $resident = $tenentment->residents()->whereId($request->resident_id)->firstOrFail();
        $data = $request->all();
        $data['status'] = Package::RECEIVED;
        $data['identification'] = hexdec($resident->name) . Carbon::now()->format('Ymdhis');
        $tenentment->packages()->create($data);

        return redirect(route('tenentment_view', $tenentmentId));
    }
}
