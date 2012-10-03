<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $script["name"] = "$Id: leer.inc.php 1678 2009-12-07 14:03:04Z chaot $";
  $Script["desc"] = "short description";
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ** ".$script["name"]." ** ]".$debugging["char"];

    echo print_r($_SESSION,true);
    
    // Ortsbeauftragter
    if ( preg_match("/^va([0-9]{2})/", $_SESSION["username"], $match) ) {
        $vvb_recht = array(
            "right" => "show",
            "where" => $cfg["mitglieder"]["db"]["mitglieder"]["va"]."=".$match[1]
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Ortsbeauftragter".$debugging["char"];
    }
    
    // Bezirkssprecher
    if ( preg_match("/^bezirk_[a-z]{0,4}/", $_SESSION["username"]) ) {
        $vvb_recht = array(
            "right" => "show",
            "where" => $cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]."=".$match[1]
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Bezirkssprecher".$debugging["char"];
    }
    
    // Schatzmeister
    if ( $_SESSION["username"] == "schatzmeister" ) {
        $vvb_recht = array(
            "right" => "show",
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Schatzmeister".$debugging["char"];
    }
    
    // Vorstand
    $sql = "SELECT * 
              FROM auth_member as member
              JOIN auth_group as gruppe
                ON (member.gid=gruppe.gid)
             WHERE ggroup='vorstand' 
               AND uid=".$_SESSION["uid"];
    if ( $db->num_rows($db->query($sql)) > 0 ) {
        $vvb_recht = array(
            "right" => "show",
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Vorstand".$debugging["char"];
    }
    
    

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ++ ".$script["name"]." ++ ]".$debugging["char"];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
