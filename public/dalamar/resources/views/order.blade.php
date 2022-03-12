@extends('layout.layout')
@section('content')


<div class="card posts">

    <div class="card-body nav-pills">

           <button class="btn btn-primary" id="addfsub" data-bs-toggle="modal" data-bs-target="#addsuborder" type="button">زیادکردن</button>



        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">جۆر</th>
                    <th scope="col">بڕ</th>

                    <th scope="col">بەروار</th>
                    <th scope="col">نرخ</th>
                    <th scope="col">ناوی شۆفێر</th>
                    <th scope="col">تێبینی</th>
                    <th scope="col">تێبینی</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($selected as $data)
<input type="text" id="orderidsub" value="{{$data->order_id}}" hidden>
                <tr onclick="window.location='/order/{{$data->sub_id}}';">
                    <th scope="row">{{$data->sub_id}}</th>
                     <td>{{$data->customer_name}}</td>
                    <td>{{$data->type_name}}</td>
                    <td>{{$data->sub_weight}}M</td>
                    <td>{{$data->sub_price}}$</td>

                    <td>{{$data->sub_date}}</td>

                    <td>{{$data->driver_name}}</td>
                    <td>{{$data->sub_note}}</td>

                </tr>

                @endforeach

            </tbody>
        </table>
        <button class="text-left btn btn-warning">gf</button>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>


    </div>
</div>

<div class="modal fade" id="addsuborder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">جێبەجێکردنی داواکاری</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            <div class="input-group mb-3">
                <span class="input-group-text">بڕ</span>
                <input type="text" class="form-control" placeholder="بڕ بە مەتر" id="subweightform">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" placeholder="نرخ بە دۆلار" id="subpriceform">
            </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">جۆر</span>
                    <select class="form-select" id="subtypeform">
                        <option selected>جۆری چیمەنتۆ هەڵبژێرە...</option>
                        @foreach ($types as $type)
                        <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">شۆفێر</span>
                    <select class="form-select" id="subdriverform">
                        <option selected>شۆفێر هەڵبژێرە...</option>
                        @foreach ($drivers as $driver)
                        <option value="{{$driver->driver_id}}">{{$driver->driver_name}}</option>
                        @endforeach
                        <option value="0">دواتر هەڵیدەبژێرم</option>
                    </select>
                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">داخستن</button>
          <button type="submit" id="submitsub" class="btn btn-primary">زیادکردن</button>
        </div>
    </form>
      </div>
    </div>
  </div>





@endsection
