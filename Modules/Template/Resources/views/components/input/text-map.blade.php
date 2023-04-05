<div class="mt-2">
    @isset($attributes['label'])
        <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
            @isset($attributes['require'])
                <span class="text-danger">(*)</span>
            @endisset
        </label>
    @endisset
    <input @if ($attributes['read-only']) readonly @endif type="text"
        list="{{ $attributes->wire('model')->value }}_list" {{ $attributes->wire('model') }}
        id="latitude"
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}"
        >
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if (isset($attributes['datalist']))
        @if (count($attributes['datalist']) > 0)
            <datalist id="{{ $attributes->wire('model')->value }}_list">
                @foreach ($attributes['datalist'] as $key => $option)
                    <option value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </datalist>
        @endif
    @endif
</div>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" />
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>

                                <script>
                                    var map = L.map('mapid').setView([23.685, 90.3563], 7);
                                    // The above line creates a new Leaflet map centered on the specified latitude and longitude of Bangladesh, with a zoom level of 7.
                                  
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                      // This line sets the tile layer to use OpenStreetMap tiles.
                                      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
                                    }).addTo(map);
                                  
                                    var marker = L.marker([23.8103, 90.4125]).addTo(map);
                                    // The above line adds a marker to the map at the specified latitude and longitude for Dhaka city.
                                    marker.bindPopup("<b>Dhaka</b>").openPopup();
                                  
                                    function onMapClick(e) {
                                        const latLng =e.latlng.lat.toFixed(4);
                                        const latLnglarge =e.latlng.lng.toFixed(4);
                                        document.getElementById("latitude").textContent = latLng;
                                        document.getElementById("longitude").textContent = latLnglarge;
                                      // Remove the existing marker, if any
                                      if (marker) {
                                        map.removeLayer(marker);
                                      }
                                      // Add a new marker at the clicked location
                                      marker = L.marker(e.latlng).addTo(map);
                                      marker.bindPopup("<b>New Location</b><br/>Latitude: " + e.latlng.lat.toFixed(4) + "<br/>Longitude: " + e.latlng.lng.toFixed(4)).openPopup();
                                    }
                                    map.on('click', onMapClick);
                                  </script>