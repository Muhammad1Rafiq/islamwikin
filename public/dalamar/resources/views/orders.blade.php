@extends('layout.layout')
@section('content')

<div class="container">

</div>

<div class="card posts">

    <div class="card-body nav-pills">


        <table class="table table-striped table-hover resizable b-1">
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
                    <td>{{$data->order_time}}</td>
                    <td>{{$data->order_price}}$</td>
                    <td>{{$data->order_note}}</td>
                    <td>
                        @if ($data->order_done == 1)
                        <span class="badge rounded-pill bg-success">جێبەجێکرا</span>
                        @elseif ($data->order_done == 2)
                        <span class="badge rounded-pill bg-warning text-dark">لەچاوەڕوانیدایە</span>
                        @elseif ($data->order_done == 3)
                        <span class="badge rounded-pill bg-primary">لەجێبەجێکردندایە</span>
                        @else
                        <span class="badge rounded-pill bg-dark">هەڵوەشایەوە</span>
                        @endif
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
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






@endsection
