@extends('layouts.app')

@section('content')
    <h2>こんにちは、{{$user->name}} さん</h2>

    <x-point-stage :user="$user" />
@endsection
