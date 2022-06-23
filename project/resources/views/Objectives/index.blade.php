@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Objective CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('objectives.create')}}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                    Create new objective</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            
            <th>Name</th>
    
        </tr>
        @foreach ($objectives as $objective)
            <tr>
                <td>{{$objective->name}}</td>
                <td>
                    <form action="{{route('objectives.destroy', $objective->id)}}" method="POST">

                        <a class ="btn btn-info" href="{{route('objectives.show', $objective->id)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>Show
                        </a>

                        <a class="btn btn-primary" href="{{route('objectives.edit', $objective->id)}}">
                            <i class="fas fa-edit  fa-lg"></i>Edit
                        </a>

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit" title ="delete">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $objectives->links() !!}

@endsection
