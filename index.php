<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/js/fancybox/helpers/jquery.fancybox-thumbs.css");
$APPLICATION->SetAdditionalCSS("/promo/instagram/css/styles.css");
?>
<style>
    .index_top_instagram_promo {
        background: url('/promo/instagram/images/index/bg.jpg') right bottom no-repeat, #ea4012;
        width: 1178px;
        height: 360px;
    }
    .instagram_prizes {
        display: flex;
        align-content: flex-end;
        justify-content: center;
    }
</style>
<div class="index_top_instagram_promo">
    <div class="instagram_prizes">
        <img src="/promo/instagram/images/index/left.png" />
        <img src="/promo/instagram/images/index/center.png" />
        <img src="/promo/instagram/images/index/right.png" />
    </div>
    <img src="/promo/instagram/images/index/bottom.png" />
</div>
<!---- Шапка акции ---->
<div class="promo_head">
    <div class="promo_logo">
        <a href="/promo/instagram/"><img src="images/main/hashtag_big.png" /></a>
    </div>
    <div class="promo_menu">
        <a href="#list" class="underline">Участники</a>
        <a href="#rules" class="underline">Условия</a>
        <a href="#prizes" class="underline">Призы</a>
        <span class="tree"><img src="images/main/tree.png" /></span>
    </div>
</div>

<!---- Главная страница ---->
<div class="inst_content"></div>

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


<!---- Условия акции ---->
<div class="rules">
    <div class="rules_left">
        <div class="rules_title">Подробно</div>

        <p>Условия акции:</p>

        <ol>
            <li>Акция действует со 2 по 29 декабря 2015 года. Определение победителей и награждение участников
                производится 28-30 декабря.
            </li>
            <li>Актуальные условия акции расположены на странице kdmarket.ru/liromo/instagram/#rules</li>
            <li>Задания для участников данной акции публикуются 2, 5, 9, 12, 16, 19 и 23 декабря 2015 года, на
                странице kdmarket.ru/liromo/instagram/
            </li>
            <li>Участником данной акции является любой пользователь, который:<br/>
                - Имеет собственный аккаунт в сети Instagram.<br/>
                - Является подписчиком нашей страницы в Instagram.<br/>
                - Выполнил одно любое задание текущей акции.<br/>
                - Находится в списке участников данной акции расположенном на странице
                kdmarket.ru/liromo/instagram/#list<br/>
                (данный список формируется автоматически и обновляется 1 раз в час).
            </li>
            <li>Чтобы появиться в списке участников акции, Вам необходимо выполнить одно любое задание текущей акции
                и опубликовать в своем аккаунте в Intagram фотографию с хештегом #kdmarket2016, на которой будете
                запечатлены Вы и результат выполненного задания.
            </li>
            <li>Участнику, который претендует на один из главных призов необходимо выполнять актуальные задания и
                завершить их выполнение до подведения итогов акции.
            </li>
            <li>Каждый участник акции получает скидку 3% на технику и аксессуары при покупке в любом нашем салоне или
                интернет-магазине.
            </li>
            <li>Каждый участник акции выполнивший все задания получает скидку 5% на технику и аксессуары при покупке
                в любом нашем салоне или интернет-магазине.
            </li>
            <li>Действие скидок и специальных предложений для участников данной акции не распространяется на
                товары/услуги магазина, для которых предусматриваются иные действующие акции.
            </li>
            <li>Акция действительна для жителей Калининграда и Калининградской области.</li>
            <li>Участникам запрещается искусственная накрутка лайков.</li>
            <li>Участникам запрещается публикация более одной фотографии с результатами выполнения одного задания.
            </li>
            <li>Участникам запрещается публикация фотографий с хештегом #kdmarket2016 не относящихся к выполнению
                заданий текущего конкурса.
            </li>
            <li>Для участников нарушающих условия акции предусматривается «бан по решению администрации», который
                вручается, как правило, без предупреждения.
            </li>
            <li>Приз «Скидка» предоставляется участникам акции с 2 по 31 декабря 2015 года.</li>
            <li>Уточнить условия акции можно по тел. 90-30-70.</li>
        </ol>
    </div>
    <div class="rules_right">
        <div class="rules_title">Кратко, основное</div>

        <div class="sub_title">О заданиях:</div>
        <ol>
            <li>Всего 7 заданий, публикуются 2, 5, 9, 12, 16, 19 и 23 декабря.</li>
            <li>Для выигрыша в акции не обязательно выполнять все задания и не важен порядок выполнения, важен только
                Ваш конечный рейтинг, который формируется из баллов за задания и за лайки.</li>
        </ol>

        <div class="sub_title">О рейтинге:</div>
        <ol>
            <li>Выполнив 1 задание Вы получаете 1 балл.</li>
            <li>Если под Вашим фото с хештегом #kdmarket2016 поставят лайк, то Вы получаете к своему рейтингу 0,01 балла.</li>
        </ol>

        <div class="sub_title">О призах:</div>
        <ol>
            <li>Как получить тот или иной приз смотри на странице призы.</li>
            <li>Приз «Скидка» присуждается за выполнение одного любого задания и предоставляется на протяжении всего декабря 2015 года.</li>
            <li>Определение победителей и вручение призов - 28-30 декабря.</li>
        </ol>

        <div class="sub_title">О нарушениях:</div>
        <ol>
            <li>Запрещаются любые способы накрутки рейтинга, лайков и пр.</li>
            <li>Запрещается публикация более одной фотографии с результатами одного выполненного задания, а также
                публикация фотографий не относящихся к акции под хештегом #kdmarket2016.</li>
            <li>За нарушение условий акции - бан без предупреждения.</li>
        </ol>
    </div>
</div>
<!---- Конец условий ---->

<!---- Призы ---->
<div class="prizes">
    <div class="prize">
        <div class="position">
            <span>1</span>
            <p>место</p>
        </div>
        <div class="img">
            <img src="images/prizes/prize_1.png" />
        </div>
        <div class="desc">
            <div class="title">Приз</div>
            <div class="prize_name">Смартфон Apple iPhone 6</div>
            <div class="title">Как получить?</div>
            <div class="text">Выполните задания и наберите больше всех лайков чтобы Ваш рейтинг был максимальным!
                Займите первое место в рейтинге и продержитесь на нем до 28 декабря.
            </div>
        </div>
    </div>
    <div class="prize">
        <div class="position">
            <span>2-5</span>
            <p>место</p>
        </div>
        <div class="img">
            <img src="images/prizes/prize_2.png" />
        </div>
        <div class="desc">
            <div class="title">Приз</div>
            <div class="prize_name">Умные часы Sony SmartWatch 2</div>
            <div class="title">Как получить?</div>
            <div class="text">Выполняйте задания, набирайте лайки и войдите в пятерку лидеров рейтинга!</div>
        </div>
    </div>
    <div class="prize">
        <div class="position">
            <span>6-10</span>
            <p>место</p>
        </div>
        <div class="img">
            <img src="images/prizes/prize_3.png" />
        </div>
        <div class="desc">
            <div class="title">Приз</div>
            <div class="prize_name">Монопод Momax</div>
            <div class="title">Как получить?</div>
            <div class="text">Войдите в десятку лидеров рейтинга по заданиям и лайкам!</div>
        </div>
    </div>
    <div class="prize">
        <div class="position">
            <span>7</span>
            <p>выполненных заданий</p>
        </div>
        <div class="img">
            <img src="images/prizes/prize_4.png" />
        </div>
        <div class="desc">
            <div class="title">Приз</div>
            <div class="prize_name">Скидка на электронику и аксессуары</div>
            <div class="title">Как получить?</div>
            <div class="text">Просто выполните все задания и если Вы не попадете в десятку лучших - мы сделаем Вам
                скидку на любой наш товар в декабре!
            </div>
        </div>
    </div>
    <div class="prize">
        <div class="position">
            Каждому<br/> участнику
        </div>
        <div class="img">
            <img src="images/prizes/prize_5.png" />
        </div>
        <div class="desc">
            <div class="title">Приз</div>
            <div class="prize_name">Скидка на электронику и аксессуары</div>
            <div class="title">Как получить?</div>
            <div class="text">Проще не бывает! Выполните одно любое задание нашего квеста и скидка 3% Ваша!</div>
        </div>
    </div>
</div>
<!---- Конец призов ---->



<!---- ШАБЛОН контейнера главной страницы ---->
<script id="instaMainWrapTemplate" type="text/template">
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
    <div class="main_top_photos main_photos"></div>
    <div class="main_bot_photos main_photos"></div>
    <div class="leadership">
        <a href="#list" class="leadership_title">Участники квеста</a>
        <div class="leadership_table_head">
            <span class="leadership_user">Участник</span>
            <span class="leadership_rating">Рейтинг</span>
            <span class="leadership_prize">Претендует на</span>
        </div>
        <a href="#list" class="more underline">Показать всех участников</a>
    </div>
</script>

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
    <div class="leadership_line" style="z-index: <%= 10 - POSITION %>">
        <span class="position"><%= POSITION %></span>
        <a href="#list" class="leadership_user"><span class="underline"><%= USERNAME %></span></a>
        <a href="javascript: void(0)" class="leadership_rating">
            <span class="underline"><%= RATING %></span>
            <div class="rating_detail">
                <div class="title">Выполнено заданий:</div>
                <div class="completed_tasks"><%= STEPS %><img src="images/main/check_icon.png" /></div>
                <div class="title">Набрано лайков:</div>
                <div class="likes_count"><%= LIKES %><img src="images/main/like_icon.png" /></div>
            </div>
        </a>
        <a href="#prizes" class="leadership_prize"><%= PRIZE %></a>
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