@extends('layouts.master')
@section('title')
CARROT PATH
@endsection
@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/query.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/nav_query.css')}}"/>
<link rel="stylesheet" type="text/javascript" href="{{asset('js/query.js')}}"/>
@endsection

@section('meta')
<meta name="robots" contents="follow, index">
@endsection

@section('content') 
@include('layouts.nav_query')
<div id="query">
	
</div>
@endsection
 
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqif7v2gfexClzI134YyDF793sS5ZzG7M&libraries=places"></script>
<script>
  // calls in calanderevents for the radius zip function 
          window.zip = {{$zip}};
          window.calanderevents = [
          @foreach($calanderevents as $event)
          { id:{{$event->id}},
            title: "{{$event->title}}",
            description: "{{$event->description}}",
            start:new Date("{{$event->start}}"),
            end: new Date("{{$event->end}}"),
            address_street: "{{$event->address_street}}",
            address_city: "{{$event->address_city}}",
            address_state: "{{$event->address_state}}",
            address_zip: {{$event->address_zip}},
            Lat: {{$event->Lat}},
            Lon: {{$event->Lon}},},
            @endforeach
            ];
</script>
<script src="{{asset('js/app.js')}}"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

    <!-- custom js for this template -->
   
 <script>
 // JS for list show and hide 
 $(document).ready(function() {
  $(".btns1").click(function() {
    $(".secondCon").show()
    $(".results_list").animate({
      height: "40em"
    });

  });
  $(".btns2").click(function() {
    $(".secondCon").hide()
    $(".results_list").animate({
      height: "9em"
    });
  });



  $(".filter").click(function() {
    $(".filter-content").toggle(200);
  });
});


</script>
<script>
      // global vaiables 
        var map;
        var calanderevents;
        var markers;
        var zip;
        var geocoder;
        var input = document.getElementById("search");

function zipradius(calanderevents, zip) {
// ko.applyBindings({calanderevents});
        // grab zipcode from geocoder below 
        console.log('alf');
        console.log(zip);

        //Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing
        //http://www.zipcodeapi.com/API for zip code by radius 
        //must be set to carrotpath.com during production.
        var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
        //get Json object and retirieve the data in the oblect
        $.getJSON(url, null, function (data){
          create a blank list to store zipcpdes within radious
          zipradius = [];
         
          console.log(data);
          //iterate through your your data and but the zip codes in a list.
          data.zip_codes.forEach(function(element, i) {
            //place each zipcode in that radius into a list 
            zipradius[i] = parseInt(element.zip_code);
          });
          console.log(zipradius);
          // Create a new empty list to store the filterd events
          filter_event =[];
          // cycle through each calanderevent
          calanderevents.forEach(function(element){
            
            //checks to see if element is included in list 
            if (zipradius.includes(element.address_zip)){
            // if the calendar's zip matches the radius in xip radius it is pused to our new filter_event 
              filter_event.push(element); 

              console.log(element.address_zip);
            }
            
          });
          console.log(filter_event);
          // var viewModel = ko.mapping.fromJS(filter_event);
          // ko.mapping.fromJS(filter_event, viewModel);
          // applying KO to list
          ko.applyBindings(filter_event, document.getElementById("table_data"));

          //markers are are crated from the filter event. 
          //Nope map is a JS function 
          markers = filter_event.map(function(event){
                return new google.maps.Marker({
              position:{lat: event["Lat"], lng: event["Lon"]},
              map: map,
              label: event["title"]
            })
          });
          //markers are set on map
          markers.map(function(event){
            event.setMap(map);
          });
        });

      }
      function zipradius2(calanderevents, zip) {
// ko.applyBindings({calanderevents});
        // grab zipcode from geocoder below
        console.log('alf');
        console.log(zip);
        
        //Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing
        //http://www.zipcodeapi.com/API for zip code by radius 
        //must be set to carrotpath.com during production.
        var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
        //get Json object and retirieve the data in the oblect
        $.getJSON(url, null, function (data){
          
          zipradius = [];
          // x=0;

          console.log(data);
          //iterate through your your data and put the zip codes in a list.
          data.zip_codes.forEach(function(element, i) {
            //place each zipcode in that radius into a list  
            zipradius[i] = parseInt(element.zip_code);
          });
          console.log(zipradius);
          filter_event2 =[];
          calanderevents.forEach(function(element){
            
            //checks to see if element is included in list 
            if (zipradius.includes(element.address_zip)){
              filter_event2.push(element); 
              console.log(element.address_zip);
            }
            
          });
          console.log(filter_event2);
          filter_event2O = ko.observableArray(filter_event2);
          try {
          ko.applyBindings(filter_event2O, document.getElementById("table_data2"));
      }
      catch(err) {
        console.log("Cannot bind to more than once")
      }
     
          markers = filter_event2.map(function(event){
                return new google.maps.Marker({
              position:{lat: event["Lat"], lng: event["Lon"]},
              map: map,
              label: event["title"]
            })
          });
          
          markers.map(function(event){
            event.setMap(map);
          });
        });
      

        

      }

      function deleteMarkers() {
        markers.map(function(event){
            event.setMap(null);
          });
        markers = [];
      }
    
        
        function initMap() {
          geocoder = new google.maps.Geocoder();
          // call in zip from home page for testing purposes I have just hardcoded it on this page.
          zip="95123";

        //retuns map with the zip code provided 
        geocoder.geocode({
          "address": zip
          }, function(results, status) {
            // call in new map and center it baced on zip
                map = new google.maps.Map(document.getElementById('map'), {
                // Center map (but check status of geocoder)
                center: results[0].geometry.location,
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            })
                // calls in calanderevents for the radius zip function 
          var calanderevents = [
          @foreach($calanderevents as $event)
          { id:{{$event->id}},
            title: "{{$event->title}}",
            description: "{{$event->description}}",
            start:new Date("{{$event->start}}"),
            end: new Date("{{$event->end}}"),
            address_street: "{{$event->address_street}}",
            address_city: "{{$event->address_city}}",
            address_state: "{{$event->address_state}}",
            address_zip: {{$event->address_zip}},
            Lat: {{$event->Lat}},
            Lon: {{$event->Lon}},},
            @endforeach
            ];
          

          // Filter Markers with zipradius fuction definded above
          zipradius(calanderevents, zip);
      
          });

        console.log(input);
        	// connect searchBox to the input
          var searchBox = new google.maps.places.SearchBox(input);

         //event listener to see when place in changed when and run code below to refilter events   
        searchBox.addListener('places_changed', function() {
          var bounds = new google.maps.LatLngBounds();
          //no longer in existance but was used to switch tables so objects can be rebound using KO.JS
          document.getElementById("table_data").style.display = "none";
          document.getElementById("table_data2").style.visibility = "visible";

          // Pull in calanderevents from laravel database
          var calanderevents = [
          @foreach($calanderevents as $event)
          { id:{{$event->id}},
            title: "{{$event->title}}",
            description: "{{$event->description}}",
            start:new Date("{{$event->start}}"),
            end: new Date("{{$event->end}}"),
            address_street: "{{$event->address_street}}",
            address_city: "{{$event->address_city}}",
            address_state: "{{$event->address_state}}",
            address_zip: {{$event->address_zip}},
            Lat: {{$event->Lat}},
            Lon: {{$event->Lon}},},
            @endforeach
            ];
            //get use the imput to get zipcode from place
          var places = searchBox.getPlaces();
          zip = places[0].address_components[7].long_name;
          console.log(calanderevents);
          console.log(places);
          // Clear markers
          deleteMarkers();
          //run the second zip radus function to refilter events.
          zipradius2(calanderevents, zip);
          if (places[0].geometry.viewport) {
              // Only geocodes have viewport.
              console.log(places[0].geometry.viewport);
              bounds.union(places[0].geometry.viewport);
            } else {
              bounds.extend(places[0].geometry.location);
            }
            //changes the bounds on the map.
            map.fitBounds(bounds); 


        });

        }



        // Sets the map on all markers in the array.
        

  </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.1/knockout-min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js"></script>
<!-- Jquery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection

