{{--
    PAGE: pages/home/index.blade.php
    Sections (each in a separate partial — add/remove freely):
      1. hero
      2. features
      3. how-it-works
      4. cta
--}}

@extends('layouts.public')

@section('title', 'Contract Tracking Made Simple')
@section('meta_description', 'Track, manage, and never miss a contract deadline. ContractVault is the professional contract management platform for modern teams.')

@section('content')

    @include('pages.home.sections.hero')
    @include('pages.home.sections.features')
    @include('pages.home.sections.how-it-works')
    @include('pages.home.sections.cta')

@endsection
