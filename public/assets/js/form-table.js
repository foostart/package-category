$(document).ready(function () {

    //TODO: unknow
    setTimeout(function () {
        $('.flash-message').fadeOut('fast');
    }, 30000);

    //hide button delete
    $('.btn-delete-all').hide();

    $('#selecctall').click(function (event) {

        if (this.checked) {
            //checked all checkbox
            $('.box-item input').each(function () {
                $(this).prop('checked', true);
            });

            //show button delete
            $('.btn-delete-all').show();

        } else {

            //un-checked all checkbox
            $('.box-item input').each(function () {
                $(this).prop('checked', false);
            });

            //hide button delete
            $('.btn-delete-all').hide();
        }

    });

    //counter checked
    function counterChecked() {
        $counter = 0;
        $('.box-item input').each(function () {
            if (this.checked) {
                $counter++;
            }
        });
        return $counter;
    }

    $('.box-item input').each(function () {

        $(this).click(function () {
            if (this.checked) {
                //show button delete
                $('.btn-delete-all').show();
            } else {
                $counter = counterChecked();
                if ($counter == 0) {
                    $('.btn-delete-all').hide();
                } else {
                    //show button delete
                    $('.btn-delete-all').show();
                }
            }
        });
    });
});
