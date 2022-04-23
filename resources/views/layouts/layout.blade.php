<div>
    @extends('layouts.main')
    @section('main')

    <div class="d-flex">


        <div id="sidebar">
            <nav class="navbar navbar-light navbar-expand-lg" style="box-shadow: 5px 13px 20px -9px rgb(0 0 0 / 15%)">
                <div class="offcanvas offcanvas-start bg-main" style="" tabindex="-1" id="navbarOffcanvasLg"
                    aria-labelledby="navbarOffcanvasLgLabel">
                    <span><img class="m-auto " src="{{asset('img/img.png')}}" alt=""
                            style="display:block; height:7rem !important;" srcset=""></span>
                    <a href="/welcome" class="list-group-item list-group-item-action menu text-dark onoverc"
                        style="background-color: rgb(0,0,0,0) !important;border: 0px !important;">دەستپێک</a>
                    <a href="/last" class="list-group-item list-group-item-action menu text-dark onoverc"
                        style="background-color: rgb(0,0,0,0) !important;border: 0px !important;">دوا بابەت</a>
                    <a href="/random" class="list-group-item list-group-item-action menu text-dark onoverc"
                        style="background-color: rgb(0,0,0,0) !important;border: 0px !important;">بابەت بە هەڕەمەکی</a>
                    <a href="/" class="list-group-item list-group-item-action menu text-dark onoverc"
                        style="background-color: rgb(0,0,0,0) !important;border: 0px !important;">گەڕان</a>

                    <div class="position-absolute bottom-0 start-50 translate-middle-x text-muted hideonpc text-center">

                        <div class="form-switch mb-1">
                            <input type="checkbox" class="form-check-input darkSwitch" id="darkSwitch" />
                        </div>
                        <a href="/welcome" class="list-group-item p-1 text-dark"
                            style="background-color: rgb(0,0,0,0) !important;border: 0px !important;">چوونەژوورەوە</a>

                        <p class="onoverc">ئیسلامــ ــــپیدیا</p>
                    </div>
                </div>
            </nav>
        </div>

        <div id="main" class="navbar-expand-lg">
            <div id="topbar" class="">
                <nav class="navbar navbar-expand-lg navbar-light bg-main" style="padding-top: 0px">
                    <div class="container-fluid d-inline" style="width: 100%">
                        <div class="d-flex bd-highlight">

                            <i class="navbar-toggler togglebtn" class="btn btn-primary btn-sm text-dark m-auto"
                                data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg"
                                aria-controls="navbarOffcanvasLg" id="presetbtn" >
                                <span class="navbar-toggler-icon "></span>
                            </i>

                            <div class=" flex-fill bd-highlight m-auto">
                                <a class="text-dark m-auto onoverc h2" href="/">ئیسلامــــــپیدیا</a>
                            </div>

                            <div class=" flex-fill bd-highlight bg-main" dir="ltr">
                                <div class="p-2 container">
                                    <div class="row hideonmobile">
                                        <button
                                            class="col-md-auto m-1 btn btn-outline-light btn-sm text-dark hideonmobile">چوونەژوورەوە</button>
                                        <button class="m-1 col-md-auto btn btn-primary btn-sm text-light" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg"
                                            aria-controls="navbarOffcanvasLg" id="presetbtn">بەشەکان</button>
                                        <div class="col-md-auto form-switch mt-1">
                                            <input type="checkbox" class="form-check-input darkSwitch"
                                                id="darkSwitch" />
                                        </div>
                                        
                                    </div>
                                    <div class="icon hideonpc my-auto">
                                        <a href="/" class="bi bi-search text-dark m-auto"></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </nav>
            </div>

            <div style="border-radius: 5px" class="card bg-light" id="body">
                <div class="card-body">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    @endsection

</div>