@extends('layouts.app')
 
@section('title', 'Data Category')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('category.add') }}" class="btn btn-primary mb-3">Add Category</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($category as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->name }}</td>
                <td>
                  <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('category.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection