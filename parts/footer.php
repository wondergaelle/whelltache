<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">

            <!-- Footer Location -->
            <div class="col-lg-4 mb-5 mb-lg-0">


                <?php if ($_SESSION["isConnected"]) {


                    echo  '<p> Nom : '.$_SESSION["userConnected"]["nom"];'</p> ';
                    echo ' <p></p><a href="index.php?dec">deconnexion</a> </p> ';
                } ?>

                <h4 class="text-uppercase mb-4">Adresse</h4>
                <p class="lead mb-0">31 allée des violettes
                    <br>le bonheur est ici</p>
            </div>

            <!-- Footer Social Icons -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">WHELLTACHE</h4>
                <div id="roue" class="wheel" >
                    <img class="roue" src="img/roue.png" alt="" style="width: 200px">
                </div>
            </div>

            <!-- Footer About Text -->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">About WhellTache</h4>
                <p class="lead mb-0">l'important c'est de participer !

            </div>

        </div>
    </div>
</footer>

<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
    <div class="container">
        <small>Copyright &copy; Your Website 2019</small>
    </div>
</section>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/freelancer.min.js"></script>

</body>

</html>
