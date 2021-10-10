<?php

namespace App\Http\Controllers\H_Nurses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\H_Departments;
use App\Models\H_nurse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\NursesRequest;

class NursersController extends Controller
{

    public function index()
    {
        $nurses = H_nurse::get();
        // return $nurses;
        $departments = H_Departments::all();
        // return $departments;
        return view('pages.backend.h_nurses.index', compact('departments', 'nurses'));
    }


    public function create()
    {
        //
    }


    public function store(NursesRequest $request)
    {
        $H_nurse = new H_nurse();
        $H_nurse->username = $request->username;
        $H_nurse->password = Hash::make($request->password);
        $H_nurse->name = $request->name;
        $H_nurse->role = 1;
        $H_nurse->phone = $request->phone;
        $H_nurse->title = $request->title;
        $H_nurse->salary = $request->salary;
        $H_nurse->dept_id = $request->department;
        $H_nurse->save();
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['nuress'] = H_nurse::findorfail($id);
        $data['departments'] = H_Departments::all();
        //   return $data['nuress'];
        return view('pages.backend.h_nurses.edit', $data);
    }


    // public function update(NursesRequest $request,)
    // {
    //    return $request;
    //     $nursesupdate = H_nurse::findorfail($request->nurse_id);
    //     $nursesupdate->username = $request->username;
    //     $nursesupdate->password = Hash::make($request->password);
    //     $nursesupdate->name = $request->name;
    //     $nursesupdate->role = '1';
    //     $nursesupdate->phone = $request->phone;
    //     $nursesupdate->title = $request->title;
    //     $nursesupdate->salary = $request->salary;
    //     $nursesupdate->dept_id = $request->department;
    //     $nursesupdate->status = $request->status_id;
    //     $nursesupdate->save();
    //     return redirect()->route('showNurses');
    // }

    public function update(NursesRequest $request)
    {
       
    //   return $request;
        $nursesupdate = H_nurse::findorfail($request->nurse_id);
        $nursesupdate->username = $request->username;
        $nursesupdate->password = Hash::make($nursesupdate->password);
        $nursesupdate->name = $request->name;
        $nursesupdate->role = '1';
        $nursesupdate->phone = $request->phone;
        $nursesupdate->title = $request->title;
        $nursesupdate->salary = $request->salary;
        $nursesupdate->dept_id = $request->department;
        $nursesupdate->status = $request->status_id;
        $nursesupdate->save();
        return redirect()->route('showNurses');
    }

    public function destroy($id)
    {
        H_nurse::findorfail($id)->delete();
        return redirect()->back();
    }
}
