<div>
    <title>Meta Tags — Preview, Edit and Generate</title>
    <meta name="title" content="گەڕان - ئیسلامـپەیک">
    <meta name="description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="گەڕان - ئیسلامـپەیک">
    <meta property="og:description" content="گەڕان ئەنجام بدە بۆ ئەو بابەتانەی لە ماڵپەڕ هەیە تایبەت بە ئایینی ئیسلام">

    <nav class="navbar navbar-light bg-light fixed-top " style="box-shadow: 5px 13px 20px -9px rgb(0 0 0 / 15%)">
        <div class="container-fluid">
            <a class="navbar-brand text-dark hideonmobile" href="/">ئیسلامــــــپیدیا</a>
            <a href="" class="text-dark  my-auto" style="font-size: 20px !important">سورەتی {{$surahs[0]->kuname}} / سورة  {{$surahs[0]->name}}</a>
            <form class="d-flex my-auto">
                
                <a href="/" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">گەڕان</a>
                <a href="/welcome" class="btn btn-outline-light text-dark btn-sm" style="border: 0px;">بابەتەکان</a>
            </form>
        </div>
    </nav>

    <main class="m-1" style="padding-top: 3.5rem;">
        <div class="container everyAyahParent">
            <div class="text-center ">
                @if ($surahs[0]->id != 1)
                <img class="togglebtn mx-auto text-center my-3" height="60" src="{{asset('/img/bismillah.png')}}" alt="">
                @endif
                <p class="text-muted">{{$surahs[0]->name}} - {{$surahs[0]->type}} - {{$surahs[0]->nAyah}} ئایەت</p>
                {{-- <span class="text-muted">گرتە لە هێمای ژمارەی ئایەت بکە بۆ بیستنی یەک ئایەت - </span>
                <span class="text-muted">گرتە لە یەک وشە بکە بۆ بیستنی یەک وشە</span> --}}

                <p></p>
            </div>
            <div>

                    @for ($i = 0; $i < sizeOf($ayahs); $i++) 
                    @php $nAyah = intval($ayahs[$i]->id); @endphp
                    @if (($start <= $i+1 && $end >= $i+1))                   
                        <div class="singleAyah m-1 p-2 position-relative" id="{{$i+1}}" style="border-bottom: 1px solid rgb(0 0 0 / 34%); padding-bottom: 1em !important;padding-top: 3rem !important">
                            
                        <div class="position-absolute top-0 end-0">
                            <button class="btn btn-outline-secondary btn-sm m-1" wire:click="playAyah('{{$nAyah}}')">بیستن لێرەوە <i class="bi bi-play-circle-fill my-auto"></i></button>
                       </div> 
                        @for ($j = 0; $j < DB::select("call getAyahCount($nAyah)")[0]->count; $j++)                                           
                            @php $name = str_pad($words[$step]->surah, 3, '0', STR_PAD_LEFT)."_".str_pad($words[$step]->ayah, 3, '0', STR_PAD_LEFT)."_".str_pad($words[$step]->position, 3, '0', STR_PAD_LEFT); @endphp
                            <span class="position-relative singleWord display-4 mb-3" wire:click="playWord({{$words[$step]->surah}},'{{$name}}')">{{$words[$step]->content}}</span>
                            @php $step++; @endphp
                        @endfor
                       <span class="endOfAyah display-4" title="بیستنی ئایەت" wire:click="playAyah('{{$nAyah}}')" style="font-family: Uthmani_Hafs">{{str_replace($english, $persian, $i+1);}}</span>
                       <p class="m-2 mt-4 tafsir" style="font-family: Rabar_033;font-size: 24px;">{{$ayahs[$i]->$tafsir}}</p>
                       
                       </div><br>                           
                       @else
                            @php $step+= DB::select("call getAyahCount($nAyah)")[0]->count; @endphp
                       @endif
                    @endfor
                                   
            </div>
        </div>
        <div class="fixed-bottom bottom-0 end-0 text-center" style="height: 3rem;width: 3rem;top: 80%;border-radius: 20px">
           <button style="width: 80%;height: 80%;border-radius: 20px;background-color: #a7924da6;border: 0px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#settingModal"><i class="bi bi-gear-wide-connected"></i></button>
        </div>
    </main>
    <script>
            $(document).ready(function () {
                var lfonts = localStorage.getItem("tafsirsize");
                lfonts = parseInt(lfonts, 10);
                $(".tafsir").css("font-size", lfonts)
                Livewire.on('runAudio', (i) => {
                     var audio = new Audio(i);
                     audio.play();
                    //  Livewire.emit("deleteFile",i);
                });
                Livewire.on('closeModal', (i) => {
                    $("#settingModal").modal("hide");
                });
                window.onscroll = function(ev) {
                   if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                        Livewire.emit("loadMore");
                    // alert();
                   }
                };
            });
            function incTafsir(){
                var osize = $(".tafsir").css("font-size");
                osize = parseInt(osize, 10);
                osize += 1;
                //alert(osize)
                $(".tafsir").css("font-size", osize)
                localStorage.setItem("tafsirsize", osize);
            }
            function decTafsir(){
                var osize = $(".tafsir").css("font-size");
                osize = parseInt(osize, 10);
                osize -= 1;
                //alert(osize)
                $(".tafsir").css("font-size", osize)
                localStorage.setItem("tafsirsize", osize);
            }
    </script>

<div class="modal fade" id="settingModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-light">
        <div class="modal-body">
            <h3 class="text-light">ڕێکخستنەکان</h3><br>

         <table>
                         <tr>
                <td>قەبارەی فۆنت</td>
                <td>
                    <div class='text-center' style="width: 12rem">
                        <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-secondary"
                            onclick="decTafsir()">-</button>
                        <button type="button" style="height: 27px;padding-top: 1;" class="btn btn-info"
                            onclick="incTafsir()">+</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>دۆخی تاریک</td>
                <td>
                    <div class="col-md-auto form-switch my-1 mx-auto">
                        <input type="checkbox" class="form-check-input darkSwitch" id="darkSwitch" />
                    </div>
                </td>
            </tr>
         </table>
              
                        
        </div>
        <div class="modal-footer position-relative" style="height: 9rem">
            <form wire:submit.prevent="saveSetting">
            <table class="position-absolute top-0 start-0 mx-3 mt-2" style="" >
                <tr>
                    <td>بەدەنگی</td>
                    <td>
                       <select class="form-select-sm d-inline bg-light mb-1" style="width: 16pc" wire:model.defer='reciterR' id="inputGroupSelect01">
                           @foreach ($reciter as $item)
                               <option value="{{$item->path}}">{{$item->name}}</option>
                           @endforeach
                         </select>
                    </td>
                </tr>
                 <tr>
                     <td>تەفسیر</td>
                     <td>
                        <select class="form-select-sm d-inline bg-light mb-1" style="width: 16pc" wire:model.defer='tafsir' id="inputGroupSelect01">
                            <option value="asan" selected>تەفسیری ئاسان(بورهان محمد امین)</option>
                            <option value="bamok">پوختەی تەفسیری قورئان(محمد ملاصالح بامۆکی)</option>
                          </select>
                     </td>
                 </tr>
            </table>
            {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">پاشەکەوتکردن</button> --}}
            <button type="submit" class=" bottom-0 start-0 btn btn-outline-primary" style="margin-bottom: -4.5rem;">پاشەکەوتکردن</button>
        </form>
          </div>
      </div>
    </div>
  </div>

</div>