/* Globals */
var video1 = 'index-introVideo';

var toggleElementClass = function (elementID, class_remove, class_add) {
        document.getElementById(elementID).classList.remove(class_remove);
        document.getElementById(elementID).classList.add(class_add);
    };

var refresh_nvt = function () {
    this.location.href = this.location.href;
};

var toggleElementClass = function (elementID, class_remove, class_add) {
        document.getElementById(elementID).classList.remove(class_remove);
        document.getElementById(elementID).classList.add(class_add);
    };

var videoControl = function(videoName_play, videoHeight) {

    toggleElementClass('index-mediaComposite', 'display-yes', 'display-none');
    toggleElementClass('btn-introPlay', 'display-yes', 'display-none');
    toggleElementClass('videoContainer', 'display-none', 'display-yes');
    
    toggleElementClass(videoName_play, 'display-none', 'display-yes');

    document.getElementById(videoName_play).height = videoHeight-3; //3 to compensate for border width
    document.getElementById(videoName_play).currentTime = 0;
    document.getElementById(videoName_play).play();
}

var main = function () {

        var screenHeight = window.$(window).innerHeight();
        var screenWidth = window.$(window).innerWidth();
        var id_video1 = document.getElementById(video1);

        var footerHeight, footerOffsetTop, footer_pos, marginTopMin, deltaFooterPos;
        var imgVideoHeight = 0;

        var today_date = new Date();
    
        var doNothing = 1;
    
//        $(window).on('resize', refresh_nvt);
    
/* Code for screen size.  Comment out in production version */
/*
        document.getElementById('screenWidth').innerHTML = screenWidth;
        document.getElementById('screenHeight').innerHTML = screenHeight;
*/
    
    
/* Positioning footer at bottom of screen when screen resized*/
    
        if (window.$('#footerNVT-reg').length > 0) {
            footerHeight = window.$('#footerNVT-reg').height();
            footerOffsetTop = window.$('#footerNVT-reg').offset().top;
            marginTopMin = 0;
        
            deltaFooterPos = screenHeight - footerOffsetTop - footerHeight;
            footer_pos = Math.max(marginTopMin, deltaFooterPos);
            document.getElementById('footerNVT-reg').style.marginTop = footer_pos.toString().concat("px");
        
        } else if (window.$('#footerNVT-index').length > 0) {
            footerHeight = window.$('#footerNVT-index').height();
            footerOffsetTop = window.$('#footerNVT-index').offset().top;
            marginTopMin = 20;

            deltaFooterPos = screenHeight - footerOffsetTop - footerHeight;
            footer_pos = Math.max(marginTopMin, deltaFooterPos);
            document.getElementById('footerNVT-index').style.marginTop = footer_pos.toString().concat("px");
        } else {
            doNothing = 5;
        }

/* Update value of calendar year */
        document.getElementById('calendar-year').innerHTML = today_date.getFullYear();

/* Height Get and Set function*/
        imgVideoHeight = window.$('#index-mediaComposite').height();
                    
        document.getElementById('btn-introPlay').addEventListener("click", function () {
            id_video1.load();
        });

        document.getElementById('img-endOfPlay').addEventListener("click", function () {
            videoControl(video1, imgVideoHeight);
        });
    
/* VIDEO CONTROLS */        
        id_video1.onloadeddata = function () {
            videoControl(video1, imgVideoHeight);
        }

/* After Video1 ends*/
        id_video1.onended = function () {
            toggleElementClass('videoContainer', 'display-yes', 'display-none');
            toggleElementClass('btn-introPlay', 'display-yes', 'display-none');
            toggleElementClass('index-mediaComposite', 'display-none', 'display-yes');
            toggleElementClass('img-endOfPlay', 'display-none', 'display-yes');
        };

};

window.$(document).ready(main);
