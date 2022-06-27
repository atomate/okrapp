@extends('layouts.app')
@section('title','Create key result')
@section('content')
    <div class="container">
        <h1>Create key result for objective: {{$objective->name}}</h1>
        <form action="{{route('key-result.store')}}" method="post">
            @csrf
            <div class="form-group w-25">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="companyName">Key result title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                <input type="hidden" name="objective_id" value="{{$objective->id}}">
            </div>
            <div class="form-group w-25 mt-2">
                @error('progress')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="progressKeyResult">Progress (1-100)</label>
                <input type="text" class="form-control" name="progress" id="progressKeyResult" value="{{old('progress')}}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
