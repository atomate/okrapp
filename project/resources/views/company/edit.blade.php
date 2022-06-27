@extends('layouts.app')
@section('title','Company edit')
@section('content')
    <div class="container">
        <h1>Edit Company</h1>
        <form action="{{route('company.update',$company->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group w-25">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" name="name" id="companyName" value="{{$company->name}}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
