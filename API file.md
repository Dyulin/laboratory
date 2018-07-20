
Lab-Admin-API
=====  
code: 
0:验证用户无效  
1：直接将message展示给用户  
2：验证用户无效，跳转至登录页  

1.用户  
---  
1.1 注册
---
POST/Labinfo/register  
payload:  
{	  
	"tyoe_no":  "权限号"  
	"work_id" : "账号"，  
	"job_id" : "职位号"，  
	"password"	: "密码",  
   "telphone" : "手机号"，  
	 "email"   : 邮件，  
	 "password" : 密码  
	}  
return：  
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}  
1.2 登录  
---  
POST /Labinfo/login  
payload :  
{  
    "work_id": "账号",  
    "password": "密码"  
}  
return :  
{  
    "code": 0,  
    "message": "",  
    "data": null  
}  
1.3修改自身信息 
---
POST/Labinfo/changeinfo  
payload:  
{	  
	"work_id" : "账号"，  
	"job_id" : "职位号"，  
	"password"	: "密码",  
   "telphone" : "手机号"，  
	 "email"   : 邮件，  
	 "password" : 密码  
	}  
return：  
{  
	"code" : 0,  
	"message": "",  
	"data": null  
}  
2 实验室展示模块  
--
2.1 人员介绍 （待定）  
--
2.2项目展示   
--
POST /proinfo/proshow  
payload :  
{  
    "project_no": "项目号"  
}  
return :  
{  
    "code": 0,  
    "message": "",  
    "data":  
		{  
		  "project_name" : "项目名称" ,  
	    "project_content" : "项目内容" ,  
		  "work_id"    :  "项目成员号"  	
			"name"  : "项目成员名"  
		}    
}  
