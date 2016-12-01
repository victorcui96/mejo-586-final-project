<?php
	
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "1738158084-Hdus8owFL6OHb0qkQ4aBrGjKAus5X269VknbGlM",
            'oauth_access_token_secret' => "uVEcl6go5FDGJThAx371W1pgt9LGPSTqh35jKMAt0D9Al",
            'consumer_key' => "6njXWGA0JLyOHaPVoroegriLY",
            'consumer_secret' => "EB0d5XrGiYLS9t4bYI6WSv3GesKKjgMDpD4cw0SrNOetZmi8b5"
        );
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=#obamacare&geocode=39.9072,-77.0369,30mi&count=100';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);

        $tweetData = json_decode($twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest(), $assoc=TRUE);
        $tweets = [];
        echo count($tweetData);
        foreach ($tweetData as $index => $items) {
        	// append $items to $userArray
        	$tweets[] = $items;
        	echo "<pre>";
        		print_r($items);
        	echo "</pre>";
       ?>
        	<!-- <script type="text/javascript">
        		var test ="<?php ; ?>";
        		console.log(test);
        	</script>
        	 -->
        <?php } 
         ?>


<!-- <script type="text/javascript">
var bool = "<?php echo 1; ?>";
	function initMap() {
	   // Create a map object pphbandand specify the DOM element for display.
	    var map = new google.maps.Map(document.getElementById('map'), {
	        center: { lat: 39.9072, lng: -77.0369 }, // Washington DC
	        mapTypeId: 'terrain',
	        scrollwheel: false,
	        zoom: 10
	    });

	    // Create an array of alphabetical characters used to label the markers.
	    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}
</script>

<?php
	echo "<script> initMap(); </script>"; 
?> -->
