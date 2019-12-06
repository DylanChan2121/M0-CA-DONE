<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Patient;

use App\Role;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:admin');
     }

    public function index()
    {
      $patients = Patient::all();

      return view('admin.patients.index')->with([
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=> 'required|max:191',
        'email'=> 'required|max:191',
        'phone_number'=> 'required|max:191',
        'postal_address'=> 'required|max:191',
        'insurance'=> 'required|max:191',
        'policy_num'=> 'required|max:191',
        'password'=> 'required|max:191'


      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->phone_number = $request->input('phone_number');
      $user->postal_address = $request->input('postal_address');
      $user->password = $request->input('password');
      $user->save();


      $patient = new Patient();
      $patient->insurance = $request->input('insurance');
      $patient->policy_num = $request->input('policy_num');
      $patient->user_id = $user->id;
      $user->roles()->attach(Role::where('name','patient')->first());
      $patient->save();

      return redirect()->route("admin.patients.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient =Patient::findOrFail($id);

      return view('admin.patients.show')->with([
        'patient' => $patient
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $patient =Patient::findOrFail($id);

      return view('admin.patients.edit')->with([
        'patient' => $patient
  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $patient =Patient::findOrFail($id);
      // dd($patient);
          // $user = User::findOrFail($id);

    $request->validate([
      'name'=> 'required|max:191',
      'email'=> 'required|max:191',
      'phone_number'=> 'required|max:191',
      'postal_address'=> 'required|max:191',
      'password'=> 'required|max:191'
    ]);

    $patient->user->name = $request->input('name');
    $patient->user->email = $request->input('email');
    $patient->user->phone_number = $request->input('phone_number');
    $patient->user->postal_address = $request->input('postal_address');
    $patient->user->password = $request->input('password');
    // $user->save();

    $patient->insurance = $request->input('insurance');
    $patient->policy_num = $request->input('policy_num');
    // $patient->user_id = $user->id;
    // $user->roles()->attach(Role::where('name','patient')->first());
    //when creating a second crud, if you already attached a crud and have inheritance and already created attachments before hand e.g doctors on top, you dont have to attach roles or id e.g see commented out code for example
    $patient->user->save();
    $patient->save();
    return redirect()->route("admin.patients.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::find($id);
      $patient->delete();

      return redirect()->route('admin.patients.index');
    }
}
