<?php

namespace App\Http\Controllers\backend\InvoiceController;

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Invoice\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InvoiceController extends BackendController
{
    public function invoice()
    {

        return view($this->pagePath . 'pages.invoice.invoice');


    }



    public function addInvoice(Request $request)
    {


        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.invoice.invoice');

        }


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'company_name' => 'required',
                'name' => 'required',
                'contact' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'location' => 'required',
                'descriptions' => 'required',
                'service' => 'required',
                'quantity' => 'required',
                'rate' => 'required',


            ]);

            $data['company_name'] = $request->company_name;
            $data['name'] = $request->name;
            $data['contact'] = $request->contact;
            $data['address'] = $request->address;
            $data['zip_code'] = $request->zip_code;
            $data['location'] = $request->location;
            $data['descriptions'] = $request->descriptions;
            $data['service'] =$request->service;
            $data['quantity'] = $request->quantity;
            $data['rate'] = $request->rate;


//dd($data);
            if (Invoice::create($data)) {
                return redirect()->route('showInvoice')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }








    public function showInvoice()
    {

        $invoiceData=Invoice::orderBy('id','desc')->paginate(4);
//        dd($invoiceData);
        return view($this->pagePath . 'pages.invoice.show-invoice',['invoiceData'=>$invoiceData]);


    }

    public function editInvoice(Request $request){
        $id=$request->id;
        $invoiceData=Invoice::findorfail($id);

        return view($this->pagePath.'pages.invoice.edit-invoice',['invoiceData'=>$invoiceData]);


    }



    public function editInvoiceAction(Request $request)
    {


        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.invoice.invoice');

        }


        if ($request->isMethod('post')) {
            $id=$request->id;
            $this->validate($request, [
                'company_name' => 'required',
                'name' => 'required',
                'contact' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'location' => 'required',
                'descriptions' => 'required',
                'service' => 'required',
                'quantity' => 'required',
                'rate' => 'required',


            ]);

            $data['company_name'] = $request->company_name;
            $data['name'] = $request->name;
            $data['contact'] = $request->contact;
            $data['address'] = $request->address;
            $data['zip_code'] = $request->zip_code;
            $data['location'] = $request->location;
            $data['descriptions'] = $request->descriptions;
            $data['service'] =$request->service;
            $data['quantity'] = $request->quantity;
            $data['rate'] = $request->rate;


//dd($data);
            if (Invoice::findorfail($id)->update($data)) {
                return redirect()->route('showInvoice')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }



    public function deleteFiles($id)
    {
        $findData = Invoice::findOrFail($id);
        return true;
    }

    public function deleteInvoiceAction(Request $request)
    {
        $id = $request->id;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Invoice::findOrFail($id)->delete()) {
            return redirect()->route("showInvoice")->with('success', "Data Deleted Successfully");
        }
    }



}
