@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('companies/'. $company->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" value="{{ $company->name }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" value="{{ $company->email }}" >
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="tel" class="form-control" id="website"  value="{{ $company->website }}">
      </div>
      <div class="form-group">
        <label for="logo">Please upload a logo</label>
        <input type="file" class="form-control-file" id="logo">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('_partials.errors')

</div>
@endsection