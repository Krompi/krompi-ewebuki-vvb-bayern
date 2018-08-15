<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id: leer-functions.inc.php 1131 2007-12-12 08:45:50Z chaot $";
// "funktion loader";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-2007 Werner Ammon ( wa<at>chaos.de )

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

    /* um funktionen z.b. in der kategorie add zu laden, leer.cfg.php wie folgt aendern
    /*
    /*    "function" => array(
    /*                 "add" => array( "function1_name", "function2_name"),
    */

    // beschreibung der funktion
    if ( in_array("crypt", $cfg["mitglieder"]["function"][$environment["kategorie"]]) ) {

         function vvb_encrypt( $string ) {

             global $specialvars;

             if ( $string != "" ) {
                return mcrypt_encrypt(
                   $specialvars["crypt_meth"],
                   $specialvars["crypt_salt"],
                   $string,
                   $specialvars["crypt_mode"],
                   $specialvars["crypt_salt"]
               );
             }

         }

         function vvb_decrypt( $string ) {

             global $specialvars;

             if ( $string != "" ) {
                return mcrypt_decrypt(
                   $specialvars["crypt_meth"],
                   $specialvars["crypt_salt"],
                   $string,
                   $specialvars["crypt_mode"],
                   $specialvars["crypt_salt"]
               );
             }

         }


         // http://fluuux.de/2012/07/datensatze-verschlusselt-in-datenbank-speichern/
         class Encryption {
            var $skey = PASSPHRASE;

            public  function safe_b64encode($string) {

                $data = base64_encode($string);
                $data = str_replace(array('+','/','='),array('-','_',''),$data);
                return $data;
            }

            public function safe_b64decode($string) {
                $data = str_replace(array('-','_'),array('+','/'),$string);
                $mod4 = strlen($data) % 4;
                if ($mod4) {
                    $data .= substr('====', $mod4);
                }
                return base64_decode($data);
            }

            public  function encode($value){

                if(!$value){return false;}
                $text = $value;
                $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);

//                echo "<pre>";
//                echo "value:   ", $value, PHP_EOL;
//                echo "text:    ", $text, PHP_EOL;
//                echo "iv_size: ", $iv_size, PHP_EOL;
//                echo "iv:      ", $iv, PHP_EOL;
//                echo "crypt:   ", $crypttext, PHP_EOL;
//                echo "result:  ", $this->safe_b64encode($crypttext), PHP_EOL;
//                echo "---", PHP_EOL;
//                echo "</pre>";
                return trim($this->safe_b64encode($crypttext));
            }

            public function decode($value){

                if(!$value){return false;}
                $crypttext = $this->safe_b64decode($value);
//                $crypttext = $value;
                $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
//                echo "<pre>";
//                echo "value:   ", $value, PHP_EOL;
//                echo "b64:     ", $crypttext, PHP_EOL;
//                echo "mc_key:  ", $this->skey, PHP_EOL;
//                echo "iv_size: ", $iv_size, PHP_EOL;
//                echo "iv:      ", $iv, PHP_EOL;
//                echo "decrypt: ", $decrypttext, PHP_EOL;
//                echo "---", PHP_EOL;
//                echo "</pre>";
                return trim($decrypttext);
            }
        }
    }


    if ( in_array("sql_insert", $cfg["mitglieder"]["function"][$environment["kategorie"]]) ) {

        function insert_member_data($member_data, $timestamp = FALSE) {
            global $db, $cfg;

            $error = "";

            // SQL in log-tabelle speichern
            // -----------------------------------------------------------------
            if ( $cfg["mitglieder"]["import_log"] != FALSE ) {

                // TODO: evtl. log-speicherung wieder aus Funktion rausnehmen


//echo print_r($member_data,true);
                $log_date = date("U");
                if ( $timestamp != FALSE ) {

                    // gibt es einen Datensatz mit diesem Timestamp
                    $sql = "SELECT *
                              FROM ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                             WHERE ".$cfg["mitglieder"]["db"]["import_log"]["time"]."=".$timestamp."";
//echo $sql."\n";
                    $result  = $db -> query($sql);
                    if ( $db->num_rows($result) > 0 ) {
//echo "<pre>";
                        // Daten holen
                        $data = $db -> fetch_array($result,1);
//echo print_r($data,true);

                        /**
                         * Mulit-byte Unserialize
                         *
                         * UTF-8 will screw up a serialized string
                         *
                         * @access private
                         * @param string
                         * @return string
                         */
                        function mb_unserialize($string) {
                            $string2 = preg_replace_callback(
                                '!s:(\d+):"(.*?)";!s',
                                function($m){
                                    $len = strlen($m[2]);
                                    $result = "s:$len:\"{$m[2]}\";";
                                    return $result;

                                },
                                $string);
                            return unserialize($string2);
                        }

                        $member_data = mb_unserialize($data[$cfg["mitglieder"]["db"]["import_log"]["content"]]);
//echo print_r(($data[$cfg["mitglieder"]["db"]["import_log"]["content"]]),true)."\n";

                        // Log auf aktive schalten
                        $sql = "UPDATE ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                                   SET ".$cfg["mitglieder"]["db"]["import_log"]["active"]."=-1,
                                       ".$cfg["mitglieder"]["db"]["import_log"]["count"]."=".count($member_data)."
                                 WHERE ".$cfg["mitglieder"]["db"]["import_log"]["time"]."=".$timestamp;
//echo $sql."\n";
//echo "--".print_r($member_data,true);
//exit;
                        $result  = $db -> query($sql);
                        // alle anderen auf inaktive schalten
                        $sql = "UPDATE ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                                   SET ".$cfg["mitglieder"]["db"]["import_log"]["active"]."=0
                                 WHERE ".$cfg["mitglieder"]["db"]["import_log"]["time"]."<>".$timestamp;
//echo $sql."\n";
                        $result  = $db -> query($sql);
                    }
                } else {
                
                    $data = [ 
                        "fields" => [
                            $cfg["mitglieder"]["db"]["import_log"]["time"],
                            $cfg["mitglieder"]["db"]["import_log"]["count"],
                            $cfg["mitglieder"]["db"]["import_log"]["active"]
                        ],
                        "values" => [
                            "'".$log_date."'",
                            count($member_data),
                            '-1'
                        ],
                    ];
                    if ( $cfg["mitglieder"]["import_log"] == "backup" ) {
                        $data["fields"][] = $cfg["mitglieder"]["db"]["import_log"]["content"];
                        $data["values"][] = "'".addcslashes(serialize($member_data),"'")."'";
                    }

                    // neuen Datensatz einfuegen
                    $sql = "INSERT INTO ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                                        (".implode(", ", $data["fields"]).")
                                 VALUES (".implode(", ", $data["values"]).")";
//echo "<pre>";
//echo print_r($member_data,true);
//echo print_r(serialize($member_data),true)."\n";
//echo print_r(addcslashes(serialize($member_data),"'"),true)."\n";
//echo $sql."\n";
//echo "</pre>";
//exit;
                    $result  = $db -> query($sql);
                    if ( !$result ) {
                        $error = $db -> error("FEHLER");
                    } else {
                        $sql = "UPDATE ".$cfg["mitglieder"]["db"]["import_log"]["entries"]."
                                   SET ".$cfg["mitglieder"]["db"]["import_log"]["active"]."=0
                                 WHERE ".$cfg["mitglieder"]["db"]["import_log"]["time"]."<>".$log_date;
                        $result  = $db -> query($sql);
                    }

                }

            }
//            // -----------------------------------------------------------------
//echo print_r($member_data,true);
//exit;


            // Daten einfuegen
            // -----------------------------------------------------------------
            if ( $error == "" ) {
                $start = array_sum(explode(' ', microtime()));
                $sql_tmp_array = array();
                
                $datetime = date("Y-m-d H:i:s");

                // Transaktion vorbereiten
                #$sql = "BEGIN;";
                #$sql_tmp_array[] = "BEGIN;";
                #$result  = $db -> query($sql);

                // Tabelle loeschen
                #$sql = "DELETE FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].";";
                #$sql_tmp_array[] = "DELETE FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"].";";
                #$result  = $db -> query($sql);
                #if ( !$result ) {
                #    $error = $db -> error("FEHLER");
                #}

                if ( $error == "" ) {
                    // Neue Daten einfuegen
                    foreach ( $member_data as $value ) {
//                        sql = "INSERT INTO ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]."
//                                                    (".implode(",
//                                                        ",$value["field"]).")
//                                                VALUES (".implode(",
//                                                        ",$value["value"]).");";
                        $sql = "INSERT INTO ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]." (".implode(", ",$value["field"]).", import_date) VALUES (".implode(", ",$value["value"]).", '".$datetime."');";
                        $result  = $db -> query($sql);
                        if ( !$result ) {
                            $error = $db -> error("FEHLER");
                            break;
                        }
                    }
                }

                // Transaktion durchfuehren
                if ( $error == "" ) {
                    $sql = "DELETE FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]." WHERE import_date<>'".$datetime."';";
                } else {
                    $sql = "DELETE FROM ".$cfg["mitglieder"]["db"]["mitglieder"]["entries"]." WHERE import_date='".$datetime."';";
                }
                $result  = $db -> query($sql);
                if ( !$result ) {
                    $error = $db -> error("FEHLER");
                }
                
//echo implode("\n",$sql_tmp_array)."\n";
                $exec_time = number_format( (array_sum(explode(' ', microtime())) - $start) , 5);
                if ( $debugging["html_enable"] ) $debugging["ausgabe"] .= "  * Infos in DB geschrieben in           ".$exec_time." Sekunden".$debugging["char"];
            }
            // -----------------------------------------------------------------

            return $error;

        }

    }

    ### platz fuer weitere funktionen ###

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
