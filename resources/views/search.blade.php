<div>
    <title>Meta Tags — Preview, Edit and Generate</title>
    <meta name="title" content="گەڕان - ئیسلامـپەیک">
    <meta name="description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="گەڕان - ئیسلامـپەیک">
    <meta property="og:description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">
    <meta property="og:image"
        content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGaiFEtGxqDEuPJJa87vng5zW7dPxN1oAc3g&usqp=CAU">

    <nav class="navbar navbar-light bg-light" style="box-shadow: 5px 13px 20px -9px rgb(0 0 0 / 15%)">
        <div class="container-fluid">
            <a href="/" class="navbar-brand text-dark onoverc">ئیسلامــــــپیدیا</a>
            <form class="d-flex my-auto">
                <div class="col-md-auto form-switch my-1">
                    <input type="checkbox" class="form-check-input darkSwitch" id="darkSwitch" />
                </div>
                <a href="/hifz" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">لەبەرکردن</a>
                <a href="/welcome" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">بابەتەکان</a>
            </form>
        </div>
    </nav>
    <main>
        <div class="container searchContainer">
            <div class="d-flex flex-wrap">
                @foreach ($surahs as $surah)
                <a class="quran onoverc text-dark" href="/quran/{{$surah->id}}">
                    {{-- <div class=" mt-1 ">
                        <i class="bi bi-diamond fs-1">{{$surah->id}}</i>
                        <span class="position-relative  bg-secondary" style=""></span>
                    </div> --}}
                    <span class="position-absolute" style="display:inline">
                        
                        <i class="position-absolute bi bi-diamond fs-1"></i>
                        <div class="text-center" style="width: 1.2em; margin-right: 0.7em; margin-top: 0.5em">
                            <span >{{$surah->id}}</span>
                        </div>
                        
                    </span>


                    <div style="padding: 0.5em 3em 0.5em 0px">
                        <span>{{$surah->name}}</span>
                    </div>

                </a>
                @endforeach

            </div>


            {{-- @foreach($articles as $item)
            <div class="shadow-sm bg-light mx-auto my-2 w-50 p-2" id="searchResult" style="border-radius: 6px;">
                <div class="d-flex position-relative">
                    <div>
                        <h5 class="mt-0"><a style="text-decoration: none;" href="">{!!$item->title!!}</a></h5>
                        <h6 class="card-subtitle text-dark">{!!$item->sm_disc!!}</h6>
                        <p class="text-muted">{!!substr(strip_tags($item->content),0,130);!!}...</p>
                        <a href="/article/{!!$item->id!!}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach --}}

    </main>
    <style type="text/css">
        .quran {
            border: solid 0.1em rgb(68, 68, 68);
            border-radius: 0.3em;
            width: 30%;
            margin: 1em;
            padding: 0.2em;
        }

        .quran:hover {
            border: solid 0.1em rgb(6, 94, 194);

        }

        [data-theme="dark"] .quran:hover {
            border: solid 0.1em rgb(6, 94, 194);

        }

        [data-theme="dark"] .quran {
            border: solid 0.1em rgb(145, 145, 145) !important;

        }
    </style>
</div>