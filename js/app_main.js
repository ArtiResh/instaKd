(function ($) {
    var inst, directory, instaRouter;
    var listCollection = [];

    function shuffle(array) {
        var m = array.length, t, i;

        // While there remain elements to shuffle…
        while (m) {

            // Pick a remaining element…
            i = Math.floor(Math.random() * m--);

            // And swap it with the current element.
            t = array[m];
            array[m] = array[i];
            array[i] = t;
        }

        return array;
    }

    /** Заполняем массив с временными картинками */
    var tempIndexImages = [];
    for (i = 1; i <= 16; i++){
        tempIndexImages.push("/promo/instagram/images/" + i + ".jpg");
    }

    /** Заполняем массив с призами */
    var prizesArray = [
        "<img src='images/main/prize_icon_1.png' /><span class='underline prize_desc'>iPhone 6</span>",
        "<img src='images/main/prize_icon_2.png' /><span class='underline prize_desc'>Sony Watch 2</span>",
        "<img src='images/main/prize_icon_3.png' /><span class='underline prize_desc'>Монопод Momax</span>",
        "<span class='underline prize_desc'>5%</span>",
        "<span class='underline prize_desc'>3%</span>"
    ];

    $.ajax({
        type:"GET",
        url:"/promo/instagram/cache/cache.txt",
        cache: false
    }).done(function(data){
        inst = JSON.parse(data);
        directory = new DirectoryView();
        instaRouter = new InstaRout();
        Backbone.history.start();
    });

    var Instblock = Backbone.Model.extend({
        defaults: {
            THUMB: "",
            IMAGE: "",
            USERNAME: "",
            LIKES: "",
            URL: "",
            PROFILE_PICTURE:"",
            VISIBLE:'hidden'
        }
    });

    var Instagramm = Backbone.Collection.extend({
        model: Instblock
    });

    var InstblockView = Backbone.View.extend({
        tagName: "div",
        className: "photo",
        template: _.template($("#instaFeedTemplate").html()),

        render: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    var InstblockUsers = Backbone.View.extend({
        tagName: "div",
        className: "user",
        template: _.template($("#instaUsersList").html()),

        render: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    /** Вид главной страницы
     *
     * Вид заданий
     *
     * */
    var InstblockMainWrap = Backbone.View.extend({
        tagName: "div",
        className: "promo_desc",
        template: _.template($("#instaMainWrapTemplate").html()),

        render_main: function () {
            this.$el.html(this.template);
            return this;
        }
    });
    var InstblockTasks = Backbone.View.extend({
        tagName: "div",
        className: "tasks",
        template: _.template($("#instaMainTasksTemplate").html()),

        render_tasks: function () {
            this.$el.append(this.template);
            return this;
        }
    });

    /** Вид Таблицы лидеров*/
    var InstblockLeadership = Backbone.View.extend({
        el: '.leadership',
        tagName: "div",
        className: "",
        template: _.template($("#instaMainLeadershipTemplate").html()),

        render_lead: function () {
            this.$el.append(this.template(this.model.toJSON()));
            return this;
        }
    });

    /** Вид верхних фотографий */
    var InstblockTopPhotos = Backbone.View.extend({
        el: '.main_top_photos',
        template: _.template($("#instaMainPhotosTemplate").html()),

        render_photos: function () {
            this.$el.append(this.template(this.model.toJSON()));
            return this;
        }
    });
    /** Вид нижних фотографий */
    var InstblockBotPhotos = Backbone.View.extend({
        el: '.main_bot_photos',
        template: _.template($("#instaMainPhotosTemplate").html()),

        render_photos: function () {
            this.$el.append(this.template(this.model.toJSON()));
            return this;
        }
    });
    /** ---------------------------------------------------------------------- */

    var DirectoryView = Backbone.View.extend({
        /** Отрисовка главной страницы */
        renderMainPage: function(){
            var instblockMainPage = new InstblockMainWrap();
            this.$el.append(instblockMainPage.render_main().el);
            var step_info_timeout;
            $(".promo_steps .step").mouseenter(function(){
                $(".step_info.active").removeClass('active');
                clearTimeout(step_info_timeout);
                var step_info = $(".step_info").eq($(this).index() / 2);
                $(".main_top_photos").css({marginTop: step_info.height() + 'px'});
                step_info.addClass('active');
            });
            $(".promo_desc").mouseleave(function(){
                clearTimeout(step_info_timeout);
                $(".step_info.active").removeClass('active');
                step_info_timeout = setTimeout(function(){
                    $(".main_top_photos").css({marginTop: '0px'});
                }, 200);
            });
            setTimeout(function(){
                $(".promo_banner div.active").removeClass('active');
                setTimeout(function(){
                    $(".promo_banner div:last").addClass('active');
                }, 500);
            }, 3000);
            directory.getMainImages();
            directory.renderTasks();
            directory.showUserListMain();
        },
        renderTasks: function(){
            this.$el.append(new InstblockTasks().render_tasks().el);
            $(".tasks_list .task:not(.disabled)").click(function(){
                if(!$(this).hasClass('active')){
                    $(".task.active").removeClass('active');
                    $("#task_" + $(this).index()).addClass('active');
                    $(this).addClass('active');
                }
            });
        },
        /** Я использовал функции как мог */
        renderLeadership: function(item){
            var instblockLeadership = new InstblockLeadership({
                model: item
            });
            this.$el.append(instblockLeadership.render_lead().el);
            $("a.leadership_rating").hover(function(){
                $(this).children('.rating_detail').addClass('active');
            }, function(){
                $(this).children('.rating_detail').removeClass('active');
            });
        },

        sortNamesMain: function(){
            var sortedArrayNames= (_.sortBy(listCollection,'RATING')).reverse();
            var prizeId, prize = "", winner = "";
            _.each(sortedArrayNames, function (subItem, i) {
                if(i < 10){
                    if(i == 0){
                        prize = prizesArray[0];
                        prizeId = 1;
                    } else if(i > 0 && i < 5) {
                        prize = prizesArray[1];
                        prizeId = 2;
                    } else if(i > 4 && i < 10) {
                        prize = prizesArray[2];
                        prizeId = 3;
                    }
                    this.renderLeadership(new Instblock(
                        {
                            USERNAME: subItem.USERNAME, LIKES: subItem.LIKES, RATING: subItem.RATING,
                            POSITION: i + 1, PRIZE: prize, PRIZE_ID: prizeId, STEPS: subItem.STEPS
                        }
                    ));
                }
            }, this);
        },

        showUserListMain: function () {
            this.collection.reset(inst);
            var _listNames = _.uniq(this.collection.pluck('USERNAME'));
            _.each(_listNames, function (item) {
                this.getUserInform(item);
            }, this);
            this.sortNamesMain();
        },
        /** Отрисовка фоток на главной странице */
        getMainImages: function(){
            var i = 1;
            var pos;
            _.each(shuffle(tempIndexImages), function(tempImg){
                if(i < 9){
                    pos = "top";
                } else if (i >= 9 && i <= 16){
                    pos = "bot";
                }
                this.renderMainPhotos(new Instblock({THUMB:tempImg}), pos);
                i++;
            }, this);
        },
        renderMainPhotos: function(image, position){
            var instblockMainPhotos;
            if(position == "top"){
                instblockMainPhotos = new InstblockTopPhotos({
                    model: image
                });
            } else if (position == "bot"){
                instblockMainPhotos = new InstblockBotPhotos({
                    model: image
                });
            }
            this.$el.append(instblockMainPhotos.render_photos().el);
        },
        clearPage: function(){
            this.$el.empty();
        },
        /** ---------------------------------------------------------------------- */

        el: $(".inst_content"),

        events: {
            'click .username': 'clickName'
        },

        initialize: function () {
            this.collection = new Instagramm(inst);
            this.render();
            this.trackScrolling();
        },


        renderFeed: function() {
            this.$el.empty();
            var i = 0;
            _.each(this.collection.models, function (item) {
                if(i < 20){
                    item.set("VISIBLE", "showed");
                    this.renderItem(item);
                }
                i++;
            }, this);
        },

        renderItem: function (item) {
            var instblockView = new InstblockView({
                model: item
            });
            this.$el.append(instblockView.render().el);
        },

        renderUser: function(item) {
            var instblockUsers = new InstblockUsers({
                model: item
            });
            this.$el.append(instblockUsers.render().el);
        },

        showNext: function(){
            var i = 0;
            var hiddens = _.filter(this.collection.models, function(el){
                if(el.attributes.VISIBLE == 'hidden' && i < 20){
                    this.renderItem(el);
                    el.set("VISIBLE", "showed");
                    i++;
                }
            }, this);
        },

        showUserList: function () {
            this.$el.empty();
            this.collection.reset(inst);
            var _listNames = _.uniq(this.collection.pluck('USERNAME'));
            _.each(_listNames, function (item) {
                this.getUserInform(item);
            }, this);
            this.sortNames();
        },

        getUserInform: function (item) {
            var _summLikes  = 0, _summPhotoSteps = 0, _rating  = 0;
            var listPhotos = this.collection.where({USERNAME: item});
            _.each(listPhotos, function (subItem) {
                _summLikes += subItem.get('LIKES');
                _summPhotoSteps++;
            });
            _rating = _summPhotoSteps + _summLikes/100;
            listCollection.push({USERNAME: item, LIKES: _summLikes, RATING: _rating, STEPS: _summPhotoSteps});
        },

        sortNames: function(){
            var sortedArrayNames= (_.sortBy(listCollection,'LIKES')).reverse();
            _.each(sortedArrayNames, function (subItem) {
                this.renderUser(new Instblock({USERNAME: subItem.USERNAME, LIKES: subItem.LIKES}));
            }, this);

        },

        clickName : function() {
            console.log(this.showNext());
        },


        trackScrolling: function () {
            if(window.location.hash == "feed"){
                return $(window).on('scroll', _.throttle((function (_this) {
                    return function (event) {
                        var threshold = $(_this.el).offset().top + $(_this.el).height() - $(window).scrollTop();
                        if (threshold < 1050) {
                            _this.showNext();
                            return Backbone.trigger('page:scrollbottom');
                        }
                    };
                })(this), 300));
            }
        }
    });

    var InstaRout = Backbone.Router.extend({
        routes: {
            "": "urlMain",
            "feed":"urlFeed",
            "list": "urlList",
            "rules": "urlStatic",
            "prizes": "urlStatic",
            "prizes/*prize": "urlStatic"
        },

        urlMain: function(){
            directory.renderMainPage();
        },

        urlFeed: function(){
            directory.renderFeed();
        },

        urlList: function () {
            directory.showUserList();
        },

        urlStatic: function (prize) {
            directory.clearPage();
            showStatic(prize);
        }

    });
} (jQuery));

function switchQuestion(){
    if(window.location.hash != "" && (window.location.hash.indexOf("prizes") != -1 || window.location.hash.indexOf("rules") != -1)){
        $(".question").css('display', 'none');
    } else {
        $(".question").css('display', 'block');
    }
}
function showStatic(prize){
    if(window.location.hash.indexOf("rules") != -1){
        $(".rules").addClass('active');
        $(".prizes").removeClass('active');
    } else if(window.location.hash.indexOf("prizes") != -1) {
        $(".prizes").addClass('active');
        if(prize != "" && prize != null){
            $(window).scrollTop($(".prize:nth-of-type(" + prize +")").offset().top + $(".prize:nth-of-type(" + prize +")").height() / 2 - $(window).height() / 2)
        }
        $(".rules").removeClass('active');
    }
}
$(window).on('hashchange', function() {
    switchQuestion();
}).load(function(){
    $(".question form button").click(function(){
        if (empty($("#q_name").val()) || empty($("#q_contact").val()) || empty($("#q_issue").val())) {
            lightbox.runLoad('instagram_question', {name: false, contact: false, issue: false});
            return false;
        } else {
            lightbox.runLoad('instagram_question', {name: $("#q_name").val(), contact: $("#q_contact").val(), issue: $("#q_issue").val()});
        }
    });
});
$(document).ready(function(){
    switchQuestion();
});