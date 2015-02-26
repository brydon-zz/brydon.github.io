---
title:  "Arc Installation Instructions"
date:   2015-02-26 14:16:00
categories: arc
---

#Installation

Arc is multiplatform. Please follow the instructions for your specific platform as outlined below.

##Linux

1. Make sure python 2.7 is instaled (`sudo apt-get install python 2.7`)
2. Download the bash script [here](/arc)
3. Mark the file as executable
4. Run the file (`./arc`)
5. Optionally, move arc to /usr/sbin, then at any terminal prompt you need only type `arc` regardless of directory

Or, alternatively, run this code in terminal:

(From a machine where you don't have sudo privileges, i.e. CS lab)

```
wget http://beastman.ca/arc\n
chmod +x arc\n
./arc
```
For the above, anytime you need to re-run arc type in `./arc` from the terminal!

(From a machine where you have sudo privileges)

```
wget http://beastman.ca/arc\n
chmod +x arc\n
sudo mv arc /usr/sbin/arc\n
arc
```
For the above, anytime you need to re-run arc type `arc` from the terminal!

In both cases, arc will auto-update as necessary.

##Windows

Two options.

###From Source

1. Ensure you have [python 2.7 installed](https://www.python.org/download/releases/2.7/)
2. Install GTK+3 python bindings. This is the windowing toolkit arc (and many other unix-based python programs) use. To do this simply run the all in one installer found [here](http://sourceforge.net/projects/pygobjectwin32/files/pygi-aio-3.14.0_rev10-setup.exe/download).e
3. Then download the arc source files [here](/arc.zip)
4. Extract the source files to some folder on your computer
5. Then run arc by executing the `__init__.py` file with python in the `assembler/` directory
6. Then to update arc, simply repeat steps 3-5 as needed.

##By running the simple binary

1. This will require me packaging the binary, COMING SOON.

##Mac!

Come talk to me, I don't have a mac to trouble shoot on. Everything in arc is multi-platform, but I don't if python 2.7 on Mac comes with GTK+3!

Try following the Linux instructions, and let me know how it works!

Alternatively, lend me your Mac for half an hour and we can compile the binary together! Think of how much fun bonding we would have.
Tertiarily (is that a word?), compile the binary FOR me, and you will be my favourite person on the planet, and receive 50% of all arcs profits **(note: arc has no profits)**.
