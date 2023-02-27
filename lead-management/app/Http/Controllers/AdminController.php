<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lead;
use App\Model\user;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //lead page
    public function view_lead()
    {
        $lead=lead::all();
        return view('admin.leads.add_lead',compact('lead'));
    }

    //add_leads
    public function add_lead(Request $request)
    {
        $lead=new lead;
        $lead->first_name=$request->first_name;
        $lead->last_name=$request->last_name;
        $lead->phone=$request->phone;
        $lead->title=$request->title;
        $lead->email=$request->email;
        $lead->company=$request->company;
        $lead->street=$request->street;
        $lead->city=$request->city;
        $lead->state=$request->state;
        $lead->zip_code=$request->zip_code;
        $lead->country=$request->country;
        $lead->description=$request->description;

        $lead->lead_source=$request->lead_source;
        $lead->lead_status=$request->lead_status;
        
        $lead->save();

        return redirect()->back()->with('message', 'Lead added Successfully');
    }

    //manage_leads
    public function manage_leads()
    {
        $lead=lead::all();
        return view('admin.leads.manage_leads',compact('lead'));
    }

    //delete_lead
    public function delete_lead($id)
    {
        $data=lead::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Lead added Successfully');
    }

    //edit_lead
    public function edit_lead($id)
    {
        $lead=lead::find($id);
        return view('admin.leads.edit_lead',compact('lead'));
    }


}
