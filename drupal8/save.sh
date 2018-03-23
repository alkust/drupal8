#!/usr/bin/env bach

TMP_DIR = ../Backup_tmp
mkdir -p ${TMP_DIR}


DEST_DIR = ../backups
mkdir -p ${DEST_DIR}
# PUT site en maintance mode for safety
#1
drush state:set site.maintenance_mode TRUE


#2 do backup
drush sql:dump > ${TMP_DIR}/database-Backup.sql
#3 transfer le file 
rsync -v . ${TMP_DIR} --exclude .git/


#Archive everything (file and data)
#composser le file et data
tar -czf ${DEST_DIR}/Backup_$(date -Is).tgz ${TMP_DIR}/


drush state:set site.maintenance_mode FALSE

chmod  -R u+w ${TMP_DIR}
rm -rf ${TMP_DIR}