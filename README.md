# mymvc
mymvc is developing
### 框架编码遵循psr-2
### 框架自动加载遵循psr-4自动加载原则
自己写了autoload，后来研究了下引入composer自动加载的配置，框架后续使用composer的自动加载（推荐这种方式，方便集成第三方插件）
### 框架实现了基本的mvc模式
框架设计采用php常用设计模式，工厂，单态，装饰器等等
### 框架的model层可以通过yaml配置，实现切换数据查询的dirve，无需修业务层代码
针对model查询，写了统一的接口类，写了对于该接口pdo，mysqli，aws（db是nosql）的实现
### 框架的log
实现了简单的file记录log，分小时记录log，减少读写log的io消耗，并可以扩展其他方式，数据库存储等等
### 框架集成的第三方类包
通过composer集成了炫酷的错误异常组件whoops，symfony_dumper的打印组件，轻量级orm组件medoo，模板引擎twig
### 框架配置组件yaml
框架的所有配置文件都以yaml文件，yaml相对于传统的php数组存储配置或者ini文件存储，更具有易读性，并且可以互相引用。
### install
部署后给log目录赋予777权限

### nginx conf
server {
        listen       80;
        server_name  www.mymvc.com mymvc.com;
        root   "J:/phpStudy/WWW/mymvc";
        location / {
            index  index.html index.htm index.php;
			try_files $uri $uri/ /index.php?$args;
            #autoindex  on;
        }
        location ~ \.php(.*)$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;		
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }
}
