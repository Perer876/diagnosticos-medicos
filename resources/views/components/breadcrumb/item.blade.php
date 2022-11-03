@props(['href', 'value', 'active' => false])

<li @class(["breadcrumb-item", "active" => $active]) @if($active) aria-current="page" @endif>
@isset($href)
    <a href="{{ $href }}">{{ $value }}</a>
@else
    {{ $value }}
@endisset
</li>
