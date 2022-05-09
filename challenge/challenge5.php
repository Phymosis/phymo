<?php
session_start();
if(!isset($_SESSION['username'])) {
        echo "Please Log before Playing";
        header("Location: ../login.php");
        die();
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js dark-mode">
    <head>
        <meta charset="utf-8">
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
        <title>Intro 5 | Defend the Web</title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=1, viewport-fit=cover">
        <meta name="referrer" content="origin-when-crossorigin">
        <link rel="manifest" href="/manifest.json">

        
        <meta property="og:site_name" content="Defend the Web" />
        
        <!--[if lt IE 9]>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
        <![endif]-->
        <!-- <link href='https://fonts.googleapis.com/css?family=Anonymous+Pro:400|Lato:300,200|Orbitron&subset=latin,cyrillic' rel='stylesheet' type='text/css'> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

        <link rel="stylesheet" href="https://zhr3.co.uk/css/style.css?v=" />

        <!-- TODO: remove -->
        <script src="https://zhr3.co.uk/js/jquery.min.js"></script>

        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="apple-touch-icon" sizes="180x180" href="https://zhr3.co.uk/icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://zhr3.co.uk/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://zhr3.co.uk/icons/favicon-16x16.png">
        <link rel="mask-icon" href="https://zhr3.co.uk/icons/safari-pinned-tab.svg" color="#2d3b4f">
        <link rel="shortcut icon" href="https://zhr3.co.uk/icons/favicon.ico">
        <meta name="msapplication-TileColor" content="#2d3b4f">
        <meta name="msapplication-config" content="https://zhr3.co.uk/icons/browserconfig.xml">
        <meta name="theme-color" content="#2d3b4f">

        
        
                
                    <meta name="site-websocket" content="zhr3.co.uk/push">
        
                    <meta name="csrf-token" content="0cf2aaa59a13a14a62853561f176e0e4573fd8c77a92c2a402e5098905327f88">
        
                    <meta name="site-static" content="https://zhr3.co.uk">
        
        
                    <meta name="sentry" content="https://3da42bb54f3e4aeb9b14aaf86a2e8bbe@o319977.ingest.sentry.io/5898817">
            </head>
    <body class="sidebar playground">
            <header>
    <a href="#" class="show-sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
    <a href="/dashboard" class="logo">Defend the Web</a>
    
           <ul class="breadcrumb">
                            <li><a href='/playground'>Playground</a></li>
                            <li><a href='/playground/intro5'>Intro 5</a></li>
                    </ul>
    
    <nav>
        <ul>
                                                                <li class="medal-progress medal-progress--bronze">
                        <a href="/help/medals#To-do" title="Progress towards next medal">
                            <div class="right small">1 of 5</div>
                            <div class="small medal-progress-medal">
                                To-do
                            </div>
                            <div class="progress progress--small">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                        </a>
                    </li>
                                <li class="nav-notifications nav-notifications--unread ">
                    <a class="popup-handle" href="/notifications" title="Notifications" data-popup-target="sibling">
                        <i class="far fa-bell"></i>
                    </a>
                    <div class="nav-notifications-popup popup">
                        <div class="notifications center">No unread notifications</div>
                        <a class="footer" href="/notifications">
                            View all notifications
                        </a>
                    </div>
                </li>
                <li class="nav-account">
                    <a href="/profile" title="Profile" data-popup-target="sibling">
                        <img src='https://zhr3.co.uk/uploads/navatar/default.png' data-lazy-image-size='navatar' width='40' class='' />
                        <span><?php 
echo $_SESSION['username']; ?></span>

                    </a>
                    <div class="nav-account-popup popup">
                        <ul>
                            <li>
                                <a href='/profile'>My profile</a>
                            </li>
                            <li>
                                <a href='/settings/profile'>Edit profile</a>
                            </li>
                            <li>
                                <a href='/settings'>Settings</a>    
                            </li>
                        </ul>

                        <ul>
                            <li>
                                <a href='/auth/logout'>Log out</a>
                            </li>
                        </ul>
                    </div>
                </li>
                    </ul>
    </nav>
</header>

<div class="nav-mobile mobile-show">
    <a href="/dashboard">
        <i class="fa fa-home"></i>
        Dashboard
    </a>
    <a href="/articles">
        <i class="fa fa-book"></i>
        Articles
    </a>
    <a href="/playground">
        <i class="fa fa-flask"></i>
        Playground
    </a>
    <a href="/discussions">
        <i class="fa fa-comment"></i>
        Discussions
    </a>
    <a href="#" class="show-sidebar">
        <i class="fa fa-ellipsis-v"></i>
        More
    </a>
</div>    <nav id="sidebar">
    <div class="sidebar-content">
                    <div class="">
        <div class="">
        <form
            class="form--search"
            action="/search"            method="POST"            enctype="multipart/form-data"
                    >
            
            
                            
                    
                        <div class="input input--hidden " data-group="token">
                            

                                                        

                                                                                            <input type="hidden" name="token" id="token" value="73f8894252cedce8d299743583716b9fa4df0f4b99cb267c24cf965a020eff52" maxlength="" placeholder="" class="u-full-width" />
                                                    </div>

                    
                                            
                    
                        <div class="input input--hidden " data-group="formid">
                            

                                                        

                                                                                            <input type="hidden" name="formid" id="formid" value="b3176ba001b7d318639829d59b0aa2c6" maxlength="" placeholder="" class="u-full-width" />
                                                    </div>

                    
                                            
                    
                        <div class="input input--text " data-group="q">
                            

                                                        

                                                                                            <input type="text" name="q" id="q" value="" maxlength="" placeholder="Search..." class="u-full-width" />
                                                    </div>

                    
                            
            
            <button type="submit" class="button button--main right"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
        
                        <ul>
                    <li class="label">
                                                    <a href='/dashboard'>
                                Dashboard

                                                            </a>
                                            </li>
                                    </ul>
                        <ul>
                    <li class="label">
                                                    <a href='/articles'>
                                Articles

                                                            </a>
                                            </li>
                                            
                        <li class=" ">
                                                            <a href="/articles">
                                    All topics

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/articles/coding">
                                    Coding

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/articles/hacking">
                                    Hacking

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/articles/privacy">
                                    Privacy

                                                                    </a>
                            
                            
                                                    </li>
                                    </ul>
                        <ul>
                    <li class="label">
                                                    <a href='/playground'>
                                Playground

                                                                                                            <div class="section-content">
                                            <div class="progress progress--small">
                                                <div class="progress-bar" style="width: 3.3333333333333%"></div>
                                            </div>
                                            <div class="right small">2 of 60</div>
                                        </div>
                                                                                                </a>
                                            </li>
                                    </ul>
                        <ul>
                    <li class="label">
                                                    <span>
                                Community
                            </span>
                                            </li>
                                            
                        <li class=" ">
                                                            <a href="/discussions">
                                    Discussions

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/chat">
                                    Chat

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class="has-children ">
                                                            <a href="/messages">
                                    Private messages

                                                                                                                    <div class="siderbar-item-count tag tag--secondary-alt">0</div>
                                                                    </a>
                            
                                                            <div class="sidebar-item-expand " data-toggle="ul">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            
                                                            <ul>
                                                                            
                                        <li class=" ">
                                            <a href="/messages/new">
                                                New conversation
                                            </a>
                                        </li>
                                                                    </ul>
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/statistics">
                                    Statistics

                                                                    </a>
                            
                            
                                                    </li>
                                    </ul>
                        <ul>
                    <li class="label">
                                                    <span>
                                
                            </span>
                                            </li>
                                            
                        <li class=" ">
                                                            <a href="/shop">
                                    Shop

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class=" ">
                                                            <a href="/donations">
                                    Donations

                                                                    </a>
                            
                            
                                                    </li>
                                            
                        <li class="has-children ">
                                                            <a href="/help">
                                    Help

                                                                    </a>
                            
                                                            <div class="sidebar-item-expand " data-toggle="ul">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            
                                                            <ul>
                                                                            
                                        <li class=" ">
                                            <a href="/help/contact">
                                                Contact us
                                            </a>
                                        </li>
                                                                    </ul>
                                                    </li>
                                            
                        <li class="has-children ">
                                                            <span data-toggle="ul">
                                    Legal
                                </span>
                            
                                                            <div class="sidebar-item-expand " data-toggle="ul">
                                    <i class="fas fa-angle-down"></i>
                                    <i class="fas fa-angle-up"></i>
                                </div>
                            
                                                            <ul>
                                                                            
                                        <li class=" ">
                                            <a href="/legal/privacy">
                                                Privacy policy
                                            </a>
                                        </li>
                                                                            
                                        <li class=" ">
                                            <a href="/legal/terms">
                                                Terms of use
                                            </a>
                                        </li>
                                                                    </ul>
                                                    </li>
                                    </ul>
            </div>

            <div class="sidebar-footer">
            <a href="#" data-toggle-dark-mode="true" class="dark-hide">
                Black hat
            </a>
            <a href="#" data-toggle-dark-mode="false" class="dark-show">
                White hat
            </a>
        </div>
    </nav>
        <div id="content" class="container container--wide course">
        <div class="row">
            <div class="eight columns">
                <div class="block">
                    <div class="block-heading block-heading--secondary">
                                                    <div class="right">
                                <a href='/playground/intro6' class="next-level">Next level <i class="fas fa-angle-right"></i></a>
                            </div>
                                                <h1>
                            Intro 5
                                                    </h1>
                        <span class="user-status">
                            <i class="fa fa-medal c-bronze"></i> <span class="c-subtle">/</span> 
                            <span>In progress</span>
                                                            <span class="c-subtle">/</span> Started <span title='31/10/2021 18:35 (UTC)'>57 minutes ago</span>
                                                    </span>
                    </div>

                    <div class="block-content row level">
                                                    
                        <div class="level-container">
    
    
    <div class="row">
        <div class="eight columns offset-by-two level-form">
                                                    <script>
        var pass;
        pass=prompt("Password","");
        if (pass=="87e53d6fe3") {
            window.location.href="verifJs5.php?pass=87e53d6fe3";
        }
    </script>
    <div class="msg msg--error">Unauthorized access</div>

                                    
                                    </div>
    </div>

    </div>                    </div>
                </div>

                            </div>

            <div class="four columns">
                <div class="block level-stats level-stats--progress">
                                            <div class="block-heading">
                            <h3>
                                213,658
                                <span class="small">completed</span>
                            </h3>
                        </div>
                                        <div class="block-content">

                        <div class="block">
                            <h3>94% <span class="small">pass rate</span></h3>
<div class="progress progress--small">
    <div class="progress-bar" style="width: 94%"></div>
</div>
<div class="right small" title="completed vs attempted">213,658 of 227,402</div>                        </div>

                            Last 5 days
    <canvas id="myChart" width="100%" height="20"></canvas>
    <script>
    $(function() {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1,2,3,4,5],
                datasets: [{
                    label: 'Started',
                    data: ["14","17","22","14","8","6"],
                    lineTension: 0,
                    fill: false,
                    pointRadius: 0
                }, {
                    label: 'Passed',
                    data: ["7","10","16","11","7","5"],
                    lineTension: 0,
                    fill: false,
                    pointRadius: 0,
                    borderColor: '#4caf50'
                }]
            },
            options: {
                animation: {
                    duration: 0
                },
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        position: 'right',
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 2,
                            beginAtZero:true,
                            padding: 6
                        },
                    }],
                    xAxes: [{
                        display: false
                    }]
                }
            }
        });
    });
    </script>
                    </div>
                </div>

                                        <div class="block profile-card profile-card--small ">
                    <h3 class="block-heading profile-meta-title"><i class="fas fa-trophy c-gold" aria-hidden="true"></i> First completed</h3>
                <div class="block-content">
            <div class="profile-card-avatar">
                <a href="https://defendtheweb.net/profile/johnathan">
                    <img src='https://zhr3.co.uk/uploads/avatar/default.png' data-lazy-image-size='avatar' width='80' class='' />
                </a>
            </div>
            <div class="profile-card-details">
                <a href="https://defendtheweb.net/profile/johnathan" >
                    <h2>Johnathan Barrett</h2>

                                            <span class="small">[Johnathan]</span>
                                    </a>

                                    <p><span title='05/01/2008 23:56 (UTC)'>13 years ago</span></p>
                            </div>

                    </div>
    </div>
                
                                    <div class="block">
                        <div class="block-content">
                            Last completed by <a href='https://defendtheweb.net/profile/eescobar'  data-profile-card='eescobar'>eescobar</a> <span title='31/10/2021 17:29 (UTC)'>2 hours ago</span>
                        </div>
                    </div>
                
                <div class="button-group  mobile-hide">
                                            <!-- <a class="button button--wide" href="/discussions/playground-help/new?level=10">View discussions</a> -->
                                        <a class="button button--wide" href="/help/contact?message=There is an issue with level &quot;Intro 5%22">Report issue</a>
                </div>
            </div>
        </div>

    </div>

    <div class="cookies">
        <p>This site only uses cookies that are essential for the functionality of this website. Cookies are not used for tracking or marketing purposes.</p>
        <p>By using our site, you acknowledge that you have read and understand our <a href='/legal/privacy'>Privacy Policy</a>, and <a href='/legal/terms'>Terms of Service</a>.</p>
        <a href='#' class='button button--wide button--main right'>Dismiss</a>
    </div>

        
        <script src="https://zhr3.co.uk/js/script.min.js?v=" crossorigin="anonymous" defer></script>
        <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" integrity="sha256-CfcERD4Ov4+lKbWbYqXD6aFM9M51gN4GUEtDhkWABMo=" crossorigin="anonymous" defer></script>

                    <script src="https://zhr3.co.uk/js/playground.min.js?v=" defer></script>
        
                
            </body>
</html>
