@extends('layouts.layout-main')
@section('title')Home Page @endsection

@section('content',)
@include('includes.breadcrump', ['url' => 'Welcome page'])

<h1>Welcome to home</h1>
<h2 id="welcome-message">Welcome bro</h2>

<!-- Table to display students -->
<table border="1" cellpadding="10" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
        </tr>
    </thead>
    <tbody id="students-table-body">
        <!-- JS will fill this -->
    </tbody>
</table>

@php
    $username = 'Abdul Basit';
    $students = ['Ahsan Ali', 'Komal Noor', 'Zain Ahmed', 'Sana Khan'];
@endphp

<script>
    var username = @json($username);
    document.getElementById('welcome-message').textContent = 'Welcome, ' + username;

    var students = @json($students);
    var tableBody = document.getElementById('students-table-body');

    students.forEach(function(name, index) {
        let row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${name}</td>
        `;
        tableBody.appendChild(row);
    });
</script>
@endsection
