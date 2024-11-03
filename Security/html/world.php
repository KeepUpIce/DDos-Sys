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
	<script src="../lib/jquery-3.3.1.js"></script>
	<script src="../lib/echarts.js"></script>
	<script src="../js/registerMap/world.js"></script>
	<link href="../style/css/world.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bg">
    <header class="header">
        <div class="divTitle" >
            <p style="margin: 6px">DDos攻击-防护态势分析</p>
        </div>
        <div id="systemTime"></div>
    </header>
    <div class="fh1">
        <span style="margin-left: 5px" id= "jumpBackBtn">
            <label onclick="jumpBack()" style="cursor: pointer">返回首页</label>
        </span>
        <div style="display: initial" id="mbx"></div>
    </div> 
    <div class="mainbody">
        <div class="typeBox">
           <div class="lfbox">
                <img src="../style/images/attack/attackhm.png">
                <div class="lfbg">
                    <div class="text">严重DDos:11</div>
                </div>
           </div>
           <div class="lfbox">
                <img src="../style/images/attack/attackey.png">
                <div class="lfbg">
                    <div class="text">高危DDos:65</div>					
                </div>
           </div>
           <div class="lfbox">
                <img src="../style/images/attack/attackld.png">
                <div class="lfbg">
                    <div class="text">中危DDos:93</div>					
                </div>
           </div>
           <div class="lfbox">
                <img src="../style/images/attack/attackmm.png">
                <div class="lfbg">
                    <div class="text">低危DDos:77</div>					
                </div>
           </div>
        </div>
		<div class="leftBox">
            <div class="right" id="attackBox">
                <div class="rt-T lastYear" id="III"><br>DDos态势分析</div>
                <div class="rt-Bot" >
                    <div class="title">
                        <div class="each"></div>
                    </div>
                    <div class="tabBody">
                        <div class="content">
                            <h2>目前，针对本系统的DDos攻击态势愈发猛烈，相比于2022年，2023年被攻击次数为其两倍。且统计源范围愈发广阔，包括但不限于美国IP、日本IP、韩国IP等。</h2>
                            <br>
                            <h2>面向DDos防护的网络管理系统上线后，恶意流量的检测以达到优化，能够实时分析流量，判断短时间内的大流量是否出自同一IP等，同时能够自动调用异构体实现安全防护。能够抵挡绝大部分DDos攻击。</h2>
                            <br>
                            <h2>从DDos防护平台上线至今日，严重DDos、高危DDos、中危DDos、低危DDos攻击次数总和共200多次，均得到安全防护并拉黑高风险IP。
                            <div class="cTBody" id='secLeft'></div>
                        </div>
                    </div>
                    <p class="T-SMtitle lastYear">网络内生安全第五小组</p>
                </div>
            </div>
        </div>
		<div class="center">
            <div style="width: 100%;height: 662px;">
                <div class="listT">
					<ul>
						<li class="Asource">特殊攻击源</li>
						<li class="Aarea" >IP对应地区</li>
						<li class="Atime">攻击时间</li>
                        <li class="Acount">攻击次数</li>
					</ul>
				</div>
				<div class="prize-databox" id="prize-databox">
					<ul id = 'prizeUl'></ul>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 960px;color: white;">172.16.0.10</span>
                        <span class="Aarea" style="display: inline-block; width: 920px;color: white;">中国 - 北京</span>
                        <span class="Atime" style="display: inline-block; width: 880px;color: white;">2024-9-13 10:00</span>
                        <span class="Atime" style="display: inline-block; width: 1050px;color: white;">1982</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 960px;color: white;">10.0.0.25</span>
                        <span class="Aarea" style="display: inline-block; width: 920px;color: white;">美国 - 纽约</span>
                        <span class="Atime" style="display: inline-block; width: 880px;color: white;">2024-11-21 11:30</span>
                        <span class="Atime" style="display: inline-block; width: 1050px;color: white;">2282</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 960px;color: white;">198.51.100.20</span>
                        <span class="Aarea" style="display: inline-block; width:920px;color: white;">德国 - 法兰克福</span>
                        <span class="Atime" style="display: inline-block; width: 880px;color: white;">2024-11-01 12:45</span>
                        <span class="Atime" style="display: inline-block; width: 1050px;color: white;">3112</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 960px;color: white;">118.21.170.32</span>
                        <span class="Aarea" style="display: inline-block; width: 920px;color: white;">英国 - 伦敦</span>
                        <span class="Atime" style="display: inline-block; width: 880px;color: white;">2024-11-01 14:15</span>
                        <span class="Atime" style="display: inline-block; width: 1050px;color: white;">492</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 960px;color: white;">213.0.13.44</span>
                        <span class="Aarea" style="display: inline-block; width: 920px;color: white;">日本 - 东京</span>
                        <span class="Atime" style="display: inline-block; width: 880px;color: white;">2024-11-01 15:50</span>
                        <span class="Atime" style="display: inline-block; width: 1050px;color: white;">2482</span>
                    </li>
				</div>
            </div>
			<div class="centerBottom">
				<!-- <div class="listT">
					<ul>
						<li class="Asource">特殊攻击源</li>
						<li class="Aarea" >IP对应地区</li>
						<li class="Atime">攻击时间</li>
					</ul>
				</div>
				<div class="prize-databox" id="prize-databox">
					<ul id = 'prizeUl'></ul>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 760px;color: white;">192.168.1.10</span>
                        <span class="Aarea" style="display: inline-block; width: 720px;color: white;">中国 - 北京</span>
                        <span class="Atime" style="display: inline-block; width: 850px;color: white;">2024-11-01 10:00</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 760px;color: white;">203.0.113.5</span>
                        <span class="Aarea" style="display: inline-block; width: 700px;color: white;">美国 - 纽约</span>
                        <span class="Atime" style="display: inline-block; width: 850px;color: white;">2024-11-01 11:30</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 760px;color: white;">198.51.100.20</span>
                        <span class="Aarea" style="display: inline-block; width: 700px;color: white;">德国 - 法兰克福</span>
                        <span class="Atime" style="display: inline-block; width: 850px;color: white;">2024-11-01 12:45</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 760px;color: white;">198.51.100.30</span>
                        <span class="Aarea" style="display: inline-block; width: 700px;color: white;">英国 - 伦敦</span>
                        <span class="Atime" style="display: inline-block; width: 850px;color: white;">2024-11-01 14:15</span>
                    </li>
                    <li>
                        <span class="Asource" style="display: inline-block; width: 760px;color: white;">203.0.113.10</span>
                        <span class="Aarea" style="display: inline-block; width: 700px;color: white;">日本 - 东京</span>
                        <span class="Atime" style="display: inline-block; width: 850px;color: white;">2024-11-01 15:50</span>
                    </li>
				</div>	 -->
			</div>
        </div>
        <div class="rightBox" id="RAttack">
            <div class="rBTitle lastYear" id="bmjgsj"></div>
            <div class="top item">
                <div class="title" id="wlqmgjT">被攻击台数</div>
                <div class="chart"  id='qmgj'></div>
            </div>
            <div class="middle item">
                <div class="title" id="gjzdhyT">攻击源地区</div>
                <div class="chart"  id='gjzdhy'></div>  
            </div>
            <div class="bottom item">
                <div class="title titleLarge" id="gjbgjT">被攻击次数</div>
                <div class="chart"  id='dxgj'></div>
            </div>
        </div>
        <div id = 'controllTop10' style="display:none;">
            <div class="panel">
                <div class="closeBtn"></div>
                <div class="content">
                    <div class="right" id="leftBox">
                        <div class="rt-T lastYear" id="zjslP"></div>
                        <div class="rt-Bot" >
                            <div class="boxContent">
                                <div class="boxTitle">
                                    <div class="cTBody">DDos态势分析</div>
                                </div>
                                <div class="boxBody" style="overflow-y: hidden;" >
                                    <div class="content">
                                        <div class="cTBodyNew" id='secLeftP'></div>
                                        <h2>目前，针对本系统的DDos攻击态势愈发猛烈，相比于2022年，2023年被攻击次数为其两倍。且统计源范围愈发广阔，包括但不限于美国IP、日本IP、韩国IP等。</h2>
                                        <br>
                                        <h2>面向DDos防护的网络管理系统上线后，恶意流量的检测以达到优化，能够实时分析流量，判断短时间内的大流量是否出自同一IP等，同时能够自动调用异构体实现安全防护。能够抵挡绝大部分DDos攻击。</h2>
                                        <br>
                                        <h2>从DDos防护平台上线至今日，严重DDos、高危DDos、中危DDos、低危DDos攻击次数总和共200多次，均被安全防护并拉黑高风险IP。
                                    </div>
                                </div>
                                <p class="T-SMtitle lastYear">网络内生安全第五小组</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id = 'JGChart' style="display: none;">
            <div class="panel">
                <div class="closeBtn"></div>
                <div class="content">
                    <header class="lastYear" id="bmjgsjP"></header>
                    <div class="NewrightBox" id="RAttack">
                        <div class="rtop item">
                            <div class="Newtitle" id="wlqmP">被攻击台数</div>
                            <div class="Newchart"  id='Rightqmgj' ></div>
                        </div>
                        <div class="rmiddle item">
                            <div class="Newtitle" id="gjzdhyP">攻击源地区</div>
                            <div class="Newchart"  id='Rightgjzdhy' ></div>  
                        </div>
                        <div class="rottom item">
                            <div class="Newtitle titleLarge" id="gjbgjP">被攻击次数</div>
                            <div class="Newchart"  id='Rightdxgj' ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function jumpBack() {
        window.location.href = '../index.php';
    }
    function scrollNews (obj) {
        var $self = obj.find("ul:first");
        var lineHeight = $self.find("li:first").height();
        $self.animate({ "margin-top": -lineHeight + "px" }, 1500, "linear", function () {
            $self.css({ "margin-top": "0px" }).find("li:first").appendTo($self);
        })
    }
    $(function () {
        var $this = $("#prize-databox"), scrollTimer;
        $this.hover(function () {
            clearInterval(scrollTimer);
        }, function () {
            scrollTimer = setInterval(function () {
                scrollNews($this);  
            }, 1500);     
        }).trigger("mouseout");
        setInterval(function() {
            showTime();
        }, 1000); 
        getTitle();
        getChartData();
        drawChart();
        const lastYear = new Date().getFullYear() - 1;
        const htm = $('.lastYear');
        for(let i=0;i<htm.length;i++) {
            const itemText = htm[i]['innerHTML'].replace('%lastYear%',lastYear);
            htm[i]['innerHTML'] = itemText;
        }
        getJsonData();
    });
    function getTitle() {
        $.ajax({
            url: "../data/titleConfig.json",
            type:"get",
            dataType:"json",
            success:function(data){
                const config = data.world;
                const lastYear = new Date().getFullYear() - 1;

                $('#headerTitle')[0].innerHTML = config.headerTitle;
                
                $('#jnzj')[0].innerHTML = config.leftTop.replace('%lastYear%',lastYear);
                $('#bmjgsj')[0].innerHTML = config.rightTop.replace('%lastYear%',lastYear);

                $('#wlqmgjT')[0].innerHTML = config.rightSubTop;
                $('#gjzdhyT')[0].innerHTML = config.rightSubMed;
                $('#gjbgjT')[0].innerHTML = config.rightSubBot;

                $('#zjslP')[0].innerHTML = config.leftP.replace('%lastYear%',lastYear);

                $('#bmjgsjP')[0].innerHTML = config.rightP.replace('%lastYear%',lastYear);
                
                $('#wlqmP')[0].innerHTML = config.rightLP;
                $('#gjzdhyP')[0].innerHTML = config.rightMP;
                $('#gjbgjP')[0].innerHTML = config.rightRP;
            }
        });
    }
    function getJsonData() {
        $.ajax({
            url: "../data/jsonData.json",
            type: "get",
            dataType: "json",
            success: function (data) {
                const imgUrl = {
                    '中国': 'China',
                    '德国': 'Germany',
                    '俄罗斯': 'Russia',
                    '加拿大': 'Canada',
                    '日本': 'Japan',
                    '澳大利亚': 'Australia',
                    '伊朗': 'Iran',
                    '以色列': 'Israel',
                    '英国': 'England',
                    '乌克兰': 'Ukraine',
                    '美国': 'America',
                };
                const secLeft = document.getElementById('secLeft');
                const secLeftP = document.getElementById('secLeftP');

                loadSecLeft(data.secLeft, secLeft, imgUrl);
                loadSecLeft(data.secLeft, secLeftP, imgUrl);               
            }
        });     
    }
    // function loadSecLeft(data, element, imgUrl) {
    //     let attactedHTML = '';
        
    //     for(let i=0;i<data.length;i++) {
    //     const {name, value} = data[i];
    //     attactedHTML += `
    //         <div class="row">
    //             <div class="left">
    //                 <div class="imgBox" title=${name}>
    //                     <img src="../style/images/country/${imgUrl[name]}.png">
    //                     <div class="countryName">${name}</div>
    //                 </div>        
    //             </div>
    //             <div class="right">${value}</div>
    //         </div>
    //     `;
    //     }
    //     element.innerHTML = attactedHTML;
    // }
    function drawChart() {
        drawQqmgj();
        drawGjzdhy();
        drawDxgj();
    }
    function RightdrawChart() {
        RightdrawQqmgjqmgjNew();
        RightdrawGjzdhy();
        RightdrawDxgj();
    }
    function drawQqmgj() {
        let qmgjChart = echarts.init(document.getElementById('qmgj'));
        const lastYear = new Date().getFullYear() - 1;
        let option = {
            color: ['#4691fb'],
            grid: {
                top: '17%',
                left: '5%',
                right: '5%',
                bottom: '7%',
                containLabel: true,
            },
            xAxis: [{
                type: 'category',
                data: [lastYear-1, lastYear],
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: "#ffffff22",
                        width: 2,
                        type: "solid"
                    }
                },
                axisTick: {
                    show: false
                },
                axisLabel: {
                        show: true,
                        interval:0,
                        fontSize: '13',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                }],   
            yAxis: [{
                type: 'value',
                name: '单位:台',
                nameTextStyle: {
                    color: '#ffffff'
                },
                axisLabel: {
                    formatter: '{value} ',
                    fontSize: '13',
                    textStyle: {
                        color: "#fff",
                    }
                },
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: "#ffffff22",
                        width: 2,
                        type: "solid"
                    },
                },
                axisTick: {
                    show: false
                },
                splitLine: {
                    lineStyle: {
                        type: 'solid',
                        color: '#032947'
                    }
                },
            }],        
            series: [{
                type: 'bar',
                data: [ 3.4, 4.9],
                barWidth: 16,
                barGap: 0, 
                label: {
                    normal: {
                        show: true,
                        position: "top",
                        formatter: "{c}",
                        color: '#6af3ff'
                    }
                },
                itemStyle: {
                    normal: {
                        color: new echarts.graphic.LinearGradient(0,1,0,0,[{
                            offset: 0,
                            color: '#009dff00'
                        },{
                            offset: 1,
                            color: '#009dff'
                        }])
                    }
                }
            }]
        };
        qmgjChart.setOption(option);
    }
    function drawQqmgjqmgjNew() {
        let qmgjChart = echarts.init(document.getElementById('qmgj'));
        const lastYear = new Date().getFullYear() - 1;
        let option = {
                color: ['#4691fb'],
                grid: {
                    top: '17%',
                    left: '5%',
                    right: '5%',
                    bottom: '7%',
                    containLabel: true,
                },
                xAxis: [{
                    type: 'category',
                    data: [lastYear-1, lastYear],
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        }
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        show: true,
                        interval:0,
                        fontSize: '13',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                }],
                yAxis: [{
                    type: 'value',
                    name: '单位:台',
                    nameTextStyle: {
                        color: '#ffffff'
                    },
                    axisLabel: {
                        formatter: '{value} ',
                        fontSize: '13',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    splitLine: {
                        lineStyle: {
                            type: 'solid',
                            color: '#032947'
                        }
                    },
                }],
                series: [{
                    type: 'bar',
                    data: [ 3.4, 4.9],
                    barWidth: 16, 
                    barGap: 0, 
                    "label": {
                        "normal": {
                            "show": true,
                            "position": "top",
                            "formatter": "{c}",
                            color: '#6af3ff'
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: new echarts.graphic.LinearGradient(0,1,0,0,[{
                                offset: 0,
                                color: '#009dff00'
                            },{
                                offset: 1,
                                color: '#009dff'
                            }])
                        }
                    }
                }]
        };
        qmgjChart.setOption(option);
    }
   
    function drawGjzdhy() {
        let gjzdhyChart = echarts.init(document.getElementById('gjzdhy'));
        let option = {
            color: ["#cc5656", '#9b36d0', '#e8c87b','#30a1dc' ,'#d69f51','#4d6bfd'],
            series : [
                {
                    name: '',
                    type: 'pie',
                    radius : ['50%', '75%'],
                    center: ['50%', '50%'],
                    data: [
                        {value: 15, name: '美国'},
                        {value: 12, name: '日本'},
                        {value: 20, name: '朝鲜'},
                        {value: 28, name: '韩国'},
                        {value: 20, name: '老挝'},
                        {value: 6, name: '其他'},
                    ],
                    label: {
                        color: '#fff'
                    },
                }
            ]
        };
        gjzdhyChart.setOption(option);
    }
    
    function drawDxgj() {
        let dxgjChart = echarts.init(document.getElementById('dxgj'));
        const lastYear = new Date().getFullYear() - 1;
        let option = {
                color: ['#4691fb'],
                grid: {
                    top: '17%',
                    left: '5%',
                    right: '20%',
                    bottom: '7%',
                    containLabel: true,
                },
                yAxis: [{
                    type: 'category',
                    data: [lastYear-1, lastYear],
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        }
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        show: true,
                        interval:0,
                        fontSize: '13',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                }],
                xAxis: [{
                    type: 'value',
                    name: '单位:次',
                    nameTextStyle: {
                        color: '#fff'
                    },
                    nameLocation: 'end',
                    position: 'top',
                    axisLabel: {
                        show: true,
                        formatter: '{value} ',
                        fontSize: '13',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    splitLine: {
                        lineStyle: {
                            type: 'solid',
                            color: '#032947'
                        }
                    },
                }],
                series: [{
                    type: 'bar',
                    data: [10300, 22070],

                    barWidth: 20, 
                    barGap: 0, 
                    "label": {
                        "normal": {
                            "show": true,
                            "position": "right",
                            "formatter": "{c}",
                            color: '#6af3ff'
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: new echarts.graphic.LinearGradient(0,0,1,0,[{
                                offset: 0,
                                color: '#009dff00'
                            },{
                                offset: 1,
                                color: '#009dff'
                            }])
                        }
                    }

                }]
            };  
        dxgjChart.setOption(option);
    }

    function RightdrawQqmgjqmgjNew() {
        let RightqmgjChart = echarts.init(document.getElementById('Rightqmgj'));
        const lastYear = new Date().getFullYear() - 1;
        let option = {
                color: ['#4691fb'],
                grid: {
                    top: '17%',
                    left: '5%',
                    right: '5%',
                    bottom: '7%',
                    containLabel: true,
                },
                xAxis: [{
                    type: 'category',
                    data: [lastYear-1, lastYear],
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        }
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        show: true,
                        interval:0,
                        fontSize: '16',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                }],
                yAxis: [{
                    type: 'value',
                    name: '单位:台',
                    nameTextStyle: {
                        color: '#ffffff'
                    },
                    axisLabel: {
                        formatter: '{value} ',
                        fontSize: '16',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    splitLine: {
                        lineStyle: {
                            type: 'solid',
                            color: '#032947'
                        }
                    },
                }],
                series: [{
                    type: 'bar',
                    data: [ 3.4, 4.9],
                    barWidth: 28, 
                    barGap: 0, 
                    "label": {
                        "normal": {
                            "show": true,
                            "position": "top",
                            "formatter": "{c}",
                            color: '#6af3ff'
                        }
                    },
                    itemStyle: {
                        color: '#00ffff',
                    }
                }]
            };
            RightqmgjChart.setOption(option);
    }
      
       function RightdrawGjzdhy() {
        let RightgjzdhyChart = echarts.init(document.getElementById('Rightgjzdhy'));
        let option = {
            color: ["#cc5656", '#9b36d0', '#e8c87b','#30a1dc' ,'#d69f51','#4d6bfd'],
            series : [
                {
                    name: '',
                    type: 'pie',
                    radius : ['50%', '75%'],
                    center: ['50%', '50%'],
                    data: [
                        {value: 15, name: '美国'},
                        {value: 12, name: '日本'},
                        {value: 20, name: '朝鲜'},
                        {value: 28, name: '韩国'},
                        {value: 20, name: '老挝'},
                        {value: 6, name: '其他'},
                    ],
                    label: {
                        color: '#fff'
                    },
                }
            ]
        };
        RightgjzdhyChart.setOption(option);
    }
    
    function RightdrawDxgj() {
        let RightdxgjChart = echarts.init(document.getElementById('Rightdxgj'));
        const lastYear = new Date().getFullYear() - 1;
        let option = {
                color: ['#4691fb'],
                grid: {
                    top: '17%',
                    left: '5%',
                    right: '20%',
                    bottom: '7%',
                    containLabel: true,
                },
                yAxis: [{
                    type: 'category',
                    data: [lastYear-1, lastYear],
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        }
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        show: true,
                        interval:0,
                        fontSize: '16',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                }],
                xAxis: [{
                    type: 'value',
                    name: '单位:次',
                    nameTextStyle: {
                        color: '#fff'
                    },
                    nameLocation: 'end',
                    position: 'top',
                    axisLabel: {
                        show: true,
                        formatter: '{value} ',
                        fontSize: '16',
                        textStyle: {
                            color: "#fff",
                        }
                    },
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: "#ffffff22",
                            width: 2,
                            type: "solid"
                        },
                    },
                    axisTick: {
                        show: false
                    },
                    splitLine: {
                        lineStyle: {
                            type: 'solid',
                            color: '#032947'
                        }
                    },
                }],
                series: [{
                    type: 'bar',
                    data: [1030, 2070],

                    barWidth: 28,
                    barGap: 0, 
                    "label": {
                        "normal": {
                            "show": true,
                            "position": "right",
                            "formatter": "{c}",
                            color: '#6af3ff'
                        }
                    },
                    itemStyle: {
                        color: '#00ffff'
                    }

                }]
            };  
            RightdxgjChart.setOption(option);
    }
   
    // 
    function showTime() {
        let time = new Date();
        let year = time.getFullYear();
        let month = time.getMonth() + 1;
        let date = time.getDate();
        let hour = add0(time.getHours());
        let minute = add0(time.getMinutes())
        let second = add0(time.getSeconds());    

        function add0(num) {
            if(num < 10) {
                return `0${num}`;
            }
            return num.toString();
        }
        let timeText = `${year}年${month}月${date}日   ${hour}:${minute}:${second}`;
        $('#systemTime').text(timeText);
    }
    var attackInfo = [];
    function getChartData() {
        $.ajax({
            url: "/api/load-china-data",
            type: "get",
            dataType: "json",
            success: function (data) {
                // if() {
                // debugger
                // window.open('html/noAuth.html');
                // return false;                            
                // }
                attackInfo = data.attackInfo;
                var attackHtml = '';
                var iconTypeMap = {
                    '漏洞攻击': 'attackld',
                    '木马攻击': 'attackmm',
                    '恶意程序': 'attackey',
                    '网站后门': 'attackhm'
                };
                var conTypeMap =  {
                    '希腊': 'GR',
                    '匈牙利': 'HU',
                    '波兰': 'PT',
                    '奥地利': 'AT',
                    '加拿大': 'CA',
                    '德国': 'DE',
                    '丹麦': 'DK',
                    '以色列': 'IL',
                    '俄罗斯': 'RU',
                    '乌克兰': 'UA',
                    '意大利': 'IT',
                    '墨西哥': 'MX',
                    '印度': 'IN',
                    '挪威': 'NO',
                    '西班牙': 'ES',
                    '捷克': 'CZ',
                    '法国': 'FR',
                    '瑞典': 'SE',
                    '芬兰': 'FI',
                    '瑞士': 'CH',
                    '比利时': 'BE',
                    '英国': 'GB',
                    '葡萄牙': 'PT',
                    '美国': 'US',
                    '古巴': 'CU',
                    '巴西': 'BR',
                    '埃及': 'EG',
                    '澳大利亚': 'AU',
                    '荷兰': 'NL',
                    '卢森堡': 'LU',
                    '爱尔兰': 'IE',
                    '冰岛': 'IS',
                    '日本': 'JP'
                };
                for(var p=0;p<attackInfo.length;p++) {
                    let {attackType, source, target, attackTime} = attackInfo[p];
                    attackHtml += "<li>" +
                        "<span><img class = 'attackIcon' src='../style/images/attack/" + iconTypeMap[attackType] + ".png'>" + attackType + "</span>" +
                        "<span class = 'secCol'><img class = 'countryIcon' src='../style/images/country/" + conTypeMap[source] + ".svg'>" + source + "</span>" +
                        "<span><img src='../style/images/country/China.png' style='width: 30px;height: 21px;margin-right: 12px;'>中国</span>" +
                        "<span>" + attackTime + "</span>"
                        "</li>";
                }
                document.getElementById('prizeUl').innerHTML = attackHtml;
            }
        })
    }
        
    drwareas(); 
    function drwareas() {
        $('#cnterEcharsC1').replaceWith('<div id="cnterEcharsC1"  class=" topshow"> </div>')
        $('#cnterEcharsC1').hide();
        $('#cnterEchars11').show();       
        myChart2 = echarts.init(document.getElementById('cnterEchars11'));
        $.ajax({
            url: "/api/load-china-data",
            type:"get",
            dataType:"json",
            success:function(data){
                worldMapRefresh(data.attackInfo);
                myChart2.on('click', function (params) {
                    if(params.name=="China"){
                        window.location.href='china.html'
                    }
                })
            }
        })
    }

  $('#attackBox').click(function(){
    $("#controllTop10").css("display","block");
  });
    $('#controllTop10 .closeBtn').click(function() {
        $("#controllTop10").hide();
    });
    // 监管
    $('#RAttack').click(function(){
        $("#JGChart").css("display","block");
        RightdrawChart()
     });
    $('#JGChart .closeBtn').click(function() {
        $("#JGChart").hide();
    });
</script>