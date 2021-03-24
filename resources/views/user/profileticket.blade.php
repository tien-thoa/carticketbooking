@extends('layouts.app')
@section('content')
<div class="">
            <div style="width: 1200px; margin-left: auto; margin-right: auto;">   
            <div class="page-title">
              <div class="title_left">
                <h3>Thông tin vé của tôi</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12  ">
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Số vé</th>
                          <th>Đi từ</th>
                          <th>Điểm đến</th>
                          <th>Giá vé</th>
                          <th>Nhà xe</th>
                          <th>Kiểu xe</th>
                          <th>Số chỗ</th>
                          <th>Ngày đi</th>
                          <th>Ngày đến</th>
                          <th>Ảnh xe</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($tickets as $stt => $ticket)
                        <tr>
                          <td scope="row">{{$stt}}</td> 
                          <td>{{$ticket->number}}</td>
                          <td>{{$ticket->awaycome}}</td>
                          <td>{{$ticket->destination}}</td>
                          <td>{{$ticket->price}}</td>
                          <td>{{$ticket->vehicles->garage}}</td>
                          <td>{{$ticket->vehicles->type}}</td>
                          <td>{{$ticket->vehicles->number_of_seats}}</td>
                          <td>{{$ticket->departure_time}}</td>
                          <td>{{$ticket->arrival_time}}</td>
                          <td style="width: 150px;"><img src="{{asset('uploads/image/'. $ticket->vehicles->image)}}" width="150px" height="90px"></td>
                        </tr>
                        @endforeach
                        
                   
                      </tbody>
                    </table>
                    {{Auth::user()->links}}
                  </div>
                
              </div>

              <div class="clearfix"></div>
            </div>
          </div>
          </div>
@endsection