<div>
    {{-- <h1>{{$number }}</h1>
    <button class="btn btn-primary" wire:click="ninc">Increase</button> --}}

    <form wire:submit.prevent="addPost">
        <input type="text" class="form-control m-y w-25" wire:model.defer="title" placeholder="سەردێڕی بابەت">
        <input type="text" class="form-control m-y w-25" wire:model.defer="sm_disc"
            placeholder="کورتەیەکی کەم لەسەر بابەتەکە بنوسە">
        <select class="form-select w-25" wire:model.defer="type" id="">
            @foreach($types as $typeitem)
                <option value="{{ $typeitem->id }}">{{ $typeitem->type_name }}</option>
            @endforeach
        </select>
        <div wire:ignore>
            {{$content}}
            <textarea id="editor" wire:model="content" name="data"
            style="height: 200px !important; font-family: Rabar_033 !important">{!!$articles[2]->content!!}</textarea>
        </div>
        
        <button id="send">send</button>
    </form>
    <div id="toc">

    </div>

    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;
            })

            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error ');
                console.warn('Build id: m5b6f04hwt4i-9v1efa3f0pd7');
                console.error(error);
            });

        $(document).ready(function () {
            editor.model.document.on('change:data', function (e) {
                @this.set('content', editor.getData())
            });
        });

    </script>

</div>
