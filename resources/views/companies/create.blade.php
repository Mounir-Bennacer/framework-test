
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Apple" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="steve.job@apple.com" >
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="tel" class="form-control" id="website"  placeholder="https://www.apple.com">
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
