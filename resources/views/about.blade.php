@extends('layouts.layout-main')
@section('title')About page @endsection
@section('content')
    @include('includes.breadcrump', ['url' => 'Aboutpage'])

    <table border="1" cellpadding="5">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Action</th>
        </tr>
        @foreach ($name as $person)
            <tr>
                <td>{{  $loop->index + 1 }}</td>
                <td>{{ $person['name'] }}</td>
                <td>{{ $person['fathername'] }}</td>
                <td><a href="{{ route('about.show', ['id' => $loop->index + 1]  ) }}">View</a></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
   @parent
    <p>Footer content specific to the About page.This Page is Contain About page data</p>

@endsection
