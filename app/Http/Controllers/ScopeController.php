<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    public function index()
    {
       // dd(request()->all()); // Debug request yang diterima
        $tables = Scope::latest()->filter(request(['search', 'name']))->paginate(10)->withQueryString();
        return view('scope.main', [
            'title' => 'Scope',
            'search' => 'scope', 
            'tables' => $tables,
            'export' => 'exportScopes',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // dd($validatedData);

        // NAMA TIDAK BOLEH SAMA
        if (Scope::where('name', $validatedData['name'])->exists()) {
            return redirect('/scope')->with('error', 'Scope sudah ada');
        }

        Scope::create($validatedData);

        return redirect('/scope')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scope $scope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scope $id)
    {
        $scope = Scope::findOrFail($id); // Ambil data sesuai ID
        return view('scope.edit', compact('scope')); // Kirim ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scope $scope)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // NAMA TIDAK BOLEH SAMA
        if (Scope::where('name', $validatedData['name'])->exists()) {
            return redirect('/scope')->with('error', 'Posisi sudah ada');
        }
        Scope::where('id', $scope->id)
                ->update($validatedData);
        
        return redirect('/scope')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scope $scope)
    {
        Scope::destroy($scope->id);
        return redirect('/scope')->with('success', 'Data has been deleted!');
    }
}
