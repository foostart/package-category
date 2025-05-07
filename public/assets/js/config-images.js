(function ($) {

    $.fn.task_image = function () {

        //reset event
        $('.delete').unbind();
        $('.down').unbind();
        $('.up').unbind();
        $('.edit').unbind();
        $('.view').unbind();
        var thumbnail = $('#thumbnail').val();

        $('.showfile .del').click(function () {
            $('.showfile .fa').removeClass('fa-file-excel-o');
            $('.showfile .fa').addClass('fa-file-image-o');
            $('.showfile .fa').css({'color': '#31708f', 'font-size': 135});
            $('.showfile .undo').show();
            $('.showfile .filename').hide();
            $('#thumbnail').val('');
            $('#holder').attr('src', '');
            $(this).hide();
        });

        $('.showfile .undo').click(function () {
            $('.showfile .fa').removeClass('fa-file-image-o');

            $(this).hide();
            $('#thumbnail').val(thumbnail);
            $('#holder').attr('src', thumbnail);
            $('.showfile .del').show();
        });


        $(".delete").click(function () {
            if (confirm('Bạn muốn xóa mục này?')) {
                $(this).parents('.item_image').remove();
            }
        });


        $(".down").click(function () {
            var $parent = $(this).parents(".item_image");
            $parent.insertAfter($parent.next());
        });

        $(".up").click(function () {
            var $parent = $(this).parents(".item_image");
            $parent.insertBefore($parent.prev());
        });

        $(".edit").click(function () {

            $(this).parents('.item_image').find('.view-read').hide();
            $(this).parents('.item_image').find('.view-write').show();

        });
        $(".view").click(function () {

            $(this).parents('.item_image').find('.view-read').show();
            $(this).parents('.item_image').find('.view-write').hide();

        });
    }

})(jQuery);
