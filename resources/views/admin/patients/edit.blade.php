@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="class-header">
                    Edit Patient
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <li>{{$errors}}</li>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors)
                            <li>{{$errors}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('admin.patients.update',$patient->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$patient->user->name)}}" />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email',$patient->user->email)}}" />
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number',$patient->user->phone_number)}}" />
                        </div>

                        <div class="form-group">
                            <label for="postal_address">Postal address</label>
                            <input type="text" class="form-control" id="postal_address" name="postal_address" value="{{old('postal_address',$patient->user->postal_address)}}" />
                        </div>


                        <div class="form-group">
                            <label for="insurance">insurance</label>
                            <input type="text" class="form-control" id="insurance" name="insurance" value="{{old('insurance',$patient->insurance)}}" />
                        </div>

                        <div class="form-group">

                            <label for="policy_num">policy number</label>
                            <input type="text" class="form-control" id="policy_num" name="policy_num" value="{{old('policy_num',$patient->policy_num)}}" />
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{old('password',$patient->user->password)}}" />
                        </div>

                        <div class="form-group">
                            <a href="{{route('admin.patients.index')}}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
