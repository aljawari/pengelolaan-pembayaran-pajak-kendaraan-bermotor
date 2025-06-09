<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::latest()->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:staff,email',
            'no_telepon' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil ditambahkan.');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'no_telepon' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Data staff berhasil dihapus.');
    }
}
