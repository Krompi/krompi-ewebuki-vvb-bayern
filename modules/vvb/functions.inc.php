<?php
// Inhaltselektor "bootstrapisieren"
//
//      Die Funktion nimmt den erzeugten Inhalt-Selektor,
//      trennt ihn auf und bringt ihn in eine Dataloop-Form,
//      mit der die Bootstrap-Pagination erzeugt werden kann
//
//      Parameter:
//          1: (string) Inhalt-Selektor, erzeugt mit der Funktion inhalt_selector()
//
//      Rückgabe-Wert
//          Array für Dataloop
// ---------------------------------------------------------------------
if ( !function_exists("mod_selektor") ) {
    function mod_selektor($selektor, $anchor = "") {
        global $defaults;

        $return    = array();
        if ( preg_match_all("/(<[ab].*\/[ab]>)/U", $selektor, $match) ) {
            $match_tmp = array();
            $i = 0;
            foreach ($match[1] as $part) {
                $i++;
                preg_match("/<a href=\"(.+)\">(.+)(<\/a>)/U",$part,$match_link);

                if ( $i == 1 ) {
                    if ( strstr($part,"</b>") ) {
                        $return[$i]["class"] = "disabled";
                        $return[$i]["value"] = "<a aria-label=\"Previous\" href=\"#\"><span aria-hidden=\"true\">&laquo;</span></a>";
                    } else {
                        $return[$i]["class"] = "";
                        $return[$i]["value"] = "<a aria-label=\"Previous\" href=\"".$match_link[1].$anchor."\"><span aria-hidden=\"true\">&laquo;</span></a>";
                    }
                    $i++;
                }
                if ( strstr($part,"</b>") ) {
                    $return[$i]["class"] = "active";
                    preg_match("/<b>(.+)<\/b>/",$part,$match_tmp);
                    $return[$i]["value"] = "<a href=\"#\">".$match_tmp[1]." <span class=\"sr-only\">(aktuell)</span></a>";
                } elseif ( strstr($part,"</a>") && $match_link[2] != $defaults["select"]["next"] && $match_link[2] != $defaults["select"]["prev"] ) {
                    $return[$i]["class"] = "";
                    $return[$i]["value"] = $part;
                } elseif ( $i == count($match[1])+1 ) {
                    if ( $part == $defaults["select"]["none"] ) {
                        $return[$i]["class"] = "disabled";
                        $return[$i]["value"] = "<a aria-label=\"Next\" href=\"#\"><span aria-hidden=\"true\">&raquo;</span></a>";
                    } else {
                        $return[$i]["class"] = "";
                        $return[$i]["value"] = "<a aria-label=\"Next\" href=\"".$match_link[1].$anchor."\"><span aria-hidden=\"true\">&raquo;</span></a>";
                    }
                }
            }
        }
        return $return;
    }
}
// ---------------------------------------------------------------------