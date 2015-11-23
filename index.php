<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles.css");
?>
<div class="promo_head">
    <div class="promo_logo"><img src="images/main/hashtag_big.png" /></div>
    <div class="promo_menu">
        <a href="#users" class="users underline">Участники</a>
        <a href="#rules" class="rules underline">Условия</a>
        <a href="#prizes" class="prizes underline">Призы</a>
    </div>
</div>
<div class="promo_desc">
    <div class="promo_desc_title">Примите участие в нашем селфи-квесте в
        <img src="images/main/instagram_full_logo.png" /> и сделайте свой Новый Год незабываемым!
    </div>
    <div class="promo_steps">
        <div class="step">
            <div class="circle"><img src="images/main/head_menu_1.png" /></div>
            <div class="step_desc"><div class="sub_desc underline">Подпишитесь на</div><div class="sub_desc underline">наш Instagram</div></div>
        </div>
        <span class="arrow"></span>
        <div class="step">
            <div class="circle"><img src="images/main/head_menu_2.png" /></div>
            <div class="step_desc"><div class="sub_desc underline">Выполняйте</div><div class="sub_desc underline">задания квеста</div></div>
        </div>
        <span class="arrow"></span>
        <div class="step">
            <div class="circle"><img src="images/main/head_menu_3.png" /></div>
            <div class="step_desc"><div class="sub_desc underline">Набирайте лайки</div><div class="sub_desc underline">под своим фото</div></div>
        </div>
        <span class="arrow"></span>
        <div class="step">
            <div class="circle"><img src="images/main/head_menu_4.png" /> </div>
            <div class="step_desc"><div class="sub_desc underline">Выиграйте iPhone 6S</div><div class="sub_desc underline">и кучу других призов</div></div>
        </div>
    </div>
</div>
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