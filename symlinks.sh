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
cd ${path_ewebuki}

ln -sfv ../${path_custom}/.htaccess
rm -rf  file
ln -sfv ../${path_custom}/file

# Ordner Links setzen
cd css/
    ln -sfv ../../vvb/css/vvb
    ln -sfv ../../${path_custom}/css/vvb_01
cd ..

cd images
    ln -sfv ../../${path_custom}/images/vvb
cd ..

cd js
    ln -sfv ../../${path_custom}/js/vvb
cd ..
cd modules
    ln -sfv ../../${path_custom}/modules/vvb
cd ..

cd templates
    ln -sfv ../../${path_custom}/templates/vvb
    ln -sfv ../../${path_custom}/templates/vvb_01
cd ..

# configs-Links setzen
cd conf
    ln -sfv ../../${path_custom}/conf/auth.cfg.php
    ln -sfv ../../${path_custom}/conf/file.cfg.php
    ln -sfv ../../${path_custom}/conf/modules.cfg.php
    ln -sfv ../../${path_custom}/conf/overwrite.cfg.php
    ln -sfv ../../${path_custom}/conf/site.cfg.php
cd ..

cd modules
    cd basic
        ln -sfv ../../../${path_custom}/modules/basic/menu2.cfg.php
        ln -sfv ../../../${path_custom}/modules/basic/path.cfg.php
    cd ..
    cd addon
        ln -sfv ../../../${path_custom}/modules/addon/kontakt.cfg.php
        ln -sfv ../../../${path_custom}/modules/addon/changed.cfg.php
    cd ..
    cd admin
        ln -sfv ../../../${path_custom}/modules/admin/bloged.cfg.php
        ln -sfv ../../../${path_custom}/modules/admin/contented.cfg.php
        ln -sfv ../../../${path_custom}/modules/admin/menued2.cfg.php
        ln -sfv ../../../${path_custom}/modules/admin/fileed2.cfg.php
    cd ..
    cd wizard
        ln -sfv ../../../${path_custom}/modules/wizard/wizard.cfg.php
    cd ..
cd ..
