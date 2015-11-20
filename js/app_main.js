(function ($) {
    /** Заполняем массив с временными картинками */
    var tempIndexImages = [];
    for (var i = 1; i <= 19; i++){
        tempIndexImages.push("/promo/instagram/images/" + i + ".jpg");
    }

    var inst, directory, instaRouter;

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

    /** Вид главной страницы */
    var InstblockMain = Backbone.View.extend({
        tagName: "div",
        className: "main_wrap",
        template: _.template($("#instaMainTemplate").empty().html()),

        render_main: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });
    /** Вид фотографий для главной */
    var InstblockMainPhotos = Backbone.View.extend({
        tagName: "div",
        className: "main_photo",
        template: _.template($(".main_wrap").empty().html()),

        render_main_photos: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    var InstblockView = Backbone.View.extend({
        tagName: "div",
        className: "photo",
        template: _.template($("#instaFeedTemplate").empty().html()),

        render: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    var InstblockUsers = Backbone.View.extend({
        tagName: "div",
        className: "user",
        template: _.template($("#instaUsersList").empty().html()),

        render: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    var DirectoryView = Backbone.View.extend({
        el: $(".inst_content"),

        events: {
            'click .username': 'clickName'
        },

        initialize: function () {
            this.collection = new Instagramm(inst);
            this.render();
            this.trackScrolling();
            this.on("change:showList", this.showUserList, this);
        },

        render: function () {

        },

        renderFeed: function() {
            //this.$el.empty();
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
            //this.$el.empty();
            this.collection.reset(inst);
            var _listNames = _.uniq(this.collection.pluck('USERNAME'));
            _.each(_listNames, function (item) {
                this.getUserInform(item);
            }, this);
        },

        getUserInform: function (item) {
            var _summLikes = 0;
            var listPhotos = this.collection.where({USERNAME: item});
            _.each(listPhotos, function (subItem) {
                _summLikes += subItem.get('LIKES');
            });
            this.renderUser(new Instblock({USERNAME: item, LIKES: _summLikes}));
        },

        clickName : function() {
            console.log(this.showNext());
        },

        trackScrolling: function () {
            if(window.location.hash == ""){
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
        },


        /** Отрисовка главной страницы
         *
         *  Отрисовка блоков картинок
         * */
        renderMainImages: function(){
            var main = new Instblock({});
            var instblockMain = new InstblockMain({
                model: main
            });
            this.$el.append(instblockMain.render_main().el);
            for(var i = 1; i <= 19; i++){
                var item = new Instblock({THUMB: tempIndexImages[i]}) ;
                var instblockMainPhotos = new InstblockMainPhotos({
                    model: item
                });
                this.$el.append(instblockMainPhotos.render_main_photos().el);
            }
        }
    });

    var InstaRout = Backbone.Router.extend({
        routes: {
            "": "urlMain",
            "feed": "urlFeed",
            "list": "urlList"
        },

        urlMain: function(){
            directory.renderMainImages();
        },

        urlFeed: function(){
            directory.renderFeed();
        },

        urlList: function () {
            directory.showUserList();
        }

    });
} (jQuery));

