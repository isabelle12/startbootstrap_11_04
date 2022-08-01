<div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:400px;">

<form action="" method="POST">
    <center>
        <h1 class="h3 mb-4 text-gray-800">Caisse : <br/> <?php //echo $req['categorie']." ";
                                                                         //echo $req['volume']." ";
                                                                         //echo $req['parfum'];?></h1>
    </center>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <form action="trt_caisse.php" method="POST">
                                <div class="row">

                                    <h5>Choisissez si c'est un distributeur ou un client : </h5>
                                    <br />
                                    <br />
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        Distributeurs 
                                        <br />
                                        <br />
                                        <select name="distributeur">
                                            <option value="kikou">kikou</option>
                                        </select>
                                        <button type="submit">valider</button>
</div>
</div>