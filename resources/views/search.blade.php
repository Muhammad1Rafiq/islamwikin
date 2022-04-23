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
            <a class="navbar-brand text-dark">ئیسلامــــــپیدیا</a>
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
            <form action="" class="">
                <span><img class="m-auto" src="img/img.png" alt="" style="display:block; height:7rem !important;"
                        srcset=""></span>
                <input type="text" wire:model.debounce.700ms="search"
                    class="form-control text-dark shadow p-3 mb-5 bg-body rounded mx-auto m-4 w-50"
                    style="border-radius: 5px !important; color:white !important" id="search" placeholder="گەڕان ئەنجام بدە">
            </form>
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
</div>