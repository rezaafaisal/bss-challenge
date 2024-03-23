@extends('layouts.master')
@section('page')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Account Settings
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
   @if (session('success'))
      <div class="alert alert-success" role="alert">
         {!! session('success') !!}
      </div>
   @endif
   @if (session('error'))
      <div class="alert alert-danger" role="alert">
         {!! session('error') !!}
      </div>
   @endif

</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                    <div class="card-body">
                        <h4 class="subheader">Business settings</h4>
                        <div class="list-group list-group-transparent">
                            <a href="./settings.html"
                                class="list-group-item list-group-item-action d-flex align-items-center active">My
                                Account</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">My Account</h2>
                        <h3 class="card-title">Profile Details</h3>
                        <div class="row align-items-center">
                            <div class="col-auto">

                              <span class="avatar avatar-xl"
                                    style="background-image: url({{ asset('photo/'.$user->image,) }})">
                              </span>
                            </div>
                            <div class="col-auto">
                                <button class="btn" onclick="pickImage()">
                                    Change avatar
                                </button>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-ghost-danger">
                                    Delete avatar
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('changePhoto') }}" id="form-photo" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input onchange="submitPhoto()" class="d-none" type="file" accept="image/png, image/gif, image/jpeg" name="image"
                                id="photo">
                        </form>

                        <form action="{{ route('update') }}" method="post">
                            @csrf

                            <div class="row mt-4">
                              <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="col-sm-6">
                                    <div class="form-label">Fullname <span class="text-danger">*</span></div>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                                    @error('name')
                                       <span class="invalid-feedback">
                                          {{ $message }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-label">Email <span class="text-danger">*</span></div>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                    @error('email')
                                       <span class="invalid-feedback">
                                          {{ $message }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-label">New Password</div>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                       <span class="invalid-feedback">
                                          {{ $message }}
                                       </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="form-label">Password Confirmation</div>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="#" class="btn">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
   const input = document.getElementById("photo")
    const pickImage = () => {
        input.click()
    }

    const submitPhoto = () =>{
      const form = document.getElementById('form-photo')
      form.submit()
    }

</script>
@endsection
