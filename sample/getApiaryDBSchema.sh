#!/usr/bin/env bash
mysqldump.exe --no-data -u root -R -p myapiary --default-character-set=utf8 --skip-add-locks --skip-comments --result-file db.schema

