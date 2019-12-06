@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            patient: {{$patient->user->name}}

          </div>
          <div class="card-body">

              <table class="table table-hover">
                <tbody>
                  <tr>Name</tr>
                  <td>{{$patient->user->name}}</td>
                    <tr>Email</tr>
                  <td>{{$patient->user->email}}</td>
                  <tr>phone number</tr>
                <td>{{$patient->user->phone_number}}</td>
                <tr>postal address</tr>
              <td>{{$patient->user->postal_address}}</td>
              <tr>insurance</tr>
            <td>{{$patient->insurance}}</td>
            <tr>policy number</tr>
          <td>{{$patient->policy_num}}</td>

                        </tbody>

                          </table>

                          <a href="{{ route("admin.patients.index", $patient->id) }}" class="btn btn-default">back</a>
                          <a href="{{ route("admin.patients.edit", $patient->id) }}" class="btn btn-warning float-right">Edit</a>
                          <form style="display:inline" method="POST" action="{{ route('admin.patients.destroy', $patient->id)}}">
                          <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id)}}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                          <button type="hidden" class="form-control btn-danger"> DELETE</a>
                          </form>

          </div>
        </div>
      </div>
    </div>
    <div>
    @endsection
