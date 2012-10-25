<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $script["name"] = "$Id$";
// "leer - list funktion";
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




//echo print_r($db->show_columns("auth_member"),true);
//
//echo "--".array_search("uid", $db->show_columns("auth_member"));
//
//foreach ( $db->show_columns("auth_member") as $field_info ) {
//    echo $field_info["Field"]." --> ".$field_info["Type"]."\n";
//
//    foreach ( $cfg["mitglieder"]["csv_fields"] as $csv_field => $value ) {
//        if ( $field_info["Field"] == $value[""] )
//    }
//
//}






    if ( in_array("import",$vvb_recht["right"]) ) {

        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ** ".$script["name"]." ** ]".$debugging["char"];

        // Dropdown Field Separator
        // =====================================================================
        $array_field_sep = array(";",",");
        $i = 0;
        foreach ( $array_field_sep as $sep ) {
            $selected = "";
            if ( $_POST["field_separator"] != "" ) {
                if ( $_POST["field_separator"] == $sep ) $selected = " selected=\"true\"";
            } elseif ( $i == 0 ) {
                $selected = " selected=\"true\"";
            }
            $i++;
            $dataloop["field_separator"][] = array(
                "label" => $sep,
                "sel"   => $selected
            );
        }
        // =====================================================================


        // Dropdown Text Separator
        // =====================================================================
        $array_text_sep = array(" ","\"","'");
        $i = 0;
        foreach ( $array_text_sep as $sep ) {
            $selected = "";
            if ( $_POST["text_separator"] != "" ) {
                if ( $_POST["text_separator"] == $sep ) $selected = " selected=\"true\"";
            } elseif ( $i == 0 ) {
                $selected = " selected=\"true\"";
            }
            $i++;
            $dataloop["text_separator"][] = array(
                "label" => $sep,
                "sel"   => $selected
            );
        }
        // =====================================================================


        // Hochgeladene CSV-Datei abarbeiten
        // =====================================================================
        if ( count($_FILES) > 0 ) {
            if (($handle = fopen($_FILES["cvs"]["tmp_name"], "r")) !== FALSE) {
                $i = 0;
                $field_indizes = array();
                $sql_array = array();
                // Zeilenweise einlesen
                while (($data = fgetcsv($handle, 2000, $_POST["field_separator"], $_POST["text_separator"])) !== FALSE) {

                    if ( $i == 0 ) {
                        // Zeile mit Spalten-Ueberschriften einlesen
                        // -----------------------------------------------------

                        foreach ( $data as $key=>$field ) {
                            // es sollen nur die in der Config bestimmten
                            // Spalten geholt werden
                            if ( $cfg["mitglieder"]["csv_fields"][$field] != "" ) {
                                $field_indizes[$key] = $field;
                            }
                        }

                        // -----------------------------------------------------
                    } else {
                        // Daten einlesen und SQL vorbereiten
                        // -----------------------------------------------------


                        foreach ( $field_indizes as $key=>$field_name ) {

                            // DB-Spalten namen
                            $sql_array[$i]["field"][] = $cfg["mitglieder"]["csv_fields"][$field_name]["db"];

                            // DB-Eintraege
                            if ( $cfg["mitglieder"]["csv_fields"][$field_name]["crypt"] == TRUE ) {
                                // manche eintraege sollen verschluesselt werden
                                $sql_array[$i]["value"][] = vvb_encrypt( $data[$key] );
                            } else {
                                $sql_array[$i]["value"][] = $data[$key];
                            }
                        }

                        // -----------------------------------------------------
                    }
                    $i++;


                }
                fclose($handle);

            }
        }
echo print_r($sql_array,true);

        // SQL zusammenbauen
        if ( count($sql_array) > 0 ) {
            foreach ( $sql_array as $value ) {
                $buffer = array();
                foreach ( $value["field"] as $key=>$field ) {
//                    $buffer
                }
            }
        }


        // navigation erstellen
        $ausgaben["link_new"] = $cfg["leer"]["basis"]."/add.html";

        // hidden values
        #$ausgaben["form_hidden"] .= "";

        // was anzeigen
        $mapping["main"] = "mitglieder-import";
        #$mapping["navi"] = "leer";

        // unzugaengliche #(marken) sichtbar machen
        if ( isset($_GET["edit"]) ) {
            $ausgaben["inaccessible"] = "inaccessible values:<br />";
            $ausgaben["inaccessible"] .= "# (error1) #(error1)<br />";
            $ausgaben["inaccessible"] .= "# (edittitel) #(edittitel)<br />";
            $ausgaben["inaccessible"] .= "# (deletetitel) #(deletetitel)<br />";
        } else {
            $ausgaben["inaccessible"] = "";
        }

        // wohin schicken
        #n/a

        // +++
        // page basics

        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ++ ".$script["name"]." ++ ]".$debugging["char"];

    } else {
        header("Location: ".$pathvars["virtual"]."/");
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
