$(document).ready(function() {
    $("#occupant").change(function() {
        $.ajax({
                url: '//',
                type: 'default GET (Other values: POST)',
                dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: { param1: 'value1' },
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    });
});
