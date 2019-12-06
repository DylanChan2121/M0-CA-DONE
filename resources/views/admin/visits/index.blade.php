@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Upcoming Appointment
           <a href="{{  route('admin.visits.create') }}" class=" float-right btn btn-primary" >Add</a>
        </div>
       <div class="card-body">
         @if (count($visits) === 0)
         <p>There are no Appointments ! </p>
         @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Doctor</th>
              <th>Description</th>
              <th>Patient</th>
              <th>Time and duration</th>
              <th>Date</th>
              <th>Cost</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach ($visits as $visit)
              <tr data=id="{{$visit->id}}">
              <td>{{  $visit->doctor->user->name  }}</td>
              <td>{{  $visit->description }}</td>
              <td>{{  $visit->patient->user->name  }}</td>
              <td>{{  $visit->date_and_time }}</td>
              <td>{{  $visit->duration }}</td>
              <td>{{  $visit->cost  }}</td>
              <td>
                <a href="{{route ('admin.visits.show', $visit->id) }}" class="btn btn-default">View</a>
                <a href="{{route ('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                <form style="display:inline-block" method="POST" action="{{ route ('admin.visits.destroy', $visit->id)   }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                  <button type="submit" class="form-control btn btn-danger">Delete</a>
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
   </div>
@endsection
