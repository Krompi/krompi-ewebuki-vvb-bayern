<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// "$Id$";
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
////+///////+///////+///////+///////+///////+///////+///////////////////////////////////////////////////////////

    $cfg["file"] = array(
         "filesize" => "25000000",
          #"filetyp" => array("jpg", "png", "pdf", "zip", "gif", "odt", "ods", "odp", "odg", "bz2", "gz"),
          "filetyp" => array( "gif" => "img",
                              "jpg" => "img",
                             "jpeg" => "img",
                              "png" => "img",
                              "pdf" => "pdf",
                              "zip" => "arc",
                              "bz2" => "arc",
                               "gz" => "arc",
                              "odt" => "odf",
                              "ods" => "odf",
                              "odp" => "odf",
                              "odg" => "odf",
                              "csv" => "txt",
                       ),
          "fileopt" => array(
                      "img" => array(
                             "name" => "img",
                             "path" => $pathvars["fileroot"]."file/picture/",
                           "tnpath" => $pathvars["fileroot"]."file/new/",
                        "thumbnail" => "set"
                               ),
                      "pdf" => array(
                             "name" => "doc",
                             "path" => $pathvars["fileroot"]."file/document/",
                           "tnpath" => $pathvars["fileroot"]."file/", # see function thumbnail()
                        "thumbnail" => "icon_pdf.png"
                              ),
                      "arc" => array(
                             "name" => "arc",
                             "path" => $pathvars["fileroot"]."file/archiv/",
                           "tnpath" => $pathvars["fileroot"], # see function thumbnail()
                        "thumbnail" => "icon_zip.jpg"
                               ),
                      "odf" => array(
                             "name" => "doc",
                             "path" => $pathvars["fileroot"]."file/document/",
                           "tnpath" => $pathvars["fileroot"], # see function thumbnail()
                        "thumbnail" => "icon_odf.png"
                               ),
                      "txt" => array(
                             "name" => "txt",
                             "path" => $pathvars["fileroot"]."file/document/",
                           "tnpath" => $pathvars["fileroot"], # see function thumbnail()
                        "thumbnail" => "icon_odf.png"
                               ),
             "preview_size" => "s",
                       ),
             "size" => array(
                        "b" => "580",
                        "m" => "196:147",
                        "s" => "150",
                       "tn" => "85",
                      "max" => "1024", # leer bedeutet, orginal bleibt erhalten
                       ),
             "base" => array(
                  "maindir" => $pathvars["fileroot"]."file/",
                   "webdir" => $pathvars["subdir"]."/file/",
                 "realname" => True,
                      "new" => "new/",
                      "pic" => array(
                             "root" => "picture/",
                               "tn" => "thumbnail/",
                                "o" => "original/",
                                "s" => "small/",
                                "m" => "medium/",
                                "b" => "big/",
                      ),
                      "doc" => "document/",
                      "arc" => "archiv/",
                       ),
    );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
