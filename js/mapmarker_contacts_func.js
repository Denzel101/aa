		//set up markers 
		var myMarkers = {"markers": [
				{"latitude": "-1.28333", "longitude":"36.81667"}
			]
		};
		
		//set up map options
		$("#map_contact").mapmarker({
			zoom	: 13,
			center	: 'Nairobi Kenya',
			markers	: myMarkers
		});

