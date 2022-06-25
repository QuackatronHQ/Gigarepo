# SH-1046
if true
then
  echo "True"
done

# SH-1047
if true
then
  echo "True"
done

# SH-10
if true
  echo "foo"
elif true
  echo "bar"
fi

# SH-1050
if true
  echo "True"
fi

# SH-1056
#!/bin/bash
bar() { echo "hello world" }

# SH-1058
for file in *
  echo "$file"
done

#SH-1061
yes() {
  while echo "y"
  do
    true
}

# SH-1064
foo() {
  echo "hello world"
}
foo()

# SH-1065
foo(input) {
  echo "$input"
}
foo("hello world");

# SH-1066
$greeting="Hello World"

# SH-1078

# SH-1081
If true
Then
  echo "hello"
Fi

# SH-1082
$ cat -v file
M-oM-;M-?#!/bin/bash
echo "hello world"

# SH-1088
grep ^(.*)\1$ file
# or
var=myfunction(value)

# SH-1089
if true
then
  echo hello
fi

# SH-1097
var==value

# SH-1110
echo ‘hello world’

# SH-1116
var=((foo+1))

# SH-1119

# SH-1121

# SH-1122

# SH-1127
// This is a comment.
/* This is a comment as well. */

# SH-1129
while! [ -f file ]
do sleep 1; done

# SH-1130
until make
do:; done

# SH-1132
curl https://www.google.com/search?q=cats&tbm=isch

# SH-1133
dmesg
  | grep "error"

# SH-1136
if [ -e "foo.txt" ]: then
  echo "Exists"
fi

# SH-2001
string="stirng" ; echo "$string" | sed -e "s/ir/ri/"

# SH-2004
echo $(($n + ${arr[i]}))

# SH-2006
echo "You are running on `uname`"

# SH-2008
find . | echo

# SH-2009
ps ax | grep -v grep | grep "$service" > /dev/null

# SH-2010
ls /directory | grep mystring
# or
rm $(ls | grep -v '\.c$')

# SH-2011
ls | xargs -n1 wc -w

# SH-2012
ls -l | grep " $USER " | grep '\.txt$'

NUMGZ="$(ls -l *.gz | wc -l)"

# SH-2014
find . -name '*.tar' -exec tar xf {} -C "$(dirname {})" \;

# SH-2015
if [[ $dryrun ]]
then
  echo "Would delete file"
else
  rm file
fi

# SH-2018
PLATFORM="$(uname -s | tr 'A-Z' 'a-z')"

# SH-2019
PLATFORM="$(uname -s | tr 'A-Z' 'a-z')"

# SH-2020
echo 'hello world' | tr 'hello' 'goodbye'

# SH-2021
tr -cd '[a-z]'

# SH-2026
alias server_uptime='ssh $host 'uptime -p''

# SH-2027
echo "You enter "$HOSTNAME". You can smell the wumpus." >> /etc/issue

# SH-2030
n=0
printf "%s\n" {1..10} | while read i; do (( n+=i )); done
echo $n

# SH-2032
foo() { bar --baz "$@"; frob --baz "$@"; };
find . -exec foo {} +

# SH-2033
foo() { bar --baz "$@"; frob --baz "$@"; };
find . -exec foo {} +

# SH-2036
sum=find | wc -l

# SH-2041
for i in 'seq 1 10'
do
  echo "$i"
done

# SH-2043
for var in value
do
  echo "$var"
done

# SH-2044
for file in $(find mydir -mtime -7 -name '*.mp3')
do
  let count++
  echo "Playing file no. $count"
  play "$file"
done
echo "Played $count files"


# SH-2048
ls -l $(getfilename)

# SH-2049
[[ $file =~ *.txt ]]

# SH-2050
if [ myvar = "test" ]
then
  echo "Test mode"
fi

# SH-2061
find . -name '*.txt'

# SH-2062
grep foo* file

# SH-2063
grep '*foo*'

# SH-2064
trap "echo \"Finished on $(date)\"" EXIT

# SH-2065
[ 1 >2 ] || [ 3>'aaa bb' ]

# SH-2066
for s in "$(mycommand)"; do echo "$s"; done

# SH-2067
find . -type f -exec shellcheck {} | wc -l \;
find . -exec echo {} ;

# SH-2068
cp $@ ~/dir

# SH-2069
firefox 2>&1 > /dev/null

# SH-2070
if [ -n $var ]
then
  echo "var has a value"
else
  echo "var is empty"
fi

# SH-2071
if [[ $var > 10 ]]
then
  echo "Incorrectly triggers when var=5"
fi

# SH-2072
[[ 2 -lt 3.14 ]]

# SH-2073
if [ "aardvark" < "zebra" ]
then
  echo "Alphabetical!"
fi

# SH-2074
[ "$input" =~ DOC[0-9]*\.txt ] && echo "match"

# SH-2076
[[ $foo =~ "^fo+ bar$" ]]

# SH-2077
[[ 0=1 ]]

# SH-2078
if [ "myvar" ]
then
  echo "myvar is set"
fi

# SH-2080
echo $(( 16 - 08 ))

# SH-2081
if [ $var == *[^0-9]* ]
then
  echo "$var is not numeric"
fi

# SH-2084
i=4
$(( i++ ))

# SH-2087
ssh host.example.com << EOF
  echo "Logged in on $HOSTNAME"
EOF

# SH-2088
rm "~/Desktop/$filename"

# SH-2093
echo "Starting compilation"
exec ./compile
echo "Starting deployment"
exec ./deploy

# SH-2095
while read -r host
do
  ssh "$host" "uptime"
done < hosts.txt