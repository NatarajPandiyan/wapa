<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Imports\PustomersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
          $file = $request->file('file');
             
         $extension = $file->getClientOriginalExtension();

// dd([
//     'extension' => $file->getClientOriginalExtension(),
//     'mime'      => $file->getMimeType(),
//     'original'  => $file->getClientOriginalName(),
// ]);

         $request->validate([
        'file' => 'required|file|mimetypes:text/plain,text/csv',
         ]);

    $group_id=1;
    // $excelType = $extension === 'csv' ? \Maatwebsite\Excel\Excel::CSV : \Maatwebsite\Excel\Excel::XLSX;

     Excel::import(new PustomersImport($group_id), $request->file('file'));

    return back()->with('success', 'Products imported successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
       return view('customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
