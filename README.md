# wrbaa
Welcome to the home of the WRBAA website!

## Installation
### Requirements
* [fatfree-core](https://github.com/bcosca/fatfree-core), the backbone of this website
* [f3-access](https://github.com/xfra35/f3-access), used for creating secure access
* [plume-css](https://github.com/felippe-regazio/plume-css), used to make things look pretty

### Installing
Run this in the terminal in the root directory of choice. It should get all your files set up! Because we are not using a relational database, we don't have to worry about using a webserver so this really should be just plug-n-play. 
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
