<?php ini_set('display_errors', 1); //set this to 0 in public ?>
<!-- set the default timezone to use. -->
<?php date_default_timezone_set('America/New_York'); ?>

<?php require_once('header.php'); ?>
<body>
<div id="fp-nav" class="right">
    <ul id="menu">
        <li data-menuanchor="firstPage" class="active"><a href="#fullscreen-obama"></a></li>
        <li data-menuanchor="secondPage"><a href="#info-slider"></a></li>
        <li data-menuanchor="3rdPage"><a href="#twitter-api"></a></li>
        <li data-menuanchor="4thpage"><a href="#trump-google-maps"></a></li>
        <li data-menuanchor="lastpage"><a href="#nytimes-api"></a></li>
    </ul>
</div>

<div id="fullpage">
    <div id="fullscreen-obama" class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <img src="images/obama-face.jpg" alt="obama's face" class="responsive">
                    
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="obamacare-intro">
                     <h1 class="">Obamacare</h1>
                     <h3>What it is, pros and cons, and its future</h3>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div id="info-slider" class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 obamacare-intro">
                    <h1 class="center animated fadeInUpBig " data-wow-delay="1s" data-wow-duration="15s">All About Obamacare</h1>
                    <h4 class="center gentium">What it is, Pros and Cons, and its future</h4>
                    <img src="images/obamacare.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="obama-slider">
                        <div class="intro slide center fp-auto-height-responsive">
                            <div class="slide-content">
                                <h4>What is Obamacare?</h4>
                                <ul>
                                    <?php
                                        for ($i = 0; $i <= 1.0; $i += 0.5) { ?>
                                            <li class="animated fadeInLeftBig wow" data-wow-delay="<?php echo $i . 's';?>">
                                                <i class="fa fa-circle-thin fa-2x">
                                                    <span class="number">
                                                        <?php
                                                            if ($i == 0) {
                                                                echo "1";
                                                            }
                                                            elseif ($i == 0.5) {
                                                                echo "2";
                                                            }
                                                            else {
                                                                echo "3";
                                                            }
                                                        ?>
                                                    </span>
                                                </i>
                                                <?php
                                                    if ($i == 0) {
                                                         echo "Health care law signed by Obama in 2010. Its stated purpose is to increase the number of Americans with health insurance and decrease health care costs. ";
                                                     } 
                                                     elseif ($i == 0.5) {
                                                         echo "Under Obamacare, no one can be <em>excluded</em> from health insurance, even if you're sick, and everyone <em>has</em> to have insurance. ";
                                                     }
                                                     else {
                                                        echo "Most people under 65 still get their health insurance from their employer. Only affects people who buy health plans on a government-run marketplace.";
                                                     }
                                                ?>
                                            </li>
                                     <?php } ?>   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End container-fluid -->
        <div class="timeline slide"></div> 
        <div class="pros-and-cons slide"></div>
        <div class="sources slide"></div>
    </div>
    <div id="twitter-api" class="section">

        <?php
        require_once('TwitterAPIExchange.php');

        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "1738158084-Hdus8owFL6OHb0qkQ4aBrGjKAus5X269VknbGlM",
            'oauth_access_token_secret' => "uVEcl6go5FDGJThAx371W1pgt9LGPSTqh35jKMAt0D9Al",
            'consumer_key' => "6njXWGA0JLyOHaPVoroegriLY",
            'consumer_secret' => "EB0d5XrGiYLS9t4bYI6WSv3GesKKjgMDpD4cw0SrNOetZmi8b5"
        );

       

        /** Perform a POST request and echo the response **/
        // $twitter = new TwitterAPIExchange($settings);
        // echo $twitter->buildOauth($url, $requestMethod)
        //              ->setPostfields($postfields)
        //              ->performRequest();

        /** Perform a GET request and echo the response **/
        /** Note: Set the GET field BEFORE calling buildOauth(); **/
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=#obamacare&count=20';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);

        $tweetData = json_decode($twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest(), $assoc=TRUE);

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="center">Latest Tweets About #Obamacare</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="twitter-tweets">
                        <? foreach ($tweetData['statuses'] as $index => $items) {
                            $userArray = $items['user'];
                            $tweetEntities = $items['entities'];
                            ?>
                            <div class="tweet">
                                <div class="row">
                                    <div class="col-xs-1">
                                       <img src="<?php echo $userArray['profile_image_url_https']; ?>" class="profile-pic">
                                    </div>
                                    <div class="col-xs-9"> 
                                        <div class="user-names">
                                            <p><?php echo $userArray['name']; ?></p>
                                            <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name']; ?>"> <span><?php echo "@" . $userArray['screen_name']; ?></a>
                                           
                                        </div>

                                    </div>
                                    <div class="col-xs-2">
                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><title>Logo: Twitter</title><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62c-3.122.162-6.22-.646-8.86-2.32 2.702.18 5.375-.648 7.507-2.32-2.072-.248-3.818-1.662-4.49-3.64.802.13 1.62.077 2.4-.154-2.482-.466-4.312-2.586-4.412-5.11.688.276 1.426.408 2.168.387-2.135-1.65-2.73-4.62-1.394-6.965C5.574 7.816 9.54 9.84 13.802 10.07c-.842-2.738.694-5.64 3.434-6.48 2.018-.624 4.212.043 5.546 1.682 1.186-.213 2.318-.662 3.33-1.317-.386 1.256-1.248 2.312-2.4 2.942 1.048-.106 2.07-.394 3.02-.85-.458 1.182-1.343 2.15-2.48 2.71z"/></svg>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="tweet-text">
                                             <p><?php echo $items['text']; ?></p>
                                         </div>
                                         <?php
                                             if (isset($tweetEntities['media'])) { ?>
                                                <img class="twitter-multimedia" src="<?php echo $tweetEntities['media'][0]['media_url_https']; ?>">
                                        <?php   }  ?>
                                        
                                    </div>
                            </div>
                                <div class="row mobile-hidden">
                                    <div class="col-xs-4">
                                         
                                         <p>Followers: <strong><?php echo (string) $userArray['followers_count']; ?></strong> </p>
                                    </div>
                                    <div class="col-xs-8">
                                        <p class="tweet-created-at"><?php echo date('Y-m-d g a e', strtotime($items['created_at'])); ?></p>
                                    </div>
                                </div>
                            </div>  <!-- End 'tweet' container -->
                        <?php
                        } ?>
                        <script type="text/javascript" src="js/tweetLinkIt.js"></script>
                        <script type="text/javascript">
                            function pageComplete(){
                                    $('.tweet-text').tweetLinkify();
                            }
                        </script>
                        <?php
                            echo "<script> pageComplete();</script>;" 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="trump-google-maps" class="section">
        <h3 class="center">Key events related to Obamacare</h3>
        <div id="map"></div>


    </div>
    <div id="nytimes-api" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="center">Latest NY Times Articles about Obamacare</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <div class="articles-container">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div> <!-- end #fullpage -->
<?php require_once('footer.php'); ?>    



