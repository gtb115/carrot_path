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
<div class="form_con">

  <input id="search" type="text" name="search" placeholder="Search..">

  <div class="filter">Filter
    <div class="filter-content">
      <a href="#">Date-Range</a>
      <a href="#">Location</a>
      <a href="#">Organization</a>
      <a href="#">Ratings</a>
    </div>
  </div>
</div>
<div class="query">
  <div class="results_list">
    <div class="initial_view">
      <div class="pic"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Small-city-symbol.svg/348px-Small-city-symbol.svg.png" title="Pic" />
      </div>
      <div data-bind="foreach: filter_event" class="eventInfo">
        <div class="eventInfo_details">
          <h1 data-bind="text: title">Org Name - Name of Event</h1>
          <p>Date: June 24, 2017 11am - 2pm</p>
          <p>Available Spots: 3</p>
        </div>

        <div class="btns btns1">
          <p>V</p>
        </div>
        <div class="btns btns2">
          <p>></p>
        </div>
      </div>

    </div>
    <div class="secondCon">
      <div class="secondPan">
        <h1>ABOUT:</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="thirdPan">
          <h1>Event Details:</h1>
          <p><b>Location:</b> 123 Road St, City CA, 94111</p>
          <p><b>Director:</b> Sterling Archer</p>
          <p><b>Organization:</b> ISIS</p>
          <p><b>Contact:</b> Sign Up For Direct Contact Info</p>
        </div>
        <div class="ratings">
          <h2>This coordinator has a rating of:</h2>
        </div>
        <div class="buttonsCon">
          <button>Sign-Up</button>
          <button>Favorites</button>
          <button>Future Events</button>
        </div>
      </div>
    </div>
    <!-- <div class="map"><img src="https://developers.google.com/maps/documentation/android-api/images/utility-markercluster-simple.png" /> -->
      <div id="map"></div>
    </div>
   @endsection
@section('scripts')
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

 <script>
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
        //must be set to carrotpath.com during production.
        var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
        //get Json object and retirieve the data in the oblect
        $.getJSON(url, null, function (data){
          
          zipradius = [];
          // x=0;

          console.log(data);
          //iterate through your your data and but the zip codes in a list.
          data.zip_codes.forEach(function(element, i) {
            //place search radius 
            zipradius[i] = parseInt(element.zip_code);
          });
          console.log(zipradius);
          filter_event =[];
          calanderevents.forEach(function(element){
            
            //checks to see if element is included in list 
            if (zipradius.includes(element.address_zip)){
              filter_event.push(element); 
              console.log(element.address_zip);
            }
            
          });
          console.log(filter_event);
          // var viewModel = ko.mapping.fromJS(filter_event);
          // ko.mapping.fromJS(filter_event, viewModel);
          ko.applyBindings(filter_event, document.getElementById("table_data"));


          markers = filter_event.map(function(event){
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
      function zipradius2(calanderevents, zip) {
// ko.applyBindings({calanderevents});
        // grab zipcode from geocoder below
        console.log('alf');
        console.log(zip);
        
        //Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing 
        //must be set to carrotpath.com during production.
        var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
        //get Json object and retirieve the data in the oblect
        $.getJSON(url, null, function (data){
          
          zipradius = [];
          // x=0;

          console.log(data);
          //iterate through your your data and but the zip codes in a list.
          data.zip_codes.forEach(function(element, i) {
            //place search radius 
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
          // call in zip from home page
          zip="95123";


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

          var searchBox = new google.maps.places.SearchBox(input);

          
        searchBox.addListener('places_changed', function() {
          var bounds = new google.maps.LatLngBounds();
          document.getElementById("table_data").style.display = "none";
          document.getElementById("table_data2").style.visibility = "visible";


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

          var places = searchBox.getPlaces();
          zip = places[0].address_components[7].long_name;
          console.log(calanderevents);
          console.log(places);
          deleteMarkers();

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqif7v2gfexClzI134YyDF793sS5ZzG7M&libraries=places&callback=initMap"
    async defer></script>
<!-- Jquery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection

