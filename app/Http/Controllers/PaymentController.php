<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->route = 'payment';
        $this->students = Student::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        $route = $this->route;
        return view('payments.index', compact('payments', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = $this->students;
        return view('payments.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'date' => Carbon::now()->toDateString(),
            'fee_id' => Student::find($request->student_id)->fee->id,
        ]);
        $payment = Payment::create($request->except('paid_mock'));
        return redirect('payment')->with('success', 'Data pembayaran SPP berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = $this->students;
        $payment = Payment::find($id);
        return view('payments.edit', compact('students', 'payment'));
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
        $request->merge([
            'user_id' => Auth::user()->id,
            'date' => Carbon::parse($request->date)->format("Y-m-d"),
            'fee_id' => Student::find($request->student_id)->fee->id,
        ]);
        $payment  = Payment::find($id);
        $payment->update($request->all());
        return redirect('payment')->with('success', 'Data pembayaran SPP berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil dihapus']);
    }

    public function print($id) {
        $payment = Payment::findOrFail($id);
        $pdf = PDF::loadView('print.payment', compact('payment'));
        return $pdf->download('BUKTI PEMBAYARAN SPP.pdf');
    }

    public function export() {
        $payments = Payment::all();
        $pdf = PDF::loadView('print.report', compact('payments'));
        return $pdf->download('LAPORAN PEMBAYARAN SPP.pdf');
    }
}
