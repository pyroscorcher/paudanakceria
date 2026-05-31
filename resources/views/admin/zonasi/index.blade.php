<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Peta Zonasi - Admin Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        /* Custom map styling to ensure it takes up significant screen real estate */
        #zonasi-map {
            height: 70vh; /* 70% of the viewport height */
            width: 100%;
            border-radius: 0.5rem;
            z-index: 1;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    @include('components.admin_navbar')

    <main class="main-wrapper">

        @include('components.admin_header')

        <div class="overlay"></div>

        <section class="section">
            <div class="container-fluid">
                <div class="max-w-7xl mx-auto mt-10 p-6">

                    <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-end">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Peta Persebaran Zonasi</h1>
                            <p class="text-sm text-gray-500 mt-1">Visualisasi jarak rumah seluruh pendaftar terhadap PAUD Anak Ceria.</p>
                        </div>
                        
                        <div class="mt-4 md:mt-0 bg-white p-3 rounded-lg shadow-sm border border-gray-200 flex gap-4 text-xs font-medium">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-blue-600 block"></span> Sekolah
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-green-500 block"></span> Diterima
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-yellow-500 block"></span> Menunggu
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-red-500 block"></span> Ditolak
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 bg-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col sm:flex-row sm:items-center gap-4">
                        <label for="radius-slider" class="text-sm font-medium text-gray-700 whitespace-nowrap">
                            Radius Zonasi: <span id="radius-display" class="font-bold text-[#009CE0] ml-1">1000 Meter (1 KM)</span>
                        </label>
                        <input type="range" id="radius-slider" min="100" max="5000" step="100" value="1000" 
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <div class="bg-white p-2 rounded-lg shadow-sm border border-gray-200">
                        <div id="zonasi-map"></div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // 1. Set PAUD Anak Ceria Exact Coordinates
            const paudLat = -6.3181561;
            const paudLng = 106.7238404;

            // 2. Initialize Map
            const map = L.map('zonasi-map').setView([paudLat, paudLng], 14);

            // 3. Load Map Tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // 4. Draw Zoning Radius (Assign to variable so we can modify it later)
            const zoningCircle = L.circle([paudLat, paudLng], {
                color: '#3b82f6', // Tailwind blue-500
                fillColor: '#3b82f6',
                fillOpacity: 0.1,
                radius: 1000 
            }).addTo(map);

            // --- RADIUS SLIDER LOGIC ---
            const radiusSlider = document.getElementById('radius-slider');
            const radiusDisplay = document.getElementById('radius-display');

            radiusSlider.addEventListener('input', function(e) {
                const newRadius = parseInt(e.target.value);
                
                // Format the text output (convert to KM if >= 1000m)
                if (newRadius >= 1000) {
                    radiusDisplay.innerText = `${newRadius} Meter (${(newRadius/1000).toFixed(1)} KM)`;
                } else {
                    radiusDisplay.innerText = `${newRadius} Meter`;
                }

                // Dynamically update the circle on the map
                zoningCircle.setRadius(newRadius);
            });
            // ---------------------------

            // 5. Add School Marker (Central Hub)
            const schoolIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            L.marker([paudLat, paudLng], { icon: schoolIcon })
                .addTo(map)
                .bindPopup('<b class="text-blue-700">PAUD Anak Ceria</b><br>Titik Pusat Zonasi')
                .openPopup();

            // 6. Define Custom Marker Colors based on Enrollment Status
            const icons = {
                'Diterima': new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
                }),
                'Menunggu': new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
                }),
                'Ditolak': new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
                })
            };

            // 7. Inject Laravel Data into JavaScript
            const students = @json($students);

            // 8. Loop through all students and plot their coordinates
            students.forEach(student => {
                const lat = parseFloat(student.lintang);
                const lng = parseFloat(student.bujur);
                const status = student.pendaftaran ? student.pendaftaran.status : 'Menunggu';
                
                // Select the correct color icon, fallback to yellow (Menunggu) if unknown
                const markerIcon = icons[status] || icons['Menunggu'];

                if (!isNaN(lat) && !isNaN(lng)) {
                    // Create Popup HTML
                    const popupContent = `
                        <div class="text-sm">
                            <strong class="text-gray-900">${student.name}</strong><br>
                            <span class="text-gray-600">NIK: ${student.nik ?? '-'}</span><br>
                            <span class="font-semibold ${status === 'Diterima' ? 'text-green-600' : (status === 'Ditolak' ? 'text-red-600' : 'text-yellow-600')}">
                                Status: ${status}
                            </span><br>
                            <a href="/admin/enrollment/${student.pendaftaran.id}" class="text-blue-500 hover:underline mt-1 inline-block">Lihat Detail &rarr;</a>
                        </div>
                    `;

                    // Add Marker to Map
                    L.marker([lat, lng], { icon: markerIcon })
                        .addTo(map)
                        .bindPopup(popupContent);
                }
            });
        });
    </script>
    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>