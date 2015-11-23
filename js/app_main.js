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
    for (i = 1; i <= 19; i++){
        tempIndexImages.push("/promo/instagram/images/" + i + ".jpg");
    }

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
    var InstblockTasks = Backbone.View.extend({
        tagName: "div",
        className: "tasks",
        template: _.template($("#instaMainTasksTemplate").html()),

        render_main: function () {
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
    /** Вид левых фотографий */
    var InstblockLeftPhotos = Backbone.View.extend({
        el: '.main_left_photos',
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
        renderTasks: function(){
            this.$el.append(new InstblockTasks().render_main().el);
        },
        /** Я использовал функции как мог */
        renderLeadership: function(item){
            var instblockLeadership = new InstblockLeadership({
                model: item
            });
            this.$el.append(instblockLeadership.render_lead().el);
        },

        sortNamesMain: function(){
            var sortedArrayNames= (_.sortBy(listCollection,'LIKES')).reverse();
            _.each(sortedArrayNames, function (subItem) {
                this.renderLeadership(new Instblock({USERNAME: subItem.USERNAME, LIKES: subItem.LIKES}));
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
            this.$el.empty();
            var i = 1;
            var pos;
            _.each(shuffle(tempIndexImages), function(tempImg){
                if(i < 9){
                    pos = "top";
                } else if (i >= 9 && i < 12){
                    pos = "left";
                } else if (i >= 12 && i < 19){
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
            } else if (position == "left"){
                instblockMainPhotos = new InstblockLeftPhotos({
                    model: image
                });
            } else if (position == "bot"){
                instblockMainPhotos = new InstblockBotPhotos({
                    model: image
                });
            }
            this.$el.append(instblockMainPhotos.render_photos().el);
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
            //this.on("change:showList", this.showUserList, this);
        },

        render: function () {

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
            var _summLikes = 0;
            var listPhotos = this.collection.where({USERNAME: item});
            _.each(listPhotos, function (subItem) {
                _summLikes += subItem.get('LIKES');
            });
            listCollection.push({USERNAME: item, LIKES: _summLikes});

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
            "list": "urlList"
        },

        urlMain: function(){
            directory.getMainImages();
            directory.renderTasks();
            directory.showUserListMain();
        },

        urlFeed: function(){
            directory.renderFeed();
        },

        urlList: function () {
            directory.showUserList();
        }

    });
} (jQuery));

