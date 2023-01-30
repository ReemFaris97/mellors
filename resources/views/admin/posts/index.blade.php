@extends('admin.layout.app')

@section('title')
  All Posts
@endsection
@section('content')
    <x-data-table  :dataTable="$dataTable" title="index posts" />
@endsection
