#!/bin/bash
orario=`date`
sudo -g internet wget "http://www.pdpiedimonte.it/allarme_motion_detection.php?sede=Piedimonte&tempo=$orario"
ok=`/opt/script/chiama.rb`
