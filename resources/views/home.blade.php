
@extends('layouts.master')
@section('title')
    CARROT PATH
@endsection

@section('meta')
    <meta name="robots" contents="follow, index">
@endsection

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
@endsection

@section('content')
    @include('layouts.nav')
    <div class="flex-center position-ref full-height">
        <div class="contentt">
            <div class="title m-b-md">
                CARROT PATH
            </div>

            <div class="links">
                <div class="message">Find Volunteering Opportunities Near You</div>
                <form method="POST" action='/query' class="form-inline">
                <input type="search" class="search" name="zip" style='font-family: Molengo, sans-serif' placeholder="Enter You City or Town..."/>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
