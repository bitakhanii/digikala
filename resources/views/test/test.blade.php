@component('layouts.content')

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <div id="editor"></div>

    <script>
        CKEDITOR.replace('editor', {

            language: 'fa',

            filebrowserUploadUrl: '{{ route("editor-upload", ["_token" => csrf_token()]) }}',

            filebrowserUploadMethod: 'form'

        })
    </script>


@endcomponent

