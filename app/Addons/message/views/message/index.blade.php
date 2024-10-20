@php
    $param = request()->route()->parameter('id');
    $tab = request('tab');
@endphp

<a id="seo" class="nav-link @if ($tab == 'message') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'message']) }}">
    <span class="fi-rr-note-medical"></span>
    <span>{{ get_phrase('Message') }}</span>
</a>
