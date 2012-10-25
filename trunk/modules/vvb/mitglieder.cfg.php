<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id$";
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
////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////

    $cfg["mitglieder"] = array(
           "subdir" => "vvb",
             "name" => "mitglieder",
            "basis" => $pathvars["virtual"]."/admin/mitglieder", # crc = -1468826685 *
         "iconpath" => "", # leer: /images/default/; automatik: $pathvars["images"]
            "color" => array(
                        "a" => "#eeeeee",
                        "b" => "#ffffff",
                       ),
         "function" => array(
                      "add" => array(""),
                     "edit" => array(""),
                   "delete" => array(""),
                  "details" => array(""),
                   "import" => array("crypt"),
              #"edit,shared" => array("shared1", "shared2"),
              #"edit,global" => array("global1", "global2"),
                       ),
               "db" => array(
                       "mitglieder" => array(
                                  "entries" => "db_mitglieder",
                                      "key" => "Mitglieds_Nr",
                                   "bezirk" => "Bezirk",
                                       "va" => "VA",
                                    "order" => "sort, label",
                                    "rows"  => 4,
                                      ),
                       ),
      "csv_fields" => array(
                         "Mitglieds_Nr"     => array(
                                                    "db"    => "Mitglieds_Nr",
                                                    "crypt" => FALSE,
                                               ),
                         "Anrede"     => array(
                                                    "db"    => "Anrede",
                                                    "crypt" => FALSE,
                                               ),
                         "Vorname"     => array(
                                                    "db"    => "Vorname",
                                                    "crypt" => FALSE,
                                               ),
                         "Nachname"     => array(
                                                    "db"    => "Nachname",
                                                    "crypt" => FALSE,
                                               ),
                         "Straße"     => array(
                                                    "db"    => "Strasse",
                                                    "crypt" => TRUE,
                                               ),
                         "Plz"     => array(
                                                    "db"    => "Plz",
                                                    "crypt" => TRUE,
                                               ),
                         "Ort"     => array(
                                                    "db"    => "Ort",
                                                    "crypt" => TRUE,
                                               ),
                         "Abteilung_1"     => array(
                                                    "db"    => "Eingruppierung",
                                                    "crypt" => TRUE,
                                               ),
                         "Geburtsdatum"     => array(
                                                    "db"    => "Geburtsdatum",
                                                    "crypt" => TRUE,
                                               ),
                         "Bezirk"     => array(
                                                    "db"    => "Bezirk",
                                                    "crypt" => FALSE,
                                               ),
                         "Abteilung_1"     => array(
                                                    "db"    => "Eingruppierung",
                                                    "crypt" => TRUE,
                                               ),
                         "Berufsgruppe"     => array(
                                                    "db"    => "VA",
                                                    "crypt" => FALSE,
                                               ),
                         "Sonstiges_1"     => array(
                                                    "db"    => "Sonstiges_1",
                                                    "crypt" => TRUE,
                                               ),
                     ),
            "right" => "",
    );

    // * tipp: fuer das einfache modul muss der wert $cfg["basis"] natuerlich
    // "/my" lauten. es funktioniert im beispiel nur ohne aenderung, da das
    // einfache script $cfg["basis] nicht nutzt.

////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////
?>
