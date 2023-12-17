<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Program;
use App\Models\College;
use App\Models\Department;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $programs = Program::all();
        $colleges = College::all();
        $departments = Department::all();
        
        return view('pages.programs', [
            'programs' => $programs,
            'colleges' => $colleges,
            'departments' => $departments,
        ]);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
