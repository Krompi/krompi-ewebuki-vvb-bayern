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
                return trim($this->safe_b64encode($crypttext));
            }

            public function decode($value){

                if(!$value){return false;}
                $crypttext = $this->safe_b64decode($value);
                $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
                return trim($decrypttext);
            }
        }
    }

    ### platz fuer weitere funktionen ###

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
