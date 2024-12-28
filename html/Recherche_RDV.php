<!DOCTYPE html>
<head>
    <meta charset="utf-8"> <!-- Évite de faire des trics bizarres en PHP -->
    <link rel="stylesheet" href="../css/Commun.css">
    <link rel="stylesheet" href="../css/RDV.css">
</head>
<html>
    <body>
        <header>
            <!-- Si le code PHP ci-dessous apparaît comme un commentaire dans l'inspecteur du navigateur, il faut installer l'interprêteur sur la même machine que Apache -->
            <?php
                include('../php/NavBar.php');
                GetNavBar("Rechercher un rendez-vous", true);
            ?>
        </header>
        
        <main>
            <div class="bubbleslist">
                <!-- TODO il faut utiliser PHP pour injecter les résultats dans ce HTML lors de la recherche -->
                <div class="whitebubble">
                    <div class="whitebubblefield">
                        <div><b>Dr Prénom NOM</b></div>
                        <div><b>Spécialités</b></div>
                    </div>

                    <div class="whitebubblefield">
                        <div>établissement</div>
                    </div>
                    
                    <div class="whitebubblefield">
                        <div>Disponible dès : DD/MM/YYYY HH:mm</div>
                        <!-- Changer la couleur en rouge est un placeholder, il faut appeller une fonction JS -->
                        <div class="button" onclick="this.style.color = 'red'">prendre rdv</div>
                    </div>
                </div>

                <div class="whitebubble">
                    <div class="whitebubblefield">
                        <div><b>Dr Prénom NOM</b></div>
                        <div><b>Spécialités</b></div>
                    </div>

                    <div class="whitebubblefield">
                        <div>établissement</div>
                    </div>
                    
                    <div class="whitebubblefield">
                        <div>Disponible dès : DD/MM/YYYY HH:mm</div>
                        <!-- Changer la couleur en rouge est un placeholder, il faut appeller une fonction JS -->
                        <div class="button" onclick="this.style.color = 'red'">prendre rdv</div>
                    </div>
                </div>

                <div class="whitebubble">
                    <div class="whitebubblefield">
                        <div><b>Dr Prénom NOM</b></div>
                        <div><b>Spécialités</b></div>
                    </div>

                    <div class="whitebubblefield">
                        <div>établissement</div>
                    </div>
                    
                    <div class="whitebubblefield">
                        <div>Disponible dès : DD/MM/YYYY HH:mm</div>
                        <!-- Changer la couleur en rouge est un placeholder, il faut appeller une fonction JS -->
                        <div class="button" onclick="this.style.color = 'red'">prendre rdv</div>
                    </div>
                </div>

                <div class="whitebubble">
                    <div class="whitebubblefield">
                        <div><b>Dr Prénom NOM</b></div>
                        <div><b>Spécialités</b></div>
                    </div>

                    <div class="whitebubblefield">
                        <div>établissement</div>
                    </div>
                    
                    <div class="whitebubblefield">
                        <div>Disponible dès : DD/MM/YYYY HH:mm</div>
                        <!-- Changer la couleur en rouge est un placeholder, il faut appeller une fonction JS -->
                        <div class="button" onclick="this.style.color = 'red'">prendre rdv</div>
                    </div>
                </div>

                <div class="whitebubble">
                    <div class="whitebubblefield">
                        <div><b>Dr Prénom NOM</b></div>
                        <div><b>Spécialités</b></div>
                    </div>

                    <div class="whitebubblefield">
                        <div>établissement</div>
                    </div>
                    
                    <div class="whitebubblefield">
                        <div>Disponible dès : DD/MM/YYYY HH:mm</div>
                        <!-- Changer la couleur en rouge est un placeholder, il faut appeller une fonction JS -->
                        <div class="button" onclick="this.style.color = 'red'">prendre rdv</div>
                    </div>
                </div>

            </div>
        </main>
    </body>
</html>