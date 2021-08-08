<?php

namespace App\Http\Controllers\backend\LeadController;

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\DashbordController;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Comment\Comment;
use App\Models\LeadCompany\Leadcompany;
use App\Models\Service\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends BackendController
{
    public function addCompany()
    {
        if (auth()->check() && (Auth::user()->role == "super-admin") || (Auth::user()->role == "sales")) {
            $serviceData = Service::orderby('id', 'desc')->paginate(5);

            return view($this->pagePath . 'pages.leads.add-company', ['serviceData' => $serviceData]);
        } else {
            return redirect()->back()->with('error', 'Sorry you are not allowed to this page');
        }
    }

    public function addCompanyAction(Request $request)
    {

        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.leads.add-company');
        }


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'companyname' => 'required|min:3|max:30',
                'name' => 'required|min:3|max:30',
                'username' => 'required|min:2|max:30',
                'address' => 'required|min:3|max:30',
                'email' => 'required|email',
                'phone' => 'required|min:9|max:13',
                'service' => 'required',
                'deals' => 'required',
                'followup' => 'required',
                'handle' => 'required'

            ]);

            $data['companyname'] = $request->companyname;
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['address'] = $request->address;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['service'] = $request->service;
            $data['deals'] = $request->deals;
            $data['followup'] = $request->followup;
            $data['handle'] = $request->handle;

            if (Leadcompany::create($data)) {
                return redirect()->route('show-company')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }

    public function showCompany(Request $request)
    {


        if (!empty($request->search) || !empty($request->service)) {


            $criteria = $request->search;
            $id = $request->service;


            $companyData = Leadcompany::where('companyname', 'LIKE', '%' . $criteria . '%')
                ->orwhere('username', 'LIKE', '%' . $criteria . '%')
                ->orwhere('phone', 'LIKE', '%' . $criteria . '%')
                ->orwhere('service', 'LIKE', '%' . $criteria . '%')
                ->paginate(5);


//            dd($id);

            $serviceData = Service::all();
            return view($this->pagePath . 'pages.leads.show-company', ['companyData' => $companyData], ['serviceData' => $serviceData]);

        } else {

            $serviceData = Service::all();

            $companyData = Leadcompany::orderby('id', 'desc')->paginate(5);
            return view($this->pagePath . 'pages.leads.show-company', ['companyData' => $companyData], ['serviceData' => $serviceData]);

        }

    }


    public function viewCompany(Request $request)
    {
        $id = $request->id;

        $viewCompanyData = Leadcompany::findorfail($id);
//        dd($viewCompanyData);

        $viewCommentData = Comment::orderby('created_at', 'asc')->paginate(20);
//        $viewCommentDataAction=$viewCommentData->leadId;


//        dd($leadData);

        return view($this->pagePath . 'pages.leads.view-company', ['viewCompanyData' => $viewCompanyData], ['viewCommentData' => $viewCommentData]);

    }


    public function addCommentAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'pages.leads.view-company');

        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'comment' => 'required',
            ]);


            $data['comment'] = $request->comment;
            $data['posted_by'] = Auth::guard('admin')->user()->id;

            $data['lead_id'] = $request->lead_id;


//            dd($data);
            if (Comment::create($data)) {
                return redirect()->back()->with('success', 'comment was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function deleteCommentAction(Request $request,$leadData)
    {
        $id = $request->comments;
        $leadData=Comment::findorfail($leadData);


 if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="super-admin")
     ||($leadData->posted_by===\Illuminate\Support\Facades\Auth::user()->id))

        {
            if (Comment::findOrFail($id)->delete()) {
                return redirect()->back()->with('success', "Comment Deleted Successfully");

//                return view($this->pagePath . 'pages.leads.view-company', ['leadData' => $leadData]);


            }
        } else {
            return redirect()->back()->with('error', "not allowed");

        }
    }



    public function addService()
    {

        $serviceData = Service::orderby('id', 'asc')->paginate(4);
//        dd($serviceData);
        return view($this->pagePath . 'pages.leads.add-service', ['serviceData' => $serviceData]);
//        return view($this->pagePath . 'pages.leads.add-service');


    }

    public function addServiceAction(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->pagePath . 'pages.leads.add-service');

        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'service' => 'required',
            ]);

            $data['service'] = $request->service;

            if (Service::create($data)) {
//                return redirect()->back()->with('success', 'Data was inserted successfully');
                return redirect()->route('addService')->with('success', 'Data was inserted successfully');

            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }

    public function editLead(Request $request)
    {

        $id = $request->id;

        $leadData = Leadcompany::findorfail($id);
        $serviceData = Service::all();

        return view($this->pagePath . 'pages.leads.edit-lead', ['leadData' => $leadData], ['serviceData' => $serviceData]);

    }


    public function editLeadAction(Request $request)
    {

        if ($request->isMethod('get')) {

            return view($this->pagePath . 'pages.leads.add-company');
        }


        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'companyname' => 'required|min:3|max:30',
                'name' => 'required|min:3|max:30',
                'username' => 'required|min:2|max:30',
                'address' => 'required|min:3|max:30',
                'email' => 'required|email',
                'phone' => 'required|min:9|max:13',
                'service' => 'required',
                'deals' => 'required',
                'followup' => 'required',
                'handle' => 'required'

            ]);

            $data['companyname'] = $request->companyname;
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['address'] = $request->address;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['service'] = $request->service;
            $data['deals'] = $request->deals;
            $data['followup'] = $request->followup;
            $data['handle'] = $request->handle;

            if (Leadcompany::findorfail($id)->update($data)) {
                return redirect()->route('show-company')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function deleteleadAction(Request $request)
    {
        $id = $request->criteria;


        $totalUser = Comment::where('lead_id', '=', $id)->count();
        if ($totalUser > 0) {
            return redirect()->back()->with('error', 'Sorry Data cannot delete related with comment');

        } else {


            if (Leadcompany::findOrFail($id)->delete()) {
                return redirect()->route("show-company")->with('success', "Data Deleted Successfully");
            }
        }
    }


    public function editService(Request $request)
    {
        $id = $request->id;
        $serviceData = Service::findorfail($id);
        return view($this->pagePath . 'pages.leads.edit-service', ['serviceData' => $serviceData]);

    }


    public function editServiceAction(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->pagePath . 'pages.leads.add-service');

        }

        if ($request->isMethod('post')) {

            $id = $request->id;

            $this->validate($request, [
                'service' => 'required',
            ]);

            $data['service'] = $request->service;

            if (Service::findorfail($id)->update($data)) {
//                return redirect()->back()->with('success', 'Data was inserted successfully');
                return redirect()->route('addService')->with('success', 'Data was inserted successfully');

            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }

    public function deleteFiles($id)
    {
        $findData = Service::findOrFail($id);

        return true;
    }

    public function deleteServiceAction(Request $request)
    {
        $id = $request->id;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Service::findOrFail($id)->delete()) {
            return redirect()->route("addService")->with('success', "Data Deleted Successfully");
        }
    }

}
