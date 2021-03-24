<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CreateTicket</title>

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
                <div class="card-header">{{ __('Tạo vé') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('ticket.createupdate')}}">
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Số vé') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number"  required autocomplete="number" autofocus>

                                @error('mumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vehicles_id" class="col-md-4 col-form-label text-md-right">{{ __('ID Vehicles') }}</label>
                            <div class="col-md-6">
                            <select name="vehicles_id" id="vehicles_id" class="form-control @error('vehicles_id') is-invalid @enderror">
                            @foreach ($vehicles as $vehicles)
                            <option value="{{$vehicles->id}}">{{$vehicles->id}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="awaycome" class="col-md-4 col-form-label text-md-right">{{ __('Đi từ') }}</label>

                            <div class="col-md-6">
                                <input id="awaycome" type="awaycome" class="form-control @error('email') is-invalid @enderror" name="awaycome"  required autocomplete="awaycome">

                                @error('awaycome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="destination" class="col-md-4 col-form-label text-md-right">{{ __('Điểm đến') }}</label>

                            <div class="col-md-6">
                                <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination"  required autocomplete="destination" autofocus>

                                @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departure_time" class="col-md-4 col-form-label text-md-right">{{ __('Ngày đi') }}</label>

                            <div class="col-md-6">
                                <input id="departure_time" type="datetime-local" class="form-control @error('departure_time') is-invalid @enderror" name="departure_time"  required autocomplete="departure_time" autofocus>

                                @error('departure_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="arrival_time" class="col-md-4 col-form-label text-md-right">{{ __('Ngày đến') }}</label>

                            <div class="col-md-6">
                                <input id="arrival_time" type="datetime-local" class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time"  required autocomplete="arrival_time" autofocus>

                                @error('arrival_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Giá vé') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"  required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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