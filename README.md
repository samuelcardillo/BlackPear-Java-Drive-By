![](http://image.noelshack.com/fichiers/2016/22/1464646845-logo.png)
# BlackPear Java Drive-By Generator
#### Before anything
This is a project with a huge story from ~2011 when I was around 15 years old. During summer 2016 I found it back and decided to upload it and censored the sensitive parts, obviously.  

It was one of the first web [Java Drive-By](https://www.wikiwand.com/en/Drive-by_download) Generator available on subscriptions (as user or reseller) on the regular black market.

**The product and the whole project was shutdown by the police for being illegal.**

#### What does it does ?

BlackPear JDB Generator was able to let you generate (for 25$ per month) a fully undetected, fully customizable and polymorphic [Java Drive-By](https://www.wikiwand.com/en/Drive-by_download) through a online and noob friendly interface. The platform was integrating functionalities such as [web jacking](https://pentestlab.wordpress.com/2012/03/23/web-jacking-attack-method/), statistics panel, reseller options (for an additionnal 15$ per month), ...

Video 1 : https://www.youtube.com/watch?v=ygKdq2hEI3k |
Video 2 : https://www.youtube.com/watch?v=V7ipqhoX7v8

#### Generation process

The generation process is something I am quite happy about, especially because I was 15 at this moment. Below there is a brief explanation of the generation process :
* Check if the user is a reseller.
* Generate multiple strings for obfuscation purposes.
* Create files containing Java code filled with user choices and previously generated strings.
* Create and run a bat file that will generate an ssl certificate, compile the java code into a .jar and auto sign it.
* Create an HTML page based on user choices.
* Create the final ZIP archive containing all the files and based on user choices (again)
* Final file (with random name) is served to user and deleted after download. 

All of these tasks were executed in the background of server running under Windows Server.

## Special thanks
My old and best colleague **bluespeed30** who's identity will remain anonymous.
