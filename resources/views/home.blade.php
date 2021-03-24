<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang Chủ</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('/fontend/css/welcome.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
@extends('layouts.app')

@section('content')


        
        <!-- <div class="logo" >
            <a href="{{ url('/') }}">
                <img src="{{asset('/fontend/images/logo.jpg')}}" width="150px" height="50px" >
            </a>
        </div>
         @if (Route::has('login'))
        <div class="top-right links">
        
             @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Đăng ký</a>
                @endif
            @endauth
        </div>
        @endif -->
             
        <div class="flex-center position-ref full-height">
           
           
            <div class="content">
                <!-- <div class="title m-b-md"> -->
                    <div class="full-input border-left border-right">
                   
                        <div class="input-search ">
                        
                        <form method="get"  action="{{ route('search_ticket') }}">
                        @csrf
                            <div class="fl img border-left">
                                <img src="{{asset('/fontend/images/diachi7.jpg')}}" alt="biểu tượng địa chỉ" width="25px" height="30px">
                            </div> 
                            
                            
                            <div class="input-text">
                                <input type="text" class="input-text " name="key1" placeholder="Điểm đi">

                            </div>
                            

                            <!-- <div class="llkIly fl">
                                <svg width="28" height="28" viewBox="0 0 28 28"> 
                                    <g stroke="#0060c4">
                                        <g fill="#fff">
                                            <circle cx="14" cy="14" r="14" stroke="none"></circle>
                                            <circle cx="14" cy="14" r="13.5" fill="none"></circle>
                                        </g>
                                        <path fill="none" stroke-linecap="round" stroke-miterlimit="10" d="M20 10.5H8.5M20.5 10.5L17 7M20.5 10.5L17 14M19.5 17.5H9M8 17.5l3.5-3.5M11.5 21L8 17.5">
                                        </path>
                                    </g>
                                </svg>
                                
                            </div> -->
                            <div class="iQPTej"></div>
                            <div class="fl img">
                                <img src="{{asset('/fontend/images/diachi7.jpg')}}" alt="biểu tượng địa chỉ" width="25px" height="30px">

                            </div>
                            <div class="input-text">
                                <input type="text" class="input-text" name="key2" placeholder="Điểm đến">
                            </div>
                            <div class="iQPTej"></div>
                            <div class="fl img">
                                <img src="{{asset('/fontend/images/date1.jpg')}}" alt="biểu tượng địa chỉ" width="25px" height="30px">

                            </div>

                            <div class="input-text">
                                <input type="text" class="input-text input-date" name="datesearch" placeholder="Ngày đi">
                            </div>
                        </div>
                        
                        <div class="input-submit border-right">
                            <input type="submit" value="TÌM VÉ XE" class="input-submit border-right">
                        </div>
                        <!-- <div class="input-submit border-right" >
                            <button class="input-submit border-right" type="submit">
                                TÌM VÉ XE
                            </button>
                        </div> -->
                        </form>
                        
                    </div>
                    
                    
                
            </div>

        </div>
        <hr class="hr">

        <div class="footer">
            
            
                <div class="footer__logo">
                    <img src="{{asset('/fontend/images/logo.jpg')}}" width="150px" height="50px" >

                </div>
                <div class="footer__gt">
                    LIÊN HỆ VỚI CHÚNG TÔI
                    Datvexe@gmail.com
                </div>

        </div>
    
@endsection
    
    </body>
</html>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 
                </div>
            </div>
        </div>
    </div>
</div> -->

