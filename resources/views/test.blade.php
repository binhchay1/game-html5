<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#000000">
    <link rel="stylesheet" href="https://static.itch.io/game.css?1688228046">

    <script type="text/javascript" src="https://static.itch.io/lib.min.js?1688228046"></script>
    <script type="text/javascript" src="https://static.itch.io/bundle.min.js?1688228046"></script>
    <script type="text/javascript" src="https://static.itch.io/lib/jquery.maskMoney.js"></script>
    <script data-src="https://static.itch.io/react.min.js?1688228046" id="lib_react_src"></script>
    <script type="text/javascript" src="https://static.itch.io/game.min.js?1688228046"></script>


    <style type="text/css" id="game_theme">
        :root {
            --itchio_ui_bg: #282828;
            --itchio_ui_bg_dark: #222222
        }

        .wrapper {
            --itchio_font_family: 'Anonymous Pro';
            --itchio_bg_color: #000000;
            --itchio_bg2_color: rgba(0, 0, 0, 1);
            --itchio_bg2_sub: #191919;
            --itchio_text_color: #ffffff;
            --itchio_link_color: #ffffff;
            --itchio_border_color: #262626;
            --itchio_button_color: #ffffff;
            --itchio_button_fg_color: #333333;
            --itchio_button_shadow_color: transparent;
            background-color: #000000;
            /*! */
            background-image: url(https://img.itch.zone/aW1nLzEyNDg2MTk4LmdpZg==/original/X9tYpB.gif);
            ;
            background-repeat: repeat;
            background-position: 100% 0;
            /* */
        }

        .inner_column {
            color: #ffffff;
            font-family: 'Anonymous Pro', Lato, LatoExtended, sans-serif;
            background-color: rgba(0, 0, 0, 1)
        }

        .inner_column ::selection {
            color: #333333;
            background: #ffffff
        }

        .inner_column ::-moz-selection {
            color: #333333;
            background: #ffffff
        }

        .inner_column h1,
        .inner_column h2,
        .inner_column h3,
        .inner_column h4,
        .inner_column h5,
        .inner_column h6 {
            font-family: 'Anonymous Pro';
            font-weight: bold;
            color: #ffffff
        }

        .inner_column a,
        .inner_column .footer a {
            color: #ffffff
        }

        .inner_column .button,
        .inner_column .button:hover,
        .inner_column .button:active {
            background-color: #ffffff;
            color: #333333;
            text-shadow: 0 1px 0px transparent
        }

        .inner_column hr {
            background-color: #262626
        }

        .inner_column table {
            border-color: #262626
        }

        .inner_column .redactor-box .redactor-toolbar li a {
            color: #ffffff
        }

        .inner_column .redactor-box .redactor-toolbar li a:hover,
        .inner_column .redactor-box .redactor-toolbar li a:active,
        .inner_column .redactor-box .redactor-toolbar li a.redactor-act {
            background-color: #ffffff !important;
            color: #333333 !important;
            text-shadow: 0 1px 0px transparent !important
        }

        .inner_column .redactor-box .redactor-toolbar .re-button-tooltip {
            text-shadow: none
        }

        .game_frame {
            background: #191919;
            /*! */
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)), url(https://img.itch.zone/aW1nLzEyNDg0NjkxLnBuZw==/original/h4R4AY.png);
            ;
            background-repeat: repeat;
            background-position: 0 0;
            /* */
        }

        .game_frame .embed_info {
            background-color: rgba(0, 0, 0, 0.85)
        }

        .game_loading .loader_bar .loader_bar_slider {
            background-color: #ffffff
        }

        .view_game_page .reward_row,
        .view_game_page .bundle_row {
            border-color: #191919 !important
        }

        .view_game_page .game_info_panel_widget {
            background: rgba(25, 25, 25, 1)
        }

        .view_game_page .star_value .star_fill {
            color: #ffffff
        }

        .view_game_page .rewards .quantity_input {
            background: rgba(25, 25, 25, 1);
            border-color: rgba(255, 255, 255, 0.5);
            color: #ffffff
        }

        .view_game_page .right_col {
            display: block
        }

        .game_devlog_page li .meta_row .post_likes {
            border-color: #191919
        }

        .game_devlog_post_page .post_like_button {
            box-shadow: inset 0 0 0 1px #262626
        }

        .game_comments_widget .community_post .post_footer a,
        .game_comments_widget .community_post .post_footer .vote_btn,
        .game_comments_widget .community_post .post_header .post_date a,
        .game_comments_widget .community_post .post_header .edit_message {
            color: rgba(255, 255, 255, 0.5)
        }

        .game_comments_widget .community_post .reveal_full_post_btn {
            background: linear-gradient(to bottom, transparent, #000000 50%, #000000);
            color: #ffffff
        }

        .game_comments_widget .community_post .post_votes {
            border-color: rgba(255, 255, 255, 0.2)
        }

        .game_comments_widget .community_post .post_votes .vote_btn:hover {
            background: rgba(255, 255, 255, 0.05)
        }

        .game_comments_widget .community_post .post_footer .vote_btn {
            border-color: rgba(255, 255, 255, 0.5)
        }

        .game_comments_widget .community_post .post_footer .vote_btn span {
            color: inherit
        }

        .game_comments_widget .community_post .post_footer .vote_btn:hover,
        .game_comments_widget .community_post .post_footer .vote_btn.voted {
            background-color: #ffffff;
            color: #333333;
            text-shadow: 0 1px 0px transparent;
            border-color: #ffffff
        }

        .game_comments_widget .form .redactor-box,
        .game_comments_widget .form .click_input,
        .game_comments_widget .form .forms_markdown_input_widget {
            border-color: rgba(255, 255, 255, 0.5);
            background: transparent
        }

        .game_comments_widget .form .redactor-layer,
        .game_comments_widget .form .redactor-toolbar,
        .game_comments_widget .form .click_input,
        .game_comments_widget .form .forms_markdown_input_widget {
            background: rgba(25, 25, 25, 1)
        }

        .game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button {
            color: inherit;
            opacity: 0.6
        }

        .game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button:hover,
        .game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button:active {
            opacity: 1;
            background-color: #ffffff !important;
            color: #333333 !important;
            text-shadow: 0 1px 0px transparent !important
        }

        .game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar,
        .game_comments_widget .form .forms_markdown_input_widget li {
            border-color: rgba(255, 255, 255, 0.5)
        }

        .game_comments_widget .form textarea {
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(25, 25, 25, 1);
            color: inherit
        }

        .game_comments_widget .form .redactor-toolbar {
            border-color: rgba(255, 255, 255, 0.5)
        }

        .game_comments_widget .hint {
            color: rgba(255, 255, 255, 0.5)
        }

        .game_community_preview_widget .community_topic_row .topic_tag {
            background-color: #191919
        }

        .footer .svgicon,
        .view_game_page .more_information_toggle .svgicon {
            fill: #ffffff !important
        }
    </style>
    <link type="text/css" href="https://fonts.googleapis.com/css?family=Anonymous%20Pro%3A400%2C400italic%2C700%2C700italic" rel="stylesheet">
    <link type="text/css" href="https://fonts.googleapis.com/css?family=Anonymous%20Pro%3A400%2C400italic%2C700%2C700italic" rel="stylesheet">
</head>

<body data-host="itch.io" data-page_name="view_game" class="locale_en game_layout embedded_game no_theme_toggle responsive">
    <ul id="user_tools" class="user_tools">
        <li><a href="https://alexander-wiseman.itch.io" class="action_btn view_more"><svg height="16" version="1.1" class="svgicon icon_itchio_new" width="18" viewBox="0 0 262.728 235.452" role="img" aria-hidden="">
                    <path d="M31.99 1.365C21.287 7.72.2 31.945 0 38.298v10.516C0 62.144 12.46 73.86 23.773 73.86c13.584 0 24.902-11.258 24.903-24.62 0 13.362 10.93 24.62 24.515 24.62 13.586 0 24.165-11.258 24.165-24.62 0 13.362 11.622 24.62 25.207 24.62h.246c13.586 0 25.208-11.258 25.208-24.62 0 13.362 10.58 24.62 24.164 24.62 13.585 0 24.515-11.258 24.515-24.62 0 13.362 11.32 24.62 24.903 24.62 11.313 0 23.773-11.714 23.773-25.046V38.298c-.2-6.354-21.287-30.58-31.988-36.933C180.118.197 157.056-.005 122.685 0c-34.37.003-81.228.54-90.697 1.365zm65.194 66.217a28.025 28.025 0 0 1-4.78 6.155c-5.128 5.014-12.157 8.122-19.906 8.122a28.482 28.482 0 0 1-19.948-8.126c-1.858-1.82-3.27-3.766-4.563-6.032l-.006.004c-1.292 2.27-3.092 4.215-4.954 6.037a28.5 28.5 0 0 1-19.948 8.12c-.934 0-1.906-.258-2.692-.528-1.092 11.372-1.553 22.24-1.716 30.164l-.002.045c-.02 4.024-.04 7.333-.06 11.93.21 23.86-2.363 77.334 10.52 90.473 19.964 4.655 56.7 6.775 93.555 6.788h.006c36.854-.013 73.59-2.133 93.554-6.788 12.883-13.14 10.31-66.614 10.52-90.474-.022-4.596-.04-7.905-.06-11.93l-.003-.045c-.162-7.926-.623-18.793-1.715-30.165-.786.27-1.757.528-2.692.528a28.5 28.5 0 0 1-19.948-8.12c-1.862-1.822-3.662-3.766-4.955-6.037l-.006-.004c-1.294 2.266-2.705 4.213-4.563 6.032a28.48 28.48 0 0 1-19.947 8.125c-7.748 0-14.778-3.11-19.906-8.123a28.025 28.025 0 0 1-4.78-6.155 27.99 27.99 0 0 1-4.736 6.155 28.49 28.49 0 0 1-19.95 8.124c-.27 0-.54-.012-.81-.02h-.007c-.27.008-.54.02-.813.02a28.49 28.49 0 0 1-19.95-8.123 27.992 27.992 0 0 1-4.736-6.155zm-20.486 26.49l-.002.01h.015c8.113.017 15.32 0 24.25 9.746 7.028-.737 14.372-1.105 21.722-1.094h.006c7.35-.01 14.694.357 21.723 1.094 8.93-9.747 16.137-9.73 24.25-9.746h.014l-.002-.01c3.833 0 19.166 0 29.85 30.007L210 165.244c8.504 30.624-2.723 31.373-16.727 31.4-20.768-.773-32.267-15.855-32.267-30.935-11.496 1.884-24.907 2.826-38.318 2.827h-.006c-13.412 0-26.823-.943-38.318-2.827 0 15.08-11.5 30.162-32.267 30.935-14.004-.027-25.23-.775-16.726-31.4L46.85 124.08c10.684-30.007 26.017-30.007 29.85-30.007zm45.985 23.582v.006c-.02.02-21.863 20.08-25.79 27.215l14.304-.573v12.474c0 .584 5.74.346 11.486.08h.006c5.744.266 11.485.504 11.485-.08v-12.474l14.304.573c-3.928-7.135-25.79-27.215-25.79-27.215v-.006l-.003.002z"></path>
                </svg><span class="full_label">View all by Alexander Wiseman</span><span class="mobile_label">Creator</span></a></li>
        <li><a data-unfollow_url="https://alexander-wiseman.itch.io/-/unfollow?source=game" data-register_action="follow_user" class="follow_user_btn action_btn" data-user_id="3799265" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=follow_user" data-follow_url="https://alexander-wiseman.itch.io/-/follow?source=game"><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_user_plus on_follow" stroke="currentColor" version="1.1" height="18" role="img" viewBox="0 0 24 24" width="18" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_user_check on_unfollow" stroke="currentColor" version="1.1" height="18" role="img" viewBox="0 0 24 24" width="18" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <polyline points="17 11 19 13 23 9"></polyline>
                </svg><span class="on_follow"><span class="full_label">Follow Alexander Wiseman</span><span class="mobile_label">Follow</span></span><span class="on_unfollow"><span class="full_label">Following Alexander Wiseman</span><span class="mobile_label">Following</span></span></a></li>
        <li><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=add_to_collection" class="action_btn add_to_collection_btn"><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_collection_add2" stroke="currentColor" version="1.1" height="18" role="img" viewBox="0 0 24 24" width="18" stroke-width="2">
                    <path d="M 1,6 H 14"></path>
                    <path d="M 1,11 H 14"></path>
                    <path d="m 1,16 h 9"></path>
                    <path d="M 18,11 V 21"></path>
                    <path d="M 13,16 H 23"></path>
                </svg><span class="full_label">Add To Collection</span><span class="mobile_label">Collection</span></a></li>
        <li class="community_link"><a href="https://alexander-wiseman.itch.io/fear-assessment#comments" class="action_btn"><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_comment" stroke="currentColor" version="1.1" height="18" role="img" viewBox="0 0 24 24" width="18" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>Comments</a></li>
        <li class="devlog_link"><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog" class="action_btn"><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_news" stroke="currentColor" version="1.1" height="18" role="img" viewBox="0 0 24 24" width="18" stroke-width="2">
                    <rect x="1" y="3" width="22" height="18" rx="2" ry="2"></rect>
                    <line x1="6" y1="8" x2="18" y2="8"></line>
                    <line x1="6" y1="12" x2="18" y2="12"></line>
                    <line x1="6" y1="16" x2="18" y2="16"></line>
                </svg>Devlog</a></li>
    </ul>
    <script type="text/javascript">
        new I.GameUserTools('#user_tools')
    </script>
    <div id="wrapper" class="main wrapper">
        <div class="inner_column size_very_large family_anonymous-pro" id="inner_column" style="min-height: 618px;">
            <div class="header" id="header">
                <h1 itemprop="name" class="game_title">Fear Assessment</h1>
            </div>
            <div class="view_html_game_page view_game_page page_widget base_widget buy_on_top ready" id="view_html_game_1287516">
                <div class="html_embed_widget base_widget embed_wrapper" id="html_embed_1469420">
                    <div data-height="480" class="game_frame game_pending" data-width="854" style="width: 854px; height: 480px"><button title="Enter fullscreen" class="fullscreen_btn"><img src="https://itch.io/static/images/enlarge.svg?1688228046"></button>
                        <div data-iframe="<iframe allowtransparency=&quot;true&quot; webkitallowfullscreen=&quot;true&quot; mozallowfullscreen=&quot;true&quot; msallowfullscreen=&quot;true&quot; allow=&quot;autoplay; fullscreen *; geolocation; microphone; camera; midi; monetization; xr-spatial-tracking; gamepad; gyroscope; accelerometer; xr; cross-origin-isolated&quot; src=&quot;https://v6p9d9t4.ssl.hwcdn.net/html/8119337/FEARASSESSMENTMOBILE2/index.html&quot; frameborder=&quot;0&quot; id=&quot;game_drop&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;true&quot;></iframe>" class="iframe_placeholder"><button class="button load_iframe_btn"><svg stroke-linecap="round" stroke-linejoin="round" fill="none" aria-hidden="" class="svgicon icon_play" stroke="currentColor" version="1.1" height="24" role="img" viewBox="0 0 24 24" width="24" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                </svg> Run assessment</button></div>
                    </div>
                </div>
                <div class="donate"><a data-donate="false" href="https://alexander-wiseman.itch.io/fear-assessment/purchase" class="button donate_btn">Download Now</a></div>
                <div class="columns">
                    <div class="left_col column">
                        <div class="formatted_description user_formatted">
                            <p>"The<em> FEAR ASSESSMENT</em>&nbsp;program is a specialized test developed and implemented by government agencies to collect data on psychological torture techniques and their impact on individuals. It serves as an essential tool in understanding the effects of fear-based manipulation. This test uses your webcam."<br></p>
                            <p>"In order to follow the test to its full extent, you must follow these 6 rules:</p>
                            <p>1. Leave all doors in sight wide open</p>
                            <p>2. Make sure you are alone</p>
                            <p>3. Turn off all lights</p>
                            <p>4. Follow all instructions</p>
                            <p>5. Stay focused on the test</p>
                            <p>6. Ignore all auditory and visual hallucinations"</p>
                            <p>**<strong>CONTAINS LOUD NOISES AND FLASHING LIGHTS VIEWER DISCRETION IS ADVISED</strong>**<br></p>
                            <p><a href="https://alexander-wiseman.itch.io/fear-assessment-plus"><img src="https://img.itch.zone/aW1nLzEyNjIzODY4LmdpZg==/original/Hsk3rC.gif" alt="Fear Assessment Plus" title="Fear Assessment Plus" loading="lazy"></a><br></p>
                            <figure><a href="https://patreon.com/alexanderwiseman?utm_medium=clipboard_copy&amp;utm_source=copyLink&amp;utm_campaign=creatorshare_creator&amp;utm_content=join_link" style="font-size: inherit" rel="nofollow noopener" referrerpolicy="origin"><img src="https://img.itch.zone/aW1nLzEyNjE5MTgyLnBuZw==/original/sa1uk5.png" alt="My Patreon" title="My Patreon" loading="lazy"></a><br></figure>
                        </div>
                        <div class="more_information_toggle">
                            <div class="toggle_row"><a href="javascript:void(0)" class="toggle_info_btn">More information<svg height="6" version="1.1" class="svgicon icon_down_tick" width="12" viewBox="0 0 37 20" role="img" aria-hidden="">
                                        <path d="m2.0858 0c-1.1535 0-2.0858 0.86469-2.0858 1.9331 0 0.5139 0.21354 1.0183 0.38704 1.1881l18.113 16.879 18.112-16.879c0.174-0.1696 0.388-0.674 0.388-1.1879 0-1.0684-0.932-1.9331-2.086-1.9331-0.577 0-1.111 0.23008-1.49 0.57992l-14.924 13.894-14.925-13.893c-0.3777-0.34998-0.9134-0.581-1.4902-0.581z"></path>
                                    </svg></a></div>
                            <div class="info_panel_wrapper">
                                <div class="game_info_panel_widget base_widget" id="game_info_panel_2336217">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Updated</td>
                                                <td><abbr title="29 June 2023 @ 23:47"><span aria-hidden="true" class="icon icon-stopwatch"></span> 4 days ago</abbr></td>
                                            </tr>
                                            <tr>
                                                <td>Published</td>
                                                <td><abbr title="15 June 2023 @ 19:19"><span aria-hidden="true" class="icon icon-stopwatch"></span> 18 days ago</abbr></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><a href="https://itch.io/games/released">Released</a></td>
                                            </tr>
                                            <tr>
                                                <td>Platforms</td>
                                                <td><a href="https://itch.io/games/platform-windows">Windows</a>, <a href="https://itch.io/games/platform-osx">macOS</a>, <a href="https://itch.io/games/platform-linux">Linux</a>, <a href="https://itch.io/games/html5">HTML5</a></td>
                                            </tr>
                                            <tr>
                                                <td>Release date</td>
                                                <td><abbr title="15 June 2023 @ 19:00"><span aria-hidden="true" class="icon icon-stopwatch"></span> 18 days ago</abbr></td>
                                            </tr>
                                            <tr>
                                                <td>Rating</td>
                                                <td>
                                                    <div title="4.5" class="aggregate_rating" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope="">
                                                        <div itemprop="ratingValue" content="4.5" class="star_value"><span class="screenreader_only">Rated 4.5 out of 5 stars</span>
                                                            <div style="width: 90.50847%" class="star_fill"><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span></div>
                                                            <div class="star_holes"><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span></div>
                                                        </div><span itemprop="ratingCount" content="118" class="rating_count">(118<span class="screenreader_only"> total ratings</span>)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Author</td>
                                                <td><a href="https://alexander-wiseman.itch.io">Alexander Wiseman</a></td>
                                            </tr>
                                            <tr>
                                                <td>Genre</td>
                                                <td><a href="https://itch.io/games/genre-simulation">Simulation</a></td>
                                            </tr>
                                            <tr>
                                                <td>Made with</td>
                                                <td><a href="https://itch.io/games/made-with-audacity">Audacity</a>, <a href="https://itch.io/games/made-with-construct">Construct</a></td>
                                            </tr>
                                            <tr>
                                                <td>Tags</td>
                                                <td><a href="https://itch.io/games/tag-creepy">Creepy</a>, <a href="https://itch.io/games/tag-horror">Horror</a>, <a href="https://itch.io/games/tag-point-and-click">Point &amp; Click</a>, <a href="https://itch.io/games/tag-psychological-horror">Psychological Horror</a>, <a href="https://itch.io/games/tag-singleplayer">Singleplayer</a></td>
                                            </tr>
                                            <tr>
                                                <td>Average session</td>
                                                <td><a href="https://itch.io/games/duration-minutes">A few minutes</a></td>
                                            </tr>
                                            <tr>
                                                <td>Languages</td>
                                                <td><a href="https://itch.io/games/lang-en">English</a></td>
                                            </tr>
                                            <tr>
                                                <td>Inputs</td>
                                                <td><a href="https://itch.io/games/input-keyboard">Keyboard</a>, <a href="https://itch.io/games/input-mouse">Mouse</a>, <a href="https://itch.io/games/input-touchscreen">Touchscreen</a>, <a href="https://itch.io/games/input-phone">Smartphone</a></td>
                                            </tr>
                                            <tr>
                                                <td>Accessibility</td>
                                                <td><a href="https://itch.io/games/accessibility-colorblind">Color-blind friendly</a></td>
                                            </tr>
                                            <tr>
                                                <td>Links</td>
                                                <td><a rel="nofollow noopener" href="https://www.patreon.com/alexanderwiseman">Patreon</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h2 id="download">Download</h2>
                        <div class="buy_row">
                            <div class="button_message"><a href="https://alexander-wiseman.itch.io/fear-assessment/purchase" class="button buy_btn">Download Now</a><span class="buy_message"><span class="sub">Name your own price</span></span></div>
                        </div>
                        <div class="uploads">
                            <p>Click download now to get access to the following files:</p>
                            <div class="upload_list_widget base_widget" id="upload_list_2850285">
                                <div class="upload">
                                    <div class="info_column">
                                        <div class="upload_name"><strong title="linux64.zip" class="name">linux64.zip</strong> <span class="file_size"><span>122 MB</span></span> <span class="download_platforms"><span title="Download for Linux" class="icon icon-tux" aria-hidden="true"></span> </span></div>
                                    </div>
                                </div>
                                <div class="upload">
                                    <div class="info_column">
                                        <div class="upload_name"><strong title="osx64.zip" class="name">osx64.zip</strong> <span class="file_size"><span>133 MB</span></span> <span class="download_platforms"><span title="Download for macOS" class="icon icon-apple" aria-hidden="true"></span> </span></div>
                                    </div>
                                </div>
                                <div class="upload">
                                    <div class="info_column">
                                        <div class="upload_name"><strong title="win64.zip" class="name">win64.zip</strong> <span class="file_size"><span>130 MB</span></span> <span class="download_platforms"><span title="Download for Windows" class="icon icon-windows8" aria-hidden="true"></span> </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section id="devlog" class="game_devlog">
                            <h2>Development log</h2>
                            <ul>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/551154/fear-assessment-plus-june-26th">FEAR ASSESSMENT PLUS - JUNE 26TH</a>
                                    <div class="post_date"><abbr title="26 June 2023 @ 04:22"><span aria-hidden="true" class="icon icon-stopwatch"></span> 8 days ago</abbr></div>
                                </li>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/547961/fear-assessment-fear-assessment">FEAR ASSESSMENT - FEAR ASSESSMENT+</a>
                                    <div class="post_date"><abbr title="19 June 2023 @ 03:29"><span aria-hidden="true" class="icon icon-stopwatch"></span> 15 days ago</abbr></div>
                                </li>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546913/fear-assessment-gamejolt-page">FEAR ASSESSMENT - GAMEJOLT PAGE</a>
                                    <div class="post_date"><abbr title="16 June 2023 @ 20:02"><span aria-hidden="true" class="icon icon-stopwatch"></span> 17 days ago</abbr></div>
                                </li>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546782/fear-assessment-html-patch-101">FEAR ASSESSMENT - HTML PATCH 1.0.1</a>
                                    <div class="post_date"><abbr title="16 June 2023 @ 15:29"><span aria-hidden="true" class="icon icon-stopwatch"></span> 17 days ago</abbr></div>
                                </li>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546473/fear-assessment-mobile-and-html-support">FEAR ASSESSMENT - MOBILE AND HTML SUPPORT</a>
                                    <div class="post_date"><abbr title="15 June 2023 @ 21:49"><span aria-hidden="true" class="icon icon-stopwatch"></span> 18 days ago</abbr></div>
                                </li>
                                <li><a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546377/fear-assessment-official-launch">FEAR ASSESSMENT OFFICIAL LAUNCH</a>
                                    <div class="post_date"><abbr title="15 June 2023 @ 19:33"><span aria-hidden="true" class="icon icon-stopwatch"></span> 18 days ago</abbr></div>
                                </li>
                            </ul>
                        </section>
                        <div class="game_comments_widget base_widget" id="game_comments_2099507">
                            <h2 id="comments">Comments</h2>
                            <p class="form_placeholder"><a data-register_action="comment" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment">Log in with itch.io</a> to leave a comment.</p>
                            <div class="community_topic_posts_widget base_widget" id="community_topic_posts_9367186">
                                <div class="topic_pager "><span class="page_label">Viewing most recent comments <nobr><span>1</span> to <span>40</span> of 242</nobr></span> · <a href="https://alexander-wiseman.itch.io/fear-assessment/comments?before=203" class="page_link">Next page</a> · <a href="https://alexander-wiseman.itch.io/fear-assessment/comments?after=0" class="page_link">Last page</a></div>
                                <div class="community_post_list_widget base_widget" id="community_post_list_7904373">
                                    <div id="post-8053711" data-post="{&quot;user_id&quot;:4681306,&quot;id&quot;:8053711}" class="community_post has_vote_column">
                                        <div id="first-post" class="post_anchor"></div>
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/ry-berus" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-cyan.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/ry-berus">Ry_berus</a></span><span title="2023-07-04 09:53:56" class="post_date"><a href="https://itch.io/post/8053711">1 hour ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/UgzVTqGn_x8&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UgzVTqGn_x8/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>Terrifying, couldnt even make it through
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8052510" data-post="{&quot;user_id&quot;:1567148,&quot;id&quot;:8052510}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/modern-horror-gaming" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzQzMzQwNTYucG5n/25x25%23/xs4NBQ.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/modern-horror-gaming">Modern Horror Gaming</a></span><span title="2023-07-04 02:26:06" class="post_date"><a href="https://itch.io/post/8052510">9 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>solid analogue horror, thank you</p>
                                                    <p>Full Play No Commentary</p>
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/6tdYtxd0E4s&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/6tdYtxd0E4s/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8052423" data-post="{&quot;user_id&quot;:5385222,&quot;id&quot;:8052423}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/heroyasuke" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzExOTY3MzE0LmpwZWc=/25x25%23/wE1%2FQh.jpeg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/heroyasuke">HeroYasuke</a></span><span title="2023-07-04 01:51:15" class="post_date"><a href="https://itch.io/post/8052423">10 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/Ygxb0lQe2BY&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/Ygxb0lQe2BY/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>DEFINITELY CHECK IT OUT
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8052292" data-post="{&quot;user_id&quot;:1080229,&quot;id&quot;:8052292}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/captainsly" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzExMTUyNjg3LmpwZw==/25x25%23/4mrq7N.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/captainsly">Sly</a></span><span title="2023-07-04 01:07:49" class="post_date"><a href="https://itch.io/post/8052292">10 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/NDwkwW-oWCg&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NDwkwW-oWCg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>yeeeeesuh!
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8052047" data-post="{&quot;user_id&quot;:8368879,&quot;id&quot;:8052047}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/thescarygamerog" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/thescarygamerog">TheScaryGamerOG</a></span><span title="2023-07-03 23:48:44" class="post_date"><a href="https://itch.io/post/8052047">12 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>This video made me scared for lots a reasons Examples! Where it told me what would happen if a figure would appear in the corner of your room! This got me looking behind me the hole video! Also the sound part made me confused and scared! Thank you so much for making this masterpiece! I haven't seen such a well-made game in a while! Can't wait to play more games by you! I rate this game a solid 910.&nbsp;
                                                    </p>
                                                    <p>Thank you so much for making this masterpiece! I havent seen such a well made game in a while! Cant wait for more games by you! I rate this game a 9/10&nbsp;
                                                    </p>
                                                    <p>I made a video On it if anyone is interested in watching it
                                                    </p>
                                                    <div>
                                                        <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/NM6fvtfjAGc&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NM6fvtfjAGc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div><br>
                                                    </div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8051895" data-post="{&quot;user_id&quot;:5036749,&quot;id&quot;:8051895}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/lugii" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzczMjIxNTEucG5n/25x25%23/OiqjQE.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/lugii">Lugii</a></span><span title="2023-07-03 23:03:32" class="post_date"><a href="https://itch.io/post/8051895">12 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>im shitting my ass from this bro chill 😭</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8051308" data-post="{&quot;user_id&quot;:6533988,&quot;id&quot;:8051308}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/jzeeyt" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEwNDA3NTU1LmpwZWc=/25x25%23/HTg2jD.jpeg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/jzeeyt">JZeeYT</a></span><span title="2023-07-03 20:57:20" class="post_date"><a href="https://itch.io/post/8051308">14 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I started to freak out, this game is 10/10!</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/B73Ki3603Z4&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/B73Ki3603Z4/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8050885" data-post="{&quot;user_id&quot;:6336616,&quot;id&quot;:8050885}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/crankyberry" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNjU3MDQ1LnBuZw==/25x25%23/XVgGFO.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/crankyberry">chrisy</a></span><span title="2023-07-03 19:22:08" class="post_date"><a href="https://itch.io/post/8050885">16 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I shited my pants 10/10 ♥</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8050730" data-post="{&quot;user_id&quot;:7389185,&quot;id&quot;:8050730}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/gmbno" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNTQxNzYwLnBuZw==/25x25%23/qL4qnb.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/gmbno">Gmbno</a></span><span title="2023-07-03 18:49:09" class="post_date"><a href="https://itch.io/post/8050730">17 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>This game is so creepy! I swear my table started floating while playing it lol&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/UPOOT2UrwPg&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UPOOT2UrwPg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8050406" data-post="{&quot;user_id&quot;:1714083,&quot;id&quot;:8050406}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/77gamers" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzMyMTk3MTkucG5n/25x25%23/CNDFgo.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/77gamers">77Gamers</a></span><span title="2023-07-03 17:41:49" class="post_date"><a href="https://itch.io/post/8050406">18 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/sdAxcWItx9g&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/sdAxcWItx9g/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>My Fear has been assessed.
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8049743" data-post="{&quot;user_id&quot;:7524328,&quot;id&quot;:8049743}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/clapnuggets" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-gold.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/clapnuggets">clapnuggets</a></span><span title="2023-07-03 14:55:57" class="post_date"><a href="https://itch.io/post/8049743">20 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>ow my ears</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8049550" data-post="{&quot;user_id&quot;:7932229,&quot;id&quot;:8049550}" class="community_post has_vote_column has_replies">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/myroze" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzExODYyOTkzLnBuZw==/25x25%23/9VrxjR.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/myroze">Myroze</a></span><span title="2023-07-03 14:05:31" class="post_date"><a href="https://itch.io/post/8049550">21 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/aiWaR8d6HwY&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/aiWaR8d6HwY/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>Gave me some good goosebumps, would love something like this that is longer!
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="community_post_replies top_level_replies">
                                        <div id="post-8049577" data-post="{&quot;user_id&quot;:3799265,&quot;id&quot;:8049577}" class="community_post is_reply has_vote_column has_replies">
                                            <div class="post_grid">
                                                <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                            <polygon points="2 18 12 6 22 18"></polygon>
                                                        </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                            <polygon points="2 6 12 18 22 6"></polygon>
                                                        </svg></a></div><a href="https://itch.io/profile/alexander-wiseman" class="avatar_container">
                                                    <div style="background-image: url(https://img.itch.zone/aW1nLzExMjEyNDMyLnBuZw==/25x25%23/Foyfzv.png)" class="post_avatar"></div>
                                                </a>
                                                <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/alexander-wiseman">Alexander Wiseman</a></span><span title="2023-07-03 14:11:22" class="post_date"><a href="https://itch.io/post/8049577">21 hours ago</a></span><span class="vote_counts"></span></div>
                                                <div class="post_content">
                                                    <div dir="auto" class="post_body user_formatted">
                                                        <p>Glad you enjoyed, Fear Assessment Plus is much longer!</p>
                                                    </div>
                                                    <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="community_post_replies">
                                            <div id="post-8049603" data-post="{&quot;user_id&quot;:7932229,&quot;id&quot;:8049603}" class="community_post has_vote_column is_reply">
                                                <div class="post_grid">
                                                    <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                                <polygon points="2 18 12 6 22 18"></polygon>
                                                            </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                                <polygon points="2 6 12 18 22 6"></polygon>
                                                            </svg></a></div><a href="https://itch.io/profile/myroze" class="avatar_container">
                                                        <div style="background-image: url(https://img.itch.zone/aW1nLzExODYyOTkzLnBuZw==/25x25%23/9VrxjR.png)" class="post_avatar"></div>
                                                    </a>
                                                    <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/myroze">Myroze</a></span><span title="2023-07-03 14:17:09" class="post_date"><a href="https://itch.io/post/8049603">21 hours ago</a></span><span class="vote_counts"></span></div>
                                                    <div class="post_content">
                                                        <div dir="auto" class="post_body user_formatted">
                                                            <p>Oh shiiit awesome! definitely will check it out</p>
                                                        </div>
                                                        <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8049189" data-post="{&quot;user_id&quot;:3744716,&quot;id&quot;:8049189}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/tristmaner" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNTMxNzY4LmpwZw==/25x25%23/3vG1Xb.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/tristmaner">Tristmaner</a></span><span title="2023-07-03 12:15:59" class="post_date"><a href="https://itch.io/post/8049189">23 hours ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Absolutely loved the analog horror style of game. Would love to play more of these types of games.</p>
                                                    <p>I played it as the third game in this video.</p>
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/0PSYS5mpPXg&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/0PSYS5mpPXg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8049087" data-post="{&quot;user_id&quot;:8378934,&quot;id&quot;:8049087}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/cobzzy" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/cobzzy">Cobzzy</a></span><span title="2023-07-03 11:41:53" class="post_date"><a href="https://itch.io/post/8049087">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Hello, Is it possible to make a mobile version for this?</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8049022" data-post="{&quot;user_id&quot;:4322970,&quot;id&quot;:8049022}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/gaijin-gazza" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/gaijin-gazza">gaijin_gazza</a></span><span title="2023-07-03 11:18:45" class="post_date"><a href="https://itch.io/post/8049022">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Great little game with creepy imagery and sounds. You can check out the gameplay here without commentary. Please feel free to check out more games on my channel.</p>
                                                    <p><br></p>
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/dhMZE3jotz8&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/dhMZE3jotz8/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8048817" data-post="{&quot;user_id&quot;:8110009,&quot;id&quot;:8048817}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/aldeiguber" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyMTkzNDU1LnBuZw==/25x25%23/xK3Uvf.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/aldeiguber">Aldeiguber</a></span><span title="2023-07-03 09:44:37" class="post_date"><a href="https://itch.io/post/8048817">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>The game turned out to be scary, I shlt myself. Thanks</p>
                                                    <figure><img src="https://img.itch.zone/aW1nLzEyNjU0NjE1LmpwZWc=/original/3Cppy2.jpeg" style="color: inherit; font-size: inherit" loading="lazy"><span></span><span></span></figure>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8048601" data-post="{&quot;user_id&quot;:8378179,&quot;id&quot;:8048601}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/amra12" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/amra12">Amra12</a></span><span title="2023-07-03 08:06:56" class="post_date"><a href="https://itch.io/post/8048601">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>The game is quite creepy. I don't know why, but these faces are very uncomfortable</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8047057" data-post="{&quot;user_id&quot;:5367033,&quot;id&quot;:8047057}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/princehooper" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzgxMTkyNzkuanBn/25x25%23/oGclDp.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/princehooper">Princehooper</a></span><span title="2023-07-02 22:41:47" class="post_date"><a href="https://itch.io/post/8047057">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/kQEqLHoG6UE&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/kQEqLHoG6UE/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>OMG THIS IS TOO GOOD
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8047046" data-post="{&quot;user_id&quot;:3454170,&quot;id&quot;:8047046}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/5mg" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzQ0Nzg3NjYucG5n/25x25%23/7OhNT%2F.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/5mg">5mg</a></span><span title="2023-07-02 22:39:23" class="post_date"><a href="https://itch.io/post/8047046">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I had to post it in my other channel. Really a good experience. </p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/R39ObIPt5rc&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/R39ObIPt5rc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8046388" data-post="{&quot;user_id&quot;:3939248,&quot;id&quot;:8046388}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/nobara" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-gold.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/nobara">nobara</a></span><span title="2023-07-02 19:57:32" class="post_date"><a href="https://itch.io/post/8046388">1 day ago</a></span><span class="vote_counts"><span class="upvotes">(+2)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I have an exam tomorrow and i was trying to find a way to keep awake to study, thanks!&nbsp;I had to keep my lights on during the game&nbsp;and still cried.</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8046141" data-post="{&quot;user_id&quot;:8374876,&quot;id&quot;:8046141}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/deadlyrun76" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-cyan.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/deadlyrun76">Deadlyrun76</a></span><span title="2023-07-02 18:51:28" class="post_date"><a href="https://itch.io/post/8046141">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Android?((<span style="color: inherit"></span></p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8045332" data-post="{&quot;user_id&quot;:4570126,&quot;id&quot;:8045332}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/smif" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-cyan.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/smif">smif</a></span><span title="2023-07-02 15:29:24" class="post_date"><a href="https://itch.io/post/8045332">1 day ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Loved it!!&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/oGB-mHgVEwE&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/oGB-mHgVEwE/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8043559" data-post="{&quot;user_id&quot;:7092381,&quot;id&quot;:8043559}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/rimzlastperson" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEwOTE4OTA0LmpwZw==/25x25%23/wT7Ivl.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/rimzlastperson">RimZlastperson</a></span><span title="2023-07-02 04:21:11" class="post_date"><a href="https://itch.io/post/8043559">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>W game. Keep it up man.</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/jwRcl1lOUiY&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/jwRcl1lOUiY/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8043467" data-post="{&quot;user_id&quot;:8262914,&quot;id&quot;:8043467}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/tanjio904" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/tanjio904">Tanjio904</a></span><span title="2023-07-02 03:43:18" class="post_date"><a href="https://itch.io/post/8043467">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>This game is too much...&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/s_DCxHwfcxU&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/s_DCxHwfcxU/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8043204" data-post="{&quot;user_id&quot;:3301106,&quot;id&quot;:8043204}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/druzer" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzY4OTY4MjIucG5n/25x25%23/fliGKL.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/druzer">druzer</a></span><span title="2023-07-02 02:17:04" class="post_date"><a href="https://itch.io/post/8043204">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <p></p>
                                                    <p>W Game</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/UjM2HcyjvaY&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UjM2HcyjvaY/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8043000" data-post="{&quot;user_id&quot;:3158524,&quot;id&quot;:8043000}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/shxxtzzgames" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzc3NTIxMjUucG5n/25x25%23/nPG9Hx.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/shxxtzzgames">SHXXTZZ</a></span><span title="2023-07-02 01:09:56" class="post_date"><a href="https://itch.io/post/8043000">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>great game way to loud tho lol </p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/mpfTHw5uI6g&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/mpfTHw5uI6g/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8042887" data-post="{&quot;user_id&quot;:7570409,&quot;id&quot;:8042887}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/vikinguriadventures" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/vikinguriadventures">ViKingUriAdventures</a></span><span title="2023-07-02 00:20:27" class="post_date"><a href="https://itch.io/post/8042887">2 days ago</a></span><span class="vote_counts"><span class="downvotes">(-1)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>This game really creeped me out. Good job!&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/SW4sCFF_Ga0&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/SW4sCFF_Ga0/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8042627" data-post="{&quot;user_id&quot;:8369483,&quot;id&quot;:8042627}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/august6wn" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNjQzMDYwLmpwZw==/25x25%23/%2FUNt1v.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/august6wn">Mud Point</a></span><span title="2023-07-01 23:09:03" class="post_date"><a href="https://itch.io/post/8042627">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p><strong>Nice job.</strong></p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8041698" data-post="{&quot;user_id&quot;:6910041,&quot;id&quot;:8041698}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/the-bucket" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEwNDUxMjgxLnBuZw==/25x25%23/jpZdyi.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/the-bucket">The Bucket</a></span><span title="2023-07-01 18:56:11" class="post_date"><a href="https://itch.io/post/8041698">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Such an interesting game. While it didn't super scary me. I loved the concept and it gave me a LOT of chills. Made a video on it if anyone wants to check it out -&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/7faAETZC-ME&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/7faAETZC-ME/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8041576" data-post="{&quot;user_id&quot;:8368879,&quot;id&quot;:8041576}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/thescarygamerog" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/thescarygamerog">TheScaryGamerOG</a></span><span title="2023-07-01 18:23:23" class="post_date"><a href="https://itch.io/post/8041576">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>This video made me scared for lots a reasons Examples! Where it told me what would happen if a figure would appear in the corner of your room! This got me looking behind me the hole video! Also the sound part made me confused and scared! Thank you so much for making this masterpiece! I haven't seen such a well-made game in a while! Can't wait to play more games by you! I rate this game a solid 910.&nbsp;</p>
                                                    <p>Thank you so much for making this masterpiece! I havent seen such a well made game in a while! Cant wait for more games by you! I rate this game a 9/10&nbsp;</p>
                                                    <p>I made a video On it if anyone is interested in watching it</p>
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/NM6fvtfjAGc&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NM6fvtfjAGc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8041441" data-post="{&quot;user_id&quot;:6410025,&quot;id&quot;:8041441}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/steeletech" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/steeletech">steeletech</a></span><span title="2023-07-01 17:43:58" class="post_date"><a href="https://itch.io/post/8041441">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>i usually find these horror "tests" pretty ridiculous but this is probably the best one out there right now. it's not very scary, especially the audio, but it holds up its own. the only thing that rly scared me was the face at the end, im playing on a tv rn so it was just inescapable lmaooo. good game 7/10</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8041141" data-post="{&quot;user_id&quot;:6751765,&quot;id&quot;:8041141}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/tincel-cat" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/tincel-cat">Tincel_Cat</a></span><span title="2023-07-01 16:36:41" class="post_date"><a href="https://itch.io/post/8041141">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>omfg, ima show this to all my friends. i kept having to glance at my door</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8041135" data-post="{&quot;user_id&quot;:7389185,&quot;id&quot;:8041135}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/gmbno" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNTQxNzYwLnBuZw==/25x25%23/qL4qnb.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/gmbno">Gmbno</a></span><span title="2023-07-01 16:35:22" class="post_date"><a href="https://itch.io/post/8041135">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I actually think this game is cursed lol I felt like someone was watching when I was playing.&nbsp;</p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/UPOOT2UrwPg&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UPOOT2UrwPg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8040896" data-post="{&quot;user_id&quot;:8363285,&quot;id&quot;:8040896}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/hgk1304" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/hgk1304">Hgk1304!</a></span><span title="2023-07-01 15:37:02" class="post_date"><a href="https://itch.io/post/8040896">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>that was fking scary lo</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8040786" data-post="{&quot;user_id&quot;:6684251,&quot;id&quot;:8040786}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/smandwatch" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEwMTU2NTUyLmpwZw==/25x25%23/Ooo5JU.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/smandwatch">Smandwatch</a></span><span title="2023-07-01 15:09:12" class="post_date"><a href="https://itch.io/post/8040786">2 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>the audio and the face at the end made me jump a little but its a really good game!</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8040615" data-post="{&quot;user_id&quot;:4993318,&quot;id&quot;:8040615}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/freshsweet" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEwMDQzMTY2LmpwZw==/25x25%23/xpvlmc.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/freshsweet">FreshSweet</a></span><span title="2023-07-01 14:23:32" class="post_date"><a href="https://itch.io/post/8040615">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>Wasnt ready for my cam to activate itself XD<br>I was in vc with more than 6 people they were all watching that was crazy. Interested as hell continue like that !</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8040558" data-post="{&quot;user_id&quot;:5036218,&quot;id&quot;:8040558}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/bakanik" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzc3NDM2NjYuanBn/25x25%23/SMLj6r.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/bakanik">bakanik.</a></span><span title="2023-07-01 14:03:09" class="post_date"><a href="https://itch.io/post/8040558">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/WgencsYyNaQ&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/WgencsYyNaQ/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>the audio is scares me fr<br>good game i liek it&nbsp;
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8039882" data-post="{&quot;user_id&quot;:6191794,&quot;id&quot;:8039882}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/bloodstains" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzkyMTI2NzEuanBn/25x25%23/wkc43p.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/bloodstains">haunted&lt;3</a></span><span title="2023-07-01 10:19:38" class="post_date"><a href="https://itch.io/post/8039882">3 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>everyone saying that the game wasnt scary is lyinggg. creepy imagery always seems to scare me somehow but i still loved the game</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8039650" data-post="{&quot;user_id&quot;:3275896,&quot;id&quot;:8039650}" class="community_post has_vote_column">
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/govno1223" class="avatar_container">
                                                <div style="background-image: url(/static/images/frog-cyan.png)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/govno1223">govno1223</a></span><span title="2023-07-01 08:47:54" class="post_date"><a href="https://itch.io/post/8039650">3 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>awsome game</p>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="post-8039279" data-post="{&quot;user_id&quot;:8064761,&quot;id&quot;:8039279}" class="community_post has_vote_column">
                                        <div id="last-post" class="post_anchor"></div>
                                        <div class="post_grid">
                                            <div class="post_votes"><a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote up" data-register_action="community_vote" class="vote_up_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_up" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 18 12 6 22 18"></polygon>
                                                    </svg></a> <a href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" title="Vote down" data-register_action="community_vote" class="vote_down_btn vote_btn"><svg height="20" version="1.1" class="svgicon icon_vote_down" width="20" viewBox="0 0 24 24" role="img" aria-hidden="">
                                                        <polygon points="2 6 12 18 22 6"></polygon>
                                                    </svg></a></div><a href="https://itch.io/profile/ethans-way-of-gaming" class="avatar_container">
                                                <div style="background-image: url(https://img.itch.zone/aW1nLzEyNjE1ODg4LmpwZw==/25x25%23/52WfUu.jpg)" class="post_avatar"></div>
                                            </a>
                                            <div class="post_header"><span class="post_author"><a href="https://itch.io/profile/ethans-way-of-gaming">Ethan's Way of Gaming</a></span><span title="2023-07-01 06:35:26" class="post_date"><a href="https://itch.io/post/8039279">3 days ago</a></span><span class="vote_counts"></span></div>
                                            <div class="post_content">
                                                <div dir="auto" class="post_body user_formatted">
                                                    <p>I think this is one of my favorite horror games I've ever played.&nbsp;I loved every second of it!</p>
                                                    <p></p>
                                                    <div><button itchio="" aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code="<iframe width=&quot;500&quot; height=&quot;281&quot; src=&quot;//www.youtube.com/embed/acC5tW5b7cc&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;&quot;></iframe>" style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/acC5tW5b7cc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
                                                </div>
                                                <div class="post_footer"><a data-register_action="community_reply" href="https://itch.io/login?return_to=https%3A%2F%2Falexander-wiseman.itch.io%2Ffear-assessment&amp;intent=community" class="post_action reply_btn">Reply</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="topic_pager bottom_pager"><span class="page_label">Viewing most recent comments <nobr><span>1</span> to <span>40</span> of 242</nobr></span> · <a href="https://alexander-wiseman.itch.io/fear-assessment/comments?before=203" class="page_link">Next page</a> · <a href="https://alexander-wiseman.itch.io/fear-assessment/comments?after=0" class="page_link">Last page</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="right_col column">
                        <div class="video_embed"></div>
                        <div class="screenshot_list"><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/original/%2F03neG.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/347x500/V5pRmH.png" data-screenshot_id="12482936" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/347x500/V5pRmH.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/794x1000/%2BiUH8l.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/original/ApWjDu.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/347x500/ctVym5.png" data-screenshot_id="12482938" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/347x500/ctVym5.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/794x1000/kItQGD.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/original/cGDU8c.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/347x500/%2Fqgvdi.png" data-screenshot_id="12482937" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/347x500/%2Fqgvdi.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/794x1000/5dOoE3.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/original/MHw3ed.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/347x500/AhKZc%2F.png" data-screenshot_id="12482940" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/347x500/AhKZc%2F.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/794x1000/8rnjeu.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/original/0RmXdU.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/347x500/TIHZL0.png" data-screenshot_id="12482939" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/347x500/TIHZL0.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/794x1000/AzzfC3.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/original/MdphGO.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/347x500/HwPHxT.png" data-screenshot_id="12482941" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/347x500/HwPHxT.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/794x1000/C%2Fo4DR.png 2x" class="screenshot"></a></div>
                    </div>
                </div>
            </div>
            <div id="view_game_footer" class="footer"><a href="https://itch.io/" class="icon_logo"><svg height="17" version="1.1" class="svgicon icon_itchio_new" width="20" viewBox="0 0 262.728 235.452" role="img" aria-hidden="">
                        <path d="M31.99 1.365C21.287 7.72.2 31.945 0 38.298v10.516C0 62.144 12.46 73.86 23.773 73.86c13.584 0 24.902-11.258 24.903-24.62 0 13.362 10.93 24.62 24.515 24.62 13.586 0 24.165-11.258 24.165-24.62 0 13.362 11.622 24.62 25.207 24.62h.246c13.586 0 25.208-11.258 25.208-24.62 0 13.362 10.58 24.62 24.164 24.62 13.585 0 24.515-11.258 24.515-24.62 0 13.362 11.32 24.62 24.903 24.62 11.313 0 23.773-11.714 23.773-25.046V38.298c-.2-6.354-21.287-30.58-31.988-36.933C180.118.197 157.056-.005 122.685 0c-34.37.003-81.228.54-90.697 1.365zm65.194 66.217a28.025 28.025 0 0 1-4.78 6.155c-5.128 5.014-12.157 8.122-19.906 8.122a28.482 28.482 0 0 1-19.948-8.126c-1.858-1.82-3.27-3.766-4.563-6.032l-.006.004c-1.292 2.27-3.092 4.215-4.954 6.037a28.5 28.5 0 0 1-19.948 8.12c-.934 0-1.906-.258-2.692-.528-1.092 11.372-1.553 22.24-1.716 30.164l-.002.045c-.02 4.024-.04 7.333-.06 11.93.21 23.86-2.363 77.334 10.52 90.473 19.964 4.655 56.7 6.775 93.555 6.788h.006c36.854-.013 73.59-2.133 93.554-6.788 12.883-13.14 10.31-66.614 10.52-90.474-.022-4.596-.04-7.905-.06-11.93l-.003-.045c-.162-7.926-.623-18.793-1.715-30.165-.786.27-1.757.528-2.692.528a28.5 28.5 0 0 1-19.948-8.12c-1.862-1.822-3.662-3.766-4.955-6.037l-.006-.004c-1.294 2.266-2.705 4.213-4.563 6.032a28.48 28.48 0 0 1-19.947 8.125c-7.748 0-14.778-3.11-19.906-8.123a28.025 28.025 0 0 1-4.78-6.155 27.99 27.99 0 0 1-4.736 6.155 28.49 28.49 0 0 1-19.95 8.124c-.27 0-.54-.012-.81-.02h-.007c-.27.008-.54.02-.813.02a28.49 28.49 0 0 1-19.95-8.123 27.992 27.992 0 0 1-4.736-6.155zm-20.486 26.49l-.002.01h.015c8.113.017 15.32 0 24.25 9.746 7.028-.737 14.372-1.105 21.722-1.094h.006c7.35-.01 14.694.357 21.723 1.094 8.93-9.747 16.137-9.73 24.25-9.746h.014l-.002-.01c3.833 0 19.166 0 29.85 30.007L210 165.244c8.504 30.624-2.723 31.373-16.727 31.4-20.768-.773-32.267-15.855-32.267-30.935-11.496 1.884-24.907 2.826-38.318 2.827h-.006c-13.412 0-26.823-.943-38.318-2.827 0 15.08-11.5 30.162-32.267 30.935-14.004-.027-25.23-.775-16.726-31.4L46.85 124.08c10.684-30.007 26.017-30.007 29.85-30.007zm45.985 23.582v.006c-.02.02-21.863 20.08-25.79 27.215l14.304-.573v12.474c0 .584 5.74.346 11.486.08h.006c5.744.266 11.485.504 11.485-.08v-12.474l14.304.573c-3.928-7.135-25.79-27.215-25.79-27.215v-.006l-.003.002z"></path>
                    </svg></a><a href="https://itch.io/">itch.io</a><span class="dot">·</span><a href="https://alexander-wiseman.itch.io">View all by Alexander Wiseman</a><span class="dot">·</span><a data-lightbox_url="https://alexander-wiseman.itch.io/fear-assessment/report" href="javascript:void(0);" class="report_game_btn">Report</a><span class="dot">·</span><a data-lightbox_url="https://alexander-wiseman.itch.io/fear-assessment/embed" href="javascript:void(0);" class="embed_game_btn">Embed</a><span class="dot last_dot">·</span>
                <div class="update_timestamp">Updated <abbr title="29 June 2023 @ 23:47"> 4 days ago</abbr></div>
                <div class="breadcrumbs"><a href="https://itch.io/games">Games</a> › <a href="https://itch.io/games/free">Free</a></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        I.setup_layout()
    </script>
    <script type="text/template" id="loading_lightbox_tpl"><div aria-live="polite" class="lightbox loading_lightbox"><div class="loader_outer"><div class="loader_label">Loading</div><div class="loader_bar"><div class="loader_bar_slider"></div></div></div></div></script>
    <script type="text/javascript">
        new I.HtmlEmbed('#html_embed_1469420', {
            "start_maximized": false,
            "orientation": "landscape",
            "width": 854,
            "height": 480
        });
        new I.CommunityViewTopic('#community_topic_posts_9367186', {
            "report_url": "https:\/\/itch.io\/post\/:post_id\/report"
        });
        init_ViewHtmlGame('#view_html_game_1287516', {
            "generate_download_url": "https:\/\/alexander-wiseman.itch.io\/fear-assessment\/download_url",
            "game": {
                "type_name": "html",
                "actual_price": 0,
                "hit_url": "https:\/\/alexander-wiseman.itch.io\/fear-assessment\/rh\/eyJlIjoxNjg4NDcxNTIyLCJyIjoiaHR0cHM6XC9cL2l0Y2guaW9cL2dhbWVzXC9odG1sNSIsImlkIjoyMTE5ODM3fQ%3d%3d%2eJZmO9XHEQ6NjCTFUhe9e8XYYWdM%3d",
                "min_price": 0,
                "play_after": 90,
                "type": 5,
                "id": 2119837,
                "slug": "fear-assessment",
                "play_url": "https:\/\/alexander-wiseman.itch.io\/fear-assessment\/rp\/eyJlIjoxNjg4NDcxNjU3LCJpZCI6MjExOTgzNywicm4iOjE2ODA0LCJtIjoxNjg4NDcxNTk3fQ%3d%3d%2eXc91DFcpD1P44DU%2b4k6F7cxE%2btA%3d"
            }
        });
        I.setup_page();
    </script>
</body>

</html>
