
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>/* Always set the map height explicitly to define the size of the div
* element that contains the map. */
#map {
	width: 70%;
	height: 100%;
}

.samping {
	position: absolute;
	top: 90px;
	right: 0px;
	width: 30%;
	height: 100%;
	overflow: auto;
}

.samping div {
	width: 100%;
	padding: 10px;
	box-sizing: border-box;
}

#pano,
#rute {
	width: 50%;
	height: 600px;
	display: inline-block;
	vertical-align: top;
}

/* Optional: Makes the sample page fill the window. */
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
}

</style>
	</head>
	<body>
		<h1 align="center">Lihat <a href="https://www.youtube.com/watch?v=V41Uy-JQVL4" target="_BLANK">Tutorial</a></h1>

<p align="center">Marker, directions, panorama & distance matrix.</p>
  
<div id="map"></div>
	
<div class="samping">
	<div>
		<h3>Data perusahaan</h3>
		<input type="text" id="alamat" placeholder="Alamat" title="Alamat"/>
		<select id="type">
			<option value="parking">parking</option>
			<option value="library">library</option>
			<option value="info">info</option>
		</select>
		<textarea id="keterangan" placeholder="Keterangan" title="Keterangan"></textarea>
		<button id="add">Add Lokasi</button>
		<button id="hapus">Hapus semua Lokasi</button>
		<hr>
		<h3>Data user</h3>
		<input type="text" id="lokasi" placeholder="Lokasi saya sekarang" title="Lokasi saya sekarang" value="Tarogong, Garut"/>
		<button id="cari">Cari lokasi persuhaan terdekat</button>
	</div>			
</div>
		
<div id="pano">tempat unntuk menampilkan panorama lokasi</div><div id="rute">tempat unntuk menampilkan rute jalan</div>
		
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0&language=in&region=ID"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script><script>// GPS
var lokasiSaya = "Tarogong, Garut";

// Contoh data lokasi perusahaan
// atau ambil dari database
var perusahaan = 
[{
        "lat": "-6.8919604",
        "lng": "107.6156133",
        "alamat": "Dago, Bandung",
        "keterangan": "Aman ga ada begal",
        "type": "parking"
    },
    {
        "lat": "-7.7955798",
        "lng": "110.3694896",
        "alamat": "Yogyakarta, DIY",
        "keterangan": "Ayo membaca buku",
        "type": "library"
    },
    {
        "lat": "-7.2574719",
        "lng": "112.7520883",
        "alamat": "Surabaya",
        "keterangan": "Discon belanja",
        "type": "info"
    }
];

var map;
var lokasi = []; // penampung maker supaya bisa menampilkan banyak marker dan dinamis
var rute = []; // penampung rute

// merubah icon atau sobat bisa menggunakan icon sobat sendiri sesuai keinginan
// tinggal masukan url image.y di bawah
var iconBase = "https://maps.google.com/mapfiles/kml/shapes/";
var icons = {
    parking: {
        icon: iconBase + 'parking_lot_maps.png'
    },
    library: {
        icon: iconBase + 'library_maps.png'
    },
    info: {
        icon: iconBase + 'info-i_maps.png'
    }
}

function initialize() {
    streetViewService = new google.maps.StreetViewService();
    panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));
    map = new google.maps.Map(document.getElementById('map'), {
        // peta indonesia
        center: {
            lat: -0.789275,
            lng: 113.921327
        },
        zoom: 5,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        }
    });

    findLokasi();
}

google.maps.event.addDomListener(window, 'load', initialize);

// fungsi untuk menampilkan data perusahaan ke maps
function findLokasi() {
    var d = new google.maps.InfoWindow();
    var e;

    $.each(perusahaan, function(i, b) {
        // membuat maker dari lat, lng
        e = new google.maps.Marker({
            position: new google.maps.LatLng(b.lat, b.lng),
            icon: icons[b.type].icon,
            map: map
        });

        lokasi.push(e);

        // membuat info window alamat
        google.maps.event.addListener(e, 'click', (function(a, i) {
            return function() {
                //	alert(a.position.lat());
                //	console.log(a.location);
                d.setContent('<div><h3>' + b.alamat + '</h3><p>' + b.keterangan + '</p>'
                    // tombol triger.y untuk menjalankan fungsi jarak
                    +
                    '<button class="detail" data-alamat="' + b.alamat + '" data-lat="' + b.lat + '" data-lng="' + b.lng + '">Detail</button></div>');
                d.open(map, a)
            }
        })(e, i))
    });
}

function addLokasi(alamat, keterangan, icon) {
    // kita buat dulu proses untuk mendapatka lat & lng berdasarkan alamat yang kita input
    $.ajax({
        type: "GET",
        url: 'https://maps.google.com/maps/api/geocode/json?address=' + alamat.replace(/\s+/g, '+') + '&sensor=false&key=AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0',
        dataType: "json"
    }).done(function(data) {
        var d = new google.maps.InfoWindow();
        var e;
        var i;

        // membuat maker dari lat, lng
        e = new google.maps.Marker({
            position: new google.maps.LatLng(data.results[0].geometry.location.lat, data.results[0].geometry.location.lng),
            icon: icons[icon].icon,
            map: map
        });

        lokasi.push(e);

        // membuat info window alamat
        google.maps.event.addListener(e, 'click', (function(a, i) {
            return function() {
                d.setContent('<div><h3>' + alamat + '</h3><p>' + keterangan + '</p>'
                    // tombol triger.y untuk menjalankan fungsi jarak
                    +
                    '<button class="detail" data-alamat="' + alamat + '" data-lat="' + data.results[0].geometry.location.lat + '" data-lng="' + data.results[0].geometry.location.lng + '">Detail</button></div>');
                d.open(map, a);
            }
        })(e, i));

        var obj = {
            lat: data.results[0].geometry.location.lat,
            lng: data.results[0].geometry.location.lng,
            alamat: alamat,
            keterangan: keterangan,
            type: icon
        };

        perusahaan.push(obj);

    });
}

function hapusLokasi() {
    // cara.y yaitu kita set var lokasi = [] menjadi null
    for (var i = 0; i < lokasi.length; i++) {
        lokasi[i].setMap(null)
    }

    // data lokasi perusahaan
    perusahaan = [];
}

function hapusRute() {
    // cara.y yaitu kita set var rute = [] menjadi null
    for (var i = 0; i < rute.length; i++) {
        rute[i].setMap(null)
    }
}

// kita buat funsi jarak
function jarak(alamat) {
    var a = new google.maps.DirectionsService();
    var b = new google.maps.DirectionsRenderer({
        preserveViewport: true
    });
    // menamppilkan rute di maps
    b.setMap(map);
    // menamppilkan rute di div #rute
    b.setPanel(document.getElementById('rute'));
    // menambahkan rute baru ke array rute
    rute.push(b);
    // data request
    var request = {
        origin: lokasiSaya,
        destination: alamat,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    a.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            b.setDirections(response);
        }
    });

}

function lihatPano(alat, alon) {
    var STREETVIEW_MAX_DISTANCE = 100;
    var latLng = new google.maps.LatLng(alat, alon);
    streetViewService.getPanoramaByLocation(latLng, STREETVIEW_MAX_DISTANCE, function(streetViewPanoramaData, status) {
        if (status === google.maps.StreetViewStatus.OK) {
            panorama.setPano(streetViewPanoramaData.location.pano);
        } else {
            alert('Panorama tidak tersedia.');
        }
    });
}

function jarakTerdekat(dari, callback) {
    var ke = perusahaan.map(function(obj) {
        return obj.alamat;
    });
    var distanceService = new google.maps.DistanceMatrixService();
    distanceService.getDistanceMatrix({
            origins: [dari],
            destinations: ke,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            durationInTraffic: false,
            avoidHighways: false,
            avoidTolls: false
        },
        function(response, status) {
            if (status !== google.maps.DistanceMatrixStatus.OK) {
                alert('Error:', status);
            } else {
                var tes = response.rows[0].elements.map(function(obj) {
                    return obj.distance.value;
                });
                var min = Math.min.apply(null, tes);
                callback(arraySearch(tes, min));
            }
        });
}

function arraySearch(arr, val) {
    for (var i = 0; i < arr.length; i++)
        if (arr[i] === val)
            return i;
    return false;
}

// function.y sudah tinggal kita panggi function finLokasi.y
$(function() {

    $("#add").click(function() {
        addLokasi($("#alamat").val(), $("#keterangan").val(), $("#type").val());
    });

    $("#hapus").click(function() {
        hapusLokasi();
    });

    $("#cari").click(function() {
        lokasiSaya = ($("#lokasi").val() == '' ? lokasiSaya : $("#lokasi").val());
        $("#rute").empty();
        hapusRute();
        jarakTerdekat($("#lokasi").val(), function(data) {
            jarak(perusahaan[data].alamat);
            lihatPano(perusahaan[data].lat, perusahaan[data].lng);
        });
    });

    $("body").on('click', '.detail', function() {
        lokasiSaya = ($("#lokasi").val() == '' ? lokasiSaya : $("#lokasi").val());
        // mengosongkan div #rute dulu biar tidak numpuk rute.y (hanya menampilkan rute marker yang di klik)
        $("#rute").empty();
        // menghapus rute sebelum.y yang di maps
        hapusRute();
        // menampilkan rute baru
        jarak($(this).data('alamat'));
        // menampilkan panorama baru
        lihatPano($(this).data('lat'), $(this).data('lng'));
    });

});</script>
	</body>
</html>