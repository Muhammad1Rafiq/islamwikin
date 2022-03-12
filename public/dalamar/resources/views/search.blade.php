@extends('layout.layout')
@section('content')

<div class="card"><div class="card-body">
    <form action="/search" method="post">
        @csrf
    <label>گەڕان بەپێی</label>
    <div class="myGroup">
    <a class="btn btn-primary" data-parent="#myGroup" data-bs-toggle="collapse" href="#name" role="button" aria-expanded="false" aria-controls="collapseExample">
        ناوی کریاڕ
      </a>
      <a class="btn btn-primary" data-parent="#myGroup" data-bs-toggle="collapse" href="#phone" role="button" aria-expanded="false" aria-controls="collapseExample">
        ژمارەی کریاڕ
      </a>
      <a class="btn btn-primary" data-parent="#myGroup" data-bs-toggle="collapse" href="#driver" role="button" aria-expanded="false" aria-controls="collapseExample">
        شۆفێر
      </a>
      <a class="btn btn-primary" data-parent="#myGroup" data-bs-toggle="collapse" href="#date" role="button" aria-expanded="false" aria-controls="collapseExample">
        بەروار
      </a>
<div class="accordion">
      <div class="collapse" id="name">
        <div class="card col-3 card-body" style="border: 0px !important;">
            <label>ناوی کریاڕ</label>
            <input type="text" class="dateselect" id="name" value="" name="cname">
            <button type="submit" class="btn btn-primary " style="margin-top: 2% !important;">نیشاندان</button>
        </div>
      </div>

      <div class="collapse" id="phone">
        <div class="card col-3 card-body" style="border: 0px !important;">
            <label>ژمارەی کریاڕ</label>
            <input type="text" class="dateselect" id="phone" value="" name="cphone">
            <button type="submit" class="btn btn-primary " style="margin-top: 2% !important;">نیشاندان</button>
        </div>
      </div>

      <div class="collapse" id="driver">
        <div class="card col-3 card-body" style="border: 0px !important;">
            <label> شۆفێر</label>
            <select class="form-control" id="exampleFormControlSelect2" name="driveridf">
                <option value="" selected>شۆفێر هەڵبژێرە</option>
                @foreach ($driverdata as $driver)
                   <option value="{{$driver->driver_id}}">{{$driver->driver_name}}</option>
                @endforeach
              </select>
            <button type="submit" class="btn btn-primary" style="margin-top: 2% !important;">نیشاندان</button>
        </div>
      </div>

      <div class="collapse" id="date">
        <div class="card col-3 card-body" style="border: 0px !important;">
            <label>لە</label>
            <input type="date" value="" class="dateselect"  name="startdate">
            <label>بۆ</label>
            <input type="date" value="" class="dateselect" name="enddate">
            <button type="submit" class="btn btn-primary " style="margin-top: 2% !important;">نیشاندان</button>
        </div>
      </div>
</div>
</div>
    </form>
    </div>
    </div>

<div class="card posts">
    <div class="card-body nav-pills">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ناو</th>
                    <th scope="col">موبایل</th>
                    <th scope="col">جۆر</th>
                    <th scope="col">بڕ</th>
                    <th scope="col">ناونیشان</th>
                    <th scope="col">بەروار</th>
                    <th scope="col">نرخ</th>
                    <th scope="col">ناوی شۆفێر</th>
                    <th scope="col">تێبینی</th>
                    <th scope="col">حاڵەت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selected as $data)

                <tr onclick="window.location='/order/{{$data->order_id}}';">
                    <th scope="row">{{$data->order_id}}</th>
                    <td>{{$data->customer_name}}</td>
                    <td>{{$data->customer_phone}}</td>
                    <td>{{$data->type_name}}</td>
                    <td>{{$data->order_weight}}M</td>
                    <td>{{$data->order_location}}</td>
                    <td>{{$data->order_date}}</td>
                    <td>{{$data->order_price}}$</td>
                    <td>{{$data->driver_name}}</td>
                    <td>{{$data->order_note}}</td>
                    <td>
                        @if ($data->order_done == 1)
                        <span class="badge rounded-pill bg-success">جێبەجێکرا</span>
                        @elseif ($data->order_done == 2)
                        <span class="badge rounded-pill bg-warning text-dark">لەچاوەڕوانیدایە</span>
                        @else
                        <span class="badge rounded-pill bg-dark">هەڵوەشایەوە</span>
                        @endif
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
