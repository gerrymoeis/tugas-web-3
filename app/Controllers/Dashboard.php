<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard'); // Pastikan view 'dashboard.php' ada
    }
}   