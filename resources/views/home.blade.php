
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
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                CARROT PATH
            </div>

            <div class="links">
                <div class="message">Find Volunteering Opportunities Near You</div>
                <input type="search" class="search" style='font-family: Molengo, sans-serif' placeholder="Enter You City or Town..."/>
            </div>
        </div>
    </div>
@endsection
