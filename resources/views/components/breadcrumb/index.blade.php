@props(['slot'])

<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        {{ $slot }}
    </ol>
</nav>
