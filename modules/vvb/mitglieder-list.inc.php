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


$sql = "--START TRANSACTION;
DELETE FROM db_mitglieder;
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (81,
                                                        'Herrn',
                                                        'Ulrich',
                                                        'Beigel',
                                                        '04fF_LV2H3IX2mi-7CzBhrbnplRJyt1gNuFP_jyTuvY',
                                                        '2UI1LtCBgVgMEo9ACTt7A4eFZaoJBJ6heQZZVK0ucEk',
                                                        'knspAh9fAwt1P5iHbmXvmCzcikF0mMpbZRsgFEMZ4yY',
                                                        'obb',
                                                        '2hg0gnDQ9kPPP-fh0LXzIJvw5qMFPv7MGt7TJn8CmJ4',
                                                        7,
                                                        'wkknb66ycY4ow2a_7MUT5RQ5MDq43ixUs3gKnfYfDGs',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (113,
                                                        'Frau',
                                                        'Ines',
                                                        'Czapla',
                                                        'KnJm84WIW8pHA99_0NJlirKseT5zLOm_2vwLNE4mYto',
                                                        'Cfws7BQLKWo4UM7yXkT6iRVYyekgzzyTPWUUi-vgKF8',
                                                        'RYYtiphob2uU35KJsjrUeMvxEobu7-8j5uO6Q55KdgU',
                                                        'obb',
                                                        '0MvsjdXsVS0jBBsjQ25JEMMzVgCPr_hYrX55du8vTnw',
                                                        86,
                                                        'RWbs3pgEYlONw6Yi-FMEkv5SQ_WQfMFkiPRTdgfmrqg',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (1358,
                                                        'Herrn',
                                                        'Matthias',
                                                        'Krompaß',
                                                        'KnJm84WIW8pHA99_0NJlirKseT5zLOm_2vwLNE4mYto',
                                                        'Cfws7BQLKWo4UM7yXkT6iRVYyekgzzyTPWUUi-vgKF8',
                                                        'RYYtiphob2uU35KJsjrUeMvxEobu7-8j5uO6Q55KdgU',
                                                        'sch',
                                                        'HzpZVKmV-xpckX-sMc79COxmMTsq_nlq7UuDEX9FrTg',
                                                        72,
                                                        'aj0mAq7Kops7qgqlIV6yhqAS7PBgmttFIUyy6YgGeEI',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (884,
                                                        'Herrn',
                                                        'Alexander',
                                                        'Haslinger',
                                                        'xztBQAdFFu2laaf1IP7QW1vmB4Li_2Yb4p1T0Uxs0Os',
                                                        'M7cTfcaZMD2qtS2gRHEZZhx8CWf0eQTq0VXraPwjtuc',
                                                        '00nXB_OR62xmNQPlnQSIiMX7kSA7B0HnZuDYOYF_BJc',
                                                        'nb',
                                                        'qhv0gXrtJo0ZeHsDsraiyEJnh9ftQ-9mEO4pUVsIomc',
                                                        65,
                                                        'GAdc6cLw2pVq-gMarjlSQfeIutXQnvkvOiEWHAIL-Mk',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (1032,
                                                        'Herrn',
                                                        'Johannes',
                                                        'Straßer',
                                                        'n9iZMbC8oFZfdY3ngv0ZrBHHK1m2H84aeSR80IEWIvU',
                                                        'Mtr7AMGyzKrS25r1E3Ns1CVfdOIAAojsQF7ie9A2k-s',
                                                        'NXcIJ1XatTSWZ8avudkVb8NOJstAhN_KtX-7AbcQM4U',
                                                        'nb',
                                                        '1GISCOl_6-IYj_b4Xc4Z--YxzpwFrxwhY4jidDoNDTg',
                                                        65,
                                                        '6EqSK8eQEqVkZHiphu-dQE480WdRrW4BerVaSXsjftM',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (1039,
                                                        'Herrn',
                                                        'Thomas',
                                                        'Schützeneder',
                                                        'w4iTRSE2qNGNxdo4tyBzkPPEJRTPwRijEZIIVS3OBHY',
                                                        'Mtr7AMGyzKrS25r1E3Ns1CVfdOIAAojsQF7ie9A2k-s',
                                                        '4Tjq5_LFnuWTtiF1dMQATGgF9GmNp_CG_DQBVjOr1fg',
                                                        'nb',
                                                        'MawgKglsmY5iAxvi20pg4EgooOKDumoOAY3kJuRAAdU',
                                                        65,
                                                        '32XirlFU8KZP-6iEfENM1lulOMswQb6OsmaInXBKzyI',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (1199,
                                                        'Herrn',
                                                        'Josef',
                                                        'Eichinger',
                                                        'pu1zDmKHDo1ZJQfjNPO-dhT_1UI4v2KNSYhp40GgtLc',
                                                        'M7cTfcaZMD2qtS2gRHEZZhx8CWf0eQTq0VXraPwjtuc',
                                                        'e8pIbxw6Nebhd0dMlXgV4v-71JU38uYxGz-UEoNiYGs',
                                                        'nb',
                                                        'euJuQDgLlZTi4gUmQi4v0Ubl5oHKQIm3UwWvXNRsp6M',
                                                        65,
                                                        'CHOy5KVuYBAEMyDSLYfGgmWS0PNOXSrjTxI9i1O0__8',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (1271,
                                                        'Herrn',
                                                        'Josef',
                                                        'Altmann',
                                                        'HvmM-pt9q6cbkSYlQ9T26ShjV01CjTtezEIvTS9Npm4',
                                                        'Mtr7AMGyzKrS25r1E3Ns1CVfdOIAAojsQF7ie9A2k-s',
                                                        'OS5yurq6tdibRyzDzyEReKPNDfOKYmbbqIxLw-LVpRI',
                                                        'nb',
                                                        '6piZds_2Vr0JaQgmi8PXvHPcD_cEkmJjgHfF_yvOD80',
                                                        65,
                                                        '98cHCWcrIAVHjv4zmBL98Bczy7R-zBOreBFL0dW-9S8',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1,
                                                        Aussenstelle)
                                                VALUES (93,
                                                        'Herrn',
                                                        'Friedemann',
                                                        'Kürzl',
                                                        'o0RgeQSP7jUzxSRiH--6dUgfEMaQ1vvSG2HmM8dRbig',
                                                        'jG3UuQi3GAzTsGEOM6TCZ4mM4lDWekrQ5PWF9d8Jqug',
                                                        'prqtz9FPZW-t1SqS7gQCbEupnaRA1nE5oBppRqS1TSo',
                                                        'nb',
                                                        'FRE4N1XomlMgAuB4EDWcdrtsvq_NPqDd8TPo5iUxHZ4',
                                                        64,
                                                        '5NimnG8Tmg-arDoP1KFgwbwRgSA-ASbew9LqilVshHg',
                                                        'puIpvtOY-u4ul4JYUpbkFoEjdFKrwIfsbmbizZwghO4',
                                                        94);
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (117,
                                                        'Herrn',
                                                        'Maximilian',
                                                        'Sonnleitner',
                                                        'Va-yBr-TCyoTaTnQGL2RcGXRHlLDKq3yikc4K9foaTw',
                                                        '5mALVcPsxDNk7xCRrM7SJFCnThw1mJpewVJTlAIKni0',
                                                        'Ckivrg5JrjMSCB6oedAJ0Zu4uWzBQYizCe6HZFK8yJM',
                                                        'nb',
                                                        'WkEvlCV8YMSQWY8kdFTIalTTP4TwYCxs3GqF5UVLOjw',
                                                        64,
                                                        'hkLRo3Cg1CUlNnXLw0wwUjP5qEDpiAwbnPXKNc3JSoE',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (456,
                                                        'Herrn',
                                                        'Franz-Xaver',
                                                        'Vogl',
                                                        'pBpO_oZyPr0uiSvFsx9y3zga4ZgpGwbPcMb0zkxyvSg',
                                                        'jG3UuQi3GAzTsGEOM6TCZ4mM4lDWekrQ5PWF9d8Jqug',
                                                        'prqtz9FPZW-t1SqS7gQCbEupnaRA1nE5oBppRqS1TSo',
                                                        'nb',
                                                        'hy8cL6GcrI4LAXwzY0Vii2XdDs32x30jMc2raiE-WfQ',
                                                        64,
                                                        'CByYnIHw8Br7l-upoJSMBO_z-C8tjHVGyt1WePYcqS4',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (502,
                                                        'Herrn',
                                                        'Franz',
                                                        'Reitmeier',
                                                        'c4adh3_orhCacZJHvFi3gtlXaDrH-14ctITHgDBq1lI',
                                                        '41ydCeCxbmyTE6R4b88wLCv1khbSpQr3jJJS_h332Xk',
                                                        'OS4IxcRzUn98wML1SgIvET2TI3o04X3ceEQQJBty8-A',
                                                        'nb',
                                                        'DyHeelENik0KymV1dN8LkRvewfAOKEV7SA-d_5OMLTA',
                                                        64,
                                                        'GpPWU4oB7FZfcSfnxP0RYlsKy2Pjz7pH_7mSYzQEPQc',
                                                        '');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (573,
                                                        'Herrn',
                                                        'Josef',
                                                        'Eckbauer',
                                                        'Qj_llYi0bLg-ulIvJCYsw_8T7kz_7Cwen1VjuXJxhmM',
                                                        'jG3UuQi3GAzTsGEOM6TCZ4mM4lDWekrQ5PWF9d8Jqug',
                                                        'prqtz9FPZW-t1SqS7gQCbEupnaRA1nE5oBppRqS1TSo',
                                                        'nb',
                                                        'HVGO-hhka4KNg22OIv6eNLGjGSBGFCb2-GHk2PZF-WA',
                                                        64,
                                                        '6lJWOgNoglVqY4v4geEY9yq1nxmnkklr0AN0ydd8LjM',
                                                        'puIpvtOY-u4ul4JYUpbkFoEjdFKrwIfsbmbizZwghO4');
INSERT INTO db_mitglieder
                                                    (Mitglieds_Nr,
                                                        Anrede,
                                                        Vorname,
                                                        Nachname,
                                                        Strasse,
                                                        PLZ,
                                                        Ort,
                                                        Bezirk,
                                                        Geburtsdatum,
                                                        VA,
                                                        Eintritt,
                                                        Sonstiges_1)
                                                VALUES (654,
                                                        'Herrn',
                                                        'Albert',
                                                        'Schönhuber',
                                                        'gus9_xYSiRNisOcR074sNCMThz9dDUwjHAqx3q2KAbw',
                                                        'jG3UuQi3GAzTsGEOM6TCZ4mM4lDWekrQ5PWF9d8Jqug',
                                                        'prqtz9FPZW-t1SqS7gQCbEupnaRA1nE5oBppRqS1TSo',
                                                        'nb',
                                                        'R--bI_nF7QuPO7BI3C7-eU8XWuN335Zky6gqSSMXbYM',
                                                        64,
                                                        '6lJWOgNoglVqY4v4geEY9yq1nxmnkklr0AN0ydd8LjM',
                                                        'puIpvtOY-u4ul4JYUpbkFoEjdFKrwIfsbmbizZwghO4');
COMMIT;";
$sql = "START TRANSACTION;
SELECT * FROM db_mitglieder;
COMMIT;";
#$result  = $db -> query($sql);

#$mysqli = new mysqli($db->HOST, $db->USER, $db->PASS, $db->DB);
#if ($mysqli->connect_errno) {
#    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
#}

#if (!$mysqli->query($sql)) {
#    echo "SQL failed: (" . $mysqli->errno . ") " . $mysqli->error;
#}
















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

#echo "<pre>";
#echo $Encrypt->encode("hallo Welt"), PHP_EOL;
#echo $Encrypt->decode("gus9_xYSiRNisOcR074sNCMThz9dDUwjHAqx3q2KAbw"), PHP_EOL;
#echo "</pre>";
//        $Encrypt->decode("G_Xb2btA-axbhKwzEscRA219VN6NdqVJnHhZrq_Pp60");
//        exit;


        // Berechtigung
        // ---------------------------------------------------------------------
        if ( $vvb_recht["group"] == "schatz" ) {
            $hidedata["filter_complete"] = array();
            $hidedata["csv_export"] = array();
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
            $hidedata["filter_complete"] = array();
            $hidedata["csv_export"] = array();
            $hidedata["right_vorstand"] = array();
        } elseif ( $vvb_recht["group"] == "ort" ) {
            $hidedata["filter_ohne_bezirk_und_ort"] = array();
            $hidedata["right_ort"] = array();
            $hidedata["csv_export"] = array();
        } elseif ( $vvb_recht["group"] == "bezirk" ) {
            $hidedata["filter_ohne_bezirk"] = array();
            $hidedata["right_bezirk"] = array();
            $hidedata["csv_export"] = array();
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
#exit;


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
