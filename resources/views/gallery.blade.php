

@extends('layouts.layout-main')
@section('title')About Page @endsection
@section('content')



@include('includes.breadcrump', ['url' => 'Gallery']);


<h1>Gallery Page</h1>


<button onclick="showAlert()">Click Me</button>
<button onclick="showAlertSuccess()">Click Me</button>
<button onclick="showAlerterror()">Click Me</button>
<button onclick="showAlertWarning()">Click Me</button>
<button onclick="showAlertWarningWithImage()">Click Me</button>

@endsection
@push('alerts')
<!-- SweetAlert2 CDN -->
 @include('alerts.welcome')


@endpush


