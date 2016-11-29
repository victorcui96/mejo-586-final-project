<?php ini_set('display_errors', 1); //set this to 0 in public ?>
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
                            // echo $items;
                            $userArray = $items['user'];
                            $tweetEntities = $items['entities'];
                            // print_r($tweetEntities);
                            ?>
                            <div class="tweet">
                                <div class="row">
                                    <div class="col-xs-1">
                                       <img src="<?php echo $userArray['profile_image_url_https']; ?>" class="profile-pic">
                                    </div>
                                    <div class="col-xs-11"> 
                                        <div class="user-names">
                                            <p><?php echo $userArray['name']; ?></p>
                                            <a href="<?php echo 'https://twitter.c1m/' . $userArray['screen_name']; ?>"> <span><?php echo "@" . $userArray['screen_name']; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="tweet-text">
                                             <p><?php echo $items['text']; ?></p>
                                         </div>
                                             <?php 
                                                 //echo "<pre>";
                                                   //  var_dump($tweetEntities); 
                                                 //echo "</pre>";   
                                             ?> 
                                         <!-- Fix line below -->
                                         <!-- TODO: FIND how to get the multimedia attachement from a Tweet -->
                                         <img src="<?php echo $tweetEntities['media'][0]['media_url_https']; ?>">
                                         <p><?php echo $items['created_at']; ?></p>
                                         </span>
                                         <p>Followers: <strong><?php echo (string) $userArray['followers_count']; ?></strong> </p>
                                </div>
                                </div>
                            <hr>
                            </div>  <!-- End 'tweet' container -->
                        <?php
                        } ?>
                        <!-- TOOD: FIGURE this out -->
                        <!-- <script type="text/javascript" src="js/tweetLinkIt.js"></script>
                        <script type="text/javascript">
                            function pageComplete(){
                                    $('.tweet').tweetLinkify();
                            }
                        </script>
                        <?php
                            echo "<script> pageComplete();</script>;" 
                        ?> -->
                    </div>
                </div>
            </div>
        </div>
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



