@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @foreach ($companies as $company)
    <div class="col-md-4">
  
      <div class="card">
        <div class="card-body">
          <h4>{{ $company->name }}</h4>
          @if (count($company->objectives) > 0)
          <ul>
            @foreach ($company->objectives as $item)
            <li>{{ $item->name }}</li>
            @endforeach
          </ul>
          @else 
            No product
          @endif
        </div>
      </div>
    </div>
    
    @endforeach
  </div>
</div>

@endsection