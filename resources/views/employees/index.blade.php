@extends('layouts.app')

@section('content')

<div class="container">
<span class="lead">
<a href="{{ url('employees/create') }}" class="badge badge-primary">Add new employee</a>
</span>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Firstame</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Company</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $employee)
        <tr>
          <th scope="row">{{$employee->id}}</th>
          <td>{{ $employee->first_name }}</td>
          <td>{{ $employee->last_name }}</td>
          <td>{{ $employee->email }}</td>
          <td>{{ $employee->phone }}</td>
          <td>{{ $employee->companies->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
{{ $employees->links() }}
</div>
@endsection
