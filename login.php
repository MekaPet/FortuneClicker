<?php
    include_once 'including_file.php';
    if(isset($_SESSION['user']))
    {
        header("Location: main.php");
    }
    include 'Include/header.php';

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
                                    <td><input id="Password" type="password" name="Password" placeholder="Password"/></td>
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
                                    <td><input id="nameRegistration" type="text" name="userName" placeholder="User Name"/></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="PasswordRegistration" type="password" name="password" placeholder="Password"/>
                                        <div id="passwordInfo">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input id="PasswordRegistrationVerif" type="password" name="password2" placeholder="Confirm password"/></td>
                                </tr>
                                <tr>
                                    <td><input id="EmailRegistration" type="text" name="mailRegister" placeholder="Email"/></td>
                                </tr>

                                <tr>
                                    <td><input id="newAccount" type="button" value="NewAccount"/></td>
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