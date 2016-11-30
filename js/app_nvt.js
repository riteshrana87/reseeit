/* Globals */
var video1 = 'index-introVideo1', btnPlayVideo1 = 'btn-intro1', video2 = 'index-introVideo2', btnPlayVideo2 = 'btn-intro2';

var toggleElementClass = function (elementID, class_remove, class_add) {
    "use strict";
    document.getElementById(elementID).classList.remove(class_remove);
    document.getElementById(elementID).classList.add(class_add);
};

var refresh_nvt = function () {
    "use strict";
    this.location.href = this.location.href;
};

/*
var clientLoginVisible = function () {
    document.getElementById('clientLoginScreen').style.visibility = 'visible';
    document.getElementById('clientLoginLg').style.visibility = 'hidden';
    document.getElementById('clientLoginSm').style.visibility = 'hidden';
    document.getElementById('indexMask').style.visibility = 'visible';
        
};
*/

//Code displays login modal and pauses video that is being played
var dispLoginModal = function() {
    "use strict";
    var introVideos = document.getElementsByClassName('introVideo'), numIntroVideos = introVideos.length;
    var i=0, j=0;
    $('#modal-clientLogin').modal({backdrop: "static"});
    
    for (i=0; i<numIntroVideos; ++i) {
        var videoId = introVideos[i].id, classListOfVideo = document.getElementById(videoId).classList, numClasses = classListOfVideo.length;
        for (j=0; j<numClasses; ++j) {
            if (classListOfVideo[j] === 'display-yes') {
                document.getElementById(videoId).pause();
            }
        }
    }
};

//Continues playing the video that was paused when login modal was displayed
var onLoginModalClose = function () {
    "use strict";
    var introVideos = document.getElementsByClassName('introVideo'), numIntroVideos = introVideos.length;
    var i=0, j=0;
    $('#modal-clientLogin').modal({backdrop: "static"});
    
    for (i=0; i<numIntroVideos; ++i) {
        var videoId = introVideos[i].id, classListOfVideo = document.getElementById(videoId).classList, numClasses = classListOfVideo.length;
        for (j=0; j<numClasses; ++j) {
            if (classListOfVideo[j] === 'display-yes') {
                document.getElementById(videoId).play();
            }
        }
    }    
};

var appInActionShow = function () {
    "use strict";
    document.getElementById('technologyMask').style.visibility = 'visible';
};

var toggleElementClass = function (elementID, class_remove, class_add) {
    "use strict";
    document.getElementById(elementID).classList.remove(class_remove);
    document.getElementById(elementID).classList.add(class_add);
};

var videoControl = function(videoName_play, videoName_pause) {
    "use strict";
    switch(videoName_play) {
        case video1:
            toggleElementClass(btnPlayVideo1, 'btnBasicNVT', 'disabled');
            toggleElementClass(btnPlayVideo2, 'disabled', 'btnBasicNVT');
            break;

        case video2:
            toggleElementClass(btnPlayVideo1, 'disabled', 'btnBasicNVT');
            toggleElementClass(btnPlayVideo2, 'btnBasicNVT', 'disabled');
            break;
                    
    }
/*
    toggleElementClass('index-mediaComposite', 'display-yes', 'display-none');
*/
    toggleElementClass('btn-introPlay', 'display-yes', 'display-none');
    toggleElementClass('videoContainer', 'display-none', 'display-yes');
    toggleElementClass('btn-introVideoCntrls', 'display-none', 'display-yes');
    
    toggleElementClass(videoName_play, 'display-none', 'display-yes');
    toggleElementClass(videoName_pause, 'display-yes', 'display-none');

    document.getElementById(videoName_pause).pause();
    document.getElementById(videoName_play).currentTime = 0;
    document.getElementById(videoName_play).play();
};

var main = function () {
    "use strict";
    var screenHeight = window.$(window).innerHeight();
    var screenWidth = window.$(window).innerWidth();
    var id_video1 = document.getElementById(video1);
    var id_video2 = document.getElementById(video2);

    var footerHeight, footerOffsetTop, footer_pos, marginTopMin, deltaFooterPos;

    var today_date = new Date();

    var doNothing = 1;
    
    var options = {
        trigger: 'hover',
        placement: 'auto bottom',
    };

    $('.popoverDisp').popover(options);   
    
/*
        $(window).on('resize', refresh_nvt);
*/
    
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

    document.getElementById('btn-introPlay').addEventListener("click", function () {
        id_video1.load();
        id_video2.load();
    });

    document.getElementById('btn-intro1').addEventListener("click", function () {
        videoControl(video1, video2);
    });

    document.getElementById('btn-intro2').addEventListener("click", function () {
        videoControl(video2, video1);
    });

    document.getElementById('img-endOfPlay').addEventListener("click", function () {
        videoControl(video1, video2);
    });
    
/* VIDEO CONTROLS */        
    id_video1.onloadeddata = function () {
           videoControl(video1, video2);
    };
    
/* VIDEO CONTROLS */        
    id_video1.onplay = function () {
        toggleElementClass('index-mediaComposite', 'display-yes', 'display-none');
    };

    id_video2.onplay = function () {
        toggleElementClass('index-mediaComposite', 'display-yes', 'display-none');
    };

/* After Video1 ends*/
    id_video1.onended = function () {
        videoControl(video2, video1);
    };

/* After Video2 ends*/
    id_video2.onended = function () {
        toggleElementClass('btn-introVideoCntrls', 'display-yes', 'display-none');
        toggleElementClass('videoContainer', 'display-yes', 'display-none');
        toggleElementClass('index-mediaComposite', 'display-none', 'display-yes');
        toggleElementClass('img-endOfPlay', 'display-none', 'display-yes');
    };
            
};

window.$(document).ready(main);
