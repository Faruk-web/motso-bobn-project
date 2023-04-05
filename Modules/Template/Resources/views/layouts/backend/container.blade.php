@push('css')
    <style>
        .page-title-box {
            padding-bottom:0px;
            }
    </style>
@endpush
<div class="container-fluid">

    <!-- start page title -->
    <div class="roW">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="background: linear-gradient(to right, #4877B2 0%, #00A3AA 100%);padding: 1%;">
                <h4 class="mb-sm-0 font-size-22" style="color:#fff;margin-left:17px;font-size:21px !important;">@isset($title) {{$title}} @else slot title @endisset</h4>
                {{-- <h4 class="mb-sm-0 font-size-18 mt-2" style="color:#fff;margin-left:17px;text-decoration: underline dotted purple;">@isset($title) {{$title}} @else slot title @endisset</h4> --}}
                <div class="page-title-right">
                    <ol class="m-0 breadcrumb">
                        @php
                            $auth_name = auth()->user()->name;
                        @endphp
                        @if($auth_name=='Super Admin')
                           
                            <div class="d-flex"style="height:14% !important;">
                                <li class="breadcrumb-item"><a href="{{url('/member')}}" style="  color: #fff;
                                    margin-right:21px;
                                    font-size: 22px !important;!important;"> Dashboard</a></li>
                            </div>
                        @elseif($auth_name=='Admin')
                        
                        <div class="d-flex"style="height:14% !important;">
                            <li class="breadcrumb-item"><a href="{{url('/member')}}" style="  color: #fff;
                                margin-right:21px;
                                font-size: 22px !important;">Dashboard</a></li>
                        </div>
                        @else
                        
                            <div class="d-flex"style="height:14% !important;">
                                <li class="breadcrumb-item"><a href="javascript: void(0);" style="  color: #fff;
                                    margin-right:21px;
                                    font-size: 22px !important;">Dashboard</a></li> 
                            </div>
                        {{-- <li class="breadcrumb-item active mt-2" style="color:#fff;margin-right:20px;">Dashboard</li> --}}
                        @endif
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    {{$slot}}

    <!-- end row -->
</div>
<!-- container-fluid -->
