# Install php and apache server
X=4
sudo apt install php7.$X php7.$X-common php7.$X-mysql php7.$X-cgi php7.$X-cli php7.$X-fpm php7.$X-mbstring php7.$X-curl php7.$X-xmlrpc php7.$X-gd php7.$X-zip php7.$X-pdo-sqlite php7.$X-xml
sudo apt install apache2

# Install fatfree, plume-css,f3-access
git submodules init -r

