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
                <a href="/" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">گەڕان</a>
                <a href="/welcome" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">بابەتەکان</a>
            </form>
        </div>
    </nav>

    <main class="m-3">
        <div style="border-radius: 8px" class="card bg-light mx-auto mt-4" id="hifzp">
            <div class="card-body p-3">
                <h2 style="border-bottom:1px solid rgb(80, 80, 80) ">لەبەرکردن</h2>
                <span>ئەم بەشە بۆ خزمەتی خزمەتکار و لەبەرکارانی وشەکانی خودای پەروەردگار ئامادە کراوە.<br>
                    ئەو بەشە دیاریکراوەی قورئانی پیرۆز کە دەتەوێت بە دەنگ گوێبیستی ببیت، لێرەوە ئامادەی بکە.</span>
                <span class="text-muted d-block">* تایبەت بە خوێندنەوەی ئیمامی حەفص لەڕێگەی شاطبیەوە.</span>
                <p class="mb-2 text-muted">* تەنها لە سورەتی پیرۆزی الفاتحة ئایەتی ژمارە یەک بسملة یە.</p>
                <br>
                <div class="container">
                    <div class="">
                        <div class="my-2">
                            <label style="width: 5rem">قورئان خوێن:</label>
                            <select wire:model.defer="reciterR"
                                class="form-select form-select-sm d-inline bg-light mb-1" style="width: auto">
                                @foreach ($reciters as $item)
                                <option value="{{$item->path}}">{{$item->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>لە</span>
                                <div class="">
                                    <label style="width: 3rem">سورەتی</label>
                                    <select wire:change='setTSurah' wire:model="fromSurah"
                                        class="form-select form-select-sm d-inline bg-light mb-1" style="width: 6pc">
                                        @foreach ($surahsFrom as $item)
                                        <option value="{{$item->id}}">{{$item->id . ' - ' .$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <label style="width: 3rem">ئایەتی</label>
                                    <select wire:model="fromAyah"
                                        class="form-select form-select-sm d-inline bg-light mb-1" style="width: 6pc"
                                        id="">
                                        @for ($i = 1; $i <= $ayahsFrom; $i++) <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col" style="border-right:1px solid rgb(95, 95, 95)">
                                <span>تاوەکوو</span>
                                <div class="">
                                    <label style="width: 3rem">سورەتی</label>
                                    <select wire:model="toSurah"
                                        class="form-select form-select-sm d-inline bg-light mb-1" style="width: 6pc">
                                        @foreach ($surahsTo as $item)
                                        <option value="{{$item->id}}">{{$item->id . ' - ' .$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label style="width: 3rem">ئایەتی</label>
                                    <select id="TooAAyah" class="form-select form-select-sm d-inline bg-light mb-1"
                                        style="width: 6pc">
                                        @for ($i = $toAyahStart; $i <= $ayahsTo; $i++) <option value="{{$i}}">{{$i}}
                                            </option>
                                            @endfor

                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="form-check col-10 my-1"
                            style="border-bottom: 1px solid #505050;padding-bottom: 0.5rem!important;"><br>
                            <input class="form-check-input" type="checkbox" wire:model='bsmla'
                                id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">هەبوونی بسملة ئەگەر نێوان دوو
                                سورەت بوو</label>
                        </div>
                        <div class="col-10 my-2"
                            style="border-bottom: 1px solid #505050;padding-bottom: 0.5rem!important;">
                            <div class="form-group">
                                <span class="control-label">ماوەی وەستان لەنێوان ئایەتەکاندا</span><span
                                    style="color: #076bdd"> *بە چرکە</span>
                                <div class='input-group ' style="width: 7rem">
                                    <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-secondary"
                                        onclick="decrease('#waitRange')">-</button>
                                    <input id="waitRange" class="form-control text-center" style="height: 27px"
                                        type="text" min="0" max="20" />
                                    <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-secondary"
                                        onclick="increase('#waitRange')">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <label style="width: 8rem">ژمارەی دووبارەکردنەوە</label>
                            <div class='input-group ' style="width: 7rem">
                                <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-secondary"
                                    onclick="decrease('#repeate')">-</button>
                                <input id="repeate" class="form-control text-center" style="height: 27px" type="text"
                                    value="1" min="1" max="40">
                                <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-secondary"
                                    onclick="increase('#repeate')">+</button>
                            </div>

                        </div>
                        <button onclick="aadbs()">check</button>
                    </div>
                </div>
            </div>
    </main>
    <script>
        var waitrange = $("#waitRange");
        $(document).ready(function () {
            var i = parseInt($("#waitRange").val());
            if(i>=0 && i<=40){}else{
                $("#waitRange").val(0);
            }
            Livewire.emit("wait",parseInt($("#waitRange").val()));
            var i = parseInt($("#repeate").val());
            if(i>=0 && i<=40){}else{
                $("#repeate").val(1);
            }
            Livewire.emit("repeate",parseInt($("#repeate").val()));
            
        });
        function aadbs(){
            Livewire.emit("senda",parseInt($("#TooAAyah").val()));
        }
    function increase(param){
        var i = parseInt($(param).val());
        if(i>=0 && i<=40){}else{
            $(param).val(1);
        }
        if(i<$(param).attr("max")){
            $(param).val(i+1);
        }
        Livewire.emit("wait",parseInt($("#waitRange").val()));
        Livewire.emit("repeate",parseInt($("#repeate").val()));
    }
    function decrease(param){
        var i = parseInt($(param).val());
        if(i>$(param).attr("min")){
            $(param).val(i-1)
        }
        Livewire.emit("wait",parseInt($("#waitRange").val()));
        Livewire.emit("repeate",parseInt($("#repeate").val()));

    }
    </script>
</div>