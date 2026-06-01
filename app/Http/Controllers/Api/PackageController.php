<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return response()->json(
            Package::latest()->get()
        );
    }

    public function show($id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json($package);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer'
        ]);

        $package = Package::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Berhasil disimpan',
            'data' => $package
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $package->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Berhasil update',
            'data' => $package
        ]);
    }

    public function destroy($id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $package->delete();

        return response()->json([
            'message' => 'Berhasil dihapus'
        ]);
    }
}