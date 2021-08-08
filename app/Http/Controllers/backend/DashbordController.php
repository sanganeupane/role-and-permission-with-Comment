<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Comment\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends BackendController
{

    public function index()
    {
        return view($this->pagePath . 'pages.index');
    }


    public function home()
    {
        return view($this->pagePath . 'pages.home');
    }


    public function addAdminUser(Request $request)
    {
        if ($request->isMethod('get')) {
            if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin"))
                return view($this->pagePath . 'pages.add-admin');
            else
                return redirect()->back()->with('error', 'you are not allowed to access this page ');


        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:15',
                'email' => 'required|email',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required',
                'image' => 'mimes:jpg,jpeg,gif,png',
                'role' => 'required',

            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/admins');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;
            }


            $data['role'] = $request->role;
//            $role =array( implode(',', $request->input('role')));
//            $data['role'] = $role;

//dd($role);
            if (AdminUser::create($data)) {
                return redirect()->route('showAdminUser')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function showAdminUser()
    {


        $adminUserData = AdminUser::orderby('id', 'desc')->paginate(3);
//        $adminUserData = AdminUser::orderby('id','desc')->wheres('role'=='client');
//        $array=array_fetch($adminUserData, 'role.client');
//        dd($array);
//        $array=array(Auth::user()->role);

//echo implode(',', $_POST['client']);
//        if (isset($_POST['role'])) {
//            print_r($_POST['role']);
//        }


        if (auth()->check() && (Auth::user()->role === ('super-admin')) || (Auth::user()->role == 'client'))


            return view($this->pagePath . 'pages.show-admin', ['adminUserData' => $adminUserData]);
        else
            return redirect()->back()->with('error', 'you are not allowed to access this page ');
    }


//    public function updateAdminType(Request $request)
//    {
//        if ($request->isMethod('get')) {
//            return redirect()->back();
//
//        }
//
//        if ($request->isMethod('post')) {
//            $criteria = $request->criteria;
//            $findUser = AdminUser::findorfail($criteria);
//            if (isset($_POST['super-admin'])) {
//                $findUser->admin_type = 'admin';
//                $message = ' User type was Changed';
//
//            }
//            if (isset($_POST['admin'])) {
//                $findUser->admin_type = 'editor';
//                $message = ' User type was Changed';
//
//            }
//            if (isset($_POST['editor'])) {
//                $findUser->admin_type = 'user';
//                $message = 'Admin Type was active';
//
//            }
//            if (isset($_POST['user'])) {
//                $findUser->admin_type = 'super-admin';
//                $message = 'Admin Type was active';
//
//            }
//            if ($findUser->update()) {
//                return redirect()->back()->with('success', $message);
//
//            } else {
//                return redirect()->back()->with('error', 'there was a problems');
//
//            }
//        }
//    }


    public function editAdminUser(Request $request)
    {
        $id = $request->id;
        $adminUserData = AdminUser::findorfail($id);
        return view($this->pagePath . 'pages.edit-admin', ['adminUserData' => $adminUserData]);


    }

    public function editAdminUserAction(Request $request)
    {
        if ($request->isMethod('get')) {
            if (auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin"))
                return view($this->pagePath . 'pages.add-admin');
            else
                return redirect()->back()->with('error', 'you are not allowed to access this page ');


        }
        if ($request->isMethod('post')) {
            $id = $request->id;

            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:15',
                'email' => 'required|email',
                'image' => 'mimes:jpg,jpeg,gif,png',
                'role' => 'required',

            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/admins');
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }

                $data['image'] = $imageName;

            }
            $data['role'] = $request->role;

            if (AdminUser::findOrFail($id)->update($data)) {
                return redirect()->route('showAdminUser')->with('success', 'Data was edited successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }


    public function deleteFiles($id)
    {
        $findData = AdminUser::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/admins/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteAdminAction(Request $request)
    {
        $id = $request->id;

        $totalUser = Comment::where('posted_by', '=', $id)->count();
        if ($totalUser > 0) {
            return redirect()->back()->with('error', 'Sorry Data cannot delete related with comment');

        } else {

            $this->deleteFiles($id);

            if ($this->deleteFiles($id) && AdminUser::findOrFail($id)->delete()) {
                return redirect()->route("showAdminUser")->with('success', "Data Deleted Successfully");
            }
        }

    }
}

