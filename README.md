#SUTOJ 沈阳工业大学在线评测系统 13.10/14.04/14.10

###STAR原则
> **S** 华中科技大学ACM开源项目**[HUSTOJ](https://code.google.com/p/hustoj/)**无法满足本校特色赛制设计，后台操作复杂。  
> **T** 收集比赛组织者及志愿者团队需求，设计“一键”系列便利功能。  
> **A** 全新设计界面，加强后台管理员功能：作弊代码平铺对比、打印随机密码条、一键配置校赛等，并将其改造为具有本校特色赛制的OJ。  
> **R** 已依靠此系统成功举办三届沈阳工业大学ACM程序设计大赛。  

---

数据库连接在**sutoj/include/db_info.inc.php**第6行。

---
###DEMO 示例

####登录界面
![登录界面](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_01.png?raw=true)

####答题界面
![答题界面](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_02.png?raw=true)

####一键设定比赛
![一键设定比赛](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_03.png?raw=true)

####登录作弊监视
内网开展比赛，如发现外网IP则有作弊嫌疑
![登录作弊监视](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_04.png?raw=true)

####抄袭作弊监视
即使仅修改变量也无法瞒过反作弊系统的眼睛，虽然机器筛查有误判率，但抄袭作弊监视解决了误判的问题。
![抄袭作弊监视](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_05.png?raw=true)

####批量设置密码
重置密码后自动导出Excel表格以打印
![批量设置密码](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_06.png?raw=true)

####参赛队员专业分布情况
![参赛队员专业分布情况](https://github.com/SUTFutureCoder/sutoj/blob/master/example-img/sutoj_07.png?raw=true)