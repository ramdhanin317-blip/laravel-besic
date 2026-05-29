<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('student.index', [
            'title' => 'Student',
            'students' => Student::all(),
            // 'students' => Student::orderBy('name, 'dasc)->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', ['title' => 'Create Student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
    $validated = $request->validate([
    'name' => 'required',
    'nim' => 'required|digits:11|numeric',
    'gender' => 'required|in:L,P',

    ], [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'nim.required' => 'NIM tidak boleh kosong',
        'nim.digits' => 'NIM Wajib :digits digit',
        'nim.numeric' => 'NIM Wajib angka',
        'gender.required' => 'Gender wajib diisi',
    ]);

    Student::create($validated);
    return to_route('student.index')->withSuccess('Data berhasil ditambahkan');
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        {
    $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    ], [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'nim.required' => 'NIM tidak boleh kosong',
        'nim.digits' => 'NIM Wajib :digits digit',
        'nim.numeric' => 'NIM Wajib angka',
    ]);

    $student->update($validated);
    return to_route('student.index')->withSuccess('Data berhasil diubah');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
    $student->delete();
    return to_route('student.index')->withSuccess('Data berhasil dihapus');
    }

    // Soft Delete
    public function trash()
    {
        return view('student.trash', [
            'title' => 'Trash Student',
            'students' => Student::onlyTrashed()->latest()->get(),
            // 'students' => Student::orderBy('name, 'dasc)->get(),
            ]);
    }
    
    public function restore(Student $student)
    {
    $student->restore();
    return to_route('student.trash')->withSuccess('Data berhasil dikembalikan');
    }

    public function forceDelete(Student $student)
    {
    $student->forceDelete();
    return to_route('student.trash')->withSuccess('Data berhasil dihapus Secara Permanent');
    }
}