<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Department;
use App\Models\College;

class DeparmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = Department::all();
        $colleges = College::all();
        return view('pages.departments', [
            'departments' => $departments,
            'colleges' => $colleges
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('/departments');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'deptfullname' => 'required',
            'deptshortname' => 'required',
            'deptcollid' => 'required'
        ]);

        Department::create($validateData);

        return redirect('/departments')->with('success', 'Department created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $id): RedirectResponse
    {
        Department::destroy($id);
        return redirect('/departments')->with('flash_message', 'Department Deleted!'); 
    }
}
