<?php

namespace App\Http\Controllers;

use App\Models\DetailDataDonatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $detailDonaturs = DetailDataDonatur::latest()->get();
        return view('administrator.data donatur.index', compact('detailDonaturs'));
    }
}