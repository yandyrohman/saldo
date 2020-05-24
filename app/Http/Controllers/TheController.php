<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheController extends Controller
{
    public function index() {
        return view('home');
    }

    public function pemasukan() {
        return view('pemasukan');
    }

    public function pengeluaran() {
        return view('pengeluaran');
    }

    public function pembagian() {
        return view('pembagian');
    }

    public function form_pembagian() {
        return view('form_pembagian');
    }

    public function mutasi() {
        return view('mutasi');
    }

    public function bantuan() {
        return view('bantuan');
    }
}
