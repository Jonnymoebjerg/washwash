<!DOCTYPE html>
<html>
    <head>
        <title>Core API</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <p>API:</p>
        <pre id="output"></pre>
        
        <script>
            function getCustomers() {
                var i = 0;
                var iMax = 1200;
                document.getElementById("output").innerHTML += "<pre>";
                for (; i < iMax;i++) {
                    $.ajax({ 
                        url: "https://restapi.e-conomic.com/customers/" + i,  
                        dataType: "json",
                        headers: { 
                            'X-AppSecretToken': "sjbFBu2rZteRfCBGhx1Z7f9yChxtfKXD1atT8G444h81",
                            'X-AgreementGrantToken': "1yTOvrwWJ3cZrlFBqnB8HldxXlqH8bNLROnUWTg36mE1",
                            accept: "application/json"
                        },
                        type: "GET"
                    })
                    
                    .always(function (data) {
                        var result = data.customerNumber;
                
                        if (typeof result === "undefined") {
                            /*
                            document.getElementById("output").innerHTML += ("");
                            */
                        } else {
                            /*
                            document.getElementById("output").innerHTML += ("<br><br><hr><br><br><tr><td>" + data.customerNumber + " | " + data.currency + " | " + data.paymentTerms.paymentTermsNumber + " | " + data.customerGroup.customerGroupNumber + " | " + data.address + " | " + data.balance + " | " + data.dueAmount + " | " + data.city + " | " + data.country + " | " + data.email + " | " + data.name + " | " + data.zip + " | " + data.telephoneAndFaxNumber + " | " + data.vatZone.vatZoneNumber);
                            */
                            $.ajax({
                                type: "POST",
                                url: "php/setCustomer.php",
                                datatype: "text",
                                data: {customerNumber: data.customerNumber, currency:data.currency, paymentTermsNumber:data.paymentTerms.paymentTermsNumber, customerGroup:data.customerGroup.customerGroupNumber, address:data.address, balance:data.balance, dueAmount:data.dueAmount, city:data.city, country:data.country, email:data.email, name:data.name, zip:data.zip, telephoneAndFaxNumber:data.telephoneAndFaxNumber, vatZone:data.vatZone.vatZoneNumber},
                                success: function (result) {
                                    document.getElementById("output").innerHTML += result;
                                    console.log("Customer inserted, Jonny rules all the code!");
                                }
                            });
                        }
                    });
                }
                document.getElementById("output").innerHTML += ("</pre>");
            };
            getCustomers();
            
        </script>
    </body>
</html>