@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="display-2">{{ $company->name }} </h2>
<img src="{{ Storage::disk()->url($company->logo) }}" alt="{{ $company->name }}" class="img-thumbnail img-fluid rounded img-thumb-1">
<h3><a href="{{ $company->email }}">{{ $company->email }}</a></h3>
<h5><a href="{{ $company->website }}"></a></h5>
<a href="{{ url('companies') }}">Return</a>

</div>
@endsection
