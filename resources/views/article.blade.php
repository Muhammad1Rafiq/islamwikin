<div>
    <title>ئیسلامـپەیک - {!!$post->title!!}</title>
    <meta name="title" content="گەڕان - ئیسلامـپەیک">
    <meta name="description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="گەڕان - ئیسلامـپەیک">
    <meta property="og:description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">
    <meta property="og:image"
        content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGaiFEtGxqDEuPJJa87vng5zW7dPxN1oAc3g&usqp=CAU">
    <div class="d-flex bd-highlight card-title border-bottom border-1 border-secondary">
        <div class="flex-fill bd-highlight">
            <h2 class="text-dark ">{!!$post->title!!}</h2>
        </div>
        <div class="flex-fill bd-highlight" dir="ltr">
            <select class="form-select d-inline bg-light mb-1" style="border-color: #0d6efd !important; width: 20%" id="fontselector"
                aria-label="Default select example">
                <option value="1">فۆنتی یەک</option>
                <option value="2">فۆنتی دوو</option>
                <option value="3">فۆنتی سێ</option>
                <option value="4">فۆنتی چوار</option>
                <option value="5">فۆنتی پێنج</option>
            </select>
            <button type="button" class="btn btn-outline-primary btn-sm text-dark my-auto" style="height: 38px;" id="inc">+</button>
            <button type="button" class="btn btn-outline-primary btn-sm text-dark my-auto" style="height: 38px;" id="dec">-</button>
        </div>

    </div>
    <h6 class="card-subtitle mb-2 text-muted text-dark">{!!$post->sm_disc!!}</h6>
    <div class="card-text text-dark" style="max-width: 100%" id="bodytext">

        {!!$post->content!!}
        
    </div>
</div>
