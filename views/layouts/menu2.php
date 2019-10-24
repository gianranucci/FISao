<?php
    use app\assets\FrontAsset;
    FrontAsset::register($this);
?>

<div class="logo d-flex justify-content-start"><a href="index.php"><img src="images/log.png" width="150px" height="111px"></a></div>
         <div class="d-flex justify-content-end fixed-top bg-trasnparent">
                 <a target="_blank" href="http://www.facebook.com/FutbolInfantilSao" title="Facebook">
                     <img class="redes" src="images/facebook.png" alt="facebook">
				</a>
				<a target="_blank" href="http://www.twitter.com/FutbolInfantilSao" title="twitter">
                                    <img class="redes" src="images/twitter.ico" alt="twitter" width="32px" height="32px">
				</a>
				<a target="_blank" href="http://www.whatsapp.com/FutbolInfantilSao" title="whatsapp">
                                    <img class="redes" src="images/whatsapp.png" alt="whatsapp" width="32px" height="32px">
				</a>
             </div>
        <div class="top">
        <div class="nav d-flex justify-content-center">
            <div>
            <nav class="navbar navbar-expand-sm navbar-custom">
                <a class="navbar-brand" href="index.php">Home<i><img src="images/casa.png" width="20px" height="20px"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="calendario.php">Calendario<i><img src="images/calendario.png" width="20px" height="20px"></i></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galeriados.php">Galería<i><img src="images/galeria.png" width="20px" height="20px"></i></a>
                        </li>

                        <li class="nav-item mr-auto">
                            <a class="nav-link text-succes" href="contacto.php">Acerca de nosotros<i><img src="images/contacto.png" width="20px" height="20px"></i></a>
                        </li>
                        <?php
                        if (isset($_SESSION["usuario"])) :
                            ?>
                        <li class="nav-item bg-dark">
                                <a class="ad nav-link" href="admin.php">
                                    Administracion
                                </a>
                            </li>

                            <li class="nav-item bg-dark">
                                <a class="ad nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            </div>
        </div>
