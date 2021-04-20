<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $payments = Auth::guard('students')->check() ? Payment::where('student_id', Auth::guard('students')->user()->id)->orderBy('id', 'desc')->get() : Payment::orderBy('id', 'desc')->limit(10)->get();
        $paid = Payment::all()->map(function($payment) {
            return $payment->paid;
        })->sum();
        $students = Student::all()->count();
        $total_payments = Payment::all()->count();

        return view('dashboard', compact('payments', 'paid', 'students', 'total_payments'));
    }
}
