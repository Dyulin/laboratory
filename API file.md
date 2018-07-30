# 1.Lab-Admin-API 2.0
# 2018/7/28
<!-- TOC -->

- [0. tips](#0-tips)
- [1. 用户](#1-用户)
  - [1.1 注册](#11-注册)
  - [1.2 登录](#12-登录)
  - [1.3 修改信息](#13-修改自身信息)
  - [1.4 修改密码](#14-修改密码)
- [2. 实验室展示模块](#2-实验室展示模块)
  - [2.1. 人员介绍](#21-人员介绍)
  - [2.2. 项目列表](#22-项目列表)
  - [2.3. 项目展示](#23-项目展示)
- [3. 后台模块](#3-后台模块)
  - [3.1. 用户管理](#31-用户管理) 
   	- [3.1.1. 删除用户](#311-删除用户) 
   	- [3.1.2. 添加管理员](#312-添加管理员) 
  - [3.2. 实验室展示信息管理](#32-实验室展示信息管理) 
 	 - [3.2.1. 添加项目](#321-添加项目)  
 	 - [3.2.2. 修改项目信息](#322-修改项目信息) 
 	 - [3.2.3. 删除项目](#323-删除项目) 
  - [3.3. 文件管理（待定）](#33-文件管理) 
  - [3.4. 操作记录查询（待定）](#34-操作记录查询)  

<!-- /TOC -->

# 0. tips

- code: 
 - 0 : 一切正常  
 - 1 ：直接将message展示给用户  
 - 2 ：验证用户无效，跳转至登录页
 
---
# 1. 用户  

## 1.1. 注册

- POST /User/register
- payload :  
```json
{  
    "account": "账号",
    "password": "密码"  
}
```
- return :  

```json
{  
    "code": 0,  
    "message": "",  
    "data": null  
}
```

---
## 1.2. 登录
- POST /User/login  
- payload :  
```json
{  
    "account": "账号",
    "password": "密码"  
}
```
- return :  

```json
{  
    "code": 0,  
    "message": "",  
    "data": null  
}
```

---

## 1.3. 修改自身信息 
- POST /User/changeInfo  
- payload:  
```json
{	  
	"job_id" : "职位号",
	"name":"姓名",
	"telphone":"手机号", 
	 "email":"邮件"  
}
```

- return： 
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```

---

## 1.4. 修改密码
- POST /User/changepass 
- payload:  
```json
{	  
	 "oldpass": "旧密码",
	"newpass" :"新密码"
} 
```
- return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```

---

# 2. 实验室展示模块  

## 2.1. 人员介绍
- POST /User/showperson
- return :  
```json
{  
    	"code": 0,  
    	"message": "",  
    	"data":  
{  
	 "name" :"姓名",
	 "photo" :"电话",
	 "job_name" :"工作",
	 "email" :"邮箱",
}
```
---

## 2.2. 项目列表 

- POST /Pro/showlist
- return :  
```json
{  
    	"code": 0,  
    	"message": "",  
    	"data":  
{  
	 "pno" :"项目号",
	"photo" :"项目图片路径"
}
```
---
## 2.3. 项目展示
- POST /Pro/proshow
- payload:  
```json
{	  
	"pno" : "项目号",
} 
```
- return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data":
	{
	"name": "项目名",
	"photo":"项目图片路径",
	"content" : "项目内容",
	"member":
	[
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	 ...
	]
	}
}
```
---

# 3. 后台模块

## 3.1. 用户管理

### 3.1.1 删除用户
- POST /Back/delete
- payload:  
```json
{	  
	"account" : "帐号",
} 
```
 - return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```
---
### 3.1.2 添加管理员
- POST /Back/ins_admin
- payload:  
```json
{	  
	"account" : "帐号",
} 
```
 - return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```
---
## 3.2 实验室展示信息管理
### 3.2.1 添加项目 
- POST /Back/addpro
- payload:  
```json
{   
    "pno" : "项目号",
	"name": "项目名",
	"photo":"项目图片路径",
	"content" : "项目内容",
	"member":
	[
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	 ...
	]

```
- return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```
---
### 3.2.2 修改项目信息
- POST /Back/changepro
- payload:  
```json
{	  
	"pno" : "项目号",
	"name": "项目名",
	"photo":"项目图片路径",
	"content" : "项目内容",
	"member":
	[
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	{ "name":"姓名","u_id":学号,"duty":"职责"}
	 ...
	]
} 
```
- return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null
}
```
### 3.2.3 删除项目
- POST /Back/delpro
- payload:  
```json
{	  
	"pno" : "项目号",
} 
```
- return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null
}
```
---
## 3.3 文件管理
## 3.4 操作记录查询
