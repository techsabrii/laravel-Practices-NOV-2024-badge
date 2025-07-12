<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Control Structures & Loops</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; background: #f9f9f9; padding: 30px; }
        h2 { margin-top: 30px; color: #2c3e50; }
        p, li { color: #333; }
    </style>
</head>
<body>

    <h1>Laravel Blade Master Guide</h1>
    @php
   $variable = 'Abdul Basit';
    @endphp
    {{-- VARIABLE DISPLAY --}}
    <h2>Echo / Output</h2>
    <p>{{ 'Hello, Blade!' }} </p>
    <p>{{ $variable ?? 'Default Value' }}</p>

    {{-- RAW OUTPUT --}}
    <h2>Raw Output</h2>
    <p>{!!  '<strong>Bold HTML via Raw Output</strong>' !!}</p>

    {{ '<script> alert()</script>' }}

    {{-- PHP CODE --}}
    <h2>PHP Code Block</h2>
    @php
        $x = 5;
        $y = 10;
        $arr = ['apple', 'banana', 'cherry'];
        $emptyArr = [];
        $role = 'editor';
    @endphp
    <p>Sum: {{ $x + $y }}</p>

    {{-- CONDITIONAL STATEMENTS --}}
    <h2>If / Else</h2>
    @if($x > $y)
        <p>x is greater than y</p>
    @elseif($x == $y)
        <p>x is equal to y</p>
    @else
        <p>x is less than y</p>
    @endif

    <h2>Unless</h2>
    @unless($x > $y)
        <p>x is NOT greater than y</p>
    @endunless

    <h2>Isset</h2>
    @isset($x)
        <p>$x is set</p>
    @endisset

    <h2>Empty</h2>
    @empty($emptyArr)
        <p>$emptyArr is empty</p>
    @endempty

    {{-- AUTH/GUEST --}}
    <h2>Auth / Guest</h2>
    @auth
        <p>You're logged in!</p>
    @endauth

    @guest
        <p>You're a guest!</p>
    @endguest

    {{-- SWITCH --}}
    <h2>Switch</h2>
    @switch($role)
        @case('admin')
            <p>Welcome, Admin</p>
            @break
        @case('editor')
            <p>Welcome, Editor</p>
            @break
        @default
            <p>Welcome, User</p>
    @endswitch

    {{-- LOOPS --}}
    <h2>For Loop</h2>
    @for($i = 0; $i < 3; $i++)
        <p>Loop iteration: {{ $i }}</p>
    @endfor

    <h2>Foreach Loop</h2>
    <ul>
        @foreach($arr as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <h2>Forelse Loop</h2>
    @forelse($emptyArr as $item)
        <p>{{ $item }}</p>
    @empty
        <p>No items found in emptyArr.</p>
    @endforelse

    <h2>While Loop</h2>
    @php $count = 0; @endphp
    @while($count < 2)
        <p>While Count: {{ $count }}</p>
        @php $count++; @endphp
    @endwhile

    {{-- COMMENTS --}}
    <h2>Blade Comments</h2>
    {{-- This is a Blade comment and won't be shown in page source --}}
    <!-- This is an HTML comment and will be visible in source -->

    {{-- LOOP META --}}
    <h2>Loop Meta Variables</h2>
    <ul>
    @foreach($arr as $fruit)
        <li>
            {{ $loop->iteration }} - {{ $fruit }}
            @if($loop->first) (first) @endif
            @if($loop->last) (last) @endif
        </li>
    @endforeach
    </ul>



    {{-- ONCE --}}
    @once
        <p>This will display only once even in loops.</p>
    @endonce

    {{-- ENV CHECK --}}
    @env('local')
        <p>You are in the <strong>local</strong> environment.</p>
    @endenv

    {{-- CONDITIONAL CLASS --}}
    <h2>Conditional Class (Laravel 9+)</h2>
    <p @class(['text-danger' => $x > $y, 'text-success' => $x <= $y])>
        This paragraph has conditional class based on value of x and y.
    </p>

</body>
</html>
