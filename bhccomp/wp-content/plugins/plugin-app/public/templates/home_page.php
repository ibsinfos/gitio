<?php /* Template Name: App Front page */ ?>

<?php //get_header(); ?>



<?php //get_footer(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="nl-NL" xmlns:og="http://opengraphprotocol.org/schema/">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Slaapmakend &rsaquo; Inloggen</title>
        <link rel='stylesheet' id='wp-admin-css'  href="../wp-admin/css/wp-admin.css?9d7bd4" type='text/css' media='all' />
        <link rel='stylesheet' id='colors-fresh-css'  href="../wp-admin/css/colors-fresh.css?9d7bd4" type='text/css' media='all' />
        <script type='text/javascript' src="../wp-includes/js/jquery/jquery.js?9d7bd4"></script>
        <script type='text/javascript' src='wp-includes/js/jquery/jquery.js?ver=1.2.3'></script>

        <script type="text/javascript">

            jQuery(document).ready(function () {

                jQuery('#login h1 a').attr('href', '../');

                jQuery('#login h1 a').attr('title', 'Slaapmakend - ');

            });

        </script>

        <style type="text/css">

            .logboektitel {
                text-align:left;
                margin-left:20px;
                padding-left: 170px;
                height:39px;
                width: 250px;
                line-height:39px;
                font-size:24px;
                background-image: url('http://bhccomp.dev/wp-content/plugins/plugin-app/public/templates/Slaapmakend_logo.png');
                background-repeat: no-repeat;
                color: #fb2;
                font-weight:bold;
            }

            #login h1 a {

                background-image: url(../../wp-content/uploads/Slaapmakend_logo.png);

                background-position:center top;

                width: 205px;

                min-width:292px;

                height: 39px;

                margin:0 auto;

            }



            body{height:auto;}

            #login h1 a {background-size:100%;}</style>

        <meta name='robots' content='noindex,nofollow' />
    </head>
    <body class="login">
        <div id="login">

            <div class='logboektitel' id='logboektitel'>Logboek</div>

            <form name="form1" method="post" action="checklogin.php">
                <p>
                    <label for="myemail">Emailadres(<font color="red">!</font>)<br />
                        <input type="text" name="myemail" id="myemail" class="input" value="" size="20" tabindex="10" /></label>
                </p>
                <p>
                    <label for="user_pass">Wachtwoord<br />
                        <input type="password" name="mypassword" id="mypassword" class="input" value="" size="20" tabindex="20" /></label>
                </p>
                <div class='short_explanation'><i><b>Let op: voorheen werd er gevraagd naar uw gebruikersnaam, dit is veranderd naar uw emailadres.</b></i></div>
                <p class="submit">
                    <input type="submit" name="Submit" id="submit" class="button-primary" value="Inloggen" tabindex="100" />
                </p>

            </form>

            <p id="nav">
                <a href="<?php echo get_template_directory_uri() . '/slaaplogboek/register/register.php'; ?>">Registreren</a> |
                <a href="../wp-login.php?action=lostpassword" title="Wachtwoord kwijt en gevonden">Wachtwoord vergeten?</a>
            </p>

            <script type="text/javascript">
                function wp_attempt_focus() {
                    setTimeout(function () {
                        try {
                            d = document.getElementById('myemail');
                            d.focus();
                            d.select();
                        } catch (e) {
                        }
                    }, 200);
                }

                wp_attempt_focus();
                if (typeof wpOnload == 'function')
                    wpOnload();
            </script>

            <p id="backtoblog"><a href="../" title="Ben je de weg kwijt?">&larr; Terug naar Slaapmakend</a></p>

        </div>


        <link rel='stylesheet' id='frm-forms0-css'  href="../wp-content/uploads/formidable/css/formidablepro.css?9d7bd4" type='text/css' media='all' />
        <div class="clear"></div>
    </body>
</html>