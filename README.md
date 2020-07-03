# wrbaa
Welcome to the home of the WRBAA website!

## Installation
### Requirements
* [php 7.4.7 or higher](https://www.php.net/downloads)
* [apache server](https://httpd.apache.org/download.cgi)
* [fatfree-core](https://github.com/bcosca/fatfree-core), the backbone of this website
* [f3-access](https://github.com/xfra35/f3-access), used for creating secure access
* [plume-css](https://github.com/felippe-regazio/plume-css), used to make things look pretty

### Installing
You must first install PHP and apache server. Once you have those set up, run the following snippet in the terminal in a directory of your choice (ideally where your apache server points to). It should get all your files set up!
```bash
git clone https://github.com/yardasol/wrbaa/;
cd wrbaa; mkdir tmp; mkdir packages
git clone https://github.com/bcosca/fatfree-core
git clone https://github.com/xfra35/f3-access
git clone https://github.com/felippe-regazio/plume-css
cd ../; sudo chmod -R 777 wrbaa; cd wrbaa
mv -r fatfree-core packages/fatfree-core
mv -r f3-access packages/f3-access
mv -r plume-css packages/plume-css
```

Be sure to read the documentation for each of these packages!

## Miscellaneous information
This application was desinged with a ReSTful API, and to truly embrace its place on the web, I have used Resource-Method-Representation (RMR) architecture rather than an MVC architecture (an MVC approach would bloat this project quite a bit!). You can read more about RMR architecture [here](https://www.peej.co.uk/articles/rmr-architecture.html).
