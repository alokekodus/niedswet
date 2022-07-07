<div class="singleMember">
    <div class="image">
        @if ($item->image != '')
            <img class="thumbnail" src="{{ asset($item->image) }}" alt="{{ $item->name }}">
        @else
            <img class="thumbnail" src="{{ asset('web_assets/images/default/no-image.png') }}" alt="{{ $item->name }}">
        @endif
    </div>
    <div class="details py-3 shadow">
        <p class="text-center fw-bold mb-0">{{ $item->name }}</p>
        <p class="text-center text-12">{{ $item->designation }}</p>
        <div class="socials text-center">
            @if ($item->fb_link != null)
                <a href="{{ $item->fb_link != null ? $item->fb_link : '#' }}"><i
                        class="fa-brands fa-facebook-f"></i></a>
            @endif
            @if ($item->tw_link != null)
                <a href="{{ $item->tw_link != null ? $item->tw_link : '#' }}"><i class="fa-brands fa-twitter"></i></a>
            @endif
            @if ($item->linkedin_link != null)
                <a href="{{ $item->linkedin_link != null ? $item->linkedin_link : '#' }}"><i
                        class="fab fa-linkedin-in"></i></a>
            @endif
            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
        </div>
    </div>
    <img class="view" data-id="{{ Crypt::encrypt($item->id) }}"
        src="{{ asset('web_assets/images/Icons/view.png') }}" alt="view">
</div>
