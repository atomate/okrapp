@extends('layouts.app')
@section('title','Key results')
@section('content')
    <div class="container-sm">
        <div class="row">
            <h1>{{$company->name}}</h1>
        </div>
        <hr>
        <div class="row">
            @foreach($objectives as $objective)
                <div class="col-12 d-flex align-items-center">
                    <h1 class="text-center">{{$objective->name}}</h1>
                    <h2 class="text-center mt-1">-{{round($objective->keyResults->avg('progress'))}}%</h2>
                </div>
                <div class="col-12">
                    <ul>
                        @foreach($objective->keyResults as $keyResult)
                            <form action="{{route('key-result.destroy',$keyResult)}}" method="post">
                                @csrf
                                @method('delete')
                                <li>{{$keyResult->title}}, {{$keyResult->progress}}%
                                    <a href="{{route('key-result.edit',$keyResult)}}">edit</a> |
                                    <button type="submit" class="button-link">delete</button>
                                </li>

                            </form>
                        @endforeach
                    </ul>
                    <a href="{{route('key-result.create',$objective)}}">
                        <button class="btn btn-sm btn-primary">Create key result</button>
                    </a>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection
