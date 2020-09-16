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
          <th scope="col">View</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
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
          <td>
            <span><a href="employees/{{$employee->id}}">View</a></span>
          </td>
          <td>
            <span><a href="employees/{{$employee->id}}/edit">Edit</a></span>
          </td>
        <td>
            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
{{ $employees->links() }}
</div>
@endsection
