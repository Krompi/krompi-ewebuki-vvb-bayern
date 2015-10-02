#!/bin/sh
path_ewebuki=ewebuki
path_custom=vvb

while [ "$1" != "" ]; do
    case $1 in
        -e | --file )           shift
                                path_ewebuki=$1
                                ;;
        -c | --interactive )    shift
                                path_custom=$1
                                ;;
#        -h | --help )           usage
#                                exit
#                                ;;
#        * )                     usage
#                                exit 1
    esac
    shift
done

echo ${path_ewebuki}
echo ${path_custom}
exit;




cd ..
cd ewebuki

ln -sfv ../vvb/.htaccess
rm -rf  file
ln -sfv ../vvb/file

# Ordner Links setzen
cd css/
    ln -sfv ../../vvb/css/vvb
    ln -sfv ../../vvb/css/vvb_01
cd ..

cd images
    ln -sfv ../../vvb/images/vvb
cd ..

cd js
    ln -sfv ../../vvb/js/vvb
cd ..
cd modules
    ln -sfv ../../vvb/modules/vvb
cd ..

cd templates
    ln -sfv ../../vvb/templates/vvb
    ln -sfv ../../vvb/templates/vvb_01
cd ..

# configs-Links setzen
cd conf
    ln -sfv ../../vvb/conf/auth.cfg.php
    ln -sfv ../../vvb/conf/file.cfg.php
    ln -sfv ../../vvb/conf/modules.cfg.php
    ln -sfv ../../vvb/conf/overwrite.cfg.php
    ln -sfv ../../vvb/conf/site.cfg.php
cd ..

cd modules
    cd basic
        ln -sfv ../../../vvb/modules/basic/menu2.cfg.php
        ln -sfv ../../../vvb/modules/basic/path.cfg.php
    cd ..
    cd addon
        ln -sfv ../../../vvb/modules/addon/kontakt.cfg.php
        ln -sfv ../../../vvb/modules/addon/changed.cfg.php
    cd ..
    cd admin
        ln -sfv ../../../vvb/modules/admin/bloged.cfg.php
        ln -sfv ../../../vvb/modules/admin/contented.cfg.php
        ln -sfv ../../../vvb/modules/admin/menued2.cfg.php
        ln -sfv ../../../vvb/modules/admin/fileed2.cfg.php
    cd ..
    cd wizard
        ln -sfv ../../../vvb/modules/wizard/wizard.cfg.php
    cd ..
cd ..
