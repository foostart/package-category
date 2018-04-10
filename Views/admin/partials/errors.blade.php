<!--
| @TITLE
| List of errors
|
|-------------------------------------------------------------------------------
| @REQUIRED
| Array errors
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
| Show list of errors
|_______________________________________________________________________________
-->

<!-- LIST OF ERRORS  -->
@if($errors->all())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
    </button>

    <strong>
        <i class="fa fa-bug" aria-hidden="true"></i>
        {!! trans('foo-admin.has-errors') !!}
    </strong>

    <hr class="message-inner-separator">

    <ol class='list-errors'>

        @foreach($errors->all() as $error)
            <li>
                {!! $error !!}
            </li>
        @endforeach

    </ol>
</div>
@endif
<!-- /END LIST OF ERRORS -->