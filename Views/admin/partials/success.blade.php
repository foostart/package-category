<!--
| @TITLE
| Message
|
|-------------------------------------------------------------------------------
| @REQUIRED
| String message
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
| Show message
|_______________________________________________________________________________
-->

<!-- MESSAGE  -->
@if($message)
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <span class="glyphicon glyphicon-ok"></span>
        <strong>Success Message</strong>
        <hr class="message-inner-separator">
        <p>{!! $message !!}</p>
    </div>
@endif
<!-- /END MESSAGE -->