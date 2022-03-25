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
            function getProducts() {
                var productNumbers = ['505305', '100PET', '100PETL', '200PET', '200PETL', '300PET', '300PETL', '300PETLH', '50PET', '50PETL', '711bag10', '711bag11', '711bag12', '711bag13', '711bag14', '711bag15', '711RNP10', 'ABB11', 'ABB23', 'ABO', 'ABR6', 'Afbag15-Farmers', 'AHS2', 'APD29', 'APD34', 'APD41', 'APDREC16', 'APE19', 'APE2C26', 'APE9', 'APH180', 'APH240', 'APH41', 'APH712', 'APH77', 'APK24', 'APKF15', 'APKF18', 'APKF24', 'APO13', 'APO25', 'APR114', 'APR12', 'APR14D', 'APR18', 'APR200', 'APR24', 'APR250', 'APR3C', 'APRD13', 'APRD15', 'APRD20', 'APRD25', 'APREC', 'APREC15', 'APREC22', 'APREC2C', 'APRECD', 'APRECF', 'APRECF17', 'APRECF200', 'APRF20', 'APRF25', 'APRH16', 'APS130', 'aps150', 'APS160D', 'APS170', 'APS240', 'aps250', 'APS2C', 'APS5C', 'APS7C', 'APSD130', 'APSDL16', 'APT25', 'ATRAY', 'ATW', 'bag10', 'bag11', 'bag11-d', 'BAG11-K', 'bag12', 'bag13', 'bag14', 'bag15', 'BCCF140', 'BCCF140H', 'BCCF140L', 'BCCF170', 'BCCF170H', 'BCCF170L', 'BCHF1000', 'BCHF1000L', 'BCHF1250', 'BCHF1250L', 'BCHF400', 'BCHF600', 'BCHF600L', 'BCHF800', 'BLPI1', 'BLPPD', 'BLPU1', 'BLTime', 'BS105', 'CB14', 'CB15', 'CB23', 'CB2314', 'CC45', 'CC65', 'CC95', 'CF', 'CH04', 'CNB10', 'CNB11', 'CNB11DE', 'CNB12', 'CNB13', 'CNB13DE', 'CNB14', 'CNB15', 'CNB16', 'CS12', 'CS8', 'CT04', 'DIV', 'DS10', 'DS10B', 'DS10G', 'DS10Y', 'DS6', 'DS6 mix', 'DS8', 'DS8BL', 'DSPP8B', 'DSPP8SEB', 'EA', 'F1', 'F2', 'F3', 'F3-SE', 'F3DE', 'F4', 'F4DE', 'F5', 'F6', 'F7', 'F8', 'F9', 'FB2C1000', 'FBB20', 'FBB382', 'FBB383DE', 'FBB43', 'FBB433', 'FBB433DE', 'FBB45', 'FBB451', 'FBB451-E', 'FBB452', 'FBB452DE', 'FBB453', 'FBBWS452', 'FBM3C', 'FBM3CL', 'FCLB12M', 'FCLB12M-Rule8', 'FCLB12V', 'FCLB12V-WX', 'FCLB8M', 'FCLB8V', 'FCLW12V', 'FCLW12V-Spisestuerne', 'FCLW8', 'FCLW8-Spisestuerne', 'Folie1', 'FP10', 'FP10C3', 'FP10E', 'FP13', 'FP14', 'FP16', 'FP20', 'FP28', 'FP3C24', 'FP3C26', 'FP7', 'FP9', 'FPD11', 'FPD12', 'FPDJE12', 'FPDSW13', 'FPDTRI600', 'FPF16', 'FPK20', 'FPKD16', 'FPKD20', 'FR4350', 'FRC18', 'FRC19', 'FRC23', 'FRC240', 'FRC350', 'FRC350L', 'FRCFL', 'FRCL', 'FRCL19', 'FSB20', 'FSB21', 'FSS27', 'FSS30', 'FWSP7', 'FWSP9', 'HGP12', 'IGP1', 'IGPB1', 'IGPB1-Farmers', 'IGPB2', 'jump1', 'jump10', 'jump11', 'jump12', 'jump13', 'jump14', 'jump15', 'jump16', 'jump17', 'jump18', 'jump19', 'jump2', 'jump20', 'jump21', 'jump22', 'jump23', 'jump24', 'jump25', 'jump26', 'jump3', 'jump4', 'jump5', 'jump6', 'jump7', 'jump8', 'jump9', 'K1', 'K11', 'K11 A Food', 'K12', 'K13', 'K13 A Food', 'K15', 'K16', 'K17', 'K2', 'K5', 'K6', 'K7', 'LDPE1', 'LDPE150', 'LDPE2', 'LF', 'LL6', 'NP10', 'NP10-Farmers', 'NP10D', 'NP10N', 'NP10S', 'NP20', 'NP30', 'NP40', 'NP40F', 'NPDS', 'NPR20', 'O1', 'O2', 'O3', 'O4', 'O5', 'P1', 'P3', 'Packfee1', 'PAPCoRN1', 'PB14', 'PB16', 'PB16S', 'PB17', 'PB18', 'PB210', 'PB210C', 'PB211', 'PB212', 'PB23', 'PB24', 'PBALU2', 'PBD1', 'PBD1I', 'PBF7', 'PBF8', 'PBF9', 'PBSBL', 'PBSF2', 'PBSFV1', 'PBW211', 'PC12', 'PC12 Dan', 'PC12LOGO', 'PC16', 'PC16 Dan', 'PC16LOGO', 'PC20', 'PC22', 'PC24', 'PC4', 'PC4 Dan', 'PC8', 'PC8 Dan', 'PC8LOGO', 'PCB10', 'PCB1000', 'PCB11', 'PCB13', 'PCB16', 'PCB16DE', 'PCB16logo', 'PCB16VPDE', 'PCB325', 'PCB450', 'PCB500SD', 'PCB600', 'PCW325', 'PCW595', 'PDS7', 'PDS7B', 'PDS7B100', 'PDS7G100', 'PDS7KG100', 'PDS7KR100', 'PDS7R', 'PDS7R100', 'PDS7S', 'PETL', 'PPB24', 'PPB30', 'PSFTSW', 'PSFW', 'PSFW1000', 'PSKW', 'PSSW', 'PSTSW', 'PTB12', 'PTB15', 'PTB22', 'PTBW12', 'PTBW15', 'PTF16', 'PTF20', 'PTR18', 'PTR20', 'PTR23', 'PTW19', 'Q8bag1', 'Q8bag2', 'Q8bag3', 'Q8bag4', 'Q8bag5', 'Q8PBSBL', 'Q8PBSBL1', 'RB3', 'rbag1', 'RC12', 'RC12-Farmers', 'RC12-Rule8', 'RC16', 'RC16-E', 'RC16-Rule8', 'RC16-Spisestuerne', 'RC4', 'RC4-H', 'RC8', 'RC8-Spisestuerne', 'SAC35', 'SB1500', 'SB450', 'SB900', 'SC12', 'SC16', 'SC32', 'SC32DE', 'SCB12', 'SCB16', 'SCB32', 'SCB8', 'SCBL12', 'SCBL16', 'SCBL32', 'SCL', 'SCL12', 'SCL16', 'SCL32', 'SCL32DE', 'SCM', 'SCS', 'SLA5', 'SLAK1', 'SLCS', 'SLGV', 'SLHC1', 'SLHD300', 'SLKES1', 'SLMK12', 'SLMP5', 'SLOG1', 'SLR500', 'SLRG4', 'SLS500', 'SLSK1', 'SLU1', 'SLWC700', 'SS1815', 'ST20', 'ST750', 'STL750', 'STR2', 'TB1000', 'TB250', 'TB500', 'TBL', 'TC1', 'TCRH1', 'TCRH2', 'TCRH3', 'TCRH4', 'TCRH5', 'TCRH6', 'TCS1400', 'TCS1400L', 'TCSH1', 'TCSH2', 'TCSH3', 'TCSH4', 'TCSH5', 'TCSH6', 'TDB12', 'TDB12S', 'TDB16', 'TDB16S', 'TDB20', 'TDB20S', 'TDB24S', 'TDB8', 'TDB8S', 'TDB8S-BIO', 'TDBL', 'TDBLL', 'TDBLLS', 'TDBLS', 'TDBPET12', 'TDBPET16', 'TDBPET8', 'TDBPETL', 'TDBPP12', 'TDBPP16', 'TDBPP24', 'TDBPP32', 'TDBPP32L', 'TDBPP8', 'TDBPPL', 'TFB1', 'TFB2', 'TG1', 'TG11ISC', 'TG11ISCL', 'TG12', 'TG16', 'TG20', 'TG7', 'TG8', 'TG9', 'TGD10', 'TGD10S', 'TGD11', 'TGDDL', 'TGDDLS', 'TGDI1', 'TGDI4', 'TGDL10', 'TGDL8', 'TGL10', 'TGL8', 'TGL8-E', 'TGL8US', 'TGLL8', 'TGPP12', 'TGPP16', 'TGPP20', 'TM1', 'TP-095', 'TSC1', 'TSC1S', 'TSC2', 'TSC3', 'TSC3-C', 'TSC4', 'TSC4S', 'TSC5', 'TSCL1', 'TSCL2', 'TSCL3-C', 'TSCL3/4', 'TSCL5', 'VGPF-L', 'VGPF-M', 'VGPF-S', 'VGPF-XL', 'VO1314', 'VP', 'VP1', 'W15', 'W21', 'W8', 'WB1', 'WB2', 'WB2-Wokken', 'WDS6', 'WF6', 'WFF', 'WFS25', 'WFS6', 'WK6', 'WS22', 'WSBOX', 'WSD14', 'WST7', 'WT11', 'WT14', 'WT17', 'WT17-G', 'WT19', 'WT22', 'WT24', 'WT24-P', 'WT32', 'WT6', 'WT7', 'WT8', 'WTS'];
                $.each(productNumbers , function (index, value){
                    $.ajax({ 
                        url: "https://restapi.e-conomic.com/products/" + value,  
                        dataType: "json",
                        headers: { 
                            'X-AppSecretToken': "",
                            'X-AgreementGrantToken': "",
                            accept: "application/json"
                        },
                        type: "GET"
                    })

                    .always(function (data) {
                        var result = data.productNumber;
                        if (typeof result === "undefined") {
                            document.getElementById("output").innerHTML += ("");
                            console.log("0");
                        } else {
                            document.getElementById("output").innerHTML += ("<p>" + data.productNumber + " | " + data.description + "|" + data.productGroup + "</p>");
                            console.log("1");
                            $.ajax({
                                type: "POST",
                                url: "php/setProduct.php",
                                datatype: "text",
                                data: {productNumber: data.productNumber, description:data.description, name:data.name, costPrice:data.costPrice, salesPrice:data.salesPrice, productGroup:data.productGroup.productGroupNumber, unit:data.unit.unitNumber, available:data.inventory.available, inStock:data.inventory.inStock},
                                success: function (result) {
                                    console.log("Product inserted, Jonny rules all the code!");
                                    console.log(result);
                                }
                            });
                        }
                    });
                });
            }
            getProducts();
            
        </script>
    </body>
</html>