<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $lecturers = Lecturer::query()
        ->filter(request(['keyword', 'department_id']))
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('lecturer.index', [
        'title' => 'Lecturer',
        'lecturers' => $lecturers,
        'departments' => Department::all(),
    ]);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create', [
            'title' => 'Create Lecturer',
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'department_id' => 'required|exists:departments,id',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'department_id.required' => 'Program Studi tidak boleh kosong',
            'department_id.exists' => 'Program Studi yang dipilih tidak ditemukan',
        ]);

        Lecturer::create($validated);

        return to_route('lecturer.index')->withSuccess('Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit', [
            'title' => 'Edit Lecturer',
            'lecturer' => $lecturer,
            'departments' => Department::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'department_id' => 'required|exists:departments,id',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'department_id.required' => 'Program Studi tidak boleh kosong',
            'department_id.exists' => 'Program Studi yang dipilih tidak ditemukan',
        ]);

        $lecturer->update($validated);

        return to_route('lecturer.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();

        return to_route('lecturer.index')->withSuccess('Data berhasil dihapus');
    }
}
