# 面向DDoS防护的异构体调度网络管理系统

## How to Run

1、搭建本地 Web 服务器或云服务器，使用 Apache（推荐2.4.39及以上）或 nginx（推荐Nginx1.15.11及以上） 均可。

2、数据库采用 Mysql（推荐5.7.26及以上），数据库名：security-ice，管理员用户名：admin-ice，密码：ice-2024-11-3。若自行设定，需在 login.php 文件中修改数据库配置。

3、开启 MySQL 服务，创建数据库：

```SQL
-- 数据库：security-ice
CREATE DATABASE `security-ice`;
```

4、创建 users 表，用于登录验证：

```sql
-- 基于安全性，该系统不开放注册接口，如需添加用户，联系数据库管理员即可。
USE `security-ice`;
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- 基于安全性，该系统不开发注册接口，如需添加用户，联系数据库管理员即可。
INSERT INTO users (username, password)
VALUES ('ice', 'P@ssw0rd!2024Ice');
```

或导入 security-ice.sql 文件：

```sql
mysql -u username -p security-ice < security-ice.sql
```

5、将 Security 项目文件夹至于服务器根目录下，开启服务器，访问 https://your-ip/security/login.php 即可登录。登录用户名：ice，登录密码：P@ssw0rd!2024Ice。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193613817-1829127448.png)


5、系统实现权限隔离，未登录用户不可访问DDos防护管理系统。

## 前端介绍

1、index.php 界面布局：界面主要分为左侧边栏、流量检测实时动态表和右侧边栏。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193618933-1695367575.png)


2、左侧边栏用于描述系统设计原理及所采用的调度裁决算法，点击后可展开隐藏界面。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193622052-461800296.png)


3、流量检测实时动态表：通过 Ajax 异步调用，每秒读取源 IP 及时间，并对格式进行分割后输出至主界面。（文末查看例图）

主要代码如下：

```js
function fetchIPData(){
      fetch('ip.txt')
          .then(response=>{
              return response.text();
          })
          .then(data=>{
              const lines=data.trim().split('\n').slice(-15); //获取最后15行
              const ipList=document.getElementById('ipList');
              ipList.innerHTML='';
              lines.forEach(line=>{
                  const [ip, timestamp] = line.split(' '); //格式化
              });
          });
  }
  setInterval(fetchIPData, 1000);
  fetchIPData();
```

如图：

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193630545-1777435904.png)


4、右侧边栏用于实现 **DDoS 攻击—防护态势分析** 界面的跳转，并对当前异构体进行描述。通过 Ajax 异步调用，每秒读取当前异构体组成，并输出至主界面。（文末查看例图）

主要代码如下：

```js
function fetchygtData(){
    fetch('ygt.txt')
        .then(response=>{
            return response.text();
        })
        .then(data=>{
            document.getElementById('IIICCCEEE').innerText = data;//更新内容
        });
}
setInterval(fetchygtData, 1000);
```

如图：

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193638063-221065411.png)


5、/html/world.php 界面，用于展示来自世界各地的 DDoS 流量分布，包括攻击源地区、被攻击台数及被攻击次数，并对系统所受 DDoS 态势进行分析。主栏以表格形式展示特殊攻击源、IP 对应地区、攻击时间及攻击次数。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193648951-1856169758.png)


## 后端开发逻辑

（1）后端实时输出流量信息至 `/security/ip.txt` 中，形式为`ip date`，前端通过 Ajax 读取流量信息并展示在 `security/index.html`中。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193653856-628766911.png)


（2）当后端转用异构体时，输出异构体形式至 `/security/ygt.txt` 中，形式为`控制器+OpenFlow版本`，前端通过 Ajax 读取信息并展示在 `security/index.html`中。

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193657851-880952321.png)


## 例图

![](https://img2024.cnblogs.com/blog/3167248/202411/3167248-20241103193703384-92588100.png)

## 2024.11.20新增网络拓扑图

源代码已上传，开启服务器后访问根目录下的`网络拓扑.html`即可。

概览如图：

![image](https://github.com/user-attachments/assets/ff9ad7e8-3312-4950-a3bf-406441da53f0)


使用方法：右键节点，可新增、删除连线，可新增、删除节点，可放大、缩小、改色等。例图如下：

![image](https://github.com/user-attachments/assets/8f78311c-187b-4dab-b7fd-c36ee00e2efa)








