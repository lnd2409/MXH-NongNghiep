@extends('client.client')
{{-- Sửa title theo cú pháp như sau --}}
@section('title')
    Mạng xã hội nông nghiệp
@endsection
@section('content')

@include('client.template.main')
@include('client.template.project')
@include('client.template.job')
@include('client.template.chatbox')
@endsection