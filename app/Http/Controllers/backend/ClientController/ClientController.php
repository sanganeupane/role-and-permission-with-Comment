<?php

namespace App\Http\Controllers\backend\ClientController;

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class ClientController extends BackendController
{
    public function addClient()
    {
        if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")
            || (\Illuminate\Support\Facades\Auth::user()->role == "client")
            || (\Illuminate\Support\Facades\Auth::user()->role == "developer")
        )

            return view($this->pagePath . 'pages.clients.add-client');
        else
            return redirect()->back()->with('error', 'you are not allowed to access this page ');

    }


    public function addClientAction(Request $request)
    {


        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.accounts.add-accounts');

        }


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'website' => 'required',
                'site_url' => 'required',
                'cpanel_username' => 'required',
                'cpanel_password' => 'required',
                'dashobord_link' => 'required',
                'dashobord_username' => 'required',
                'dashboard_password' => 'required',


            ]);

            $data['website'] = $request->website;
            $data['site_url'] = $request->site_url;
            $data['cpanel_username'] = $request->cpanel_username;
            $data['cpanel_password'] = bcrypt($request->cpanel_password);
            $data['dashobord_link'] = $request->dashobord_link;
            $data['dashobord_username'] = $request->dashobord_username;
            $data['dashboard_password'] = bcrypt($request->dashboard_password);


//dd($data);
            if (Client::create($data)) {
                return redirect()->route('showClient')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function showClient()
    {


        if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin") || (\Illuminate\Support\Facades\Auth::user()->role == "client") || (\Illuminate\Support\Facades\Auth::user()->role == "developer")) {
            $clientData = Client::orderBy('id', 'desc')->paginate(5);

            return view($this->pagePath . 'pages.clients.show-client', ['clientData' => $clientData]);
        } else
            return redirect()->back()->with('error', 'you are not allowed to access this page ');


    }


    public function editClient(Request $request){
        $id=$request->id;

        $clientData=Client::findorfail($id);

        return view($this->pagePath.'pages.clients.edit-client',['clientData'=>$clientData]);


}


    public function editClientAction(Request $request)
    {


        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.accounts.add-accounts');

        }


        if ($request->isMethod('post')) {
            $id=$request->id;
            $this->validate($request, [
                'website' => 'required',
                'site_url' => 'required',
                'cpanel_username' => 'required',
                'dashobord_link' => 'required',
                'dashobord_username' => 'required',


            ]);

            $data['website'] = $request->website;
            $data['site_url'] = $request->site_url;
            $data['cpanel_username'] = $request->cpanel_username;
            $data['dashobord_link'] = $request->dashobord_link;
            $data['dashobord_username'] = $request->dashobord_username;


//dd($data);
            if (Client::findorfail($id)->update($data)) {
                return redirect()->route('showClient')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }

    public function deleteFiles($id)
    {
        $findData = Client::findOrFail($id);
        return true;
    }

    public function deleteClientAction(Request $request)
    {
        $id = $request->id;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Client::findOrFail($id)->delete()) {
            return redirect()->route("showClient")->with('success', "Data Deleted Successfully");
        }
    }

}
