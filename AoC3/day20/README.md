# DAY 20 -  What's the Worst That Could Happen? 

## Learning Objectives:

In this task, we will learn:

* How to identify the file type of a file regardless of file extension
* How to find strings in a file
* How to calculate hash of a file
* Using VirusTotal to perform preliminary analysis of a suspicious file


### There is only a single line of output to the 'strings' command. What is the output? 

``` bash
cd Desctop
strings testfile

# X5*************************}$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H*
```
<!-- X5O!P%@AP[4\PZX54(P^)7CC)7}$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H* -->


### Check the file type of 'testfile' using the 'file' command. What is the file type?

```bash
file testfile

# EI******************es
```

<!-- EICAR virus test files -->


### Calculate the file's hash and search for it on VirusTotal. When was the file first seen in the wild?


```bash
md5sum testfile

# 44********************2f
```
<!-- 44d88612fea8a8f36de82e1278abb02f -->

Search this hash in VirusTotal. https://www.virustotal.com.

After search finishes, go to `Details` tab. There is our date

```
First Seen In The Wild 2***-**-** 22:03:48

First Submission 2006-05-22 12:42:02
Last Submission 2021-12-20 17:22:50
Last Analysis 2021-12-20 17:22:50
```
<!-- 2005-10-17 22:03:48 -->

### On VirusTotal's detection tab, what is the classification assigned to the file by Microsoft?

```
 Microsoft:	Virus:DOS/************le
```

<!-- Virus:DOS/EICAR_Test_File -->

### What were the first two names of this file?

Find the answer using provided link (https://www.eicar.org/?page_id=3950) learn.

```
d******.htm or du**********.htm
```

<!-- ducklin.htm or ducklin-html.htm -->


### What is the maximum number of total characters that can be in the file?

You'll know if you read the file.
```
1**
```
<!-- 128 -->
