@extends('layouts.app')
@section('title','Company create')
@section('content')
    <div class="container">
        <h1>Create Company</h1>
        <form action="{{route('company.store')}}" method="post">
            @csrf
            <div class="form-group w-25">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" name="name" id="companyName">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
