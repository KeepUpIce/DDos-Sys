<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>面向DDoS防护的网络管理系统</title>
    <script src="lib/jquery-3.3.1.js"></script>
    <script src="lib/echarts.js"></script>
    <script src="lib/echarts-gl.js"></script>
    <script src="js/registerMap/world.js"></script>
    <link href="style/css/index.css" rel="stylesheet" type="text/css" />
    <style>
      #ipList {
    max-height: 2000px; /* 限制显示区域的高度 */
    overflow-y: auto; /* 启用垂直滚动 */
    color: white; /* 字体颜色 */
}
</style>
  </head>
  <body>
    <div class="container-fluid" id="bg">
      <header class="header">
        <div class="divTitle">
          <p id="headerTitle">DDoS防护管理系统</p>
        </div>
        <div id="systemTime"></div>
      </header>
      <div class="mainbody">
        <div id="listPopBox" class="lf-list">
          <div class="lfTop" id = 'lfTop1'>
            <div class="lfTbor">
              <p class="lfTitle lastYear" id="bgjdq">系统设计原理</p>
            </div>
            <div class="tabTopT">
              <span class="tabTopL">采用Ryu+OpenDaylight控制器，及OpenFlow（1.0、1.3、1.5）作为框架架构，结合异构网络的优势，通过动态调度和优化网络资源，提升网络在面对大规模DDoS攻击时的防护能力。该系统不仅可以实时监控网络状况，分析攻击流量特征，还能够根据攻击强度和类型对异构网络资源进行智能调度，确保网络服务的稳定性和可用性。
              <br><br>
              系统采用调度-裁决算法，负责动态将流量在不同的控制器之间进行负载均衡，确保没有单一控制器因流量过载而失效。并根据当前的攻击状况，决定是否切换到备用控制器或启用额外的安全措施。
              </span>
            </div>
            <div class="table-responsive" style="overflow-y: hidden;">
              <div class="index-content-left">
                <ul id="attactedTop10"></ul>
              </div>
            </div>
          </div>
          <div class="lfTop" id = 'lfTop2'>
            <br>
            <div class="lfTbor">
              <p class="lfTitle lastYear" id="gjy">组别</p>
            </div>
            <div class="tabTopT">
              <span class="tabTopL">网络内生安全第五小组</span>
              <span class="tabTopTR"></span>
            </div>
            <div class="table-responsive" style="overflow-y: hidden;">
              <div class="index-content-left">
                <ul id='attactSourceTop10'></ul>
              </div>
            </div>
          </div>
          <div class="bottomText">
            <p class="numT"></p>
          </div>
        </div>
        <div class="center">
          <div class="Centertopshow">
            <br>
            <br>
            <p class="RT-title lastYear" id="gjsjhf">流量监测实时动态表：</p>
            <br>
            <br>
            <p class="RT-title lastYear" id="gjsjhf">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;源IP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间</p>
            <div id="ipList" class="RT-title lastYear"></div>
            </p>
            <div id="cnterEchars" class="topshow" style="width: 100%;height: 100%;margin-left: 0%;">
            </div>
          </div>
        </div>
        <div class="right" >
          <div class="rt-Top">
          <div onclick="window.location.href='html/world.php'" id="thumbnail" class="topshow" style="width: 100%; height: 100%; color: white; font-size: 30px;">
          <br>
          <br>
          &#x27A1;查看DDoS攻击—防护态势分析&#x1F6E1;&#xFE0F;
          <br>
          <br>
        </div>

          </div>
          <div class="rt-bottom">
            <div class="rtBT">
              <p class="RT-title lastYear" id="gjsjhf">当前异构体组成：</p>
            </div>
            <div class="dowebok" id= 'attackList'>
              <p class="RT-title lastYear" id="IIICCCEEE">Ryu + openFlow1.3</p>
              <br><br><br>
              <p class="RT-title lastYear" id="gjsjhf">系统可用异构体：</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ryu + OpenFlow1.0</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ryu + OpenFlow1.3</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ryu + OpenFlow1.5</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opendaylight + OpenFlow1.0</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opendaylight + OpenFlow1.3</p><br>
              <p style="color:white;font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opendaylight + OpenFlow1.5</p><br>
              <br>
              <p style="color:white; font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="网络拓扑.html" style="color: #0FFFFF;">点击跳转至网络拓扑图</a></p>

            </div>
              
          </div>
        </div>
      </div>
      <div id = 'listPop' class="listPop" style="display: none;">
        <div class="panel">
          <div class="closeBtn"></div>
          <div class="content" id = 'listPopContent'>
            <div class="lfTop" id = 'lfTop1'>
              <div class="lfTbor">
                <p class="lfTitle lastYear" id="bgjdqP">系统设计原理</p>
              </div>
              <div class="tabTopT">
                <span class="tabTopL">采用Ryu+OpenDaylight控制器，及OpenFlow（1.0、1.3、1.5）作为框架架构，结合异构网络的优势，通过动态调度和优化网络资源，提升网络在面对大规模DDoS攻击时的防护能力。
                  <br>
                </span>
                <span class="tabTopTR"></span>
              </div>
              <div class="table-responsive" style="overflow-y: hidden;">
                <div class="index-content-left">
                  <ul id="attactedTop10P"></ul>
                </div>
              </div>
            </div>
            <div class="lfTop" id = 'lfTop2'>
              <div class="lfTbor">
                <p class="lfTitle lastYear" id="bgjyP">调度-裁决算法</p>
              </div>
              <div class="tabTopT">
                <span class="tabTopL">系统采用调度-裁决算法，负责动态将流量在不同的控制器之间进行负载均衡，确保没有单一控制器因流量过载而失效。并根据当前的攻击状况，决定是否切换到备用控制器或启用额外的安全措施。</span>
                <span class="tabTopTR"></span>
              </div>
              <div class="table-responsive" style="overflow-y: hidden;">
                <div class="index-content-left">
                  <ul id='attactSourceTop10P'></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
  <script>
    function fetchygtData() {
        fetch('ygt.txt')
            .then(response => {
                if (!response.ok) {
                    throw new Error('网络错误: ' + response.status);
                }
                return response.text();
            })
            .then(data => {
                document.getElementById('IIICCCEEE').innerText = data; // 更新内容
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    setInterval(fetchygtData, 1000); // 每秒更新一次
    window.onload = fetchygtData; // 页面加载时立即获取一次数据
</script>

<script>
  function fetchIPData() {
      fetch('1.csv')
          .then(response => {
              if (!response.ok) {
                  throw new Error('网络响应不正确');
              }
              return response.text();
          })
          .then(data => {
              const lines = data.trim().split('\n').slice(-15);
              const ipList = document.getElementById('ipList');
              ipList.innerHTML = '';

              lines.forEach(line => {
                  const columns = line.split(',');
                  const ip = columns[0];//IP
                  const timestamp = columns[3];//时间戳

                  const p = document.createElement('p');
                  p.className = 'RT-title lastYear';

                  p.innerHTML = `<span style="display: inline-block; width: 150px;">${ip}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="display: inline-block; width: 200px;">${timestamp}</span>`;
                  
                  ipList.appendChild(p);
              });
          })
          .catch(error => {
              console.error('获取数据时出错:', error);
          });
  }

  setInterval(fetchIPData, 1000);
  fetchIPData();
</script>


  <script src="js/index.js"></script>
</html>
<?php

?>