<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organization.index', [
            'title' => 'Organization',
            'organizations' => Organization::all(),
            // 'organizations' => Organization::orderBy('name', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create', [
            'title' => 'Create Organization',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'leader_name' => 'required|max:255',
        ], [
            'name.required' => 'Nama organisasi tidak boleh kosong',
            'name.max' => 'Nama organisasi tidak boleh lebih dari :max karakter',

            'leader_name.required' => 'Nama pimpinan tidak boleh kosong',
            'leader_name.max' => 'Nama pimpinan tidak boleh lebih dari :max karakter',
        ]);

        try {
            DB::beginTransaction();

            $organization = Organization::create([
                'name' => $validated['name'],
            ]);

            $organization->organizationLeader()->create([
                'leader_name' => $validated['leader_name'],
            ]);

            DB::commit();

            return to_route('organization.index')
                ->withSuccess('Data berhasil ditambahkan');

        } catch (\Exception $e) {

            DB::rollBack();

            return to_route('organization.create')
                ->withError('Data gagal ditambahkan : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organization.edit', [
            'title' => 'Edit Organization',
            'organization' => $organization,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'leader_name' => 'required|max:255',
        ], [
            'name.required' => 'Nama organisasi tidak boleh kosong',
            'name.max' => 'Nama organisasi tidak boleh lebih dari :max karakter',

            'leader_name.required' => 'Nama pimpinan organisasi tidak boleh kosong',
            'leader_name.max' => 'Nama pimpinan organisasi tidak boleh lebih dari :max karakter',
        ]);

        try {
            DB::beginTransaction();

            $organization->update([
                'name' => $validated['name'],
            ]);

            $organization->organizationLeader()->updateOrCreate(
                ['organization_id' => $organization->id],
                ['leader_name' => $validated['leader_name']]
            );

            DB::commit();

            return to_route('organization.index')
                ->withSuccess('Data berhasil diperbarui');

        } catch (\Exception $e) {

            DB::rollBack();

            return to_route('organization.edit', $organization)
                ->withError('Data gagal diperbarui : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        return to_route('organization.index')
            ->withSuccess('Data berhasil dihapus');
    }
}