@extends('layouts.layout-main')
@section('title')
About Users
@endsection

@section('content')

@include('includes.breadcrump', ['url' => 'Aboutpage'])




    @if($user)
        <h2>User Details (ID: {{ $id }})</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>Name</th>
                <th>Father Name</th>
            </tr>
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['fathername'] }}</td>
            </tr>
        </table>
    @else
        <h2>No user found for ID: {{ $id }}</h2>
    @endif
    <p><a href="{{ route('about') }}">Back to all users</a></p>
@endsection
