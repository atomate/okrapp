@extends('layouts.app')
@section('title','Templates')
@section('content')




<div class="container-sm">
<div class="row">
<h1>Companies</h1>
<button type="button" style="width:100px;" class="btn btn-primary btn-sm">Create new</button>
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
    <tr>
      <th scope="row">1</th>
      <td>IBM</td>
      <td><a href="">edit</a> | <a href="/">delete</a></td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>IBM</td>
      <td><a href="">edit</a> | <a href="/">delete</a></td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>IBM</td>
      <td><a href="">edit</a> | <a href="/">delete</a></td>
    </tr>
  </tbody>
</table>

<hr/>
<h1>Create / Edit Company</h1>
<form>
  <div class="form-group">
    <label for="companyName">Company Name</label>
    <input type="text" class="form-control" id="companyName" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
</div>


@endsection
