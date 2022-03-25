<!DOCTYPE html>
<html>
    <head>
        <title>Customer Array API</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>Customers:</p>
        <pre id="output"></pre>
        <script>
            var AppSecretToken = "";
            var AgreementGrantToken = "";
            
            var customerGroups = ["https://restapi.e-conomic.com/customer-groups/2/customers","https://restapi.e-conomic.com/customer-groups/5/customers"];
                
            function getUsers(array) {
                var i = 0;
                var arrayLength = array.length;
                for (; i < arrayLength;) {
                    $.ajax({
                        url: array[i],
                        dataType: "json",
                        headers: {
                            'X-AppSecretToken': AppSecretToken,
                            'X-AgreementGrantToken': AgreementGrantToken,
                            accept: "application/json"
                        },
                        type: "GET"
                    })
            
                    .always(function (data) {
                        var i = 0;
                        var print = "";
                        print += "<h2>Result:</h2>";
                        for (; i < data.pagination.results;) {
                            print += data.collection[i].customerNumber + "<br>";
                            print += data.collection[i].email + "<br>";
                            print += data.collection[i].name + "<br>";
                            print += data.collection[i].zip + "<br>";
                            print += data.collection[i].telephoneAndFaxNumber + "<br><hr><br>";
                            i++;
                        }

                        document.getElementById("output").innerHTML += print;
                    });
                    i++;
                }
            };
            getUsers(customerGroups);
        </script>
    </body>
</html>