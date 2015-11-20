<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.js"); // Галлерея
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.js"); // Галлерея
?>
<body>
<style type="text/css">
    .inst_content #more {
        bottom: 8px;
        margin-left: 80px;
        font-size: 13px;
        font-weight: 700;
        line-height: 20px;
        padding: 3px 15px;
    }
    .photos {
        width: 1100px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .photos .photo {
        flex: 1 20%;
        text-align: center;
    }
    .photos .username {
        margin: 7px 0 25px;
        font: 16px "Segoe UI";
        padding-right: 33px;
    }
    .photos .likes {
        float: right;
    }
</style>
<div class="inst_content">
<?php
/**
 * Instagram PHP API
 */

use MetzWeb\Instagram\Instagram;

require_once "instagram.class.php";

// Initialize class with client_id
// Register at http://instagram.com/developer/ and replace client_id with your own
$instagram = new Instagram('384463ff33314dc6a8e0e129d28b5e25');

$tag = 'kdmarketplace';

// Get recently tagged media
$media = $instagram->getTagMedia($tag);

// Display first results in a <ul>
echo '<div class="photos">';

foreach ($media->data as $data)
{
    echo '<div class="photo"><a href="'.$data->images->standard_resolution->url.'" rel="fancybox" class="fancybox">
    <img src="'.$data->images->thumbnail->url.'"></a><div class="username">'.$data->caption->from->username.'<span class="likes">'.$data->likes->count.'</span></div></div>';
}
echo '</div>';

// Show 'load more' button
echo '<br><button hidden id="more" class="'.$media->pagination->next_max_id.'" data-tag="'.$tag.'">Load more ...</button>';
?>
</div>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            caption : {
                type : 'outside'
            },
            helpers: {
                overlay: {
                    locked: false
                },
                thumbs: {
                    width: 50,
                    height: 50
                }
            }
        });

        var button = $("#more"),
            tag = button.data('tag'),
            canAjax = true;
        function requestMorePosts(){
            var maxid = button.attr('class');
            if(maxid != null && canAjax == true){
                canAjax = false;
                $.ajax({
                    type: 'GET',
                    url: 'ajax.php',
                    data: {
                        tag: "kdmarketplace",
                        max_id: maxid
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        // Output data
                        $.each(data.images, function(i, src) {
                            $('.photos').append(
                                '<div class="photo">' +
                                '<a class="fancybox" rel="fancybox" href="' + data.full_images[i] +'"><img src="' + src + '"></a>' +
                                '<div class="username">' + data.usernames[i] +'<div>' +
                                '</div>'
                            );
                        });

                        $(".fancybox").fancybox({
                            caption : {
                                type : 'outside'
                            },
                            helpers: {
                                overlay: {
                                    locked: false
                                },
                                thumbs: {
                                    width: 50,
                                    height: 50
                                }
                            }
                        });

                        canAjax = true;

                        // Store new maxid
                        button.attr('class', data.next_id);
                    }
                });
            }
        }
        var bottom = $(".inst_content").offset().top + $(".inst_content").height() - $(window).scrollTop();
        if(bottom < 1050){
            requestMorePosts();
        }
        $(window).on('scroll', function() {
            var bottom = $(".inst_content").offset().top + $(".inst_content").height() - $(window).scrollTop();
            if(bottom < 1050){
                requestMorePosts();
            }
        });
    });
</script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");