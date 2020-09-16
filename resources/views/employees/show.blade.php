
@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="display-2">{{ $employee->first_name . " " . $employee->last_name }} </h2>
<h3>{{ $employee->email }}</h3>
<h3>{{ $employee->phone }}</h3>
<h3>{{ $employee->companies->name }}</h3>
<a href="{{ url('employees') }}">Return</a>

</div>
@endsection
