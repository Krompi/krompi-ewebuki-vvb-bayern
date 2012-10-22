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

    // CONFIG-BEREICH
    $img_size_startseite    = "m";
    $img_defpath_startseite = "/file/jpg/47/m/logo-vvb-schmal.jpg";
    $news_count_startseite  = 4;

    $i = 0;
    if ( $environment["ebene"] == "" && $environment["kategorie"] == "index" ) {

        $sql = "SELECT Cast(SUBSTRING(content,POSITION('[SORT]' IN content)+6,POSITION('[/SORT]' IN content)-POSITION('[SORT]' IN content)-6) AS DATETIME) AS date,
                       status,
                       content,
                       tname
                  FROM site_text
                 WHERE status=1
                   AND tname LIKE '".eCRC("/aktuell").".%'
              ORDER BY date DESC";
        if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= " * sql: ".$sql.$debugging["char"];

        $result = $db -> query($sql);
        while ( $data = $db -> fetch_array($result,1) ) {
            if ( $i == $news_count_startseite ) break;

            // Veroeffentlichungsdatum suchen
            preg_match("/\[SORT\](.+)\[\/SORT\]/", $data["content"], $match);
            if ( $match[1] != "" ) {
                $datum_start_dmy = date("d.m.Y", strtotime($match[1]));
                $datum_start = strtotime($match[1]);
            } else {
                $datum_start_dmy = "";
                $datum_start = strtotime("1970-01-01");
            }

            // End-datum
            preg_match("/\[ENDE\](.+)\[\/ENDE\]/", $data["content"], $match);
            if ( $match[1] != "" ) {
                $datum_ende_dmy = date("d.m.Y", strtotime($match[1]));
                $datum_ende = strtotime($match[1]);
            } else {
                $datum_ende_dmy = "";
                $datum_ende = strtotime("+1 week");
            }

            // soll der Artikel schon angezeigt werden
            if ( date("U") > $datum_ende || date("U") < $datum_start ) continue;

            // Titel suchen
            preg_match("/\[H1\](.+)\[\/H1\]/", $data["content"], $match);
            if ( $match[1] != "" ) {
                $titel = $match[1];
            } else {
                $titel = "---";
            }

            // Teaser suchen
            preg_match("/\[P=teaser\](.+)\[\/P\]/Us", $data["content"], $match);
            if ( $match[1] != "" ) {
                $teaser = $match[1];
            } else {
                $teaser = "";
            }

            // Bild suchen
            preg_match("/\[IMG=(.+)\](.*)\[\/IMG\]/U", $data["content"], $match);
            if ( $match[1] != "" ) {
                // bild-url rausfinden
                $para = explode(";",$match[1]);
                $url_parts = explode("/",array_shift($para));
                /* ggf groesse manipulieren */
                $url_parts[4] = $img_size_startseite;
                $img_src = implode("/",$url_parts);
                // bild info aus db holen
                if ( is_numeric($url_parts[3]) ) {
                    $sql = "SELECT * FROM site_file WHERE fid=".$url_parts[3];
                    if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= " * sql: ".$sql.$debugging["char"];
                    $result_pic = $db -> query($sql);
                    $data_pic = $db -> fetch_array($result_pic,1);
                    $img_under = $data_pic["funder"];
                    $img_desc  = $data_pic["fdesc"];
                } else {
                    $img_under = "";
                    $img_desc  = "";
                }
            } else {
                $img_src = $img_defpath_startseite;
                $img_under = "";
                $img_desc  = "";
            }

            // detail-link
            $detail = $pathvars["virtual"]."/aktuell/".trim(strrchr($data["tname"], "."), ".").".html";

            $dataloop["news"][] = array(
                "titel"     => $titel,
                "teaser"    => $teaser,
                "datum"     => $datum_start_dmy,
                "detail"    => $detail,
                "img_src"   => $img_src,
                "img_under" => $img_under,
                "img_desc"  => $img_desc,
            );

            $i++;
        }

    } elseif ( $environment["ebene"] == "" && $environment["kategorie"] == "aktuell" ) {

        $ausgaben["archiv_filter"] = "";

        $sql = "SELECT DISTINCT SUBSTRING(
                              content,
                              POSITION('[SORT]' IN content)+6,
                              4
                        ) AS year
                  FROM site_text
                 WHERE tname LIKE '".eCRC("/aktuell").".%'
              ORDER BY year DESC";
        if ( $debugging["sql_enable"] ) $debugging["ausgabe"] .= " * sql: ".$sql.$debugging["char"];
        $result = $db -> query($sql);

        while ( $data = $db -> fetch_array($result,1) ) {
            if ( $environment["parameter"][4] == $data["year"] ) {
                $style = "font-weight: bold;";
                $ausgaben["archiv_filter"] = " - ".$data["year"];
            } else {
                $style = "";
            }

            $dataloop["archiv_menu"][] = array(
                "label" => $data["year"],
                "link"  => $pathvars["virtual"]."/aktuell,,,,".$data["year"].".html",
                "style" => $style,
            );
        }
    }

    if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= " *".$debugging["char"]." * ".$script["name"].$debugging["char"].str_pad("", strlen($script["name"])+10, " *").$debugging["char"];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
