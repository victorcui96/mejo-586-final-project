<?php require_once('header.php'); ?>
<body>
<div id="fp-nav" class="right">
    <ul id="menu">
        <li data-menuanchor="firstPage" class="active"><a href="#info-slider"></a></li>
        <li data-menuanchor="secondPage"><a href="#twitter-api"></a></li>
        <li data-menuanchor="3rdPage"><a href="#trump-google-maps"></a></li>
        <li data-menuanchor="4thpage"><a href="#nytimes-api"></a></li>
    </ul>
</div>

<div id="fullpage">
    <div id="info-slider" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="center">All About Obamacare</h1>
                    <h4 class="center">What it is, Pros and Cons, and its future</h4>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="obama-slider">
                        <div class="intro slide center">
                            <div class="slide-content">
                                <h5>What is Obamacare?</h5>
                                <p>lorem</p>
                            </div>
                        </div>
                        <div class="timeline slide"></div>
                        <div class="pros-and-cons slide"></div>
                        <div class="sources slide"></div>
                        <ul class="slick-dots"></ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="twitter-api" class="section">

        <?php
        ini_set('display_errors', 1); //set this to 0 in public
        require_once('TwitterAPIExchange.php');

        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "1738158084-Hdus8owFL6OHb0qkQ4aBrGjKAus5X269VknbGlM",
            'oauth_access_token_secret' => "uVEcl6go5FDGJThAx371W1pgt9LGPSTqh35jKMAt0D9Al",
            'consumer_key' => "6njXWGA0JLyOHaPVoroegriLY",
            'consumer_secret' => "EB0d5XrGiYLS9t4bYI6WSv3GesKKjgMDpD4cw0SrNOetZmi8b5"
        );

        /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
        $url = 'https://api.twitter.com/1.1/blocks/create.json';
        $requestMethod = 'POST';

        /** POST fields required by the URL above. See relevant docs as above **/
        $postfields = array(
            'screen_name' => 'usernameToBlock', 
            'skip_status' => '1'
        );

        /** Perform a POST request and echo the response **/
        // $twitter = new TwitterAPIExchange($settings);
        // echo $twitter->buildOauth($url, $requestMethod)
        //              ->setPostfields($postfields)
        //              ->performRequest();

        /** Perform a GET request and echo the response **/
        /** Note: Set the GET field BEFORE calling buildOauth(); **/
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=#unc&count=100';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);

        $tweetData = json_decode($twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest(), $assoc=TRUE);

        ?>

        <? foreach ($tweetData['statuses'] as $index => $items) {
            // echo $items;
            $userArray = $items['user'];
            $tweetEntities = $items['entities'];
            ?>
            <div class="twitter-tweet"> 
                <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name'];?>"><img src="<?php echo $userArray['profile_image_url_https']; ?>"></a>
                    <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name']; ?>"> <span><?php echo $userArray['screen_name']; ?></a>
                    <p>Number of followers: <strong><?php echo (string) $userArray['followers_count']; ?></strong> </p>
                    <p><?php echo $items['text']; ?></p>
                    <?php 
                        //echo "<pre>";
                          //  var_dump($tweetEntities); 
                        //echo "</pre>";   
                    ?>             
                    <img src="<?php echo $tweetEntities['media'][0]['media_url_https']; ?>">
                    <p><?php echo $items['created_at']; ?></p>
                    </span>
            </div>
        <?php
        // echo $items['text'];
        } ?>
    </div>
    <div id="trump-google-maps" class="section">
        <h1>Trump</h1>
        <h1>Trump</h1>

        <h1>Trump</h1>

        <h1>Trump</h1>


    </div>
    <div id="nytimes-api" class="section" id="twitter-api">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     <div class="articles-container">
                
                    </div>
                </div>
            </div>
        </div>
    </div>

 
</div> <!-- end #fullpage -->

 <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.9/jquery.fullPage.min.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ny-times-api.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->

    </body>

</html>



