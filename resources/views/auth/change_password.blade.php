@extends("../layouts/auth")

@section("title", "Login")

@section('main')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
            </div>
            <form class="user" action="/postChangePassword" method="post">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="old_password" placeholder="Password Lama">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="new_password" placeholder="Password Baru">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="conf_password" placeholder="Konfirmasi Password">
                </div>
                {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Change Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection