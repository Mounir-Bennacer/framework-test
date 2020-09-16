
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{url('employees')}}" method="post">
    @csrf
      <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" id="first_name" name="firstname" placeholder="firstname" required>
      </div>
      <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone number">
      </div>
      <div class="form-group">
        <label for="company">Select the company</label>
        <select class="form-control" id="company" >
            @foreach($companies as $company)
          <option value="{{ $company->id }}" name="companies_id">{{ $company->name }}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('_partials.errors')

</div>
@endsection
