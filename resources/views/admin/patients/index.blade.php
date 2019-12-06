@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            patients
            <a href="{{route('admin.patients.create')}}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($patients) === 0)
              <p> there are no patients </p>
            @else
              <table id="table-patients" class="table table-hover">
                <thread>
                  <th>Name</th>
                    <th>Email</th>
                      <th>postal address</th>
                        <th>phone number</th>
                          <th>insurance</th>
                            <th>policy number</th>

                            </thread>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr data-id="{{$patient->id}}">
                                    <td>{{$patient->user->name}}</td>
                                    <td>{{$patient->user->email}}</td>
                                    <td>{{$patient->user->phone_number}}</td>
                                    <td>{{$patient->user->postal_address}}</td>
                                    <td>{{$patient->insurance}}</td>
                                          <td>{{$patient->policy_num}}</td>

                                      <td>
                                      <a href="{{ route("admin.patients.show", $patient->id) }}" class="btn btn-default">view</a>
                                      <a href="{{ route("admin.patients.edit", $patient->id) }}" class="btn btn-warning">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id)}}">
                                          <input type="hidden" name="_method" value="DELETE">
                                              <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                  <button type="hidden" class="form-control btn-danger"> DELETE</a>
                                                  </form>
                                    </td>
                                        </tr>
                                @endforeach
                            </tbody>
                          </table>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div>
    @endsection
