@slot('title')
    Login
@endslot
<div>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xl-9">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                        <div class="bg-overlay"></div>
                        <div class="d-flex h-100 flex-column">
                            <div class="p-4 mt-auto">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="text-center">
                                            <h4 class="mb-3">
                                                <i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i>
                                                <span class="text-primary">5k</span>+ Satisfied clients
                                            </h4>
                                            <div dir="ltr">
                                                <div class="owl-carousel owl-theme auth-review-carousel"
                                                    id="auth-review-carousel">
                                                    <div class="item">
                                                        <div class="py-3">
                                                            <p class="font-size-16 mb-4">" Fantastic theme with a ton of
                                                                options. If you just want the HTML to integrate with
                                                                your project, then this is the package. You can find the
                                                                files in the 'dist' folder...no need to install git and
                                                                all the other stuff the documentation talks about. "</p>

                                                            <div>
                                                                <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                <p class="font-size-14 mb-0">- Skote User</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="py-3">
                                                            <p class="font-size-16 mb-4">" If Every Vendor on Envato are
                                                                as supportive as Themesbrand, Development with be a nice
                                                                experience. You guys are Wonderful. Keep us the good
                                                                work. "</p>

                                                            <div>
                                                                <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                <p class="font-size-14 mb-0">- Skote User</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <div class="d-flex flex-column h-100">
                            <div class="mb-4">
                                <a href="{{ routeHome() }}" class="d-block auth-logo">
                                    <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" height="30"
                                        class="auth-logo-dark">
                                    <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" height="30"
                                        class="auth-logo-light">
                                </a>
                            </div>
                            <div class="my-auto">

                                <div>
                                    <h5 class="text-primary">Create New Password</h5>
                                    {{-- <p class="text-muted">Get your free Skote account now.</p> --}}
                                </div>

                                <div class="mt-4">
                                    <form class="needs-validation" wire:submit.prevent="login">

                                        <div class="mb-3">
                                            <x-template::input.password wire:model.defer="password" label="New Password" />
                                        </div>
                                        <div class="mb-3">
                                            <x-template::input.password wire:model.defer="password" label="Confirm Password" />
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <x-template::button.success class="btn btn-primary waves-effect waves-light"
                                                type="submit">
                                                Create Password
                                                </x-template:button.success>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{ config('app.name')}}.</p>
                                <p><a href="https://www.leotechbd.com/">Poward by {{ config('app.name') }}</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
