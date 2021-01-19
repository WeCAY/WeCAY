<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />

    <script rel="script" type="text/javascript" src="./js/derouler.js"></script>
    <title>Accueil | WeCAY</title>
</head>

<footer>
    <div id="largeurPage">0</div>
    <div id = "block1">
        <div id="gauche">
            <img src="./image/next-2.png" class="fleche">
            <h1 onclick="montrer1()">INFORMATIONS PRATIQUES</h1>
            <hr>
            <p class="text1"><a href="../administratif/mentions_legales.pdf">Mentions légales</a></p>
            <p class="text1"><a href="protection.html">Protection des données</a></p>
        </div>
        <div id="centreg">
            <img src="./image/next-2.png" class="fleche">
            <h1 onclick="montrer2()">SERVICE CLIENT</h1>
            <hr>
            <p class="text2"><a href="mailto:contact@wecay.fr">Nous contacter</a></p>
            <p class="text2"><a href="./faq.php">FAQ</a></p>
        </div>
        <div id="centred">
            <h1 id="title3">SUIVEZ-NOUS</h1>
            <hr>
            <a href="https://www.instagram.com"><img src="../image/instagram.png" class="reseaux" alt="Logo Instagram" /></a>
            <a href="https://www.facebook.com"><img src="../image/facebook.png" class="reseaux" alt="Logo Facebook" /></a>
            <a href="https://www.twitter.com"><img src="../image/twitter.png" class="reseaux" alt="Logo Twitter" /></a>
            <a href="https://www.linkedin.com"><img src="../image/linkedin.png" class="reseaux" alt="Logo Linkedin" /></a>
        </div>
        <div id="droite">
            <h1>©2020 WeCAY, France</h1>
            <hr>
        </div>
    </div>
    <h1 id="news">NEWSLETTER</h1>
    <div id="block2">
        <label>Rejoingez notre newsletter pour être au courant de nos actualités et des dernières nouveautés</label>
        <div id="newsletter">
            <input type="email" placeholder="adresse.mail@wecay.com" name="mail" required>
            <input type="submit" id='subscribe' value="S'abonner" name="subscribe" >
        </div>
    </div>
</footer>