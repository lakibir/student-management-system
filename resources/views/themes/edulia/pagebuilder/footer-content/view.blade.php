@php
    $generalSetting = generalSetting();
@endphp
<div class="footer-item">
    <a href='{{ url('/') }}' class="footer-item-logo" style="display:inline-block; overflow:visible; line-height:1;">
        <img src="{{ asset('public/backEnd/img/logo.png') }}" alt="" style="display:block; width:auto; height:auto; max-width:220px; max-height:none; object-fit:contain;">
    </a>
    <p style="color: {{ pagesetting('footer-content-bg-color') }}">
        {!! pagesetting('footer-right-content-text') !!}
    </p>
</div>
