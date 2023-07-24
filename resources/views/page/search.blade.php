@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Tìm kiếm') }}</title>
@endsection

@section('css')
<link rel="stylesheet" media="screen" href="{{ asset('css/page/search.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="main">
        <div class="box search-container">
            <form id="items-search-form" class="search-form" action="{{ route('search') }}" accept-charset="UTF-8" method="get">
                <input type="text" name="q" id="q" value="{{ app('request')->input('q') }}" placeholder="Tìm kiếm trò chơi" class="form-control query fake-button" />
                <input type="hidden" name="category" id="category-search-input">
                <input type="hidden" name="tag" id="tag-search-input">
                <i class="y-icon y-icon--search y-icon--big"></i>
                <button class="search-btn" type="submit" aria-label="Search">
                    {{ __('Tìm kiếm') }}
                </button>
            </form>
            <div class="advanced-serach-options">
                <div class="title">{{ __('Tùy chọn tìm kiếm nâng cao') }}</div>
                <div class="column-container">
                    <div class="column">
                        <div class="gray-select category-select" id="category-search" onclick="dropDown('category-search')">
                            <div class="select-header" id="category-search-header">
                                <span class="icon all-categories" id="category-search-title"></span>
                                {{ __('Tất cả các thể loại') }}
                            </div>
                            <div class="select-options scroll">
                                <div class="select-options__wrapper scroll">
                                    <div class="gray-select__item active" id="category-all-categories" onclick="pickSelect(this.id)">
                                        <span class="icon all-categories"></span>
                                        <div class="select-item-title">{{ __('Tất cả các thể loại') }}</div>
                                    </div>
                                    @foreach($listCategory as $category)
                                    <div class="gray-select__item" id="category-{{ $category['name'] }}" onclick="pickSelect(this.id)">
                                        <span class="icon {{ $category['name'] }}"></span>
                                        <div class="select-item-title">{{ ucfirst($category['name']) }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="gray-select tag-select" id="tag-search">
                            <div class="select-header" id="tag-search-header" onclick="dropDown('tag-search')">{{ __('Tất cả các nhãn') }}</div>
                            <div class="select-options">
                                <div class="select-search">
                                    <input type="text" placeholder="Search" class="select-search-input" onkeyup="searchTags(this.value)" />
                                    <i class="y-icon y-icon--search"></i>
                                </div>
                                <div class="select-options__wrapper scroll" onclick="dropDown('tag-search')" id="selection-option-wrapper">
                                    <div class="gray-select__item active" id="tag-all-tags" onclick="pickSelect(this.id)">
                                        <div class="select-item-title">{{ __('Tất cả các nhãn') }}</div>
                                    </div>
                                    @foreach($listTag as $tag)
                                    <div class="gray-select__item" id="tag-{{ $tag }}" onclick="pickSelect(this.id)">
                                        <div class="select-item-title">{{ $tag }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box items-grid no-background">
            <div class="items-container" id="search_items_container">
                @foreach($games as $game)
                <div id="item_104800" class="item thumb videobox grid-column">
                    <a title="{{ __('Trò chơi') }} {{ $game['name'] }} - {{ __('Chơi trực tuyến tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('playGames', ['game' => strtolower(str_replace(' ', '-', $game['name']))]) }}">
                        <div class="item__thumbarea">
                            <div class="item__microthumb"></div>
                            <div class="item__img-container">
                                <img class="thumb playable" alt="{{ $game['name'] }} - {{ ucfirst($game['category']) }} - Gamekafe" src="{{ $game['thumbs'] }}">
                            </div>
                        </div>

                        <div class="item__infos">
                            <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                            <div class="item__technology">
                                <p class="{{ $game['category'] }}">
                                    {{ ucfirst($game['category']) }}
                                </p>
                            </div>
                            <p class="item__rating">
                                @if($game['rating'] > 50)
                                <span class="item__success">
                                    {{ $game['rating'] }}%
                                </span>
                                @else
                                <span class="item__fail">
                                    {{ $game['rating'] }}%
                                </span>
                                @endif
                            </p>
                            <p class="item__plays-count">
                                {{ $game['count_play'] }} {{ __('chơi') }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        let category = urlParams.get('category');
        let tag = urlParams.get('tag');
        if (category != null) {
            let id = 'category-' + category;
            let categoryInput = document.getElementById('category-search-input');
            categoryInput.value = category;
            pickSelect(id);
        }

        if (tag != null) {
            let id = 'tag-' + tag;
            let tagInput = document.getElementById('tag-search-input');
            tagInput.value = tag;
            pickSelect(id);
        }
    });

    function dropDown(id) {
        let element = document.getElementById(id);
        if (element.classList.contains('open')) {
            element.classList.remove("open");
        } else {
            element.classList.add("open");
        }
    }

    function pickSelect(id) {
        let element = document.getElementById(id);
        if (id.search('tag-') >= 0) {
            let content = id.slice(4);
            let value = content;
            let tagInput = document.getElementById('tag-search-input');
            let tagHeader = document.getElementById('tag-search-header');
            if (content == 'all-tags') {
                value = '';
                content = "{{ __('Tất cả các nhãn') }}";
            }
            tagInput.value = value;
            tagHeader.innerHTML = content;
        }

        if (id.search('category-') >= 0) {
            let content = id.slice(9);
            let value = content;
            let categoryInput = document.getElementById('category-search-input');
            let categoryTitle = document.getElementById('category-search-title');
            let categoryHeader = document.getElementById('category-search-header');
            let textContent = content.charAt(0).toUpperCase() + content.slice(1);
            if (content == 'all-categories') {
                textContent = "{{ __('Tất cả các nhãn') }}";
                value = '';
            }

            categoryHeader.innerHTML = "";
            categoryHeader.innerHTML = "<span class='icon " + content + "' id='category-search-title'></span>" + textContent;
            categoryInput.value = value;
            categoryTitle.className = "";
            categoryTitle.classList.add('icon');
            categoryTitle.classList.add(content);
        }
    }

    function searchTags(stringSearch) {
        if (stringSearch != '' || stringSearch != null) {
            let filter = stringSearch.toUpperCase();
            let arrChild = document.getElementById("selection-option-wrapper").childNodes;

            for (let i = 0; i < arrChild.length; i++) {
                if (i % 2 != 0) {
                    let txtValue = arrChild[i].textContent.trim();
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        arrChild[i].style.display = "";
                    } else {
                        arrChild[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>
@endsection
