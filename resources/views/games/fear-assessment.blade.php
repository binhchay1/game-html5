<!DOCTYPE HTML>
<html lang="en">
<head>
@include('includes.header-meta', ['theme-color' => '#000000' ])
@include('includes.header-script')
<link href="{{ asset('css/game.css') }}" rel="stylesheet">

       <style type="text/css" id="game_theme">:root{--itchio_ui_bg: #282828;--itchio_ui_bg_dark: #222222}.wrapper{--itchio_font_family: 'Anonymous Pro';--itchio_bg_color: #000000;--itchio_bg2_color: rgba(0, 0, 0, 1);--itchio_bg2_sub: #191919;--itchio_text_color: #ffffff;--itchio_link_color: #ffffff;--itchio_border_color: #262626;--itchio_button_color: #ffffff;--itchio_button_fg_color: #333333;--itchio_button_shadow_color: transparent;background-color:#000000;/*! */ background-image: url(https://img.itch.zone/aW1nLzEyNDg2MTk4LmdpZg==/original/X9tYpB.gif);;background-repeat: repeat;background-position: 100% 0; /* */}.inner_column{color:#ffffff;font-family:'Anonymous Pro',Lato,LatoExtended,sans-serif;background-color:rgba(0, 0, 0, 1)}.inner_column ::selection{color:#333333;background:#ffffff}.inner_column ::-moz-selection{color:#333333;background:#ffffff}.inner_column h1,.inner_column h2,.inner_column h3,.inner_column h4,.inner_column h5,.inner_column h6{font-family:'Anonymous Pro';font-weight:bold;color:#ffffff}.inner_column a,.inner_column .footer a{color:#ffffff}.inner_column .button,.inner_column .button:hover,.inner_column .button:active{background-color:#ffffff;color:#333333;text-shadow:0 1px 0px transparent}.inner_column hr{background-color:#262626}.inner_column table{border-color:#262626}.inner_column .redactor-box .redactor-toolbar li a{color:#ffffff}.inner_column .redactor-box .redactor-toolbar li a:hover,.inner_column .redactor-box .redactor-toolbar li a:active,.inner_column .redactor-box .redactor-toolbar li a.redactor-act{background-color:#ffffff !important;color:#333333 !important;text-shadow:0 1px 0px transparent !important}.inner_column .redactor-box .redactor-toolbar .re-button-tooltip{text-shadow:none}.game_frame{background:#191919;/*! */ background-image: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)),url(https://img.itch.zone/aW1nLzEyNDg0NjkxLnBuZw==/original/h4R4AY.png);;background-repeat: repeat;background-position: 0 0; /* */}.game_frame .embed_info{background-color:rgba(0, 0, 0, 0.85)}.game_loading .loader_bar .loader_bar_slider{background-color:#ffffff}.view_game_page .reward_row,.view_game_page .bundle_row{border-color:#191919 !important}.view_game_page .game_info_panel_widget{background:rgba(25, 25, 25, 1)}.view_game_page .star_value .star_fill{color:#ffffff}.view_game_page .rewards .quantity_input{background:rgba(25, 25, 25, 1);border-color:rgba(255, 255, 255, 0.5);color:#ffffff}.view_game_page .right_col{display:block}.game_devlog_page li .meta_row .post_likes{border-color:#191919}.game_devlog_post_page .post_like_button{box-shadow:inset 0 0 0 1px #262626}.game_comments_widget .community_post .post_footer a,.game_comments_widget .community_post .post_footer .vote_btn,.game_comments_widget .community_post .post_header .post_date a,.game_comments_widget .community_post .post_header .edit_message{color:rgba(255, 255, 255, 0.5)}.game_comments_widget .community_post .reveal_full_post_btn{background:linear-gradient(to bottom, transparent, #000000 50%, #000000);color:#ffffff}.game_comments_widget .community_post .post_votes{border-color:rgba(255, 255, 255, 0.2)}.game_comments_widget .community_post .post_votes .vote_btn:hover{background:rgba(255, 255, 255, 0.05)}.game_comments_widget .community_post .post_footer .vote_btn{border-color:rgba(255, 255, 255, 0.5)}.game_comments_widget .community_post .post_footer .vote_btn span{color:inherit}.game_comments_widget .community_post .post_footer .vote_btn:hover,.game_comments_widget .community_post .post_footer .vote_btn.voted{background-color:#ffffff;color:#333333;text-shadow:0 1px 0px transparent;border-color:#ffffff}.game_comments_widget .form .redactor-box,.game_comments_widget .form .click_input,.game_comments_widget .form .forms_markdown_input_widget{border-color:rgba(255, 255, 255, 0.5);background:transparent}.game_comments_widget .form .redactor-layer,.game_comments_widget .form .redactor-toolbar,.game_comments_widget .form .click_input,.game_comments_widget .form .forms_markdown_input_widget{background:rgba(25, 25, 25, 1)}.game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button{color:inherit;opacity:0.6}.game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button:hover,.game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar button:active{opacity:1;background-color:#ffffff !important;color:#333333 !important;text-shadow:0 1px 0px transparent !important}.game_comments_widget .form .forms_markdown_input_widget .markdown_toolbar,.game_comments_widget .form .forms_markdown_input_widget li{border-color:rgba(255, 255, 255, 0.5)}.game_comments_widget .form textarea{border-color:rgba(255, 255, 255, 0.5);background:rgba(25, 25, 25, 1);color:inherit}.game_comments_widget .form .redactor-toolbar{border-color:rgba(255, 255, 255, 0.5)}.game_comments_widget .hint{color:rgba(255, 255, 255, 0.5)}.game_community_preview_widget .community_topic_row .topic_tag{background-color:#191919}.footer .svgicon,.view_game_page .more_information_toggle .svgicon{fill:#ffffff !important} </style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous%20Pro%3A400%2C400italic%2C700%2C700italic">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous%20Pro%3A400%2C400italic%2C700%2C700italic">
</head>
<body data-host="itch.io" data-page_name="view_game" class="locale_en game_layout embedded_game no_theme_toggle responsive">
<ul id="user_tools" class="user_tools hidden">
<li><a href="https://alexander-wiseman.itch.io" class="action_btn view_more"><svg viewbox="0 0 262.728 235.452" version="1.1" class="svgicon icon_itchio_new" aria-hidden height="16" role="img" width="18"><path d="M31.99 1.365C21.287 7.72.2 31.945 0 38.298v10.516C0 62.144 12.46 73.86 23.773 73.86c13.584 0 24.902-11.258 24.903-24.62 0 13.362 10.93 24.62 24.515 24.62 13.586 0 24.165-11.258 24.165-24.62 0 13.362 11.622 24.62 25.207 24.62h.246c13.586 0 25.208-11.258 25.208-24.62 0 13.362 10.58 24.62 24.164 24.62 13.585 0 24.515-11.258 24.515-24.62 0 13.362 11.32 24.62 24.903 24.62 11.313 0 23.773-11.714 23.773-25.046V38.298c-.2-6.354-21.287-30.58-31.988-36.933C180.118.197 157.056-.005 122.685 0c-34.37.003-81.228.54-90.697 1.365zm65.194 66.217a28.025 28.025 0 0 1-4.78 6.155c-5.128 5.014-12.157 8.122-19.906 8.122a28.482 28.482 0 0 1-19.948-8.126c-1.858-1.82-3.27-3.766-4.563-6.032l-.006.004c-1.292 2.27-3.092 4.215-4.954 6.037a28.5 28.5 0 0 1-19.948 8.12c-.934 0-1.906-.258-2.692-.528-1.092 11.372-1.553 22.24-1.716 30.164l-.002.045c-.02 4.024-.04 7.333-.06 11.93.21 23.86-2.363 77.334 10.52 90.473 19.964 4.655 56.7 6.775 93.555 6.788h.006c36.854-.013 73.59-2.133 93.554-6.788 12.883-13.14 10.31-66.614 10.52-90.474-.022-4.596-.04-7.905-.06-11.93l-.003-.045c-.162-7.926-.623-18.793-1.715-30.165-.786.27-1.757.528-2.692.528a28.5 28.5 0 0 1-19.948-8.12c-1.862-1.822-3.662-3.766-4.955-6.037l-.006-.004c-1.294 2.266-2.705 4.213-4.563 6.032a28.48 28.48 0 0 1-19.947 8.125c-7.748 0-14.778-3.11-19.906-8.123a28.025 28.025 0 0 1-4.78-6.155 27.99 27.99 0 0 1-4.736 6.155 28.49 28.49 0 0 1-19.95 8.124c-.27 0-.54-.012-.81-.02h-.007c-.27.008-.54.02-.813.02a28.49 28.49 0 0 1-19.95-8.123 27.992 27.992 0 0 1-4.736-6.155zm-20.486 26.49l-.002.01h.015c8.113.017 15.32 0 24.25 9.746 7.028-.737 14.372-1.105 21.722-1.094h.006c7.35-.01 14.694.357 21.723 1.094 8.93-9.747 16.137-9.73 24.25-9.746h.014l-.002-.01c3.833 0 19.166 0 29.85 30.007L210 165.244c8.504 30.624-2.723 31.373-16.727 31.4-20.768-.773-32.267-15.855-32.267-30.935-11.496 1.884-24.907 2.826-38.318 2.827h-.006c-13.412 0-26.823-.943-38.318-2.827 0 15.08-11.5 30.162-32.267 30.935-14.004-.027-25.23-.775-16.726-31.4L46.85 124.08c10.684-30.007 26.017-30.007 29.85-30.007zm45.985 23.582v.006c-.02.02-21.863 20.08-25.79 27.215l14.304-.573v12.474c0 .584 5.74.346 11.486.08h.006c5.744.266 11.485.504 11.485-.08v-12.474l14.304.573c-3.928-7.135-25.79-27.215-25.79-27.215v-.006l-.003.002z"></path></svg><span class="full_label">View all by Alexander Wiseman</span><span class="mobile_label">Creator</span></a></li>
</ul>
><div id="wrapper" class="main wrapper"><div class="inner_column size_very_large family_anonymous-pro" id="inner_column">
<div class="header" id="header"><h1 itemprop="name" class="game_title">Fear Assessment</h1></div>
<div class="view_html_game_page view_game_page page_widget base_widget buy_on_top ready" id="view_html_game_3821553">
<div class="html_embed_widget base_widget embed_wrapper" id="html_embed_7312707"><div data-height="480" data-width="854" style="width: 854px; height: 480px" class="game_frame game_pending">
<button title="Enter fullscreen" class="fullscreen_btn"><img src="https://itch.io/static/images/enlarge.svg?1688228046"></button><div data-iframe='&lt;iframe allowtransparency="true" webkitallowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" src="https://v6p9d9t4.ssl.hwcdn.net/html/8119337/FEARASSESSMENTMOBILE2/index.html" scrolling="no" allowfullscreen="true" id="game_drop" allow="autoplay; fullscreen *; geolocation; microphone; camera; midi; monetization; xr-spatial-tracking; gamepad; gyroscope; accelerometer; xr; cross-origin-isolated" frameborder="0"&gt;&lt;/iframe&gt;' class="iframe_placeholder"><button class="button load_iframe_btn"><svg viewbox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" version="1.1" class="svgicon icon_play" aria-hidden height="24" role="img" width="24"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg> Run assessment</button></div>
</div></div>
<div class="columns">
<div class="left_col column">
<div class="formatted_description user_formatted">
</div>
<div class="more_information_toggle">
<div class="toggle_row"><a class="toggle_info_btn" href="javascript:void(0)">More information<svg viewbox="0 0 37 20" version="1.1" class="svgicon icon_down_tick" aria-hidden height="6" role="img" width="12"><path d="m2.0858 0c-1.1535 0-2.0858 0.86469-2.0858 1.9331 0 0.5139 0.21354 1.0183 0.38704 1.1881l18.113 16.879 18.112-16.879c0.174-0.1696 0.388-0.674 0.388-1.1879 0-1.0684-0.932-1.9331-2.086-1.9331-0.577 0-1.111 0.23008-1.49 0.57992l-14.924 13.894-14.925-13.893c-0.3777-0.34998-0.9134-0.581-1.4902-0.581z"></path></svg></a></div>
<div class="info_panel_wrapper"><div class="game_info_panel_widget base_widget" id="game_info_panel_4831720"><table><tbody>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
<td>
</td>
</tr>
<tr>
<td>Release date</td>
</tr>
<tr>
<td><div itemscope itemtype="http://schema.org/AggregateRating" itemprop="aggregateRating" class="aggregate_rating" title="4.5">
<div content="4.5" itemprop="ratingValue" class="star_value">
<span class="screenreader_only">Rated 4.5 out of 5 stars</span><div style="width: 90.50847%" class="star_fill">
<span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span><span aria-hidden="true" class="star icon-star"></span>
</div>
<div class="star_holes">
<span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span><span aria-hidden="true" class="star icon-star2"></span>
</div>
</div>
<span content="118" itemprop="ratingCount" class="rating_count">(118<span class="screenreader_only"> total ratings</span>)</span>
</div></td>
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
<td>
<a href="https://itch.io/games/made-with-audacity">Audacity</a>, <a href="https://itch.io/games/made-with-construct">Construct</a>
</td>
</tr>
<tr>
<td>Tags</td>
<td>
<a href="https://itch.io/games/tag-creepy">Creepy</a>, <a href="https://itch.io/games/tag-horror">Horror</a>, <a href="https://itch.io/games/tag-point-and-click">Point &amp; Click</a>, <a href="https://itch.io/games/tag-psychological-horror">Psychological Horror</a>, <a href="https://itch.io/games/tag-singleplayer">Singleplayer</a>
</td>
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
<td>
<a href="https://itch.io/games/input-keyboard">Keyboard</a>, <a href="https://itch.io/games/input-mouse">Mouse</a>, <a href="https://itch.io/games/input-touchscreen">Touchscreen</a>, <a href="https://itch.io/games/input-phone">Smartphone</a>
</td>
</tr>
<tr>
<td>Accessibility</td>
<td><a href="https://itch.io/games/accessibility-colorblind">Color-blind friendly</a></td>
</tr>
<tr>
<td>Links</td>
<td><a rel="nofollow noopener" href="https://www.patreon.com/alexanderwiseman">Patreon</a></td>
</tr>
</tbody></table></div></div>
</div>
<h2 id="download">Download</h2>
<div class="buy_row"><div class="button_message">
<a href="https://alexander-wiseman.itch.io/fear-assessment/purchase" class="button buy_btn">Download Now</a><span class="buy_message"><span class="sub">Name your own price</span></span>
</div></div>
<div class="uploads">
<p>Click download now to get access to the following files:</p>
<div class="upload_list_widget base_widget" id="upload_list_6906423">
<div class="upload"><div class="info_column"><div class="upload_name">
<strong title="linux64.zip" class="name">linux64.zip</strong> <span class="file_size"><span>122 MB</span></span> <span class="download_platforms"><span aria-hidden="true" title="Download for Linux" class="icon icon-tux"></span> </span>
</div></div></div>
<div class="upload"><div class="info_column"><div class="upload_name">
<strong title="osx64.zip" class="name">osx64.zip</strong> <span class="file_size"><span>133 MB</span></span> <span class="download_platforms"><span aria-hidden="true" title="Download for macOS" class="icon icon-apple"></span> </span>
</div></div></div>
<div class="upload"><div class="info_column"><div class="upload_name">
<strong title="win64.zip" class="name">win64.zip</strong> <span class="file_size"><span>130 MB</span></span> <span class="download_platforms"><span aria-hidden="true" title="Download for Windows" class="icon icon-windows8"></span> </span>
</div></div></div>
</div>
</div>
<section id="devlog" class="game_devlog"><h2>Development log</h2>
<ul>
<li>
<a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/551154/fear-assessment-plus-june-26th">FEAR ASSESSMENT PLUS - JUNE 26TH</a><div class="post_date"><abbr title="26 June 2023 @ 04:22"><span aria-hidden="true" class="icon icon-stopwatch"></span> 8 days ago</abbr></div>
</li>
<li>
<a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/547961/fear-assessment-fear-assessment">FEAR ASSESSMENT - FEAR ASSESSMENT+</a><div class="post_date"><abbr title="19 June 2023 @ 03:29"><span aria-hidden="true" class="icon icon-stopwatch"></span> 15 days ago</abbr></div>
</li>
<li>
<a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546913/fear-assessment-gamejolt-page">FEAR ASSESSMENT - GAMEJOLT PAGE</a><div class="post_date"><abbr title="16 June 2023 @ 20:02"><span aria-hidden="true" class="icon icon-stopwatch"></span> 17 days ago</abbr></div>
</li>
<li>
<a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546782/fear-assessment-html-patch-101">FEAR ASSESSMENT - HTML PATCH 1.0.1</a><div class="post_date"><abbr title="16 June 2023 @ 15:29"><span aria-hidden="true" class="icon icon-stopwatch"></span> 17 days ago</abbr></div>
</li>
<li>
<a href="https://alexander-wiseman.itch.io/fear-assessment/devlog/546473/fear-assessment-mobile-and-html-support">FEAR ASSESSMENT - MOBILE AND HTML SUPPORT</a><div class="post_date"><abbr title="15 June 2023 @ 21:49"><span aria-hidden="true" class="icon icon-stopwatch"></span> 18 days ago</abbr></div>
</li>
<li>
<a href="https://alexander-wiseman.it</li>
</ul></section><div class="game_comments_widget base_widget" id="game_comments_3871105">
<div class="community_topic_posts_widget base_widget" id="community_topic_posts_995605">
<div class="topic_pager">
</div>
<div class="community_post_list_widget base_widget" id="community_post_list_2795568">
<div id="post-8053711" data-post='{"user_id":4681306,"id":8053711}' class="community_post has_vote_column">
<div id="first-post" class="post_anchor"></div>
<div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div>
<div id="post-8052510" data-post='{"user_id":1567148,"id":8052510}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8052423" data-post='{"user_id":5385222,"id":8052423}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div></div>
<div id="post-8052292" data-post='{"user_id":1080229,"id":8052292}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/captainsly" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzExMTUyNjg3LmpwZw==/25x25%23/4mrq7N.jpg)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/captainsly">Sly</a></span><span title="2023-07-04 01:07:49" class="post_date"><a href="https://itch.io/post/8052292">10 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/NDwkwW-oWCg" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NDwkwW-oWCg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>yeeeeesuh!</div>
</div>
</div></div>
<div id="post-8052047" data-post='{"user_id":8368879,"id":8052047}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/thescarygamerog" class="avatar_container"><div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/thescarygamerog">TheScaryGamerOG</a></span><span title="2023-07-03 23:48:44" class="post_date"><a href="https://itch.io/post/8052047">12 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>This video made me scared for lots a reasons Examples! Where it told me what would happen if a figure would appear in the corner of your room! This got me looking behind me the hole video! Also the sound part made me confused and scared! Thank you so much for making this masterpiece! I haven't seen such a well-made game in a while! Can't wait to play more games by you! I rate this game a solid 910.&nbsp;  </p>  <p>Thank you so much for making this masterpiece! I havent seen such a well made game in a while! Cant wait for more games by you! I rate this game a 9/10&nbsp;  </p>  <p>I made a video On it if anyone is interested in watching it  </p>
<div>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/NM6fvtfjAGc" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NM6fvtfjAGc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
<br>
</div>
</div>
</div>
</div></div>
<div id="post-8051895" data-post='{"user_id":5036749,"id":8051895}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/lugii" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzczMjIxNTEucG5n/25x25%23/OiqjQE.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/lugii">Lugii</a></span><span title="2023-07-03 23:03:32" class="post_date"><a href="https://itch.io/post/8051895">12 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>im shitting my ass from this bro chill &#128557;</p></div>
</div>
</div></div>
<div id="post-8051308" data-post='{"user_id":6533988,"id":8051308}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/jzeeyt" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEwNDA3NTU1LmpwZWc=/25x25%23/HTg2jD.jpeg)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/jzeeyt">JZeeYT</a></span><span title="2023-07-03 20:57:20" class="post_date"><a href="https://itch.io/post/8051308">14 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>I started to freak out, this game is 10/10!</p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/B73Ki3603Z4" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/B73Ki3603Z4/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8050885" data-post='{"user_id":6336616,"id":8050885}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/crankyberry" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEyNjU3MDQ1LnBuZw==/25x25%23/XVgGFO.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/crankyberry">chrisy</a></span><span title="2023-07-03 19:22:08" class="post_date"><a href="https://itch.io/post/8050885">16 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>I shited my pants 10/10 &hearts;</p></div>
</div>
</div></div>
<div id="post-8050730" data-post='{"user_id":7389185,"id":8050730}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/gmbno" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEyNTQxNzYwLnBuZw==/25x25%23/qL4qnb.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/gmbno">Gmbno</a></span><span title="2023-07-03 18:49:09" class="post_date"><a href="https://itch.io/post/8050730">17 hours ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>This game is so creepy! I swear my table started floating while playing it lol&nbsp;</p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/UPOOT2UrwPg" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UPOOT2UrwPg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8050406" data-post='{"user_id":1714083,"id":8050406}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div></div>
<div id="post-8049743" data-post='{"user_id":7524328,"id":8049743}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8049550" data-post='{"user_id":7932229,"id":8049550}' class="community_post has_replies has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div></div>
<div class="community_post_replies top_level_replies">
<div id="post-8049577" data-post='{"user_id":3799265,"id":8049577}' class="community_post is_reply has_replies has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div class="community_post_replies"><div id="post-8049603" data-post='{"user_id":7932229,"id":8049603}' class="community_post is_reply has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div></div>
</div>
<div id="post-8049189" data-post='{"user_id":3744716,"id":8049189}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8049087" data-post='{"user_id":8378934,"id":8049087}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8049022" data-post='{"user_id":4322970,"id":8049022}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/dhMZE3jotz8" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/dhMZE3jotz8/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8048817" data-post='{"user_id":8110009,"id":8048817}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/aldeiguber" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEyMTkzNDU1LnBuZw==/25x25%23/xK3Uvf.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/aldeiguber">Aldeiguber</a></span><span title="2023-07-03 09:44:37" class="post_date"><a href="https://itch.io/post/8048817">1 day ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>The game turned out to be scary, I shlt myself. Thanks</p>
<figure><img src="https://img.itch.zone/aW1nLzEyNjU0NjE1LmpwZWc=/original/3Cppy2.jpeg" style="color: inherit; font-size: inherit" loading="lazy"><span></span><span></span></figure>
</div>
</div>
</div></div>
<div id="post-8048601" data-post='{"user_id":8378179,"id":8048601}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/amra12" class="avatar_container"><div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/amra12">Amra12</a></span><span title="2023-07-03 08:06:56" class="post_date"><a href="https://itch.io/post/8048601">1 day ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>The game is quite creepy. I don't know why, but these faces are very uncomfortable</p></div>
</div>
</div></div>
<div id="post-8047057" data-post='{"user_id":5367033,"id":8047057}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/princehooper" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzgxMTkyNzkuanBn/25x25%23/oGclDp.jpg)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/princehooper">Princehooper</a></span><span title="2023-07-02 22:41:47" class="post_date"><a href="https://itch.io/post/8047057">1 day ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/kQEqLHoG6UE" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/kQEqLHoG6UE/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>OMG THIS IS TOO GOOD</div>
</div>
</div></div>
<div id="post-8047046" data-post='{"user_id":3454170,"id":8047046}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/5mg" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzQ0Nzg3NjYucG5n/25x25%23/7OhNT%2F.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/5mg">5mg</a></span><span title="2023-07-02 22:39:23" class="post_date"><a href="https://itch.io/post/8047046">1 day ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>I had to post it in my other channel. Really a good experience. </p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/R39ObIPt5rc" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/R39ObIPt5rc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8046388" data-post='{"user_id":3939248,"id":8046388}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/nobara" class="avatar_container"><div style="background-image: url(/static/images/frog-gold.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/nobara">nobara</a></span><span title="2023-07-02 19:57:32" class="post_date"><a href="https://itch.io/post/8046388">1 day ago</a></span><span class="vote_counts"><span class="upvotes">(+2)</span></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>I have an exam tomorrow and i was trying to find a way to keep awake to study, thanks!&nbsp;I had to keep my lights on during the game&nbsp;and still cried.</p></div>
</div>
</div></div>
<div id="post-8046141" data-post='{"user_id":8374876,"id":8046141}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/deadlyrun76" class="avatar_container"><div style="background-image: url(/static/images/frog-cyan.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/deadlyrun76">Deadlyrun76</a></span><span title="2023-07-02 18:51:28" class="post_date"><a href="https://itch.io/post/8046141">1 day ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>Android?((<span style="color: inherit"></span></p></div>
</div>
</div></div>
<div id="post-8045332" data-post='{"user_id":4570126,"id":8045332}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8043559" data-post='{"user_id":7092381,"id":8043559}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8043467" data-post='{"user_id":8262914,"id":8043467}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8043204" data-post='{"user_id":3301106,"id":8043204}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8043000" data-post='{"user_id":3158524,"id":8043000}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8042887" data-post='{"user_id":7570409,"id":8042887}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div></div>
<div id="post-8042627" data-post='{"user_id":8369483,"id":8042627}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8041698" data-post='{"user_id":6910041,"id":8041698}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/the-bucket" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEwNDUxMjgxLnBuZw==/25x25%23/jpZdyi.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/the-bucket">The Bucket</a></span><span title="2023-07-01 18:56:11" class="post_date"><a href="https://itch.io/post/8041698">2 days ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>Such an interesting game. While it didn't super scary me. I loved the concept and it gave me a LOT of chills. Made a video on it if anyone wants to check it out -&nbsp;</p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/7faAETZC-ME" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/7faAETZC-ME/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8041576" data-post='{"user_id":8368879,"id":8041576}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/thescarygamerog" class="avatar_container"><div style="background-image: url(/static/images/frog-blue.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/thescarygamerog">TheScaryGamerOG</a></span><span title="2023-07-01 18:23:23" class="post_date"><a href="https://itch.io/post/8041576">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>This video made me scared for lots a reasons Examples! Where it told me what would happen if a figure would appear in the corner of your room! This got me looking behind me the hole video! Also the sound part made me confused and scared! Thank you so much for making this masterpiece! I haven't seen such a well-made game in a while! Can't wait to play more games by you! I rate this game a solid 910.&nbsp;</p>  <p>Thank you so much for making this masterpiece! I havent seen such a well made game in a while! Cant wait for more games by you! I rate this game a 9/10&nbsp;</p>  <p>I made a video On it if anyone is interested in watching it</p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/NM6fvtfjAGc" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/NM6fvtfjAGc/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8041441" data-post='{"user_id":6410025,"id":8041441}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/steeletech" class="avatar_container"><div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/steeletech">steeletech</a></span><span title="2023-07-01 17:43:58" class="post_date"><a href="https://itch.io/post/8041441">2 days ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>i usually find these horror "tests" pretty ridiculous but this is probably the best one out there right now. it's not very scary, especially the audio, but it holds up its own. the only thing that rly scared me was the face at the end, im playing on a tv rn so it was just inescapable lmaooo. good game 7/10</p></div>
</div>
</div></div>
<div id="post-8041141" data-post='{"user_id":6751765,"id":8041141}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/tincel-cat" class="avatar_container"><div style="background-image: url(/static/images/frog.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/tincel-cat">Tincel_Cat</a></span><span title="2023-07-01 16:36:41" class="post_date"><a href="https://itch.io/post/8041141">2 days ago</a></span><span class="vote_counts"></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted"><p>omfg, ima show this to all my friends. i kept having to glance at my door</p></div>
</div>
</div></div>
<div id="post-8041135" data-post='{"user_id":7389185,"id":8041135}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
<a href="https://itch.io/profile/gmbno" class="avatar_container"><div style="background-image: url(https://img.itch.zone/aW1nLzEyNTQxNzYwLnBuZw==/25x25%23/qL4qnb.png)" class="post_avatar"></div></a><div class="post_header">
<span class="post_author"><a href="https://itch.io/profile/gmbno">Gmbno</a></span><span title="2023-07-01 16:35:22" class="post_date"><a href="https://itch.io/post/8041135">2 days ago</a></span><span class="vote_counts"><span class="upvotes">(+1)</span></span>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
<p>I actually think this game is cursed lol I felt like someone was watching when I was playing.&nbsp;</p>
<div><button itchio aria-label="Click to activate YouTube embed" type="button" class="embed_preload youtube_preload" data-embed_code='&lt;iframe width="500" height="281" src="//www.youtube.com/embed/UPOOT2UrwPg" frameborder="0" allowfullscreen=""&gt;&lt;/iframe&gt;' style="width: 250px; height: 140px; background: url(https://i.ytimg.com/vi/UPOOT2UrwPg/hqdefault.jpg) 50% 50% no-repeat; background-size: cover"></button></div>
</div>
</div>
</div></div>
<div id="post-8040896" data-post='{"user_id":8363285,"id":8040896}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8040786" data-post='{"user_id":6684251,"id":8040786}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8040615" data-post='{"user_id":4993318,"id":8040615}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8040558" data-post='{"user_id":5036218,"id":8040558}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div></div>
<div id="post-8039882" data-post='{"user_id":6191794,"id":8039882}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8039650" data-post='{"user_id":3275896,"id":8039650}' class="community_post has_vote_column"><div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
</div>
</div></div>
<div id="post-8039279" data-post='{"user_id":8064761,"id":8039279}' class="community_post has_vote_column">
<div id="last-post" class="post_anchor"></div>
<div class="post_grid">
<div class="post_votes">
</div>
</div>
<div class="post_content">
<div dir="auto" class="post_body user_formatted">
</div>
</div>
</div>
</div>
</div>
<div class="topic_pager bottom_pager">
</div>
</div>
</div>
</div>
<div class="right_col column">
<div class="video_embed"></div>
<div class="screenshot_list">
<a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/original/%2F03neG.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/347x500/V5pRmH.png" data-screenshot_id="12482936" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/347x500/V5pRmH.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNi5wbmc=/794x1000/%2BiUH8l.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/original/ApWjDu.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/347x500/ctVym5.png" data-screenshot_id="12482938" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/347x500/ctVym5.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOC5wbmc=/794x1000/kItQGD.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/original/cGDU8c.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/347x500/%2Fqgvdi.png" data-screenshot_id="12482937" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/347x500/%2Fqgvdi.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzNy5wbmc=/794x1000/5dOoE3.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/original/MHw3ed.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/347x500/AhKZc%2F.png" data-screenshot_id="12482940" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/347x500/AhKZc%2F.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MC5wbmc=/794x1000/8rnjeu.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/original/0RmXdU.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/347x500/TIHZL0.png" data-screenshot_id="12482939" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/347x500/TIHZL0.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4MjkzOS5wbmc=/794x1000/AzzfC3.png 2x" class="screenshot"></a><a href="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/original/MdphGO.png" target="_blank" data-image_lightbox="true"><img src="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/347x500/HwPHxT.png" data-screenshot_id="12482941" srcset="https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/347x500/HwPHxT.png 1x, https://img.itch.zone/aW1hZ2UvMjExOTgzNy8xMjQ4Mjk0MS5wbmc=/794x1000/C%2Fo4DR.png 2x" class="screenshot"></a>
</div>
</div>
</div>
</div>
<div id="view_game_footer" class="footer">
<a href="https://itch.io/" class="icon_logo"><svg viewbox="0 0 262.728 235.452" version="1.1" class="svgicon icon_itchio_new" aria-hidden height="17" role="img" width="20"><path d="M31.99 1.365C21.287 7.72.2 31.945 0 38.298v10.516C0 62.144 12.46 73.86 23.773 73.86c13.584 0 24.902-11.258 24.903-24.62 0 13.362 10.93 24.62 24.515 24.62 13.586 0 24.165-11.258 24.165-24.62 0 13.362 11.622 24.62 25.207 24.62h.246c13.586 0 25.208-11.258 25.208-24.62 0 13.362 10.58 24.62 24.164 24.62 13.585 0 24.515-11.258 24.515-24.62 0 13.362 11.32 24.62 24.903 24.62 11.313 0 23.773-11.714 23.773-25.046V38.298c-.2-6.354-21.287-30.58-31.988-36.933C180.118.197 157.056-.005 122.685 0c-34.37.003-81.228.54-90.697 1.365zm65.194 66.217a28.025 28.025 0 0 1-4.78 6.155c-5.128 5.014-12.157 8.122-19.906 8.122a28.482 28.482 0 0 1-19.948-8.126c-1.858-1.82-3.27-3.766-4.563-6.032l-.006.004c-1.292 2.27-3.092 4.215-4.954 6.037a28.5 28.5 0 0 1-19.948 8.12c-.934 0-1.906-.258-2.692-.528-1.092 11.372-1.553 22.24-1.716 30.164l-.002.045c-.02 4.024-.04 7.333-.06 11.93.21 23.86-2.363 77.334 10.52 90.473 19.964 4.655 56.7 6.775 93.555 6.788h.006c36.854-.013 73.59-2.133 93.554-6.788 12.883-13.14 10.31-66.614 10.52-90.474-.022-4.596-.04-7.905-.06-11.93l-.003-.045c-.162-7.926-.623-18.793-1.715-30.165-.786.27-1.757.528-2.692.528a28.5 28.5 0 0 1-19.948-8.12c-1.862-1.822-3.662-3.766-4.955-6.037l-.006-.004c-1.294 2.266-2.705 4.213-4.563 6.032a28.48 28.48 0 0 1-19.947 8.125c-7.748 0-14.778-3.11-19.906-8.123a28.025 28.025 0 0 1-4.78-6.155 27.99 27.99 0 0 1-4.736 6.155 28.49 28.49 0 0 1-19.95 8.124c-.27 0-.54-.012-.81-.02h-.007c-.27.008-.54.02-.813.02a28.49 28.49 0 0 1-19.95-8.123 27.992 27.992 0 0 1-4.736-6.155zm-20.486 26.49l-.002.01h.015c8.113.017 15.32 0 24.25 9.746 7.028-.737 14.372-1.105 21.722-1.094h.006c7.35-.01 14.694.357 21.723 1.094 8.93-9.747 16.137-9.73 24.25-9.746h.014l-.002-.01c3.833 0 19.166 0 29.85 30.007L210 165.244c8.504 30.624-2.723 31.373-16.727 31.4-20.768-.773-32.267-15.855-32.267-30.935-11.496 1.884-24.907 2.826-38.318 2.827h-.006c-13.412 0-26.823-.943-38.318-2.827 0 15.08-11.5 30.162-32.267 30.935-14.004-.027-25.23-.775-16.726-31.4L46.85 124.08c10.684-30.007 26.017-30.007 29.85-30.007zm45.985 23.582v.006c-.02.02-21.863 20.08-25.79 27.215l14.304-.573v12.474c0 .584 5.74.346 11.486.08h.006c5.744.266 11.485.504 11.485-.08v-12.474l14.304.573c-3.928-7.135-25.79-27.215-25.79-27.215v-.006l-.003.002z"></path></svg></a><a href="https://itch.io/">itch.io</a><span class="dot">&middot;</span><a href="https://alexander-wiseman.itch.io">View all by Alexander Wiseman</a><span class="dot">&middot;</span><a data-lightbox_url="https://alexander-wiseman.itch.io/fear-assessment/report" href="javascript:void(0);" class="report_game_btn">Report</a><span class="dot">&middot;</span><a data-lightbox_url="https://alexander-wiseman.itch.io/fear-assessment/embed" href="javascript:void(0);" class="embed_game_btn">Embed</a><span class="dot last_dot">&middot;</span><div class="update_timestamp">Updated <abbr title="29 June 2023 @ 23:47"> 4 days ago</abbr>
</div>
<div class="breadcrumbs">
<a href="https://itch.io/games">Games</a> &rsaquo; <a href="https://itch.io/games/free">Free</a>
</div>
</div>
</div></div>
>I.setup_layout()</script><script type="text/template" id="loading_lightbox_tpl"><div aria-live="polite" class="lightbox loading_lightbox"><div class="loader_outer"><div class="loader_label">Loading<div class="loader_bar"><div class="loader_bar_slider"></script>>new I.HtmlEmbed('#html_embed_7312707', {"height":480,"orientation":"landscape","start_maximized":false,"width":854});new I.CommunityViewTopic('#community_topic_posts_995605', {"report_url":"https:\/\/itch.io\/post\/:post_id\/report"});init_ViewHtmlGame('#view_html_game_3821553', {"game":{"type":5,"min_price":0,"actual_price":0,"slug":"fear-assessment","hit_url":"https:\/\/alexander-wiseman.itch.io\/fear-assessment\/rh\/eyJlIjoxNjg4NDcxNDAyLCJpZCI6MjExOTgzN30%3d%2eywBn%2bI5fnGdDE7E1cYcdAKllLuo%3d","play_url":"https:\/\/alexander-wiseman.itch.io\/fear-assessment\/rp\/eyJlIjoxNjg4NDcxNTM3LCJpZCI6MjExOTgzNywicm4iOjE5MzEzLCJtIjoxNjg4NDcxNDc3fQ%3d%3d%2ebQ2F6%2flKywtENnpnaGG6cs4Kp%2bw%3d","play_after":90,"id":2119837,"type_name":"html"},"generate_download_url":"https:\/\/alexander-wiseman.itch.io\/fear-assessment\/download_url"});
@include('includes.footer')
</body>
</html>
