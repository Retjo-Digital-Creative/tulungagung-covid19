
	let getData = async() => {
		let geojson = await fetch("/js/data_wilayah.json")
		let covid = await fetch("/api/covid");
		geojson = await geojson.json()
		covid = await covid.json()

		geojson.features.forEach(geo => {
			covid.forEach( cov => {
				if(
					geo.properties.KECAMATAN.toLowerCase().includes( cov.nama_kecamatan.toLowerCase() ) ){
					geo.properties = Object.assign({"covid" : cov},geo.properties)
				}
			});
		})

		return await geojson
	}

	let getColor = (d) => {
		color = "";
		if(d.jumlah_positif > 0){
			color = "#FE5252"
		}else if(d.jumlah_pdp > 0) {
			color = "darkorange"
		}else if(d.jumlah_odp > 0){
			color = "#9DADFE"
		}
		return color
	}

	let style = (feature) => {
	    return {
	        fillColor: getColor(feature.properties.covid),
	        weight: 2,
	        opacity: .7,
	        color: 'white',
	        dashArray: '1',
	        fillOpacity: 1
	    };
	}


	let setup = async() => {
		var mymap = L.map('mapid').setView([-8.0735,111.9164], 11);
		
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		    maxZoom: 20,
		    minZoom: 1,
		    id: 'mapbox.streets',
		    accessToken: 'pk.eyJ1IjoiZGVmcmluZHIiLCJhIjoiY2s4ZTN5ZjM0MDFrNzNsdG1tNXk2M2dlMSJ9.YXJM0PTu8PSsCCtYVjJNmw'
		}).addTo(mymap);

		var geojson = L.geoJSON(await getData(), {
			style: style,
			onEachFeature: function (feature, layer) {
				layer.bindTooltip(function (layer) {
					id = layer.feature.properties.KECAMATAN.toLowerCase()

					layout = `
						<b id="${id}">${layer.feature.properties.KECAMATAN} </b> <br>
						<div class="circle blue">
							<span>${layer.feature.properties.covid.jumlah_odp.toString()} </span>
						</div>
						<div class="circle orange">
							<span>${layer.feature.properties.covid.jumlah_pdp.toString()} </span>
						</div>
						<div class="circle red">
							<span>${layer.feature.properties.covid.jumlah_positif.toString()} </span>
						</div>
					`;
					return layout
				},{permanent: true,direction: "center", className: "kecamatanLabel"}).openTooltip()

			}
		}).bindPopup(function (layer) {
			layout = `
				<b style="font-size:14px;"> KECAMATAN ${layer.feature.properties.KECAMATAN} <br> </b>
				OPD :  ${layer.feature.properties.covid.jumlah_odp.toString()} <br>
				PDP :  ${layer.feature.properties.covid.jumlah_pdp.toString()} <br>
				POSITIF :  ${layer.feature.properties.covid.jumlah_positif.toString()} <br>
				<hr>
				SEMBUH :  ${layer.feature.properties.covid.jumlah_sembuh.toString()} <br>
				MENINGGAL :  ${layer.feature.properties.covid.jumlah_meninggal.toString()} <br>
				TOTAL :  ${layer.feature.properties.covid.jumlah_total.toString()} <br>
			`;

			return layout
		}).addTo(mymap);
		
		// mymap.fitBounds(geojson.getBounds());

	}

	let main = async() => {
		await setup();
		fixedPositionLabel("tanggunggunung"," translateY(-100px)")
		fixedPositionLabel("sumbergempol","translate(-10px,10px)")
		fixedPositionLabel("pakel","translate(-20px,20px)")
		fixedPositionLabel("bandung","translateY(-20px)")
		fixedPositionLabel("ngantru","translate(-10px,-20px)")
		fixedPositionLabel("karangrejo","translate(20px,-20px)")
		fixedPositionLabel("tulungagung","translate(10px,-10px)")
	}

	let fixedPositionLabel = (id,style) => {
		document.querySelector("#"+id).parentNode.style.transform = document.querySelector("#"+id).parentNode.style.transform+" "+style
	}

	main();