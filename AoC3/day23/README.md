# DAY 23 - PowershELlF Magic 

### Learning Objectives:

* Analyze Windows event logs to understand actions performed in an attack.
* Recover key artifacts in unencrypted web communications. 
* Utilize PowerShell Scripting to recover a delete artifact. 

`Full Event Log View` - tool to view window logs



## What command was executed as Elf McNealy to add a new user to the machine? 

Procede search as described in task description. In one of the results you will find mention of `CVE-......ps1` find that file contents online and analyze it. There you will find that answer.

```
In*********re
```

<!-- Invoke-Nightmare -->


## All other tasks, except last one, are the same simple search.
Most of answers you will find in single result.

```
****n
**.**.***.96,4**1
j3************************yb
******e.exe
11/**/2021 *:**:** PM
```
<!--
adm1n
10.10.148.96,4321
j3pn50vkw21hhurbqmxjlpmo9doiukyb
sdelete.exe
11/11/2021 7:29:27 PM
-->

## The last one - What were the contents of the deleted password.txt file?
This question is interesting.

First of all, wi'll need to find content of that deleted `password.txt` file!

We can not do that. But we know that encrypted content of that file was sent somwhere. So we need to find all records with `{IP}:{PORT}` that we found previously.

There is only two records. In one of which our encrypted data.

```
764*****************<many_characters_and_numbers_here>********************DMA
```
<!-- 
76492d1116743f0423413b16050a5345MgB8AEcAVwB1AFMATwB1ADgALwA0AGQAKwBSAEYAYQBHAE8ANgBHAG0AcQBnAHcAPQA9AHwAMwBlADAAYwBmADAAYQAzAGEANgBmADkAZQA0ADUAMABiADkANgA4ADcAZgA3ADAAMQA3ADAAOABiADkAZAA2ADgAOQA2ADAANQA3AGEAZAA4AGMANQBjADIAMAA4ADYAYQA0ADMAMABkADkAMwBiADUAYQBhADIANwA5AGMAYQA1ADYAYQAzAGEAYQA2ADUAMABjADAAMwAzADYANABlADYAOAA4ADQAYwAxAGMAYwAxADkANwBiADIANAAzADMAMAAzADgAYQA5ADYANAAzADEANAA2AGUAZgBkAGEAMAA3ADcANQAyADcAZgBlADMAZQA3ADUANwAyADkAZAAwAGUAOQA5ADQAOQA1AGQAYQBkADEANQAxADYANwA2AGIAYQBjADAAMQA0AGEAOQA3ADYAYgBkAGMAOAAxAGMAZgA2ADYAOABjADEAMABmADcAZgAyADcAZgBjADEAYgA3AGYAOAA3AGIANQAyAGUAMwA4ADgAYQAxADkANgA4ADMA
	-->


Next step is to decrypt that string. You can write decryptor yourself or use provided `decryptor.ps1`.

1. Open it in text editor, past `$key` (we found it previously)
2. Past encrypted string we just found.
3. Run the scrypt


And here is our answer

```
Mi***********: le***************************now
```
<!-- Mission Control: letitsnowletitsnowletitsnow -->