<?php
/**
 * Instagram PHP API
 */

use MetzWeb\Instagram\Instagram;

require_once 'instagram.class.php';

// Initialize class for public requests
$instagram = new Instagram('384463ff33314dc6a8e0e129d28b5e25');

// Receive AJAX request and create call object
$tag = $_GET['tag'];
$maxID = $_GET['max_id'];
$clientID = $instagram->getApiKey();

$call = new stdClass;
$call->pagination->next_max_id = $maxID;
$call->pagination->next_url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientID}&max_tag_id={$maxID}";

// Receive new data
$media = $instagram->getTagMedia($tag,$auth=false,array('max_tag_id'=>$maxID));

var_dump($media);

// Collect everything for json output
$images = array();
$full_images = array();
$usernames = array();
foreach ($media->data as $data) {
    $images[] = $data->images->thumbnail->url;
    $full_images[] = $data->images->standard_resolution->url;
    $usernames[] = $data->caption->from->username;
}

echo json_encode(array(
    'next_id' => $media->pagination->next_max_tag_id,
    'images'  => $images,
    'full_images'  => $full_images,
    'usernames'  => $usernames
));
?>