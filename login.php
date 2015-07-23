<?php
    include 'Include/header.php';
    if(isset($_SESSION['user']))
    {
        header("Location: main.php");
    }
var_dump($_SERVER);
?>
    <script src="Js/login.js" ></script>
</head>
<body id="body">

<div id="contener">

    <div id="modal">
        <div id="start">
            <table>
                <thead height="40 px">
                    <tr >
                        <td class="white_text">
                            S'identifier
                        </td>
                        <td class="white_border_left">

                        </td>
                        <td class="white_text">
                            S'enregistrer
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <table >
                                <tr>
                                    <td><input id="mail" type="text" name="Mail" placeholder="email"/></td>
                                </tr>
                                <tr>
                                    <td><input id="Password" type="text" name="Password" placeholder="Password"/></td>
                                </tr>
                                <tr>
                                    <td><input id="Login" type="button" value="Login"/></td>
                                </tr>
                            </table>
                        </td>
                        <td class="white_border_left">

                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><input id="nameRegistration" type="text" placeholder="User Name"/></td>
                                </tr>
                                <tr>
                                    <td><input id="PasswordRegistration" type="text" placeholder="Password"/></td>
                                </tr>
                                <tr>
                                    <td><input id="PasswordRegistrationVerif" type="text" placeholder="Confirm password"/></td>
                                </tr>
                                <tr>
                                    <td><input id="EmailRegistration" type="text" placeholder="Email"/></td>
                                </tr>

                                <tr>
                                    <td><input id="NewAccount" type="button" value="NewAccount"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>

        </div>
        </table>
    </div>


    <div id="BadLoggin">
    </div>
</div>
</body>
</html>