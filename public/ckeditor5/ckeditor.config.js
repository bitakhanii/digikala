CKEDITOR.editorConfig = function( config ) {
    config.filebrowserUploadUrl = '/images'; // آدرس آپلود فایل
    config.filebrowserUploadMethod = 'xhr';
};
import { SimpleUploadAdapter } from '@ckeditor/ckeditor5-upload';

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        plugins: [ SimpleUploadAdapter, /* ... */ ],
        toolbar: [ /* ... */ ],
        simpleUpload: {
            // Feature configuration.
        }
    } )
    .then( /* ... */ )
    .catch( /* ... */ );
