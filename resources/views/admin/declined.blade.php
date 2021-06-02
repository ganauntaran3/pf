@extends('layouts.app')

@section('body')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fas fa-thumbs-up"></i></span>
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
                      <h3 class="mb-0">Declined Transaction</h3>
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
                        <tr class="text-center">
                          <th rowspan="2">#</th>
                          <th rowspan="2">Document Type</th>
                          <th rowspan="2">Document Image</th>
                          <th rowspan="2">Fullname</th>
                          <th rowspan="2">Gender</th>
                          <th rowspan="2">Address</th>
                          <th colspan="3">Domicile</th>
                          <th rowspan="2">Email</th>
                          <th rowspan="2">Amount</th>
                          <th rowspan="2">BSC Address</th>
                          <th rowspan="2">Date</th>
                          <th rowspan="2">Action</th>
                        </tr>

                        <tr>
                          <th>Country</th>
                          <th>State</th>
                          <th>City</th>
                        </tr>

                      </thead>
                      <tbody class="mt-5">
                          @foreach ($rgs as $rgs)
                              <tr>
                                  <th>{{ $loop->iteration }}</th>
                                  <td>{{ $rgs->doc_type }}</td>
                                  <td><img id="myImg{{ $rgs->id }}" onclick="showImage(this, {{ $rgs->id }})" src="{{ asset('storage/'. $rgs->doc_name) }}" alt="{{ $rgs->doc_name }}" style="width: 150px"></td>
                                  <td>{{ $rgs->fullname }}</td>
                                  <td>{{ $rgs->gender }}</td>
                                  <td>{{ $rgs->address }}</td>
                                  <td>{{ $rgs->country }}</td>
                                  <td>{{ $rgs->state }}</td>
                                  <td>{{ $rgs->city }}</td>
                                  <td>{{ $rgs->email }}</td>
                                  <td>{{ $rgs->amount }}</td>
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
                    <span id="close-modal" onclick="closeModal()" class="close modal-times">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="modal-img">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption" class="text-center"></div>
                  </div>
              </div>
        </div>
    </div>
</div>

@endsection

