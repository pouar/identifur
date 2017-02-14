default:
	gcc -O2 -o identifur xxHash/xxhash.c identifur.c -s
fcgi:
	gcc -O2 -o identifurfcgi xxHash/xxhash.c identifurfcgi.c  -lfcgi -s
clean:
	rm -f identifurfcgi identifur
all: default fcgi
