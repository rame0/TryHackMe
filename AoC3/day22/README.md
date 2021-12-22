# DAY 22 - How It Happened 

### Tools

#### CyberChef
Awesome decoding/encoding tool. Can 'bake' receips of dec/enc process.

https://cyberchef.org/

#### Oledump (oledump.py)
Tool to analyze `OLE` files. Will help to analyze macros in MS Office files (`.xls`, `.doc`, etc).

https://blog.didierstevens.com/programs/oledump-py/


Useful options:

* `-A` - does an ASCII dump similar to option -a, but duplicate lines are removed.
* `-S` - dumps strings.
* `-d` - produces a raw dump of the stream content. 
* `-s STREAM NUMBER`, `--select=STREAM NUMBER` - allows you to select the stream number to analyze (-s a to select all streams)
* `-d`, `--dump` - perform a raw dump
* `-x`, `--hexdump` - perform a hex dump
* `-a`, `--asciidump` - perform an ascii dump
* `-S`, `--strings` - perform a strings dump
* `-v`, `--vbadecompress` - VBA decompression



## Solving

### Get the macros

Get list of streams
```bash
python oledump.py ..\\..\\Santa_Claus_Naughty_List_2021\\Santa_Claus_Naughty_List_2021.doc
```

Get macros (we have hint in description)
```bash
python oledump.py -s 8 -d ..\\..\\Santa_Claus_Naughty_List_2021\\Santa_Claus_Naughty_List_2021.doc
```

Output that dump to file, for easy use

```bash
python oledump.py -s 8 -S ..\\..\\Santa_Claus_Naughty_List_2021\\Santa_Claus_Naughty_List_2021.doc > dump.txt
```

### Decode macros
Use CybetChef

- __The original output looks like Base64__
- __Next step is to aply XOR with key 35__
- That is still looks encoded. __But again it looks like Base64__

Now we have our macros cod.


## What is the username
```
Gr******************@gmail.com
```
<!-- Grinch.Enterprises.2021@gmail.com -->

## What is the mailbox password you found?
```
S@***************wn
```
<!-- S@ntai$comingt0t0wn -->

## What is the subject of the email?

```
Ch******* ******st
```
<!-- Christmas Wishlist -->

## What port is the script using to exfiltrate data from the North Pole?

```
**7
```
<!-- 587 -->

## What is the flag hidden found in the document
To solve that you have to check other streams

```bahs
python oledump.py -s <stream_number> -d ..\\..\\Santa_Claus_Naughty_List_2021\\Santa_Claus_Naughty_List_2021.doc
```

```
Yo*************kie
```
<!-- YouFoundGrinchCookie -->

## There is still a second flag somewhere... can you find it on the machine?
If you look closely to macros code, you will find the folder to check!

```
S@*************Al
```
<!-- S@nt@c1Au$IsrEAl -->