$(document).ready(function () {
    tinymce.PluginManager.add('stylebuttons', function (editor, url) {
        ['pre', 'p', 'code', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'].forEach(function (name) {
            editor.addButton("style-" + name, {
                tooltip: "Toggle " + name,
                text: name.toUpperCase(),
                onClick: function () {
                    editor.execCommand('mceToggleFormat', false, name);
                },
                onPostRender: function () {
                    var self = this, setup = function () {
                        editor.formatter.formatChanged(name, function (state) {
                            self.active(state);
                        });
                    };
                    editor.formatter ? setup() : editor.on('init', setup);
                }
            })
        });
    });
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern",
            "stylebuttons"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | style-p style-h1 style-h2 style-h3 style-pre style-code anchor",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'package-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        },
        templates: [
            {title: 'Some title 1', description: 'Some desc 1', content: 'My content'},
            {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
        ],
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Responsive', value: 'img-responsive'},
        ]
    };

    tinymce.init(editor_config);
});
