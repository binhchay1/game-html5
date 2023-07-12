@extends('layouts.page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/page.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
<div class="css-1iuj5ih">
    <div class="d-flex">
        <div class="MuiBox-root css-1rpjij0">
            <h1 style="margin-right:16px">{{ strtoupper($category) }}</h1>
            <div style="display:flex;flex-wrap:wrap">
                <div class="css-obv89a">Challenge a friend in our two player games! Our 2-player games include fierce sports games such as Basketball Stars and calm board games, as well as everything in between.</div>
            </div>
        </div>
        <div class="MuiBox-root css-ohxupm">
            <button aria-expanded="false" aria-haspopup="listbox" class="MuiSelect-root css-18csbgg" type="button">Top games
                <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true" class="IconExpandSelect css-6qu7l6">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.6699 7.25758C22.08 7.62758 22.1124 8.25991 21.7424 8.66994L14.2424 16.9814C13.0169 18.3395 10.9831 18.3395 9.75757 16.9814L2.25757 8.66994C1.88757 8.25991 1.92002 7.62758 2.33005 7.25758C2.74008 6.88759 3.37241 6.92004 3.74241 7.33006L11.2424 15.6415C11.6737 16.1195 12.3263 16.1195 12.7576 15.6415L20.2576 7.33006C20.6276 6.92004 21.2599 6.88759 21.6699 7.25758Z"></path>
                </svg>
                <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true" class="IconCollapseSelect css-6qu7l6">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33007 16.7424C1.92005 16.3724 1.88759 15.7401 2.25759 15.3301L9.75759 7.0186C10.9831 5.66046 13.0169 5.66047 14.2424 7.01861L21.7424 15.3301C22.1124 15.7401 22.08 16.3724 21.6699 16.7424C21.2599 17.1124 20.6276 17.08 20.2576 16.6699L12.7576 8.35848C12.3263 7.88051 11.6737 7.88051 11.2424 8.35848L3.74243 16.6699C3.37243 17.08 2.7401 17.1124 2.33007 16.7424Z"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($gameByCategory as $game)
        <div class="col-2 m-2">
            <a class="css-1fanuwr" href="{{ $game['link'] }}">
                <div class="gameThumbTitleContainer">{{ $game['name'] }}</div><img class="GameThumbImage" loading="lazy" src="{{ $game['thumbs'] }}" width="150">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
