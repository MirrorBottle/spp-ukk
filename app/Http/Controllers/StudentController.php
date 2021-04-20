<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentPasswordRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Classes;
use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->route = 'student';
        $this->fees = Fee::all();
        $this->classes = Classes::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        $route = $this->route;
        return view('students.index', compact('students', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = $this->classes;
        $fees = $this->fees;
        return view('students.create', compact('classes', 'fees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $request->merge([
            'password' => Hash::make($request->nisn)
        ]);
        $student = Student::create($request->all());
        return redirect('student')->with('success', 'Data siswa berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classes = $this->classes;
        $fees = $this->fees;
        return view('students.edit', compact('classes', 'fees', 'student'));
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
        $student  = Student::find($id);
        $student->update($request->all());
        return redirect('student')->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil dihapus']);
    }

    public function showPassword() {
        return view('students.password');
    }

    public function password(StudentPasswordRequest $request) {
        $student = Student::find(Auth::guard('students')->user()->id);
        $student->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect('/password')->with('success', 'Password berhasil diubah!');
    }
}
