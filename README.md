# SmoothProxyWindows

# What?
SmoothProxy for Windows is an adaptation of notorious SmoothProxy Android App. Use the windows version if you have a PC that is up 24/7 and you want to lighten the load on your android or other playback devices. 

# Why?
Kodi is slow, clunky, and leaves much to be desired. Better options exist, however, authentication tokens issued by SmoothStreams are only valid for 4 hours to prevent abuse of service. Traditional playlist generators requires you to manually refresh on expiration. This is not the case for SmoothProxy.

# How?
SmoothProxy generates a specialized playlist that 'points' to itself rather than SmoothStreams. When SmoothProxy receives a playback request, it determines the context of the request and responds with a 301 redirect, along with your valid authentication token, to the appropriate SmoothStreams resource. Windows version is bundled with a small PHP server and integrated browser. 

# Who?
Bored database guy who wanted to learn some PHP and stuff. 

# Instructions:
1. Download zip file, extract, and run installer.
2. Edit line 33 of C:\Program Files (x86)\SmoothProxy\settings.json with your IP address and port.
 ==192.168.x.x for client/server (ex. windows PC for server, android device for client)
 ==127.0.0.1 if your IPTV player is on the same machine
 ==You can run ipconfig to find your IP address
 ==Default port is 80, you can change this if you need to
3. Run SmoothProxy.exe as administator
4. If you get a windows firewall prompt check allow on both boxes and click ok
5. Fill out the form with your details and click submit
 ==Type your username
 ==Type your password
 ==Select your service
 ==Select your server
 ==Enter the same IP you did in step 2
6. Wait for it to run. Depending on a few factors it can take 2-3 minutes. 
7. Leave the window open and set up your IPTV player.
 ==You can minimize the window, but it has to stay open to re-auth every 4 hours. 

To connect SmoothProxy with an IPTV player of your choosing, use the following URLs:
 ==Playlist URL: http://IPOFYOURSERVER/playlist.m3u8
 ==Fog's EPG URL: http://sstv.fog.pt/feed.xml

# Expert Mode:
You can edit C:\Program Files (x86)\SmoothProxy\www\index.php to hardcode your credentials. Check the code for tips!

# Warning:
At this time, SmoothProxy is barebones. It is guaranteed to break on the stupidest of reasons. If want to avoid unnecessary frustrations, refrain yourself from using SmoothProxy. SmoothProxy is not endorsed by SmoothStreams, so do not bother the staff.

# Acknowledgments:
*SmoothStreams for the awesome service.
*You for being an awesome tester.
*Fog for the awesome EPG.
*Notorious for PHP script and readme.
*Crabmore for helping me test before release.
