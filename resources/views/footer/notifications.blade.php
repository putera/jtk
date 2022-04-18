@php
    $notification = collect(session()->all())->filter(function($se, $key) {
        return Str::startsWith($key, ['notify-']);
    })->map(function($se, $key) {
        if (is_array($se)) return array_merge(['icon' => str_replace('notify-', '', $key)], $se);
        return ['icon' => str_replace('notify-', '', $key), 'description' => $se];
    })->all();
@endphp

@if ($notification)
<div data-turbo-cache="false">
    @foreach ($notification as $notify)
        <script>setTimeout(() => { window.$wireui.notify(@json($notify)) }, 1000);</script>
        @php session()->forget('notify-' . $notify['icon']) @endphp
    @endforeach
</div>
@endif
