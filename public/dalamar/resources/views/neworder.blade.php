@extends('layout.layout')
@section('content')
<div class="card col-6 mx-auto ">
    <div class="card-body row">
        <form action="" method="POST">
            <div class="col-9 mx-auto">
                <h2>زیادکردنی داواکاری</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">بڕ</span>
                    <input type="text" class="form-control" id="weight" placeholder="بڕی چیمەنتۆ بە مەتر"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">جۆر</span>
                    <select class="form-select" id="type">
                        <option value="." selected>جۆری چیمەنتۆ هەڵبژێرە...</option>
                        @foreach ($types as $type)
                        <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" placeholder="نرخ بە دۆلار" id="price">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">ناونیشان</span>
                    <input type="text" class="form-control" placeholder="ناونیشانی داواکار بەتەواوی" id="location">
                </div>

<label id="nocustomer" class="mb-2">داواکار بونی نیە، لێرە ناوی سیانی و ژمارەکەی بنوسە و زیادی بکە بۆ داتابەیس</label>
                <div class="input-group mb-3 ">
                    <span class="input-group-text">مۆبایل</span>
                    <input type="text" class="form-control" id="customerphone" placeholder="ژمارە موبایلی داواکار">
                    <button class="btn btn-outline-warning" id="checkisav" type="button">دڵنیابوونەوە</button>

                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text">ناوی داواکار</span>
                    <input type="text" class="form-control" id="customername" placeholder="ناوی سیانی داواکار">
                    <button class="btn btn-outline-primary d-none" id="addcustomertodt" type="button">زیادکردن</button>

                </div>
                <label class="mb-2" id="customeraddstatus"></label>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">شۆفێر</span>
                    <select class="form-select" id="driver">
                        <option value="." selected>شۆفێر هەڵبژێرە...</option>
                        @foreach ($drivers as $driver)
                        <option value="{{$driver->driver_id}}">{{$driver->driver_name}}</option>
                        @endforeach
                        <option value="0">دواتر هەڵیدەبژێرم</option>
                    </select>
                </div>
                <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" id="sendorder" type="button">ناردنی داواکاری</button>
                <label class="" id="afterbuttonl" ></label>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
