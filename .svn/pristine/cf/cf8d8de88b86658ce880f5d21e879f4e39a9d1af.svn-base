
/* Code to load and display Modals */
var dispModal = function (newModalID) {
    "use strict";
    switch (newModalID) {
    case 'instDisc1':
// Setup lines to be displayed.  Depends on number of instruction lines; max no. of lines is 5 
        toggleElementClass('modal3_Line1', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line2', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line3', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line4', 'display-yes', 'display-none'); // Making sure this line is hidden
        toggleElementClass('modal3_Line5', 'display-yes', 'display-none'); // Making sure this line is hidden

        document.getElementById('modal3_titleText').innerHTML = "In-App Ads";
            
// Setting up text for each line
        document.getElementById('modal3_bodyText1').innerHTML = 'Upload up to five ads and activate one or more of them.';
        document.getElementById('modal3_bodyText2').innerHTML = "All parameters pertaining to ad delivery including choice of ad, frequency of selection, user delivered to, etc. are Noviah's discretion. &nbsp;Noviah will endeavor to deliver the most relevant ad.";
        document.getElementById('modal3_bodyText3').innerHTML = 'Ads displayed on smartphone screens may appear smaller than on this website.  Appearance depends on screen size and resolution of smartphone screen.';
        $('#modalType3').modal();
    
        newModalID = 'noNextModal';
        break;
        
    case 'instDisc2':
// Setup lines to be displayed.  Depends on number of instruction lines; max no. of lines is 5 
        toggleElementClass('modal3_Line1', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line2', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line3', 'display-none', 'display-yes');
        toggleElementClass('modal3_Line4', 'display-yes', 'display-none'); // Making sure this line is hidden
        toggleElementClass('modal3_Line5', 'display-yes', 'display-none'); // Making sure this line is hidden

        document.getElementById('modal3_titleText').innerHTML = "Loyalty Rewards";
            
// Setting up text for each line
        document.getElementById('modal3_bodyText1').innerHTML = 'Upload up to six interactions and rank them in the order you want them to be delivered. &nbsp;If you give one or more of them the same rank, Noviah will pick the most relevant one and offer to user.';
        document.getElementById('modal3_bodyText2').innerHTML = "Interactions will be delivered at the most suitable time as determined by Noviah's engagement algorithm.";
        document.getElementById('modal3_bodyText3').innerHTML = 'Ineractions displayed on smartphone screens may appear smaller than on this website.  Appearance depends on screen size and resolution of smartphone screen.';
        $('#modalType3').modal();
    
        newModalID = 'noNextModal';
        break;

    default:
        //Do Nothing
        break;
    }
};

//toggles BTN text in <SPAN> child of labelID between two states and corresponding classes
var toggleBTN = function(labelID, state1, state2, class1, class2){
    "use strict";
    var i=0;
    
    while (i < labelID.childNodes.length) {
        if(labelID.childNodes[i].nodeName==='INPUT'){
            switch(labelID.childNodes[i].checked) {
                case false:
                    labelID.childNodes[i+1].innerHTML=state2;
                    labelID.classList.remove(class1);
                    labelID.classList.add(class2);
                    break;
                case true:
                    labelID.childNodes[i+1].innerHTML=state1;
                    labelID.classList.remove(class2);
                    labelID.classList.add(class1);
                    break;
                default:
                    //Do nothing
                    break;
            }
        } else {
            //Do nothing
        }            
        ++i;
    }
};

//switches from one section to next
var switchScreen = function(screenFromID, screenToID) {
    "use strict";
    toggleElementClass(screenFromID, 'display-yes', 'display-none');
    toggleElementClass(screenToID, 'display-none', 'display-yes');            
};

var formSave = function(objPntr) {
    "use strict";
};

var showSelection = function(objPntr) {
    "use strict";
    toggleElementClass('fs-LoyaltyRewards', 'show', 'hidden');
    toggleElementClass('fs-Setup', 'show', 'hidden');
    toggleElementClass('fs-Interaction1', 'show', 'hidden');
    toggleElementClass('fs-Interaction2', 'show', 'hidden');
    toggleElementClass('fs-Interaction3', 'show', 'hidden');
    toggleElementClass('fs-Interaction4', 'show', 'hidden');
    toggleElementClass('fs-Interaction5', 'show', 'hidden');
    toggleElementClass('fs-Interaction6', 'show', 'hidden');

    switch(objPntr.innerHTML) {
        case 'Loyalty':
            toggleElementClass('fs-LoyaltyRewards', 'hidden', 'show');
            break;
        case 'Setup':
            toggleElementClass('fs-Setup', 'hidden', 'show');
            break;
        case '1':
            toggleElementClass('fs-Interaction1', 'hidden', 'show');
            break;
        case '2':
            toggleElementClass('fs-Interaction2', 'hidden', 'show');
            break;
        case '3':
            toggleElementClass('fs-Interaction3', 'hidden', 'show');
            break;
        case '4':
            toggleElementClass('fs-Interaction4', 'hidden', 'show');
            break;
        case '5':
            toggleElementClass('fs-Interaction5', 'hidden', 'show');
            break;
        case '6':
            toggleElementClass('fs-Interaction6', 'hidden', 'show');
            break;
    }
};

var showFeaturedCoupon = function(objPntr) {
    "use strict";
    toggleElementClass('fs-couponFeatured1', 'show', 'hidden');
    toggleElementClass('fs-couponFeatured2', 'show', 'hidden');
    toggleElementClass('fs-couponFeatured3', 'show', 'hidden');

    switch(objPntr.innerHTML) {
        case '1':
            toggleElementClass('fs-couponFeatured1', 'hidden', 'show');
            break;
        case '2':
            toggleElementClass('fs-couponFeatured2', 'hidden', 'show');
            break;
        case '3':
            toggleElementClass('fs-couponFeatured3', 'hidden', 'show');
            break;            
    }
};

var showNearbyCoupon = function(objPntr) {
    "use strict";
    toggleElementClass('fs-couponNearby1', 'show', 'hidden');
    toggleElementClass('fs-couponNearby2', 'show', 'hidden');
    toggleElementClass('fs-couponNearby3', 'show', 'hidden');

    switch(objPntr.innerHTML) {
        case '1':
            toggleElementClass('fs-couponNearby1', 'hidden', 'show');
            break;
        case '2':
            toggleElementClass('fs-couponNearby2', 'hidden', 'show');
            break;
        case '3':
            toggleElementClass('fs-couponNearby3', 'hidden', 'show');
            break;            
    }
};
$( ".btn_app_ads" ).click(function() {

    if($(this).find("span").text()=='Inactive') {
        $(this).find("span").text('Active');
        //$(':checkbox').prop('checked', true);
        $(this).find("input").val(1);
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');

    }else{
        $(this).find("span").text('Inactive');
        //$(':checkbox').prop('checked', true);
        $(this).find("input").val(0);
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
    }
});


$( ".btn_coupon_feat" ).click(function() {
    if($(this).find("span").text()=='Push »»') {
        $(this).find("span").text('»» Pull');
        //$(':checkbox').prop('checked', true);
        $(this).find("input").val('Pull');
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
    }else{
        $(this).find("span").text('Push »»');
        //$(':checkbox').prop('checked', true);
        $(this).find("input").val('Push');
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
    }
});