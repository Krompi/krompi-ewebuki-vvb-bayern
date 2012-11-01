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



    if ( in_array("import",$vvb_recht["right"]) ) {

        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= $debugging["char"]."[ <b>** ".$script["name"]." **</b> ]".$debugging["char"];
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * ".$debugging["char"];

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
                // Datenimport starten
                $start_file_import = array_sum(explode(' ', microtime()));
                
                        
                // alle Aemter in Array zwischenspeichern
                // Ergebnis-Arrays:
                //      $array_aemter[Amtskennzahl] = Bezeichung
                //      $array_aemter_parent[Amtskennzahl] = Amtskennzahl_des_Elternamts
                //      
                //      (Amtskennzahl: min. zweistellig mit fuehrender Null
                // -------------------------------------------------------------
                $start = array_sum(explode(' ', microtime()));
                if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= "  * Aemter-Infos in Arrays schreiben".$debugging["char"];
                $sql = "SELECT *
                        FROM ".$cfg["mitglieder"]["db"]["aemter"]["entries"]."
                    ORDER BY ".$cfg["mitglieder"]["db"]["aemter"]["parent"];
                if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= "   - sql: ".$sql.$debugging["char"];
                $result = $db -> query($sql);
                while ( $data = $db -> fetch_array($result,1) ) {
                    if ( $data[$cfg["mitglieder"]["db"]["aemter"]["parent"]]  != "") {
                        $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["parent"]]]." - Au&szlig;enstelle ".$data[$cfg["mitglieder"]["db"]["aemter"]["name"]]."";
                        $array_aemter_parent[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = $data[$cfg["mitglieder"]["db"]["aemter"]["parent"]];
                    } else {
                        $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = "VA ".$data[$cfg["mitglieder"]["db"]["aemter"]["name"]];
                    }
                }
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * Aemterinfos gepuffert in             ".$exec_time." Sekunden".$debugging["char"];
                // -------------------------------------------------------------
                
                
                // Datenbank-Felder durchgehene und den Typ in die 
                // zu importierenden Felder einfuegen
                // -------------------------------------------------------------
                $start = array_sum(explode(' ', microtime()));
                $db_field_types = array();
                foreach ( $db->show_columns($cfg["mitglieder"]["db"]["mitglieder"]["entries"]) as $field_info ) {

                    foreach ( $cfg["mitglieder"]["csv_fields"] as $csv_field => $value ) {

                        if ( $field_info["Field"] == $value["db"] ) {
                            if ( strstr($field_info["Type"],"int") ) {
                                $cfg["mitglieder"]["csv_fields"][$csv_field]["type"] = "int";
                            } else {
                                // standard ist text
                                $cfg["mitglieder"]["csv_fields"][$csv_field]["type"] = "text";
                            }
                            $db_field_types[$cfg["mitglieder"]["csv_fields"][$csv_field]["db"]] = $cfg["mitglieder"]["csv_fields"][$csv_field]["type"];
                            break;
                        }
                    }
                }
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].": Feldtypen geholt in   ".$exec_time." Sekunden".$debugging["char"];
                // -------------------------------------------------------------
                
                
                define("PASSPHRASE", $specialvars["crypt_salt"]);
                $Encrypt = new Encryption();

                
                $i = 0;
                $field_indizes = array();
                $sql_array = array();
                
                
                // Zeilenweise einlesen
                // -------------------------------------------------------------
                $start = array_sum(explode(' ', microtime()));
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
                            $sql_array[$i]["field"][$key] = $cfg["mitglieder"]["csv_fields"][$field_name]["db"];

                            // DB-Eintraege
                            if ( $cfg["mitglieder"]["csv_fields"][$field_name]["crypt"] == TRUE ) {
                                // manche eintraege sollen verschluesselt werden
                                $sql_array[$i]["value"][$key] = $db->doSlashes($Encrypt->encode( $data[$key] ));
                            } else {    
                                $sql_array[$i]["value"][$key] = $db->doSlashes($data[$key]);
                            }
//                            $sql_array[$i]["value"][$key] = $db->doSlashes($data[$key]);
                            if ( $cfg["mitglieder"]["csv_fields"][$field_name]["type"] == "text" ) {
                                $sql_array[$i]["value"][$key] = "'".$sql_array[$i]["value"][$key]."'";
                            } else {
                                
                            }
                        }
                        
                        // amtskennzahl suchen
                        $field_amt = array_search( "Berufsgruppe", $field_indizes);
                        // amtskennzahl wird in Form gebracht
                        $akz = str_pad($data[$field_amt], 2, "0", 0);
                        
                        // ist es eine aussenstelle
                        if ( $array_aemter_parent[$akz] != "" ) {
                            $sql_array[$i]["value"][$field_amt] = $array_aemter_parent[$akz];
                            $sql_array[$i]["field"][110] = "Aussenstelle";
                            $sql_array[$i]["value"][110] = $akz;
                        }
                        $sql_array[$i]["field"][120] = "VA_text";
                        $sql_array[$i]["value"][120] = "'".$array_aemter[$akz]."'";
                        
                        // -----------------------------------------------------
                    }
                    $i++;

                }
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * Mitglieder eingelesen in             ".$exec_time." Sekunden".$debugging["char"];
                // -------------------------------------------------------------
                
                
                fclose($handle);
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start_file_import) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * <b>CSV eingelesen in                    ".$exec_time." Sekunden</b>".$debugging["char"];

            }
        }

        

        
        
        
        
        
        
        // SQL zusammenbauen
        if ( count($sql_array) > 0 ) {
            // Fehlermanagement
            $error = "";
            
            
            // SQL in log-tabelle speichern
            // -----------------------------------------------------------------
            if ( $cfg["mitglieder"]["import_log"] == TRUE ) {
                $sql = "INSERT INTO ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                                    (".$cfg["mitglieder"]["db"]["import_log"]["time"].",
                                    ".$cfg["mitglieder"]["db"]["import_log"]["content"].")
                            VALUES ('".date("U")."',
                                    '".$db->doSlashes(serialize($sql_array))."')";
                $result  = $db -> query($sql);
                if ( !$result ) {
                    $error = $db -> error("FEHLER");
                }
            }
            // -----------------------------------------------------------------
            
            
            // Daten einfuegen
            // -----------------------------------------------------------------
            if ( $error == "" ) {
                $start = array_sum(explode(' ', microtime()));

                // Transaktion vorbereiten
                $sql = "BEGIN;";
                $result  = $db -> query($sql);

                // Tabelle loeschen
                $sql = "DELETE FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].";";
                $result  = $db -> query($sql);
                if ( !$result ) {
                    $error = $db -> error("FEHLER");
                }

                if ( $error == "" ) {
                    // Neue Daten einfuegen
                    foreach ( $sql_array as $value ) {
                        $sql = "INSERT INTO ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]." 
                                                    (".implode(",
                                                        ",$value["field"]).")
                                                VALUES (".implode(",
                                                        ",$value["value"]).");";
                        $result  = $db -> query($sql);
                        if ( !$result ) {
                            $error = $db -> error("FEHLER");
                            break;
                        }
                    }
                }

                // Transaktion durchfuehren
                if ( $error == "" ) {
                    $sql = "COMMIT;";
                    $result  = $db -> query($sql);
                }
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * Infos in DB geschrieben in           ".$exec_time." Sekunden".$debugging["char"];
            }
            // -----------------------------------------------------------------
            
            if ( $error != "" ) {
                $hidedata["error"]["text"] = $error;
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

        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * ".$debugging["char"];
        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ <b>++ ".$script["name"]." ++</b> ]".$debugging["char"].$debugging["char"];

    } else {
        header("Location: ".$pathvars["virtual"]."/");
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
