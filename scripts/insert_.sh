
#!/bin/bash

DBUSER=root
DBPASSWORD=qt67uy
DATABASE=torrent                        

mysql -u$DBUSER -p$DBPASSWORD -D$DATABASE -e "UPDATE torrents SET download=1, when_downloaded=now() WHERE torrent='Neadekvatnyie.lyudi.2.2020.WEB-DLRip.1400MB.ELE_38410.torrent'"
        