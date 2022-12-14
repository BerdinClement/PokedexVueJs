<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    async
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/semantic-ui@2/dist/semantic.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-react/dist/umd/semantic-ui-react.min.js"></script>
    <title>BUT APP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body onload="checkQuery()">
    <?php 
        session_start();

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("Location: login.php");
            exit;
        }
  ?>
    <div id="activeMenu" style="display: none; width: 100%; height: 6%; background-color: #1b1c1d; margin-bottom: 10px;">
        <i style="display: inline-block; color: white; margin-top:10px; margin-left :5px;" onclick="activeMenu()" class="terminal icon"></i> <h3 style="display: inline-block;color: white; margin-top:10px; margin-left :5px;">   Menu</h3>
    </div>
    
    <div style="width: 14%;" id="menu" class="ui sidebar visible inverted vertical menu">

        <h2 style="margin-bottom: 0px; width: 100%;" class="item"><a href="index.php">BUT 2 - APP </a> </h2>

        <h4 style="margin-top: 0px; margin-bottom: 0px;" class="item"><?php echo $_SESSION['username'] ?></h4>
    
        <a class="item" href='photo.php'>
            Voir les photos
        </a>
        <a class="item" href="profil.php">
            Voir mon profil
        </a>
        <a class="item"href="php/logout.php">
            Se deconnecter
        </a>
        <?php
            if($_SESSION['role']==='admin'){
                echo('
                    <a style="color: red;" class="item"href="addUser.php">
                        Ajouter un utilisateur
                    </a>
                ');
            }
        ?>

    </div>
    <div id="main" style="width: 86%; height:99%; float:right;">
        <div style="margin: 10px; height: 10%; margin-top: 0px;" class="ui red aligned segment">
            <h2>Bienvenue :)</h2> 
        </div>
        <div style="display: block; height: 89%; margin: 10px; margin-bottom: 0px;" class="messagerie">
            <section style="height: 84%; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey; overflow: auto;" id="messages">

            </section>
            <form style="height: 5%; padding-top: 10px;" class="ui form" action="php/sendMessage.php" method="post">
                <div style="width: 100%; padding-top: 10px; border-top: 1px solid red;" class="field">
                    <label style="font-size: 20px; padding-bottom: 5px;">Message :</label>
                    <input id="inputMessage" style="width: 81%;" type="text" name="message" placeholder="Entrez votre message..">
                    <button id="sendMessage" style="width: 18%; margin: 0px;" type="submit" name="valider" onclick="scrollToBottom()" class="ui button">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        setInterval(() => {
            $('#messages').load('php/loadMessage.php')
        }, 500);

        function checkQuery(){
            if (!window.matchMedia("(min-width: 800px)").matches) {
                let main = document.getElementById('main')
                let menu = document.getElementById('activeMenu')
                document.getElementById('menu').className = "ui sidebar inverted vertical menu";
                document.getElementById('menu').style.width="50%";
                document.getElementById('menu').style.heigth="0%";
                main.style.width=("95%")
                main.style.heigth=("94%")
                main.style.margin=("auto")
                main.style.float=("")
                menu.style.display = ('block')
                document.getElementById('inputMessage').style.width=("70%")
                document.getElementById('sendMessage').style.width=("29%")
            }
        }

        function scrollToBottom() {
            $('#messages').animate({
                scrollTop: $('#messages').height()
            }, 400);
        }

        function activeMenu() {
            document.getElementById('menu').className = "ui sidebar visible inverted vertical menu";
            document.getElementById('menu').style.heigth="100%";
        }

    </script>

</body>
</html>