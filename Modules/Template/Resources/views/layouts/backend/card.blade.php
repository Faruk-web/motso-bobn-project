
<div class="card mt-3">
    <div class="card-body">
        @isset($card_title)
        <h5 class="card-title">
            {{ $card_title }}
        </h5>
        @endisset
        @isset($card_header)
        <div class="float-end mb-2">
            {{ $card_header }}
        </div><br>
        @endisset
        <div >
            {{ $slot }}
        </div>
    </div>
</div>
