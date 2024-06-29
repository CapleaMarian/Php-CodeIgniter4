<?php

namespace App\Controllers;

use App\Models\PozeModel;
use CodeIgniter\Controller;

class PozeController extends Controller
{
    public function index()
    {
        $pozeModel = new PozeModel();
        $data['poze'] = $pozeModel->findAll();

        return view('seed_view', $data);
    }
}

