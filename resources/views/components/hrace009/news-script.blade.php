<script>
    tinymce.init({
        @if( request()->routeIs('news.create') || request()->routeIs('news.edit') )
        selector: 'textarea.content',
        @endif

            @if( request()->routeIs('article.create') || request()->routeIs('article.edit') )
        selector: 'textarea.content',
        @endif

            @if( request()->routeIs('shop.create') || request()->routeIs('shop.edit')  )
        selector: 'textarea.description',
        @endif
        relative_urls: false,
        remove_script_host: false,
        document_base_url: '{{ config('app.url') }}',
        height: 300,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

        image_title: true,
        automatic_uploads: true,
        @if( request()->routeIs('news.create') || request()->routeIs('news.edit')  )
        images_upload_url: '{{ route('admin.news.upload') }}',
        @endif
            @if( request()->routeIs('shop.create') || request()->routeIs('shop.edit')  )
        images_upload_url: '{{ route('admin.shop.upload') }}',
        @endif
            @if( request()->routeIs('article.create') || request()->routeIs('article.edit')  )
        images_upload_url: '{{ route('gm.article.upload') }}',
        @endif
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {title: file.name});
                };
            };
            input.click();
        }
    });
</script>
