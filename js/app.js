(function ($) {
    var inst, directory, instaRouter;
    var listCollection = [];
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
        events: {
            'click .user_name_block': 'clickNameList',

        },

        render: function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },

        clickNameList: function(e){
            e.preventDefault();
            var _name = this.model.get('USERNAME');
            var photoByName = _.filter(directory.collection.models, function(el){
                if(el.attributes.USERNAME == _name){
                    this.$el.append( "<img src="+el.get('THUMB')+">" );
                }
            }, this);
        }
    });


    var DirectoryView = Backbone.View.extend({

        el: $(".inst_content"),

        events: {
            "keyup input.filter_in":  'filterChanged',
        },

        initialize: function () {
            this.collection = new Instagramm(inst);
            //this.render();
            this.trackScrolling();
            this.on("change:filterNameChanged", this.filterByName, this);
            //this.on("change:showList", this.showUserList, this);
        },

        //render: function () {
        //
        //},

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
            this.$el.children().remove('div');
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

        sortNames: function(_unsortedArray){
            !(_unsortedArray)?_unsortedArray = listCollection:'';
            var sortedArrayNames = (_.sortBy(_unsortedArray,'RATING')).reverse();
            _.each(sortedArrayNames, function (subItem) {
                this.renderUser(new Instblock({USERNAME: subItem.USERNAME, LIKES: subItem.LIKES, RATING: subItem.RATING, STEPS: subItem.STEPS}));
            }, this);

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

        filterChanged: function(e){
            this.filterName = $(e.currentTarget).val();
            this.trigger("change:filterNameChanged");
        },

        filterByName: function(){
            this.$el.children().remove('div');
            var _filtered = _.filter(listCollection, function(el){
                return el.USERNAME.substr(0, this.filterName.length) == this.filterName;
            }, this);
            this.sortNames(_filtered);
            console.log(this.filterName.length);
            console.log(_filtered);
        }
    });



    var InstaRout = Backbone.Router.extend({
        routes: {
            "feed":"urlFeed",
            "list": "urlList"
        },

        urlFeed: function(){
            directory.renderFeed();
        },

        urlList: function () {
            directory.showUserList();
        }

    });
} (jQuery));

