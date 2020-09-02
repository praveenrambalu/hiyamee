<?php session_start();
include "db.php";
// if (isset($_SESSION["ADMINID"])) {
//     header("Location:handler_home.php");
// }
?>
<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style="--vh:9.42px;" lang="en">

<head>
    <style>
        HTML {
            margin: 0 !important;
            border: none !important;
        }

        .dragdrop-handle {
            cursor: move;
            user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
        }

        .dragdrop-draggable {
            zoom: 1;
        }

        .dragdrop-dragging {
            zoom: normal;
        }

        .dragdrop-positioner {
            border: 1px dashed #1e90ff;
            margin: 0 !important;
            zoom: 1;
            z-index: 100;
        }

        .dragdrop-flow-panel-positioner {
            color: #1e90ff;
            display: inline;
            text-align: center;
            vertical-align: middle;
        }

        .dragdrop-proxy {
            background-color: #7af;
        }

        .dragdrop-selected,
        .dragdrop-dragging,
        .dragdrop-proxy {
            opacity: 0.3;
        }

        .dragdrop-movable-panel {
            z-index: 200;
            margin: 0 !important;
            border: none !important;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="gwt:property" content="locale=en_US">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">

    <title>Optum India Technology &amp; Analytics Virtual Career Fair</title>

    <meta property="og:url" content="https://app.brazenconnect.com/a/UHGOptum/s/Xb6JX/aZbPy">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Optum India Technology &amp; Analytics Virtual Career Fair">
    <meta property="og:image" content="https://res.cloudinary.com/brazen/image/upload/w_1200,h_630/b_rgb:000,o_70/w_1175,h_100,x_25,y_25,co_rgb:FFF,g_south_west,c_fit,l_text:Noto%20Sans_60:Optum%20India%20Technology%20&amp;%20Analytics%20Virtual%20Career%20Fair/bit7upqagubmqvnxffqx.jpg">
    <meta property="og:description" content="Save your spot to chat with our team at this online event. Each text based chat lasts around 10 mins and you can join from your desktop or smartphone at anytime during the event. Sign up today!">
    <script type="text/javascript">
        var dictionary = {
            a: "b",
            forward_to_Rate_Conversation_page_delay: "3"
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css" />
    <script type="text/javascript">
        var EVENT_EXTENSION_CLIENT_MINUTES = "2";
        var GA_ACCOUNT = "UA-45668794-3";
        var CLOUDINARY_CALLBACK = "http://localhost:8080/bconnect/cloudinary_cors.html";
        var LIVE_APP_HOST = "app-a.brazenconnect.com";
        var CLOUDINARY_DATA_URL = "https://api.cloudinary.com/v1_1/brazen/auto/upload";
        var CHAT_INVITATION_DECLINE_SECONDS = "20";
        var ATMOSPHERE_LOG_LEVEL = "error";
        var TIMED_KEY_DURATION = "3600000";
        var UES_INTERVAL_SECONDS = "30";
        var BOOTH_STATS_INTERVAL_SECONDS = "30";
        var BRAZEN_OPS_EMAIL_DOMAIN = "^[^\\s@]+@brazen(careerist)?\\.com$";
        var CLOUDINARY_UNIQUE = "getezha7";
        var CHURNZERO_DEBUG = "false";
        var GA_DEBUG = "false";
        var DEFAULT_APP_HOST = "app.brazenconnect.com";
        var CDN_HOSTNAME = "";
        var SECONDS_UNTIL_INACTIVE_SURVEY = "-1";
        var CLOUDINARY_API_KEY = "841172885164385";
        var REMOTE_LOGGING_ON_TZ_ERROR = "true";
        var HEARTBEAT_INTERVAL_IN_SECONDS = "16";
        var GWT_LOG_LEVEL = "OFF";
        var SECONDS_UNTIL_CONNECTION_POOR = "120";
        var SECONDS_UNTIL_CONNECTION_FAILED = "180";
        var LINKEDIN_KEY = "77tfn96hrjz9uy";
        var SECONDS_UNTIL_CONNECTION_FAIR = "60";
        var CLOUDINARY_NAME = "brazen";
    </script>
    <script>
        var revisionQP = "?331";
    </script>
    <!-- jquery.js is required for all jquery plugins during page load -->
    <script src="assets/jquery-1.js"></script>

    <script type="text/javascript">
        var cssCheck = setInterval(checkBootstrapCss, 100);

        function checkBootstrapCss() {
            var cssExists = false;
            for (var i = 0; i < document.styleSheets.length; i++) {
                if (document.styleSheets[i].href && document.styleSheets[i].href.match("bootstrap")) {
                    cssExists = true;
                    break;
                }
            }
            if (cssExists) {
                $('body').show();
                clearInterval(cssCheck);
            }
        }

        $(document).ready(function() {
            clearInterval(cssCheck);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script id="brazenNoCache" type="text/javascript" source="landing-screen" screen-type="conversion" src="assets/BrazenConnect3.js"></script>
    <link rel="stylesheet" href="assets/bootstrap-3.css">
    <link rel="stylesheet" href="assets/font-awesome-4.css">
    <link rel="stylesheet" href="assets/bootstrap-select-1.css">
    <link rel="stylesheet" href="assets/bootstrap-datetimepicker-2.css">
    <link rel="stylesheet" href="assets/bootstrap-switch-3.css">

    <link id="brazenFavIcon" rel="shortcut icon" href="https://app.brazenconnect.com/img/favicon.ico?331">

    <script type="text/javascript" src="assets/modernizr-2.js"></script>
    <script src="assets/jstz.js"></script>

    <link rel="stylesheet" href="assets/brazen-layout-v2.css">

    <link rel="stylesheet" href="assets/brazen-cookies-banner.css">
    <script src="assets/brazen-cookies-banner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            setViewPortCssVariable();

            $(window).resize(() => {
                setViewPortCssVariable();
            });

            //for iOS safari vh issue
            //https://css-tricks.com/the-trick-to-viewport-units-on-mobile/
            function setViewPortCssVariable() {
                // Get a value for of vh unit
                let vh = window.innerHeight * 0.01;
                // Set the variable --vh as custom property to the root of the document
                document.documentElement.style.setProperty('--vh', vh + 'px');
            }
        });
    </script>
    <script id="lessModifyVars">
        if (!(window.less == undefined || window.less == "undefined")) {
            less.modifyVars({
                '@fill-type-gradient': 'false',
                '@background-color-1': '#E87722',
                '@background-color-2': '#3b5275',
                '@color-accent': '#E87722',
            });
        }
    </script>
</head>

<body style="" class="ff mz">
    <link rel="stylesheet/less" type="text/css" href="https://app.brazenconnect.com/css/event-landing/less/custom-override/brazen-layout-v2-custom-override.less">
    <style type="text/css" id="less:css-event-landing-less-custom-override-brazen-layout-v2-custom-override">
        .btn.btn-primary {
            color: #FFFFFF;
            background-color: #E87722;
        }

        .btn.btn-primary:hover,
        .btn.btn-primary:focus {
            background-color: rgba(232, 119, 34, 0.8);
        }

        .btn.btn-primary:active {
            background-color: rgba(232, 119, 34, 0.7);
        }

        .btn.btn-primary.disabled,
        .btn.btn-primary[disabled] {
            background-color: rgba(232, 119, 34, 0.7) !important;
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .btn.btn-outlined {
            color: #E87722;
        }

        .btn.btn-outlined i {
            color: #E87722;
        }

        .btn.btn-outlined:hover {
            background-color: rgba(232, 119, 34, 0.1);
        }

        .btn.btn-outlined:focus {
            background-color: rgba(232, 119, 34, 0.15);
        }

        .btn.btn-outlined:active {
            background-color: rgba(232, 119, 34, 0.15);
        }

        .btn.btn-link {
            color: #E87722;
        }

        .btn.btn-link:hover,
        .btn.btn-link:focus {
            color: #c35f14;
            background-color: rgba(232, 119, 34, 0.1);
        }

        .btn.btn-link:active {
            color: #c35f14;
            background-color: rgba(232, 119, 34, 0.2);
        }

        .form-group .prepend-required:before {
            color: #E87722;
        }

        .form-group .control-label.required:after {
            color: #E87722;
        }

        .form-group .form-control:focus {
            border-color: #E87722;
        }

        .bzInput.errors .form-control.bootstrap-select.open button.dropdown-toggle,
        .datetimepicker-input.errors .form-control.bootstrap-select.open button.dropdown-toggle,
        .duration-input.errors .form-control.bootstrap-select.open button.dropdown-toggle {
            border-color: #E87722;
        }

        .bootstrap-select.form-control>button:hover,
        .bootstrap-select.form-control>button:active,
        .bootstrap-select.form-control>button:focus {
            border: 1px solid #E87722 !important;
        }

        .bootstrap-select.form-control.disabled>button.disabled:hover,
        .bootstrap-select.form-control.disabled>button.disabled:active,
        .bootstrap-select.form-control.disabled>button.disabled:focus {
            border: 1px solid #E87722 !important;
        }

        .bootstrap-select.form-control.open>button {
            border-color: #E87722;
        }

        .bootstrap-select.form-control.multi-select .dropdown-menu>li.selected>a:hover,
        .bootstrap-select.form-control.multi-select .dropdown-menu>li.selected>a:focus,
        .bootstrap-select.form-control.multi-select .dropdown-menu>li.selected>a:active {
            background-color: #E87722;
        }

        .dropdown-menu {
            border-color: #E87722;
        }

        .dropdown-menu>li>a:hover,
        .dropdown-menu>li>a:active,
        .dropdown-menu>li>a:focus {
            color: #FFFFFF;
            background-color: #E87722;
        }

        .dropdown-menu>li>a:hover small.text-muted,
        .dropdown-menu>li>a:active small.text-muted,
        .dropdown-menu>li>a:focus small.text-muted {
            color: rgba(255, 255, 255, 0.8);
        }

        .dropdown-menu>li.active>a,
        .dropdown-menu>li.selected>a,
        .dropdown-menu>li[selected='true']>a {
            color: #FFFFFF !important;
            background-color: #E87722 !important;
        }

        .dropdown-menu>li.active>a small.text-muted,
        .dropdown-menu>li.selected>a small.text-muted,
        .dropdown-menu>li[selected='true']>a small.text-muted {
            color: rgba(255, 255, 255, 0.8);
        }

        .twitter-typeahead .tt-dropdown-menu {
            border: 1px solid #E87722;
        }

        .twitter-typeahead .tt-dropdown-menu .tt-suggestion.tt-cursor {
            background: #E87722 none;
        }

        .timezone-presenter-widget>div[role="listbox"]:focus>div#chozen_container__0_chzn>a {
            border: 1px solid #E87722;
        }

        .landing-screen-v2-common a {
            color: #E87722;
        }

        .landing-screen-v2-common a:hover,
        .landing-screen-v2-common a:focus,
        .landing-screen-v2-common a:active {
            color: #b95b13;
        }

        .time-left-badge {
            background-color: #E87722;
            color: #FFFFFF;
        }

        .btn.btn-primary {
            background-color: #E87722;
        }

        .btn.btn-primary:hover,
        .btn.btn-primary:active,
        .btn.btn-primary:focus {
            background-color: #95490f;
        }

        .btn.btn-link {
            color: #E87722;
        }

        .btn.btn-link:hover,
        .btn.btn-link:focus {
            color: #c35f14;
            background-color: #f6ccad;
        }

        .btn.btn-link:active {
            color: #c35f14;
            background-color: #f2b07e;
        }
    </style>
    <script src="assets/less.js"></script>

    <noscript>
        <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red;
    background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
            Your web browser must have JavaScript enabled in order for this application to display correctly.
        </div>
    </noscript>
    <div style="position: fixed; top: 0; z-index: 999999;" tabindex="-1" aria-hidden="true">

        <pre id="versionInfo" style="display: none; background-color: rgba(255,255,255,.9);">Brazen Connect Version: 9.11.0
CM Branch:              refs/tags/9.11.0
CM Last Tag:            9.11.0
CM Revision:            4ce8fb3511d07f36a8e9dfed320ca682e72df152
Build Number:           331
Build Time:             20200829-1716
Module:                 BrazenConnect3
</pre>

        <pre id="properties" style="display: none; background-color: rgba(255,255,255,.9);">ATMOSPHERE_LOG_LEVEL: error
BOOTH_STATS_INTERVAL_SECONDS: 30
BRAZEN_OPS_EMAIL_DOMAIN: ^[^\\s@]+@brazen(careerist)?\\.com$
CDN_HOSTNAME: 
CHAT_INVITATION_DECLINE_SECONDS: 20
CHURNZERO_DEBUG: false
CLOUDINARY_API_KEY: 841172885164385
CLOUDINARY_CALLBACK: http://localhost:8080/bconnect/cloudinary_cors.html
CLOUDINARY_DATA_URL: https://api.cloudinary.com/v1_1/brazen/auto/upload
CLOUDINARY_NAME: brazen
CLOUDINARY_UNIQUE: getezha7
DEFAULT_APP_HOST: app.brazenconnect.com
EVENT_EXTENSION_CLIENT_MINUTES: 2
GA_ACCOUNT: UA-45668794-3
GA_DEBUG: false
GWT_LOG_LEVEL: OFF
HEARTBEAT_INTERVAL_IN_SECONDS: 16
LINKEDIN_KEY: 77tfn96hrjz9uy
LIVE_APP_HOST: app-a.brazenconnect.com
REMOTE_LOGGING_ON_TZ_ERROR: true
SECONDS_UNTIL_CONNECTION_FAILED: 180
SECONDS_UNTIL_CONNECTION_FAIR: 60
SECONDS_UNTIL_CONNECTION_POOR: 120
SECONDS_UNTIL_INACTIVE_SURVEY: -1
TIMED_KEY_DURATION: 3600000
UES_INTERVAL_SECONDS: 30
</pre>

    </div>

    <div id="gwtDiv">
        <div class="event-landing-screen" role="document">


            <div>
                <div class="localscroll landing-screen-v2 landing-screen-v2-common parallax" role="document" id="globalWrapper">
                    <div id="logo-area" class="white-bg">
                        <img class="rectangle" role="presentation" aria-hidden="true" src="assets/xpstfc7kuypfckpwoa5e.webp">
                    </div>

                    <div class="parallax-holder translucent-bg area" role="region" id="main-event-area">
                        <div class="parallax-layer" style="background-image: url('https://res.cloudinary.com/brazen/image/upload/q_auto,f_auto,c_lfill,w_1600,h_1067,b_rgb:fff/v1597224246/bit7upqagubmqvnxffqx.jpg');">
                        </div>
                        <div class="container">
                            <div class="hidden-sm hidden-md hidden-lg">

                                <div tabindex="0" class="title-time-widget" aria-labelledby="event-title event-date event-time" aria-hidden="false">
                                    <p id="event-title" class="title" role="heading">Optum India Technology &amp;
                                        Analytics Virtual Career Fair</p>
                                    <p class="date" id="event-date" role="heading">Friday, August 21, 2020</p>
                                    <p class="time" id="event-time" role="heading">10 AM - 1 PM IST</p>
                                </div>
                            </div>
                            <div class="left-col">
                                <div class="hidden-xs">

                                    <div tabindex="0" class="title-time-widget" aria-labelledby="event-title event-date event-time" aria-hidden="false">
                                        <p id="event-title" class="title" role="heading">Optum India Technology &amp;
                                            Analytics Virtual Career Fair</p>
                                        <p class="date" id="event-date" role="heading">Friday, August 21, 2020</p>
                                        <p class="time" id="event-time" role="heading">10 AM - 1 PM IST</p>
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div tabindex="0" class="reason-to-attend-widget" aria-labelledby="reason-to-attend-label">
                                    <p class="title" id="reason-to-attend-label">Why should you attend?</p>
                                    <ul class="media-list content" tabindex="0">
                                        <li class="media">
                                            <i class="fa fa-check-circle-o bullet"></i><span>Break through conventional
                                                barriers and actually engage with an employer!</span>
                                        </li>
                                        <li class="media">
                                            <i class="fa fa-check-circle-o bullet"></i><span>Gain unparalleled access to
                                                a live person on our team.</span>
                                        </li>
                                        <li class="media">
                                            <i class="fa fa-check-circle-o bullet"></i><span>Get tailored answers to
                                                your specific questions.</span>
                                        </li>
                                        <li class="media">
                                            <i class="fa fa-check-circle-o bullet"></i><span>Discover if this is the job
                                                and company for you.</span>
                                        </li>
                                        <li class="media">
                                            <i class="fa fa-check-circle-o bullet"></i><span>Take charge of your career
                                                and put yourself in the driver's seat!</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right-col">
                                <div class="login-signup-wrapper">
                                    <p class="text-strong">Attend from anywhere.</p>
                                    <p>Just quick, casual text conversations.</p>
                                    <br>
                                    <div>



                                        <div class="login-form-widget">
                                            <div class="alert-area">
                                                <div id="error-section" class="alert alert-danger" role="alert" aria-hidden="true" style="display: none;">
                                                    <div></div>
                                                </div>
                                                <div class="alert alert-success" aria-live="polite" role="alert" aria-hidden="true" style="display: none;"></div>
                                            </div>
                                            <div class="form-area">
                                                <div id="login-section" aria-hidden="true">
                                                    <?php
                                                    if (isset($_POST['register'])) {
                                                        $name = $_POST['name'];
                                                        $email = $_POST['email'];
                                                        $phoneno = $_POST['phoneno'];
                                                        $password = $_POST['password'];
                                                        // $password = base64_encode($password);
                                                        $sql = "INSERT INTO `users` (`id`, `name`, `email`, `phoneno`, `password`) VALUES (NULL, '{$name}', '{$email}', '{$phoneno}', '{$password}');";
                                                        if ($db->query($sql)) {
                                                            echo " <div class='alert alert-success' role='alert' aria-hidden='true' >You have Successfully Registered. Please Login Now...</div>";
                                                        }
                                                    }


                                                    ?>



                                                    <form action="" method="post">
                                                        <div>
                                                            <div class="login-form" aria-describedby="loginFormDivDescription" tabindex="0">
                                                                <span class="sr-only" id="loginFormDivDescription">Log
                                                                    in
                                                                    with email address form</span>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="login-email" id="login-email-label">Your Name</label>
                                                                    <input type="text" class="form-control" name="name" aria-required="true" placeholder="Your Name" maxlength="100" aria-labelledby="login-email-label" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="login-email" id="login-email-label">Email Address</label>
                                                                    <input type="text" class="form-control" name="email" aria-required="true" placeholder="Email Address" id="login-email" maxlength="100" aria-labelledby="login-email-label" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="login-email" id="login-email-label">Phone No</label>
                                                                    <input type="text" class="form-control" name="phoneno" aria-required="true" placeholder="Phone No" id="login-email" maxlength="100" aria-labelledby="login-email-label" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="login-password">Password</label>
                                                                    <input class="form-control" type="password" name="password" aria-required="true" placeholder="Password" id="login-password" minlength="6" maxlength="100" required>
                                                                </div>
                                                                <button type="submit" name="register" class="btn btn-material btn-block btn-primary">

                                                                    <span>Register</span>
                                                                </button>
                                                                <div>
                                                                    Don't have an account? <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Login Here</a></div>



                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="area" role="region" id="how-it-works-area">
                        <div class="container">
                            <div class="left-col hidden-xs">
                                <img class="side-image" role="presentation" aria-hidden="true" src="assets/New_UI_-_Mobile_Chat_1_zrsnpj.webp">
                            </div>
                            <div class="right-col">
                                <h2 role="heading" aria-level="2" tabindex="0" class="title">
                                    Never attended an online chat event?
                                </h2>
                                <p class="subtitle" tabindex="0">No problem! Here’s how it works.</p>
                                <div>
                                    <div tabindex="0" class="how-it-works-item-widget">
                                        <img role="presentation" aria-hidden="true" src="assets/chat-bubble-circle-home.png">
                                        <div class="text">
                                            <h3>What's a chat event?</h3>
                                            <p>An online event to connect you with our team.</p>
                                        </div>
                                    </div>
                                    <div tabindex="0" class="how-it-works-item-widget">
                                        <img role="presentation" aria-hidden="true" src="assets/chat-bubble-icon.png">
                                        <div class="text">
                                            <h3>What should you expect?</h3>
                                            <p>To have a text chat with one of our teammates lasting
                                                around 10 minutes. You may also be invited to video or audio chat during
                                                this time.</p>
                                        </div>
                                    </div>
                                    <div tabindex="0" class="how-it-works-item-widget">
                                        <img role="presentation" aria-hidden="true" src="assets/asterisk.png">
                                        <div class="text">
                                            <h3>Who should sign up?</h3>
                                            <p>Anyone interested in joining our team or learning more about us.</p>
                                        </div>
                                    </div>
                                    <div tabindex="0" class="how-it-works-item-widget">
                                        <img role="presentation" aria-hidden="true" src="assets/devices.png">
                                        <div class="text">
                                            <h3>How do you join the event?</h3>
                                            <p>Join from anywhere! Computer, smartphone or tablet.</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn reserve-spot visible-xs btn-warning" aria-hidden="false">
                                    RESERVE MY SPOT
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="area translucent-bg" role="region" id="illustrations-area">
                        <div class="parallax-layer" style="background-image: url('https://res.cloudinary.com/brazen/image/upload/q_auto,f_auto,c_lfill,w_1600,h_1067,b_rgb:fff/v1597224246/bit7upqagubmqvnxffqx.jpg');">
                        </div>
                        <div class="container">
                            <h2 id="gwt-uid-53" role="heading" aria-level="2" tabindex="0">
                                Join the hundreds of thousands who have unlocked opportunities through online chat
                                events.
                            </h2>
                            <div class="illustrations">
                                <div class="item">
                                    <div class="upper">
                                        Provide a bit of information about yourself.
                                    </div>
                                    <div class="image-holder">
                                        <img src="assets/illustration-1.png" class="horizontal" role="presentation" aria-hidden="true">
                                    </div>
                                    <div class="lower">
                                        Signing up only takes a minute and will ensure your conversations are relevant.
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="upper">
                                        Engage in meaningful conversations.
                                    </div>
                                    <div class="image-holder">
                                        <img src="assets/illustration-2.png" class="vertical" role="presentation" aria-hidden="true">
                                    </div>
                                    <div class="lower">
                                        Explore the topics that interest you and begin your one on one conversation.
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="upper">
                                        Build your network and pursue new opportunities.
                                    </div>
                                    <div class="image-holder">
                                        <img src="assets/illustration-3.png" class="horizontal" role="presentation" aria-hidden="true">
                                    </div>
                                    <div class="lower">
                                        Leave more informed, better connected, and ready to act on new opportunities.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area white-bg" role="region" id="about-us">
                        <div class="container">
                            <div tabindex="0">
                                <span>
                                    <p>All in.&nbsp; It's the only way to go.&nbsp; At life. At work.</p>
                                    <p>At Optum, part of the UnitedHealth Group family of businesses, our
                                        work enhances health care providers everywhere and it reflects nothing
                                        less than best-in-class service quality. We’re part of a huge global
                                        organization that has:&nbsp;</p>
                                    <ul>
                                        <li>Deep health care industry experience</li>
                                        <li>Incredibly effective multi-disciplinary teams</li>
                                        <li>Technology expertise.&nbsp;</li>
                                    </ul>
                                    <p>Our teams bases in India provide a full suite of consulting,
                                        technology and process solutions that make health care work better.
                                        You’ll discover an exciting, ever changing workplace where you can dive
                                        in and begin to do&nbsp;<span style="color: #ff6600;"><strong>your life’s best
                                                work.<sup>SM</sup></strong></span></p>
                                </span>
                            </div>
                            <div class="hidden-xs">
                                <img class="logo" role="presentation" src="assets/xpstfc7kuypfckpwoa5e.webp">
                            </div>
                        </div>
                    </div>

                    <div class="area translucent-bg parallax-holder" role="region" id="bottom-registration">
                        <div class="parallax-layer" style="background-image: url('https://res.cloudinary.com/brazen/image/upload/q_auto,f_auto,c_lfill,w_1600,h_1067,b_rgb:fff/v1597224246/bit7upqagubmqvnxffqx.jpg');">
                        </div>
                        <div class="container">
                            <div class="col-sm-8 col-sm-offset-2">
                                <h3 role="heading" aria-level="3" tabindex="0">
                                    Sign up for our event today!
                                </h3><br>
                                <button id="reserve-spot-bottom" type="button" class="btn reserve-spot btn-primary" aria-hidden="false">
                                    LOG IN
                                </button>
                            </div>
                        </div>
                    </div>
                    <div role="region" id="footer">
                        <div class="container">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="branding">
                                    <a class="gwt-Anchor" href="https://www.brazen.com/" aria-label="Go to brazen.com">
                                        <img class="gwt-Image" src="assets/brazen-logo.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="analytics-section" tabindex="-1" style="display: none;">
        <p id="event-cancelled">false</p>
        <p id="analytics-viewname">/events/aZbPy/new-landing-screen/</p>
        <p id="analytics-title">Optum India Technology &amp; Analytics Virtual Career Fair landing screen</p>
        <p id="analytics-landing-screen">NEW</p>
        <p id="analytics-event-status">post</p>
        <p id="google-analytics-enabled">false</p>
        <p id="google-analytics-property-id"></p>
    </div>







    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login Now</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="control-label" for="login-email" id="login-email-label">Email Address</label>
                            <input type="text" class="form-control" required name="email" aria-required="true" placeholder="Email Address" id="login-email" maxlength="100" aria-labelledby="login-email-label">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="login-password">Password</label>
                            <input class="form-control" type="password" required name="password" aria-required="true" placeholder="Password" id="login-password" maxlength="100">
                        </div>
                        <button type="submit" name="login" class="btn btn-material btn-block btn-primary">

                            <span>Login</span>
                        </button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["login"])) {
        // print_r($_POST);
        $email = $_POST["email"];
        $password = $_POST["password"];
        // $password = base64_decode($password);
        $sql = "SELECT * FROM users WHERE `email`='$email' AND `password`='$password'";
        echo $sql;
        $res = $db->query($sql);
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $_SESSION["USERID"] = $row["id"];
            //  $_SESSION["ADMINID"]=$ro["ID"];
            echo "<script>window.open('handler_home.php','_self');</script>";
        } else {
            echo "<script>swal('Sorry !','Invalid Credentials','error')</script>";
        }
    }

    ?>
</body>
<script>
    $(document).ready(function() {
        $(bcCookieBannerDiv).remove();
        document.body.style.marginTop = 0;
        setEnvironmentCookie(acceptedCookiePolicyCookieName, "true");
    })
</script>

</html>