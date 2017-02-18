default:
	gcc -O2 -o identifur xxHash/xxhash.c identifur.c -lbsd
fcgi:
	gcc -O2 -o identifurfcgi qs_parse/qs_parse.c xxHash/xxhash.c identifurfcgi.c  -lfcgi -lbsd -s
clean:
	rm -f identifurfcgi identifur
all: default fcgi
