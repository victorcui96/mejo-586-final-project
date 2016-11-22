<!-- The main HTML file. The HTML uses BEM syntax, which is a standardized way of naming HTML classes. Read about Bem syntax at http://cssguidelin.es/#bem-like-naming -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <title> </title>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->
    <!-- Makes browsers render all elements more consistently and in line with modern standards. -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/50aab16c9f.js"></script>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>


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
<body>
   


<? foreach ($tweetData['statuses'] as $index => $items) {
    // echo $items;
    $userArray = $items['user'];
    $tweetEntities = $items['entities'];
    ?>
    <?php echo "hy"; ?>
    <div class="twitter-tweet"> 
        <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name'];?>"><img src="<?php echo $userArray['profile_image_url_https']; ?>"></a>
            <!-- <div style="float: right"> -->
                <a href="<?php echo 'https://twitter.com/' . $userArray['screen_name']; ?>"> <span><?php echo $userArray['screen_name']; ?></a>
                <p>Number of followers: <strong><?php echo (string) $userArray['followers_count']; ?></strong> </p>
                <p><?php echo $items['text']; ?></p>
                <?php 
                    echo "<pre>";
                                        var_dump($tweetEntities); 
                                    echo "</pre>";   
                ?>             
                <img src="<?php echo $tweetEntities['media'][0]['media_url_https']; ?>">
                <p><?php echo $items['created_at']; ?></p>
                </span>
            <!-- </div> -->
    </div>


 <?php
        // echo $items['text'];
}

?>   

 <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->

    </body>

</html>



