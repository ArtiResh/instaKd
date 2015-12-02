<?php
use MetzWeb\Instagram\Instagram;

require_once 'instagram.class.php';

// Initialize class for public requests
$instagram = new Instagram('384463ff33314dc6a8e0e129d28b5e25');
$clientID = $instagram->getApiKey();
$tag = 'kdmarket2016';

$result = array();

// Receive AJAX request and create call object
$media = $instagram->getTagMedia($tag);
$maxID = $media->pagination->next_max_id;

$i = 0;
foreach ($media->data as $data) {
    if($data->caption->from->username != "kdmarket"){
        $result[$i]['THUMB'] = $data->images->low_resolution->url;
        $result[$i]['IMAGE'] = $data->images->standard_resolution->url;
        $result[$i]['USERNAME'] = $data->caption->from->username;
        $result[$i]['PROFILE_PICTURE'] = $data->caption->from->profile_picture;
        $result[$i]['LIKES'] = $data->likes->count;
        $result[$i]['URL'] = $data->link;
        $i++;
    }
}

while($maxID != false){
    $call = new stdClass;
    $call->pagination->next_max_id = $maxID;
    $call->pagination->next_url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientID}&max_tag_id={$maxID}";

    // Receive new data
    $media = $instagram->getTagMedia($tag,$auth=false,array('max_tag_id'=>$maxID));
    $maxID = $media->pagination->next_max_tag_id;

    // Collect everything for json output
    foreach ($media->data as $data) {
        if($data->caption->from->username != "kdmarket"){
            $result[$i]['THUMB'] = $data->images->low_resolution->url;
            $result[$i]['IMAGE'] = $data->images->standard_resolution->url;
            $result[$i]['USERNAME'] = $data->caption->from->username;
            $result[$i]['PROFILE_PICTURE'] = $data->caption->from->profile_picture;
            $result[$i]['LIKES'] = $data->likes->count;
            $result[$i]['URL'] = $data->link;
            $i++;
        }
    }
}
$filename = "/home/bitrix/www/promo/instagram/cache/cache.txt";
if (is_writable($filename)) {
    $file = fopen($filename, "w");
    $write = fwrite($file, json_encode($result));
    fclose($file);
}
?>