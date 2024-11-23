<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use App\Models\Brand;
use App\Models\Talent;
use App\Models\Agency;
use App\Models\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        // Mendapatkan parameter pencarian dari query string
        $search = request('search');
        $pic = request('pic'); // untuk mencari berdasarkan PIC (staff)
    
        // Ambil data proyek dengan menerapkan filter pencarian
        $project = Project::query()
            ->with('staff') // untuk memuat relasi staff
            ->search([
                'search' => $search, // pencarian di nama project
                'pic' => $pic, // pencarian berdasarkan PIC
            ])
            ->paginate(10)
            ->withQueryString();
    
        // Menggunakan search() untuk filter pencarian yang sudah ada
        $tables = Project::latest()->search(request(['search', 'name']))->paginate(10)->withQueryString();

        // Menambahkan title dan export (misalnya untuk tombol ekspor)
        $title = 'Project List'; // Tentukan judul yang sesuai
        $export = true; // Mengindikasikan bahwa ekspor diaktifkan

        // Kirim data ke view
        return view('project.main', [
            'project' => $project,
            'staffs' => Staff::all(), // Menyediakan pilihan untuk memilih PIC
            'brands' => Brand::all(), // Menyediakan pilihan untuk memilih brand
            'talents' => Talent::all(), // Menyediakan pilihan untuk memilih talent
            'agencies' => Agency::all(), // Menyediakan pilihan untuk memilih agency
            'scopes' => Scope::all(), // Menyediakan pilihan untuk  
            'search' => 'project',
            'tables' => $tables,
            'pic' => $pic,
            'title' => $title, // Menambahkan variabel title ke view
            'export' => $export, // Menambahkan variabel export ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data untuk dropdown
        $staffs = Staff::all();
        $brands = Brand::all();
        dd($brands);
        $talents = Talent::all();
        $agencies = Agency::all();
        $scopes = Scope::all();


        // Debugging untuk memastikan data dikirim dengan benar
        // Tambahkan ini untuk memeriksa data yang dikirim ke view
        // Log::info('Staffs: ' . $staffs->count());
        // Log::info('Brands: ' . $brands->count());
        // Log::info('Talents: ' . $talents->count());
        // Log::info('Agencies: ' . $agencies->count());
        // Log::info('Scopes: ' . $scopes->count());

        // Tampilkan form untuk membuat project baru
        return view('project.create', compact('staffs', 'brands', 'talents', 'agencies', 'scopes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'pic' => 'required|exists:staff,id',
            'brand' => 'required|exists:brands,id',
            'month_year' => 'required',
            'talent' => 'required|exists:talent,id',
            'agency' => 'required|exists:agencies,id',
            'scope' => 'required|exists:scopes,id',
            'qty' => 'required|integer|min:1|max:100',
            'rate_brand' => 'required|numeric',
            'rate_talent' => 'required|numeric',
            'payment_date_talent' => 'nullable|date',
            'payment_date_brand' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $project = new Project();
        $project->name = $validated['name'];
        $project->staff_id = $validated['pic'];
        $project->brand_id = $validated['brand'];
        $project->month_year = $validated['month_year'];
        $project->talent_id = $validated['talent'];
        $project->agency_id = $validated['agency'];
        $project->scope_id = $validated['scope'];
        $project->qty = $validated['qty'];
        $project->rate_brand = $validated['rate_brand'];
        $project->rate_talent = $validated['rate_talent'];
        $project->payment_date_talent = $validated['payment_date_talent'];
        $project->payment_date_brand = $validated['payment_date_brand'];
        $project->description = $validated['description'];
        $project->save();

        return redirect()->route('project.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // Menampilkan detail project
        // return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Ambil data untuk dropdown
        $staffs = Staff::all();
        $brands = Brand::all();
        $talents = Talent::all();
        $agencies = Agency::all();
        $scopes = Scope::all();

        // Tampilkan form untuk edit project
        return view('project.edit', compact('project', 'staffs', 'brands', 'talents', 'agencies', 'scopes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'staff_id' => 'required|exists:staff,id',
            'brand_id' => 'required|exists:brands,id',
            'month_year' => 'required|string',
            'talent_id' => 'required|exists:talent,id',
            'agency_id' => 'required|exists:agencies,id',
            'scope_id' => 'required|exists:scopes,id',
            'qty' => 'required|integer|min:1|max:100',
            'rate_brand' => 'required|numeric',
            'rate_talent' => 'required|numeric',
            'payment_date_talent' => 'nullable|date',
            'payment_date_brand' => 'nullable|date',
            'description' => 'nullable|string',
        ]);


        dd($validatedData);
        // Update data project
        $project->update($validatedData);

        // Redirect ke halaman daftar project dengan pesan sukses
        return redirect('/project')->with('success', 'Project has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            // Menghapus project berdasarkan ID
            $project->delete();

            // Redirect dengan pesan sukses
            return redirect('/project')->with('success', 'Project has been deleted!');
        } catch (\Throwable $th) {
            return redirect('/project')->with('error', 'Data cannot be deleted!');
        }
    }
}
