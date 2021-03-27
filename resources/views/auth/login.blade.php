@extends("../layouts/auth")

@section("title", "Login")

@section('main')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login</h1>
            </div>
            <form class="user" action="/postLogin" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                        name="nis" placeholder="Masukkan NIS">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="password" placeholder="Masukkan Password">
                </div>
                {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
                @if(session('message'))
                <div class="alert alert-danger mt-4 mb-0" role="alert">
                    {{ session('message') }}
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection