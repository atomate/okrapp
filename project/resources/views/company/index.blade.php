@extends('layouts.app')
@section('title','Companies')
@section('content')
    <div class="container-sm">
        <div class="row">
            <h1>Companies</h1>
            <div class="col-2">
                <a href="{{route('company.create')}}" type="button" class="btn btn-primary bt-md">Create new</a>
            </div>
        </div>
        <div class="row">

            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{$company->id}}</th>
                        <td><a href="{{route('key-result.show',$company->id)}}">{{$company->name}}</a></td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="{{route('company.edit',$company->id)}}">edit</a>&nbsp;|&nbsp;
                                <form action="{{route('company.destroy',$company->id)}}" method="post" id="my_form">
                                    @csrf
                                    @method('delete')
                                    <button class="button-link" type="submit">delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
