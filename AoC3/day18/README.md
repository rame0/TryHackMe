# DAY 18 - Playing With Containers 

## Docker

The term "Docker" is used to describe:

* Docker API - a local communication interface on a configured Linux machine, with standardized commands used to communicate with a Docker Daemon.
* Docker Daemon - a process that runs on your machine (the Docker daemon), to interact with container components such as images, data volumes, and other container artifacts.
* Docker Container Image Format - ultimately a .tar file. For Version 1, the docker image format was not strictly compliant with the OCI Image Specification. For our purposes, this won't change how we interact with container images in this exercise, but it does slightly change the format and content of a container image.




Will need Docker for this Day.
Install instructions: https://docs.docker.com/engine/install/

#### For linux
After Docker installed, you need to add current user to `docker` group to be able to use it:

```bash
sudo usermod -aG docker $USER
```

__Do not forget__ to logout and login back for the changes to take effect.


## Start

__We've traced the Grinch Enterprises attack infrastructure back to a likely Elastic Container Registry that is publicly accessible:__

https://gallery.ecr.aws/h0w1j9u3/grinch-aoc

### Retrive Grinch Enterprises image

```bash
docker pull public.ecr.aws/h0w1j9u3/grinch-aoc:latest
```

### Playing with container

```bash
# run
docker run -it public.ecr.aws/h0w1j9u3/grinch-aoc:latest

## you should see containers prompt:
$

## list files 
$ ls -la
```

### Spoiler - container env variables

> A good place to check next is environment variables - in Linux and especially for containers, environment variables may be used to store secrets or other sensitive information used to configure the container at run-time.

```bash
$ printenv

## result:
HOSTNAME=c633e29bb404
HOME=/home/newuser
TERM=xterm
PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
api_key=a90eac086fd049ab9a08374f65d1e977
PWD=/home/newuser

$
```

And we found `api_key`. It is not usefull int this challange but who knows what can be found in other containers. So do bother and always check env variables!


## Bonus Challenge

Save image to `*.tar`

```bash
docker save -o day18.tar public.ecr.aws/h0w1j9u3/grinch-aoc:latest
```

Unpack saved image

```bash
tar -xf day18.tar
```

To better output JSON files use `jq` tool

```bash
cat manifest.json | jq
```

Output:
```json
[
  {
    "Config": "f886f00520700e2ddd74a14856fcc07a360c819b4cea8cee8be83d4de01e9787.json",
    "RepoTags": [
      "public.ecr.aws/h0w1j9u3/grinch-aoc:latest"
    ],
    "Layers": [
      "64b2e27e049d29a0c38dd88a2446bbbc23fd2d4f88f6bed26e5ea72ffb81d21b/layer.tar",
      "559249edcba26c6a9d3927bf220536df3b78c4399cabe2204bbde597413758da/layer.tar",
      "b4fefd064b69de0870efa2dab29ee7abcc009a6efdd407b1ad0f3eb32c585bed/layer.tar",
      "12a6d45b9cb222b315a5b15040946022affc7c2e22b739d2c12325d449930f5c/layer.tar",
      "ceb5a33941d84ede94cd7c8f20a7cec889751f8807de93a0e0b1f91e1e359a7b/layer.tar",
      "d2588794f87a669ac8def91fb3b3efe8298dcd15dffcc72b79ce478c09911ab8/layer.tar",
      "7b1e883caf5d75ad46c4285f81e95a1c1c7c5d6fa1dc17132d1a1450bfe23da9/layer.tar",
      "f9cb025892b0e7f8ed3f81d04ed132cb9b526353e7df202eb8f3b10a4ef37a85/layer.tar",
      "31fd0ab03e6d6f0380aac8c1a3501a782fb4aa21f8d66d4a44f54d59c9cec173/layer.tar"
    ]
  }
]
```

## Digging

Reading "Config" file (first line in `manifest.json`) we can find that attacker installed `envconsul` in this image.

Read about this tool on github. That tool "Launch a subprocess with environment variables using data from @hashicorp Consul and Vault."

Nothing else suspicious.

Let's dig rest of `*.tar` files and find it.

Go throw all layers directories, unpack `*.tar` files and check their contents like so:

```bash
# go and unpack
cd 64b2e27e049d29a0c38dd88a2446bbbc23fd2d4f88f6bed26e5ea72ffb81d21b
tar -xf layer.tar

# list contents
ls -la

### Analize

### if nothing found, go to next layer
```

__We know that we are searchig `envconsul` stored in `/root` dir__


<details>
	<summary>What we're looging for</summary>

	Searc for `config.hcl` stored in `root/envconsul`.
	In my case it was in stored in last layer.
</details>


We found our token!

```
709*********************fa
```
<!-- 7095b3e9300542edadbc2dd558ac11fa -->