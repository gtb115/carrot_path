<template>
 <div>
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
  <div v-for="event in events" class="results_list">
    <div class="initial_view">
      <div class="pic"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Small-city-symbol.svg/348px-Small-city-symbol.svg.png" title="Pic" />
      </div>
      <div data-bind="foreach: filter_event" class="eventInfo">
        <div class="eventInfo_details">
          <h1 data-bind="text: title">{{ event.title}} - {{event.title}}</h1>
          <p>Date: {{event.start}}</p>
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
        <p>{{event.description}}</p>
        </div>
        <div class="thirdPan">
          <h1>Event Details:</h1>
          <p><b>Location:</b>{{event.address_street}}, {{event.address_city}}, {{event.address_zip}}</p>
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
    </div>
    <div id="map"></div>

</div>

</template>
<script>
let geocoder = new google.maps.Geocoder();
export default {
	name: 'query',
  mounted () {
    this.zip = window.zip;
    this.events = this.allEvents = window.calanderevents;
    console.log("zip:", this.zip);
    geocoder.geocode({
      address: `${this.zip}`
    }, (results, status) => {
      this.map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: results[0].geometry.location,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      this.zipradius(this.zip);
    }) 
    
    // connect searchBox to the input
    this.searchBox = new google.maps.places.SearchBox(document.getElementById('search'));
    this.searchBox.addListener('places_changed', () => {
      let places = this.searchBox.getPlaces();
      console.log('places:', places);
      this.zipradius(places[0].address_components[7].long_name, places[0]);
    })
  },
  data () {
    return {
      zip: "",
      allEvents: [],
      events: [],
      map: null,
      markers:[],
      searchBox: null
    }
  },
  methods: {
    zipradius(zip, place) {
        console.log(zip);

        //Note app must use Client-id not the app id.  Must use localhost as app or api will fail in testing
        //http://www.zipcodeapi.com/API for zip code by radius 
        //must be set to carrotpath.com during production.
        var url = 'https://www.zipcodeapi.com/rest/js-6iaTquHqJbqfVwoSyqHuxhJGDUsRYud5NoYdSGDBR4RMBgFaGmEdEnThil9gQnmD/radius.json/'+zip+'/1/km';
        //get Json object and retirieve the data in the oblect
        $.getJSON(url, null, (data) => {
          let zipradius = [];
         
          console.log(data);
          //iterate through your your data and but the zip codes in a list.
          data.zip_codes.forEach((element, i) =>  {
            //place each zipcode in that radius into a list 
            zipradius[i] = parseInt(element.zip_code);
          });
          console.log(zipradius);
          // Create a new empty list to store the filterd events
          let filter_event =[];
          // cycle through each calanderevent
          this.allEvents.forEach((element) => {
            
            //checks to see if element is included in list 
            if (zipradius.includes(element.address_zip)){
            // if the calendar's zip matches the radius in xip radius it is pused to our new filter_event 
              filter_event.push(element); 

              console.log(element.address_zip);
            }
            
          });
          console.log(filter_event);
          this.events = filter_event;
    
          //markers are are crated from the filter event. 
          //Nope map is a JS function 
          this.markers.forEach(marker => {
            marker.setMap(null);
          })
          this.markers = [];
          filter_event.forEach((event) => {
              this.markers.push(new google.maps.Marker({
                position:{lat: event["Lat"], lng: event["Lon"]},
                map: this.map,
                label: event["title"]
              }))
          });
          var bounds = new google.maps.LatLngBounds();
          if (place) {
              // Only geocodes have viewport.
              if(place.geometry.viewport) {
                console.log(place.geometry.viewport);
                bounds.union(place.geometry.viewport);
              }else if(place && place.geometry.location){
                bounds.extend(place.geometry.location);
              }
              //changes the bounds on the map.
              this.map.fitBounds(bounds);
          } 
             
        });

      }
  }
}
</script>
<style lang="scss"></style>