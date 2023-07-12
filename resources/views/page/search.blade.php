@extends('layouts.page')

@section('title')
<title>Gamekafe - Policy</title>
@endsection

@section('css')
<link rel="stylesheet" media="screen" href="{{ asset('css/page/search.css') }}" />
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
        <div class="advanced-search-options">
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
        </div>
    </div>
</div>
@endsection
