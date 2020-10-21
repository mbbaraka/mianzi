@extends('layouts.home')

@section('title', 'Home')

@section('content')

@include('layouts.partials.home.header-default')
@include('home.home.banners')
@include('home.home.by-category')
@include('home.home.categories')
@include('home.home.product-tabs')
@include('home.home.new')
@include('home.home.services')

@endsection