@extends('layouts.app')

@section('body')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Success!</strong> {{session('message')}} </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="mb-0">User</h3>
                    </div>
                    {{-- <div class="col-6 text-right">
                        <a class="btn btn-icon btn-primary text-white" href="{{ url('admin/product-create') }}">
                            <span class="btn-inner--icon"><i class="fas fa-plus-square"></i></span>
                            <span class="btn-inner--text">Add New Product</span>
                          </a>
                    </div> --}}
                  </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-striped" id="datatable-buttons">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Document Type</th>
                        <th>Document Image</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>BSC Address</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody class="mt-5">
                        @foreach ($rgs as $rgs)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $rgs->doc_type }}</td>
                                <td><img src="{{ asset('storage/'. $rgs->doc_name) }}" alt="" style="width: 150px"></td>
                                <td>{{ $rgs->fullname }}</td>
                                <td>{{ $rgs->gender }}</td>
                                <td>{{ $rgs->address }}</td>
                                <td>{{ $rgs->email }}</td>
                                <td>{{ $rgs->country }}</td>
                                <td>{{ $rgs->state }}</td>
                                <td>{{ $rgs->city }}</td>
                                <td>{{ $rgs->bsc_address }}</td>
                                <td>{{ $rgs->created_at }}</td>
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
