<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
        exit;
    }
?>

<?php
topTracks();

function topTracks() {
    $key="4b4ba893ab7e5e613c245f57bf7e3523";
    $country = urlencode($_GET["country"]);
    $url = "http://ws.audioscrobbler.com/2.0/?method=geo.gettoptracks&country=".$country."&api_key=".$key."&format=json";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    curl_close($curl);
	echo $result;
}
?>