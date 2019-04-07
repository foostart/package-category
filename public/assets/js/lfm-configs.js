/**
 * Upload processing
 * one image for avatar
 * multiple images for slideshow
 * multiple files for attachment
 */
$(document).ready(function () {
    
    (function ($) {

        $.fn.filemanager = function (type, options) {
            
            //set type of file for file manager
            type = type || 'image';
            var _type = type;
            if (type === 'image' || type === 'images') {
                _type = 'Images';
            } else {
                _type = 'Files';
            }

            this.on('click', function (e) {
                
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                localStorage.setItem('target_input', $(this).data('input'));
                localStorage.setItem('target_preview', $(this).data('preview'));
                localStorage.setItem('target_dir', $(this).data('dir'));
                localStorage.setItem('type', type);
                localStorage.setItem('grid-view', $(this).data('grid-view'));
                window.open(route_prefix + '?type=' + _type, 'FileManager', 'width=900,height=600');
                return false;
            });
        }
        if ($('#lfm-image').length) {
            $('#lfm-image').filemanager('image');
        }
        if ($('#lfm-images').length) {
            $('#lfm-images').filemanager('images');
        }
        
    })(jQuery);
    
});//end upload processing

/**
 * Remove/Undo processing
 */
$(document).ready(function () {
    (function ($) {

        $.fn.filecontrol = function (image, event) {
            //set image url
            if (image && image.url) {
               $(this).data('image-url', image.url);
            }
            //set image dir
            if (image && image.dir) {
               $(this).data('image-dir', image.dir);
            }
            //hide in case empty image
            if (!$(this).data('image-dir')) {
                $(this).hide();
            }else {
                $(this).show();
                if (event === 'click') {
                    
                    this.on('click', function (e) {

                        if ($(this).data('on') === 'remove') {
                            //set status to 'undo'
                            $(this).data('on', 'undo');
                            //set text to 'undo'
                            $(this).html($(this).data('label-undo'));
                            //change thumbnail to empty
                            $('#' + $(this).data('preview')).attr('src',$(this).data('image-empty'));
                            //set empty value to input
                            $('#' + $(this).data('input')).val('');
                            
                        }else {

                            //set status to 'remove'
                            $(this).data('on', 'remove');
                            //set text to 'remove'
                            $(this).html($(this).data('label-remove'));
                            //change thumbnail to image
                            $('#' + $(this).data('preview')).attr('src',$(this).data('image-url'));
                            //set image dir value to input
                            $('#' + $(this).data('input')).val($(this).data('image-dir'));
                           
                        }
                        return false;
                        
                    });
                }
            }
            return false;
        };
        
        //button control thumbnail
        if ($('#lfm-remove').length) {
            $('#lfm-remove').filecontrol(false,'click');
        };
        
    })(jQuery);
});//end remove/undo processing

$(document).ready(function () {
    (function ($) {
        $('.list-group-item .delete-item').click(function() {
            $(this).parent().remove();
            return false;
        });
    })(jQuery);
});//end remove/undo processing

/**
 * Set page after uploading
 * @param {STRING} url
 * @param {STRING} file_path
 * @returns page after uploading
 */
function SetUrl(url, file_path) {
    
    //get type of file that uploaded
    var type = localStorage.getItem('type');
    var ul = localStorage.getItem('grid-view');
    
    switch (type) {
        //files
        case 'file':
        case 'files':
            //create new item list
            if (!ul) {
                ul = 'list-uploaded-files ul';
            }
            
            var item = $('.'+ul).find('.item-template').clone(true).removeClass('item-template');
            //add file name
            item.find('.file-item').html('<a href="'+ url +'">' + file_path + '</a>');
            //add input value
            item.find('input').val(file_path);
            //append to last item
            item.appendTo($('.'+ul));
            
            break;
        //multiple images
        case 'images':
            //create new item list
            var ul = $('.list-uploaded-images ul');
            var item = ul.find('.item-template').clone(true).removeClass('item-template');
            //add image src
            item.find('img').attr('src', url);
            //add input value
            item.find('input').val(file_path);
            //append to last item
            item.appendTo(ul);
            break;
        //image
        case 'image':
            //set the value of the desired input to image url
            var target_input = $('#' + localStorage.getItem('target_input'));
            target_input.val(file_path);

            //set to control
            var lfm_control = target_input.data('control');
            var image = {
                dir: file_path,
                url: url
            };
            $('#' + lfm_control).unbind('click');
            $('#' + lfm_control).filecontrol(image, 'click');

            //set or change the preview image src
            var target_preview = $('#' + localStorage.getItem('target_preview'));
            target_preview.attr('src', url);

            //set or change the preview image src
            var target_dir = $('#' + localStorage.getItem('target_dir'));
            target_dir.val(url);

            if ($('.add-image').parent().find('#show').attr('src') != undefined) {
                $('.add-image').show();
            }
            break;
        case 'images':
            break;
    }
    
}