<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ReSeeIt WebService</title>

    <style>

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #FFF;
        margin: 40px;
        font: 16px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
        word-wrap: break-word;
    }

    a {
        color: #039;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 24px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 16px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 16px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    </style>
</head>
<body>

<div id="container">
    <h1>ReSeeIt WebService</h1>

    <div id="body">

        <p>
            List of webservices.
        </p>

        <ol>
            <li><a href="<?php echo site_url('webservice/authentication'); ?>" target="_blank">Authentication</a></li>
            <li><a href="<?php echo site_url('webservice/registration'); ?>" target="_blank">Registration</a></li	>
            <li><a href="<?php echo site_url('webservice/updateuser'); ?>" target="_blank">Profile Update</a></li>
            <li><a href="<?php echo site_url('webservice/receiptadd'); ?>" target="_blank">Receipt Upload</a></li>
            <li><a href="<?php echo site_url('webservice/CouponFeaturedList'); ?>" target="_blank">Coupon Featured List</a></li>
            <li><a href="<?php echo site_url('webservice/InAppAds'); ?>" target="_blank">In-App Ads List</a></li>
            <li><a href="<?php echo site_url('webservice/LoyaltyInteractionsList'); ?>" target="_blank">Loyalty & Interactions</a></li>
            <li><a href="<?php echo site_url('webservice/UserCouponReward'); ?>" target="_blank">User Coupon Reward</a></li>

        </ol>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

<script>
    // Create an 'App' namespace
    var App = App || {};

    // Basic rest module using an IIFE as a way of enclosing private variables
    App.rest = (function (window, $) {
        // Fields

        // Cache the jQuery selector
        var $_ajax = null;

        // Methods (private)

        // Called on Ajax done
        function ajaxDone(data) {
            // The 'data' parameter is an array of objects that can be iterated over
            window.alert(JSON.stringify(data, null, 2));
        }

        // Called on Ajax fail
        function ajaxFail() {
            window.alert('Oh no! A problem with the Ajax request!');
        }

        // On Ajax request
        function ajaxEvent($this) {
            $.ajax({
                    // URL from the link that was 'clicked' on
                    url: $this.attr('href')
                })
                .done(ajaxDone)
                .fail(ajaxFail);
        }

        // Bind event(s)
        function bind() {
            // Namespace the 'click' event
            $_ajax.on('click.app.rest.module', function (event) {
                event.preventDefault();

                // Pass this to the Ajax event function
                ajaxEvent($(this));
            });
        }

        // Cache the DOM node(s)
        function cacheDom() {
            $_ajax = $('#ajax');
        }

        // Public API
        return {
            init: function () {
                // Cache the DOM and bind event(s)
                cacheDom();
                bind();
            }
        };
    })(window, jQuery);

    // DOM ready event
    $(function () {
        // Initialise the App module
        App.rest.init();
    });

</script>

</body>
</html>
