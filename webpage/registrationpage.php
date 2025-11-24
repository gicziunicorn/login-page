<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adathalászat regisztráció</title>
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" href="./webpage/pics/pfp.png" type="image/x-icon">
</head>

<!--------------------
- email cím
- jelszó
- születési dátum
- telefonszám
- férfi/nő
- legmagasabb iskolai végzettség
---------------------->

<body>
    <?php include 'navbar.php' ?>
    <main>
        <form id="adatok" name="adatok" action="./register.php">
            <?php
            if (isset($_SESSION["msg"])) {
                switch ($_SESSION["msg"]) {
                    case 'already':
                        echo '<span color="red">Az email címmel már található felhasználó!</span>';
                        break;
                    default:
                        break;
                }
                unset($_SESSION["msg"]);
            }
            ?>
            <div id="uname-box" class="input-box">
                <label for="uname">Felhasználónév:</label>
                <input name="uname" id="uname" type="text" placeholder="user12345" required spellcheck="false" tabindex="1" autocomplete="off">
            </div>
            <div id="email-box" class="input-box">
                <label for="email">E-mail cím:</label>
                <input name="email" id="email" type="email" placeholder="példa@gmail.com" required spellcheck="false" tabindex="1" autocomplete="off">
            </div>
            <div id="passwd-box" class="input-box">
                <label for="passwd">Jelszó:</label>
                <input name="passwd" id="passwd" type="password" required spellcheck="false" tabindex="2" type="password">
                <svg id="passwd-visibility" width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" onclick="showPasswd()">
                    <g class="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g class="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g class="SVGRepo_iconCarrier" id="openeye">
                        <path stroke-width="1" stroke="#ffffff"
                            d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                            stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                            style="--darkreader-inline-stroke: var(--darkreader-text-000000, #e8e6e3);"></path>
                        <path stroke-width="1" stroke="#ffffff"
                            d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                            stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                            style="--darkreader-inline-stroke: var(--darkreader-text-000000, #e8e6e3);"></path>
                    </g>
                    <g class="SVGRepo_iconCarrier" id="shuteye">
                        <path stroke-width="1" stroke="#ffffff"
                            d="M2.99902 3L20.999 21M9.8433 9.91364C9.32066 10.4536 8.99902 11.1892 8.99902 12C8.99902 13.6569 10.3422 15 11.999 15C12.8215 15 13.5667 14.669 14.1086 14.133M6.49902 6.64715C4.59972 7.90034 3.15305 9.78394 2.45703 12C3.73128 16.0571 7.52159 19 11.9992 19C13.9881 19 15.8414 18.4194 17.3988 17.4184M10.999 5.04939C11.328 5.01673 11.6617 5 11.9992 5C16.4769 5 20.2672 7.94291 21.5414 12C21.2607 12.894 20.8577 13.7338 20.3522 14.5"
                            stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                            style="--darkreader-inline-stroke: var(--darkreader-text-ffffff, #e8e6e3);"></path>
                    </g>
                </svg>
            </div>
            <div id="bdate" class="input-box">
                <label for="bdate">Születési dátum:</label>
                <input name="bdate" id="bdate" type="date" required tabindex="3" pattern="yyyy. mm dd.">
            </div>
            <div id="telefon" class="input-box">
                <label for="tel">Telefonszám:</label>
                <input name="tel" autocomplete="mobile" id="tel" type="tel" placeholder="+36 01 234 5678" required spellcheck="false" tabindex="4">
            </div>
            <div id="nem" class="input-box">
                <label for="gender">Nem:</label>
                <select name="gender" id="gender" required tabindex="5">
                    <option value="m">Férfi</option>
                    <option value="wm">Nő</option>
                    <option value="x" selected>Nem mondom meg</option>
                </select>
            </div>
            <button type="submit">Regisztráció</button>
        </form>
    </main>


    <script>
        function showPasswd() {
            var e = document.getElementById("passwd");
            var shuteye = document.getElementById("shuteye");
            var openeye = document.getElementById("openeye");
            if (e.type === "password") {
                e.type = "text";
                openeye.style.visibility = "visible";
                shuteye.style.visibility = "hidden";
            } else {
                e.type = "password";
                shuteye.style.visibility = "visible";
                openeye.style.visibility = "hidden";
            }
        }
    </script>
</body>

</html>