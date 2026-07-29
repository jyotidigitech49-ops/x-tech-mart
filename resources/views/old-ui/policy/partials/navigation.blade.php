@php
    $policyLinks = [
        ['label' => 'Privacy Policy', 'url' => url('/privacy-policy'), 'active' => request()->is('privacy-policy')],
        ['label' => 'Terms & Conditions', 'url' => url('/policy/terms-conditions'), 'active' => request()->is('policy/terms-conditions')],
        ['label' => 'Website Disclaimer', 'url' => url('/policy/disclaimer'), 'active' => request()->is('policy/disclaimer')],
        ['label' => 'Trademark Disclaimer', 'url' => url('/policy/trademark-disclaimer'), 'active' => request()->is('policy/trademark-disclaimer')],
        ['label' => 'Cookie Policy', 'url' => url('/policy/cookie-policy'), 'active' => request()->is('policy/cookie-policy')],
        ['label' => 'Quote Request Policy', 'url' => url('/policy/quote-request-policy'), 'active' => request()->is('policy/quote-request-policy')],
        ['label' => 'Product Information Disclaimer', 'url' => url('/policy/product-information-disclaimer'), 'active' => request()->is('policy/product-information-disclaimer')],
        ['label' => 'DMCA Copyright Policy', 'url' => url('/policy/dmca-copyright-policy'), 'active' => request()->is('policy/dmca-copyright-policy')],
        ['label' => 'Warranty & Manufacturer Responsibility', 'url' => url('/policy/warranty-manufacturer-responsibility'), 'active' => request()->is('policy/warranty-manufacturer-responsibility')],
    ];
@endphp

<aside class="policy-nav" aria-label="Legal and policy pages">
    <div class="policy-nav__heading">
        <span class="policy-nav__icon" aria-hidden="true"><i class="icon-book-open"></i></span>
        <div>
            <span>Legal center</span>
            <h2>Policies & Information</h2>
        </div>
    </div>

    <nav class="policy-nav__links">
        @foreach ($policyLinks as $link)
            <a href="{{ $link['url'] }}" @class(['is-active' => $link['active']]) @if ($link['active']) aria-current="page" @endif>
                <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                {{ $link['label'] }}
                <i class="icon-arrow-right" aria-hidden="true"></i>
            </a>
        @endforeach
    </nav>

    <div class="policy-nav__help">
        <strong>Need more help?</strong>
        <p>Contact us if you have a question about these policies.</p>
        <a href="{{ url('/contact-us') }}">Contact Us <i class="icon-arrow-right"></i></a>
    </div>
</aside>
