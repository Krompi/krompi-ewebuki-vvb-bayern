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

//    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "[ ** ".$script["name"]." ** ]".$debugging["char"];

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= str_pad("", strlen($script["name"])+10, " *").$debugging["char"]." * ".$script["name"].$debugging["char"]." *".$debugging["char"];

    if ( $cfg["leer"]["right"] == "" || $rechte[$cfg["leer"]["right"]] == -1 ) {

        ////////////////////////////////////////////////////////////////////
        // achtung: bei globalen funktionen, variablen nicht zuruecksetzen!
        // z.B. $ausgaben["form_error"],$ausgaben["inaccessible"]
        ////////////////////////////////////////////////////////////////////

        // page basics
        // ***

        // warnung ausgeben
        if ( get_cfg_var('register_globals') == 1 ) $debugging["ausgabe"] .= "Warnung: register_globals in der php.ini steht auf on, evtl werden interne Variablen ueberschrieben!".$debugging["char"];

        // path fuer die schaltflaechen anpassen
        if ( $cfg["leer"]["iconpath"] == "" ) $cfg["leer"]["iconpath"] = "/images/default/";

        // label bearbeitung aktivieren
        if ( isset($HTTP_GET_VARS["edit"]) ) {
            $specialvars["editlock"] = 0;
        } else {
            $specialvars["editlock"] = -1;
        }

        // +++
        // page basics


        // funktions bereich
        // ***
        
        
        
        

        if ( $_SESSION["uid"] != "" ) {
            $hidedata["login"] = array();
            
            
            
        
            // Mitglieder-Verwaltung
            // =================================================================
            include $pathvars["moduleroot"]."vvb/mitglieder.cfg.php";
            include $pathvars["moduleroot"]."vvb/mitglieder-rechte.inc.php"; # erweitertes modul
            if ( count($vvb_recht["right"]) > 0 ) {

                // WHERE-Abfrage zusammenbauen
                if ( $vvb_recht["where"] != "" ) {
                    $where_array[] = $vvb_recht["where"];
                }
                $where = "";
                if ( count($where_array) > 0 ) {
                    $where = "
                        WHERE ".implode(" 
                        AND ",$where_array);
                }

                // SQL zusammenbauen
                $sql = "SELECT *
                        FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].
                            $where;

                // Mitglieder-Bereich anzeigen
                $result = $db -> query($sql);
                $hidedata["show_mitglieder"] = array(
                    "count"     => $db->num_rows($result),
                    "link_list" => $cfg["mitglieder"]["basis"]."/list.html",
                    "link_csv"  => $cfg["mitglieder"]["basis"]."/list,csv.html"
                );

                // Mitglied-Import-Berechtigung
                if (in_array("import", $vvb_recht["right"]) ) {
                    // Import
                    $dataloop["memb_import_rights"][] = array(
                        "link"  => $cfg["mitglieder"]["basis"]."/import.html",
                        "label" => "Import",
                    );
                    // Log
                    $dataloop["memb_import_rights"][] = array(
                        "link"  => $cfg["mitglieder"]["basis"]."/import-log.html",
                        "label" => "Import-Log",
                    );
                }

            }
            // =================================================================
            
            
            
            // Artikel
            // =================================================================
            foreach ( $cfg["bloged"]["blogs"] as $url=>$attributs ) {
                $dataloop["blog_list"] = array();
//echo $name."\n";
                $cat_len = strlen($cfg["bloged"]["blogs"][$url]["category"])+2;
                $sort_len = strlen($cfg["bloged"]["blogs"][$url]["sort"][0])+2;

                // falls sort auf -1 wird anstatt ein datum ein integer als sortiermerkmal gesetzt um ein manuelles sortieren zu ermoeglichen
                if ( $cfg["bloged"]["blogs"][$url]["sort"][1] == "-1" ) {
                    $art = "SIGNED";
                } else {
                    $art = "DATETIME";
                }

                $sql = "SELECT Cast(SUBSTRING(content,POSITION('[".$cfg["bloged"]["blogs"][$url]["sort"][0]."]' IN content)+".$sort_len.",POSITION('[/".$cfg["bloged"]["blogs"][$url]["sort"][0]."]' IN content)-POSITION('[".$cfg["bloged"]["blogs"][$url]["sort"][0]."]' IN content)-".$sort_len.") AS ".$art.") AS date,
                               status,
                               content,
                               tname,
                               version,
                               changed,
                               max(version) as max_version
                          FROM site_text
                         WHERE tname like '".eCRC($url).".%"."'
                           AND status<>0
                 --          AND SUBSTRING(content,POSITION('[".$cfg["bloged"]["blogs"][$url]["category"]."]' IN content),POSITION('[/".$cfg["bloged"]["blogs"][$url]["category"]."]' IN content)-POSITION('[".$cfg["bloged"]["blogs"][$url]["category"]."]' IN content)) ='[".$cfg["bloged"]["blogs"][$url]["category"]."]".$url."'
                         GROUP by tname, version
                      ORDER BY changed DESC, tname desc, version desc";
                if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= " * sql: ".$sql.$debugging["char"];

//echo $where."\n";
//echo $sql."\n";
                $result = $db -> query($sql);
                $preg1 = "\.([0-9]*)$";

                // evtl wizard einbinden
                if ( $cfg["bloged"]["blogs"][$url]["wizard"] != "" ) {
                    $editlink = "/wizard/show,";
                } else {
                    $editlink = "/admin/contented/edit,";
                }

                $counter = 0;$tname_array = array();
                while ( $data = $db -> fetch_array($result,1) ) {
                    if (in_array($data["tname"], $tname_array) ) continue;
                    $tname_array[] = $data["tname"];

                    $array = array();
                    $counter++;

                    $dataloop["blog_list"][$counter]["version"] = $data["version"];

                    // titel herausfinden
                    preg_match("/\[H[0-9]{1}\](.*)\[\/H[0-9]{1}\]/U",$data["content"],$heading);
//echo print_r($heading,true);
                    if ( $heading[0] == "" ) continue;
                    if ( $heading[1] != "" ) {
                        $dataloop["blog_list"][$counter]["titel"] = $heading[1];
                    } else {
                        $dataloop["blog_list"][$counter]["titel"] = "---";
                    }

                    // datum rausfinden
                    preg_match("/\[".addcslashes($cfg["bloged"]["blogs"][$url]["sort"][0],"/")."\](.*)\[\/".$cfg["bloged"]["blogs"][$url]["sort"][0]."\]/U",$data["content"],$sort);
//echo "/\[".addcslashes($cfg["bloged"]["blogs"][$url]["sort"][0],"/")."\](.*)\[\/".$cfg["bloged"]["blogs"][$url]["sort"]."\]/U";
//echo print_r($sort,true);
                    if ( preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/",$sort[1],$datum) ) {
                        $dataloop["blog_list"][$counter]["datum"] = $datum[3].".".$datum[2].".".$datum[1];
                    } elseif ( preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/",$data["changed"],$datum) ) {
                        $dataloop["blog_list"][$counter]["datum"] = $datum[3].".".$datum[2].".".$datum[1];
                    } else {
                        $dataloop["blog_list"][$counter]["datum"] = "---";
                    }

                    // changed-Datum
                    if ( strtotime($data["changed"]) ) {
                        $dataloop["blog_list"][$counter]["changed"] = date("d.m.Y",strtotime($data["changed"]));
                    }

                    // detail-link
                    preg_match("/\.([0-9]+)$/",$data["tname"],$blog_id);
                    if ( $blog_id[1] != "" ) {
                        $dataloop["blog_list"][$counter]["link_details"]  = $url."/".$blog_id[1].".html";
                    }
                    $dataloop["blog_list"][$counter]["link_details_version"]  = $pathvars["virtual"].$url."/".$blog_id[1].",v".$data["version"].".html";

                    // bearbeiten-links
                    $dataloop["blog_list"][$counter]["link_wiz_edit"]      = $pathvars["virtual"]."/wizard/show,".DATABASE.",".$data["tname"].",inhalt.html";
                    $dataloop["blog_list"][$counter]["link_wiz_delete"]    = $pathvars["virtual"]."/wizard/delete,".DATABASE.",".$data["tname"].",inhalt.html";
                    $dataloop["blog_list"][$counter]["link_wiz_release"]   = $pathvars["virtual"]."/wizard/release,".DATABASE.",".$data["tname"].",inhalt,release,".$data["version"].".html";
                    $dataloop["blog_list"][$counter]["link_wiz_unlock"]    = $pathvars["virtual"]."/wizard/release,".DATABASE.",".$data["tname"].",inhalt,unlock,".$data["version"].".html";
                    $dataloop["blog_list"][$counter]["link_blog_edit"]     = $pathvars["virtual"]."/admin/contented/edit,".DATABASE.",".$data["tname"].",inhalt.html";
                    /* aus der url eine id machen */
                    $id = make_id($url);
                    $new = $id["mid"];
                    $dataloop["blog_list"][$counter]["link_blog_delete"] = $pathvars["virtual"]."/admin/bloged/delete,,".$blog_id[1].",,".$new.".html";

                    $aktion_array = array(
                        "<a href=\"".$dataloop["blog_list"][$counter]["link_wiz_edit"]."\">Bearbeiten</a>",
                        "<a href=\"".$dataloop["blog_list"][$counter]["link_wiz_delete"]."\">L&ouml;schen</a>",
                        "<a href=\"".$dataloop["blog_list"][$counter]["link_details_version"]."\" target=\"_blank\">Vorschau</a>",
                    );


                    // status darstellen
                    if ( $data["status"] == -1 ) {
                         $dataloop["blog_list"][$counter]["status"] = "in Bearbeitung";
                         array_unshift($aktion_array, "<a href=\"".$dataloop["blog_list"][$counter]["link_wiz_release"]."\">Freigabe</a>");
                    } elseif ( $data["status"] == -2 ) {
                         $dataloop["blog_list"][$counter]["status"] = "wartet auf Freigabe";
                    } elseif ( $data["status"] == 1 ) {
                         $dataloop["blog_list"][$counter]["status"] = "Freigegeben";
                         array_unshift($aktion_array, "<a href=\"".$dataloop["blog_list"][$counter]["link_wiz_unlock"]."\">Freigabe aufheben</a>");
                    } else {
                         $dataloop["blog_list"][$counter]["status"] = "unbekannt (".$data["status"].")";
                    }

                    $dataloop["blog_list"][$counter]["aktion"] = implode(" | ",$aktion_array);

                }
            }
            // =================================================================
            
        }
//echo print_r($dataloop["blog_list"],true);
//echo "</pre>";

        // +++
        // funktions bereich


        // page basics
        // ***

        // fehlermeldungen
        if ( $HTTP_GET_VARS["error"] != "" ) {
            if ( $HTTP_GET_VARS["error"] == 1 ) {
                $ausgaben["form_error"] = "#(error1)";
            }
        } else {
            $ausgaben["form_error"] = "";
        }

        // navigation erstellen
        $ausgaben["add"] = $cfg["leer"]["basis"]."/add,".$environment["parameter"][1].",verify.html";
        #$mapping["navi"] = "leer";

        // hidden values
        #$ausgaben["form_hidden"] .= "";

        // was anzeigen
        $mapping["main"] = "login";
        #$mapping["navi"] = "leer";

        // unzugaengliche #(marken) sichtbar machen
        if ( isset($HTTP_GET_VARS["edit"]) ) {
            $ausgaben["inaccessible"] = "inaccessible values:<br />";
            $ausgaben["inaccessible"] .= "# (error1) #(error1)<br />";
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

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= " *".$debugging["char"]." * ".$script["name"].$debugging["char"].str_pad("", strlen($script["name"])+10, " *").$debugging["char"];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
