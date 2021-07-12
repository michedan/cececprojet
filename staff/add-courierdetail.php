<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['cmssid'];
 $senbranchname=$_POST['senderbranchname'];
$sendername=$_POST['sendername'];
$sendercontnum=$_POST['sendercontactnumber'];
$senderadd=$_POST['senderaddress'];
$sendercity=$_POST['sendercity'];
$senderstate=$_POST['senderstate'];
$senderpincode=$_POST['senderpincode'];
$sendercountry=$_POST['sendercountry'];
$recname=$_POST['recipientname'];
$reccontactnumber=$_POST['recipientcontactnumber'];
$recadd=$_POST['recaddress'];
$reccity=$_POST['recipientcity'];
$recstate=$_POST['recipientstate'];
$recpincode=$_POST['recipientpincode'];
$reccountry=$_POST['recipientcountry'];
$courierdes=$_POST['courierdes'];
$courierwt=$_POST['courierwt'];
$parlength=$_POST['length'];
$parwidth=$_POST['width'];
$parheight=$_POST['height'];
$parprice=$_POST['parcelprice'];
$refnumber=mt_rand(100000000, 999999999);
$status='0';
 $query=mysqli_query($con,"insert into tblcourier(RefNumber,SenderBranch,SenderName,SenderContactnumber,SenderAddress,SenderCity,SenderState,SenderPincode,SenderCountry,RecipientName,RecipientContactnumber,RecipientAddress,RecipientCity,RecipientState,RecipientPincode,RecipientCountry,CourierDes,ParcelWeight,ParcelDimensionlen,ParcelDimensionwidth,ParcelDimensionheight,ParcelPrice,Status) value('$refnumber','$senbranchname','$sendername','$sendercontnum','$senderadd','$sendercity','$senderstate','$senderpincode','$sendercountry','$recname','$reccontactnumber','$recadd','$reccity','$recstate','$recpincode','$reccountry','$courierdes','$courierwt','$parlength','$parwidth','$parheight','$parprice','$status')");

    if ($query) {
    $msg="Le dossier a été ajouté avec succès.";
  }
  else
    {
      $msg="Errur. Veillez reéssayer";
    }

  
}

?>


<!doctype html>
<html lang="en">

    <head>
        <!-- App title -->
        <title>SGDC Doosier</title>

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Ajout Dossier</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                    <p style="font-size:16px; color:black" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="header-title m-t-0 m-b-30">Information sur le client</h4>
                                           
                                            <form name="submit" method="post"> 
                                                <fieldset class="form-group">
                                                    <label for="exampleInputEmail1">Agence d'envoi</label>
                                                    <select name='senderbranchname' id="senderbranchname" class="form-control white_bg" readonly='true'>
     
      <?php
      $sid=$_SESSION['cmssid']; 
      $query=mysqli_query($con,"select * from  tblstaff where ID=$sid");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['BranchName'];?>"><?php echo $row['BranchName'];?></option>
                  <?php } ?>  
   </select>
                                            
                                                    
                                                </fieldset>
                                                
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Nom Client</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="sendername" required="true">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleSelect1">Entreprise Client</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="sendercontactnumber" maxlength="40">
                                                </fieldset>
                                              
                                                <fieldset class="form-group">
                                                    <label for="exampleTextarea">Activité Client</label>
                                                    <input type="text" class="form-control" id="exampleTextarea" name="senderaddress" required="true">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label >Montant Sollicité</label>
                                                    <input class="form-control" type="text" name="sendercity" required="true">
                                                </fieldset>
                                                 <fieldset class="form-group">
                                                    <label >Durée Sollicité</label>
                                                    <input class="form-control" type="text" name="senderstate" required="true">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label >Type de Crédit</label>
                                                    <input class="form-control" type="text" name="senderpincode" maxlength="6" required="true">
                                                </fieldset>
                                                 <!-- <fieldset class="form-group">
                                                    <label >Sender Country</label>
                                                    <input class="form-control" type="text" name="sendercountry" required="true">
                                                </fieldset> -->
                                                
                                            
                                        </div><!-- end col -->

                                        <div class="col-xl-6 m-t-sm-40">
                                             <h4 class="header-title m-t-0 m-b-30">Informations sur le Récepteur</h4>
                                          
                                                <fieldset>
                            
                                                 
                                                        <label for="disabledSelect">Noms du Récepteur</label>
                                                       <input type="text" class="form-control m-b-20" id="exampleInputPassword1" name="recipientname" required="true">
                                              
                                                </fieldset>

                                                <!-- <fieldset>
                                                    <label >Contact du Récepteur</label>
                                                    <input class="form-control m-b-20" type="text"  name="recipientcontactnumber" required="true" maxlength="10">
                                                    
                                                    
                                                </fieldset> -->

                                                <fieldset>
                                                    <label>Contact du Récepteur</label>

                                                    <input class="form-control m-b-20" id="exampleTextarea" name="recaddress" required="true">

                                                   

                                                   
                                                    

                                                <!-- </fieldset>
                                                <fieldset>
                                                    <label >Recipient City</label>
                                                    <input class="form-control m-b-20" type="text"name="recipientcity" required="true">
                                                    
                                                    
                                                </fieldset> -->
                                                 <fieldset>
                                                    <label >Ville Récepteur</label>
                                                    <input class="form-control m-b-20" type="text" name="recipientstate" required="true">
                                                    
                                                    
                                                </fieldset>
                                                <fieldset>
                                                    <label >Code Récepteur</label>
                                                    <input class="form-control m-b-20" type="text" name="recipientpincode" required="true" maxlength="6">
                                                    
                                                    
                                                </fieldset>
                                                 
                                                 <!-- <fieldset class="form-group">
                                                    <label >Recipient Country</label>
                                                    <input class="form-control m-b-20" type="text" name="recipientcountry" required="true">
                                                </fieldset> -->
                                          
                                        </div>

                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->




                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
   

                                   <h4 class="header-title m-t-0 m-b-30">Détails Dossiers</h4>

                                    <div class="form-group row">
                                       
                                        <label for="example-text-input" class="col-2 col-form-label">Description du Dossier</label>
                                        <div class="col-10">
                                            <textarea class="form-control" type="text" value=""  name="courierdes" required="true" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Frais d'étude</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="courierwt" required="true">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Parcel Dimension(in inch)</label>
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="" id="" name="length" required="true">
                                        </div>X
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="w" id="" name="width" required="true">
                                        </div>X
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="" id="" name="height" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">Parcel Price</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="parcelprice" required="true">
                                        </div>
                                    </div> -->
                                   
                                    
                                   
                                                                     
                                                                
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button></p>
                                           
                                        </div>
                                        
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>


                       
                        <!-- end row -->


                    <!-- container -->




            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



            <?php include_once('includes/footer.php');?>


        </div>
    </div></div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>