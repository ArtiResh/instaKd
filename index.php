<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles.css");
?>
<div class="promo_head">
    <div class="promo_logo"><img src="images/main/hashtag_big.png" /></div>
    <div class="promo_menu">
        <a href="#list" class="users underline">Участники</a>
        <a href="#rules" class="rules underline">Условия</a>
        <a href="#prizes" class="prizes underline">Призы</a>
        <span class="tree"><img src="images/main/tree.png" /></span>
    </div>
</div>

<!---- Шапка акции ---->
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
    <div class="promo_steps_info">
        <div class="step_info">
            <p>Для участия в акции Вам необходимо быть зарегистрированным в сети
                <a href="https://www.instagram.com/"><img src="images/main/instagram_full_logo_big.png" /></a>
                <br />
                и <a class="inst_blue_link" href="https://www.instagram.com/kdmarket/" target="_blank">подписаться на нашу страницу.</a>
            </p>
            <br />
            <a class="inst_blue_link" href="#rules">Больше информации в условиях акции</a>
        </div>
        <div class="step_info">
            <p>Мы приготовили для наших участников 7 простых заданий,<br />
                которые будут опубликованы 2, 5, 9, 12, 16, 19 и 23 декабря, соответственно.</p>
            <br />
            <p>Результат каждого выполнененного задания публикуется участником в его
                <a href="https://www.instagram.com/"><img src="images/main/instagram_full_logo_big.png" /></a>
                <br/>
                в виде 1й фотографии с хештегом <img src="images/main/hashtag_small.png" />
            </p>
            <br />
            <p>Выполнение каждого задания повышает Ваш рейтинг на 1 балл.</p>
            <br />
            <a class="inst_blue_link" href="#rules">Больше информации в условиях акции</a>
        </div>
        <div class="step_info">
            <p>Лайки, которые ставят Вам под фотографиями нашего квеста с хештегом <img src="images/main/hashtag_small.png" /><br />
            также повышают Ваш рейтинг в акции.</p>
            <br />
            <p>Каждое сердечко повышает Ваш рейтинг на 0,01 балл.</p>
            <br />
            <a class="inst_blue_link" href="#rules">Больше информации в условиях акции</a>
        </div>
        <div class="step_info">
            <p>Каждый участник акции получает <a class="inst_blue_link" href="#prizes">скидку 3%</a> на покупку электроники и 10% на аксессуары к ней.</p>
            <br />
            <p>Участники с самым высоким рейтингом будут награждены такими призами, как:<br />
                <a class="inst_blue_link" href="#prizes">Apple iPhone 6</a>, <a class="inst_blue_link" href="#prizes">... ... ... ...</a></p>
            <br />
            <a class="inst_blue_link" href="#rules">Больше информации в условиях акции</a>
        </div>
    </div>
</div>

<!---- Главная страница ---->
<div class="inst_content"></div>
<div class="main_top_photos main_photos"></div>
<div class="main_bot_photos main_photos"></div>
<div class="leadership">
    <a href="#list" class="leadership_title">Участники квеста</a>
    <div class="leadership_table_head">
        <span class="leadership_user">Участник</span>
        <span class="leadership_rating">Рейтинг</span>
        <span class="leadership_prize">Претендует</span>
    </div>
    <div class="leadership_list"></div>
    <a href="#list" class="more">...</a>
    <a href="#list" class="more underline">Показать всех участников</a>
</div>

<!---- Форма обратной связи ---->
<div class="question">
    <div class="body">
        <form id="form">
            <div class="title">Есть вопросы?</div>
            <div class="subtitle">Ваше Имя</div>
            <input class="float_left pad_l_5" type="text" size="16" id="q_name" name="q_name">
            <div class="float_left desc">Ваши данные будут использованы исключительно для связи специалиста с Вами.</div>
            <div class="clear"></div>
            <div class="subtitle">Контакты</div>
            <input class="float_left pad_l_5" type="text" size="27" id="q_contact" name="q_contact">
            <div class="float_left desc">Контактный телефон, e-mail адрес, ссылка на профиль в соц. сети и пр.</div>
            <div class="clear"></div>
            <div class="subtitle">Задайте Ваш вопрос</div>
            <textarea class="pad_l_5 pad_t_5" id="q_issue" name="q_issue"></textarea>
            <p class="bottom-text">Через данную форму Вы можете связаться с нашим специалистом по данной акции. Опишите Ваш вопрос и мы свяжемся с Вами для его уточнения.</p>
            <div class="clear"></div>
            <div class="shadow">
                <button type="button" id="q_button">
                    <div class="q_value">Отправить заявку</div>
                </button>
            </div>
        </form>
    </div>
</div>
<!---- Конец главной ---->

<!---- ШАБЛОН задач ---->
<script id="instaMainTasksTemplate" type="text/template">
    <div class="current_task">
        <div class="all_tasks">
            <div class="task active" id="task_0">
                <div class="task_number">
                    <span>Задание</span>
                    <p>#1</p>
                </div>
                <img src="images/main/task_1.png" />
                <div class="task_desc">
                    <p>Проще не бывает!</p>
                    <p>Сделай селфи на улицах нашего города с любым из наших акционных баннеров и выложи фотку в свой
                        Instagram с хештегом</p>
                    <img src="images/main/hashtag_small.png">
                </div>
            </div>
            <div class="task" id="task_1">
                <div class="task_number">
                    <span>Задание</span>
                    <p>#2</p>
                </div>
                <img src="images/main/task_1.png" />
                <div class="task_desc">
                    <p>ЭТО ЗАДАНИЕ 2</p>
                    <p>Сделай селфи на улицах нашего города с любым из наших акционных баннеров и выложи фотку в свой
                        Instagram с хештегом</p>
                    <img src="images/main/hashtag_small.png">
                </div>
            </div>
        </div>
    </div>
    <div class="tasks_list">
        <div class="task active"><span>#1</span> <p>02.12.15</p></div>
        <div class="task"><span>#2</span> <p>05.12.15</p></div>
        <div class="task disabled"><span>#3</span> <p>09.12.15</p></div>
        <div class="task disabled"><span>#4</span> <p>12.12.15</p></div>
        <div class="task disabled"><span>#5</span> <p>16.12.15</p></div>
        <div class="task disabled"><span>#6</span> <p>19.12.15</p></div>
        <div class="task disabled"><span>#7</span> <p>23.12.15</p></div>
    </div>
</script>

<!---- ШАБЛОН списка участников ---->
<script id="instaMainLeadershipTemplate" type="text/template">
    <div class="leadership_line <%= CLASS %>">
        <span class="position"><%= POSITION %></span>
        <a href="#list" class="leadership_user"><span class="underline"><%= USERNAME %></span></a>
        <a href="#list" class="leadership_rating"><span class="underline"><%= RATING %></span></a>
        <a href="#list" class="leadership_prize"><%= PRIZE %></a>
    </div>
</script>

<!---- ШАБЛОН фоток на главной странице ---->
<script id="instaMainPhotosTemplate" type="text/template">
    <img src="<%= THUMB %>" />
</script>

<!---- ШАБЛОН ленты с постами ---->
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

<!---- ШАБЛОН списка пользователей ---->
<script id="instaUsersList" type="text/template">
    <%= USERNAME %> &mdash; <%= LIKES %>
</script>

<script src="/local/templates/kdmarket/js/fancybox/jquery.fancybox.js" defer></script>
<script src="/local/templates/kdmarket/js/fancybox/helpers/jquery.fancybox-thumbs.js" defer></script>
<script src="js/underscore-min.js" defer></script>
<script src="js/backbone-min.js" defer></script>
<script src="js/app_main.js" defer></script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>