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

        
        // Mitglied-Import-Berechtigung
        // ---------------------------------------------------------------------
        if (in_array("import", $vvb_recht["right"]) ) {
            $hidedata["right_import"] = array();
            // Import
            $dataloop["mitglieder_links"][] = array(
                "link"  => $cfg["mitglieder"]["basis"]."/list.html",
                "label" => "Liste",
            );
            // Log
            $dataloop["mitglieder_links"][] = array(
                "link"  => $cfg["mitglieder"]["basis"]."/import-log.html",
                "label" => "Import-Log",
            );  
        }
        // ---------------------------------------------------------------------
        

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


        // Dropdown Encodig
        // =====================================================================
        $array_encoding = array("ISO-8859-15","WIN-1252","UTF-8");
        $i = 0;
        foreach ( $array_encoding as $encoding ) {
            $selected = "";
            if ( $_POST["encoding"] != "" ) {
                if ( $_POST["encoding"] == $encoding ) $selected = " selected=\"true\"";
            } elseif ( $i == 0 ) {
                $selected = " selected=\"true\"";
            }
            $i++;
            $dataloop["encoding"][] = array(
                "label" => $encoding,
                "sel"   => $selected
            );
        }
        // =====================================================================


        // Hochgeladene CSV-Datei abarbeiten
        // =====================================================================
        if ( count($_FILES) > 0 ) {
           
//echo "<pre>";
            // Feld- und Text-Trenner rausfinden
            // -----------------------------------------------------------------
            if (($handle = fopen($_FILES["cvs"]["tmp_name"], "r")) !== FALSE) {
                $line = fgets($handle,1024);

                // Feld-Trenner
                if ( count(explode(",",$line)) > 1 ) $field_separator = ",";
                if ( count(explode(";",$line)) > 1 ) $field_separator = ";";

                // Text-Trenner
                $text_separator = " ";
                if (substr( trim($line) , 0, 1) == "\"" ) $text_separator = "\"";
                if (substr( trim($line) , 0, 1) == "'" ) $text_separator = "'";

                fclose($handle);
            }
            // -----------------------------------------------------------------
                    
            
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
                    if ( $data[$cfg["mitglieder"]["db"]["aemter"]["typ"]]  == "StMF" ) {
                        // StMF
                        $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = "StMF";
                    } elseif ( $data[$cfg["mitglieder"]["db"]["aemter"]["typ"]]  == "LVG" ) {
                        // LVG-Abteilungen
                        $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = $data[$cfg["mitglieder"]["db"]["aemter"]["name"]];
                    } else {
                        if ( $data[$cfg["mitglieder"]["db"]["aemter"]["parent"]]  != "") {
                            // aemter
                            $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["parent"]]]." - Au&szlig;enstelle ".$data[$cfg["mitglieder"]["db"]["aemter"]["name"]]."";
                            // zuordnung hauptamt-aussenstelle
                            $array_aemter_parent[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = $data[$cfg["mitglieder"]["db"]["aemter"]["parent"]];
                        } else {
                            $array_aemter[$data[$cfg["mitglieder"]["db"]["aemter"]["akz"]]] = "VA ".$data[$cfg["mitglieder"]["db"]["aemter"]["name"]];
                        }
                    }
                }
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  *  Dienststellen-Array: ".print_r($array_aemter,true).$debugging["char"];
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
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  *  Feldtypen-Array: ".print_r($db_field_types,true).$debugging["char"];
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].": Feldtypen geholt in   ".$exec_time." Sekunden".$debugging["char"];
                // -------------------------------------------------------------
                
                
                // verschlüsseleung vorbereiten
                // -------------------------------------------------------------
                define("PASSPHRASE", $specialvars["crypt_salt"]);
                $Encrypt = new Encryption();
                // -------------------------------------------------------------

                
                $i = 0;
                $field_indizes = array();
                $sql_array = array();
                
                
                // Zeilenweise einlesen
                // -------------------------------------------------------------
                $start = array_sum(explode(' ', microtime()));
                
                
                while (($data = fgetcsv($handle, 2000, $field_separator, $text_separator)) !== FALSE) {

                    if ( $i == 0 ) {
                        // Zeile mit Spalten-Ueberschriften einlesen
                        // -----------------------------------------------------
                        foreach ( $data as $key=>$field ) {
                            // zeichensatz-konvertierung
                            mb_convert_variables("UTF-8", "ISO-8859-15,Windows-1251,Windows-1252", $field);
                            // es sollen nur die in der Config bestimmten Spalten geholt werden
                            if ( $cfg["mitglieder"]["csv_fields"][$field] != "" ) {
                                // array schreiben
                                $field_indizes[$key] = $field;
                                    
                            } 
                        }
                        if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  *  zu holende Spalten: ".print_r($field_indizes,true).$debugging["char"];
                        // -----------------------------------------------------
                        
                    } else {
//} elseif ( (int)$data["0"] == "1165" || (int)$data["0"] == "747" || (int)$data["0"] == "1138" ) {

                        // Daten einlesen und SQL vorbereiten
                        // -----------------------------------------------------
                        foreach ( $field_indizes as $key=>$field_name ) {
                            
                            // zeichensatz-konvertierung
                            mb_convert_variables("UTF-8", "ISO-8859-15,Windows-1251,Windows-1252", $data[$key]);
                            
                            // DB-Spalten namen
                            $sql_array[$i]["field"][$key] = $cfg["mitglieder"]["csv_fields"][$field_name]["db"];

                            // manche eintraege sollen verschluesselt werden
                            if ( $cfg["mitglieder"]["csv_fields"][$field_name]["crypt"] == TRUE ) {
                                // manche eintraege sollen verschluesselt werden
                                $sql_array[$i]["value"][$key] = addslashes($Encrypt->encode( $data[$key] ));
                            } else {    
                                $sql_array[$i]["value"][$key] = addslashes($data[$key]);
                            }
                            
                            // ausgabe an Dateityp anpassen
                            if ( $cfg["mitglieder"]["csv_fields"][$field_name]["type"] == "text" ) {
                                $sql_array[$i]["value"][$key] = "'".addslashes($sql_array[$i]["value"][$key])."'";
                            } elseif ( $cfg["mitglieder"]["csv_fields"][$field_name]["type"] == "int" ) {
                                $sql_array[$i]["value"][$key] = (integer)$sql_array[$i]["value"][$key];
                            } else {
                                
                            }
                        }
                        
                        // amtskennzahl suchen
                        $field_amt = array_search( "Berufsgruppe", $field_indizes);
//echo print_r($field_indizes,true);
//echo "field_amt: ".$field_amt."\n";
                        // amtskennzahl wird in Form gebracht
                        $akz = (int)$data[$field_amt];
//echo $akz."\n";
//echo $array_aemter[$akz]."\n";
                        
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
//echo print_r($sql_array,true);
//echo "<pre>";
//exit;

        
        
        // SQL zusammenbauen
        if ( count($sql_array) > 0 ) {
            
            // Daten einlesen und Fehlermanagement
            $error = insert_member_data($sql_array);
//exit;
            
            if ( $error != "" ) {
                $hidedata["error"]["text"] = $error;
            } else {
                $hidedata["success"]["count"] = count($sql_array);
            }
            
        }
//echo "</pre>";


        


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
