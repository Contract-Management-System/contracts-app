@extends('layouts.app')

@section('title', 'New Contract')
@section('page-title', 'New Contract')
@section('page-breadcrumb', 'Add a contract to your vault')

@section('content')

<form action="{{ route('contracts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('pages.contracts._form')
</form>

@endsection
