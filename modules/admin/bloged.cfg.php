<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id$";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
    eWeBuKi - a easy website building kit
    Copyright (C)2001-2010 Werner Ammon <wa@chaos.de>

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

    $cfg["bloged"] = array(
           "subdir" => "admin",
             "name" => "bloged",
            "basis" => $pathvars["virtual"]."/admin/bloged",
         "iconpath" => "", # leer: /images/default/; automatik: $pathvars["images"]
            "color" => array(
                        "a" => "#cccccc",
                        "b" => "#999999",
                       ),
         "function" => array(
                     "list" => "",
              "list,shared" => array("menu_convert"),
                      "add" => "",
               "add,shared" => array("menu_convert"),
                     "edit" => "",
                   "delete" => "",
            "delete,shared" => array("menu_convert","show_blog"),
                     "sort" => "",
              "sort,shared" => array("menu_convert"),
                       ),
               "db" => array(
                   "bloged" => array(
                          "entries" => "site_text",
                              "key" => "tname",
                            "order" => "CONTENT DESC",
                             "rows" => 10,
                               ),
                       ),
            "blogs" => array(
//                    "/blog" => array(
                 "/aktuell" => array(
                           "wizard" => "artikel",
                             "rows" => 5,
                             "sort" => array("SORT"),
//                         "category" => "KATEGORIE",
                "own_list_template" => "artikel-list",
                            "tags"  => array(
//                                    "titel" => "H1",
                                    "titel" => array( "tag" => "H1", "content" => "Schlagzeile"),
                                    "image" => array( "tag" => "IMG=", "content" => "", "parameter" => "/file/jpg/47/m/logo-vvb-schmal.jpg;l;0;l;5;;20"),
                                   "teaser" => array( "tag" => "P=teaser", "content" => "Ein Teaser (von engl. tease = reizen, necken) ist in der Werbesprache ein Anreißer, der zum Weiterlesen, -hören, -sehen, -klicken verlocken soll."),
                                   "absatz" => array( "tag" => "P", "content" => "Absatz"),
                                       ),
                           "addons" => array(
                                     "ende" => array( "tag" => "ENDE", "content" => date("Y-m-d" , mktime(0, 0, 0, date("m"), date("d"), (date("Y")+1))))
                                       ),
                               ),
#                     "/faq" => array(
#                           "wizard" => 0,
#                             "rows" => 10,
#                             "sort" => array("SORT",-1),
#                         "category" => "KATEGORIE",
#                "own_list_template" => "",
#                            "tags"  => array(
#                                 "question" => array( "tag" => "H2", "content" => "Frage"),
#                                   "answer" => array( "invisible" => -1,"tag" => "P", "content" => "Antwort"),
#                                       ),
#                               ),
                       ),
    );

////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////
?>
