<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles_art.css");
?>
    <input type="text" class="filter_in" placeholder="введите текст">
    <div class="inst_content">

    </div>
    <script id="instaMainTemplate" type="text/template">
</script>

    <script id="instaFeedTemplate" type="text/template">
        <a href="<%= IMAGE %>" rel="fancybox" class="fancybox">
            <img src="<%= THUMB %>">
        </a>
        <a href="<%= URL %>" target="_blank" class="username">
            <%= USERNAME %>
        <span class="likes">
        <%= LIKES %>
        </span>
        </a>
    </script>

    <script id="instaUsersList" type="text/template">
        <div class="user_name_block"><%= USERNAME %> &mdash; <%= LIKES %></div>
    </script>


    <script src="/local/templates/kdmarket/js/fancybox/jquery.fancybox.js"></script>
    <script src="/local/templates/kdmarket/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
    <script src="js/underscore-min.js"></script>
    <script src="js/backbone-min.js"></script>
    <script src="js/app.js"></script>
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
        });
    </script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>