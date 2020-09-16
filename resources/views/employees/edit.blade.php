@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('update') }}" method="post">
    @method('PATCH')
    @csrf
      <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $employee->first_name }}" required>
      </div>
      <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->last_name }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" >
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone"  value="{{ $employee->phone }}">
      </div>
      <div class="form-group">
        <label for="company">Select the company</label>
        <select class="form-control" id="company">
            @foreach($companies as $company)
          <option value="{{ $company->id }} {{ $company->id == $employee->companies_id ? 'selected' : '' }}" name="companies_id">{{ $company->name }}</option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('_partials.errors')

</div>
@endsection
