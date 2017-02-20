CFLAGS:=-O2
default:
	gcc $(CFLAGS) -o identifur xxHash/xxhash.c identifur.c -lbsd
fcgi: build-kcgi
	gcc $(CFLAGS) -I./kcgi -o identifurfcgi xxHash/xxhash.c identifurfcgi.c  kcgi/libkcgi.a -s
clean:
	rm -f identifurfcgi identifur
build-kcgi:
	cd kcgi;./configure;make -j$(shell nproc)
all: default fcgi
