@push('css')
    <style>
       .avatar-md {
        height: 4.5rem!important;
        width: 13.5rem!important;
        }
        .profile-user-wid {
            margin-top:6px!important;
            }
            .card-body {
            padding: 1.25rem 7.25rem!important;
            }
    </style>
@endpush
<div>
    <x-slot name="title"> User Profile </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> User Profile </x-slot>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back!</h5>
                                </div>
                                <div class="col-sm-2 mt-6">
                                    <div class="avatar-md profile-user-wid mb-0 m-3">
                                        @if ($profile_picture)
                                            <img src="{{ $profile_picture->temporaryUrl() }}" alt="" class="img-thumbnail rounded-circle">
                                        @elseif ($profile_picture_pre)
                                            <img src="{{ asset('storage/' . $profile_picture_pre) }}" alt="" class="img-thumbnail rounded-circle">
                                        @endif
                                        <x-template::input.file wire:model.defer="profile_picture" label="Profile Photo" />
                                        {{-- <img src="{{ asset('storage/' . $users->profile_picture) }}" alt=""
                                            class="img-thumbnail rounded-circle"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 align-self-end">
                                <img src="{{ asset('backend/images/profile-img.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div> 
                    </div>
                </div>
                </div>
            </div>
        </div>
        
            <div class="card-body">
                <h4 class="card-title mb-4" style="background-color: rgb(154, 184, 184)">Personal Information</h4>

                <p class="text-muted mb-4">Fish tend to be more active during cloudy weather conditions rather than on a sunny day.</p>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{ $users->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile :</th>
                                <td>{{ $users->mobile }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{ $users->email }}</td>
                            </tr>
                            {{-- <tr>
                                <th scope="row">Branch :</th>
                                <td>{{ $user_branch->name }}</td>
                            </tr> --}}
                            <tr>
                                <th scope="row">Date :</th>
                                <td>{{ $users->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <x-template::button.success wire:click="userUpdate" wire:target='userUpdate' class="mt-3 fa fa-edit">
                        Update
                    </x-template::button.success>
            </div>
        
    </x-template::backend.container>
</div>
