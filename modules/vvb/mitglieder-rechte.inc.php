<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $script["name"] = "$Id$";
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
    
    
    if ( $_SESSION["uid"] == "" ) {
        header("Location: /admin.html");
        exit;
    }

//    echo print_r($_SESSION,true);
//    $_SESSION["username"] = "schatzmeister";
//    $_SESSION["username"] = "va64";
//    $_SESSION["username"] = "bezirk_sch";
    $vvb_recht = array("right" => array());

    // Ortsbeauftragter
    if ( preg_match("/^va([0-9]{2})/", $_SESSION["username"], $match) ) {
        // rechte für das eigene Amt vergeben
        $vvb_recht = array(
            "group" => "ort",
            "right" => array("show"),
            "where" => "(".$cfg["mitglieder"]["db"]["mitglieder"]["va"]."='".$match[1]."' OR ".$cfg["mitglieder"]["db"]["mitglieder"]["ast"]."='".$match[1]."')"
        );

        // in der config kann die Berechtigung erweitert werden
        if ( is_array($cfg["mitglieder"]["expand_rights"][$_SESSION["username"]]) && count($cfg["mitglieder"]["expand_rights"][$_SESSION["username"]]) > 0 ) {
            $vvb_recht["where"] = $cfg["mitglieder"]["db"]["mitglieder"]["va"]." IN (".implode(", ",$cfg["mitglieder"]["expand_rights"][$_SESSION["username"]]).")";
        }

        // Falls LVG-Ortsbeauftrager, Rechte für alle Abteilungen erteilen
        // $sql = "SELECT *  
        //           FROM ".$cfg["mitglieder"]["db"]["aemter"]["entries"]." 
        //          WHERE ".$cfg["mitglieder"]["db"]["aemter"]["akz"]."=".(integer)$match[1];
        // $result = $db->query($sql);
        // if ( $db->num_rows($result) > 0 ) {
        //     $data = $db -> fetch_array($result,1);
        //     if ( $data[$cfg["mitglieder"]["db"]["aemter"]["typ"]] == "LVG" ) {
        //         $vvb_recht = array(
        //             "group" => "ort",
        //             "right" => array("show"),
        //             // nur die Mitglieder der Abteilung 1-4
        //             //"where" => $cfg["mitglieder"]["db"]["mitglieder"]["va"]." IN (9,10,12,14)"
        //             "where" => $cfg["mitglieder"]["db"]["mitglieder"]["va"]." IN (SELECT kennzahl FROM db_aemter WHERE typ='LVG')"
        //         );
        //     }
        // }
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Ortsbeauftragter".$debugging["char"];
    }

    // Bezirkssprecher
    if ( preg_match("/^bezirk_([a-z]{0,4})/", $_SESSION["username"], $match) ) {
        $vvb_recht = array(
            "group" => "bezirk",
            "right" => array("show"),
            "where" => $cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]."='".$match[1]."'"
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Bezirkssprecher".$debugging["char"];
    }

    // Schatzmeister
    if ( $_SESSION["username"] == "schatzmeister" ) {
        $vvb_recht = array(
            "group" => "schatz",
            "right" => array("show","import"),
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Schatzmeister".$debugging["char"];
    }

    // Vorstand
    $sql = "SELECT *
              FROM auth_member as member
              JOIN auth_group as gruppe
                ON (member.gid=gruppe.gid)
             WHERE ggroup IN ('vorstand','recht')
               AND uid=".$_SESSION["uid"];
    if ( $db->num_rows($db->query($sql)) > 0 ) {
        $vvb_recht = array(
            "group" => "vorstand",
            "right" => array("show"),
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Vorstand".$debugging["char"];
    }

    // Vorsitzende
    $sql = "SELECT *
              FROM auth_member as member
              JOIN auth_group as gruppe
                ON (member.gid=gruppe.gid)
             WHERE ggroup='vorsitz'
               AND uid=".$_SESSION["uid"];
    if ( $db->num_rows($db->query($sql)) > 0 ) {
        $vvb_recht = array(
            "group" => "vorstand",
            "right" => array("show","import"),
        );
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   Benutzergruppe Vorstand".$debugging["char"];
    }

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "   -".print_r($vvb_recht,true).$debugging["char"];



    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ++ ".$script["name"]." ++ ]".$debugging["char"];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
