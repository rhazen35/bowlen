<?php
require_once( "php/functions.php" );

$lanes = Functions::get_lanes();
$menus = Functions::get_menus();

var_dump($menus);

?>

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
                <H2>welkom op onze site</H2>
                </ASIDE>
                <form action="reservations.php" method="post">
                    <fieldset>
                        <legend>Vul onderstaande gegevens in</legend>
                        <select name="lane">
                            <option value="">Kies een baan</option>
                            <?php foreach( $lanes as $lane ): ?>
                                <option value="<?= $lane['lane_id'] ?>"><?= $lane['lane'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                        <select name="menu">
                            <option value="">Kies een menu</option>
                            <?php foreach( $menus as $menu ): ?>
                                <option value="<?= $menu['menu_id'] ?>"><?= $menu['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                        <span>
                Glow in the dark?
            </span>
                        Ja <input type="radio" name="glow_in_dark" value="yes">
                        Nee <input type="radio" name="glow_in_dark" value="no">
                        <br><br>
                        Datum <input type="date" name="reservation" value="">
                        Tijd <input type="time" name="time" value="">

                        <input type="text" name="name" value="" placeholder="Volledige naam">
                        <input type="text" name="phone" value="" placeholder="Telefoon">
                        <input type="text" name="email" value="" placeholder="Email">
                        <input type="text" name="persons" value="" placeholder="Personen">

                        <input type="submit" name="newReservationSubmit" value="toevoegen">
                    </fieldset>
                </form>
                <P>welkom bij lekker bowlem trxt trxt trxt trxt trxt trxt trxt trxt trxt

                    <A href="contactlink">contact</A> </P>
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