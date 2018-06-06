#课程第一章

从本章节开始，我们将使用 Laravel 开发一个类似新浪微博的网站。整个网站功能包括：
用户的注册登录
用户个人信息的更改
使用管理员权限删除用户
发布微博
关注用户
查看关注用户的微博动态
接下来我们将从最简单的静态页面构建开始，踏出使用 Laravel 开发真实应用的第一步。
> cd ~/Homestead && vagrant up
> vagrant ssh  
$ cd ~/Code  
$ composer create-project laravel/laravel sample --prefer-dist "5.5.*"
> subl /etc/hosts  
> 192.168.10.10   sample.test  
> subl ~/Homestead/Homestead.yaml  
````
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/Code
      to: /home/vagrant/Code

sites:
    - map: homestead.test
      to: /home/vagrant/Code/Laravel/public
    - map: sample.test # <--- 这里
      to: /home/vagrant/Code/sample/public # <--- 这里

databases:
    - homestead
    - sample # <--- 这里

variables:
    - key: APP_ENV
      value: local

# blackfire:
#     - id: foo
#       token: bar
#       client-id: foo
#       client-token: bar

# ports:
#     - send: 93000
#       to: 9300
#     - send: 7777
#       to: 777
#       protocol: udp  
````
> cd ~/Homestead && vagrant provision && vagrant reload  
#####.env
```
.
.
.
DB_DATABASE=sample
.
.
.
APP_ENV=local
APP_DEBUG=true
APP_KEY=your_app_key

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=sample
DB_USERNAME=homestead
DB_PASSWORD=secret

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
#####Git 代码版本控制
````
$ cd ~/Code/sample
$ git init
$ git add -A
$ git commit -m "Initial commit"
$ git remote add origin git@github.com:<username>/sample.git
$ git push -u origin master
````