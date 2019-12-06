@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new appointment
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('admin.visits.store')}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
          <label for ="doctor">Doctor </label>
          <select name="doctor_id">
           @foreach ($doctors as $doctor)
            <option value = "{{ $doctor->id }}" {{ (old('doctor_id') == $doctor->id) ? "selected " : "" }} >
              {{ $doctor->user->name   }}
            </option>
          @endforeach
          </select>

          <div class="form-group">
            <label for ="description">Description </label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}"/>
          </div>


          <div class="form-group">
            <label for ="patient">Patient </label>
            <select name="patient_id">
             @foreach ($patients as $patient)
              <option value = "{{ $patient->id }}" {{ (old('patient_id') == $patient->id) ? "selected " : "" }} >
                {{ $patient->user->name   }}
              </option>
            @endforeach
            </select>

          <div class="form-group">
            <label for ="date_and_time">date and time </label>
            <input type="text" class="form-control" id="date_and_time" name="date_and_time" value="{{old('date_and_time')}}"/>
          </div>

          <div class="form-group">
            <label for ="duration">duration </label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{old('duration')}}"/>
          </div>

          <div class="form-group">
            <label for ="cost">Cost </label>
            <input type="text" class="form-control" id="cost" name="cost" value="{{old('cost')}}"/>
          </divcost

          <a href="{{route ('admin.visits.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
