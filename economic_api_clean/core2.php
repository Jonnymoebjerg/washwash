<!DOCTYPE html>
<html>
    <head>
        <title>API FTW</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <h2>API Dankness</h2>
        <pre id="output"></pre>
        <hr>
        <pre id="outputFinal"></pre>
        <script>
            var apiCore = "https://restapi.e-conomic.com/";
            
            $.ajax({
                url: apiCore,
                dataType: "json",
                headers: {
                    'X-AppSecretToken': "",
                    'X-AgreementGrantToken': "",
                    accept: "application/json"
                },
                type: "GET"
            })

            .always(function (data) {
                $("#output").text(JSON.stringify(data.resources.stable, null, 4));
        
                $("#outputFinal").text(JSON.stringify(data, null, 4));
            });    
        </script>
    </body>
</html>