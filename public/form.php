<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>This is a form page. Try to contain your excitement.</title>
    </head>
    <body>

<!-- DEBUG BEGINNING -->
    <?php

        if (!empty($_GET)) {
            var_dump($_GET);         
        } 
        elseif (!empty($_POST)) {
            var_dump($_POST);
        } 

    ?>
<!-- DEBUG END -->

<hr>
        <p><h2>User Login</h2></p>

        <!-- <form method="POST" action="http://requestb.in/1h3b1n41"> -->
        <form method="POST" action="/form.php">
            <p>
                <label for="first_name">First Name</label>
                <input value="" id="first_name" name="first_name" type="text" placeholder="First Name">
                
            </p>
            <p>
                <label for="last_name">Last Name</label>
                <input value="" id="last_name" name="last_name" type="text" placeholder="Last Name">
                
            </p>
            <p>
                <label for="email">Email Address</label>
                <input value="" id="email_addr" name="email" type="text" placeholder="user@domain.com">

            </p>
            <p>
                <label for="password">Password</label>
                <input value="" id="password" name="password" type="password" placeholder="Password">
            </p>
            <p>
                <!-- <input value="" name="submit" type="submit"> -->
                <button type="submit">SUBMIT</button>
            </p>
        </form>
<hr>
        <p><h2>Compose An Email</h2></p>

        <form method="POST" action="/form.php">
            <p>
                <label for="send_to">To:</label>
                <input name="send_to" type="text" placeholder="Destination Address"> 
            </p>

            <p>
                <label for="send_from">From:</label>
                <input value="" id="send_from"name="send_from" type="text" placeholder="Origin Address">
            </p>

            <p>
                <label for="subject">Subject:</label>
                <input value="" id="subject" name="subject" type="text" placeholder="Subject of Message">
            </p>
            <p>
                <!-- <label for="message">Message</label> -->
                <textarea placeholder="Enter Message Here" name="message" rows="5" cols="40" ></textarea>
            </p>
            <p>
                <label for="cc_sender">Would you like a copy sent to your email address?</label>
                <input id="cc_sender" name="cc_sender" type="checkbox" checked>

            </p>
            <p>
                <button type="submit">SUBMIT</button>
            </p>
        </form>
<hr>
        <p><h2>Multiple Choice Test</h2></p>

            <form method="POST" action="/form.php">
                <p>
                    <p><strong>Time is _______?</strong></p>
                    <p><label><input id="tq" name="tq[]" type="checkbox" value="fleeting"> fleeting. </label></p>
                    <p><label><input id="tq" name="tq[]" type="checkbox" value="ephemeral"> ephemeral. </label></p>
                    <p><label><input id="tq" name="tq[]" type="checkbox" value="of_the_essence"> OF THE ESSENCE! </label></p>
                </p>

                <p>
                    <p><label for="qq"><strong>Fire --> Ice :: QQ --> _______ </strong></label></p>
                        <select id="qq" name="qq[]" multiple>
                            <option name="cry" value="cry">CryCry</option>
                            <option value="pew">PewPew</option>
                            <option value="wut">Wut?</option>
                        </select>
                </p>
                <p>
                    <button type="submit">SUBMIT</button>
                </p>
            </form>
<hr>
        <p><h2>Select Testing:</h2></p>

            <form method="POST" action="/form.php">
                <label for="yes_no">Are you cool with what is happening right now?</label>
                    <select id="yes_no" name="yes_no" type="select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                <p>
                    <button type="submit">SUBMIT</button>
                </p>
            </form>
<hr>
    </body>
</html>