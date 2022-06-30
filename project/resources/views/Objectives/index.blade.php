@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Objective Details
                            <a href="{{ url('objectives/create') }}" class="btn btn-primary float-end">Add Objectives</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($objectives as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->company->name}}</td>
                                    <td>
                                        <a href="{{ url('objectives/'.$item->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        
                                        <a href="{{ url('objectives/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
