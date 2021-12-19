# DAY 19 Something Phishy Is Going On 

The easiest way it's to open file in text editor right away

## Who was the email sent to?

```
To: =?utf-8?q?elfmcphearson?= <elf***********c.com>
```
<!-- elfmcphearson@tbfc.com -->

## Who does it say the email was from?

```
From: =?utf-8?q?TBFC_Customers_Service?= <cu**********c.info>
```
<!-- customerservice@t8fc.info -->

## What email address will receive the email response?

```
Reply-To: =?utf-8?q?TBFC_Customers_Service?= <*****@t******.*****>
```
<!-- fisher@tempmailz.grinch -->

##  What is the misspelled word?

__Questionable question__. Not even every native speaker will find this misspells...
But it's easy to ctrl+c/ctrl+v in some spells checker.

Most common type of misspell is not skipped letters. It is attempt to find some round about. For example, in some fonts letter l and number 1 a look very similar, or O and 0. 

Also they can use letters from different language, that looks the same but will trigger spellchecker.

```
stright
```

## What is the link to the credential harvesting website?
Open this `*.eml` file in email viewer and copy link from there.

```
https://********************/fishing/
```
<!-- https://89xgwsnmo5.grinch/out/fishing/ -->

## What is the header and its value?

It's right before body starts `--===============8728600155675736444==`

```
X-G*******: ****
```
<!-- X-GrinchPhish: >;^) -->

## What is the name of the attachment?

Check `attachment.txt`

```
pa**********************ns.pdf
```
<!-- password-reset-instructions.pdf -->


## What is the flag in the PDF file?

As you can see in `attachment.txt` headers, this is `base64` encoding.
```
Content-Transfer-Encoding: base64
```

So we can take contents and decode it (the contents in `attachment-base64-only.txt` file)

The easyest way is to use console tool `base64`. And save it to `attachment.pdf`
```bash
cat attachment-base64-only.txt | base64 -d > attachment.pdf
```

Now open attachment.pdf in any pdf viever and. There is our FLAG.

```
THM{*************************}
```
<!-- THM{A0C_Thr33_Ph1sh1ng_An4lys!s} -->


