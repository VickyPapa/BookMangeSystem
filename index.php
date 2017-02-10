<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>图书管理系统</title>
        <link href="css/public.css" type="text/css" rel="stylesheet">
        <link href="css/houtai.css" type="text/css" rel="stylesheet">
        <link href="css/smartMenu.css" type="text/css" rel="stylesheet">
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('#login').click(function() {
                    var name_state = $('#name');
                    var psd_state = $('#psd');
                    var name = $('#name').val();
                    var psd = $('#psd').val();
                    if (name == '') {
                        name_state.parent().next().next().css("display", "block");
                        return false;
                    } else if (psd == '') {
                        name_state.parent().next().next().css("display", "none");
                        psd_state.parent().next().next().css("display", "block");
                        return false;
                    } else {
                        name_state.parent().next().next().css("display", "none");
                        psd_state.parent().next().next().css("display", "none");
                        $('.login').submit();
                    }
                });
            })

            function ok_or_errorBylogin(l) {
                var content = $(l).val();
                if (content != "") {
                    $(l).parent().next().next().css("display", "none");
                }
            }

            function ok_or_errorByRegister(r) {
                var affirm_psd = $("#affirm_psd");
                var psd_r = $("#psd_r");
                var affirm_psd_v = $("#affirm_psd").val();
                var psd_r_v = $("#psd_r").val();
                var content = $(r).val();
                if (content == "") {
                    $(r).parent().next().next().css("display", "block");
                    return false;
                } else {
                    $(r).parent().next().css("display", "block");
                    $(r).parent().next().next().css("display", "none");
                    if (psd_r_v == "") {
                        $(psd_r).parent().next().css("display", "none");
                        $(psd_r).parent().next().next().css("display", "none");
                        $(psd_r).parent().next().next().css("display", "block");
                        return false;
                    }
                    if (affirm_psd_v == "") {
                        $(affirm_psd_v).parent().next().css("display", "none");
                        $(affirm_psd_v).parent().next().next().css("display", "none");
                        $(affirm_psd_v).parent().next().next().css("display", "block");
                        return false;
                    }
                    if (psd_r_v == affirm_psd_v) {
                        $(affirm_psd).parent().next().css("display", "none");
                        $(affirm_psd).parent().next().next().css("display", "none");
                        $(psd_r).parent().next().css("display", "none");
                        $(psd_r).parent().next().next().css("display", "none");
                        $(affirm_psd).parent().next().css("display", "block");
                        $(psd_r).parent().next().css("display", "block");
                    } else {
                        $(affirm_psd).parent().next().css("display", "none");
                        $(affirm_psd).parent().next().next().css("display", "none");
                        $(psd_r).parent().next().css("display", "none");
                        $(psd_r).parent().next().next().css("display", "none");
                        $(psd_r).parent().next().css("display", "block");
                        $(affirm_psd).parent().next().next().css("display", "block");
                        return false;
                    }
                }
            }

            function barter_btn(bb) {
                $(bb).parent().parent().fadeOut(1000);
                $(bb).parent().parent().siblings().fadeIn(2000);
            }
        </script>
    </head>
    <body>
    <div class="login_div">
        <div class="col-xs-12 login_title">登录</div>
        <form action="adminLogin.php" class="login" method="post">
            <div class="nav">
                <div class="nav login_nav">
                    <div class="col-xs-4 login_username">
                        用户名:
                    </div>
                    <div class="col-xs-6 login_usernameInput">
                        <input type="text" name="fname" id="name" value="" placeholder="&nbsp;&nbsp;用户名" onblur="javascript:ok_or_errorBylogin(this)">
                    </div>
                    <div class="col-xs-1 ok_gou">
                        √
                    </div>
                    <div class="col-xs-1 error_cuo">
                        ×
                    </div>
                </div>
                <div class="nav login_psdNav">
                    <div class="col-xs-4">
                        密&nbsp;&nbsp;&nbsp;码:
                    </div>
                    <div class="col-xs-6">
                        <input type="password" name="password" id="psd" value="" placeholder="&nbsp;&nbsp;密码" onblur="javascript:ok_or_errorBylogin(this)">
                    </div>
                    <div class="col-xs-1 ok_gou">
                        √
                    </div>
                    <div class="col-xs-1 error_cuo">
                        ×
                    </div>
                </div>
                <div class="col-xs-12 login_btn_div">
                    <input type="submit" class="sub_btn" value="登录" id="login">
                </div>
            </div>
        </form>
    </div>
    	<div id="admin">
    		<div class="ad-menu" id="ad-menu">
                <div class="ad-logo"><img src="image/m-logo.png" height="103" width="130"></div>
                <div class="ad-list">
                    <ul>
                        <li>
                            <div class="li-item"><em class="scm li-ico ic3"></em>图书管理<span class="scm arrow"></span></div>
                            <dl>
                                <dd>
                                    <a href="#" class="dd-item">图书入库<span class="scm dd-ar"></span></a>
                                    <ul class="ad-item-list">
                                        <li class="J_menuItem" href="1-1oneBookAdd.php" data-index="1">单本入库</li>
                                        <li class="J_menuItem" href="1-2moreBookAdd.php" data-index="2">批量入库</li>
                                    </ul>
                                </dd>
                                <dd>
                                    <a href="#" class="dd-item">图书查询<span class="scm dd-ar"></span></a>
                                    <ul class="ad-item-list">
                                        <li class="J_menuItem" href="index_v3.html" data-index="1">热门推荐</li>
                                        <li class="J_menuItem" href="index_v4.html" data-index="2">图书搜索</li>
                                    </ul>
                                </dd>
                                <dd>
                                    <a href="#" class="dd-item">借还操作<span class="scm dd-ar"></span></a>
                                    <ul class="ad-item-list">
                                        <li class="J_menuItem" href="index_v1.html" data-index="1">借书</li>
                                        <li class="J_menuItem" href="index_v2.html" data-index="2">还书</li>
                                    </ul>
                                </dd>
                                <dd>
                                    <a href="#" class="dd-item">借书证管理<span class="scm dd-ar"></span></a>
                                    <ul class="ad-item-list">
                                        <li class="J_menuItem" href="index_v1.html" data-index="1">增加借书证</li>
                                        <li class="J_menuItem" href="index_v2.html" data-index="2">删除借书证</li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
    		<div class="ad-comment-box" id="ad-comment">
                <div class="ad-top-comment">
                    <div class="ad-message">
                        <div class="ad-top-left">
                            <div class="ad-change-btn"><a id="ad-list" href="javascript:;" class="scm ad-list-btn"></a></div>
                            <div class="ad-search-box clear">
                                <div class="ad-search-cha">
                                    <input type="text" class="ad-search-input" placeholder="请输入你要查找的内容">
                                    <input type="submit" class="scm ad-search-btn" value=""> 
                                </div>
                            </div>
                        </div>
                        <div class="ad-top-right">
                            <div class="ad-welcom">
                                <div class="ad-wel-text">
                                    <div class="font-wel">欢迎您！<strong>游客</strong></div>
                                    <div class="font-wel"><a href="index.php"><strong>【登录】</strong></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ad-main-nav-box">
                        <ul id="breadcrumbs-three">
                            <li title="首页"><a href="javascript:;" class="dot">首页</a></li>
                        </ul>
                        <a href="javascript:;" class="scm jian-a J_mainLeft main-sel pre"></a>
                        <div class="ad-main-wraper .J_menuItems">
                            <ul class="ad-main-list" id="ad-main">
                            </ul>
                        </div>
                        <a href="javascript:;" class="scm jian-a J_mainRight next"></a>
                    </div>
                    <div class="ad-sub-nav-box content-tabs">
                        <!-- <div class="ad-sub-record">历史记录</div> -->
                        <a href="javascript:;" class="scm jian-a sub-sel pre j_tabBg J_tabLeft"></a>
                        <div class="ad-sub-wraper page-tabs J_menuTabs">
                            <ul class="ad-sub-list page-tabs-content">
                                <li class="active J_menuTab" data-id="shouYe.php">首页</li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="scm jian-a next j_tabBg J_tabRight"></a>
                    </div>
                </div>
                <div class="ad-main-comment J_mainContent" id="ad-iframe">
                    <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="shouYe.php"" frameborder="0" data-id="index_v0.html" seamless></iframe>
                </div>
    		</div>
    	</div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/contabs.js"></script>
        <script type="text/javascript" src="js/maintabs.js"></script>
        <script type="text/javascript" src="js/jquery-smartMenu-min.js"></script>
        <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $(".ad-menu").niceScroll({cursorborder:"0 none",cursorcolor:"#1a1a19",cursoropacitymin:"0",boxzoom:false});
            })
        </script>
    </body>
</html>