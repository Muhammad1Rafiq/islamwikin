<div >
    @php
set_time_limit(50000000000);
        
    @endphp
<button wire:click='download'>download</button>
<button wire:click='save'>save</button>

{{-- @for ($i = 0; $i < sizeOf($word); $i++)
<span> {{$ayah[$word[$i]->ayah-1]->surah}} </span>
    <span> {{$ayah[$word[$i]->ayah-1]->ayah}} </span>
    <span> {{$ayah[$i]->surah}} </span>
    <span> {{$ayah[$i]->ayah}} </span>
    <span> {{$word[$i]->position}} </span>
    <span> {{$ayah[$word[$i]->ayah-1]->code}} </span>
<hr>
@endfor --}}


</div>