@extends('layouts.layout')
@section('content')
<div class="col-12">


    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Success!</strong> {{session('message')}} </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        @foreach ($errors->all() as $error)
        <span class="alert-text"><strong>Danger!</strong> {{ $error }} <br/></span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card-wrapper">
     <!-- Default browser form validation -->
        <div class="card">
    <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Browser defaults</h3>
        </div>
    <!-- Card body -->
        <div class="card-body">

        <form method="POST" id="gopegi-form" action="{{ route('post.form') }}" enctype="multipart/form-data">

        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="form-control-label mt-1 mb-3">File Type</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="passport" value="Passport" name="doc_type" class="custom-control-input">
                    <label class="custom-control-label" for="passport"> Passport </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="national_id" value="National ID" name="doc_type" class="custom-control-input" >
                    <label class="custom-control-label" for="national_id"> National ID </label>
                </div>
                <label id="error-doctype"></label>
            </div>

            <div class="form-group col-md-8">
                <label class="form-control-label" for="doc_name">Upload your Passport/National ID</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="doc_name" lang="en" name="doc_name">
                    <label class="custom-file-label" for="doc_name">Select file</label>
                </div>
                <label id="error-docname"></label>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label class="form-control-label mt-2 mb-3">Gender</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
                    <label class="custom-control-label" for="male"> Mr. </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
                    <label class="custom-control-label" for="female"> Mrs. </label>
                </div> <br>
                <label id="error-gender"></label>
            </div>

            <div class="col-md-8 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="fullname">Fullname</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Enter your fullname" name="fullname">
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" >
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="address">Full Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" >
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="country">Country</label>
                    <input type="text" class="form-control typehead" id="country" name="country" placeholder="Enter your country" >
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="state">State</label>
                    <input type="text" class="form-control typehead" id="state" name="state" placeholder="Enter your state" >
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label class="form-control-label" for="city">City</label>
                    <input type="text" class="form-control typehead" id="city" name="city" placeholder="Enter your city" >
                </div>
            </div>

        </div>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <div class="form-group">
            <label class="form-control-label" for="bsc_address">BSC Address</label>
            <input type="text" class="form-control" id="bsc_address" name="bsc_address" placeholder="Enter a BSC Address" >
          </div>
        </div>
      </div>

      <div id="cta" class="d-flex flex-row align-items-center justify-content-end">
          <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>

@endsection
