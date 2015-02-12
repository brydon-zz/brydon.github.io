#!/usr/bin/python

import os
import urllib
import urllib2
import zipfile
from os.path import sep
from os.path import expanduser

domain = "http://www.beastman.ca/"

def getunzipped(theurl, thedir):
     name = os.path.join(thedir, 'temp.zip')

     try:
          name, hdrs = urllib.urlretrieve(theurl, name)
     except IOError, e:
          print "Can't retrieve %r to %r: %s" % (theurl, thedir, e)
          return

     try:
          z = zipfile.ZipFile(name)
     except zipfile.error, e:
          print "Bad zipfile (from %r): %s" % (theurl, e)
          return
     for n in z.namelist():
          dest = os.path.join(thedir, n)
          destdir = os.path.dirname(dest)

          if not os.path.isdir(destdir):
               os.makedirs(destdir)

          if dest != destdir and dest != destdir + sep:
               data = z.read(n)
               f = open(dest, 'w')
               f.write(data)
               f.close()
     z.close()
     os.unlink(name)

def main():
     arcDir = expanduser("~"+sep+".arc")
     update = False

     if not os.path.isdir(arcDir):
          print "Setting up arc in "+arcDir
          os.mkdir(arcDir)
          update = True
     else:
          found = True
          print "Arc found in "+arcDir
     localVersion = remoteVersion = 0


     #print arcDir + sep + 'version'
     try:
          if os.path.isfile(arcDir + sep + 'version'):
               with open(arcDir + sep + 'version','r') as f:
                    localVersion = f.read()
               print domain+'version'
               response = urllib2.urlopen(domain+'version.html')
               remoteVersion = response.read()
               print "Version " + localVersion + " found on this machine, version "+remoteVersion+" found on the server"
               try:
                    localVersion = float(localVersion)
                    remoteVersion = float(remoteVersion)
                    if localVersion < remoteVersion:
                         update = True
               except:
                    update = True
          else:
               print "Not a file"
               update = True
     
          if update:
               print "Updating arc..."
               getunzipped(domain+"arc.zip",arcDir)
               with open(arcDir+sep+'version','w') as f:
                    f.write(str(remoteVersion))
               print "Success!"
     except:
          print "There was an error talking to our servers on the internetz. Are you online??"
          if not found:
               print "Also, you don't seem to have arc installed yet. this is awkward for all of us. Can't do anything for you! Try connecting to the internet and running this script again."

     os.chdir(os.path.join(arcDir,"assembler"))

     from gi.repository import Gtk
     import sys
     sys.path.append(os.getcwd())
     from simulatorgui import Simulator
     
     A = Simulator()
     print "Constructed"
     Gtk.main()


if __name__ == "__main__":
     main()

