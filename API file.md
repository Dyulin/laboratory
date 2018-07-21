
# 1.Lab-Admin-API
# 2018/7/21
<!-- TOC -->

- [0. tips](#0-tips)
- [1. 用户](#1-用户)
  - [1.1注册(#11-注册)
  - [1.2 登录](#12登录)
  - [1.3 修改信息](#13修改信息)
  - [1.4 修改密码](#14修改密码)
- [2. 项目](#2-项目)
  - [2.1. 人员介绍](#21-人员介绍)
  - [2.2. 项目列表](#22-项目列表）)
  - [2.3. 项目展示](#23-项目展示)

<!-- /TOC -->
# 0.tips
code: 
0:验证用户无效  
1：直接将message展示给用户  
2：验证用户无效，跳转至登录页  

# 1.用户  

## 1.1 注册

-POST/User/register  
-payload: 

```json
{ 
"account":账号",
"password" :"密码"
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
## 1.2 登录
-POST /User/login  
-payload :  
```json
{  
    "account": "账号",
    "password": "密码"  
}
```
-return :  

```json
{  
    "code": 0,  
    "message": "",  
    "data": null  
}
```

---

## 1.3 修改自身信息 
-POST/User/changeinfo  
-payload:  
```json
{	  
	"job_id" : "职位号",
	"account":账号",
	"name":姓名",
	"telphone":手机号", 
	 "email":邮件"  
}
```

-return： 
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```

---

## 1.4 修改密码
-POST/User/changepass 
-payload:  
```json
{	  
	 "oldpass": "旧密码",
	"account" :"账号",
	"newpass" :"新密码"
} 
```
-return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}
```

---

# 2 实验室展示模块  

## 2.1 人员介绍 （待定）  

---

2.2项目列表   
--
-POST /proinfo/showlist
-return :  
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

## 2.3项目展示
-POST/User/proshow
-payload:  
```json
{	  
	"pno" : "项目号",
}  ```
-return：  
```json
{  
	"code" : 0,  
	"message": "",  
	"data":
	{
	"name": "项目名",
	"photo":"项目图片路径",
	"content" : "项目内容",
	"id" : "项目成员号",
	"member" :"成员名",
	"duty" :"成员职责",
	}
	
}```

