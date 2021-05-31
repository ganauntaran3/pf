@extends('layouts.app')

@section('body')

    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fas fa-thumbs-up"></i></span>
                <span class="alert-text">{{ session('message') }}</span>
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
                    <div class="col-6 text-right">
                        <a class="btn btn-icon btn-primary text-white" href="{{ url('admin/export') }}">
                            <span class="btn-inner--icon"><i class="fas fa-file-export"></i></span>
                            <span class="btn-inner--text">Export</span>
                          </a>
                    </div>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="mt-5">
                        @foreach ($rgs as $rgs)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $rgs->doc_type }}</td>
                                <td><img id="table-img" src="{{ asset('storage/'. $rgs->doc_name) }}" alt="" style="width: 150px"></td>
                                <td>{{ $rgs->fullname }}</td>
                                <td>{{ $rgs->gender }}</td>
                                <td>{{ $rgs->address }}</td>
                                <td>{{ $rgs->email }}</td>
                                <td>{{ $rgs->country }}</td>
                                <td>{{ $rgs->state }}</td>
                                <td>{{ $rgs->city }}</td>
                                <td>{{ $rgs->bsc_address }}</td>
                                <td>{{ $rgs->created_at }}</td>
                                <td class="table-actions">
                                        <a onclick="return status('Are you sure want to decline this data registration?')" href="admin/decline/{{ $rgs->id }}" class="btn btn-icon btn-danger">
                                                <span class="btn-inner--icon"><i class="fas fa-times text-white"></i></span>
                                                <span class="btn-inner--text text-white">Decline</span>
                                        </a>
                                        <a href="admin/accept/{{ $rgs->id }}" class="btn btn-icon btn-success" >
                                                <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                                                <span class="btn-inner--text text-white">Accept</span>
                                        </a>
                                  </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

                <div id="myModal" class="modal-table">

                    <!-- The Close Button -->
                    <span class="close modal-times">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="modal-img">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption"></div>
                  </div>

              </div>
        </div>
    </div>

@endsection

