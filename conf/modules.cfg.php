<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id$";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-20010 Werner Ammon ( wa<at>chaos.de )

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

    if ( (strstr($environment["ebene"]."/".$environment["kategorie"], "/admin" ) || strstr($environment["ebene"]."/".$environment["kategorie"], "/wizard" )) && !empty($_SESSION["uid"]) ) {
        // anderes Base-Template verwenden
        $cfg["print"]["state"] = true;
        $_GET["print"][2] = "base-admin";
    }

    date_default_timezone_set('Europe/Berlin');

    if ( ($_SESSION["uid"] != 1 && !strpos($_SERVER["SERVER_NAME"],"krompi")) ) {
        unset($debugging);
    }

    // basic: menu
    include $pathvars["moduleroot"]."basic/menu2.cfg.php";
    include $pathvars["moduleroot"]."basic/menu2.inc.php";

    // basic: path
    include $pathvars["moduleroot"]."basic/path.cfg.php";
    include $pathvars["moduleroot"]."basic/path.inc.php";

    // basic: blog(ed)
    include $pathvars["moduleroot"]."admin/bloged.cfg.php";
    include $pathvars["moduleroot"]."admin/bloged-autoload.inc.php";

    // basic: view
    if ( $environment["kategorie"] == "view" ) {
        include $pathvars["moduleroot"]."basic/view.cfg.php";
        include $pathvars["moduleroot"]."basic/view.inc.php";
    }


if ( $environment["ebene"] == "/mitgliedwerden" ) {
    header("Location: ".$pathvars["virtual"]."/mitgliedwerden.html");
    exit;
}


if ( $_SESSION["uid"] != "" ) {



    // wizard: for testing only !!
    if ( preg_match("/^\/wizard/",$environment["ebene"]) )
    {
        $hidedata["wizard"] = array();
        $hidedata["eed"] = array();
    }
    if ( $environment["ebene"] == "/wizard" ) {
        include $pathvars["moduleroot"]."admin/contented.cfg.php";
        include $pathvars["moduleroot"]."wizard/wizard.cfg.php";
        include $pathvars["moduleroot"]."wizard/wizard-ctrl.inc.php";
    }

    // admin: css/js anzeigen
    if ( preg_match("/^\/admin/",$environment["ebene"]) )
    {
        $hidedata["eed"] = array();
    }

    // admin: bloged ( needs -> basic: bloged )
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "bloged" )
       || ( $environment["ebene"] == "/admin/bloged" ))
    {
        include $pathvars["moduleroot"]."admin/bloged-ctrl.inc.php";
    }

    // admin: contented
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "contented" )
       || ( $environment["ebene"] == "/admin/contented" ))
    {
        include $pathvars["moduleroot"]."admin/contented.cfg.php";
        include $pathvars["moduleroot"]."admin/contented-ctrl.inc.php";
    }

#    // admin: new for testing only !!
#    if ( $environment["kategorie"] == "new" ) {
#        include $pathvars["moduleroot"]."admin/new.cfg.php";
#        include $pathvars["moduleroot"]."admin/new.inc.php";
#    }

    // admin: grouped (development)
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "grouped" )
       || ( $environment["ebene"] == "/admin/grouped" ))
    {
        include $pathvars["moduleroot"]."admin/grouped.cfg.php";
        include $pathvars["moduleroot"]."admin/grouped-ctrl.inc.php";
    }

    // admin: prived (development)
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "prived" )
       || ( $environment["ebene"] == "/admin/prived" ))
    {
        include $pathvars["moduleroot"]."admin/prived.cfg.php";
        include $pathvars["moduleroot"]."admin/prived-ctrl.inc.php";
    }

    // admin: righted (development)
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "righted" )
       || ( $environment["ebene"] == "/admin/righted" ))
    {
        include $pathvars["moduleroot"]."admin/righted.cfg.php";
        include $pathvars["moduleroot"]."admin/righted-ctrl.inc.php";
    }

    // admin: leveled
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "leveled" )
       || ( $environment["ebene"] == "/admin/leveled" ))
    {
        include $pathvars["moduleroot"]."admin/leveled.cfg.php";
        include $pathvars["moduleroot"]."admin/leveled-ctrl.inc.php";
    }

    // admin: usered
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "usered" )
       || ( $environment["ebene"] == "/admin/usered" ))
    {
        include $pathvars["moduleroot"]."admin/usered.cfg.php";
        include $pathvars["moduleroot"]."admin/usered-ctrl.inc.php";
    }

    // admin: menued
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "menued" )
       || ( $environment["ebene"] == "/admin/menued" ))
    {
        include $pathvars["moduleroot"]."admin/menued2.cfg.php";
        include $pathvars["moduleroot"]."admin/menued2-ctrl.inc.php";
    }

    // admin: fileed
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "fileed" )
       || ( $environment["ebene"] == "/admin/fileed" ))
    {
        include $pathvars["moduleroot"]."admin/fileed2.cfg.php";
        include $pathvars["moduleroot"]."admin/fileed2-ctrl.inc.php";
    }

    // admin: passed
    if (  ( $environment["ebene"] == "/admin" && $environment["kategorie"] == "passed" )
       || ( $environment["ebene"] == "/admin/passed" ))
    {
        include $pathvars["moduleroot"]."admin/passed.cfg.php";
        include $pathvars["moduleroot"]."admin/passed.inc.php";
    }

    // addon: changed
    include $pathvars["moduleroot"]."addon/changed.cfg.php";
    include $pathvars["moduleroot"]."addon/changed.inc.php";
}


    // Mitglieder-Ausgabe
    if ( strstr($environment["ebene"]."/".$environment["kategorie"],"/admin/mitglieder") )
    {
//if ( $_POST["ajax"] == "" ) echo "<pre>";
        include $pathvars["moduleroot"]."vvb/mitglieder.cfg.php";
        include $pathvars["moduleroot"]."vvb/mitglieder-ctrl.inc.php"; # erweitertes modul
//if ( $_POST["ajax"] == "" ) echo "</pre>";
    }
    // Mitglieder-Ausgabe
    if ( strstr($environment["ebene"]."/".$environment["kategorie"],"/admin/artikel") )
    {
        include $pathvars["moduleroot"]."vvb/artikel.inc.php";
    }



    // addon: kontakt
    if (  ( $environment["ebene"] == "" && $environment["kategorie"] == "kontakt" )
       || ( $environment["ebene"] == "/kontakt" ))
    {
        include $pathvars["moduleroot"]."addon/kontakt.cfg.php";
        include $pathvars["moduleroot"]."addon/kontakt-ctrl.inc.php";
    }

#    // addon: search
#    if (  ( $environment["ebene"] == "" && $environment["kategorie"] == "search" )
#       || ( $environment["ebene"] == "/search" ))
#    {
#        include $pathvars["moduleroot"]."addon/search.cfg.php";
#        include $pathvars["moduleroot"]."addon/search.inc.php";
#    }

#    // addon: sitemap
#    if (  ( $environment["ebene"] == "" && $environment["kategorie"] == "sitemap" )
#       || ( $environment["ebene"] == "/sitemap" ))
#    {
#        include $pathvars["moduleroot"]."addon/sitemap.cfg.php";
#        include $pathvars["moduleroot"]."addon/sitemap-ctrl.inc.php";
#    }

#    // addon: schlagwoerter
#    if (  ( $environment["ebene"] == "" && $environment["kategorie"] == "keywords" )
#       || ( $environment["ebene"] == "/keywords" ) )
#    {
#        include $pathvars["moduleroot"]."addon/keyworded.cfg.php";
#        include $pathvars["moduleroot"]."addon/keyworded-ctrl.inc.php";
#    }

#    // addon: schlagwoerter der seite
#    include $pathvars["moduleroot"]."libraries/function_keywords.inc.php";
#    $dataloop["tags_on_page"] = cloud_loop("local");
#    if ( count($dataloop["tags_on_page"]) > 0 ) $hidedata["tags_on_page"] = array();

#    // addon: "aehnliche" seiten
#    $dataloop["rel_page"] = related_pages();
#    if ( count($dataloop["rel_page"]) > 0 ) $hidedata["rel_page"] = array();

#    // customer: modul beispiel "my" einfach
#    if (  ( $environment["ebene"] == "" && $environment["kategorie"] == "my" )
#       || ( $environment["ebene"] == "/my" ))
#    {
#        include $pathvars["moduleroot"]."customer/leer.cfg.php";
#        include $pathvars["moduleroot"]."customer/leer.inc.php"; # einfaches modul
#    }

#    // customer: modul beispiel "my" eweitert
#    if (  ( $environment["ebene"] == "/dir" && $environment["kategorie"] == "my" )
#       || ( $environment["ebene"] == "/dir/my" ))
#    {
#        include $pathvars["moduleroot"]."customer/leer.cfg.php";
#        include $pathvars["moduleroot"]."customer/leer-ctrl.inc.php"; # erweitertes modul
#    }



    // Artikelanzeige mit Jahresauswahl
    if ( ($environment["ebene"] == "" && $environment["kategorie"] == "index") || $environment["ebene"] == "" && $environment["kategorie"] == "aktuell" )
    {
        include $pathvars["moduleroot"]."vvb/artikel-list.inc.php"; # erweitertes modul
    }

    // customer: modul beispiel "my" eweitert
    if ( $environment["ebene"] == "" && ($environment["kategorie"] == "login" || $environment["kategorie"] == "admin") )
    {
        include $pathvars["moduleroot"]."vvb/login.cfg.php";
        include $pathvars["moduleroot"]."vvb/login.inc.php"; # erweitertes modul
    }


    function walk_menu($refid = 0, $lang="de", $level=1, $nested = false) {
        global $db, $cfg, $menu_walk_parameter;

        $menu_array = array();

        $sql = "SELECT *
                  FROM site_menu
                  JOIN site_menu_lang
                    ON (site_menu.mid=site_menu_lang.mid)
                 WHERE refid=".$refid."
                   AND lang='".$lang."'
              ORDER BY sort";
        $result  = $db -> query($sql);
        while ( $data = $db -> fetch_array($result,1) ) {
echo $refid."::".$data["mid"]."::".$data["label"]."\n";

            // Gibt es Unterpunkte
            $sql = "SELECT *
                      FROM site_menu
                      JOIN site_menu_lang
                        ON (site_menu.mid=site_menu_lang.mid)
                     WHERE refid=". $data["mid"]."
                       AND lang='".$lang."'
                  ORDER BY sort";
            $result_subdir = $db->query($sql);
            $num_subdir    = $db->num_rows($result_subdir);

            $menu_array[$data["mid"]] = array(
                "path"   => make_ebene($data["mid"]),
                "entry"  => $data["entry"],
                "label"  => $data["label"],
                "exturl" => $data["exturl"],
                "hide"   => $data["hide"],
                "sort"   => $data["sort"],
                "num_subdir" => $num_subdir,
                "level"  => $level,
            );

            // Rekursiv Aufrufen
            if ( $num_subdir > 0 ) {
                $sub_dir = walk_menu($data["mid"], $lang, $level+1);
// echo "<pre>".print_r($sub_dir,true)."</pre>";
                // // Arrays zusammenfügen
                if ( $nested == FALSE ) {
                    $menu_array = array_merge($menu_array, $sub_dir);
                } else {
                    $menu_array[$data["mid"]]["subdir"] = $sub_dir;
                }
                //
            }


        }

        return $menu_array;
    }

    // echo "<pre>";
    // $test = walk_menu();
    // echo print_r($test,true);
    // echo "</pre>";



//echo "<pre>".print_r($dataloop["list"],true)."</pre>";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
