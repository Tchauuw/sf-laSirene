#!/bin/bash
for i in `seq 65 256`;
do
	wget http://www.pas-si-bete.fr/inclusions/getimage.php?id=$i -O $i.png	
done
