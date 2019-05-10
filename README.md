# library

## 简介
	无框架，简易本地图书管理系统。
	PHP，MySQL，JavaScript，CSS，HTML
	管理页面由 [Ela Admin](https://github.com/puikinsh/ElaAdmin) 模板改造。
	可实现身份登录，用户查书借书还书，管理员增删改书目书本用户。
## 展示
### 首页	
![index](https://github.com/Arrackisarookie/library/blob/master/images/index.PNG)
### 查询页
![list](https://github.com/Arrackisarookie/library/blob/master/images/list.PNG)
### 信息页
![detail](https://github.com/Arrackisarookie/library/blob/master/images/detail.PNG)
### 管理页
![admin](https://github.com/Arrackisarookie/library/blob/master/images/admin.PNG)
### 更新页
![update](https://github.com/Arrackisarookie/library/blob/master/images/update.PNG)

## 配置

### 准备
- 下载安装 WAMP
- [下载本项目][1], 将压缩包解压至 **WAMP** 的 **www** 文件夹下
[1]:(git@github.com:Arrackisarookie/library.git)

### 建库

- 打开 WAMP
**注意：确保数据库中没有名为 library 的账户，若有名为 library 的数据库，确保其中数据已备份**
- 以 root 身份登录 phpadmin，导入 sql 文件夹中的 userCreated.sql
- 退出 root 身份
- 更换为以下身份登录 phpadmin
   - 用户名: library
   - 密码: lib
- 依次导入 tb_bibliography.sql, tb_book, tb_user, tb_role, tb_reserve, trigger.sql
- 查看 library 数据库信息导入情况

### 浏览

- 浏览器地址栏输入 localhost/library 进入主页

### 网站用户身份
**注意：与上述数据库身份无关**

- 管理员：
   - 用户名： 000000000
   - 密码  ： 000000

- 普通用户：
   - 密码为学号后六位，如：
   - 用户名： 160101310
   - 密码  ： 101310
- *ps: 用户名是学号，而非用户姓名*

### 登录

- 管理员登录自动跳转到后台管理页

- 普通用户登录会刷新本页


### 最后

- 其他功能自行探索

- 有任何 bug，反人类设计，需求，

- 请联系 mail： nicearrack@163.com
