function zipradius(calanderevents, zip) {
      	// grab zipcode from geocoder below 
      	console.log('alf');
      	console.log(zip);
      	//Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing 
      	//must be set to carrotpath.com during production.
      	var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
      	//get Json object and retirieve the data in the oblect
      	$.getJSON(url, null, function (data){


      		
      		zipradius = [];
      		x=0;

      		console.log(data);
      		//iterate through your your data and but the zip codes in a list.
      		data.zip_codes.forEach(function(element) {
      			//place search radius 
      			zipradius[x] = parseInt(element.zip_code);
      			x += 1;
      		});
      		y=0;
      		console.log(zipradius); 
      		calanderevents.forEach(function(element){
      			
      			console.log(element.zip);
      			console.log(element.zip == zipradius[2]);
      			console.log(zipradius.includes(element.zip));
      			
      			//checks to see if element is included in list 
      			if (zipradius.includes(element.zip)){

      			}
      			else {
      				//deletes the calendar events that arnt include in the list of zp codes 
      				delete calanderevents[y];
      				
      			}
      			y += 1;
      		});
      		markers = [];

      		// place each calendar event in a markers arrray on the map.
      		// note map is a js function in this case not google maps
      		// check example for expanation https://www.w3schools.com/jsref/jsref_map.asp
      		var markers = calanderevents.map(function(event){
      	  	    return new google.maps.Marker({
      	  		position:{lat: event["Lat"], lng: event["Lon"]},
      	  		map: map,
      	  		label: event["title"]
      	  	})
      	  });

      		
      		
      		//calendar event output now only includes events included in the radius 
      		console.log(calanderevents);
      		console.log(data.zip_codes[1].zip_code);
      		return markers;
      	});

      }
      function zipradius2(calanderevents, zip) {
      	// grab zipcode from geocoder below 
      	deleteMarkers();
      	console.log(markers);
      	console.log('alf');
      	console.log(zip);
      	//Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing 
      	//must be set to carrotpath.com during production.
      	var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
      	//get Json object and retirieve the data in the object
      	$.getJSON(url, null, function (data){


      		
      		zipradius = [];
      		x=0;

      		console.log(data);
      		//iterate through your your data and but the zip codes in a list.
      		data.zip_codes.forEach(function(element) {
      			//place search radius 
      			zipradius[x] = parseInt(element.zip_code);
      			x += 1;
      		});
      		y=0;
      		zipradius.push(zip);
      		console.log(zipradius); 
      		calanderevents.forEach(function(element){
      			
      			console.log(element.zip);
      			console.log(element.zip == zipradius[2]);
      			console.log(zipradius.includes(element.zip));
      			
      			//checks to see if element is included in list 
      			if (zipradius.includes(element.zip)){

      			}
      			else {
      				//deletes the calendar events that arnt include in the list of zp codes 
      				delete calanderevents[y];
      				
      			}
      			y += 1;
      		});
      		markers = [];
      		console.log(calanderevents)

      		// place each calendar event in a markers arrray on the map.
      		// note map is a js function in this case not google maps
      		// check example for expanation https://www.w3schools.com/jsref/jsref_map.asp
      		 markers = calanderevents.map(function(event){
      	  	    return new google.maps.Marker({
      	  		position:{lat: event["Lat"], lng: event["Lon"]},
      	  		map: map,
      	  		label: event["title"]
      	  	})
      	  });

      		
      		
      		//calendar event output now only includes events included in the radius 
      		console.log(calanderevents);
      		console.log(markers);
      		console.log(data.zip_codes[1].zip_code);
      		
      	});

      }
      // In the following example, markers appear when the user clicks on the map.
      // The markers are stored in an array.
      // The user can then click an option to hide, show or delete the markers.
      var map;
      var markers = [];
      var zip = {{$zip}};
      var input = document.getElementById('pac-input');



      function initMap() {
        var haightAshbury = {lat: 37.769, lng: -122.446};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: haightAshbury,
          mapTypeId: 'terrain'
        });

        var searchBox = new google.maps.places.SearchBox(input);
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
 // Create the search box and link it to the UI element.


 		console.log(google.maps.version);
        

      //Json of all calendar events.
      var calanderevents = [ 
      	@foreach($calanderevents as $event)
      	{ id:{{$event->id}},
      	  title: "{{$event->Event_title}}",
      	  Lat: {{$event->Lat}},
      	  Lon: {{$event->Longitude}},
      	  zip: {{$event->zip_code}} },
      	  @endforeach
      	  ];

        

        
        
        zipradius(calanderevents, zip);

        console.log(window);

        //Event listener for when place is changed.
        searchBox.addListener('places_changed', function() {
        	
		
		deleteMarkers();
        //call in geocoder to get zip.  
        var geocoder = new google.maps.Geocoder();
        //reset calander events to default.
          
      	  // call to google api returns information about place entered in search box
      	  // does not includ zip code  zip 
      	  //see https://developers.google.com/places/web-service/search

          var places = searchBox.getPlaces();

          geocodeAddress(geocoder, map);

        

          //get new zip radius
          // note must be put in new function.(copy of zip radius)
			

        	

          if (places.length == 0) {
            return;
          }

         var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
            //checks to see if a viwport exist 
            //if viwport does not exist it uses location 
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              console.log(places[0].geometry.viewport);
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
            //changes the bounds on the map.
            map.fitBounds(bounds); 
          });
      });

      }

	function geocodeAddress(geocoder, map) {
	        var address = document.getElementById('pac-input').value;
	        geocoder.geocode({'address': address}, function(results, status) {
	          if (status === 'OK') {

	          	

	          	
	          	var calanderevents = [ 
      	@foreach($calanderevents as $event)
      	{ id:{{$event->id}},
      	  title: "{{$event->Event_title}}",
      	  Lat: {{$event->Lat}},
      	  Lon: {{$event->Longitude}},
      	  zip: {{$event->zip_code}} },
      	  @endforeach
      	  ];

	          	    zip = results[0].address_components[7].long_name;
	          	    zipradius2(calanderevents, zip);

	          	    
	          	   
	            console.log(map);
	               console.log(results[0].address_components[7].long_name);
	              
	          } else {
	            alert('Geocode was not successful for the following reason: ' + status);
	          }
	        });
	      }

      
      
      


      // Adds a marker to the map and push to the array.
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }