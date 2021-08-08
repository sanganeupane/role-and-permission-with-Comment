<?php

namespace App\Http\Controllers\backend\AccountController;

use App\Http\Controllers\backend\DashbordController;
use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use Illuminate\Http\Request;

class AccountController extends DashbordController
{
    public function addAccounts()
    {
        if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")
            || (\Illuminate\Support\Facades\Auth::user()->role == "account")
//            ||(\Illuminate\Support\Facades\Auth::user()->role == "client")
        )

            return view($this->pagePath . 'pages.accounts.add-accounts');
        else
            return redirect()->back()->with('error', 'you are not allowed to access this page ');
    }

    public function addAccountsAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'pages.accounts.add-accounts');

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'date' => 'required',
                'dealamount' => 'required_with:totalpaid|integer|gte:totalpaid',
                'totalpaid' => 'required_with:dealamount|integer|lte:dealamount',
                'payment' => 'required'

            ]);

            $data['name'] = $request->name;
            $data['date'] = $request->date;
            $data['dealamount'] = $request->dealamount;
            $data['totalpaid'] = $request->totalpaid;
            $data['payment'] = $request->payment;

//dd($data);
            if (Account::create($data)) {
                return redirect()->route('show-accounts')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function showAccounts(Request $request)
    {

        if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")
            || (\Illuminate\Support\Facades\Auth::user()->role == "account")
            || (\Illuminate\Support\Facades\Auth::user()->role == "client")
            || (\Illuminate\Support\Facades\Auth::user()->role == "sales")
        ) {

            if (!empty($request->search)) {


                $criteria = $request->search;

                $accountData = Account::where('name', 'LIKE', '%' . $criteria . '%')->paginate(5);
//dd($userData);
                return view($this->pagePath . 'pages.accounts.show-accounts', ['accountData' => $accountData]);

            } else {

                $accountData = Account::orderby('id', 'desc')->paginate(5);
                return view($this->pagePath . 'pages.accounts.show-accounts', ['accountData' => $accountData]);

            }
        } else {
            return redirect()->back()->with('error', 'you are not allowed to access this page ');


        }

    }


    public function editAccount(Request $request)
    {
        $id = $request->id;
        $accountData = Account::findorfail($id);
        return view($this->pagePath . 'pages.accounts.edit-account', ['accountData' => $accountData]);
    }


    public function editAccountAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'pages.accounts.add-accounts');

        }
        if ($request->isMethod('post')) {
            $id = $request->id;

//dd($id);
            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'date' => 'required',
                'dealamount' => 'required_with:totalpaid|integer|gte:totalpaid',
                'totalpaid' => 'required_with:dealamount|integer|lte:dealamount',
                'payment' => 'required'

            ]);

            $data['name'] = $request->name;
            $data['date'] = $request->date;
            $data['dealamount'] = $request->dealamount;
            $data['totalpaid'] = $request->totalpaid;
            $data['payment'] = $request->payment;

//dd($data);
//            $toy = Account::findOrFail($id)->update($data);
//            dd($toy);
//            if (AdminUser::findOrFail($id)->update($data)) {
            if (Account::findOrFail($id)->update($data)) {
//                echo "yes";
                return redirect()->route('show-accounts')->with('success', 'Data was edited successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }
    public function deleteFiles($id)
    {
        $findData = Account::findOrFail($id);
        return true;
    }

    public function deleteAccountAction(Request $request)
    {
        $id = $request->id;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Account::findOrFail($id)->delete()) {
            return redirect()->route("show-accounts")->with('success', "Data Deleted Successfully");
        }
    }

}
