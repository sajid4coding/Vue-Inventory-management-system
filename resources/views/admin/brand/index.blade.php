@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brand list</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Brand List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10 offset-1">
            {{-- for flash message --}}
            @include('flash::message')
            {{-- card --}}
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Brand List</h5> <br>

                <a href="{{ route('brands.create') }}" 
                  class="btn btn-success btn-sm mb-2 mt-2">
                  <i class="fa fa-plus"></i> Create
                </a>

                <table class="table table-bordered datatable">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($brands as $key => $brand)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-info">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('brands.show', $brand->id) }}"  class="btn btn-success m-2">
                                  <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-danger sweet-alert-delete" data-form-id="brand-delete-{{ $brand->id }}">
                                  <i class="fa fa-trash"></i>
                                </a>
                                <form id="brand-delete-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection