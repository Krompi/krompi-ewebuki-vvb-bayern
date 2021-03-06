<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// autoform.cfg.php-dist v1 emnili
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-2015 Werner Ammon ( wa<at>chaos.de )

    This script is a part of eWeBuKi

    eWeBuKi is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    eWeBuKi is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with eWeBuKi; If you did not, you may download a copy at:

    URL:  http://www.gnu.org/licenses/gpl.txt

    You may also request a copy from:

    Free Software Foundation, Inc.
    59 Temple Place, Suite 330
    Boston, MA 02111-1307
    USA

    You may contact the author/development team at:

    Chaos Networks
    c/o Werner Ammon
    Lerchenstr. 11c

    86343 Koenigsbrunn

    URL: http://www.chaos.de
*/
////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////

    $cfg["autoform"] = array(
           "subdir" => "addon",
             "name" => "autoform",
            "basis" => $pathvars["virtual"]."/autoform", # crc = -1468826685 *
         "iconpath" => "", # leer: /images/default/; automatik: $pathvars["images"]
            "color" => array(
                        "a" => "#eeeeee",
                        "b" => "#ffffff",
                       ),
         "function" => array(
                      "add" => "",
                     "edit" => "",
                   "delete" => "",
                  "details" => "",
                     "list" => array("mail_order"),
                  "list,shared" => array("captcha"),
              #"edit,shared" => array("shared1", "shared2"),
              #"edit,global" => array("global1", "global2"),
                       ),

                 "location" => array(
                              "/kontakt" => array(
                                          "db" => "db_kontakt",
                                         "art" => "mailsave",  // mailsave,mail,save,confirm
                                  "captcha"    => -1,
                                       "email" => array(
                                                // mail an betreiber
                                                "owner" => "Firma <info@domain.aendern>",
                                                "subj1" => "Neue Anfrage von !{ansprechpartner}",
                                                "repl1" => array("firma","ansprechpartner"),
                                                "template1" => "kontakt-email1",
                                                // mail an benutzer
                                                "subj2" => "Ihre Anfrage Frau/Herr !{ansprechpartner}",
                                                "repl2" => array("ansprechpartner"),
                                                "template2" => "kontakt-email2",
                                                "form_name_feld" => "ansprechpartner",
                                                "form_email_feld" => "e-mail",
                                                // admin
                                                "robot" => "Web Robot <robot@domain.aendern>",
                                                "encoding" => "",
                                                "confirm_template" => "kontakt-confirm"
                                          ),
                             ),
//                          "/irgendwo/irgendwo" => array(          // pfad setzen
//                                          "db" => "db_survey",    // struktur ist in der autoform.sql
//                                    "db-entry" => -1,
//                                  "mail-order" => 0,
//                                  "captcha"    => 0,
//                            )
                 ),

           "captcha" => array(
                 "randomize" => "changeme",          // beliebiger wert, verfaelscht nur den captcha-kontrollwert
                    "length" => "5",                     // laenge des zufalls-"wortes"
                "letter_pot" => "abcdefghijkmnpqrstuvwxyz123456789",     // zu benutzende zeichen
                  "bg_color" => array(169,192,206),      // hintergrundfarbe des bildes
                "font_color" => array(224,105,26),       // schriftfarbe
                      "font" => array(
                              "size" => 14,
                                 "x" => 10,
                                 "y" => 21,
                             ),
                       "ttf" => array(
                                 "/usr/share/fonts/truetype/VeraMono.ttf",
                                 "/usr/share/fonts/truetype/VeraMoIt.ttf",
                                 "/usr/share/fonts/truetype/VeraMoBI.ttf",
                                 "/usr/share/fonts/truetype/VeraMoBd.ttf",
                             ),
               ),
            "right" => "",
    );

    // * tipp: fuer das einfache modul muss der wert $cfg["basis"] natuerlich
    // "/my" lauten. es funktioniert im beispiel nur ohne aenderung, da das
    // einfache script $cfg["basis] nicht nutzt.

////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////
?>
