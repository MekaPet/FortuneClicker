<?php
include_once 'including_file_admin.php';

include '../Include/header.php';

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