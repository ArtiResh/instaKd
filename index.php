<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles.css");
?>
<div class="inst_content"></div>
<div class="main_top_photos main_photos"></div>
<div class="main_bot_photos main_photos"></div>
<div class="leadership"></div>

<!---- Главная страница ---->
<script id="instaMainTasksTemplate" type="text/template">
    <div class="current_task"></div>
    <div class="tasks_list"></div>
</script>
<script id="instaMainLeadershipTemplate" type="text/template">
    <div class="leadership_user"><%= USERNAME %> &mdash; <%= LIKES %></div>
</script>
<!---- Фотки на главной странице ---->
<script id="instaMainPhotosTemplate" type="text/template">
    <img src="<%= THUMB %>" />
</script>

<!---- Лента с постами ---->
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

<!---- Спиосок пользователей ---->
<script id="instaUsersList" type="text/template">
    <%= USERNAME %> &mdash; <%= LIKES %>
</script>

<script src="/local/templates/kdmarket/js/fancybox/jquery.fancybox.js" defer></script>
<script src="/local/templates/kdmarket/js/fancybox/helpers/jquery.fancybox-thumbs.js" defer></script>
<script src="js/underscore-min.js" defer></script>
<script src="js/backbone-min.js" defer></script>
<script src="js/app_main.js" defer></script>
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