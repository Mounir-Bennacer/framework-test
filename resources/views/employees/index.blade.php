@extends('layouts.app')

@section('content')

<div class="container">
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
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>12122202</td>
          <td>@Apple</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
