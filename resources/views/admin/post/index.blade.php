@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Sub Category DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Sub Categoris</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Sub_Category</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                            @foreach ($data as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->category->category_name}}</td>
                                    <td>{{$row->subcategory->name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->post_date}}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    <td>
                                        <a href="{{route('sub_category.edit', $row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{route('sub_category.delete', $row->id)}}" class="btn btn-sm btn-danger button">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                  </tbody>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
@endsection
