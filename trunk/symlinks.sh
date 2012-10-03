#!/bin/sh
cd ..
cd website

ln -sfv ../vvb.ext/.htaccess
rm -rf  file
ln -sfv ../vvb.ext/file

# Ordner Links setzen
cd css/
    ln -sfv ../../vvb.ext/css/vvb
    ln -sfv ../../vvb.ext/css/vvb_01
cd ..

cd images
    ln -sfv ../../vvb.ext/images/vvb
cd ..

cd js
    ln -sfv ../../vvb.ext/js/vvb
cd ..
cd modules
    ln -sfv ../../vvb.ext/modules/vvb
cd ..

cd templates
    ln -sfv ../../vvb.ext/templates/vvb
    ln -sfv ../../vvb.ext/templates/vvb_01
cd ..

# configs-Links setzen
cd conf
    ln -sfv ../../vvb.ext/conf/auth.cfg.php
    ln -sfv ../../vvb.ext/conf/file.cfg.php
    ln -sfv ../../vvb.ext/conf/modules.cfg.php
    ln -sfv ../../vvb.ext/conf/overwrite.cfg.php
    ln -sfv ../../vvb.ext/conf/site.cfg.php
cd ..

cd modules
    cd basic
        ln -sfv ../../../vvb.ext/modules/basic/menu2.cfg.php
        ln -sfv ../../../vvb.ext/modules/basic/path.cfg.php
    cd ..
    cd addon
        ln -sfv ../../../vvb.ext/modules/addon/kontakt.cfg.php
        ln -sfv ../../../vvb.ext/modules/addon/changed.cfg.php
    cd ..
    cd admin
        ln -sfv ../../../vvb.ext/modules/admin/bloged.cfg.php
        ln -sfv ../../../vvb.ext/modules/admin/contented.cfg.php
        ln -sfv ../../../vvb.ext/modules/admin/menued2.cfg.php
        ln -sfv ../../../vvb.ext/modules/admin/fileed2.cfg.php
    cd ..
    cd wizard
        ln -sfv ../../../vvb.ext/modules/wizard/wizard.cfg.php
    cd ..
cd ..

