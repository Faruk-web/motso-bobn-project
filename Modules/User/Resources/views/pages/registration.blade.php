<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p>Sign in to continue to {{ config('app.name') }}.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('backend/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="auth-logo">
                    <a href="index.html" class="auth-logo-light">
                        <div class="avatar-md profile-user-wid mb-4">
                            <span class="avatar-title rounded-circle bg-light">
                                <img src="{{ asset('backend/assets/images/logo-light.svg') }}" alt=""
                                    class="rounded-circle" height="34">
                            </span>
                        </div>
                    </a>

                    <a href="index.html" class="auth-logo-dark">
                        <div class="avatar-md profile-user-wid mb-4">
                            <span class="avatar-title rounded-circle bg-light">
                                <img src="{{ asset('backend/assets/images/logo.svg') }}" alt=""
                                    class="rounded-circle" height="34">
                            </span>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <form class="form-horizontal" wire:submit.prevent="register">
                        <div class="mb-3">
                            <x-template::input.text wire:model.defer="name" label="Name" />
                        </div>

                        <div class="mb-3">
                            <x-template::input.text wire:model.defer="email" label="Email" />
                        </div>

                        <div class="mb-3">
                            <x-template::input.password wire:model.defer="password" label="Password" />
                        </div>

                        <div class="mb-3">
                            <x-template::input.password wire:model.defer="password_confirmation"
                                label="Confirm Password" />
                        </div>

                        <div class="mt-3 d-grid">
                            <x-template::button.success class="btn btn-primary waves-effect waves-light" type="submit">
                                Log In</x-template:button.success>
                        </div>

                        <div class="mt-4 text-center">
                            <h5 class="font-size-14 mb-3">Sign in with</h5>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-primary text-white border-primary">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-info text-white border-info">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-danger text-white border-danger">
                                        <i class="mdi mdi-google"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot
                                your password?</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">

            <div>
                <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a>
                </p>
                <p>©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                    Themesbrand
                </p>
            </div>
        </div>

    </div>
</div>
