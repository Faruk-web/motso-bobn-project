@props(['footer' => null])
<div wire:ignore.self id="{{ $attributes['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade"
    aria-labelledby="{{ $attributes['id'] }}" aria-hidden="true">
    <div
        class="modal-dialog  modal-dialog-{{ $attributes['position'] ? $attributes['position'] : 'centered' }} {{ $attributes['size'] ? 'modal-' . $attributes['size'] : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $attributes['id'] }}">{{ $attributes['title'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="map"></div>
                {{ $slot }}
            </div>
            @if (!isset($attributes['no-footer']))
                <div class="modal-footer">
                    <x-template::button.danger data-bs-dismiss="modal">Close</x-template::button.danger>
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Load the Google Maps API with your API key -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<!-- Initialize the map -->
<script>
  function initMap() {
    // Create a map instance and add it to the modal content
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 37.7749, lng: -122.4194 },
      zoom: 8,
    });
  }
</script>