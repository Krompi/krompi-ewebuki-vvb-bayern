<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id$";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-2010 Werner Ammon ( wa<at>chaos.de )

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

    86343 K�nigsbrunn

    URL: http://www.chaos.de
*/
////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////

    $cfg["kontakt"] = array(
           "subdir" => "addon",
             "name" => "kontakt",
            "basis" => $pathvars["virtual"]."/kontakt",
         "iconpath" => "", # leer: /images/default/; automatik: $pathvars["images"]
               "db" => array(
                  "entries" => "db_kontakt",
                      "key" => "kid",
                       ),
         //workarround fuer geaenderten loader
         "function" => array(
           "kontakt,shared" => array("captcha"),
                       ),
            "right" => "",
            "email" => array(
                    // mail an betreiber
//                "owner" => "VVB <kontakt@vvb-bayern.de>",
                "owner" => "VVB <vvb@uber.space>",
                    "subj1" => "Neue Anfrage VVB-Internetseite",
                    "repl1" => array("firma","ansprechpartner"),
                    "template1" => "kontakt-email1",
                    // mail an benutzer
                    "subj2" => "Ihre Anfrage an den VVB",
                    "repl2" => array("ansprechpartner"),
                    "template2" => "kontakt-email2",
                    "form_name_feld" => "name",
                    "form_email_feld" => "e-mail",
                    // admin
                    "robot" => "VVB <kontakt@vvb-bayern.de>",
                    "encoding" => "UTF-8\r\n",
                    "add_para" => "",   // mail(): additional_parameters (optional)
              ),
           "captcha" => array(
                 "randomize" => "efdjrtg442sdfashf",          // beliebiger wert, verfaelscht nur den captcha-kontrollwert
                    "length" => "5",                     // laenge des zufalls-"wortes"
                "letter_pot" => "abcdefghijkmnpqrstuvwxyz23456789",     // zu benutzende zeichen
                  "bg_color" => array(184, 214, 224),      // hintergrundfarbe des bildes
                "font_color" => array(232, 95, 61),       // schriftfarbe
                      "font" => array(
                              "size" => 14,
                                 "x" => 10,
                                 "y" => 21,
                             ),
                       "ttf" => array(
//                                 // path for debian
//                                 "/usr/share/fonts/truetype/ttf-bitstream-vera/VeraMono.ttf",
//                                 "/usr/share/fonts/truetype/ttf-bitstream-vera/VeraMoIt.ttf",
//                                 "/usr/share/fonts/truetype/ttf-bitstream-vera/VeraMoBI.ttf",
//                                 "/usr/share/fonts/truetype/ttf-bitstream-vera/VeraMoBd.ttf",
                                 // path for suse
//                                 "/usr/share/fonts/truetype/VeraMono.ttf",
//                                 "/usr/share/fonts/truetype/VeraMoIt.ttf",
//                                 "/usr/share/fonts/truetype/VeraMoBI.ttf",
//                                 "/usr/share/fonts/truetype/VeraMoBd.ttf",
//                                 // or local path
//                                 "/usr/local/share/fonts/VeraMono.ttf",
//                                 "/usr/local/share/fonts/VeraMoIt.ttf",
//                                 "/usr/local/share/fonts/VeraMoBI.ttf",
//                                 "/usr/local/share/fonts/VeraMoBd.ttf",
                           $pathvars["fileroot"]."modules/vvb/fonts/VeraMono.ttf",
                           $pathvars["fileroot"]."modules/vvb/fonts/VeraMoIt.ttf",
                           $pathvars["fileroot"]."modules/vvb/fonts/VeraMoBI.ttf",
                           $pathvars["fileroot"]."modules/vvb/fonts/VeraMoBd.ttf",
                             ),
               )
    );

    if ( strpos($_SERVER["SERVER_NAME"],"vvb-bayern") !== false ) {
        $cfg["kontakt"]["captcha"]["ttf"] = array(
                                 "/srv/www/vvb-bayern/website/modules/vvb/fonts/VeraMono.ttf",
                                 "/srv/www/vvb-bayern/website/modules/vvb/fonts/VeraMoIt.ttf",
                                 "/srv/www/vvb-bayern/website/modules/vvb/fonts/VeraMoBI.ttf",
                                 "/srv/www/vvb-bayern/website/modules/vvb/fonts/VeraMoBd.ttf",
                             );
    }


////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////
?>
