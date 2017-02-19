default:
	gcc -O2 -o identifur xxHash/xxhash.c identifur.c -lbsd
fcgi:
	gcc -O2 -o identifurfcgi xxHash/xxhash.c identifurfcgi.c  -lkcgi
clean:
	rm -f identifurfcgi identifur
all: default fcgi
