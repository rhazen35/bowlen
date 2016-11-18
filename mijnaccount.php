<?php session_start(); ?>

<!DOCTYPE html>
<HTML>

<HEAD>
    <META content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <LINK href="css/stijlblad2.css" rel="stylesheet" type="text/css" />
    <LINK href="css/stijlbladtekst2.css" rel="stylesheet" type="text/css" />
    <TITLE>just bowl it</TITLE>
</HEAD>

<BODY>
    <DIV id="wrapper">

        <HEADER class="dikkerand">
            <DIV id="logo" class="rondehoeken">
                <H1 class="blauw"> just bowl it! </H1>
            </DIV>
            <DIV id="menubalk">
                <FORM class="rechts">
                    <INPUT type="text" name="tag" />
                    <INPUT class="omlijn" type="submit" value=" zoeken" />
                </FORM>
                <UL>
                    <LI>
                        <A href="index.php">home</A>
                    </LI>
                    <LI>
                        <A href="info.php">info</A>
                    </LI>
                    <LI>
                        <A href="mijnaccount.php">account</A>
                    </LI>
                    <LI>
                        <A href="reserveren.php">reserveren</A>
                    </LI>


                </UL>

            </DIV>
        </HEADER>

        <DIV id="nav">
            <NAV class="dikkerand">
                <H2>contact</H2>
                <P>
                    06235285
                </P>
                <P>
                    <A href="">link</A>
                </P>
                <P>
                    <A href="een link">link</A>
                </P>
            </NAV>

        </DIV>
        <!--  begin webpagina -->
        <SECTION class="dikkerand">
            <ARTICLE class="rondehoeken">
                <?php if( !isset( $_SESSION['user'] ) ): ?>
                <H2>log in om uw account te bekijken</H2>
                </ASIDE>
                <P>
                    <form action="login.php" method="post">
                        email:
                        <input type="text" name="gebruikersnaam">
                        <br>
                        <br> wachtwoord:
                        <input type="password" name="wachtwoord">
                        <br>
                        <br>

                        <input type="submit" name="login" value="login">
                    </form>

                    <A href="wachtwoord vergeten">wachtwoord vergeten</A>
                </P>
                <?php else: ?>
                    <H2>U bent al ingelogd</H2>
                    <FORM action="login.php" method="post">
                        <INPUT type="submit" name="logout" value="Uitloggen" />
                    </FORM>
                <?php endif; ?>
                <DIV class="clearright">
                </Div>
            </ARTICLE>
        </SECTION>
        <!--  einde webpagina -->

        <FOOTER class="dikkerand">
            Just bowl it!

        </FOOTER>
    </DIV>
</BODY>

</HTML>