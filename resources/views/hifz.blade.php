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
        <div style="border-radius: 8px;box-shadow: 0px 0px 8px 0px #888888" class="card bg-light mx-auto mt-4" id="hifzp">
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
                                        @for ($i = 1; $i <= $ayahsFrom; $i++) 
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col" style="border-right:1px solid rgb(95, 95, 95)">
                                <span>تاوەکوو</span>
                                <div class="">
                                    <label style="width: 3rem">سورەتی</label>
                                    <select wire:change='fromSChanges' wire:model.defer="toSurah"
                                        class="form-select form-select-sm d-inline bg-light mb-1" style="width: 6pc">
                                        @foreach ($surahsTo as $item)
                                        <option value="{{$item->id}}">{{$item->id . ' - ' .$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label style="width: 3rem">ئایەتی</label>
                                    <select wire:model="toAyah" class="form-select form-select-sm d-inline bg-light mb-1"
                                        style="width: 6pc" >
                                        @for ($i = $toAyahStart; $i <= $ayahsTo; $i++) 
                                           <option value="{{$i}}">{{$i}}</option>
                                        @endfor

                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="mt-3">
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

                        <div class="form-check col-10 mb-1"
                            style="padding-bottom: 0.5rem!important;"><br>
                            <input disabled class="form-check-input" type="checkbox" wire:model='bsmla'
                                id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">هەبوونی بسملة ئەگەر نێوان دوو
                                سورەت بوو</label>
                        </div>

                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                <button id="check" class="btn btn-outline-info m-2" wire:click='check'>ئامادەکردن</button>
                </div>
            </div>
        </div>
    </main>

      <div class="modal fade" id="resultModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-light">
            <div class="modal-body">
                <h3 style="color: #198754 !important;">داواکارییەکەت ئامادەکرا!</h3>
                <ul id="resultResponce" style="font-size: 20px">
                    <li><span class="text-muted">ژمارەی ئایەتەکان: </span>
                        <span id="res00" style="color: #ffc107"></span></li>
                    <li><span class="text-muted">لە سورەتی </span>
                        <span id="res01" style="color: #fd7e14;"></span>
                        <span class="text-muted"> ئایەتی: </span>
                        <span id="res02" style="color: #fd7e14"></span></li>
                    <li><span class="text-muted">دەق: </span>
                        <span id="res03" style="font-family: Amiri_Quran_ColoredWeb;font-size: 105%"></span></li>
                    <li><span class="text-muted">تا سورەتی </span>
                        <span id="res04" style="color: #fd7e14"></span>
                        <span class="text-muted"> ئایەتی: </span>
                        <span id="res05" style="color: #fd7e14"></span></li>
                    <li><span class="text-muted">دەق: </span>
                        <span id="res06" style="font-family: 'Amiri_Quran_ColoredWeb';font-size: 105%"></span></li>
                    <li><span class="text-muted">بە دەنگی: </span>
                        <span id="res07"></span></li>
                    <li><span class="text-muted">دووبارەکردنەوە: </span>
                        <span id="res08"></span></li>
                        <li><span class="text-muted">بینینی ئایەتەکان: </span>
                            <a class="btn btn-outline-secondary btn-sm" id="res09" href="" target="_blank">بینین</a></li>
                </ul>
                            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">پاشگەزبوونەوە</button>
              <button type="button" wire:click='downloadAudio' class="btn btn-outline-primary">داگرتن <i class="bi bi-box-arrow-in-down"></i></button>
            </div>
          </div>
        </div>
      </div>

    <script>
        
        $(document).ready(function () {
            var presentbtn = $("#presentHifz");
            var undobtn = $("#undoHifz");
            var downloadbtn = $("#downloadHifz");
            
            var i = parseInt($("#repeate").val());
            if(i>=0 && i<=40){}else{
                $("#repeate").val(1);
            }
            Livewire.emit("repeate",parseInt($("#repeate").val()));
            
            Livewire.on('aadb', (i) => {
                if(i!=null){
                    $("#res00").html(i[0]); //count
                    $("#res01").html(i[1]); //from surah
                    $("#res02").html(i[2]); //from ayah
                    $("#res03").html(i[3]); //from content
                    $("#res04").html(i[4]); //to surah
                    $("#res05").html(i[5]); //to ayah
                    $("#res06").html(i[6]); //to content
                    $("#res07").html(i[7]); //reciter
                    $("#res08").html(i[8]+" جار"); //repeat
                    $("#res09").attr("href", "/quran/"+i[9]+"?s="+i[2]+"&e="+i[5]); //quran
                    $("#resultModal").modal("show");
                }
            })
        });
        
    function increase(param){
        var i = parseInt($(param).val());
        if(i>=0 && i<=40){}else{
            $(param).val(1);
        }
        if(i<$(param).attr("max")){
            $(param).val(i+1);
        }
        Livewire.emit("repeate",parseInt($("#repeate").val()));
    }
    function decrease(param){
        var i = parseInt($(param).val());
        if(i>$(param).attr("min")){
            $(param).val(i-1)
        }
        Livewire.emit("repeate",parseInt($("#repeate").val()));

    }
    </script>
</div>