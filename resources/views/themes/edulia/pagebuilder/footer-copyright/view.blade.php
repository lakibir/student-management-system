<div class="footer_copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="footer_copyright_inner">
                    {{ pagesetting('footer-copy-right-text') }}
                </div>
            </div>
            <div class="col-md-4 text-end">
                <nav>
                    <ul class='footer_copyright_social'>
                        @if (!empty(pagesetting('footer-social-icons')))
                            @foreach (pagesetting('footer-social-icons') as $socialIcon)
                                @php
                                    // Map legacy Twitter class to X and use white SVG fallback when applicable
                                    $iconClass = str_replace('fa-twitter', 'fa-x-twitter', gv($socialIcon, 'footer-social-icon-class'));
                                    $isX = strpos($iconClass, 'fa-x-twitter') !== false;
                                @endphp
                                <li class='footer_copyright_social_list'>
                                    <a href="{{ gv($socialIcon, 'footer-social-icon-url') }}" target='_blank' class='footer_copyright_social_list_link'>
                                        @if($isX)
                                            <img src="{{ asset('public/backEnd/img/x-twitter.svg') }}" alt="X" style="width:16px; height:16px;">
                                        @else
                                            <i class="{{ $iconClass }}"></i>
                                        @endif
                                        {{ gv($socialIcon, 'footer-social-label') }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>