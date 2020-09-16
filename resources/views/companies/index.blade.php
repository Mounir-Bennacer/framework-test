@extends('layouts.app')

@section('content')

<div class="container">
<span class="lead">
<a href="{{ url('companies/create') }}" class="badge badge-primary">Add a new company</a>
</span>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Logo</th>
          <th scope="col">Website</th>
          <th scope="col">View</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          <th scope="row">{{$company->id}}</th>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->logo }}</td>
          <td>{{ $company->website }}</td>
          <td>
            <span><a href="companies/{{$company->id}}">View</a></span>
          </td>
          <td>
            <span><a href="companies/{{$company->id}}/edit">Edit</a></span>
          </td>
        <td>
            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
{{ $companies->links() }}
</div>
@endsection
