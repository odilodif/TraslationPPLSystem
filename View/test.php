
<style>
body {
    font-family: Helvetica, Sans, Arial;
}
p, ul {
    padding: 10px;
}
ul {
    margin: 5px;
    border: 2px dashed #999;
}

</style>
<script>
$('#lnkSuccess').click(function (e) {
    e.preventDefault();
    getSuccessOutput();
});

$('#lnkError').click(function (e) {
    e.preventDefault();
    getFailOutput();
});

// On click, get the ajax success output
function getSuccessOutput() {
    $.ajax({
        url: './Controller/UserController.php',
        complete: function (response) {
            console.log(response);
            $('#post').html(response.responseText);
        },
        error: function (jqXHR, exception) {
            getErrorMessage(jqXHR, exception);
        },
    });
}

// On click, get the ajax error output
function getFailOutput() {
    $.ajax({
        url: './Controller/UserController.php',
        success: function (response) {
            $('#post').html(response.responseText);
        },
        error: function (jqXHR, exception) {
            console.log(jqXHR);
            getErrorMessage(jqXHR, exception);
        },
    });
}

// This function is used to get error message for all ajax calls
function getErrorMessage(jqXHR, exception) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
    $('#post').html(msg);
}

</script>




<a href="#" id="lnkSuccess"> Test Ajax Success </a> |
<a href="#" id="lnkError"> Test Ajax  Error</a>

<br/>
<br/>
<br/>
<div class='wrapper'>
    <ul id='post'>Please make an ajax call by clicking above...</ul>
</div>


