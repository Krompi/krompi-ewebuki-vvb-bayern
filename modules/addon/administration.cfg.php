<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// administration.cfg.php-dist v1 emnili
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-2015 Werner Ammon ( wa<at>chaos.de )

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

    86343 Koenigsbrunn

    URL: http://www.chaos.de
*/
////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////

    $cfg["admin"] = array(
           "subdir" => "addon",
             "name" => "leer",
            "basis" => $pathvars["virtual"]."/dir/my", # crc = -1468826685 *
         "iconpath" => $pathvars["images"], # leer: /images/default/; automatik: $pathvars["images"]
            "color" => array(
                        "a" => "#eeeeee",
                        "b" => "#ffffff",
                       ),
         "function" => array(
                      "login" => array(""),
                     "edit" => array(""),
                   "delete" => array(""),
                  "details" => array(""),
              #"edit,shared" => array("shared1", "shared2"),
              #"edit,global" => array("global1", "global2"),
                       ),
                      "db" => array(
                            "change" => 0,
                             "menu" => array(
                                  "entries" => "site_menu",
                                      "key" => "mid",
                                    "order" => "sort, label",
                                       ),
                             "lang" => array(
                                  "entries" => "site_menu_lang",
                                      "key" => "mlid",
                                    "order" => "lang",
                                       ),
                             "text" => array(
                                  "entries" => "site_text",
                                       ),
                             "user" => array(
                                  "entries" => "auth_user",
                                      "key" => "uid",
                                    "order" => "nachname,vorname",
                                       ),
                            "level" => array(
                                  "entries" => "auth_level",
                                      "key" => "lid",
                                 "levelkey" => "level",
                                       ),
                            "right" => array(
                                  "entries" => "auth_right",
                                  "userkey" => "uid",
                                 "levelkey" => "lid",
                                       ),
                          "special" => array(
                                  "entries" => "auth_special",
                                  "userkey" => "suid",
                               "contentkey" => "content",
                                 "dbasekey" => "sdb",
                                 "tnamekey" => "stname"
                                       ),
                       ),

       "ext_script" => "",
            "right" => "",
    );

    // * tipp: fuer das einfache modul muss der wert $cfg["basis"] natuerlich
    // "/my" lauten. es funktioniert im beispiel nur ohne aenderung, da das
    // einfache script $cfg["basis] nicht nutzt.

////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////
?>
