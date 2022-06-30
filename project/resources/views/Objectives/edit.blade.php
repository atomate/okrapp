@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Objective
                            <a href="{{ route('key-result.show',$objective->company_id) }}" class="btn btn-primary float-end">BACK</a>
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