<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class RenderController extends Controller
{


    public function getLogin() {
        return view('login');
    }

    public function getAdmin() {
        return view('admin');
    }

    public function getGastos() {
        return view('gastos');
    }

    public function accessView(){
        return view('access');
    }

    public function registerCodom(){
        return view('register-codom');
    }
    public function registerExpenses(){
        return view('register-expenses');
    }
    public function estates(){
        return view('list-estates');
    }

    public function generatePDF() {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('preview', $data);
  
        return $pdf->view('example.pdf');
    }

    
    
}
