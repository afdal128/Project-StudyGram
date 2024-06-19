@extends('Layouts.main')
@section('container')
<div class=" row flex-nowrap min-vh-100 p-3" data-bs-theme="light">
    <div class=" bg-primary-subtle " >
        <h2 class="p-3">Aktivitas</h2>
        <div class="">
            @if (isset($notifications))
            <ul class="list-group">
                @foreach ($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $notification }}
                <span class="badge text-bg-primary rounded-pill">1</span>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div> 
@endsection
