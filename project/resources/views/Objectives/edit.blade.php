@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('objectives.update',$objective->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$objective->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
          
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Objective
                            <a href="{{ url('objectives') }}" class="btn btn-primary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('objectives/'.$objective->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Select Company</label>
                            <select name="company_id" class="form-control">
                                @foreach ($companies as $item)
                                    <option value="{{ $item->id }}" {{ $objective->company_id == $item->id ? 'selected':'' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>

                            <div class="mb-3">
                                <label>Objective Name</label>
                                <input type="text" name="name" value="{{ $objective->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection