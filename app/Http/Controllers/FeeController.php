<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeeRequest;
use App\Models\Fee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->route = 'fee';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fee::orderBy('id', 'desc')->get();
        $route = $this->route;
        return view('fees.index', compact('fees', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeRequest $request)
    {
        $request->merge([
            'year' => Carbon::parse("01-01-$request->year")->toDateString(),
        ]);
        $fee = Fee::create($request->all());
        return redirect('fee')->with('success', 'Data SPP berhasil dibuat!');
    }

    /**
     * Display the specified resource.p
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = Fee::find($id);
        return view('fees.show', compact('fee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = Fee::find($id);
        return view('fees.edit', compact('fee'));
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
        $fee  = Fee::find($id);
        $request->merge([
            'year' => Carbon::parse("01-01-$request->year")->toDateString(),
        ]);
        $fee->update($request->all());
        return redirect('fee')->with('success', 'Data SPP berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();
        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil dihapus']);
    }
}
