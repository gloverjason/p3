<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class BillController extends Controller
{
    public function index(Request $request)
    {
        // If values are available in session from previous submission, get those values
        $splitWays = $request->session()->get('splitWays', '');
        $totalCost = $request->session()->get('totalCost', '');
        $service = $request->session()->get('service', 'excellent');
        $roundUp = $request->session()->get('roundUp', false);
        $costPerPerson = $request->session()->get('costPerPerson');

        // Return the view with "results" values or default (if initial page visit)
        return view('bill.index')->with([
            'costPerPerson' => $costPerPerson,
            'splitWays' => $splitWays,
            'totalCost' => $totalCost,
            'service' => $service,
            'roundUp' => $roundUp
        ]);
    }

    public function results(Request $request)
    // Request $request gets all the data from form
    {
        // Make sure all required sections are filled out
        // Laravel automatically redirects back to index page if errors are present
        $this->validate($request, [
            'splitWays' => 'required',
            'totalCost' => 'required',
            'service' => 'required'
        ]);

        // request-> instead of get-> is used in Laravel
        $splitWays = $request->input('splitWays', '');
        $totalCost = $request->input('totalCost', '');
        $service = $request->input('service', 'excellent');
        $roundUp = $request->input('roundUp');

        // Apply tip percent based on service quality
        if ($service == 'horrible') {
            $tipPercent = 0.00;
        } else if ($service == 'bad') {
            $tipPercent = 0.05;
        } else if ($service == 'fair') {
            $tipPercent = 0.10;
        } else if ($service == 'average') {
            $tipPercent = 0.15;
        } else if ($service == 'good') {
            $tipPercent = 0.20;
        } else if ($service == 'excellent') {
            $tipPercent = 0.25;
        }

        if ($roundUp == false) {
            $cPerPerson = $totalCost / $splitWays * (1 + $tipPercent);
            // 2 decimal points if round up is not used
            $costPerPerson = round($cPerPerson, 2);
        } else {
            $costPerPerson = ceil($totalCost / $splitWays * (1 + $tipPercent));
        }

        return redirect(' ')->with([
            'costPerPerson' => $costPerPerson,
            'splitWays' => $splitWays,
            'totalCost' => $totalCost,
            'service' => $service,
            'roundUp' => $roundUp
        ]);
    }
}
