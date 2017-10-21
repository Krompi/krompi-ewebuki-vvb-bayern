<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id: leer-list.inc.php 1924 2012-08-28 08:45:50Z werner.ammon@gmail.com $";
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

    if ( $cfg["mitglieder"]["right"] == "" || $rechte[$cfg["mitglieder"]["right"]] == -1 ) {

        // funktions bereich
        // ***

        if ( count($vvb_recht["right"]) == 0 ) {
            header("Location: /admin.html");
            exit;
        }

        // Verschluesselung vorbereiten
        // ---------------------------------------------------------------------
        define("PASSPHRASE", $specialvars["crypt_salt"]);
        $Encrypt = new Encryption();
        // ---------------------------------------------------------------------


        // Berechtigung
        // ---------------------------------------------------------------------
        if ( $vvb_recht["group"] == "schatz" ) {
            $hidedata["right_import"] = array();
            // Import
            $dataloop["mitglieder_links"][] = array(
                "link"  => $cfg["mitglieder"]["basis"]."/import.html",
                "label" => "Import",
            );
            // Log
            $dataloop["mitglieder_links"][] = array(
                "link"  => $cfg["mitglieder"]["basis"]."/import-log.html",
                "label" => "Import-Log",
            );
        } elseif ( $vvb_recht["group"] == "vorstand" ) {
            $hidedata["right_vorstand"] = array();
        } elseif ( $vvb_recht["group"] == "ort" ) {
            $hidedata["right_ort"] = array();
        } elseif ( $vvb_recht["group"] == "bezirk" ) {
            $hidedata["right_bezirk"] = array();
        }
        // ---------------------------------------------------------------------


        // WHERE-Abfrage vorbereiten
        // ---------------------------------------------------------------------
        $where_array = array();
        $where = "";
        // ---------------------------------------------------------------------


        // DROPDOWN: Dienststellen
        // ---------------------------------------------------------------------
        
        $get_value_amt = explode("-",$_GET["dienststelle"]);
        
        if ( is_numeric($get_value_amt[0]) ) {
            $where_array[] = $cfg["mitglieder"]["db"]["mitglieder"]["va"]."='".$get_value_amt[0]."'";
        }
        if ( is_numeric($get_value_amt[1]) ) {
            $where_array[] = $cfg["mitglieder"]["db"]["mitglieder"]["ast"]."='".$get_value_amt[1]."'";
        }


        $buffer_where = array("1=1");
        if ( $vvb_recht["where"] != "" ) {
            $buffer_where[] = $vvb_recht["where"];
        }
        
        // Hauptamter rausfinden
        $sql = "SELECT DISTINCT ".$cfg["mitglieder"]["db"]["mitglieder"]["va_text"].",
                                ".$cfg["mitglieder"]["db"]["mitglieder"]["bezirk"].",
                                ".$cfg["mitglieder"]["db"]["mitglieder"]["va"].",
                                ".$cfg["mitglieder"]["db"]["mitglieder"]["ast"]."
                           FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]."
                          WHERE ".implode("
                            AND ",$buffer_where)."
                            AND ".$cfg["mitglieder"]["db"]["mitglieder"]["ast"].">0
                       ORDER BY ".$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]."";
        $result = $db -> query($sql);
        $haupt_aussen = array();
        while ( $data = $db -> fetch_array($result,1) ) {
            $haupt_aussen[$data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]] = $data[$cfg["mitglieder"]["db"]["mitglieder"]["ast"]];
        }
        
        
        
        
        $sql = "SELECT DISTINCT ".$cfg["mitglieder"]["db"]["mitglieder"]["va_text"].",
                                ".$cfg["mitglieder"]["db"]["mitglieder"]["bezirk"].",
                                ".$cfg["mitglieder"]["db"]["mitglieder"]["va"]."
                           FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]."
                          WHERE ".implode("
                            AND ",$buffer_where)."
                            AND ".$cfg["mitglieder"]["db"]["mitglieder"]["ast"]."=0
                       ORDER BY ".$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]."";
        $result = $db -> query($sql);
        while ( $data = $db -> fetch_array($result,1) ) {
            if ( $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]] == "" )      continue;
            if ( $data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]] == "" ) continue;

            if ( $_GET["dienststelle"] == $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]] ) {
                $sel = " selected=\"true\"";
            } else {
                $sel = "";
            }
            
            $dataloop["dienststelle"][$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]]] = array(
                "label" => str_replace("- Au&szlig;enstelle","mit Au&szlig;enstelle",$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]]),
                "value" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]],
                "class" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]]." margin-top",
                "sel"   => $sel,
            );
            
            if ( $haupt_aussen[$data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]] != "" ) {
                // nur Hauptamt
                if ( $_GET["dienststelle"] == $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]."-0" ) {
                    $sel = " selected=\"true\"";
                } else {
                    $sel = "";
                }
                $dataloop["dienststelle"][$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]]."_ha"] = array(
                    "label" => "  - ".$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]].": nur Hauptamt",
                    "value" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]."-0",
                    "class" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]],
                    "sel"   => $sel,
                );
                
                // nur Aussenstelle
                
                if ( $_GET["dienststelle"] == $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]."-".$haupt_aussen[$data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]] ) {
                    $sel = " selected=\"true\"";
                } else {
                    $sel = "";
                }
                $dataloop["dienststelle"][$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]]."_ast"] = array(
                    "label" => "  - ".$data[$cfg["mitglieder"]["db"]["mitglieder"]["va_text"]].": nur Au&szlig;enstelle",
                    "value" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]."-".$haupt_aussen[$data[$cfg["mitglieder"]["db"]["mitglieder"]["va"]]],
                    "class" => $data[$cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]],
                    "sel"   => $sel,
                );
            }
        }
        // ---------------------------------------------------------------------


        // DROPDOWN: Eingruppierung
        // ---------------------------------------------------------------------
        $sql = "SELECT DISTINCT ".$cfg["mitglieder"]["db"]["mitglieder"]["gruppe"]."
                           FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"];
        if ( $vvb_recht["where"] != "" ) {
            $sql .= "
                          WHERE ".$vvb_recht["where"];
        }
        $result = $db -> query($sql);
        while ( $data = $db -> fetch_array($result,1) ) {

            $gruppe = $Encrypt->decode($data[$cfg["mitglieder"]["db"]["mitglieder"]["gruppe"]]);

            if ( $gruppe == "" ) continue;
            if ( $_GET["eingruppierung"] == $gruppe ) {
                $sel = "selected=\"true\"";
                $where_array[] = $cfg["mitglieder"]["db"]["mitglieder"]["gruppe"]."='".$data[$cfg["mitglieder"]["db"]["mitglieder"]["gruppe"]]."'";
            } else {
                $sel = "";
            }
            $dataloop["eingruppierung"][$gruppe] = array(
                "label" => $gruppe,
                "value" => $gruppe,
                "sel"   => $sel,
            );
        }
        if (is_array($dataloop["eingruppierung"])) ksort($dataloop["eingruppierung"]);
        // ---------------------------------------------------------------------


        // DROPDOWN: Bezirke
        // ---------------------------------------------------------------------
        foreach ( $cfg["mitglieder"]["kataloge"]["bezirke"] as $key=>$value ) {
            if ( $_GET["bezirk"] == $key ) {
                $sel = "selected=\"true\"";
                $where_array[] = $cfg["mitglieder"]["db"]["mitglieder"]["bezirk"]."='".$key."'";
            } else {
                $sel = "";
            }
            $dataloop["bezirk"][$key] = array(
                "label" => $value,
                "value" => $key,
                "sel"   => $sel,
            );
        }
        ksort($dataloop["bezirk"]);
        // ---------------------------------------------------------------------

        // Nachnamen-Suche
        // ---------------------------------------------------------------------
        $get_name = trim(preg_replace("/^[^a-zA-Z]$/", "", $_GET["name"]));
        $ausgaben["mitglied_name"] = htmlentities($get_name);
        if ( $get_name != "" ) {
            $where_array[] = "Nachname LIKE '".$get_name."%'";
        }
        // ---------------------------------------------------------------------


        // WHERE-Abfrage zusammenbauen
        // ---------------------------------------------------------------------
        if ( $vvb_recht["where"] != "" ) {
            $where_array[] = $vvb_recht["where"];
        }
        if ( count($where_array) > 0 ) {
            $where = "
                 WHERE ".implode("
                   AND ",$where_array);
        }
        // ---------------------------------------------------------------------


        // Sortierunge
        // ---------------------------------------------------------------------
        $order = $cfg["mitglieder"]["db"]["mitglieder"]["order"];
        // ---------------------------------------------------------------------

        $sql = "SELECT *
                  FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].
                       $where."
              ORDER BY ".$order;
        if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= "sql: ".$sql.$debugging["char"];

        // seiten umschalter
        $inhalt_selector = inhalt_selector( $sql, $environment["parameter"][1], $cfg["mitglieder"]["db"]["mitglieder"]["rows"], $parameter, 1, 8, $_SERVER["QUERY_STRING"] );
        $ausgaben["inhalt_selector"] = $inhalt_selector[0]."<br />";
        if ( $environment["parameter"][1] != "csv" ) $sql = $inhalt_selector[1];
        $ausgaben["anzahl"] = $inhalt_selector[2];
        $dataloop["selektor"] = mod_selektor($ausgaben["inhalt_selector"]);

        $result = $db -> query($sql);
        $arr_ind = 1;

        if ( $environment["parameter"][1] == "csv" ) {
            $csv_array = array();
        }

//echo "<pre>";
        while ( $data = $db -> fetch_array($result,1) ) {

            // platz fuer vorbereitungen hier z.B.tabellen farben wechseln
            if ( $cfg["mitglieder"]["color"]["set"] == $cfg["mitglieder"]["color"]["a"]) {
                $cfg["mitglieder"]["color"]["set"] = $cfg["mitglieder"]["color"]["b"];
            } else {
                $cfg["mitglieder"]["color"]["set"] = $cfg["mitglieder"]["color"]["a"];
            }

            $index = $data[$cfg["mitglieder"]["db"]["mitglieder"]["key"]];

            foreach ( $cfg["mitglieder"]["csv_fields"] as $field_info ) {
                if ( $field_info["crypt"] == TRUE ) {
                    $dataloop["list"][$index][$field_info["db"]] = $Encrypt->decode($data[$field_info["db"]]);
                } else {
                    $dataloop["list"][$index][$field_info["db"]] = $data[$field_info["db"]];
                }

                // Daten veredeln
                if ( $field_info["db"] == "Bezirk" ) {
                    $dataloop["list"][$index][$field_info["db"]] = $cfg["mitglieder"]["kataloge"]["bezirke"][$data[$field_info["db"]]];
                }
                if (function_exists("mb_convert_variables") && $specialvars["output_encoding"] != "" ) {
                    mb_convert_variables($specialvars["output_encoding"], "UTF-8,ISO-8859-15,ISO-8859-1,Windows-1251,Windows-1252", $dataloop["list"][$index][$field_info["db"]]);
                }

                if ( $environment["parameter"][1] == "csv" ) {
//                    $csv_array[$index][] = $dataloop["list"][$index][$field_info["db"]];
                    $csv_array[$index][] = html_entity_decode (
                                                $dataloop["list"][$index][$field_info["db"]],
                                                ENT_COMPAT | ENT_HTML401 ,
                                                $specialvars["output_encoding"]
                                            );
                }

            }


            // wie im einfachen modul k�nnten nur die marken !{0}, !{1} befuellt werden
            #$dataloop["list"][$data["id"]][0] = $data["field1"];
            #$dataloop["list"][$data["id"]][1] = $data["field2"];

            // der uebersicht halber fuellt das erweiterte modul aber einzeln benannte marken
        }


        if ( $environment["parameter"][1] == "csv" ) {

            $array = arraY();
            foreach ( $cfg["mitglieder"]["csv_fields"] as $field_info ) {
                $array[] = $field_info["db"];
            }
            array_unshift($csv_array,$array);

            foreach ($csv_array as $key => $fields) {
                $csv_array[$key] = trim(implode(";",$fields)."\n");
            }

            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="vvb_mitglied_export_'.date("y-m-d").'"');
            echo implode("\n",$csv_array);
            exit;
        }
        // +++
        // funktions bereich


        // page basics
        // ***

        // fehlermeldungen
        if ( $_GET["error"] != "" ) {
            if ( $_GET["error"] == 1 ) {
                $ausgaben["form_error"] = "#(error1)";
            }
        } else {
            $ausgaben["form_error"] = "";
        }

        // navigation erstellen
        $ausgaben["link_new"] = $cfg["mitglieder"]["basis"]."/add.html";
//echo "<pre>".print_r($_SERVER,true)."</pre>";
        $ausgaben["link_csv"] = $cfg["mitglieder"]["basis"]."/list,csv.html?".$_SERVER["QUERY_STRING"];

        $ausgaben["form_aktion"] = $cfg["mitglieder"]["basis"]."/list.html";
        $ausgaben["form_break"] = $cfg["leer"]["basis"]."/list.html";

        // hidden values
        #$ausgaben["form_hidden"] .= "";

        // was anzeigen
        $cfg["mitglieder"]["path"] = str_replace($pathvars["virtual"],"",$cfg["mitglieder"]["basis"]);
        $mapping["main"] = "mitglieder-list";
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

    } else {
        header("Location: ".$pathvars["virtual"]."/");
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
