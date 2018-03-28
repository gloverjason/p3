<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
   /* public function index()
    {
        //return 'Show the Bill Splitter form where users can enter the information necessary to calculate the cost per person';
        return view('bill.index') /*->with([
            'results' => $results,
            'etc' => $etc,
        ]);
    }*/

    /**
     * GET /bill/results
     * @Todo: validation, debugging
     */
    public function index (Request $request)
    // Request $request gets all the data from form
    {
       if (isset($totalCost)) {

        /*$this->validate($request,  [
            'splitWays' => 'required',
            'totalCost' => 'required',
            'service' => 'required'
        ])*/
           // Get all the form data
           //$request->all()
           //$form = new Form($_GET);

           // request-> instead of get-> is used in Laravel
           $splitWays = $request->input('splitWays', 1);
           $totalCost = $request->input('totalCost', 1);
           $service = $request->input('service', 'excellent');
           //$roundUp = $request->input('roundUp', '');

           // If the form is submitted and does not have errors
           /*if ($form->isSubmitted() && !$form->hasErrors) {*/
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

           if ($request->has('roundUp')) {
               $cPerPerson = $totalCost / $splitWays * (1 + $tipPercent);
               $costPerPerson = round($cPerPerson, 2);
           } else {
               $costPerPerson = ceil($totalCost / $splitWays * (1 + $tipPercent));
           }

           //$displayCostPerPerson = $costPerPerson;
           //}
           return view('bill.index')->with([
               'costPerPerson' => $costPerPerson,
               'splitWays' => $splitWays,
               'totalCost' => $totalCost,
               'service' => $service,
               'roundUp' => $request->has('roundUp')
           ]);
       } else {
            return view('bill.index')->with([
                'service' => 'excellent'

            ]);
       }
    }
}
