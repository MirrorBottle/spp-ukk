<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\Classes;
use App\Models\Competition;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->route = 'class';
        $this->competitions = Competition::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::orderBy('id', 'desc')->get();
        $route = $this->route;
        return view('classes.index', compact('classes', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competitions = $this->competitions;
        return view('classes.create', compact('competitions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $class = Classes::create($request->all());
        return redirect('class')->with('success', 'Data kelas berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classes::find($id);
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::find($id);
        $competitions = $this->competitions;
        return view('classes.edit', compact('class', 'competitions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $class = Classes::find($id);
        $class->update($request->all());
        return redirect('class')->with('success', 'Data Kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil dihapus']);
    }
}
