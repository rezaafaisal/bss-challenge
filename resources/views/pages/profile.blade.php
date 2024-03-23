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
                            <div class="col-auto"><span class="avatar avatar-xl"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
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

                        <form action="" method="post">
                            @csrf

                        </form>


                        <div class="row mt-4">

                            <input class="d-none" type="file" accept="image/png, image/gif, image/jpeg" name=""
                                id="avatar">
                            <div class="col-sm-6">
                                <div class="form-label">Fullname <span class="text-danger">*</span></div>
                                <input type="text" class="form-control" value="Tabler">
                            </div>
                        </div>
                        <div class="row mt-4">
                           <div class="col-sm-6">
                              <div class="form-label">Email <span class="text-danger">*</span></div>
                              <input type="email" class="form-control" value="paweluna@howstuffworks.com">
                           </div>
                        </div>
                        <div class="row mt-4">
                           <div class="col-sm-6">
                              <div class="form-label">New Password</div>
                              <input type="password" class="form-control">
                           </div>
                        </div>
                        <div class="row mt-4">
                           <div class="col-sm-6">
                              <div class="form-label">Password Confirmation</div>
                              <input type="password" class="form-control">
                           </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn">
                                Cancel
                            </a>
                            <a href="#" class="btn btn-primary">
                                Submit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const pickImage = () => {
        const input = document.getElementById("avatar")
        input.click()
    }

</script>
@endsection
