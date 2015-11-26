<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles_art.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles___art.css");
?>

<div class="main_content">
    <div class="nav list">
        <a class="nav__button" id="btn_feed" href="/promo/instagram/index_art.php#feed">Лента</a>
        <a class="nav__button active" id="btn_list" href="/promo/instagram/index_art.php#list">Список</a>
    </div>
    <div class="list_table_header list">
        <div class="table_col col_01">#</div>
        <div class="table_col col_02"></div>
        <div class="table_col col_03">Участник</div>
        <div class="table_col col_04">Выполнено заданий</div>
        <div class="table_col col_05">Набрано лайков</div>
        <div class="table_col col_06">Рейтинг</div>
        <div class="table_col col_07">Претендует на</div>
    </div>


    <div class="inst_content">
<!--        <input type="text" class="filter_in" placeholder="введите текст">-->
    </div>

</div>

    <script id="instaFeedTemplate" type="text/template">

            <a href="<%= IMAGE %>" rel="fancybox" class="fancybox feed-img">
                <img src="<%= THUMB %>">
            </a>
            <div class="feed-bottom">
                <a href="<%= URL %>" target="_blank" class="feed-picture-username">
                    <%= USERNAME %>
                    <span class="feed-picture-likes">
                    <%= LIKES %>
                    </span>
                </a>
            </div>

    </script>

    <script id="instaUsersList" type="text/template">
        <div class="list_tsble_row list">
            <div class="table_col col_01"><%= POSITION %></div>
            <div class="table_col col_02"><%= PROFILE_PICTURE %></div>
            <div class="table_col col_03"><%= USERNAME %></div>
            <div class="table_col col_04"><%= STEPS %><img src="/promo/instagram/images/main/check_icon.png"/></div>
            <div class="table_col col_05"><%= LIKES %><img src="/promo/instagram/images/main/like_icon.png"/></div>
            <div class="table_col col_06"><%= RATING %></div>
            <div class="table_col col_07">3%</div>
        </div>
<!--        <div class="user_name_block"><%= USERNAME %> &mdash; <%= RATING %> &mdash; <%= STEPS %> &mdash; <%= LIKES %></div>-->
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