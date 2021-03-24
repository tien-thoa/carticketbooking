<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CreateVehicles</title>

        <!-- Fonts -->
      

        <!-- Styles -->
        
        </head>
</html>
@extends('layouts.admin')
@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tạo xe') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('vehicles.createupdate')}}" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                        <div class="alert-success" role="alert">
                        {{session('success')}}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert-danger" role="alert">
                        {{session('error')}}
                        </div>
                        @endif
                        <br>
                        <div class="form-group row">
                            <label for="garage" class="col-md-4 col-form-label text-md-right">{{ __('Nhà xe') }}</label>

                            <div class="col-md-6">
                                <input id="garage" type="text" class="form-control @error('garage') is-invalid @enderror" name="garage"  required autocomplete="garage" autofocus>

                                @error('garage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Loại xe') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type"  required autocomplete="type">

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_of_seats" class="col-md-4 col-form-label text-md-right">{{ __('Số chỗ') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_seats" type="text" class="form-control @error('number_of_seats') is-invalid @enderror" name="number_of_seats"  required autocomplete="number_of_seats" autofocus>

                                @error('number_of_seats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div >
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Ảnh xe') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" name="image"  required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row mb-0" style="margin-left: 130px;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tạo') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection