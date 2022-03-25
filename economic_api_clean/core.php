<!DOCTYPE html>
<html>
    <head>
        <title>API FTW</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Customers:</p>
        <form>
            <input type="text" id="apiSearch" name="apiSearch">
        </form>
        <pre id="output"></pre>
        <script>
            var textInput = "https://restapi.e-conomic.com/" + $('#apiSearch').val();
            $("#apiSearch").keyup(function(){
                console.log($('#apiSearch').val());
                var textInput = "https://restapi.e-conomic.com/" + $('#apiSearch').val();
            
                $.ajax({
                    url: textInput,
                    dataType: "json",
                    headers: { 
                        'X-AppSecretToken': "",
                        'X-AgreementGrantToken': "",
                        accept: "application/json"
                    },
                    type: "GET"
                })

                .always(function (data) {
                    $("#output").text(JSON.stringify(data, null, 4));
                }); 
            });
            
            $.ajax({
                url: textInput,
                dataType: "json",
                headers: { 
                    'X-AppSecretToken': "",
                    'X-AgreementGrantToken': "",
                    accept: "application/json"
                },
                type: "GET"
            })

            .always(function (data) {
                $("#output").text(JSON.stringify(data, null, 4));
            });    
        </script>
    </body>
</html>