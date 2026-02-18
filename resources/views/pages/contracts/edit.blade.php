@extends('layouts.app')

@section('title', 'Edit — ' . $contract->title)
@section('page-title', 'Edit Contract')
@section('page-breadcrumb', $contract->title)

@section('content')

<form action="{{ route('contracts.update', $contract) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('pages.contracts._form')
</form>

@endsection
