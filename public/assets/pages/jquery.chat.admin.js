/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Chat application 
*/

!function($) {
    "use strict";

    var ChatApp = function() {
        this.$body = $("body"),
        this.$chatInput = $('.chat-input'),
        this.$chatList = $('.conversation-list'),
        this.$chatSendBtn = $('.chat-send .btn'),
        this.connection = {},
        this.socket = null
    };

    //saves chat entry - You should send ajax call to server in order to save chat enrty
    ChatApp.prototype.save = function() {
        let expre = /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ;\.:\s\-,()+/*]+$/;
        var chatText = this.$chatInput.val();
        var chatTime = moment().format("h:mm");

        if (chatText == "") {
            $.Notification.notify('error','top rigth', 'Error!!', 'Tu mensaje esta vacio');
            this.$chatInput.focus();
        } else if (expre.test(chatText)==false) {
            $.Notification.notify('error','top rigth', 'Error!!', 'El mensaje contiene caracteres invalidos.');
            this.$chatInput.focus();
        } else {
            $('<li class="clearfix odd"><div class="chat-avatar"><img src="/assets/own/images/central.png" alt="male"><i>' + $($.parseHTML(chatTime)).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Central</i><p>' + $($.parseHTML(chatText)).text() + '</p></div></div></li>').appendTo('.conversation-list');
            this.$chatInput.val('');
            this.$chatInput.focus();
            this.$chatList.scrollTo('100%', '100%', {
                easing: 'swing'
            });
            this.socket.emit('sendSMSAdminToUser', { chatText, connection: this.connection });
        }
    },
    ChatApp.prototype.init = function (btn, txt, list, body) {
        var $this = this;
        
        $this.$body = body;
        $this.$chatInput = txt;
        $this.$chatList = list;
        $this.$chatSendBtn = btn;
        $this.$chatList.niceScroll();

        //binding keypress event on chat input box - on enter we are adding the chat into chat list - 
        $this.$chatInput.keypress(function (ev) {
            var p = ev.which;
            if (p == 13) {
                $this.save();
                return false;
            }
        });

        //binding send button click
        $this.$chatSendBtn.click(function (ev) {
            $this.save();
            return false;
        });
    },
    ChatApp.prototype.setConnection = function (connection) {
        this.connection = connection;
    },
    ChatApp.prototype.setSocket = function (socket) {
        this.socket = socket;
    },
    //init ChatApp
    $.ChatApp = new ChatApp, $.ChatApp.Constructor = ChatApp
    
}(window.jQuery);