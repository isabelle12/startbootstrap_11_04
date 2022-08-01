$(function () {
   
    
    $("#modif_qte").on('click', function () {
        
        $.post(
            '../startbootstrap/ajax/modif_qte.php',
            {
                id : $("select.produit2").children("option:selected").val(),
                qte : $("input#qte_insertion")[0].value
            },
            function (data) {
                $("#message").html("<h5>La quantité du produit "+data.chaine+" a bien été modifiée</h5>")

            },
            'json'
        );

        console.log("kikou");
        $("#select1").html("<select class='form-control'><option>option 1</option></select>") ;

    });

    $('#search-stock3').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche3.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")

   
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  cible_lien ="DV_facture2.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });



    $('#search-stock8').keyup(function () {
        var stock = $(this).val();
        if (stock != "") {

        $.ajax({
            type: 'POST',
            url: '../startbootstrap/ajax/barre_recherche6.php',
            data: {
                stocks_SN: stock,
                //input
            },
            success: function (data) {
                if (data !== "") {
                    console.log("data")
                    console.log(data);
                    console.log("data")
                    /*for (i = 0; i < data.length; ++i) {
                        console.log(data[i])
                    }*/
                    console.log($(".lien"))
                    console.log($(".lien"))

                    $("#result-search").css("padding", "1em");
                    //la div avant le body :-0
                    $('#result-search').append(data);
                    /*$("a.lien").on('click', function () {
                    console.log("23h28")
                    });*/
                    console.log($(".lien"))
                    var tableau_liens=$(".lien")
                    console.log(tableau_liens.length)
                    for (var i=1; i<tableau_liens.length; i++) {
                        console.log(tableau_liens[i]);
                        console.log($(tableau_liens[i]).attr("adresse"))
                        var identifiant = $(tableau_liens[i]).attr("id")
                        var cible = "#"+identifiant
                        console.log(cible)
                        console.log($(cible))
                        /*$("#btn"+j).on('click', function () {
                            console.log("23h28")
                        });*/
                        let tableau_adresse = ''
                        var cible_lien = $(this).attr("href")

                        for (let j = 0; j < 8; j++) { // <-- use let
                            $('#btn' + j).click(function() {

                              console.log("valeur")
                              //alert($(this).attr("adresse"))
                              //console.log($(this).attr("adresse"));
                              $("#a_linterieur").html($(this).attr("adresse"))
                              //var adresse = $(this).attr("adresse")
                              tableau_adresse =  $(this).attr("adresse")
                              //alert(tableau_adresse)
                              telephone =  $(this).attr("telephone")   
                              mail =  $(this).attr("mail")
                              nom =  $(this).attr("nom")
                              enseigne =  $(this).attr("enseigne")
                              //console.log(tableau_adresse)
                              //return tableau_adresse
                              cible_lien ="liste_BC2.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne
                              $(this).attr("href",cible_lien)
                            });
                            /*$('#btn' + j).click(function(e){
                                e.stopPropagation();
                            });*/
                          }
                          console.log("il va y avoir")   
                          console.log(tableau_adresse)   
                    }
                    /*for (var i = 0; i < 8; i++) {
                        console.log(i)
                        var tableau = tableau_liens[i]
                        console.log(tableau_liens[i])
                        tableau.on('click', function () {
                        console.log("23h28")
                    });
                }*/

               
                } else {
                    //console.log(data);
                    $("#result-search").css("padding", "0");
                }
             }
        });
    } else {
        $("#result-search").css("padding", "0");
    }

});
       

    $('#search-stock7').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche3.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")

                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {

                                  console.log("valeur")
                                  //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  cible_lien ="liste_BC2.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")   
                              console.log(tableau_adresse)   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });

    $('#search-stock6').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche2.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  cible_lien ="DV_facture3.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });
    $('#search-stock5').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche3.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")

   
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  cible_lien ="vente_BL.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });
    $('#search-stock9').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche8.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    var prix = [] 
                                    for(var j=0;j<varUrl.length;j++){
                                        console.log(varUrl[i])
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                        
                                        
                                  cible_lien ="vente_BL2.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });
    
    $('#search-stock11').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche10.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    var prix = [] 
                                    for(var j=0;j<varUrl.length;j++){
                                        console.log(varUrl[i])
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                        
                                        
                                  cible_lien ="DV_facture2.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });
    $('#search-stock10').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche9.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    for(var j=0;j<varUrl.length;j++){
                                        console.log(varUrl[i])
                                        var parameter = varUrl[j].split('=');}
                                        console.log("para")
                                        console.log(parameter)


                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');   
     
                                    for(var j=0;j<varUrl.length;j++){
                                        var prix = [] 

                                        console.log(varUrl[i])
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                            
                                        
                                  cible_lien ="DV_facture4.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  $(this).attr("href",cible_lien)
                                });
                                console.log("prix")
                                        console.log(prix)
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });

    $('#search-stock4').keyup(function () {
        console.log("keyup")
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche2.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        var tableau_liens=$(".lien")
                        for (var i=1; i<tableau_liens.length; i++) {
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            console.log("17h07")
                            console.log($(this).attr("adresse"))
                            console.log("17h07")


                            for (let j = 0; j <= 30; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  console.log("16h53")
                                  console.log(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    var prix = [] 
                                    for(var j=0;j<varUrl.length;j++){
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                        
                                        
                                  cible_lien ="creation_BC_sans_select.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  console.log("lien16h45)")

                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                                console.log("17h02")
                                console.log(tableau_adresse)
                                console.log("17h02")

                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });

    $('#search-stock13').keyup(function () {
        console.log("keyup")
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche7.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        var tableau_liens=$(".lien")
                        for (var i=1; i<tableau_liens.length; i++) {
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            console.log("17h07")
                            //console.log($(this).attr("adresse"))
                            console.log("17h07")


                            for (let j = 0; j <= 30; j++) { // <-- use let
                                console.log("boucle")
                                $('#btn' + j).click(function() {
                                    //alert("31")
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  console.log("16h53")
                                  console.log(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    var prix = [] 
                                    for(var j=0;j<varUrl.length;j++){
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                        
                                        
                                  cible_lien ="creation_BC_sans_select.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  console.log("lien16h45)")

                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                                console.log("17h02")
                                console.log(tableau_adresse)
                                console.log("fin")

                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });

    $('#search-stock12').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche2.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))
   
                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search2').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    //alert($(this).attr("adresse"))
                                  //console.log($(this).attr("adresse"));
                                  $("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  //alert(tableau_adresse)
                                  telephone =  $(this).attr("telephone")
   
                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")
                                  enseigne =  $(this).attr("enseigne")
                                  details =  $(this).attr("details")
                                  siret =  $(this).attr("siret")

                                  //alert($(this).attr("details"))
   
                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  var url = window.location.search.substring(1);
                                    var varUrl = url.split('&');        
                                    var prix = [] 
                                    for(var j=0;j<varUrl.length;j++){
                                        console.log(varUrl[i])
                                        var parameter = varUrl[j].split('=');
                                        if (parameter[0] == "prix")
                                        {
                                            prix.push(parameter[1])
                                        }}
                                            var sorte_prix="&prix="+prix
                                        
                                        
                                  cible_lien ="un_distributeur.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&siret="+siret+"&enseigne="+enseigne+"&details="+details+sorte_prix
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")
   
                              console.log(tableau_adresse)
   
                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/
   
                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
    });

    $('#select_categorie').change(function() {
        // Doit afficher la valeur de ta liste. Cette syntaxe n'est utilisable que dans ta fonction
        /*alert( $(this).val() );

        $("#select1").html("<select class='form-control'><option>option1</option></select>");
        //alert($("#valeur").val);*/
        $.post(
            '../startbootstrap/ajax/donnees_select.php',
            {
                categorie: $(this).val(),
            },
            function (data) {

                $("#select1").html("<select style='margin-bottom:20px;' id='select2' class='form-control'><option value=''>Choisis une catégorie...</option><option>"+data.volume1+"</option><option>"+data.volume2+"</option></select><input id='cache' type='hidden' value='"+data.categorie+"'/>")
             
                console.log(data.volume1);
                console.log(data.volume2);
                console.log(data.categorie);

                $('#select2').change(function() {
                    $.post(
                        '../startbootstrap/ajax/donnees_select2.php',
                        {
                            categorie2: $("#cache").val(),
                        },
                        function (data2) {
                            console.log("avant");
                            console.log(data2.parfum9);
                            console.log("avant");

                            $("#div2").html("<select id='select2' class='form-control'><option value=''>Choisis un parfum...</option><option>"+data.volume1+"</option><option>"+data.volume2+"</option></select>")
                        },
                    );
               });
            },
            'json'
        );
   });

   $("select.categorie").change(function () {
       //alert($(this).children("option:selected").val())
       /*if($(this).children("option:selected").val()==' '){
           alert("nulle")
       }
       else{alert("non nulle")}*/
       //alert($(this).children("option:selected").val())
    $.post(
        '../startbootstrap/ajax/construire_select_qte3',
        {
            categorie: $(this).children("option:selected").val()
        },
        function (data) {
            /*jQuery.each(data, function(key, value) {
                // faire quelque chose avec `value` (ou `this` qui est `value` )
                alert(key+": "+ value);
            }); */
            //console.log(data);
            $("#select_volume").html(data.rappel_alert);
            $("#select_parfum").html(data.rappel_alert2);
            //$("#clients_tr").html(data.categorie);
        },
        'json'
    );
    });
    //if($("select.categorie").val ()!=' '){
    $("select.categorie").change(function () {
        $.post(
            '../startbootstrap/ajax/construire_article',
            {
                categorie: $("select.categorie").val (),
                volume : $("select.volume").val (),
                parfum : $("select.parfum").val (),
            },
            function (data) {
                //alert("kikou")
                /*alert(data.categorie_html)*/
                $("#la_div").html(data.categorie_html);
            },
            'json'
        );
        
    });

    $("#bouton").on('click', function () {
        //alert($("select.categorie").val () )
        //alert($("select.volume").val ())
        //alert($("select.parfum").val ())

        $.post(
            '../startbootstrap/ajax/construire_article',
            {
                categorie: $("select.categorie").val (),
                volume : $("select.volume").val (),
                parfum : $("select.parfum").val (),
            },
            function (data) {
                //alert("kikou")
                /*alert(data.categorie_html)*/
                $("#la_div").html(data.categorie_html);
            },
            'json'
        );
        /*$(".modif").on('click', function () {
            alert("kikou")
           });*/
     });
     

    //}
    //else{alert("kikou")}

    $("input#qte_insertion").change(function () {
        //console.log($("input#qte_insertion")[0].value)

    });
$("#formulaire").submit(function(){
    console.log("20/03")
    console.log($("select.produit_facture").children("option:selected").val())
    console.log($("input#qte_insertion")[0].value)
    $("#tableau").append("kikou")
    $("#tableau").append($(select.produit_facture).children("option:selected").val())


});
$("select.produit_facture").change(function () {
        console.log($(this).children("option:selected").val())
        $("#tableau").append("<tr><td style='border: 1px solid #E5E5E5'>"+$(this).children("option:selected").val()+"</td>")
        //$("#tableau").append($(this).children("option:selected").val())
        /*$("#para").append("kikou")
        $("#tableau").append("</td></tr>")

        $.post(
            '../startbootstrap/ajax/facture',
            {
                //qte_nouveau: $(this).children("option:selected").val(),
                id : $(this).children("option:selected").val()
            },
            function (data_qte) {
               
            },
            'json'
        );*/
    });
    /*$("#qte_insertion").keyup(function () {
        $("#tableau").append("<td></td>
    });*/


    $("select.volume").change(function () {
        //alert($(this).children("option:selected").val())
        $.post(
            '../startbootstrap/ajax/volume',
            {
                //qte_nouveau: $(this).children("option:selected").val(),
                id_qte : $(this).children("option:selected").val()
            },
            function (data_qte) {
                /*alert("kikou");*/
                //console.log(data_qte['qte_nouveau']);
                $("#la_div").html(data_qte.qte_nouveau);
            },
            'json'
        );
    });


    $("select.parfum").change(function () {
        //alert($(this).children("option:selected").val())
        $.post(
            '../startbootstrap/ajax/parfum',
            {
                parfum : $(this).children("option:selected").val(),
                volume : $("#id_hidden").val()
            },
            function (data_parfum) {
                /*alert("kikou");*/
                //alert(data_parfum['parfum_data']);
                //alert(data_parfum.parfum);
                $("#la_div").html(data_parfum.parfum);
            },
            'json'
        );
    });
    var tableau = [];

    /*$("select.produit").change(function () {
        //alert($(this).children("option:selected").val())
       
        $("#produit").append($(this).children("option:selected").val()+"<br/><br/><input class='les_inputs form-control type='text' class='form-control' style='margin-bottom:30px;'placeholder='entrez la quantité dans cette case'/>");
        tableau.push($(this).children("option:selected").val())
        $("#choix").html("si vous voulez ajouter un autre produit sélectionnez le :<br/><br/>");

    });*/
    //console.log(tableau);

    $("select.produit").change(function () {
        //alert($(this).children("option:selected").val())
        $.post(
            '../startbootstrap/ajax/un_produit',
            {
                id : $(this).children("option:selected").val(),
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {  
                /*console.log(data.nom)
                console.log(data.qte)*/
                if(typeof data.qte!='undefined'){
                    if(typeof data.parfum!='undefined'){
                        //console.log("ça marche")
                        //$("#produit").append(data.nom+" "+data.qte+" "+data.parfum+"<br/><br/><br/><!--<input class='les_inputs form-control type='text' class='form-control' style='margin-bottom:30px;'placeholder='entrez la quantité dans cette case'/>-->")
                //console.log("article")
                    }
                    else{
                        //$("#produit").append(data.nom+" "+data.qte+"<br/><br/><br/><!--<input class='les_inputs form-control type='text' class='form-control' style='margin-bottom:30px;'placeholder='entrez la quantité dans cette case'/>-->")
   
                    }
                 }
                else{
                    //$("#produit").append(data.nom+"<br/><br/><br/><!--<input class='les_inputs form-control type='text' class='form-control' style='margin-bottom:30px;'placeholder='entrez la quantité dans cette case'/>-->")
 
                }
                tableau.push(data.id)
                /*console.log("tableau2")
                console.log(tableau)*/
            },
            'json'
        );
    });
    var tableau_21 = []
    var tableau_21_qte = []


    var i = 0
    var tableau_pr_somme=[]
    var somme=0
    var tableau_taille=[]
    var produits = []

    var variable="pas supprime"

    var tableau_premier=new Array()

    var tableau_produit = new Array()

var k=0
var tableau_suppr = new Array()
console.log("tableau suppr")
    console.log(tableau_suppr)

    console.log("tableau suppr")
var les_tr2 = new Array()
//var les_tr=0

var lien=""
var tableau_input_qte = new Array()
var tableau_chaine = new Array()
var tableau_multiplication = new Array()

var prix = [] 
var  sorte_prix=""

    $("#inserer2").on("click",function () {
        var url = window.location.search.substring(1);
                var varUrl = url.split('&');        
                for(var j=0;j<varUrl.length;j++){
                    //console.log(varUrl[i])
                    var parameter = varUrl[j].split('=');
                    if (parameter[0] == "prix")
                    {
                        prix.push(parameter[1])
                    }}
                    
                    
        //console.log(Number.isInteger($("input#qte_insertion")[0].value))
        var entier = parseInt($("input#qte_insertion")[0].value)
        //console.log(Number.isInteger(entier))
        $.post(
            '../startbootstrap/ajax/remplacer_par_un',
            {
                //nom_distributeur : input_nom,
                id : $("select.produit").children("option:selected").val(),
                //tableau_inputs : tableau2,  
                qte_choisie : $("input#qte_insertion")[0].value,
                supprimer_ajax : variable

            },
            function (data) {
                $("#tableau").append("<tr id="+k+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"<td>"+data.prix+"</td></tr>")
                //console.log($("tr"))
                    //les_tr.push($("tr"))
                    les_tr = $("tr")
                    les_tr2.push("<tr id="+k+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"<td>"+data.prix+"</td></tr>")

                    tableau_chaine.push(data.chaine)
                    console.log("tableau cheine")
                    console.log(tableau_chaine)

                    var j = 0;
                
                var multiplication = entier*parseInt(data.prix)
                produits.push(data.chaine)
                tableau_pr_somme.push(multiplication)
                lien = $("#signer").attr("href")
                var lien_NP = $("#signer").attr("href")

                /*console.log("qte")
                console.log($("input#qte_insertion"))
                console.log("qte")*/
                //alert(i)
                //if(j==0){

                //lien = lien + "&taille="+k
                k = k+1

                //console.log("tableau prix"+prix)
                if(prix=="DV"){
                    sorte_prix=data.prix
                }
                if(prix=="vente"){
                    sorte_prix=data.prix2
                }
                tableau_input_qte.push($("input#qte_insertion")[0].value)
                //lien = lien + "&produit"+k+"="+data.chaine+"&qte"+k+"="+$("input#qte_insertion")[0].value+sorte_prix
                console.log("tableau")
                console.log(tableau_input_qte)

                console.log("tableau")

                /*}
                else{
                    i=i-1
                    lien = lien + "&taille="+i
                }*/
                $("#signer").attr("href",lien)
                $("#signer_NP").attr("href",lien)

                $('input#qte_insertion').val('');
                // LA VA Y AVOIR SUPPR
                $('#tableau tr').click(function(){   
                    //console.log("id28")
                    var id = ($(this).attr("id"))
                    //console.log(id)
                    //console.log($(this))                    
                     
                    $(this).remove();   
                    tableau_suppr.push($(this).attr("id"))
                    console.log("zero")
                    console.log(tableau_suppr)
                    console.log("zero")

                    
                });

            },
            'json'
        );
    });

    var newArray = ""
//---------------------------------------------------
$("#inserer4").on("click",function () {
    i = i+1
    var url = window.location.search.substring(1);
                var varUrl = url.split('&');        
                for(var j=0;j<varUrl.length;j++){
                    //console.log(varUrl[i])
                    var parameter = varUrl[j].split('=');
                    if (parameter[0] == "prix")
                    {
                        prix.push(parameter[1])
                    }}
                    
    console.log("inserer4")
    console.log(Number.isInteger($("input#qte_insertion")[0].value))
    var entier = parseInt($("input#qte_insertion")[0].value)
    console.log(Number.isInteger(entier))
    $.post(
        '../startbootstrap/ajax/remplacer_par_un',
        {
            //nom_distributeur : input_nom,
            id : $("select.produit").children("option:selected").val(),
            //tableau_inputs : tableau2,  
            qte_choisie : $("input#qte_insertion")[0].value

        },
        function (data) {
            $("#tableau").append("<tr id="+k+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"</td><td>"+data.prix+"</td><td>"+entier*parseInt(data.prix)+"</td></tr>")
            k=k+1
            var multiplication = entier*parseInt(data.prix)
            produits.push(data.chaine)
            tableau_chaine.push(data.chaine)
            tableau_input_qte.push($("input#qte_insertion")[0].value)
            tableau_multiplication.push(entier*parseInt(data.prix))
            console.log(prix)
            console.log(44+data.prix)
            console.log(tableau_multiplication)

            if(prix=="DV"){

                sorte_prix=data.prix
            }
            if(prix=="vente"){
                sorte_prix=data.prix2
            }

            tableau_pr_somme.push(multiplication)
            var lien = $("#signer").attr("href")
            var lien_NP = $("#signer_NP").attr("href")

            console.log("qte")
            console.log($("input#qte_insertion"))
            console.log("qte")
            lien = lien + "&taille="+i
            lien_NP = lien_NP + "&taille="+i

            //lien = lien + "&produit"+i+"="+data.chaine+"&qte"+i+"="+$("input#qte_insertion")[0].value+"&prix_DV"+i+"="+data.prix
            lien_NP = lien_NP + "&produit"+i+"="+data.chaine+"&qte"+i+"="+$("input#qte_insertion")[0].value+"&prix_DV"+i+"="+data.prix

            $("#signer_NP").attr("href",lien_NP)
            $("#signer").attr("href",lien)

            $('input#qte_insertion').val('');
            $('#tableau tr').click(function(){   
                //console.log("id28")
                var id = ($(this).attr("id"))
                //console.log(id)
                //console.log($(this))                    
                 
                $(this).remove();   
                tableau_suppr.push($(this).attr("id"))
                //console.log(les_tr.length)
                //tableau_tr_7.push($(this))
            });
        },
        'json'
    );
});
//----------------------------------------------
var tableau_prix_vente = new Array()
$("#inserer7").on("click",function () {
    i = i+1
    
    console.log("inserer4")
    console.log(Number.isInteger($("input#qte_insertion")[0].value))
    var entier = parseInt($("input#qte_insertion")[0].value)
    console.log(Number.isInteger(entier))
    $.post(
        '../startbootstrap/ajax/remplacer_par_un_caisse',
        {
            //nom_distributeur : input_nom,
            id : $("select.produit").children("option:selected").val(),
            //tableau_inputs : tableau2,  
            qte_choisie : $("input#qte_insertion")[0].value,
            nom : $("input#nom")[0].value

        },
        function (data) {
            $("#tableau").append("<tr id="+indice+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"</td><td>"+data.prix2+"</td><td>"+entier*parseInt(data.prix2)+"</td></tr>")
            
            indice = indice+1

            /*tableau_21.push(data.chaine)
            tableau_21_qte.push($("input#qte_insertion")[0].value)
            tableau_21_prix.push(data.prix)*/
            //alert($("#signer").attr("href"))
            var multiplication = entier*parseInt(data.prix)
            produits.push(data.chaine)
            tableau_chaine.push(data.chaine)
            tableau_prix_vente.push(data.prix2)

            tableau_input_qte.push($("input#qte_insertion")[0].value)


            tableau_pr_somme.push(multiplication)
            var lien = $("#signer").attr("href")
            var lien_NP = $("#signer_NP").attr("href")

            console.log("qte")
            console.log($("input#qte_insertion"))
            console.log("qte")
            /*lien = lien + "&taille="+indice+1
            lien_NP = lien_NP + "&taille="+i*/

            /*lien = lien + "&produit"+indice+"="+data.chaine+"&qte"+indice+"="+$("input#qte_insertion")[0].value+"&prix_vente"+indice+"="+data.prix2
            lien_NP = lien_NP + "&produit"+indice+"="+data.chaine+"&qte"+indice+"="+$("input#qte_insertion")[0].value+"&prix_vente"+indice+"="+data.prix2
*/
            $("#signer_NP").attr("href",lien_NP)
            $("#signer").attr("href",lien)

            $('input#qte_insertion').val('');
            tableau_multiplication.push(entier*parseInt(data.prix2))

            $('#tableau tr').click(function(){   
                console.log("id28")
                var id = ($(this).attr("id"))
                console.log(id)
                //console.log($(this))                    
                 
                $(this).remove();   
                tableau_suppr.push($(this).attr("id"))
                console.log(18)
                console.log(tableau_suppr)
                console.log(18)

                //console.log(les_tr.length)
                //tableau_tr_7.push($(this))
            });
        },
        'json'
    );
});
//------------------------------------------
$("#inserer5").on("click",function () {
    i = i+1
    
    console.log("inserer4")
    console.log(Number.isInteger($("input#qte_insertion")[0].value))
    var entier = parseInt($("input#qte_insertion")[0].value)
    console.log(Number.isInteger(entier))
    $.post(
        '../startbootstrap/ajax/remplacer_par_un_caisse',
        {
            //nom_distributeur : input_nom,
            id : $("select.produit").children("option:selected").val(),
            //tableau_inputs : tableau2,  
            qte_choisie : $("input#qte_insertion")[0].value,
            nom : $("input#nom")[0].value

        },
        function (data) {
            $("#tableau").append("<tr id="+indice+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"</td><td>"+data.prix+"</td><td>"+entier*parseInt(data.prix)+"</td></tr>")
            
            indice = indice+1

            /*tableau_21.push(data.chaine)
            tableau_21_qte.push($("input#qte_insertion")[0].value)
            tableau_21_prix.push(data.prix)*/
            //alert($("#signer").attr("href"))
            var multiplication = entier*parseInt(data.prix)
            produits.push(data.chaine)
            tableau_chaine.push(data.chaine)

            tableau_pr_somme.push(multiplication)
            var lien = $("#signer").attr("href")
            var lien_NP = $("#signer_NP").attr("href")

            console.log("qte")
            console.log($("input#qte_insertion"))
            console.log("qte")
            lien = lien + "&taille="+i
            lien_NP = lien_NP + "&taille="+i

            lien = lien + "&produit"+i+"="+data.chaine+"&qte"+i+"="+$("input#qte_insertion")[0].value+"&prix_vente"+i+"="+data.prix2
            lien_NP = lien_NP + "&produit"+i+"="+data.chaine+"&qte"+i+"="+$("input#qte_insertion")[0].value+"&prix_vente"+i+"="+data.prix2

            $("#signer_NP").attr("href",lien_NP)
            $("#signer").attr("href",lien)

            $('input#qte_insertion').val('');

            $('#tableau tr').click(function(){   
                console.log("id28")
                var id = ($(this).attr("id"))
                console.log(id)
                //console.log($(this))                    
                 
                $(this).remove();   
                tableau_suppr.push($(this).attr("id"))
                console.log(18)
                console.log(tableau_suppr)
                console.log(18)

                //console.log(les_tr.length)
                //tableau_tr_7.push($(this))
            });
        },
        'json'
    );
});
//----------------------------------------------------
$("#valider_tableau2").on("click",function () { 
    var url = window.location.search.substring(1);
    var varUrl = url.split('&');        
    for(var j=0;j<varUrl.length;j++){
        //console.log(varUrl[i])
        var parameter = varUrl[j].split('=');
        if (parameter[0] == "prix")
        {
            prix.push(parameter[1])
        }}
        console.log("prix")

        console.log(sorte_prix)
    var tableau_indexs = new Array() 
    for(var m=0;m<k;m++) {
        tableau_indexs.push(m)
    } 
    console.log("tableausuppr13")
    console.log(tableau_suppr)

    console.log(tableau_suppr.length)
    console.log("tableau_suppr13")
    console.log(typeof(tableau_suppr[0]))
    //var nombre = Number(tableau_suppr[0])
    console.log(typeof(nombre))
console.log(tableau_indexs)
var somme_front = 0
lien = $("#signer").attr("href")

console.log("lien")
    console.log(lien)
    lien_NP = $("#signer_NP").attr("href")
if(tableau_suppr.length!=0){
    for(var n=0;n<tableau_suppr.length;n++){
            //console.log(tableau_suppr[n])
        var nombre = Number(tableau_suppr[n])
        console.log("cellule suppr")
        console.log(nombre)
        console.log("cellule suppr")

        for(var m=0;m<k;m++) {
            //console.log(tableau_suppr[n]+"="+m)
            if(m==nombre){
                console.log("kikou")
                console.log(tableau_indexs)
                console.log("kikou")
                tableau_indexs = tableau_indexs.filter(function(f) { return f !== nombre })
                console.log(tableau_indexs)            
            }
        
        } 
    }
    console.log(tableau_indexs)
    console.log("tableau_indexs.length")

    console.log(tableau_indexs.length)
    console.log("tableau_indexs.length")

    

    lien = lien+"&taille="+tableau_indexs.length
    lien_NP = lien_NP+"&taille="+tableau_indexs.length

    console.log("tableau_chaine")

    console.log(tableau_chaine)
    console.log("tableau_chaine")
    console.log(tableau_indexs)
    var q = 0
    for(var o=0;o<tableau_chaine.length;o++){
        console.log("ds boucle")
    //tableau_indexs pr ts les indexs du départ non
        for(var p=0;p<tableau_indexs.length;p++){
            console.log("ds boucle")
            console.log(tableau_indexs[p])
            console.log(typeof(tableau_indexs[p]))
            console.log(typeof(o))
            console.log(o+"="+tableau_indexs[p])

            if(o==tableau_indexs[p]){
                console.log("egal")
                console.log(prix)
                //q = q+1
                if(prix[0]=="DV"){
                    console.log("DV")
                    console.log("lien")
                    console.log(lien)
                    lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix
                    lien_NP = lien_NP + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix

                    somme_front = somme_front+parseInt(tableau_multiplication[o])
                    console.log("somme")
                    console.log(somme_front)
                    lien=lien+"&somme="+somme_front
                    lien_NP=lien_NP+"&somme="+somme_front

                    $("#un").html(somme_front+" €")
                    var TTC = (0.20*somme_front)
                    console.log(TTC)
                    $("#trois").html(TTC+" €")
                    $("#deux").html(TTC+somme_front+" €")
                    q=q+1


                }
                if(prix[0]=="vente"){
                    console.log("vente")

                    lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+"&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+tableau_prix_vente[o]
                    //lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
                    lien_NP = lien_NP + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+"&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+tableau_prix_vente[o]
                    //lien_NP = lien_NP + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+sorte_prix
                    console.log(43)
                    console.log(tableau_multiplication[o])
                    console.log(43)


                    somme_front = somme_front+parseInt(tableau_multiplication[o])
                    console.log("somme")
                    console.log(somme_front)
                    lien=lien+"&somme="+somme_front
                    lien_NP=lien_NP+"&somme="+somme_front

                    $("#un").html(somme_front+" €")
                    var TTC = (0.20*somme_front)
                    console.log("TTC")
                    console.log(TTC)
                    console.log("TTC")

                    $("#deux").html(TTC+somme_front+" €")
                    $("#trois").html(TTC.toFixed(2)+" €")  
                    q=q+1
             
                 }

                }
                    /*else{
                        if(prix[0]=="DV"){
                            lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix
                        }
                        if(prix[0]=="vente"){
                            lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+sorte_prix
                        }

                    }*/
        }
    }
}
else{
    console.log("14")
    console.log(tableau_chaine)

    for(var r=0;r<tableau_chaine.length;r++){
        if(prix[0]=="DV"){
            lien = lien + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_DV"+r+"="+sorte_prix
            lien_NP = lien_NP + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_DV"+r+"="+sorte_prix

            somme_front = somme_front+parseInt(tableau_multiplication[r])
            console.log("somme")
            console.log(somme_front)
            lien=lien+"&somme="+somme_front
            lien_NP=lien_NP+"&somme="+somme_front

            $("#un").html(somme_front+" €")
            var TTC = (0.20*somme_front)
            console.log(TTC)
            $("#deux").html(TTC+somme_front+" €")
            $("#trois").html(TTC.toFixed(2)+" €")

        }
        //vente + pas suppression : 
        if(prix[0]=="vente"){
            console.log(6)
            console.log($("input#nom")[0].value)
            lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
            //lien_NP = lien_NP + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
            lien_NP = lien_NP + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]

            somme_front = somme_front+parseInt(tableau_multiplication[r])
            console.log("somme")
            console.log(somme_front)
            lien=lien+"&somme="+somme_front
            lien_NP=lien_NP+"&somme="+somme_front

            $("#un").html(somme_front+" €")
            var TTC = (0.20*somme_front)
            console.log("TTC")

            console.log(TTC)
            $("#deux").html(TTC+somme_front+" €")
            //$("#trois").html(TTC.toFixed(2)+" €")        

            $("#trois").html(TTC)        
        }

    }
    lien = lien+"&taille="+tableau_chaine.length
    lien_NP = lien_NP+"&taille="+tableau_chaine.length

}

        $("#signer").attr("href",lien)
        $("#signer_NP").attr("href",lien_NP)


        console.log("lien final")
        console.log(lien)
        console.log("lien final")

            //lien = lien + "&produit"+k+"="+data.chaine+"&qte"+k+"="+$("input#qte_insertion")[0].value+sorte_prix
        

    console.log("tableau suppr")
    //console.log(tableau_suppr)
    //console.log(les_tr)
    //console.log(k)

    //console.log(lien)
    //console.log(tableau_suppr[0])

    var lien_remplace = lien.replace(tableau_suppr[0],"")
    //console.log(lien_remplace)

    //console.log("tableau suppr")   
        $.post(
            '../startbootstrap/ajax/tableau_refait',
            {
                //nom_distributeur : input_nom,
                id : tableau_suppr,
                //les_tr : les_tr
                //tableau_inputs : tableau2,  
                

            },
            function (data) {
            },
            'json'
        );   

        //console.log(tableau_produit)
        //console.log(produits)
        for(var j=0;j<tableau_produit.length;j++){

        for(var i=0;i<produits.length;i++){

            if(produits[i]==tableau_produit[j]){
                alert(tableau_produit)
                //produits.not(tableau_produit)
                $(produits[i]).remove();
                produits.splice(i,1)
                
            }
        }
    }
        //console.log("produits")

        //console.log(produits)

    });
$("#valider_tableau").on("click",function () { 
    var url = window.location.search.substring(1);
    var varUrl = url.split('&');        
    for(var j=0;j<varUrl.length;j++){
        //console.log(varUrl[i])
        var parameter = varUrl[j].split('=');
        if (parameter[0] == "prix")
        {
            prix.push(parameter[1])
        }}
        console.log("prix")

        console.log(sorte_prix)
    var tableau_indexs = new Array() 
    for(var m=0;m<indice;m++) {
        tableau_indexs.push(m)
    } 
    console.log("tableausuppr13")
    console.log(tableau_suppr)

    console.log(tableau_suppr.length)
    console.log("tableau_suppr13")
    console.log(typeof(tableau_suppr[0]))
    //var nombre = Number(tableau_suppr[0])
    console.log(typeof(nombre))
console.log(tableau_indexs)
var somme_front = 0
lien = $("#signer").attr("href")
    lien_NP = $("#signer_NP").attr("href")
if(tableau_suppr.length!=0){
    for(var n=0;n<tableau_suppr.length;n++){
            //console.log(tableau_suppr[n])
        var nombre = Number(tableau_suppr[n])
        console.log("cellule suppr")
        console.log(nombre)
        console.log("cellule suppr")

        for(var m=0;m<indice;m++) {
            console.log(tableau_suppr[n]+"="+m)
            if(m==nombre){
                console.log("kikou")
                console.log(tableau_indexs)
                console.log("kikou")
                tableau_indexs = tableau_indexs.filter(function(f) { return f !== nombre })
                console.log(tableau_indexs)            
            }
        
        } 
    }
    console.log(tableau_indexs)
    console.log("tableau_indexs.length")

    console.log(tableau_indexs.length)
    console.log("tableau_indexs.length")

    

    lien = lien+"&taille="+tableau_indexs.length
    lien_NP = lien_NP+"&taille="+tableau_indexs.length

    console.log("tableau_chaine")

    console.log(tableau_chaine)
    console.log("tableau_chaine")
    console.log(tableau_indexs)
    var q = 0
    for(var o=0;o<tableau_chaine.length;o++){
        console.log("ds boucle")
    //tableau_indexs pr ts les indexs du départ non
        for(var p=0;p<tableau_indexs.length;p++){
            console.log("ds boucle")
            console.log(tableau_indexs[p])
            console.log(typeof(tableau_indexs[p]))
            console.log(typeof(o))
            console.log(o+"="+tableau_indexs[p])

            if(o==tableau_indexs[p]){
                console.log("egal")
                console.log(prix)
                //q = q+1
                if(prix[0]=="DV"){
                    console.log("DV")
                    lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix
                    lien_NP = lien_NP + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix

                    somme_front = somme_front+parseInt(tableau_multiplication[o])
                    console.log("somme")
                    console.log(somme_front)
                    lien=lien+"&somme="+somme_front
                    lien_NP=lien_NP+"&somme="+somme_front

                    $("#un").html(somme_front+" €")
                    var TTC = (0.20*somme_front)
                    console.log(TTC)
                    $("#trois").html(TTC+" €")
                    $("#deux").html(TTC+somme_front+" €")


                }
                if(prix[0]=="vente"){
                    console.log("vente")

                    lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+"&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+tableau_prix_vente[o]
                    //lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
                    lien_NP = lien_NP + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+"&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+tableau_prix_vente[o]
                    //lien_NP = lien_NP + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+sorte_prix
                    console.log(43)
                    console.log(tableau_multiplication[o])
                    console.log(43)


                    somme_front = somme_front+parseInt(tableau_multiplication[o])
                    console.log("somme")
                    console.log(somme_front)
                    lien=lien+"&somme="+somme_front
                    lien_NP=lien_NP+"&somme="+somme_front

                    $("#un").html(somme_front+" €")
                    var TTC = (0.20*somme_front)
                    console.log("TTC")
                    console.log(TTC)
                    console.log("TTC")

                    $("#deux").html(TTC+somme_front+" €")
                    $("#trois").html(TTC.toFixed(2)+" €")                }
                q=q+1

            }
            /*else{
                if(prix[0]=="DV"){
                    lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_DV"+q+"="+sorte_prix
                }
                if(prix[0]=="vente"){
                    lien = lien + "&produit"+q+"="+tableau_chaine[o]+ "&qte"+q+"="+tableau_input_qte[o]+"&prix_vente"+q+"="+sorte_prix
                }

            }*/
        }
    }
}
else{
    console.log("14")
    console.log(tableau_chaine)

    for(var r=0;r<tableau_chaine.length;r++){
        if(prix[0]=="DV"){
            lien = lien + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_DV"+r+"="+sorte_prix
            lien_NP = lien_NP + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_DV"+r+"="+sorte_prix

            somme_front = somme_front+parseInt(tableau_multiplication[r])
            console.log("somme")
            console.log(somme_front)
            lien=lien+"&somme="+somme_front
            lien_NP=lien_NP+"&somme="+somme_front

            $("#un").html(somme_front+" €")
            var TTC = (0.20*somme_front)
            console.log(TTC)
            $("#deux").html(TTC+somme_front+" €")
            $("#trois").html(TTC.toFixed(2)+" €")

        }
        //vente + pas suppression : 
        if(prix[0]=="vente"){
            console.log(6)
            console.log($("input#nom")[0].value)
            lien = lien + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
            //lien_NP = lien_NP + "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]
            lien_NP = lien_NP + "&adresse="+$("textarea#adresse")[0].value+ "&nom="+$("input#nom")[0].value+ "&produit"+r+"="+tableau_chaine[r]+ "&qte"+r+"="+tableau_input_qte[r]+"&prix_vente"+r+"="+tableau_prix_vente[r]

            somme_front = somme_front+parseInt(tableau_multiplication[r])
            console.log("somme")
            console.log(somme_front)
            lien=lien+"&somme="+somme_front
            lien_NP=lien_NP+"&somme="+somme_front

            $("#un").html(somme_front+" €")
            var TTC = (0.20*somme_front)
            console.log("TTC")

            console.log(TTC)
            $("#deux").html(TTC+somme_front+" €")
            //$("#trois").html(TTC.toFixed(2)+" €")        

            $("#trois").html(TTC)        
        }

    }
    lien = lien+"&taille="+tableau_chaine.length
    lien_NP = lien_NP+"&taille="+tableau_chaine.length

}

        $("#signer").attr("href",lien)
        $("#signer_NP").attr("href",lien_NP)


        console.log("lien final")
        console.log(lien_NP)
        console.log("lien final")

            //lien = lien + "&produit"+k+"="+data.chaine+"&qte"+k+"="+$("input#qte_insertion")[0].value+sorte_prix
        

    console.log("tableau suppr")
    //console.log(tableau_suppr)
    //console.log(les_tr)
    //console.log(k)

    //console.log(lien)
    //console.log(tableau_suppr[0])

    var lien_remplace = lien.replace(tableau_suppr[0],"")
    //console.log(lien_remplace)

    //console.log("tableau suppr")   
        $.post(
            '../startbootstrap/ajax/tableau_refait',
            {
                //nom_distributeur : input_nom,
                id : tableau_suppr,
                //les_tr : les_tr
                //tableau_inputs : tableau2,  
                

            },
            function (data) {
            },
            'json'
        );   

        //console.log(tableau_produit)
        //console.log(produits)
        for(var j=0;j<tableau_produit.length;j++){

        for(var i=0;i<produits.length;i++){

            if(produits[i]==tableau_produit[j]){
                alert(tableau_produit)
                //produits.not(tableau_produit)
                $(produits[i]).remove();
                produits.splice(i,1)
                
            }
        }
    }
        //console.log("produits")

        //console.log(produits)

    });

    var tableau_PDF = new Array()

    $("#inserer6").on("click",function () {
        i = i+1
        var url = window.location.search.substring(1);
                var varUrl = url.split('&');        
                var prix = [] 
                for(var j=0;j<varUrl.length;j++){
                    console.log(varUrl[i])
                    var parameter = varUrl[j].split('=');
                    if (parameter[0] == "prix")
                    {
                        prix.push(parameter[1])
                    }}
        
        //console.log(Number.isInteger($("input#qte_insertion")[0].value))
        var entier = parseInt($("input#qte_insertion")[0].value)
        //console.log(Number.isInteger(entier))
        $.post(
            '../startbootstrap/ajax/remplacer_par_un',
            {
                //nom_distributeur : input_nom,
                id : $("select.produit").children("option:selected").val(),
                //tableau_inputs : tableau2,  
                qte_choisie : $("input#qte_insertion")[0].value

            },
            function (data) {
                tableau_PDF.push(data.chaine)
                $("#tableau").append("<tr id="+i+"><td>"+data.chaine+"</td><td>"+$("input#qte_insertion")[0].value+"<td>"+data.prix+"</td></tr>")
                console.log($("tr"))
                    var les_tr = $("tr")
                    console.log($("tr"))
                    var j = 0;
                    $('#tableau').find('tr').click(function(){
                        var supprime = $(this).attr("id")
                        var tableau_premier=new Array()
                        var tr = document.getElementById(supprime)
                        console.log(tr)
                        console.log($(tr).find("td")[0])
                        tableau_premier.push($(tr).find("td")[0])
                        console.log(tableau_premier)
                        $(this).empty()
                        j = 1
                        //console.log($("#"+supprime))
                        
                    });
                    console.log("kikou2")
                    console.log(tableau_premier)

                /*$("#supprimer").on("click",function () {
                    var tableau_tr = $("tr")
                    //console.log($('#tableau').find('tr'))
                    //console.log($("tbody:last-child")[0].children.last())
                    
                    $("tr").last().empty()
                });*/
                var multiplication = entier*parseInt(data.prix)
                produits.push(data.chaine)
                tableau_pr_somme.push(multiplication)
                var lien = $("#signer").attr("href")
                var lien_NP = $("#signer").attr("href")

                /*console.log("qte")
                console.log($("input#qte_insertion"))
                console.log("qte")*/
                //alert(i)
                if(j==0){

                lien = lien + "&taille="+i

                //console.log("tableau prix"+prix)

                if(prix=="DV"){
                    var sorte_prix="&prix_DV"+i+"="+data.prix
                }
                if(prix=="vente"){
                    var sorte_prix="&prix_vente"+i+"="+data.prix2
                }
                lien = lien + "&produit"+i+"="+data.chaine+"&qte"+i+"="+$("input#qte_insertion")[0].value+sorte_prix
                }
                else{
                    i=i-1
                    lien = lien + "&taille="+i



                }
                $("#signer").attr("href",lien)
                $("#signer_NP").attr("href",lien)

                $('input#qte_insertion').val('');
            },
            'json'
        );
    });

    



    $("#client").on("click",function () {
        $("#nom_client").append($("input#nom")[0].value)
                $("#nom_client").append("<br/>"+$("textarea#adresse")[0].value)
    });

    var indice = 0



    var multiplication_caisse = []

    $("#inserer3").on("click",function () {
        $("#choix").html("si vous voulez ajouter un autre produit sélectionnez le :<br/><br/>");

        $.post(
            '../startbootstrap/ajax/remplacer_par_un.php',
            {   //nom_distributeur : input_nom,
                id : $("select.produit").children("option:selected").val(),
                qte_choisie : $("input#qte_insertion")[0].value
            },
            function (data) {
                $("#tableau_caisse").append("<tr><td style=''>"+data.chaine+"</td><td style=';text-align:right'>"+$('input#qte_insertion')[0].value+"</td><td style=';text-align:right;'>"+data.prix2+"</td></tr>")
                //$("#dedans").append("<span>"+data.chaine+"</span><span style='margin-left:100px;'>quantité "+$('input#qte_insertion')[0].value+"</span><br/>")
                //console.log($("input#qte_insertion")[0].value)
                console.log(Number.isInteger($("input#qte_insertion")[0].value))
                var entier = parseInt($("input#qte_insertion")[0].value)
                var entier2 = parseInt(data.prix2)
                multiplication_caisse.push(entier*entier2)
                $('input#qte_insertion').val('');

            },
            'json'
        );
        
    });
    var resultat = 0
    var entier = 0
    console.log("tableau m")
    console.log(multiplication_caisse)
    console.log("tableau m")

    $("#total").on("click",function(){
        for(var i=0;i<multiplication_caisse.length;i++){
            /*entier3 = parseInt(multiplication_caisse[i])
            console.log(Number.isInteger(entier3))*/
            console.log(multiplication_caisse[i])
            resultat += multiplication_caisse[i]
        }
        $("#resultat").append("<p style='font-size:20px;margin-top:20px;'>Total = "+resultat+"</p>")
    });

    $("#caisse").on("click",function () {
        //alert($(this).children("option:selected").val())
        console.log("data")  

        $.post(
            '../startbootstrap/ajax/caisse',
            {
                resultat : resultat
            },
            function (data) {
                console.log("data")  
                console.log(data.somme)
                console.log("data")  

                //$("#resultat").append("<p style='font-size:20px;'>Le nouveau montant de la caisse = "+data.somme+"</p>")
            },
            'json'
        );
    });


    $("#valider").on("click",function(){
        
        for(var i=0;i<tableau_pr_somme.length;i++){
            somme += tableau_pr_somme[i]
        }
        $("#un").append(somme)
        $("#deux").append(somme)

        var lien = $("#signer").attr("href")
        var lien_NP = $("#signer_NP").attr("href")

        var lien2 = $("#signer2").attr("href")

                console.log("qte")
                console.log($("input#qte_insertion"))
                console.log("qte")
                lien = lien + "&taille="+tableau_pr_somme.length+"&paye=paye"
                lien_NP = lien_NP + "&taille="+tableau_pr_somme.length+"&paye=nonpaye"

                $("#signer").attr("href",lien)
                $("#signer_NP").attr("href",lien_NP)

                lien2 = lien2 + "&taille="+tableau_pr_somme.length
                $("#signer2").attr("href",lien2)
    });

    //if($("#frites1").attr(checked)=="checked"){alert("kikou")}
    
    //alert(tableau_21)
    /*$("#signer").on("click",function(){
        /*window.location.href = "http:www.monsite.com/";
        //Redirection similaire à un clic sur un lien

        window.location.href += '&a=5&value=toto';
        alert("i"+i)
        var lien = $("#signer").attr("href")
        lien = lien + "&taille="+produits.length
        /*for(var j=0;j<i;j++){
            lien = lien + "&produit"+j+"="+tableau_21[j]+"&qte"+j+"="+tableau_21_qte[j]+"&prix_DV"+j+"="+tableau_21_prix[j]
        }        
        $("#signer").attr("href",lien)
    });*/


    $("#inserer").on("click",function () {
        alert("soir")
        var tableau_inputs = $("input.les_inputs")
        //var input_nom = tableau_nom[0]
        console.log(tableau_inputs)
        var tableau2=[]
        for(var i=0;i<tableau_inputs.length;i++){
            tableau2.push(tableau_inputs[i].value)
        }
        $.post(
            '../startbootstrap/ajax/tableau',
            {
                //nom_distributeur : input_nom,
                tableau_inputs : tableau2,  

                tableau : tableau,
                //tableau_inputs : tableau2,  
            },
            function (data) {
                console.log(data)
                var tableau_chaines = data.tableau
                var url = window.location.search.substring(1);
                var varUrl = url.split('&');        
                var tableau_nom2 = []
                var tableau_nom = []

                var tableau_adresse = []
                var tableau_mail = []
                var tableau_telephone = []
                var tableau_taille = []
                var tableau_commande = []
                var tableau_facture = []
                var tableau_alerte = []
                var tableau_details = []


                for(var i=0;i<varUrl.length;i++){
                    console.log(varUrl[i])
                    var parameter = varUrl[i].split('=');
                    if (parameter[0] == "enseigne")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_nom.push(result)        
                    }
                    if (parameter[0] == "details")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_details.push(result)        
                    }
                    if (parameter[0] == "nom")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_nom2.push(result)        
                    }
                    if (parameter[0] == "adresse")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_adresse.push(result)        
                    }
                    if (parameter[0] == "mail")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_mail.push(result)        
                    }
                    if (parameter[0] == "telephone")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_telephone.push(result)        
                    }
                    if (parameter[0] == "num_facture")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_facture.push(result)        
                    }if (parameter[0] == "num_commande")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_commande.push(result)        
                    }
                    if (parameter[0] == "alerte")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_alerte.push(result)        
                    }
                    if (parameter[0] == "taille")
                    {
                        console.log(parameter[1]);
                        let result = parameter[1].replace("%20", " ");
                        console.log(result)
                        tableau_taille.push(result)        
                    }
                }
                console.log("enseigne")
                console.log(tableau_adresse[0])
                console.log("enseigne")

                for(var i=0;i<tableau_chaines.length;i++){
                    console.log(data.tableau_prix[i])
                    $("#tableau").append("<tr><td>"+tableau_chaines[i]+"</td><td>"+data.tableau2[i]+"</td><td>"+data.tableau_prix[i]+"</td></tr>")
                    var tableau_trois=[]
                    tableau_trois.push=tableau_details[0]
                    tableau_trois.push=tableau_nom2[0]
                    tableau_trois.push=tableau_adresse[0]


                    var chaine_vers = "trt7.php?details="+tableau_details[0]+"&nom="+tableau_nom2[0]
                    //+"&mail="+tableau_mail[0]+"&telephone="+tableau_telephone[0]+"&num_facture="+tableau_facture[0]+"&num_commande="+tableau_commande[0]+"&paiement=&alerte="+tableau_alerte[0]+"&taille="+tableau_taille[0];
                    //chaine_vers = chaine_vers+"&produit"+i+"="+tableau_chaines[i]+"&qte"+i+"="+data.tableau2[i]+"&prix_vente"+i+"="+data.tableau_prix[i]+"&enseigne="+tableau_nom[0];
                }
                $("#bouton").html("<a id='lien_marche_pas' href="+chaine_vers+"><button style='margin-top:30px;' type='button' class='btn btn-success btn-lg'>Signer</button></a><br/><br/><br/>")
                $("#lien_marche_pas").attr("href")
                var lien = $("#lien_marche_pas").attr("href")
                lien = lien + "&adresse="+tableau_adresse[0]+"&mail="+tableau_mail[0]+"&telephone="+tableau_telephone[0]+"&num_facture="+tableau_facture[0]+"&num_commande="+tableau_commande[0]+"&paiement=&alerte="+tableau_alerte[0]+"&taille="+tableau.length+"&enseigne="+tableau_nom[0];;
                for(var i=0;i<tableau_chaines.length;i++){
                    lien = lien + "&produit"+i+"="+tableau_chaines[i]+"&qte"+i+"="+data.tableau2[i]+"&prix_DV"+i+"="+data.tableau_prix[i]
                }
               
                //alert(lien)
                $("#lien_marche_pas").attr("href",lien)
            },
            'json'
        );
    });

    $("#bouton_BL_BC4").on("click",function () {
        //alert($(this).children("option:selected").val())
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');        
        var tableau_nom = []
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)
   
            }
        }
        console.log(tableau_nom[0])
        var tableau_inputs = $("input.les_inputs")
        var input_nom = tableau_nom[0]
        console.log(tableau_inputs)
        var tableau2=[]
        for(var i=0;i<tableau_inputs.length;i++){
            tableau2.push(tableau_inputs[i].value)
        }
        console.log(tableau2)

        $.post(
            '../startbootstrap/ajax/avant_export_facture2',
            {
                nom_distributeur : input_nom,
                tableau : tableau,
                tableau_inputs : tableau2,  
            },
            function (data) {  
                ///console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")
                    console.log("article")
                    console.log(data.article[i])
                    console.log("article")

                }
                console.log("details")  
                console.log(data.nom)
                console.log("details")  

                $("#message").append("<a id='lien' style='text-decoration:none' href='voir_BC.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement=&alerte="+data.alerte+"&enseigne="+data.enseigne+"'><button class='btn btn-success btn-lg btn-block'>Voir BC</button></a><br/><br/><br/> ")  
                       
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
               
                console.log(chaine)
                $("#commande").html(chaine)                
                var lien = $("#lien").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                var lien = $("#lien").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                });
                //alert(lien)
            },
            'json'
        );
    });

   /* $("#bouton_sans_select").on("click",function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        var tableau_nom = []
        for(var i=0;i<varUrl.length;i++){
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                let result = parameter[1].replace("%20", " ");
                tableau_nom.push(result)    
            }
        }
        //var tableau_inputs = $("input.les_inputs")
        //console.log(tableau_inputs)
        var input_nom = tableau_nom[0]
        //console.log(tableau_inputs)
        var tableau2=[]
        /*for(var i=0;i<tableau_inputs.length;i++){
            tableau2.push(tableau_inputs[i].value)
        }
        alert(tableau2)

        $.post(
            '../startbootstrap/ajax/avant_export_facture3',
            {
                nom_distributeur : input_nom,
                /*tableau : tableau,
                tableau_inputs : tableau2,  
            },
            function (data) {  
                ///console.log(data.tableau_commandes)                
                alert("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")
                    console.log("article")
                    console.log(data.article[i])
                    console.log("article")

                }
                console.log("details")  
                console.log(data.nom)
                console.log("details")  

                $("#message").append("<a id='lien' style='text-decoration:none' href='voir_BC.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement=&alerte="+data.alerte+"&enseigne="+data.enseigne+"'><button class='btn btn-success btn-lg btn-block'>Voir BC</button></a><br/><br/><br/> ")  
                       
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
               
                console.log(chaine)
                $("#commande").html(chaine)                
                var lien = $("#lien").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                var lien = $("#lien").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                });
                //alert(lien)
            },
            'json'
        );
    });*/

    $("#bouton_sans_select").on("click",function () {
       
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        var tableau_nom = []
        for(var i=0;i<varUrl.length;i++){
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                let result = parameter[1].replace("%20", " ");
                tableau_nom.push(result)    
            }
        }
        //var tableau_inputs = $("input.les_inputs")
        //console.log(tableau_inputs)
        var input_nom = tableau_nom[0]
        //console.log(tableau_inputs)
        var tableau2=[]
        $.post(
            '../startbootstrap/ajax/avant_export_facture3',
            {
                nom_distributeur : input_nom,
                 
            },
            function (data) {  
               
                alert(data.num_commande)
            },
            'json'
        );
        /*for(var i=0;i<tableau_inputs.length;i++){
            tableau2.push(tableau_inputs[i].value)
        }*/
        //alert(tableau2)
    });

        /*$("#bouton_BL_BC4").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        console.log("je suis la")
        console.log($("input.les_inputs"))

    var url = window.location.search.substring(1);
    var varUrl = url.split('&');
    console.log("lien")
    console.log(varUrl)
    console.log("lien")
    var tableau_nom = []
    for(var i=0;i<varUrl.length;i++){
        console.log(varUrl[i])
        var parameter = varUrl[i].split('=');
        if (parameter[0] == "nom")
        {
            console.log(parameter[1]);
            let result = parameter[1].replace("%20", " ");
            console.log(result)
            tableau_nom.push(result)

        }
    }
    console.log(tableau_nom[0])

        var tableau_inputs = $("input.les_inputs")
        console.log(tableau_inputs)
        //var paiement = $("select.paiement").children("option:selected").val()  
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)
        console.log("pharmacie1")
        console.log($("#p_nom").html())  
        console.log("pharmacie1")  
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        //var input_nom = $("input#distributeur")[0].value
        $.post(
            '../startbootstrap/ajax/avant_export_facture2',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                tableau_inputs : $("input.les_inputs"),
                tableau : tableau                
            },
            function (data) {  
                ///console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")
                    console.log(data.article[i])
                }
                console.log("details")  
                console.log(data.nom)
                console.log("details")  

                $("#message").append("<a id='lien' style='text-decoration:none' href='voir_BC.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement=&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Voir BC</button></a><br/><br/><br/> ")  
                       
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
               
                console.log(chaine)
                $("#commande").html(chaine)                
                var lien = $("#lien").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                var lien = $("#lien").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                });
                //alert(lien)
            },
            'json'
        );
    });*/

    $("select.distributeur").change(function () {
        console.log($(this).children("option:selected").val())

    });



    /*$("#bouton_caisse").on('click', function () {
        var tableau_inputs = $("input.les_inputs")        

        var input_nom = $("input#nom")[0].value
        var textarea_adresse = $("textarea#adresse")[0].value
        var input_telephone = $("input#telephone")[0].value
        var input_mail = $("input#mail")[0].value
        //console.log($("select.distributeur").children("option:selected").val())
        var select_distributeur = $("select.distributeur").children("option:selected").val()
        console.log("case")
        console.log(select_distributeur[1].value)
        console.log("case")

        console.log(tableau)
        console.log(tableau_inputs)
        for (i = 0; i < tableau_inputs.length; ++i) {
            console.log(tableau_inputs[i].value)            
        }
        $("#message").html("<h5>Votre facture va être créée, ces éléments y apparaîtront :<br/>"+input_nom+"<br/>"+textarea_adresse+"<br/>"+input_telephone+"<br/>"+input_mail+"</h5>")
        for (i = 0; i < tableau_inputs.length; ++i) {
            console.log(tableau_inputs[i].value)
            $("#message").append("<h5>"+tableau[i]+"</h5>")          
        }
        $("#message").append("<a style='text-decoration:none' href='export_facture2.php?nom="+input_nom+"&adresse="+textarea_adresse+"&mail="+input_mail+"&telephone="+input_telephone+"'><button class='btn btn-success btn-lg btn-block'>Valider</button></a>")          

    });*/

    $("#bouton_caisse").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        var tableau_inputs = $("input.les_inputs")
        var paiement = $("select.paiement").children("option:selected").val()  
        alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)      
        $.post(
            '../startbootstrap/ajax/avant_export_facture',
            {
                id : $("select.distributeur").children("option:selected").val(),
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau
               
            },
            function (data) {  
               
                console.log("cellule")


                $("#message").html("<h5>Votre facture va être créée, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")

                    console.log(data.article[i])
                }
                $("#message").append("kikou")
                /*for (i = 0; i < tableau_inputs.length; ++i) {
                    //console.log(tableau_inputs[i].value)
                    var article_num = article+i
                    console.log(data.article_num)
                    $("#message").append("<h5>"+tableau[i]+"</h5>")          
                }*/
                //$("#message").html(data.nom)
                //console.log(data.num_facture);
                $("#message").append("<a id='lien' style='text-decoration:none' href='export_facture2.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement="+paiement+"'><button class='btn btn-success btn-lg btn-block'>Valider</button></a>")          
                var lien = $("#lien").attr("href")
                alert(lien)
                //lien = lien + "&produit="+itableau
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&qte"+i+"="+data.qte[i]+"&prix_vente"+i+"="+data.prix_vente[i]
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                alert(lien)
                $("#lien").attr("href",lien)
                var lien = $("#lien").attr("href")
                alert(lien)
            },
            'json'
        );
    });

    $("#distributeur_btn").on('click', function () {
        $.post(
            'ajax/creation_distributeur',
            {
                nom : $("input#nom")[0].value,
                adresse : $("input#adresse")[0].value,
                telephone : $("input#telephone")[0].value,
                details_adresse : $("input#details_adresse")[0].value,
                mail : $("input#mail")[0].value,
            },
            function (data) {
                if (data == 'success') {
                    window.location.href = 'creation_BC_BL3.php';
                }
            },
            'text'
        );
    });

    $("#bouton_BL_BC").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        var tableau_inputs = $("input.les_inputs")
        var paiement = $("select.paiement").children("option:selected").val()  
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)    
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/avant_export_facture',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau
               
            },
            function (data) {  
                console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")
                    console.log(data.article[i])
                }                          
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i][0]+" en date du "+data.tableau_commandes[i][1]+"</option>"
                }
                console.log(chaine)
                $("#message").append("<a id='lien' style='text-decoration:none' href='trt.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement="+paiement+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer BC+BL</button></a><br/><br/><br/><h5>Si vous voulez créer une facture, choisir un moyen de paiement :</h5><select style='margin-bottom=100px;' class='form-control paiement3' id='paiement3'><option value='' >Choisir un moyen de paiement...</option><option value='Paypal'>Paypal</option><option value='Chèque'>Chèque</option><option value='Espèces'>Espèces</option><option value='Carte bleue'>Carte bleue</option></select><h5 style='margin-top:10px;'>Et choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<select id='commande' class='form-control commande'><option>Choisir la commande...</option></select>")  
                $("#commande").html(chaine)                
                 $("#message").append("<br/><br/><a id='lien2' style='text-decoration:none' href='export_facture3.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer facture</button></a>")          
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                    lien2 = lien2 + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                lien2 =  lien2 + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                $("#lien2").attr("href",lien2)
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                    lien2 = lien2 +"&paiement="+paiement
                    $("#lien2").attr("href",lien2)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien2 = lien2 +"&commande="+commande
                    $("#lien2").attr("href",lien2)
                });
                //alert(lien)
            },
            'json'
        );
    });  
   
    $("#bouton_BL_BC3").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        var tableau_inputs = $("input.les_inputs")
        var paiement = $("select.paiement").children("option:selected").val()  
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)    
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/avant_export_facture',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau
               
            },
            function (data) {  
                console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :</h5><br/>"+"<br/><img style='width:30px;' src='./img/puce.png'/>"+data.nom+"<br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<img style='width:30px;' src='./img/puce.png'/>"+data.article[i]+"<br/>")
                    console.log(data.article[i])
                }                          
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i][0]+" en date du "+data.tableau_commandes[i][1]+"</option>"
                }
                console.log(chaine)
                $("#message").append("<br/><br/><br/><h5>Choisissez un moyen de paiement :</h5><br/><select style='margin-bottom=100px;' class='form-control paiement3' id='paiement3'><option value='' >Choisir un moyen de paiement...</option><option value='Paypal'>Paypal</option><option value='Chèque'>Chèque</option><option value='Espèces'>Espèces</option><option value='Carte bleue'>Carte bleue</option></select><br/><h5 style='margin-top:10px;'>Et choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select>")  
                $("#commande").html(chaine)                
                 $("#message").append("<br/><br/><a id='lien2' style='text-decoration:none' href='export_facture3.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer facture</button></a>")          
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                    lien2 = lien2 + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                lien2 =  lien2 + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                $("#lien2").attr("href",lien2)
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                    lien2 = lien2 +"&paiement="+paiement
                    $("#lien2").attr("href",lien2)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien2 = lien2 +"&commande="+commande
                    $("#lien2").attr("href",lien2)
                });
                //alert(lien)
            },
            'json'
        );
    });

    $("#bouton_BL_BC5").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        var tableau_inputs = $("input.les_inputs")
        var paiement = $("select.paiement").children("option:selected").val()  
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)    
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/avant_export_facture',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau
               
            },
            function (data) {  
                console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :</h5><br/>"+"<br/><img style='width:30px;' src='./img/puce.png'/>"+data.nom+"<br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<img style='width:30px;' src='./img/puce.png'/>"+data.article[i]+"<br/>")
                    console.log(data.article[i])
                }                          
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i][0]+" en date du "+data.tableau_commandes[i][1]+"</option>"
                }
                console.log(chaine)
                $("#message").append("<br/><br/><br/><h5>Choisissez un moyen de paiement :</h5><br/><select style='margin-bottom=100px;' class='form-control paiement3' id='paiement3'><option value='' >Choisir un moyen de paiement...</option><option value='Paypal'>Paypal</option><option value='Chèque'>Chèque</option><option value='Espèces'>Espèces</option><option value='Carte bleue'>Carte bleue</option></select><br/><h5 style='margin-top:10px;'>Et choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select>")  
                $("#commande").html(chaine)                
                 $("#message").append("<br/><br/><a id='lien2' style='text-decoration:none' href='export_facture3.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer facture</button></a>")          
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                    lien2 = lien2 + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                lien2 =  lien2 + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                $("#lien2").attr("href",lien2)
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                    lien2 = lien2 +"&paiement="+paiement
                    $("#lien2").attr("href",lien2)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien2 = lien2 +"&commande="+commande
                    $("#lien2").attr("href",lien2)
                });
                //alert(lien)
            },
            'json'
        );
    });

    $("#bouton_BL_BC6").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
       
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)    
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/avant_export_facture',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau
               
            },
            function (data) {  
                console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :</h5><br/>"+"<br/><img style='width:30px;' src='./img/puce.png'/>"+data.nom+"<br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<img style='width:30px;' src='./img/puce.png'/>"+data.article[i]+"<br/>")
                    console.log(data.article[i])
                }                          
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i][0]+" en date du "+data.tableau_commandes[i][1]+"</option>"
                }
                console.log(chaine)
                $("#message").append("<br/><br/><br/><h5>Choisissez un moyen de paiement :</h5><br/><select style='margin-bottom=100px;' class='form-control paiement3' id='paiement3'><option value='' >Choisir un moyen de paiement...</option><option value='Paypal'>Paypal</option><option value='Chèque'>Chèque</option><option value='Espèces'>Espèces</option><option value='Carte bleue'>Carte bleue</option></select><br/><h5 style='margin-top:10px;'>Et choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select>")  
                $("#commande").html(chaine)                
                 $("#message").append("<br/><br/><a id='lien2' style='text-decoration:none' href='export_facture3.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer facture</button></a>")          
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                    lien2 = lien2 + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                lien2 =  lien2 + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                $("#lien2").attr("href",lien2)
                var lien = $("#lien").attr("href")
                var lien2 = $("#lien2").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                    lien2 = lien2 +"&paiement="+paiement
                    $("#lien2").attr("href",lien2)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien2 = lien2 +"&commande="+commande
                    $("#lien2").attr("href",lien2)
                });
                //alert(lien)
            },
            'json'
        );
    });

    $("#bouton_distributeur").on('click', function () {
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='voir_BL.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"'><button class='btn btn-success btn-lg btn-block' type='button'>créer pdf BL</button></a>");
                var lien3 = $("#lien3").attr("href")

                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&commande="+commande
                    $("#lien3").attr("href",lien3)

                });
            },
            'json'
        );
    });

    $("#bouton_distributeur2").on('click', function () {
        alert("ça marche")
       
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='voir_facture.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Voir facture</button></a>");
                var lien3 = $("#lien3").attr("href")

                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&commande="+commande
                    $("#lien3").attr("href",lien3)

                });
            },
            'json'
        );
    });

    $("#bouton_distributeur3").on('click', function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        console.log("lien")
        console.log(varUrl)
        var tableau_nom=[]
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)    
            }
        }
        console.log(tableau_nom[0])
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                $("#message").append("<a id='lien3' style='margin-bottom:40px;text-decoration:none;' href='imprim_vente_facture.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"&paye=paye'><button class='btn btn-success btn-lg btn-block' type='button' style='margin-bottom:40px;'>Editer facture payée</button></a>");
                $("#message").append("<a id='lien4' style='margin-top:40px;text-decoration:none;' href='imprim_vente_facture.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"&paye=nonpaye'><button class='btn btn-success btn-lg btn-block' type='button'>Editer facture non payée</button></a>");

                var lien3 = $("#lien3").attr("href")
                var lien4 = $("#lien4").attr("href")


                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&num_commande="+commande+"&num_facture="
                    lien4 = lien4 + "&num_commande="+commande+"&num_facture="

                    $("#lien3").attr("href",lien3)
                    $("#lien4").attr("href",lien4)


                });
            },
            'json'
        );
    });

    $("#bouton_distributeur5").on('click', function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        console.log("lien")
        console.log(varUrl)
        var tableau_nom=[]
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)    
            }
        }
        console.log(tableau_nom[0])
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log("alerte")
                console.log(data.alerte)
                console.log("alerte")

                $("#commande").html(chaine)
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='voir_facture_DV.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&alerte="+data.alerte+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes=&details="+data.details+"&prix=DV'><button class='btn btn-success btn-lg btn-block' type='button'>Voir facture</button></a>");
                var lien3 = $("#lien3").attr("href")

                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&commande="+commande+"&num_facture="
                    $("#lien3").attr("href",lien3)
                });
            },
            'json'
        );
    });

    $("#bouton_distributeur4").on('click', function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        console.log("lien")
        console.log(varUrl)
        var tableau_nom=[]
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)    
            }
        }
        console.log(tableau_nom[0])
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                //$("#message").append("<a id='lien3' style='text-decoration:none;' href='voir_BL2.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Créer PDF BL</button></a>");
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='export_imprim_BL.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Créer PDF BL</button></a>");

                var lien3 = $("#lien3").attr("href")

                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&commande="+commande
                    $("#lien3").attr("href",lien3)

                });
            },
            'json'
        );
    });
    $("#bouton_distributeur7").on('click', function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        console.log("lien")
        console.log(varUrl)
        var tableau_nom=[]
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)    
            }
        }
        console.log(tableau_nom[0])
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                //$("#message").append("<a id='lien3' style='text-decoration:none;' href='voir_BL2.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Créer PDF BL</button></a>");
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='facture_vente.php?paye=paye&details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes=&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Créer PDF facture payée</button></a>");
                $("#message").append("<br/><a id='lien4' style='text-decoration:none;' href='facture_vente.php?paye=nonpaye&details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes=&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Créer PDF facture non payée</button></a>");

                var lien3 = $("#lien3").attr("href")
                var lien4 = $("#lien4").attr("href")


                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + "&num_commande="+commande
                    lien4 = lien4 + "&num_commande="+commande

                    $("#lien3").attr("href",lien3)
                    $("#lien4").attr("href",lien4)

                    $.post(
                        '../startbootstrap/ajax/facture_vente',
                        {
                            num_commande : commande
                        },
                        function (data) {
                            for(var i=0;i<data.taille;i++){
                                console.log(i)
                                lien3 = lien3 + "&produit"+i+"="+data.produits[i] + "&prix_DV"+i+"="+data.prix_DV[i]+ "&prix_vente"+i+"="+data.prix_vente[i]+ "&qte"+i+"="+data.qte[i]
                                lien4 = lien4 + "&produit"+i+"="+data.produits[i] + "&prix_DV"+i+"="+data.prix_DV[i]+ "&prix_vente"+i+"="+data.prix_vente[i]+ "&qte"+i+"="+data.qte[i]

                            }
                            
                            lien3 = lien3 + "&alerte="+data.alerte + "&num_facture="+data.num_facture+"&taille="+data.taille
                            lien4 = lien4 + "&alerte="+data.alerte + "&num_facture="+data.num_facture+"&taille="+data.taille

                            $("#lien3").attr("href",lien3)
                            $("#lien4").attr("href",lien4)
                            
                        },
                        'json'

                        );
                });
            },
            'json'
        );
    });

    /*$("#editer").on('click', function () {
        alert($("#select_BC").children("option:selected").val())

    });*/

    $("#select_BC").change(function(){
        //alert($("#select_BC").children("option:selected").val()+"kikou")
        var lien = $("#editer").attr("href")
        var lien2 = $("#mail_BC_liste").attr("href")
        //var rajout = "mail_BC_liste.php?file="+$("#select_BC").children("option:selected").val()
        var rajout = "mail_intermediaire.php?file="+$("#select_BC").children("option:selected").val()
        var fichier = "upload/"+$("#select_BC").children("option:selected").val()
        var fichier2 = $.trim(fichier)
        //alert(fichier2+"kikou")
        lien = lien + fichier2
        lien2 = lien2 + rajout
        $("#editer").attr("href",lien)
        $("#mail_BC_liste").attr("href",lien2)
        //$('#select_BC').prop('selectedIndex',0);    
    });

    $("#select_BL").change(function(){
        //$('#select_BC').prop('selectedIndex',0);
        //alert($("#select_BC").children("option:selected").val()+"kikou")
        var lien = $("#editer").attr("href")
        var lien2 = $("#mail_BC_liste").attr("href")
        //var rajout = "mail_BL_liste.php?file="+$("#select_BL").children("option:selected").val()
        var rajout = "mail_intermediaire_BL?file="+$("#select_BL").children("option:selected").val()
        var fichier = "upload/"+$("#select_BL").children("option:selected").val()
        var fichier2 = $.trim(fichier)
        //alert(fichier2+"kikou")
        lien = lien + fichier2
        lien2 = lien2 + rajout
        $("#editer").attr("href",lien)
        $("#mail_BC_liste").attr("href",lien2)
    });

    $("#select_facture").change(function(){
        //alert($("#select_BC").children("option:selected").val()+"kikou")
        var lien = $("#editer").attr("href")
        var lien2 = $("#mail_BC_liste").attr("href")
        var rajout = "mail_intermediaire_facture?file="+$("#select_facture").children("option:selected").val()
        var fichier = "upload/"+$("#select_facture").children("option:selected").val()
        var fichier2 = $.trim(fichier)
        //alert(fichier2+"kikou")
        lien = lien + fichier2
        lien2 = lien2 + rajout
        $("#editer").attr("href",lien)
        $("#mail_BC_liste").attr("href",lien2)
    });

    $("#btn_adresse").on('click', function () {
        alert($("input#adresse")[0].value)


    });


    $("#bouton_distributeur6").on('click', function () {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        console.log("lien")
        console.log(varUrl)
        var tableau_nom=[]
        for(var i=0;i<varUrl.length;i++){
            console.log(varUrl[i])
            var parameter = varUrl[i].split('=');
            if (parameter[0] == "nom")
            {
                console.log(parameter[1]);
                let result = parameter[1].replace("%20", " ");
                console.log(result)
                tableau_nom.push(result)    
            }
        }
        console.log(tableau_nom[0])
        var input_nom = tableau_nom[0]
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/distributeur',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                input_nom : input_nom,
                //tableau_inputs : $("input.les_inputs")
            },
            function (data) {
                console.log(data.tableau_commandes)
                $("#message").append("Choisir un numéro de commande (ci-dessous une liste déroulante des commandes faites par le distributeur que vous avez choisi) :<br/><br/><select id='commande' class='form-control commande'><option>Choisir la commande...</option></select><br/>")  
                var chaine = '<option>Choisissez la commande...</option>';
                for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i]+"</option>"
                }
                console.log(chaine)
                $("#commande").html(chaine)
                //$("#message").append("<a id='lien3' style='text-decoration:none;' href='imprim_liste_BC.php?details="+data.details+"&nom="+data.nom+"&alerte="+data.alerte+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&enseigne="+data.enseigne+"&tableau_commandes="+data.tableau_commandes+"&details="+data.details+"'><button class='btn btn-success btn-lg btn-block' type='button'>Voir bons de commande</button></a>");
                $("#message").append("<a id='lien3' style='text-decoration:none;' href='upload/'><button class='btn btn-success btn-lg btn-block' type='button'>Voir bons de commande</button></a>");

                var lien3 = $("#lien3").attr("href")

                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                    lien3 = lien3 + commande+".pdf"
                    $("#lien3").attr("href",lien3)

                });
            },
            'json'
        );
    });


   
    $("#bouton_BL_BC2").on('click', function () {
        //console.log($("select.distributeur").children("option:selected").val())
        console.log("je suis la")
        var tableau_inputs = $("input.les_inputs")
        var paiement = $("select.paiement").children("option:selected").val()  
        //alert(paiement)
        //console.log(tableau_inputs)        
        //console.log(tableau_inputs)    
        var input_nom = $("input#distributeur")[0].value
        console.log(input_nom)
        $.post(
            '../startbootstrap/ajax/avant_export_facture2',
            {
                //id : $("select.distributeur").children("option:selected").val(),
                nom_distributeur : input_nom,
                //tableau_inputs : $("input.les_inputs")
                tableau : tableau                
            },
            function (data) {  
                ///console.log(data.tableau_commandes)                
                console.log("cellule")
                $("#message").html("<h5>Votre document va être créé, ces éléments y apparaîtront :<br/>"+"<br/>"+data.nom+"<br/><br/>")
                for (i = 0; i < data.article.length; ++i) {
                    $("#message").append("<h5>"+data.article[i]+"</h5><br/>")
                    console.log(data.article[i])
                }
                console.log("details")  
                console.log(data.nom)
                $("#message").append("<a id='lien' style='text-decoration:none' href='trt.php?details="+data.details+"&nom="+data.nom+"&adresse="+data.adresse+"&mail="+data.mail+"&telephone="+data.telephone+"&num_facture="+data.num_facture+"&num_commande="+data.num_commande+"&paiement="+paiement+"&alerte="+data.alerte+"'><button class='btn btn-success btn-lg btn-block'>Créer BC+BL</button></a><br/><br/><br/> ")  
                       
                console.log($("select.paiement").children("option:selected").val())
                var chaine = '<option>Choisissez la commande...</option>';
                /*for (i = 0; i < data.tableau_commandes.length; ++i) {                    
                    chaine = chaine+"<option value='"+data.tableau_commandes[i]+"'>commande numéro "+data.tableau_commandes[i][0]+" en date du "+data.tableau_commandes[i][1]+"</option>"
                }*/
                console.log(chaine)
                $("#commande").html(chaine)                
                var lien = $("#lien").attr("href")
                for (i = 0; i < tableau_inputs.length; ++i) {
                    lien = lien + "&produit"+i+"="+data.article[i]+"&prix_vente"+i+"="+data.prix_vente[i]+"&qte"+i+"="+tableau_inputs[i].value
                }
                lien =  lien + "&taille="+data.taille_tableau_produits
                //alert(lien)
                $("#lien").attr("href",lien)
                var lien = $("#lien").attr("href")
                $("select.paiement3").change(function(){                    
                    var paiement = $(this).children("option:selected").val()
                    console.log(paiement)
                });
                $("select.commande").change(function(){  
                    console.log("commande")
                    var commande = ''
                    commande = $(this).children("option:selected").val()
                    console.log(commande)
                });
                //alert(lien)
            },
            'json'
        );
    });
   




 

 
    $("select.clients").change(function () {
        alert($(this).children("option:selected").val())
        $.post(
            '../startbootstrap/ajax/construire_select_client.php',
            {
                client: $(this).children("option:selected").val()
            },
            function (data3) {
                /*jQuery.each(data, function(key, value) {
                    // faire quelque chose avec `value` (ou `this` qui est `value` )
                    alert(key+": "+ value);
                }); */
                $("#clients_tr").html(data3.client);
                //alert(data3.client);
            },
            'json'
        );
    });


var variable_compteur = [];
/*$("select.produit").change(function(){
    //if(e.which == 13){//Enter key pressed
        console.log("22h02");//Trigger search button click event
        console.log($("input#input_produit")[0].value)
        $("#produit").append($("input#input_produit")[0].value+"<br/><br/><input class='les_inputs form-control type='text' class='form-control' style='margin-bottom:30px;'placeholder='entrez la quantité dans cette case'/>");
        $("#produit").append("Si vous voulez choisir un autre produit, entrez le dans la case ci-dessous et appuyez sur la touche entrée")
        variable_compteur.push("kikou");
        return variable_compteur
    //}
});*/
//console.log(variable_compteur)

$("form#formulaire").submit(function(){
    alert("Formulaire bien envoyé");
});

$('#search-stock').keyup(function () {
        $('#result-search').html('');
        //id=result-search c une div qui est avent le body :-0
        var stock = $(this).val();
        //ds l'input        
        if (stock != "") {
            //ds l'input
            $.ajax({
                type: 'POST',
                url: '../startbootstrap/ajax/barre_recherche.php',
                data: {
                    stocks_SN: stock,
                    //input
                },
                success: function (data) {
                    if (data !== "") {
                        console.log("data")
                        console.log(data);
                        console.log("data")
                        /*for (i = 0; i < data.length; ++i) {
                            console.log(data[i])
                        }*/
                        console.log($(".lien"))
                        console.log($(".lien"))

                        $("#result-search").css("padding", "1em");
                        //la div avant le body :-0
                        $('#result-search').append(data);
                        /*$("a.lien").on('click', function () {
                        console.log("23h28")
                        });*/
                        console.log($(".lien"))
                        var tableau_liens=$(".lien")
                        console.log(tableau_liens.length)
                        for (var i=1; i<tableau_liens.length; i++) {
                            console.log(tableau_liens[i]);
                            console.log($(tableau_liens[i]).attr("adresse"))
                            var identifiant = $(tableau_liens[i]).attr("id")
                            var cible = "#"+identifiant
                            console.log(cible)
                            console.log($(cible))
                            /*$("#btn"+j).on('click', function () {
                                console.log("23h28")
                            });*/
                            let tableau_adresse = ''
                            var cible_lien = $(this).attr("href")
                            for (let j = 0; j < 8; j++) { // <-- use let
                                $('#btn' + j).click(function() {
                                    console.log(j)
                                  //console.log($(this).attr("adresse"));
                                  //$("#a_linterieur").html($(this).attr("adresse"))
                                  //var adresse = $(this).attr("adresse")
                                  tableau_adresse =  $(this).attr("adresse")
                                  telephone =  $(this).attr("telephone")

                                  mail =  $(this).attr("mail")
                                  nom =  $(this).attr("nom")


                                  //console.log(tableau_adresse)
                                  //return tableau_adresse
                                  cible_lien ="creation_BC_BL3.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom
                                  $(this).attr("href",cible_lien)
                                });
                                /*$('#btn' + j).click(function(e){
                                    e.stopPropagation();
                                });*/
                              }
                              console.log("il va y avoir")

                              console.log(tableau_adresse)

                        }
                        /*for (var i = 0; i < 8; i++) {
                            console.log(i)
                            var tableau = tableau_liens[i]
                            console.log(tableau_liens[i])
                            tableau.on('click', function () {
                            console.log("23h28")
                        });
                    }*/

                   
                    } else {
                        //console.log(data);
                        $("#result-search").css("padding", "0");
                    }
                 }
            });
        } else {
            $("#result-search").css("padding", "0");
        }
   
});



$('#search-stock2').keyup(function () {
    $('#result-search').html('');
    //id=result-search c une div qui est avent le body :-0
    var stock = $(this).val();
    //ds l'input        
    if (stock != "") {
        //ds l'input
        $.ajax({
            type: 'POST',
            url: '../startbootstrap/ajax/barre_recherche2.php',
            data: {
                stocks_SN: stock,
                //input
            },
            success: function (data) {
                if (data !== "") {
                    console.log("data")
                    console.log(data);
                    console.log("data")
                    /*for (i = 0; i < data.length; ++i) {
                        console.log(data[i])
                    }*/
                    console.log($(".lien"))
                    console.log($(".lien"))

                    /*for (let j = 0; j < data.length; j++) {
                        var identifiant = 'a#' + j+'.lien';
                        //console.log(identifiant)
                        $(identifiant).click(function() {
                            console.log("un seul")
                          console.log(data[j]);
                          console.log("un seul")

                          $.post(
                            './ajax/afficher_details.php',
                            {
                                client: $(this).children("option:selected").val()
                            },
                            function (data3) {
                               
                                $("#clients_tr").html(data3.client);
                                //alert(data3.client);
                            },
                            'json'
                        );

                        });
                    }*/


                    $("#result-search").css("padding", "1em");
                    //la div avant le body :-0
                    $('#result-search').append(data);
                    /*$("a.lien").on('click', function () {
                    console.log("23h28")
                    });*/
                    console.log($(".lien"))
                    var tableau_liens=$(".lien")
                    console.log(tableau_liens.length)
                    for (var i=1; i<tableau_liens.length; i++) {
                        console.log(tableau_liens[i]);
                        console.log($(tableau_liens[i]).attr("adresse"))
                        var identifiant = $(tableau_liens[i]).attr("id")
                        var cible = "#"+identifiant
                        console.log(cible)
                        console.log($(cible))
                        /*$("#btn"+j).on('click', function () {
                            console.log("23h28")
                        });*/
                        let tableau_adresse = ''
                        var cible_lien = $(this).attr("href")
                        for (let j = 0; j < 8; j++) { // <-- use let
                            $('#btn' + j).click(function() {
                                console.log(j)
                              //console.log($(this).attr("adresse"));
                              //$("#a_linterieur").html($(this).attr("adresse"))
                              //var adresse = $(this).attr("adresse")
                              tableau_adresse =  $(this).attr("adresse")
                              telephone =  $(this).attr("telephone")

                              mail =  $(this).attr("mail")
                              nom =  $(this).attr("nom")
                              siret =  $(this).attr("siret")
                              enseigne =  $(this).attr("enseigne")
                              //console.log(tableau_adresse)
                              //return tableau_adresse
                              cible_lien ="un_distributeur.php?adresse="+tableau_adresse+"&telephone="+telephone+"&mail="+mail+"&nom="+nom+"&siret="+siret+"&enseigne="+enseigne
                              $(this).attr("href",cible_lien)
                            });
                            /*$('#btn' + j).click(function(e){
                                e.stopPropagation();
                            });*/
                          }
                          console.log("il va y avoir")

                          console.log(tableau_adresse)

                    }
                    /*for (var i = 0; i < 8; i++) {
                        console.log(i)
                        var tableau = tableau_liens[i]
                        console.log(tableau_liens[i])
                        tableau.on('click', function () {
                        console.log("23h28")
                    });
                }*/

               
                } else {
                    //console.log(data);
                    $("#result-search").css("padding", "0");
                }
             }
        });
    } else {
        $("#result-search").css("padding", "0");
    }

    });
});