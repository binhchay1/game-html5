@extends('layouts.page')

@section('title')
<title>Gamekafe - Policy</title>
@endsection

@section('content')
<div class="main">
    <div class="box search-container">
        <form id="items-search-form" class="search-form" action="/search" accept-charset="UTF-8" method="get">
            <input type="hidden" name="kind" id="kind" value="game">
            <input type="hidden" name="category" id="category" class="select-hidden-field">
            <input type="hidden" name="tag" id="tag" class="select-hidden-field">
            <input type="hidden" name="technology" id="technology" class="select-hidden-field">
            <input type="hidden" name="timeframe" id="timeframe" class="select-hidden-field">

            <input type="hidden" name="multiplayer" id="multiplayer" class="checkbox-hidden-field">
            <input type="hidden" name="y8_highscore" id="y8_highscore" class="checkbox-hidden-field">
            <input type="hidden" name="y8_save" id="y8_save" class="checkbox-hidden-field">
            <input type="hidden" name="y8_achievements" id="y8_achievements" class="checkbox-hidden-field">
            <input type="hidden" name="y8_screenshot" id="y8_screenshot" class="checkbox-hidden-field">
            <input type="hidden" name="mobile" id="mobile" class="checkbox-hidden-field">

            <input type="text" name="q" id="q" value="sa" placeholder="Tìm kiếm trò chơi" class="form-control query fake-button" minlength="2" maxlength="50" pattern=".{2,50}" title="Phải nằm giữa khoảng 2 tới 50">
            <i class="y-icon y-icon--search y-icon--big"></i>
            <button class="search-btn" type="submit" aria-label="Search">
                Tìm kiếm
            </button>
        </form>
        <div class="advanced-serach-options">
            <div class="title">Tùy chọn tìm kiếm nâng cao</div>
            <div class="column-container">
                <div class="column">
                    <div class="gray-select category-select" data-field-id="category">
                        <div class="select-header">
                            <span class="icon all-categories"></span>
                            Tất cả các thể loại
                        </div>
                        <div class="select-options scroll">
                            <div class="select-options__wrapper scroll">
                                <div class="gray-select__item active">
                                    <span class="icon all-categories"></span>
                                    <div class="select-item-title">Tất cả các thể loại</div>
                                </div>
                                @foreach($listCategory as $category)
                                <div class="gray-select__item" data-slug="action_adventure">
                                    <span class="icon action_adventure"></span>
                                    <div class="select-item-title">{{ ucfirst($category['name']) }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="gray-select timeframe-select" data-field-id="timeframe">
                        <div class="select-header">Tất cả các khung thời gian</div>
                        <div class="select-options">
                            <div class="select-options__wrapper">
                                <div class="gray-select__item active">
                                    <div class="select-item-title">Tất cả các khung thời gian</div>
                                </div>
                                <div class="gray-select__item" data-slug="past_week">
                                    <div class="select-item-title"><span class="translation_missing" title="translation missing: vi.searches.show.past_week">Past Week</span></div>
                                </div>
                                <div class="gray-select__item" data-slug="past_month">
                                    <div class="select-item-title"><span class="translation_missing" title="translation missing: vi.searches.show.past_month">Past Month</span></div>
                                </div>
                                <div class="gray-select__item" data-slug="past_year">
                                    <div class="select-item-title"><span class="translation_missing" title="translation missing: vi.searches.show.past_year">Past Year</span></div>
                                </div>
                                <div class="gray-select__item" data-slug="now">
                                    <div class="select-item-title"><span class="translation_missing" title="translation missing: vi.searches.show.now">Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkbox-filters">
                <div class="column">
                    <input type="checkbox" name="multiplayer-checkbox" id="multiplayer-checkbox" value="1" class="gray-checkbox">
                    <label for="multiplayer-checkbox">Nhiều người chơi</label>
                </div>
                <div class="column">
                    <input type="checkbox" name="y8_highscore-checkbox" id="y8_highscore-checkbox" value="1" class="gray-checkbox">
                    <label for="y8_highscore-checkbox">Bảng xếp hạng</label>
                </div>
                <div class="column">
                    <input type="checkbox" name="y8_save-checkbox" id="y8_save-checkbox" value="1" class="gray-checkbox">
                    <label for="y8_save-checkbox">Lưu trực tuyến</label>
                </div>
                <div class="column">
                    <input type="checkbox" name="y8_achievements-checkbox" id="y8_achievements-checkbox" value="1" class="gray-checkbox">
                    <label for="y8_achievements-checkbox">Mục tiêu</label>
                </div>
                <div class="column">
                    <input type="checkbox" name="y8_screenshot-checkbox" id="y8_screenshot-checkbox" value="1" class="gray-checkbox">
                    <label for="y8_screenshot-checkbox">Y8 Screenshot</label>
                </div>
                <div class="column">
                    <input type="checkbox" name="mobile-checkbox" id="mobile-checkbox" value="1" class="gray-checkbox">
                    <label for="mobile-checkbox">Thân thiện với Điện thoại</label>
                </div>
            </div>
        </div>
    </div>

    <div class="box items-grid no-background">
        <div class="mobile-search">
            <a href="/search?mobile=true&amp;q=sa">Click here to show only mobile games results</a>
        </div>



        <div class="items-container" id="search_items_container" data-base-url="/search?q=sa" data-max-page="10" data-infinite-scrolling="true">

            <div id="item_49385" class="item thumb videobox grid-column" data-item-id="49385" data-label-ids="1 Player,Mouse Skill,Scary,Maze,Free Game,Horror" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/1499/2e9b9299c395d06e82c3c42d5ca0afca90526177.mp4?1460772665" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/1499/32754fbb4385e0331ee55c35ff9281d4d308b3a3.ogv?1460772665" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/1499/bbae922dfe953b98612b6d3d87529f409d80689f.webm?1460772665" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/1499/974b05f69982f3795fa264dbff5d58ad39eb0e33.gif?1460772665&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/1499/a6e35effd5a38e2a9fd6f4262462ca22fe505833.gif?1460772665&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/1499/2b48a000ed416da8595300f03726157e2b28feec.gif?1460772665&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/1499/11fe973e1020ae514bcfa10bd6248688de28e2ea.gif?1460772665&quot;]">
                <a title="Trò chơi Horror Maze - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/horror_maze">
                    <input type="hidden" name="for-girls-49385" id="for-girls-49385" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Horror Maze - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/40983/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/40983/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/40983/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Horror Maze</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            645,299 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_76287" class="item thumb videobox grid-column" data-item-id="76287" data-label-ids="1 Player,Ball,Basketball,Free Game,Shooting,Sports,Timing Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/5515/935318c4af61cc581bff2969372b4b1d3f49bffb.mp4?1461451173" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/5515/fdd77fce4ab4d4cd5ea386c40df142ee7484ea60.ogv?1461451173" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/5515/df1bd205b014ca6f0d95ed0c48bde5d318e63d65.webm?1461451173" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/5515/bb5bde15320d0f6aa194b3c95afd1877a962cd3a.gif?1461451173&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/5515/e471b6a9953681529dc1d73152201018cf472874.gif?1461451173&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/5515/eaa110923ec467b51d25e3e30402259d911e58f0.gif?1461451173&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/5515/9516c71d0a09302bdd886aaa1fcac11c9b19a663.gif?1461451173&quot;]">
                <a title="Trò chơi Super Awesome Outdoor Basketball - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/super_awesome_outdoor_basketball">
                    <input type="hidden" name="for-girls-76287" id="for-girls-76287" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Super Awesome Outdoor Basketball - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/58865/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/58865/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/58865/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Super Awesome Outdoor Basketball</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                68%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            80,124 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_134692" class="item thumb videobox grid-column" data-item-id="134692" data-label-ids="1 Player,Action,Bomb,Christmas,House,Timing Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/102400/f72a9a820a5939a7bfb9b7916a96b90dc28b4d17.mp4?1487061096" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/102400/e1ab16872a3a1ba008471e3e1db8eceb667fb3f7.ogv?1487061096" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/102400/298d6605d9ae983463a1898e00ad53ae2324cb4d.webm?1487061096" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/102400/b98a128ea9ec465e767ad94293ff10bf44df8b7c.gif?1487061096&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/102400/93b9f0e6a78a0f0e73e86417734e08bcec90d018.gif?1487061096&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/102400/2392b7226980b46238ed838f406d5d9e2387e8dc.gif?1487061096&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/102400/6e923bf4ab7c26ba3ea06b73808e4ab220bb029a.gif?1487061096&quot;]">
                <a title="Trò chơi Holly Jolly Pyromaniac - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/holly_jolly_pyromaniac">
                    <input type="hidden" name="for-girls-134692" id="for-girls-134692" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Holly Jolly Pyromaniac - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/97458/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/97458/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/97458/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Holly Jolly Pyromaniac</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            7,117 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_94510" class="item thumb videobox grid-column" data-item-id="94510" data-label-ids="1 Player,Dress Up,Girl,Girls,Makeover / Make-up,Simulation" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/64783/7c63dc31aee1a3770e771b6fc51efa3b7f1b0020.mp4?1461957213" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/64783/c72e47555d09b773e02ee509c963f8bdaf59a637.ogv?1461957213" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/64783/054131d483ff440697b3a19fa66b1fe5a01f0795.webm?1461957213" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/64783/bd72f609a497692cf20bf7dd0e5eeb50eb350b81.gif?1461957213&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64783/b4c8f7e1e91b46dd545aba62d5e7aead7c58a558.gif?1461957213&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64783/7daaecbb9a754d9b249f5d2080380b03db4c0611.gif?1461957213&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64783/cac68110679021d5a98cd5adb849d4f74a67bbae.gif?1461957213&quot;]">
                <a title="Trò chơi Beauty Salon SPA - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/beauty_salon_spa">
                    <input type="hidden" name="for-girls-94510" id="for-girls-94510" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Beauty Salon SPA - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/70692/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/70692/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/70692/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Beauty Salon SPA</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                90%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            59,035 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_94536" class="item thumb videobox grid-column" data-item-id="94536" data-label-ids="1 Player,Animal,Christmas,Coloring,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/64779/9fab63e87a0f4feecf7873e5b650565fb163e425.mp4?1461957627" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/64779/56bab56f673ee7036f8b40e2baba4f82611a5d7b.ogv?1461957627" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/64779/ba0e42cdc5be8d0ce95579c9256b72a0b900784a.webm?1461957627" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/64779/4d5d4128c249a98841aa669cdc22cabba9224e7b.gif?1461957627&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64779/bc9625d9602544f3fe16aee0b7574072b564286a.gif?1461957627&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64779/e5f4cabbf4b0517f93b9d6e8734001e4064327cb.gif?1461957627&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64779/26575449bac9156db8a2a1869d15e8a3cac460e3.gif?1461957627&quot;]">
                <a title="Trò chơi Jolly Santa Claus - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/jolly_santa_claus">
                    <input type="hidden" name="for-girls-94536" id="for-girls-94536" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Jolly Santa Claus - Fun/Crazy - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/70702/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/70702/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/70702/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Jolly Santa Claus</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                72%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            26,067 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_100938" class="item thumb videobox grid-column" data-item-id="100938" data-label-ids="1 Player,Cartoon,Collecting Games,Evade,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/68423/e817d6fffc81721975a6d1fecb543f945e1b6276.mp4?1462293611" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/68423/878582831d7920b04be0620c7c50b32079130374.ogv?1462293611" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/68423/cb714c7315385355b0b5017719fe82e4ed96c092.webm?1462293611" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/68423/78050ccaedfd303fba1aa439e5e942ebcaa8a820.gif?1462293611&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/68423/212bce314d4dc2aadce44a629f5e623eb11cc683.gif?1462293611&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/68423/c8ea660d01060b5728a3752b100a19ecb4d8d3e2.gif?1462293611&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/68423/904c5969fa355d2edd5e27f0e85643a5aa935271.gif?1462293611&quot;]">
                <a title="Trò chơi Elsa Collect Snowflake - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_collect_snowflake">
                    <input type="hidden" name="for-girls-100938" id="for-girls-100938" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Elsa Collect Snowflake - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/73965/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/73965/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/73965/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa Collect Snowflake</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                91%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            6,271 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_1435" class="item thumb videobox grid-column" data-item-id="1435" data-label-ids="1 Player,Flash,Shooting,Mouse Skill,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/7084/f490b59cfec632e4c5c3ec6531ba4b65c0a1287b.mp4?1458984468" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/7084/fe771fd10c99977806537f8d2a1b98c03dc6c4ac.ogv?1458984468" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/7084/2cec76a49e1e938efa2650650590edaf32fe9f74.webm?1458984468" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/7084/8a51858e896093f7816fb2d6b5789c1bb3f9151c.gif?1458984468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/7084/9537f0b41275b444ec7e7d02f2b9d656af4fc3e9.gif?1458984468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/7084/ac562992ceaf6ab15521b47a7b3c8c09f33cff04.gif?1458984468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/7084/38d294e5b4be776f49e3d4b4b567a94e1babfcf8.gif?1458984468&quot;]">
                <a title="Trò chơi Assassination Simulator - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/assassination_simulator">
                    <input type="hidden" name="for-girls-1435" id="for-girls-1435" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Assassination Simulator - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/1187/small.jpg" data-srcset="https://img.y8.com/cloud/y8-thumbs/1187/small.jpg 1x" src="https://img.y8.com/cloud/y8-thumbs/1187/small.jpg" srcset="https://img.y8.com/cloud/y8-thumbs/1187/small.jpg 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Assassination Simulator</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                79%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            701,727 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_145311" class="item thumb videobox grid-column" data-item-id="145311" data-label-ids="1 Player,Adventure,Escape,Point &amp; Click,Puzzle,Scary,Thinking" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/111785/5330ee164779c266876e52451ed8c7228f9a7564.mp4?1509022508" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/111785/4b413ba9ca9bf039f8c4957747abd6c1cb2d8b5a.ogv?1509022508" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/111785/0a61885d64326db3062053fa4c1ca7bb068de3d2.webm?1509022508" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/111785/478cee0b1eee3522573662d5609152794dfe7aa4.gif?1509022508&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/111785/28f2d58507cd43286bd64be542ee5cefd17c314d.gif?1509022508&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/111785/7bb59351efeecf1c5394fb779dc6be6bcc0b83ce.gif?1509022508&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/111785/690326f89d19925c16a7930fd23dbb464d279fb1.gif?1509022508&quot;]">
                <a title="Trò chơi The Insanity II - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/the_insanity_ii">
                    <input type="hidden" name="for-girls-145311" id="for-girls-145311" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="The Insanity II - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/104420/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/104420/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/104420/small.gif" srcset="https://img.y8.com/cloud/y8-thumbs/104420/small.gif 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">The Insanity II</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                62%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            23,793 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_145651" class="item thumb videobox grid-column" data-item-id="145651" data-label-ids="1 Player,Purchase Equipment Upgrades,Spaceship,Strategy,Tower Defense,Series" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112243/3b163bca0c809c3095b75d869b5e35c8f967db82.mp4?1510147478" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112243/2e335b49e8924642e6f09210c4da2e4c7152e757.ogv?1510147478" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112243/72e6bbe27d1f05eaeec52fee30a5208659feecb5.webm?1510147478" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112243/fc6f88d335453d1bc817dd9fde0165843d257a5d.gif?1510147478&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112243/94e37b1bfa581f0c6466b17bc4a6e2a1ca9159f6.gif?1510147478&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112243/26ccb762d176c615920a99f7795056ce7efdd55b.gif?1510147478&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112243/9b3f4e4a888b96dbbf43599962d02a63a991a9f7.gif?1510147478&quot;]">
                <a title="Trò chơi Saucer Defense Fleet - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/saucer_defense_fleet">
                    <input type="hidden" name="for-girls-145651" id="for-girls-145651" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Saucer Defense Fleet - Strategy/RPG - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/104677/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/104677/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/104677/small.gif" srcset="https://img.y8.com/cloud/y8-thumbs/104677/small.gif 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Saucer Defense Fleet</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                33%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            3,215 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_145688" class="item thumb videobox grid-column" data-item-id="145688" data-label-ids="1 Player,Adventure,Planet,Platforms,Quiz,Space,Spaceship" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112507/1211eeaa1501ec30f266d19bd6d2209d283e9f8f.mp4?1510573482" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112507/52187bdfe363b8526799bbd9b21b6f5e59770801.ogv?1510573482" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/112507/6dfc62f68d08f8e39f19ce3bc7ed36c1bf4dbcae.webm?1510573482" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112507/7468df558bb858a80d69e2a175cef863986e0d9d.gif?1510573482&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112507/747a49cf1f331aa0940b6080c1e01d5a0c8eef2a.gif?1510573482&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112507/98a04857da523dfcae8bd5ccae6aeb8105bb8b93.gif?1510573482&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/112507/a9a5f7868f0e51e4923920c70dcf7122dadd2eeb.gif?1510573482&quot;]">
                <a title="Trò chơi Space Crusader - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/space_crusader">
                    <input type="hidden" name="for-girls-145688" id="for-girls-145688" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Space Crusader - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/104767/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/104767/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/104767/small.gif" srcset="https://img.y8.com/cloud/y8-thumbs/104767/small.gif 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Space Crusader</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            4,280 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_148019" class="item thumb videobox grid-column" data-item-id="148019" data-label-ids="1 Player,Jigsaw,Puzzle,Thinking" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114477/6a30f3650d61c99ffc59f791a70961525007f62f.mp4?1515811831" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114477/59a1f6255ca9be2af832ddb1536d335a05ff3b1d.ogv?1515811831" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114477/dc60123a4860078c89fa8ce0c48dbd5b7b21d3aa.webm?1515811831" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114477/695a3afb3fb48843a746f1ef8c2977c456910309.gif?1515811831&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114477/9705e3fc4fd51acf1f7c043a660970dbd70bf86f.gif?1515811831&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114477/159ab2e36cda6edd5951cec1982e8c7bd540b626.gif?1515811831&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114477/df22ebb4735108e2f7555a0c710f3249ed560c1e.gif?1515811831&quot;]">
                <a title="Trò chơi Jigsaw Purple Flowers - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/jigsaw_purple_flowers">
                    <input type="hidden" name="for-girls-148019" id="for-girls-148019" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Jigsaw Purple Flowers - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106543/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106543/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106543/small.gif" srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106543/small.gif 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Jigsaw Purple Flowers</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                85%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            5,707 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_148171" class="item thumb videobox grid-column" data-item-id="148171" data-label-ids="1 Player,Jigsaw,Monkey,Puzzle,Thinking" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114709/712e88ed1bc543502faa17ee6172c7d07eb2528f.mp4?1516350046" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114709/e0763c0c1a83ca99e0ad005f7ffe182fe1868225.ogv?1516350046" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114709/9034a98ff1f38d03658bc2f5e09f4ac8eb9082fd.webm?1516350046" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114709/d2e2a3fc95ecfa54a66da026bcca87569a43999e.gif?1516350046&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114709/61c3b56f1d67aa44defabdae6898382e66a71a6a.gif?1516350046&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114709/4571fc6f2a430eec968b08388ad7f7eb49256086.gif?1516350046&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114709/0aa9abe5c9f61709136383b854f41e1f26eccfb3.gif?1516350046&quot;]">
                <a title="Trò chơi Monkie Jigsaw - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/monkie_jigsaw">
                    <input type="hidden" name="for-girls-148171" id="for-girls-148171" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Monkie Jigsaw - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106735/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106735/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106735/small.gif" srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106735/small.gif 1x">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Monkie Jigsaw</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                87%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            15,298 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_148585" class="item thumb videobox grid-column" data-item-id="148585" data-label-ids="1 Player,Car,Racing" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114818/e3bfe6dc58de4d957d7665a115fd799811de6471.mp4?1516694487" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114818/235a898c13dadf50070d58d05c43f96a0683fe13.ogv?1516694487" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114818/4afbbf7202764d408bcce16e26165e6a658c2bd3.webm?1516694487" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114818/75a6902e4366603c81250f8ffc97ebb2f2859a02.gif?1516694487&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114818/286aef0873e3ba7f23dd2d22a19ca8e059d31f25.gif?1516694487&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114818/b0e4e1d680e4e00ea1250fb54b79a6caecbcacf3.gif?1516694487&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114818/04a86ca634ce8285440428ec298d48b7dceb30fa.gif?1516694487&quot;]">
                <a title="Trò chơi Insane Rally - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/insane_rally">
                    <input type="hidden" name="for-girls-148585" id="for-girls-148585" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Insane Rally - Racing &amp; Driving - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106813/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106813/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Insane Rally</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                87%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            7,559 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_148598" class="item thumb videobox grid-column" data-item-id="148598" data-label-ids="1 Player,Cooking Games,Decorate,Girl,Girls,Food,Mouse Skill" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114844/fa599e140f79753412f035419ddec4cb5b17924d.mp4?1516744605" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114844/3e996f9fa969a1862d36b326d6136481d70dca39.ogv?1516744605" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114844/7b17a29c3cb47cb6c0d076a2d8ee48ff1eef919b.webm?1516744605" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114844/2365dc16bcba68d884ec10b8a4a0c5bb09a59143.gif?1516744605&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114844/8f0cee0677f5312f959352819d5334b06a96de06.gif?1516744605&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114844/ee6aa0b64cd33937344d4b0ca7a2762d0f0dcb72.gif?1516744605&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114844/2d21b611598013eb82d962aa0c82a67516e9f8ad.gif?1516744605&quot;]">
                <a title="Trò chơi Ice Cream Cone Cupcakes Saga 2 - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/ice_cream_cone_cupcakes_saga_2">
                    <input type="hidden" name="for-girls-148598" id="for-girls-148598" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Ice Cream Cone Cupcakes Saga 2 - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106831/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106831/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Ice Cream Cone Cupcakes Saga 2</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            40,492 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_150058" class="item thumb videobox grid-column" data-item-id="150058" data-label-ids="1 Player,Collecting Games,Driving,Purchase Equipment Upgrades,Truck Games,Balance" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116180/dfacabf0eb56044d096a05b254338ce037c5b714.mp4?1519827604" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116180/5145c57a3fd6c1b8310cd78184f631e34a912fb9.ogv?1519827604" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116180/0ea05c45c118f49a1ed44404f50ab36120ee6008.webm?1519827604" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116180/e8a577494db81c3a202ebbc167621d50e04fdf68.gif?1519827604&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116180/6c7041a9bfb87ff760fae58634f34689b6c50da9.gif?1519827604&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116180/3541315f7afd2c3b41bc5359f38b79f3470a1be4.gif?1519827604&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116180/2bac0d050a3f900b51dba5607f76b510cf5eacee.gif?1519827604&quot;]">
                <a title="Trò chơi Extreme Safari Truck - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/extreme_safari_truck">
                    <input type="hidden" name="for-girls-150058" id="for-girls-150058" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Extreme Safari Truck - Racing &amp; Driving - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108032/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108032/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Extreme Safari Truck</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                64%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            13,087 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_150073" class="item thumb videobox grid-column" data-item-id="150073" data-label-ids="1 Player,Action,Alien,Shoot 'Em Up,Spaceship,Arcade,Retro,Side Scrolling" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116199/14a78a23708f4cab8908d6413f3bd9204ba06fb2.mp4?1519876187" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116199/da069c1515fe9830259d8b69c2dfc2baed0600af.ogv?1519876187" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116199/9f3d0bdea9d09a213f7b70e331f8f413d6e21275.webm?1519876187" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116199/2416c2a327fc8e69119f626d8133dc20090c5929.gif?1519876187&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116199/0acdaa6d62a08d44c51e63157389f0df8397a189.gif?1519876187&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116199/5be5ad69ae41549a7dbc92825089b1a486f270a4.gif?1519876187&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116199/aabf2b81f12c2a9b72dc9dac9c4777edae2f6eb2.gif?1519876187&quot;]">
                <a title="Trò chơi Mausland Assault - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/mausland_assault">
                    <input type="hidden" name="for-girls-150073" id="for-girls-150073" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Mausland Assault - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108058/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108058/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Mausland Assault</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                78%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            3,341 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_150112" class="item thumb videobox grid-column" data-item-id="150112" data-label-ids="1 Player,Chicken,Farm,Physics,Platforms,Puzzle,Rescue Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116114/084131a2bc72cee94142842656c11bf50d4bcc24.mp4?1519696832" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116114/d451d4644a2e53f1b730febe5dbf2d2704ba6a69.ogv?1519696832" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116114/13fa14af1efe31c123fdbacdfef66e061d880907.webm?1519696832" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116114/43b0f220d65e15c304d859f11d6bb9ffae136972.gif?1519696832&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116114/12cd2a7cd63bd24b1ecb3f5f190f02a80a5abc33.gif?1519696832&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116114/d0c0b839901fceec220a4b668893e6b30b9c7d9d.gif?1519696832&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116114/d8e652619c4706ecce030466089b671455b4a01d.gif?1519696832&quot;]">
                <a title="Trò chơi Egg Savior - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/egg_savior">
                    <input type="hidden" name="for-girls-150112" id="for-girls-150112" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Egg Savior - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107984/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107984/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Egg Savior</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                89%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            9,946 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_150550" class="item thumb videobox grid-column" data-item-id="150550" data-label-ids="1 Player,Arcade,Collecting Games,Evade,Free Game,Jumping" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116799/80490057188b23e5a3d69a263d5a3c3be92b4173.mp4?1521113474" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116799/511ef873eac25d789424a01abb0178d744a1ad9d.ogv?1521113474" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/116799/8d73e05cbbe04b24e4a35a6af82bc0540ca43567.webm?1521113474" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116799/b41945d5231829879e5d26be3307d2583b010bbc.gif?1521113474&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116799/b1b86de8e8d49a309d057294d3e5628a5a573fb4.gif?1521113474&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116799/c3733f5f9164389fcdace05239595dc8e5bd192b.gif?1521113474&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/116799/2881dacd8f462ee8de505aa12b42f80112cd13ea.gif?1521113474&quot;]">
                <a title="Trò chơi Sage - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sage">
                    <input type="hidden" name="for-girls-150550" id="for-girls-150550" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sage - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108622/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108622/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sage</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                55%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            8,763 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_154289" class="item thumb videobox grid-column" data-item-id="154289" data-label-ids="1 Player,Arcade,Blocks,Christmas,Match 3,Retro" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/b281f52650702ceb352071f2b717c4a3c4ec2158.mp4?1528345270" data-ogv-movie="https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/095294ba3d8fdb77995e0ae916bf1b51ccd72f2e.ogv?1528345270" data-vp8-movie="https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/a45bcce07d15e91bf98bcc36c50de3f4f5bca92f.webm?1528345270" data-thumb-movie="[&quot;https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/8155d953b5b37bb21cfe1183d60c5ed1450569d9.gif?1528345270&quot;,&quot;https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/6455caa6ea3fed33977cdac553e181d592782ed0.gif?1528345270&quot;,&quot;https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/edf50a5df20081dda6214f8c3e3fafbcb36aa913.gif?1528345270&quot;,&quot;https://img.y8.com/cloud/v2-y8-video-previews-001/videos/120264/c0352e54198af90e513dd5bb90be5b24d1a073dd.gif?1528345270&quot;]">
                <a title="Trò chơi Santa's Helpers - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/santa_s_helpers">
                    <input type="hidden" name="for-girls-154289" id="for-girls-154289" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Santa's Helpers - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/v2-y8-thumbs-small-thumbnails-001/111593/small.gif" data-srcset="https://img.y8.com/cloud/v2-y8-thumbs-small-thumbnails-001/111593/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Santa's Helpers</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,542 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_125110" class="item thumb videobox grid-column" data-item-id="125110" data-label-ids="1 Player,Action,Blood,Killing Games,Monsters,Platforms,Vampire" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/93832/1d5e6d05224a5030fc8a93f5a55a8b9f56926a19.mp4?1475562956" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/93832/d8adb2b1a2b7d67f962beb59eb9cd5d551683b0d.ogv?1475562956" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/93832/651457dea958f71ef699986ace5a396a7c3967aa.webm?1475562956" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/93832/745613f603de6ae99ec7e98a92e8f04e6b28f121.gif?1475562956&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/93832/2aa70f55efbe7b842339ab7013341ccb30697b34.gif?1475562956&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/93832/2dd27c6aae19e90ebec413c6df0176e11420b3f6.gif?1475562956&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/93832/99ba5e82bc6198639f5cea97db700c84284da993.gif?1475562956&quot;]">
                <a title="Trò chơi Sanguine 2 - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sanguine_2">
                    <input type="hidden" name="for-girls-125110" id="for-girls-125110" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sanguine 2 - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/93937/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/93937/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sanguine 2</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                84%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            20,408 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_132619" class="item thumb videobox grid-column" data-item-id="132619" data-label-ids="1 Player,Action,Hack and Slash,Fighting,Monsters,Skeleton,Sword,Purchase Equipment Upgrades" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/100529/9f0c91c6bb16000d724c99c4672ab215249f7b29.mp4?1483979174" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/100529/c6c1dc5bd3585fb2dfd19cfb8d7b364fa7063159.ogv?1483979174" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/100529/1e4e698c88ca6b1821d44909975954295d492df3.webm?1483979174" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/100529/d81e71a33c73c8a4b99ad62ab99483516bfc5f7c.gif?1483979174&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/100529/c1382c88e56b6fd2ee856a5375598cfcfd47097a.gif?1483979174&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/100529/c7aaf29ce0fbc05cae4ade781f149a39419cd3d5.gif?1483979174&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/100529/4d1cbbd575569ab2be962eea0ed11af53f943bbf.gif?1483979174&quot;]">
                <a title="Trò chơi Siege of Osaka - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/siege_of_osaka">
                    <input type="hidden" name="for-girls-132619" id="for-girls-132619" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Siege of Osaka - Fighting - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/96506/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/96506/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Siege of Osaka</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                68%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            21,782 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_82150" class="item thumb videobox grid-column" data-item-id="82150" data-label-ids="1 Player,Free Game,Blood,Dancing,Gore,Music,Puzzle,Stick,Violence,Fighting" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/19706/3d22701b1e0e69167ad571a7a0cc91c37fabcbdd.mp4?1461592847" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/19706/6eb273eb5b0f640a153ae151296b91d5f98f9afd.ogv?1461592847" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/19706/84bbf98ed1e2e50fef3a9be5f0f45c632ea53fa4.webm?1461592847" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/19706/25b5351a745dd3b300d3b771c5996df84da1ddc8.gif?1461592847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/19706/2eb36b4391b260cd1395852898719c6a436c233e.gif?1461592847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/19706/7324c712454a63bc8aa3e4d57d1826ad4a9d51c0.gif?1461592847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/19706/49d16bf127e5499df9466212de6dfe8770963db1.gif?1461592847&quot;]">
                <a title="Trò chơi Causality Festival - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/causality_festival">
                    <input type="hidden" name="for-girls-82150" id="for-girls-82150" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Causality Festival - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/62794/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/62794/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Causality Festival</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                79%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            196,256 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_139445" class="item thumb videobox grid-column" data-item-id="139445" data-label-ids="1 Player,Girl,Girls,Makeover / Make-up,Princess,Fun,Kids,Disney,Funny" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/106449/e27b4d3bc8717a4b8206c27a79d967c40e461e02.mp4?1496646714" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/106449/5ec13dcb4ac5c1190dfd5e27e77c7939b505f919.ogv?1496646714" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/106449/993eae7e7a638dcdc5ae04260a8a9f4277bcc6e9.webm?1496646714" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/106449/f95a95c05a35edfc138ffffc995e5395180ff687.gif?1496646714&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106449/b2b5fac4a8eccd48ebca4e6ebec0045cee3aa06d.gif?1496646714&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106449/9d4dab8e88a05d09cf58d9dc3d4c83cfe0921fce.gif?1496646714&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106449/cc47b19f49b036321864c0586fc225b863c9c425.gif?1496646714&quot;]">
                <a title="Trò chơi Frozen Elsa Fun MakeOver - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/frozen_elsa_fun_makeover">
                    <input type="hidden" name="for-girls-139445" id="for-girls-139445" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Frozen Elsa Fun MakeOver - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/100293/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/100293/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Frozen Elsa Fun MakeOver</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                64%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            20,663 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_139641" class="item thumb videobox grid-column" data-item-id="139641" data-label-ids="1 Player,Adventure,Platforms,Puzzle,Rescue Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/106606/9bdb7cac4f1c6d728939a9eaa099befa400cb10b.mp4?1496999847" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/106606/85382559a0e09a5ef42eb837071b06e7982005a5.ogv?1496999847" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/106606/cf245bad008bcd68dc6b497befda0c0b776ee848.webm?1496999847" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/106606/17cf2e28afb42774591fd2eb05734a15724496be.gif?1496999847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106606/72cbcfecc88ecc745500cdf53b4e3a9e51553f91.gif?1496999847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106606/2e9624b3a33338dc0e3a689e3a976d1c541283b7.gif?1496999847&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/106606/e20ba31b1825338da456e034a6b0f7e9d07b3370.gif?1496999847&quot;]">
                <a title="Trò chơi Insensato - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/insensato">
                    <input type="hidden" name="for-girls-139641" id="for-girls-139641" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Insensato - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/100405/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/100405/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Insensato</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            9,691 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_141594" class="item thumb videobox grid-column" data-item-id="141594" data-label-ids="1 Player,Dress Up,Free Game,Girl" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/108239/a87b2682487f4d223d5208d3321ef7a2b7de0748.mp4?1500974857" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/108239/96ce4860f69b670c9affbb0396f2e2cab034729f.ogv?1500974857" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/108239/77d6252708c16278562640f180dc7e7a38c9362f.webm?1500974857" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/108239/25fcb41ab5a3bb31e27258152c95e98892f8c7fd.gif?1500974857&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108239/19256cafb87e20aacfaa197b6df9b9ee4215f23b.gif?1500974857&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108239/23f88d22c636d23124c1073378aa20f83a1ca9a9.gif?1500974857&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108239/5fa4cb85a246f91cb80071ef6bae94455f1d3af1.gif?1500974857&quot;]">
                <a title="Trò chơi Sailor Sun Dress Up - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sailor_sun_dress_up">
                    <input type="hidden" name="for-girls-141594" id="for-girls-141594" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sailor Sun Dress Up - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/101653/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/101653/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sailor Sun Dress Up</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            8,745 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_141748" class="item thumb videobox grid-column" data-item-id="141748" data-label-ids="1 Player,Free Game,Math,Numbers,Thinking,Timing Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/108387/f1c71312ab2ee6cd94ce5ea07936ae526b6cdc41.mp4?1501237247" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/108387/619d845e1fcaa99419e0c231f90f37722769282e.ogv?1501237247" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/108387/fbbfbd238014c8d828bebc393c75db346d7cfa8c.webm?1501237247" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/108387/ee1e05c016aa874fd29d9a2a5fe918306b819550.gif?1501237247&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108387/5982eab7e0bd37c4a65a080ac98d19367fe4ec62.gif?1501237247&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108387/d8c84b1180c5f2356a04f66b0b6e501ab5ad8f75.gif?1501237247&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108387/20522a5142740d925c6b85e448360db0372671dd.gif?1501237247&quot;]">
                <a title="Trò chơi Sanjay and Craig Maths Test - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sanjay_and_craig_maths_test">
                    <input type="hidden" name="for-girls-141748" id="for-girls-141748" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sanjay and Craig Maths Test - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/101769/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/101769/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sanjay and Craig Maths Test</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                75%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            5,199 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_142085" class="item thumb videobox grid-column" data-item-id="142085" data-label-ids="1 Player,Free Game,Hidden Object Games,Mouse Skill,Political,Timing Game,Terrorist" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/108626/a83ec76d1336666a5871214b8c6f640269830e16.mp4?1501850737" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/108626/5858da3a80c296e1d15236a2d9f4216f43412d1e.ogv?1501850737" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/108626/9ebdda5d8741155a4e0f72b887b8ba1297b84804.webm?1501850737" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/108626/6f20ed411e9ebfd770765808352d6acaab800134.gif?1501850737&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108626/191713d2b245745659fb7fce3f7adfcc37652257.gif?1501850737&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108626/fafcf98fa0c23d83b5348f281bc0448d249ab1d9.gif?1501850737&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108626/d0ccc3d37754fba68030bc241ee7ae8b29d945fb.gif?1501850737&quot;]">
                <a title="Trò chơi Where Is Osama? - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/where_is_osama_">
                    <input type="hidden" name="for-girls-142085" id="for-girls-142085" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Where Is Osama? - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/101962/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/101962/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Where Is Osama?</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                51%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            63,010 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_142176" class="item thumb videobox grid-column" data-item-id="142176" data-label-ids="1 Player,Dress Up,Girl,Girls" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/108707/60c0c27864e6eae939d393da5a7990d0735a42ea.mp4?1502205077" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/108707/c51fd95d503a682d1262fcdc15f830eab5f9d746.ogv?1502205077" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/108707/a16c600b305869ef5adfa97600be53c1009ebbeb.webm?1502205077" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/108707/380a97a74ec14b9093aa049793822019a9c47ca1.gif?1502205077&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108707/127cd60a0c6eec71b05b5aa89033bb3c7b0a9183.gif?1502205077&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108707/ad18ad33485868421c20332a33ebebfc43f048ca.gif?1502205077&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/108707/bef872bf3188873f979841337922cba443befd88.gif?1502205077&quot;]">
                <a title="Trò chơi Save The Last Dance - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/save_the_last_dance">
                    <input type="hidden" name="for-girls-142176" id="for-girls-142176" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Save The Last Dance - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/102043/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/102043/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Save The Last Dance</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                91%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            8,697 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_63938" class="item thumb videobox grid-column" data-item-id="63938" data-label-ids="1 Player,Flash,Driving,Jumping,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/26974/4c418160a5f6fd3dcdd1af17052132ace810ac0a.mp4?1461129191" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/26974/8dacbe7cfa967fa67b92e0890cbd213291947120.ogv?1461129191" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/26974/8f95a2d94884186f2f47a77c57510b8b6d30bd30.webm?1461129191" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/26974/bbc000f512c89944372620758b2760d865f76c31.gif?1461129191&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/26974/4d0e045fda4643c5573a77fd9543d801055e8f18.gif?1461129191&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/26974/016b178a32e04a32e88a635480f9c5dd7698c147.gif?1461129191&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/26974/cfa3efa1078504ded3560286e48b8ba6ff3b11ba.gif?1461129191&quot;]">
                <a title="Trò chơi Save My Life - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/save_my_life_game">
                    <input type="hidden" name="for-girls-63938" id="for-girls-63938" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Save My Life - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/50407/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/50407/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Save My Life</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            97,309 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_13125" class="item thumb videobox grid-column" data-item-id="13125" data-label-ids="Words,1 Player,Flash,Educational,Guessing Game,Numbers,Food,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/15684/51d6f66346e7a0b1239cbb62f43eefd3c54c77bb.mp4?1459468061" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/15684/f1dd324dbca285a4c8f8a376bed3e139367caf21.ogv?1459468061" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/15684/2eff82cca1d573c05832f9e59963c01efcbe9c12.webm?1459468061" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/15684/a1429fd25ee0161883f61d8a56ccaa68b4debded.gif?1459468061&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15684/628fc8a26528795874aa3cf88b0fac3af0afc356.gif?1459468061&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15684/db8ca383d3ab2dc6d573de6990442884809e5eeb.gif?1459468061&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15684/9c1d83519f868e08ba133ced4e3e9fe713319a75.gif?1459468061&quot;]">
                <a title="Trò chơi Sandwich Word - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sandwich_word">
                    <input type="hidden" name="for-girls-13125" id="for-girls-13125" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sandwich Word - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/12080/small.jpg" data-srcset="https://img.y8.com/cloud/y8-thumbs/12080/small.jpg 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sandwich Word</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                82%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            161,716 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_89763" class="item thumb videobox grid-column" data-item-id="89763" data-label-ids="1 Player,Dress Up,Girl,Girls,Makeover / Make-up" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/61316/8b30388ab2a8183d5a780d4a01053bc8fb61d106.mp4?1461826012" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/61316/39273ef7ab7dfc075332a2a0ffb82a650c76a42d.ogv?1461826012" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/61316/21a154b913c7df96409df173c03e570ffde8bf84.webm?1461826012" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/61316/9c60bf028757aefc1b3df31953014105ef4a45e5.gif?1461826012&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61316/0f5cb0b17dc1e14257d6462563c86bfb4b65bc9e.gif?1461826012&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61316/1662c504eda886c2d66bfdfaf3176fe7dbd3825b.gif?1461826012&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61316/21e9b9c6cd4c6727dd9c71cc90f8a9334aab1b1c.gif?1461826012&quot;]">
                <a title="Trò chơi Teresa High School Prom - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/teresa_high_school_prom">
                    <input type="hidden" name="for-girls-89763" id="for-girls-89763" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Teresa High School Prom - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/67468/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/67468/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Teresa High School Prom</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                75%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            7,118 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_146796" class="item thumb videobox grid-column" data-item-id="146796" data-label-ids="1 Player,Fish,Matching Game,Water" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113353/421c19ea27213df57c9895e44a8264c7633201a3.mp4?1512629561" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113353/d8aee68ea543543e3305748633e2e391f1e49421.ogv?1512629561" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113353/6f236ea21183644ae46fda5e80a4f6773e40f062.webm?1512629561" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113353/54063fc99b410fac62ea85c852144930ed3f20b9.gif?1512629561&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113353/116a509e593f0bb4f2ff4fdcdf6842e9d9fcbf05.gif?1512629561&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113353/3655048eb98f3f77cb5f117b0b89d3d3cf11b840.gif?1512629561&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113353/e8242cab85688a359a38f44fbfd0b9f4f8e00f18.gif?1512629561&quot;]">
                <a title="Trò chơi Saltissima - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/saltissima">
                    <input type="hidden" name="for-girls-146796" id="for-girls-146796" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Saltissima - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/105605/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/105605/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Saltissima</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,967 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_147080" class="item thumb videobox grid-column" data-item-id="147080" data-label-ids="Front Upload from y8,1 Player,Jigsaw,Timing Game,Truck Games" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/119002/c7da3b170fe13726e332a832b082864cba430f7d.mp4?1526007099" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/119002/7084066b932e176796302b2952036d2c17675d0c.ogv?1526007099" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/119002/8db88a4c8efb07fa55dae61e5c06d1f3a8a31bd2.webm?1526007099" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/119002/a20767bb493899d1310fa9dad3ad3a48d451add8.gif?1526007099&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/119002/6909b307d5dc065d209623feef5d6d899b49fd5c.gif?1526007099&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/119002/80ba211ea8c1e0adbf10e8a665a6c0aebbd7ea13.gif?1526007099&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/119002/2546d070e80a0931573191469cebc8d467774c8c.gif?1526007099&quot;]">
                <a title="Trò chơi Wrangler Jeep Jigsaw - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/wrangler_jeep_jigsaw">
                    <input type="hidden" name="for-girls-147080" id="for-girls-147080" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Wrangler Jeep Jigsaw - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110489/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110489/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Wrangler Jeep Jigsaw</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                86%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            5,349 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_147228" class="item thumb videobox grid-column" data-item-id="147228" data-label-ids="Front Upload from y8,1 Player,Christmas,Free Game,Shooting" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113692/b982d3989348ed03d64dfeb55f25ccbc87b8a958.mp4?1513667874" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113692/9e728f63821d70654b7d61e115d9450afe040a35.ogv?1513667874" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113692/7e870583b458479e3f3ac2af5a4b1cecfd806197.webm?1513667874" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113692/e83b04cebbd1d4b438581f458ef281abe54da06d.gif?1513667874&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113692/6bcd29f187fdf0986a56e777a07b4a7a68bac27f.gif?1513667874&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113692/77ecc6f81bb13f25cd4d038c202c07cf18064db0.gif?1513667874&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113692/68f02014a0b9341bdf33824ac3888c7c5e2c91cc.gif?1513667874&quot;]">
                <a title="Trò chơi Save Christmas Presents - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/save_christmas_presents">
                    <input type="hidden" name="for-girls-147228" id="for-girls-147228" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Save Christmas Presents - Shooting - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/105913/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/105913/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Save Christmas Presents</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,804 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_147256" class="item thumb videobox grid-column" data-item-id="147256" data-label-ids="1 Player,Christmas,Collecting Games,Kids,Thinking,Hidden Object Games,Mouse Skill" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114017/d4b9437147bdb786c01721659605b520f63c9e0f.mp4?1514485630" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114017/76142a899fd8ba930e96ce32bc501dea7b04cee1.ogv?1514485630" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/114017/28ef928460b9b9b26b46f98fe4408015fbef4991.webm?1514485630" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114017/6e641d5708d915d8afb142f30fdbc8a44275bdbe.gif?1514485630&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114017/887546c4f2465934d129e01c58f23c84e648b958.gif?1514485630&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114017/c897c2f74efa12b1ef90c5a0c6c7033009cfc76b.gif?1514485630&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/114017/6392a88303aa4fa6599cbdc26b84280762c8e349.gif?1514485630&quot;]">
                <a title="Trò chơi Santa's Missing Toys - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/santa_s_missing_toys">
                    <input type="hidden" name="for-girls-147256" id="for-girls-147256" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Santa's Missing Toys - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106181/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106181/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Santa's Missing Toys</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            3,729 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_147318" class="item thumb videobox grid-column" data-item-id="147318" data-label-ids="Front Upload from y8,1 Player,cars,Christmas,Free Game,Memory Game,Mouse Skill,Puzzle,Timing Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113890/aecd1d2bbafd68fcd4198444232f148eb19df5ca.mp4?1514232376" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113890/3ff865f3c5d7745608cb6b2f597d547b35d1a158.ogv?1514232376" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/113890/6dae0014ce97117eb313ad7c4711aefa8f77fe28.webm?1514232376" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113890/468360818ca02a5da07c60d80948421c21ddc9ef.gif?1514232376&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113890/dd60f007583a28ad243c42b2bc569fdd950a1a79.gif?1514232376&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113890/15700d08fdd1e1a64e60d2d6972265749fe8d3f1.gif?1514232376&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/113890/7dc6a1a9365064e361551b7d1bfeb5d44c46d4f1.gif?1514232376&quot;]">
                <a title="Trò chơi Santa Claus Vehicles - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/santa_claus_vehicles">
                    <input type="hidden" name="for-girls-147318" id="for-girls-147318" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Santa Claus Vehicles - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106080/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/106080/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Santa Claus Vehicles</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                79%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,732 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_151301" class="item thumb videobox grid-column" data-item-id="151301" data-label-ids="1 Player,Christmas,Free Game,Mouse Skill,Flying,Shoot 'Em Up,Side Scrolling,Snow" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117189/d954558395baad974edfe7b1c274a702e36e4072.mp4?1521875931" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117189/0493e6a7cc5fec1ae88d30aba88277c9269f902d.ogv?1521875931" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117189/4311db29a903b78d44f04b823edbf0833107e2bc.webm?1521875931" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117189/d98e45163c8dda7abb74381b93d1ca88d014313b.gif?1521875931&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117189/85a711850b9a522a71764106fb19a8f0b649ee21.gif?1521875931&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117189/00bedbf5338ba0cc1ba88d1cdb7c222fe82d5369.gif?1521875931&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117189/f5028a5e84149ae4eceedc73644ecac4dd83f505.gif?1521875931&quot;]">
                <a title="Trò chơi Rider Santa - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/rider_santa">
                    <input type="hidden" name="for-girls-151301" id="for-girls-151301" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Rider Santa - Shooting - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108962/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/108962/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Rider Santa</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,982 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_152831" class="item thumb videobox grid-column" data-item-id="152831" data-label-ids="1 Player,Dress Up,Girl,Girls" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118634/92811008778f12944f86501162e1b0fe82d806a9.mp4?1525020447" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118634/40c7e11698ec5155e1c565b470954085cd47b1f5.ogv?1525020447" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118634/90dca8964a30166ed278546e9c45e4b96ba559e0.webm?1525020447" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118634/095db3e93df53144d887a3b0b26127386914e917.gif?1525020447&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118634/699c41963fd6d22d5cf3bab06117750ce42413fc.gif?1525020447&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118634/bf9b4a867f2f240790c8c3d4e597d49a4e435dfe.gif?1525020447&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118634/15ce61623c2454372a3ddc555066cb202b1c05b3.gif?1525020447&quot;]">
                <a title="Trò chơi Wild Safari Fashion - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/wild_safari_fashion">
                    <input type="hidden" name="for-girls-152831" id="for-girls-152831" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Wild Safari Fashion - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110215/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110215/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Wild Safari Fashion</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,907 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_153251" class="item thumb videobox grid-column" data-item-id="153251" data-label-ids="1 Player,Jigsaw,Puzzle,Timing Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118950/dfb54006e2d46bcc2eeadb313628faa067dfd436.mp4?1525918686" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118950/7d8d82d193c47b4821d2c5b3fdb5662c727a84a4.ogv?1525918686" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118950/cd867fb998aae58e52144fe2b53097661504a151.webm?1525918686" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118950/331407cf683a411cf6204e99ca4a04a6d30e0c22.gif?1525918686&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118950/3a6ea72ae063d68db8592bc6d1ce52996c1fcd21.gif?1525918686&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118950/e7f6ed4166eae247f1649206735bfc296a32e3fd.gif?1525918686&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118950/feb5cfd155cad3c25469f3fc2a9d2f09635f4534.gif?1525918686&quot;]">
                <a title="Trò chơi Karate Kids Jigsaw Puzzle - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/karate_kids_jigsaw_puzzle">
                    <input type="hidden" name="for-girls-153251" id="for-girls-153251" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Karate Kids Jigsaw Puzzle - Thinking - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110456/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110456/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Karate Kids Jigsaw Puzzle</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                89%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            6,797 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_133893" class="item thumb videobox grid-column" data-item-id="133893" data-label-ids="1 Player,Dinosaur,Jungle,Retro" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/101721/b2b7bbda06cfd498fbe2c7414518f7c6205a050c.mp4?1485941589" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/101721/8a3558ad94cf07244c08eb9ae4e349d5ae6a8e2f.ogv?1485941589" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/101721/6a1363e5a9edb0bb0ac9e7390f1e5d51acc66b12.webm?1485941589" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/101721/cc824ef4b56228ba7152ab9b36dd09db517719fa.gif?1485941589&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/101721/6b6161df5fb3177595f5e8da4be80a323d569e89.gif?1485941589&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/101721/eb0f200fb1d7565914f03d5893d67414d7f66caf.gif?1485941589&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/101721/701baae5194cdf96b503033f98ea44795b73af48.gif?1485941589&quot;]">
                <a title="Trò chơi Time Safari - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/time_safari">
                    <input type="hidden" name="for-girls-133893" id="for-girls-133893" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Time Safari - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/97136/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/97136/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Time Safari</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            4,663 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_143481" class="item thumb videobox grid-column" data-item-id="143481" data-label-ids="1 Player,Action,Adventure,Zombies" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110265/3e14528ce1d71bc26479c895122203a64e9f0a88.mp4?1505159183" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110265/8418ad2bc2135ed13dc6e0cd90929ff3ecb47f48.ogv?1505159183" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110265/8ee63ef0cfcf8787034b051a8be033dfac36dfeb.webm?1505159183" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110265/3bbb89fef830ce9e53ed2f2b5df928bccfcb4391.gif?1505159183&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110265/ea5465ce75d41cc8019afac6c876ba246049349e.gif?1505159183&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110265/06372338484df72a995ee7b6bbe6b69208fd54e9.gif?1505159183&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110265/56be2c3e7371b85ba8c5b7e11a7762a1140d0e39.gif?1505159183&quot;]">
                <a title="Trò chơi I SAW A DREAM - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/i_saw_a_dream">
                    <input type="hidden" name="for-girls-143481" id="for-girls-143481" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="I SAW A DREAM - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/102971/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/102971/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">I SAW A DREAM</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            4,985 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_144086" class="item thumb videobox grid-column" data-item-id="144086" data-label-ids="1 Player,Arcade,Frog,Ice,Princess,Puzzle,Rescue Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110877/feb67beedef3dac66436322103937bf9c794035a.mp4?1506610338" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110877/6f7dcde0169c8970d1914972b3c98c2fa61edccb.ogv?1506610338" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/110877/09197f043c74c01104a4461bbb284618f2d1452b.webm?1506610338" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110877/3e08b1e0b7b6ceeb6d4db78f53870bc2a1ba0a44.gif?1506610338&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110877/d5dd05b573bfed7303bbda4f4caa92f4e8b1168b.gif?1506610338&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110877/5893f5b9d44d4263d256f10d4ed4e36bb1382f13.gif?1506610338&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/110877/ca32aa833a7341f83a5e18e103f5373f3515ddea.gif?1506610338&quot;]">
                <a title="Trò chơi Save Sleeping Beauty - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/save_sleeping_beauty">
                    <input type="hidden" name="for-girls-144086" id="for-girls-144086" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Save Sleeping Beauty - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/103540/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/103540/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Save Sleeping Beauty</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            3,881 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149049" class="item thumb videobox grid-column" data-item-id="149049" data-label-ids="1 Player,Adventure,bombs,Evade,Free Game,Running Games" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115278/507dab43970959be8e188a1e0df33bcede78ccd7.mp4?1517514570" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115278/36741c3c0af24e60c5076c9e21617be41f8601a8.ogv?1517514570" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115278/3895ed57ab38079119151e8942b54cd794f248bb.webm?1517514570" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115278/4406a9467fa2f83f14114cac110952c13de7e998.gif?1517514570&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115278/f44641d5362c5d0200cb148ec125df3439589f77.gif?1517514570&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115278/bf73f0b126f8dac2ae9dde6cc170dc2fe3a0c0c5.gif?1517514570&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115278/7afca0277b28b1444560952cdd8f7d97d94bdbfa.gif?1517514570&quot;]">
                <a title="Trò chơi Run Saddam - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/run_saddam">
                    <input type="hidden" name="for-girls-149049" id="for-girls-149049" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Run Saddam - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107209/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107209/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Run Saddam</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,893 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149234" class="item thumb videobox grid-column" data-item-id="149234" data-label-ids="Front Upload from y8,1 Player,Cartoon,Free Game,Jigsaw" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115486/5ff87d34199a162f5d98ac263ae1db91c315d4c9.mp4?1518077515" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115486/6ccd3594c90c6564a488f7be8fbf65c0c8b8f9ce.ogv?1518077515" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115486/e7778c0aef451a52b0bddfaa0011d2313a37bee8.webm?1518077515" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115486/fa0b61c9c5875a3d680357e7f1711d6e192a8314.gif?1518077515&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115486/7e2f04d57aeb492296283a421057f2cbd608fcf0.gif?1518077515&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115486/c8eb8c809a3603d92a4b8f82bc2708f1a50298f6.gif?1518077515&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115486/a9d9e33506a106cb05136bea2c3deabf5f737c39.gif?1518077515&quot;]">
                <a title="Trò chơi Mr Bean Jigsaw Time - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/mr_bean_jigsaw_time">
                    <input type="hidden" name="for-girls-149234" id="for-girls-149234" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Mr Bean Jigsaw Time - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107371/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107371/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Mr Bean Jigsaw Time</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                45%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            10,270 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149258" class="item thumb videobox grid-column" data-item-id="149258" data-label-ids="1 Player,Burger,Decorate,Food,Food Serving,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115420/0e5527b4c3a4af329158143004f96b0d71aa32f0.mp4?1517933701" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115420/9a3965ae8ab0ab065119e8b1439b42a2781bcbe4.ogv?1517933701" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115420/529ceaeffa908e51084eecceb55bcaead8f3a60b.webm?1517933701" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115420/4ec04608a1c76aab0ce37a2b9dac4fcbc699d482.gif?1517933701&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115420/9641bfa09b5663c6149c4324ba989d56da8b8c0a.gif?1517933701&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115420/18cc81a402930c81c4fce7a139b420245511fd69.gif?1517933701&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115420/4c9e01f803fe9b12ec5875083a450fd9f9b45d27.gif?1517933701&quot;]">
                <a title="Trò chơi Making Sandwich More Delicious - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/making_sandwich_more_delicious">
                    <input type="hidden" name="for-girls-149258" id="for-girls-149258" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Making Sandwich More Delicious - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107345/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107345/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Making Sandwich More Delicious</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                86%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            31,374 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149320" class="item thumb videobox grid-column" data-item-id="149320" data-label-ids="1 Player,2 Player,Action,Shooting" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115470/9a88a4beb49356ccc3027fc1e3f7ba73831585a4.mp4?1518027727" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115470/2c3c52912708578eccf8764f98d1043039de5287.ogv?1518027727" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115470/857d9a2667afe12bc0bd0d275568da6d0d908435.webm?1518027727" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115470/c9265bcccc41d784e77d5f3af8d3b61e33d35b36.gif?1518027727&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115470/96ec74fe3b15ad96727eee4ec1c1317c5b6b8da2.gif?1518027727&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115470/6da432159172f83c9ef28288bf74f594033e2d9c.gif?1518027727&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115470/0fafb59a0f25a6e7089dd2b45b958456c622d2be.gif?1518027727&quot;]">
                <a title="Trò chơi Save The Doc - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/save_the_doc">
                    <input type="hidden" name="for-girls-149320" id="for-girls-149320" value="false">
                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Save The Doc - Shooting - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107382/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107382/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Save The Doc</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            6,916 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149630" class="item thumb videobox grid-column" data-item-id="149630" data-label-ids="Front Upload from y8,1 Player,Boy,Free Game,Girl,Grooming" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115729/ea289c72f39c5a567990f976c66505e42f2e5406.mp4?1518620161" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115729/e231cbbff95d43a20ebfd8495ff56e680c1844a0.ogv?1518620161" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115729/93f81fb42859c03f269804d6f2547645e247a4d6.webm?1518620161" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115729/ae10c608a40314f262da01f15ed2b0e0c5bf79a9.gif?1518620161&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115729/e71659e3ac041c042f3b039218b0a2f8a0b403f9.gif?1518620161&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115729/50f6e637de3c107e0ea8e295b48dcc867556a51e.gif?1518620161&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115729/f07df63e51ccc381ae67ca7fcefa5c554fc6a535.gif?1518620161&quot;]">
                <a title="Trò chơi Vegetables At Hair Salon - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/vegetables_at_hair_salon">
                    <input type="hidden" name="for-girls-149630" id="for-girls-149630" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Vegetables At Hair Salon - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107613/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107613/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Vegetables At Hair Salon</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                88%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            10,841 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_149677" class="item thumb videobox grid-column" data-item-id="149677" data-label-ids="1 Player,Arcade,Boat,Christmas,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115753/cc14beab983f408d535faa991a5e08a7f505ea77.mp4?1518718232" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115753/2c8b2e7f0ba6e3cb6cabc768944d36934a888e72.ogv?1518718232" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/115753/e2dae3c16a7b0f07d7df12a712c66b8f5566b586.webm?1518718232" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115753/c4308a551856ea1a8e3c79187c9cef8996f3926f.gif?1518718232&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115753/9bd309b3cb99644f5a44661aca48c0bddbf39bfc.gif?1518718232&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115753/3b25dd04f069be84e8bbad090e0e22deabc70820.gif?1518718232&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/115753/5fd5d426b505ddda982aabdfccf9ab6bd4c13331.gif?1518718232&quot;]">
                <a title="Trò chơi Santas Boat - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/santas_boat">
                    <input type="hidden" name="for-girls-149677" id="for-girls-149677" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Santas Boat - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107636/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/107636/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Santas Boat</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            4,352 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_152025" class="item thumb videobox grid-column" data-item-id="152025" data-label-ids="1 Player,Dress Up,Girl,Girls" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117869/c91eeb4d0a317df4f9ca548bc95b8d4947ec59e5.mp4?1523260278" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117869/b1c8132e68b9586a168afd09b24f4b2ad2e15502.ogv?1523260278" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/117869/f773c73748ad1584277a31262afd8685ee228c3f.webm?1523260278" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117869/21a818c8ed99ec76d98cd0d5f26378713227a23c.gif?1523260278&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117869/73488a57165acb936bf3d5958a40af558d87c69b.gif?1523260278&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117869/a24d469f3a508afaac3b6194da227ec8274b074c.gif?1523260278&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/117869/1923c700b89435c6abe0f41d6230fe80ac809c4b.gif?1523260278&quot;]">
                <a title="Trò chơi Misa Dress Up - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/misa_dress_up">
                    <input type="hidden" name="for-girls-152025" id="for-girls-152025" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Misa Dress Up - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109547/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109547/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Misa Dress Up</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            5,896 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_152568" class="item thumb videobox grid-column" data-item-id="152568" data-label-ids="1 Player,Arcade,Christmas,Collecting Games,Evade,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118354/84ba5aea2347d693187e84e87d5a6a1657d0b57c.mp4?1524317129" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118354/298a79100298ea5783e22e62eff968aa99d3abfb.ogv?1524317129" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118354/605a31a3652b2cd6c9cdbad1ec1a080f0f7031e6.webm?1524317129" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118354/c4b1fd79be770a2f0e43860a7033ba248e06b68a.gif?1524317129&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118354/3ad3868b822fdc04ec3789282bbcead327443a74.gif?1524317129&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118354/982b31a61adaae9bf8d800c3ebef666b00fb4ff3.gif?1524317129&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118354/5d3e818a78c9e3edf49227d96a36cb3e79f4f489.gif?1524317129&quot;]">
                <a title="Trò chơi Santa Situation - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/santa_situation">
                    <input type="hidden" name="for-girls-152568" id="for-girls-152568" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Santa Situation - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109967/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109967/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Santa Situation</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,429 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_152582" class="item thumb videobox grid-column" data-item-id="152582" data-label-ids="1 Player,Arcade,Free Game,Shooting" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118378/e4d5713b7ddda128eb56299c5fa4ec9d8247f976.mp4?1524381299" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118378/f158e4653a36d759706a90f6309a8c1bd21122dd.ogv?1524381299" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118378/e46c1f94c0eac53967b8ba31c7c64643a1d1dccf.webm?1524381299" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118378/c6e0747aa871185a1655a2cfd773dab918fbebfa.gif?1524381299&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118378/16799450bffc07233d40df4cb21be557670385cb.gif?1524381299&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118378/7cb74dc5cf760e9262b9291d62ef4c4109dca83a.gif?1524381299&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118378/cb3dfef24422c3ab475accc8e20adae66d8cc98a.gif?1524381299&quot;]">
                <a title="Trò chơi EcoSaviors - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/ecosaviors">
                    <input type="hidden" name="for-girls-152582" id="for-girls-152582" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="EcoSaviors - Arcade &amp; Classic - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109991/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/109991/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">EcoSaviors</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                80%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            2,798 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_152668" class="item thumb videobox grid-column" data-item-id="152668" data-label-ids="1 Player,Dress Up,Girl,Girls" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118398/72e04484877d8f72b036edd34694768fa7579c1e.mp4?1524464072" data-ogv-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118398/12f365fcd7b9b3cb4e2ad666f349fd0654408061.ogv?1524464072" data-vp8-movie="https://img.y8.com/cloud/y8-rollover-002/videos/118398/818f7c30a1fae79e058d98e1cee90e7d547e1d13.webm?1524464072" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118398/ca3a4605c5948be745c7cc5a985d810d90392939.gif?1524464072&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118398/474f0c3bdca488302e7c21bf1c98877d59b01cf7.gif?1524464072&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118398/53c04bd4731779ca7007867f8e64dd0124d7fabd.gif?1524464072&quot;,&quot;https://img.y8.com/cloud/y8-rollover-002/videos/118398/74d40f622c121abdc877c392d48c05fc2921f4d4.gif?1524464072&quot;]">
                <a title="Trò chơi Girl Sailor Fashion - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/girl_sailor_fashion">
                    <input type="hidden" name="for-girls-152668" id="for-girls-152668" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Girl Sailor Fashion - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110006/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs-small-thumbnails-001/110006/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Girl Sailor Fashion</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                81%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            4,743 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_85705" class="item thumb videobox grid-column" data-item-id="85705" data-label-ids="Match 3" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/43065/d76b8aeb491d6a5a7dd2f79bc58600d5bef2e5e3.mp4?1461686219" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/43065/0d6c4797323c421b0f369089ebb96f05ed43be72.ogv?1461686219" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/43065/cab41f40cfad727de822e94b5f799100347a7043.webm?1461686219" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/43065/f7622dec6165ccc37d677fd0343f58a4d90557ec.gif?1461686219&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/43065/e16f66dd409a5daff37e4594172bf63d3c90bf41.gif?1461686219&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/43065/bd6e133fdda294c68a59fc79dd582542d0ca9abb.gif?1461686219&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/43065/32b5a4914afcf9dd3c729c2821b4997fa12926aa.gif?1461686219&quot;]">
                <a title="Trò chơi Elsa Crystal Match - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_crystal_match">
                    <input type="hidden" name="for-girls-85705" id="for-girls-85705" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Elsa Crystal Match - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/64889/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/64889/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa Crystal Match</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                86%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            11,865 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_90346" class="item thumb videobox grid-column" data-item-id="90346" data-label-ids="1 Player,Disney,Dress Up,Free Game,Girl,Girls,Makeover / Make-up,Princess" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/61801/b86c28dacf2293705202d4f064b637449025329e.mp4?1461840006" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/61801/af034b09afcc8d5284bb82e49234d1f506b46528.ogv?1461840006" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/61801/f27fc8c0e070adc2e60b1ec662cc3a064430d5e6.webm?1461840006" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/61801/7d68379b933eda6d26a3f4a450ae54e7fab5ec1b.gif?1461840006&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61801/e42bb17cce2480f4ea206935784b31c65c10550e.gif?1461840006&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61801/d810c9a62a1c7b91dbb6532d539fbba67909f61d.gif?1461840006&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61801/76af8df4ae5e21e278890d239bb40fc57b65f9f0.gif?1461840006&quot;]">
                <a title="Trò chơi Elsa in High School - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_in_high_school">
                    <input type="hidden" name="for-girls-90346" id="for-girls-90346" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Elsa in High School - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/67881/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/67881/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa in High School</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                86%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            66,312 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_90353" class="item thumb videobox grid-column" data-item-id="90353" data-label-ids="1 Player,Disney,Dress Up,Free Game,Girl,Girls,Princess,Shopping" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/61802/ac52e348a9f83005e82093b92b77e06a92fc0ffb.mp4?1461840053" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/61802/f1c3b2a21d7b4e8d68be34c678b74941b5d9213e.ogv?1461840053" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/61802/cd2bcd9b8f9e6d3a4a426653e0842cb14d420ec1.webm?1461840053" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/61802/a07464936978dc8a007fe369151b906fda6a19fb.gif?1461840053&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61802/e1b41fa10b42395c6febf7356680ab449f3bd51a.gif?1461840053&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61802/314f1e1128b87711170d3003307e608bdef492e4.gif?1461840053&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/61802/3111e89937d548846e8b984c4a71b06967002e59.gif?1461840053&quot;]">
                <a title="Trò chơi Elsa Shopping - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_shopping">
                    <input type="hidden" name="for-girls-90353" id="for-girls-90353" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Elsa Shopping - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/67882/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/67882/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa Shopping</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                88%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            140,825 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_82086" class="item thumb videobox grid-column" data-item-id="82086" data-label-ids="Christmas,Dancing,Puzzle" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/20378/899873651b4c23833b82a364d5c0c1c3df337d4e.mp4?1461591228" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/20378/af804cb07f5ef24a31b5c6f77c9c0d960685381e.ogv?1461591228" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/20378/168a29988888af29846714fa9e69114f88b256c7.webm?1461591228" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/20378/fe5d6a15234fa5da5d4c8f657b241ae918cf626f.gif?1461591228&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/20378/4271dcfc6da4aeca196eebb476bb119a8c189c9b.gif?1461591228&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/20378/f4e1c4b2cbdf4a68d6884302d47e7acd1605d779.gif?1461591228&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/20378/0fe7cc0c962e8486c216c15be02422609cc1756f.gif?1461591228&quot;]">
                <a title="Trò chơi Sneakin' Santa - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sneakin_santa">
                    <input type="hidden" name="for-girls-82086" id="for-girls-82086" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sneakin' Santa - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/62774/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/62774/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sneakin' Santa</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                84%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            18,069 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_100735" class="item thumb videobox grid-column" data-item-id="100735" data-label-ids="1 Player,Animal,Free Game,Girl,Girls,Grooming,Kids" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/67311/731a5bb13fc362bed882bfa78e7804cdbacf4bff.mp4?1462286210" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/67311/460a8b7bee95a68a66446225d9edd44062e92bf0.ogv?1462286210" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/67311/ccff3583edb171983d5d915d6b94dbc57b2a53da.webm?1462286210" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/67311/a1499b5ba947e715934eb959ccaa389a8c6c5c0f.gif?1462286210&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/67311/b20f49570b57bc794ae54110b168b00c770944df.gif?1462286210&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/67311/840e1f9971e9ece1b3157145be605279968a228e.gif?1462286210&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/67311/f16cb5c42973ac7dbe2966b4702f062e0a5afc30.gif?1462286210&quot;]">
                <a title="Trò chơi Princess Pet Beauty Salon - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/princess_pet_beauty_salon">
                    <input type="hidden" name="for-girls-100735" id="for-girls-100735" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Princess Pet Beauty Salon - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/72649/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/72649/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Princess Pet Beauty Salon</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                71%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            12,541 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_64087" class="item thumb videobox grid-column" data-item-id="64087" data-label-ids="1 Player,Jigsaw,Boy,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/15221/b054c97402db3c3513c103b74f3974f34921fcaf.mp4?1461130928" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/15221/9b46b11e9db4c396c90e9066c282aa5e9fecb72d.ogv?1461130928" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/15221/f30161256a3d569c6d3702d78553e874461144e6.webm?1461130928" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/15221/a51da89fbf7711ff5197ee82a1a1eae10bf428a4.gif?1461130928&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15221/5dc302199e0561fd10bf2c66258b2bd57fcdba37.gif?1461130928&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15221/fc35d4094d1ff324fe31645e67809a409f051dbf.gif?1461130928&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/15221/d7f4051ea7a3f5718f12f1631d029b15f48a6694.gif?1461130928&quot;]">
                <a title="Trò chơi Power Rangers Jigsaw - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/power_rangers_jigsaw">
                    <input type="hidden" name="for-girls-64087" id="for-girls-64087" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Power Rangers Jigsaw - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/50496/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/50496/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Power Rangers Jigsaw</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                90%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            47,716 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_88454" class="item thumb videobox grid-column" data-item-id="88454" data-label-ids="1 Player,Boy,Boys,Jumping,Running Games,Samurai,Sword,Platforms" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/64948/f410ab34c603876ca4785c587d5708d1d3ae466f.mp4?1461794349" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/64948/d1a18eaf1ccd470d3ca360cdd6baca4c08c617b9.ogv?1461794349" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/64948/fa20fe182518472b1aa01f1ccaa901fd65e85199.webm?1461794349" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/64948/4c6579502481d6fc1441e27cd537020333e4b07b.gif?1461794349&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64948/6246b593ae1afa9a5b214f3ed11c91acf66258a2.gif?1461794349&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64948/775bca282f082b07b60dd7b9399b63aaa4cd2998.gif?1461794349&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/64948/d34f1b8f6faf2497e8e9ca0b271c16ddcbd81e07.gif?1461794349&quot;]">
                <a title="Trò chơi Samurai Run 2 - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/samurai_run_2">
                    <input type="hidden" name="for-girls-88454" id="for-girls-88454" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Samurai Run 2 - Skill - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/66771/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/66771/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Samurai Run 2</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                83%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            12,459 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_90887" class="item thumb videobox grid-column" data-item-id="90887" data-label-ids="1 Player,Coloring,Disney,Drawing,Free Game,Girl,Girls,Princess" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/62158/6d15dbbf568f9ff9ef4fa456c9b150bb5c620cd9.mp4?1461853447" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/62158/66207ea88e1a6fe5f6f44b6d3f48bfe351fb3f78.ogv?1461853447" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/62158/278f827ff845dcbb9dcf684763f38976bca28c3a.webm?1461853447" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/62158/6f4b1beb0af2bf5ad253a6380b3c2f3b6fe733a6.gif?1461853447&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62158/7d3d9225b18ab529f03fe6d86a19a37378264080.gif?1461853447&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62158/18c634af41c1087e9edbd3911f77eecffc9d630f.gif?1461853447&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62158/aea113a8cb2d6d509b69c5d8034e201d279692b0.gif?1461853447&quot;]">
                <a title="Trò chơi Elsa Cosmetic Salon - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_cosmetic_salon">
                    <input type="hidden" name="for-girls-90887" id="for-girls-90887" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Elsa Cosmetic Salon - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/68242/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/68242/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa Cosmetic Salon</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                82%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            244,970 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_90995" class="item thumb videobox grid-column" data-item-id="90995" data-label-ids="1 Player,Free Game,Girl,Girls,Dress Up,Makeover / Make-up" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/62215/da0cfd40abe08725c9799e91f861f5b3877cab15.mp4?1461855904" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/62215/3dfc657aae74350213fd54ecde119eea1da5398c.ogv?1461855904" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/62215/783572f2e7c97665bafa94b5a48f7783592a1146.webm?1461855904" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/62215/7adf847d82af92542e21cc76b5514c4e77c6c8de.gif?1461855904&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62215/5977e66f579dc19fd6333bf2cc389b019a93a847.gif?1461855904&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62215/0156abd936f9f9a08753108d4761fbf654ae5d91.gif?1461855904&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62215/747164eb839b3e3d115480b5f5bd72ce598bd78a.gif?1461855904&quot;]">
                <a title="Trò chơi Sakura Blossom Festival - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sakura_blossom_festival">
                    <input type="hidden" name="for-girls-90995" id="for-girls-90995" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sakura Blossom Festival - Girls - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/68300/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/68300/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sakura Blossom Festival</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                83%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            10,526 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_91158" class="item thumb videobox grid-column" data-item-id="91158" data-label-ids="1 Player,Adventure,Cartoon,Disney,Girl,Girls,Jumping,Collecting Games,Platforms" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/62351/3522229358a3c6599b17189e25abb3aa84cec5b7.mp4?1461859662" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/62351/1f4bb9436f836a4dc1754b33e1a9b8305c61505f.ogv?1461859662" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/62351/183494016722fa6a43803939fa0c5a604b292d20.webm?1461859662" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/62351/223ede0cb6c3ef5e01f725d4f7200483bb01a526.gif?1461859662&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62351/6d7ab0a609db4af0393ed38f7197528cfbdc1259.gif?1461859662&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62351/ad088dfb84261004a6865b2f0a17cf7bdd259f77.gif?1461859662&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/62351/d68bdcb9d2c3dbb2224e729d5021b9fbb884be93.gif?1461859662&quot;]">
                <a title="Trò chơi Elsa Frozen Kingdom Adventure - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/elsa_frozen_kingdom_adventure">
                    <input type="hidden" name="for-girls-91158" id="for-girls-91158" value="true">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Elsa Frozen Kingdom Adventure - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/68405/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/68405/small.gif 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Elsa Frozen Kingdom Adventure</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                87%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            65,953 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_112280" class="item thumb videobox grid-column" data-item-id="112280" data-label-ids="1 Player,Action,Adventure,Platforms,Purchase Equipment Upgrades,Shooting" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;unity_player&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/81157/7da5508438370723243624b6e9521703ef0279e7.mp4?1463662468" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/81157/d3b78c144f3125c2d94e8fb2e056a3bccfaab35f.ogv?1463662468" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/81157/fa944ac3de15f056f6907fb99f990807fa3b8929.webm?1463662468" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/81157/ed2b73b29fc46aba3e30e3c1a23384b304c51146.gif?1463662468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/81157/605c77a49f4e7eae5a5e7ac6865ebcf3e86b0050.gif?1463662468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/81157/87771fdd4188ffca0bfcea6daefb31264a08858f.gif?1463662468&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/81157/0292cd00c1c4f6ebf29610255477f3faab52c60c.gif?1463662468&quot;]" data-filter="compatibility" style="display: none;">
                <a title="Trò chơi Mr Gringo and the Oil Crusade - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/mr_gringo_and_the_oil_crusade">
                    <input type="hidden" name="for-girls-112280" id="for-girls-112280" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="Mr Gringo and the Oil Crusade - Action &amp; Adventure - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/87684/small.gif" data-srcset="https://img.y8.com/cloud/y8-thumbs/87684/small.gif 1x" src="https://img.y8.com/cloud/y8-thumbs/87684/small.gif">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Mr Gringo and the Oil Crusade</h4>


                        <div class="item__technology">
                            <p class="unity_player">
                                Unity 3D
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                82%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            3,444 chơi
                        </p>
                    </div>
                </a>
            </div>
            <div id="item_46019" class="item thumb videobox grid-column" data-item-id="46019" data-label-ids="Puzzle,1 Player,Flash,Mouse Skill,Free Game" data-poster-url="https://img.y8.com/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;flash&quot;]" data-mp4-movie="https://img.y8.com/cloud/y8-rollover/videos/30837/6e1654d567c89135e8c907624e5b5a35796335ab.mp4?1460684964" data-ogv-movie="https://img.y8.com/cloud/y8-rollover/videos/30837/fff29d96d8aac0457c2499674e6aba053fdc1e08.ogv?1460684964" data-vp8-movie="https://img.y8.com/cloud/y8-rollover/videos/30837/51c0e88e65cb2fe5667192627efb0208b07fe289.webm?1460684964" data-thumb-movie="[&quot;https://img.y8.com/cloud/y8-rollover/videos/30837/30867444fa0d72a796fc0e2c551cda646ea5a4a8.gif?1460684964&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/30837/1ab3c143c7e3d12c96740c8a156984b7a55e46a6.gif?1460684964&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/30837/f2041099c9dce3d46cf5d49969d8d77f80cb9f39.gif?1460684964&quot;,&quot;https://img.y8.com/cloud/y8-rollover/videos/30837/fb0940608d70cc88e073074f71dc8fdd6542d02b.gif?1460684964&quot;]">
                <a title="Trò chơi Sandy And Ivy - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/sandy_and_ivy">
                    <input type="hidden" name="for-girls-46019" id="for-girls-46019" value="false">


                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Sandy And Ivy - Y8.COM" data-src="https://img.y8.com/cloud/y8-thumbs/38324/small.jpg" data-srcset="https://img.y8.com/cloud/y8-thumbs/38324/small.jpg 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        </div>
                    </div>

                    <div class="item__infos">
                        <h4 class="item__title ltr">Sandy And Ivy</h4>


                        <div class="item__technology">
                            <p class="flash">
                                Flash
                            </p>
                        </div>

                        <p class="item__rating">
                            <span class="item__number">
                                67%
                            </span>
                        </p>

                        <p class="item__plays-count">
                            7,693 chơi
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
