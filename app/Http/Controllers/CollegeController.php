<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\College;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $colleges = College::all();
        return view('pages.colleges', ['colleges' => $colleges]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('/colleges');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'collfullname' => 'required',
            'collshortname' => 'required',
        ]);

        College::create($validatedData);

        return redirect('/colleges')->with('success', 'College created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $college = College::find($id);
        return view('colleges.show', ['college' => $college]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $college = College::find($id);
        return view('colleges')->with('college', $college);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $college = College::find($id);
        $input = $request->all();
        $college->update($input);
        return redirect('colleges')->with('success', 'College Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        College::destroy($id);
        return redirect('/colleges')->with('flash_message', 'College Deleted!'); 
    }
}
