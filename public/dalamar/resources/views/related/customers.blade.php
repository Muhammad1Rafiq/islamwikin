@extends('layout.layout')
@section('content')

<div class="container">

</div>

<div class="card posts">

    <div class="card-body nav-pills">

<label for="">کلیک بکە بۆ بینینی داواکارییەکان<br>دەبڵ کلیک بکە بۆ دەستکاریکردنی زانیاریەکان</label>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ناو</th>
                    <th scope="col">موبایل</th>
                    <th scope="col">ژ. داواکارییەکان</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)

                <tr data-bs-toggle="modal" data-bs-target="#exampleModal" ondblclick="window.location='/customers/{{$datas->customer_id}}'">
                    <th scope="row">{{$datas->customer_id}}</th>
                    <td>{{$datas->customer_name}}</td>
                    <td>{{$datas->customer_phone}}</td>
                    <td>بەم زووانە</td>
                </tr>

                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

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
