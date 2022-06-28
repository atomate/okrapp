@extends('layouts.app')
@section('title','Edit key result')
@section('content')
    <div class="container">
        <h1>Edit key result</h1>
        <form action="{{route('key-result.update',$keyResult)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group w-25">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="companyName">Key result title</label>
                <input type="text" class="form-control" name="title" value="{{$keyResult->title}}">
            </div>
            <div class="form-group w-25 mt-2">
                @error('progress')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="progressKeyResult">Progress (1-100)</label>
                <input type="text" class="form-control" name="progress" id="progressKeyResult" value="{{$keyResult->progress}}">
            </div>
            <input type="hidden" value="{{$keyResult->id}}" name="keyResult_id">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
