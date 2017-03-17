#!/usr/bin/env bash
mysqldump --no-data -u root -R -p myapriary --default-character-set=utf8 --skip-add-locks --skip-comments --result-file db.schema

