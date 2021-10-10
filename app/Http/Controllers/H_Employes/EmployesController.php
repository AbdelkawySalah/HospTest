<?php

namespace App\Http\Controllers\H_Employes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\H_employees;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployesRequest;

class EmployesController extends Controller
{
    
    public function index()
    {
        $employes=H_employees::get();
        return view('pages.backend.h_employes.index',compact('employes'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(EmployesRequest $request)
    {
       
    //    return $request;

       $H_employes = new H_employees();
       $H_employes->username = $request->username;
       $H_employes->password = Hash::make($request->password);
       $H_employes->name = $request->name;
       $H_employes->role = 1;
       $H_employes->phone = $request->phone;
       $H_employes->title = $request->title;
       $H_employes->salary = $request->salary;
       $H_employes->save();
       return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        // return $id;
        $employes = H_employees::findorfail($id);
        return view('pages.backend.h_employes.edit', compact('employes'));

    }

    
    public function update(EmployesRequest $request)
    {
        $empupdate = H_employees::findorfail($request->emp_id);
        $empupdate->username = $request->username;
        $empupdate->password = Hash::make($request->password);
        $empupdate->name = $request->name;
        $empupdate->role = '1';
        $empupdate->phone = $request->phone;
        $empupdate->title = $request->title;
        $empupdate->salary = $request->salary;
        $empupdate->status = $request->status_id;
        $empupdate->save();
        return redirect()->route('showemployes');

    }

    
    public function destroy($id)
    {
        // return $id;
        H_employees::findorfail($id)->delete();
        return redirect()->route('showemployes');
    
    }
}
