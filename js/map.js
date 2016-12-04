	function initMap() {
	    // Create a map object pphbandand specify the DOM element for display.
	    var map = new google.maps.Map(document.getElementById('map'), {
	        center: { lat: 38.8977, lng: -77.0365 }, // White House
	        mapTypeId: 'terrain',
	        scrollwheel: false,
	        zoom: 13
	    });

	    // Create an array of alphabetical characters used to label the markers.
	    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	    var pointsOfInterest = [{
	            // Capitol Building
	            lat: 38.889931,
	            lng: -77.009003,
	            title: 'Obama addresses Congress about Healthcare',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Address to Congress</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> Feb. 24, 2009</p>' +
	                '<p>In a joint session to congress, President Obama says: "So let there be no doubt: Health care reform cannot wait, it must not wait, and it will not wait another year."</p>' +
	                '</div>' +
	                '</div>'
	        }, {
	            // White house
	            lat: 38.8977,
	            lng: -77.0365,
	            title: 'Obama holds televised Health care summit',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Obama holds health care summit</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> Feb. 25, 2010</p>' +
	                '<p>Obama holds a televised heath care summit with leaders from both Democrats and Republicans to explain the health care bill."</p>' +
	                '</div>' +
	                '</div>'
	        }, {
	            //Lincoln Memorial
	            lat: 38.8893,
	            lng: -77.0502,
	            title: 'Obama signs Affordable Care Act into law',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Obama signs health care bill into law</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> March 23, 2010</p>' +
	                '<p>The bill instituted the broadest changes to the U.S. health-care system in decades. It allows young people to stay on parental health plans until age 26. The White House immediately begins the massive task of implementing the law</p>' +
	                '</div>' +
	                '</div>'
	        }, {
	            // National Museum of National History
	            lat: 38.8913,
	            lng: -77.0261,
	            title: 'Obama meets with top aides at White House',
	            contentString: '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Obama meets with top aides at White House </h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> Dec. 19, 2012</p>' +
	                '<p>Obama tells the group that the Affordable Health Care law, and implementing it well, will be the most important facet of his presidency</p>' +
	                '</div>' +
	                '</div>'

	        }, {
	            // Washington Monument
	            lat: 38.8895,
	            lng: -77.0353,
	            title: 'U.S Court rules that health care law is constitutional',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Law overcomes challenges against it</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> March 26, 2012</p>' +
	                '<p>After the 11th Circuit Court of Appeals ruled that parts of the law are unconstitutional in Aug. 12, 2011, The U.S. Court of Appeals in Washington rules that the law is constitutional.</p>' +
	                '</div>' +
	                '</div>'
	        }, {
	            // National Air & Space Museum
	            lat: 38.8876,
	            lng: -77.0199,
	            title: 'Supreme Court Agrees to hear a legal challenge to Obamacare',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">Supreme Court Agrees to hear a legal challenge to Obamacare</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> Nov. 14, 2011</p>' +
	                '<p>The Supreme Court agrees to hear a legal challenge to the law after 26 states, led by Florida, petitioned the high court.</p>' +
	                '</div>' +
	                '</div>'
	        }, {
	            // Vietnam Veterans Memorial
	            lat: 38.8913,
	            lng: -77.0477,
	            title: 'Donald Trump wins the 2016 U.S. Election',
	            contentString: '<div class="content">' +
	                '<div class="siteNotice">' +
	                '</div>' +
	                '<h1 class="firstHeading">President-elect Donald Trump promises to dismantle Obamacare</h1>' +
	                '<div class="bodyContent">' +
	                '<p> <b> Date: </b> Nov. 8, 2016</p>' +
	                '<p>Elected on a promise to dismantle Obamacare, Donald Trump has the power to do it. With Republicans controlling both Houses of Congress, a bill to repeal the entire health care law could be passed in January when Trump comes into office. </p>' +
	                '<p> However, most Americans are in favor of most parts of obamacare, raising political risks for Trump if he repeals it entirely. For instance, the provision of Obamacare that allows young adults to stay on their parents health care policies is favored by 90% of Democrats and 82% of Republicans. </p>' +
	                '</div>' +
	                '</div>'
	        }
	        // { lat: 38.5, lng: -78.0 }

	    ];

	    // Infowindows -> show when user clicks on a marker
	    var infowindows = [];
	    for (var i = 0; i < pointsOfInterest.length; i++) {
	        var infowindow = new google.maps.InfoWindow({
	            content: pointsOfInterest[i].contentString
	        });
	        infowindows.push(infowindow);
	    }

	    // All the Markers
	    var markers = [];

	    for (var i = 0; i < pointsOfInterest.length; i++) {
	        var placeLocation = pointsOfInterest[i];
	        var marker;
	        if (i % 2 === 0) {
	            marker = new google.maps.Marker({
	                position: { lat: placeLocation.lat, lng: placeLocation.lng },
	                map: map,
	                icon: "https://maps.google.com/mapfiles/ms/icons/green-dot.png",
	                title: placeLocation.title
	            });
	        } else {
	        	marker = new google.maps.Marker({
	                position: { lat: placeLocation.lat, lng: placeLocation.lng },
	                map: map,
	                icon: "https://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
	                title: placeLocation.title
	            });
	        }
	        markers.push(marker);
	        var infowindow = infowindows[i];
	        google.maps.event.addListener(marker, 'click', function(marker, innerInfoWindow) {
	            console.log(infowindow);
	            return function() {
	                innerInfoWindow.open(map, marker);
	            };
	        }(marker, infowindow));


	    }

	    // Add a marker clusterer to manage the markers.
	    var markerCluster = new MarkerClusterer(map, markers, { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });

	}
