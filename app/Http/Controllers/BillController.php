<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        //return 'Show the Bill Splitter form where users can enter the information necessary to calculate the cost per person';
        return view('bill.index') /*->with([
            'results' => $results,
            'etc' => $etc,
        ])*/;
    }

    public function calculateCost()
    {
        return 'Calculate the cost per person and redirect the user back to the index page';
    }
}
