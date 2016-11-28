<?php require_once('header.php'); ?>
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
                      <!--   <script type="text/javascript">
                            function getLocation(data){
                                    console.log(data);
                            }
                        </script> -->
                     <? foreach ($tweetData['statuses'] as $index => $items) {
                            // echo $items;
                            echo "<pre>";
                                print_r($items);
                            echo "</pre>";
                            $userArray = $items['user'];
                            $tweetEntities = $items['entities'];
                            $retweetStatus = $items['retweeted_status'];
                            echo "<pre>";
                                var_dump($userArray['location']);
                            echo "</pre>";
                            // echo "<pre>";
                            //     var_dump($retweetStatus['user']['entities']);
                            // echo "</pre>";
                            // echo "<pre>";
                            //     print_r($tweetEntities);
                            // echo "</pre>";

                            ?>
                            <div class="tweet">
                                <div class="row">
                                    <div class="col-xs-1">
                                       <img src="<?php echo $userArray['profile_image_url_https']; ?>" class="profile-pic">
                                    </div>
                                    <div class="col-xs-11"> 
                                        <div class="user-names">
                                            <p><?php echo $userArray['name']; ?></p>
                                            <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name']; ?>"> <span><?php echo "@" . $userArray['screen_name']; ?></a>
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
                        <script type="text/javascript">
                            function pageComplete(){
                                    $('.tweet').tweetLinkify();
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

<?php require_once('footer.php'); ?>
