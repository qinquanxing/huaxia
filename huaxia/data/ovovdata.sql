DROP TABLE IF EXISTS `zg_abcdata`<{|}>

  `channel_id` int(255) NOT NULL AUTO_INCREMENT,
  `channel_kid` int(20) DEFAULT '0' COMMENT '模块类别0为系统模块',
  `channel_root_id` int(11) DEFAULT '0',
  `channel_name` varchar(255) NOT NULL,
  `channel_urlname` varchar(255) DEFAULT NULL,
  `channel_urlok` int(1) DEFAULT '0',
  `channel_ename` varchar(255) DEFAULT NULL,
  `channel_order` int(255) NOT NULL DEFAULT '0',
  `channel_hit` int(255) NOT NULL DEFAULT '0',
  `intro_meo` text,
  `channel_ifdel` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `channel_ip` varchar(20) DEFAULT NULL COMMENT '操作ip',
  `jibie` int(10) DEFAULT '1',
  `tjchar` varchar(255) DEFAULT NULL,
  `mbname` varchar(255) DEFAULT NULL,
  `channel_istop` int(2) DEFAULT '0',
  `isdesk` int(1) DEFAULT '0',
  `channel_ico` varchar(255) DEFAULT NULL,
  `addtime` int(20) DEFAULT '0',
  `channel_alias` varchar(30) DEFAULT NULL COMMENT '栏目别名',
  `channel_type` int(1) DEFAULT '0',
  `isshow` int(1) DEFAULT '0',
  `is_recommend` int(1) DEFAULT '0',
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 <{|}>






























































  `adv_id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `name` char(200) DEFAULT '',
  `width` int(5) DEFAULT '0',
  `height` int(5) DEFAULT '0',
  `price` float(8,2) DEFAULT '0.00',
  `add_time` int(10) DEFAULT '0',
  `is_del` int(1) DEFAULT '0' COMMENT '是否删除',
  `add_ip` varchar(50) DEFAULT NULL COMMENT '添加IP',
  `add_user_id` int(6) DEFAULT '0',
  PRIMARY KEY (`adv_id`),
  KEY `adid` (`adv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC <{|}>




  `order_id` int(6) NOT NULL AUTO_INCREMENT,
  `adv_id` int(4) NOT NULL DEFAULT '0',
  `title` char(220) NOT NULL DEFAULT '',
  `class` tinyint(1) NOT NULL DEFAULT '0',
  `url` char(220) NOT NULL DEFAULT '',
  `text` char(254) NOT NULL DEFAULT '',
  `img` char(200) NOT NULL DEFAULT '',
  `code` mediumtext NOT NULL,
  `price` float(8,2) NOT NULL DEFAULT '0.00',
  `show_times` int(10) DEFAULT '0',
  `hits` int(10) DEFAULT '0',
  `last_click_time` int(10) DEFAULT '0',
  `state` tinyint(1) DEFAULT '0',
  `start_date` int(10) DEFAULT '0',
  `stop_date` int(10) DEFAULT '0',
  `add_time` int(10) DEFAULT '0',
  `is_del` int(1) DEFAULT '0' COMMENT '是否删除',
  `add_ip` varchar(50) DEFAULT NULL COMMENT '添加IP',
  `add_user_id` int(6) DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `orderid` (`order_id`,`class`,`start_date`,`stop_date`,`adv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC <{|}>





  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(255) DEFAULT '0',
  `coid` int(255) DEFAULT '0',
  `article_cid` int(255) DEFAULT '0',
  `article_sid` int(11) DEFAULT '0',
  `article_title` varchar(255) DEFAULT NULL,
  `title_color` varchar(20) DEFAULT '#000000' COMMENT '字体颜色',
  `title_font_type` int(2) DEFAULT '0' COMMENT '字体类型',
  `jump_url` varchar(255) DEFAULT NULL COMMENT '跳转链接',
  `jump_url_is_on` int(1) DEFAULT '0' COMMENT '是否开启跳转',
  `article_content` longtext COMMENT '内容',
  `article_keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `article_author` varchar(255) DEFAULT NULL COMMENT '添加人',
  `article_source` varchar(255) DEFAULT NULL COMMENT '来源',
  `add_time` int(255) DEFAULT NULL COMMENT '添加时间',
  `add_user` varchar(255) DEFAULT NULL COMMENT '添加人',
  `article_hit` int(255) DEFAULT '0',
  `is_recommend` int(255) DEFAULT '0' COMMENT '是否推荐',
  `is_top` int(255) DEFAULT '0' COMMENT '是否置顶',
  `is_headline` int(1) DEFAULT '0' COMMENT '是否是头条',
  `is_rolling` int(1) DEFAULT '0' COMMENT '滚动',
  `is_locked` int(255) DEFAULT '0' COMMENT '是否锁定',
  `index_flash` varchar(255) DEFAULT NULL,
  `is_private` int(2) DEFAULT '0' COMMENT '是否设为私有',
  `lecturer` varchar(255) DEFAULT NULL COMMENT '主讲人',
  `duration` varchar(255) DEFAULT NULL COMMENT '时长',
  `start_time` int(30) DEFAULT '0' COMMENT '演讲开始时间',
  `video` varchar(255) CHARACTER SET ucs2 DEFAULT NULL COMMENT '视频',
  `ch_title` varchar(255) DEFAULT NULL COMMENT '中文标题',
  `digest` varchar(1000) DEFAULT NULL COMMENT '摘要',
  `json_introduce` longtext COMMENT '全球健康行动中心的每个图片下面的介绍',
  `is_sequence` int(11) DEFAULT '0' COMMENT '排列顺序',
  `third_intro` varchar(1000) DEFAULT NULL COMMENT '视频简介',
  `pictures_introduce` longtext COMMENT '图片和图片的介绍',
  `img1` varchar(255) DEFAULT NULL COMMENT '健康品牌首页图片',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 <{|}>

	　　一诺美太投资咨询（北京）有限公司简称“诺美咨询”，是国内一家专业的咨询顾问机构。为达华工程管理<span>(</span>集团<span>)</span>有限公司项目部，关联单位有中工国业（北京）工程技术研究院
、北京睿哲新源企业管理咨询有限公司，同时也是中国老龄事业发展中心的顾问机构。关注经济形势对企业的影响是诺美咨询团队始终如一的坚持，长期以来对各个行业进行长期跟踪、研究，分析国内外投资形势及社会经济发展趋势、产业动向和技术进展，提供产业研究和项目投资咨询综合解决方案，为客户提供更高附加值的全咨询产业链服务，为投资决策者的市场战略及投资策略提供顾问支持。配置齐全、经验丰富的专家团队为项目的稳健运营保驾护航，为项目方抢占市场赢得先机。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　<strong>　<span style="color:#E53333;">核心业务：</span></strong> 
</p>
<p class="MsoNormal">
	　　•工程咨询
</p>
<p class="MsoNormal">
	　　•投资咨询
</p>
<p class="MsoNormal">
	　　•规划咨询
</p>
<p class="MsoNormal">
	　　•管理咨询
</p>
<p class="MsoNormal">
	　　•市场研究
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　<strong>　<span style="color:#E53333;">涉及领域：</span></strong> 
</p>
<p class="MsoNormal">
	　　•农业、林业、建筑、机械、
火电、水电、石化、电子、建筑材料、化工医药、有色冶金、石油天然气、钢铁、公路、铁路、轻工、生态建设和环境工程、纺织化纤、煤炭、化工、通信信息、广播电影电视、水文地质、工程测量、岩土工程、水利工程、港口河海工程、城市轨道交通、市政公用工程
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　<strong><span style="color:#E53333;">服务类型</span></strong> 
</p>
<p class="MsoNormal">
	　　•规划咨询
</p>
<p class="MsoNormal">
	　　•项目投资与融资
</p>
<p class="MsoNormal">
	　　•项目投资策划
</p>
<p class="MsoNormal">
	　　•技术转化与落地
</p>
<p class="MsoNormal">
	　　•项目可行性研究
</p>
<p class="MsoNormal">
	　　•项目申请报告
</p>
<p class="MsoNormal">
	　　•资金申请报告
</p>
<p class="MsoNormal">
	　　•节能评估报告
</p>
<p class="MsoNormal">
	　　•环境影响评价报告<br />
　　<span>•安全评价报告<br />
　　<span>•职业卫生评价报告</span></span>
</p>
<p class="MsoNormal">
	　　•工程项目管理
</p>
<p class="MsoNormal">
	　　•投资价值分析报告
</p>
<p class="MsoNormal">
	　　•招标代理、工程监理
</p>
<p class="MsoNormal">
	　　•市场研究
</p>','一诺美太投资咨询(北京)有限公司','诺美咨询','原创','1397282540','bjovov','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	<strong><span style="color:#E53333;">职能与服务：</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　为客户提供战略分析、战略选择、盈利模式设计、战略规划、战略保障体系设计、战略执行、战略评估、战略管理培训、细分的战略专题研究、战略突破行动、年度行动计划等服务，并致力于把战略管理的理念、知识、方法和工具传递给客户，促使客户内生相应的知识和能力。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">项目经验：</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　战略咨询中心的人员自从业以来累计服务的客户超过<span>320</span>家，执行的战略咨询项目累计超过<span>450</span>个。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　战略咨询中心致力于解决客户的下列问题：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>1</span>、工作计划
：我应该从哪些方面思考一个“统领全局、纲举目张、切实可行”的工作计划？未来五年、三年或一年的工作计划应该怎样制定？干什么、怎么干、为什么干？可以达到什么样的战略目标和业绩目标，怎样达到？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>2</span>、基业长青：如何打造百年老店、实现基业长青？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>3</span>、业务结构：我应该进入哪里业务领域、退出哪些业务领域？怎样进入、怎样退出？针对我的情况，最优的业务结构是怎样的？为什么？调整和优化业务结构应该考虑哪些因素？世界商业史上和中国改革开放以来，企业的业务结构有哪些可资借鉴甚至模仿的成功模式，有哪些需要提防的失败陷阱？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>4</span>、商业模式：我的商业模式和盈利模式是否合理而有效，是否存在改进空间，空间有多大，怎样改进？是否需要彻底变革、转型或升级，怎样变革、转型和升级？这种商业模式的关键成功要素是什么，怎样占领和打造这些关键成功要素？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>5</span>、竞争分析：我所在行业的标杆企业有哪些？它们为什么成功？我应该学习他们什么？我的商业模式的竞争要害和成功要点是什么？我所面临的竞争态势将怎样演变？竞争对手是谁、在哪里、他们的竞争策略和竞争优势是什么？我和竞争对手相比，优势是什么、差距在哪里？我的竞争战略、模式和策略应该怎样选择？我如何展开价值链竞争？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>6</span>、机会分析：我面临哪些机会，产业的机会和资本市场的机会？我怎样去抓住这些机会？可资借鉴和模仿的案例有哪些？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>7</span>、能力、资源与威胁分析：我的核心能力和资源是什么？我的弱势和威胁是什么？这些能力和资源、弱势和威胁意味着什么？它们能影响我走向哪里、走多高、走多远？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>8</span>、战略实施（职能战略）：我的资本结构、组织系统和管理体系是否与我的业务战略和商业模式适配？需要怎样改进、优化、变革或升级？我的战略实施要点在哪儿？怎样建立起战略实施的保障、测评和反馈体系？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>9</span>、国际化与全球化：我是否应该进入国际市场，什么时候进入，先进入哪个国家或区域，怎样进入？我的国际化和全球化战略应该怎么做？其间的风险怎样评估，如何防范？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>10</span>、并购扩张：我是否应该启动产业整合和并购重组战略？是横向的产能和市场份额整合，还是纵向的价值链整合？如何识别和评估整合与并购的机会？如何选择、调查和估值并购目标？如何设计并购策略和交易结构？如果利用资本市场的周期与机制实现并购成长？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>11</span>、系统思考：我怎样完成关于企业的终极思考：我是谁、我从哪里来、我到哪里去、我怎样去？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>12</span>、知识学习与能力发育：我怎样思考和规划自己的发展战略？我应该具备什么样的知识结构和思维方式以便我能完成关于企业生存与发展的系统思考？怎样的阅读结构、学习计划可以帮助我建立这样的知识结构和思维方式？
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">部分客户名单：</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　中国外运集团、新东方学校、北汽福田、中航重机、海印股份、恒安集团、潮鸿基、正邦集团、康恩贝、江中集团、丽江旅游、曼妮芬、中国动向（<span>KAPPA</span>）、阳光城集团、三环化工、新中基、中国机械集团、中国医药集团、东北制药集团、延长化建、阳光焦化集团、长城集团、中利科技、贞元集团、际华<span>3502</span>、中纺锐力、越王珠宝、兰花科创、中信华南、中邮器材、中国盐业总公司、中图集团、首旅股份、正虹科技、南都电源、佳宝化纤、隆平高科、金河乳业、溪石集团、五矿发展、天津航空机电、沱牌集团、顺鑫农业、孔府家酒、山东港、华业集团、沁和能源、中冶重工、燕京啤酒、中南农业、北人印刷、万东医疗、双鹤药业、中青旅、东南电力、白沙集团、艾美特电器、中山公用、环球石材、北京市总工会资产管理委员会、首都信息、曲江文化产业集团、珀莱雅、中建钢构、新疆百花村股份、中国船舶工业贸易、中国恒天集团、漳州片仔癀、中航信、联想投资、远东控股、陕鼓集团、大汉塔机、中国联通、北京市禽蛋公司、北京金色摇篮、新疆西部建设股份、贵州新富农现代农业股份、青岛海容、港中旅、福建晋江经济开发区管委会……
</p>','战略咨询','','','1398298085','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	<b>1.目标(Purpose)</b>
</div>
<div class="para">
	团队应该有一个既定的<a target="_blank" href="http://baike.baidu.com/view/53876.htm">目标</a>，为团队成员导航，知道要向何处去，没有目标这个团队就没有存在的价值。
</div>
<div class="para">
	小知识自然界中有一种昆虫很喜欢吃三叶草(也叫鸡公叶)，这种昆虫在吃食物的时候都是成群结队的，第一个趴在第二个的身上，第二个趴在第三个的身上，由一只昆虫带队去寻找食物，这些昆虫连接起来就像一节一节的火车车箱。<a target="_blank" href="http://baike.baidu.com/view/1337840.htm">管理学家</a>做
了一个实验，把这些像火车车箱一样的昆虫连在一起，组成一个圆圈，然后在圆圈中放了它们喜欢吃的三叶草。结果它们爬得精疲力竭也吃不到这些草。这个例子说
明在团队中失去目标后，团队成员就不知道上何处去，最后的结果可能是饿死，这个团队存在的价值可能就要打折扣。团队的目标必须跟组织的目标一致，此外还可
以把大目标分成小目标具体分到各个团队成员身上，大家合力实现这个共同的目标。同时，目标还应该有效地向大众传播，让团队内外的成员都知道这些目标，有时
甚至可以把目标贴在团队成员的办公桌上、会议室里，以此<a target="_blank" href="http://baike.baidu.com/view/53991.htm">激励</a>所有的人为这个<a target="_blank" href="http://baike.baidu.com/view/53876.htm">目标</a>去工作。
</div>
<div class="para">
	<b>2.人(People)</b>
</div>
<div class="para">
	人是构成团队最核心的<a target="_blank" href="http://baike.baidu.com/view/51980.htm">力量</a>，2个(包含2个)以上的人就可以构成团队。目标是通过人员具体实现的，所以人员的选择是团队中非常重要的一个部分。在一个团队中可能需要有人出主意，有人定<a target="_blank" href="http://baike.baidu.com/view/149377.htm">计划</a>，有人实施，有人协调不同的人一起去工作，还有人去监督团队工作的进展，评价团队最终的贡献。不同的人通过分工来共同完成团队的目标，在人员选择方面要考虑人员的能力如何，技能是否互补，人员的经验如何。
</div>
<div class="para">
	<b>3.定位(Place)</b>
</div>
<div class="para">
	团队的定位包含两层意思：
</div>
<div class="para">
	团队的定位，团队在企业中处于什么位置，由谁选择和决定团队的成员，团队最终应对谁负责，团队采取什么方式激励下属? 个体的定位，作为成员在团队中扮演什么角色?是订计划还是具体实施或评估?
</div>
<div class="para">
	<b>4.权限(Power)</b>
</div>
<div class="para">
	团队当中<a target="_blank" href="http://baike.baidu.com/view/1189795.htm">领导人</a>的权力大小跟团队的发展阶段相关，一般来说，团队越成熟<a target="_blank" href="http://baike.baidu.com/view/1363504.htm">领导者</a>所拥有的权力相应越小，在团队发展的初期阶段领导权是相对比较集中。团队权限<sup>[2]</sup><a name="ref_[2]_296931"></a>关系的两个方面：
</div>
<div class="para">
	(1)整个团队在组织中拥有什么样的决定权?比方说财务决定权、人事决定权、信息决定权。
</div>
<div class="para">
	(2)组织的基本特征，比方说组织的规模多大，团队的数量是否足够多，组织对于团队的授权有多大，它的<a target="_blank" href="http://baike.baidu.com/view/64906.htm">业务</a>是什么类型。
</div>
<div class="para">
	<b>5.计划(Plan)</b>
</div>
<div class="para">
	计划的两层面含义：
</div>
<div class="para">
	(1)目标最终的实现，需要一系列具体的行动方案，可以把计划理解成目标的具体工作的程序。
</div>
<div class="para">
	(2)提前按计划进行可以保证<a target="_blank" href="http://baike.baidu.com/view/296931.htm">团队</a>的顺利进度。只有在<a target="_blank" href="http://baike.baidu.com/view/149377.htm">计划</a>的操作下团队才会一步一步的贴近目标，从而最终实现目标。
</div>
<p style="text-indent:2em;">
	<br />
</p>','团队','团队','团队','1397549080','bjovov','0','0','0','0','0','0','','0','','','0','','团队','','','0','','[{"image":"","show":""}]','')<{|}>

<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　兴隆环首都经济圈主导产业发展规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　兴隆工业集聚区产业发展规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　河北省承德市兴隆县农业观光产业发展规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　河北省承德市兴隆县养老产业总体发展规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　漯河市西城新区规划方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　吉林食品区产业发展规划（</span><span>2011-2030</span><span style="font-family:宋体;">）</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　成都（郫县）教育培训业功能区发展规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中新天津生态城总体规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　兴隆县雾灵山旅游度假小镇概念性规划</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　河北省兴隆县半壁山国际物流园区项目概念性规划</span>
</p>
<br />
<br />','规划咨询','诺美','诺美','1397556418','bjovov','0','0','0','0','0','0','','0','','','0','','规划咨询','','','0','','[{"image":"","show":""}]','')<{|}>

<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　安徽华业香精香料股份公司国家级研发中心项目建设方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　海淀区水资源利用工程项目咨询服务方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　西部地区专用车市场调研项目报告服务方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>10000</span><span style="font-family:宋体;">吨增塑剂项目工程咨询服务方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　国际中药材批发市场工程咨询方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国商用冷柜市场研究项目建议书</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国酱菜市场调研项目咨询方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　保定地区家电市场调研项目方案设计方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国石英矿调研项目方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国杂志市场项目调研方案</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　湘西边城醋业高档醋进军北京市场调研咨询方案书</span>
</p>
<br />
<br />','项目策划','诺美','诺美','1397556385','bjovov','0','0','0','0','0','0','','0','','','0','','项目策划','','','0','','[{"image":"","show":""}]','')<{|}>



	ü50000吨农产品深加工项目可行性研究报告
</div>
<div style="margin:0pt 0in 0pt 0.31in;">
	ü葡萄酒庄园项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü年2000万吨现代物流运输中心项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü定兴县休闲食品包装产业园可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü500td优质浮法玻璃生产线建设项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü鑫域国际文化体育公园建设项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü养猪场大型沼气工程建设项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü天麻种植及深加工建设项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü新建浓缩果汁和果浆生产建设项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü年产2500吨不锈钢管项目可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü中国白酒制造项目投资可行性研究报告
</div>
<div style="margin-left:0.31in;">
	ü南漳县桔农发柑桔专业合作社5万吨柑桔储藏保鲜改扩建项目
</div>
<div style="margin-left:0.31in;">
	ü2000吨畜禽产品精深加工改扩建项目
</div>
<div style="margin-left:0.31in;">
	ü富山居国际投资集团香港有限公司农产品深加工项目商业计划书
</div>
<div style="margin-left:0.31in;">
	ü10万亩优质冬枣基地建设项目商业计划书
</div>
<div style="margin-left:0.31in;">
	ü湖北百味佳食品有限公司年产4000吨脱水疏菜项目可行性研究报告
</div>
<div style="margin:0pt 0in 0pt 0.31in;">
	ü《草原豆思》动漫基地及主题乐园项目可行性研究报告
</div>
<div style="margin:0pt 0in 0pt 0.31in;">
	ü中国味电子商务信息服务中心项目可行性研究报告
</div>
<div style="margin:0pt 0in 0pt 0.31in;">
	ü环境监测及低碳节能示范工业园区建设项目可行性研究报告
</div>
<div style="margin:0pt 0in 0pt 0.31in;">
</div>','可行性研究报告','诺美','诺美','1397783353','ljd','0','0','0','0','1','0','upload/2014-04/28/201404281529_5372.jpg','0','','','0','','研究报告','50000吨农产品深加工项目可行性研究报告
葡萄酒庄园项目可行性研究报告
年2000万吨现代物流运输中心项目可行性研究报告
定兴县休闲食品包装产业园可行性研究报告
500td优质浮法玻璃生产线建设项目可行性研究报告','','0','','[{"image":"","show":""}]','')<{|}>

	　　行业研究是指以“产业”为研究对象，研究产业内部各企业间相互作用关系、产业本身发展、产业间互动联系以及空间区域中的分布等。目前，产业研究主要集中于细分市场研究和产业内细分产品研究两方面。<br />
</p>
<p>
	<strong>　　概况 </strong><br />
　　鉴于拟投资商对本产业内相关信息了解不够全面，角度不够客观，且获得竞争对手市场信息存在一定困难，产业研究尤其细分市场研究一般都是由专业咨询公司来完成。<br />
</p>
<p>
	<strong>　　核心 </strong><br />
　　1.是研究行业的生存背景 、产业政策、产业布局、产业生命周期、该行业在整体宏观产业结构中的地位以及各自的发展演变方向与成长背景； <br />
　　2.是研究各个行业市场内的特征 、竞争态势、市场进入与退出的难度以及市场的成长性； <br />
　　3.是研究各个行业在不同条件下及成长阶段中的竞争策略和市场行为模式，给企业提供一些具有操作性的建议。<br />
</p>
<p>
	<strong>　　目的 </strong><br />
　　一、把握行业发展整体状况 <br />
　　1. 行业宏观发展情况 <br />
　　2. 了解不同行业的需求满足程度 <br />
　　3. 估算不同行业的市场容量 <br />
　　4. 评估企业资源水平与行业中的竞争环境的匹配性 <br />
　　5. 对不同行业进行潜力评估
</p>
<p>
	　　二、判产业发展趋势 <br />
　　通过分析宏观经济和产业政策走势，结合产业现行发展、竞争格局等，研判行业发展趋势，把握市场动向。
</p>
<p>
	　　三、为产业投资提供决策咨询 <br />
<br />
<strong>　　特点</strong>
</p>
<p>
	　　内容 <br />
　　行业环境分析：行业环境是对企业影响最直接、作用最大的外部环境。
</p>
<p>
	　　行业结构分析：行业结构分析主要涉及到行业的资本结构、市场结构等内容。一般来说，主要是行业进入障碍和行业内竞争程度的分析。
</p>
<p>
	　　行业市场分析：主要内容涉及行业市场需求的性质、要求及其发展变化，行业的市场容量，行业的分销通路模式、销售方式等。
</p>
<p>
	　　行业组织分析：主要研究行业对企业生存状况的要求及现实反映，主要内容有：企业内的关联性，行业内专业化、一体化程度，规模经济水平，组织变化状况等。
</p>
<p>
	　　行业成长性分析：是指分析行业所处的成长阶段和发展方向。当然，这些内容还只是常规分析中的一部分，而在这些分析中，还有不少一般内容和特定内容。例如，在行业分析中，一般应动态地进行行业生命周期的分析，尤其是结合行业周期的变化来看公司市场销售趋势与价值的变动。
</p>
<p>
	　　纵深研究
</p>
<p>
	　　行业研究分为一般性研究和专业性研究、浅表性研究和纵深研究，只有进行纵深研究才能真正发现公司的价值形成和来源构成。要进行行业的纵深研究，必须在深入调查的基础上进行大量的基础研究和实证分析。例如，不同行业间的技术传递和转移过程，是直接关系到不同行业的兴衰和转化的过程，对于这一问题的研究，就是纵深研究的范围。
</p>','行业研究','行业研究','行业研究','1398232929','bjovov','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	　　一诺美太投资咨询（北京）有限公司简称“诺美咨询”，是国内一家专业的咨询顾问机构。为达华工程管理(集团)有限公司项目部，关联单位有中工国业（北京）工程技术研究院 、北京睿哲新源企业管理咨询有限公司，同时也是中国老龄事业发展中心的顾问机构。关注经济形势对企业的影响是诺美咨询团队始终如一的坚持，长期以来对各个行业进行长期跟踪、研究，分析国内外投资形势及社会经济发展趋势、产业动向和技术进展，提供产业研究和项目投资咨询综合解决方案，为客户提供更高附加值的全咨询产业链服务，为投资决策者的市场战略及投资策略提供顾问支持。配置齐全、经验丰富的专家团队为项目的稳健运营保驾护航，为项目方抢占市场赢得先机。
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p class="MsoNormal">
	　<strong>　<span style="color:#E53333;">核心业务：</span></strong>
</p>
<p class="MsoNormal">
	　　•工程咨询
</p>
<p class="MsoNormal">
	　　•投资咨询
</p>
<p class="MsoNormal">
	　　•规划咨询
</p>
<p class="MsoNormal">
	　　•管理咨询
</p>
<p class="MsoNormal">
	　　•市场研究
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p class="MsoNormal">
	　<strong>　<span style="color:#E53333;">涉及领域：</span></strong>
</p>
<p class="MsoNormal">
	　　•农业、林业、建筑、机械、 火电、水电、石化、电子、建筑材料、化工医药、有色冶金、石油天然气、钢铁、公路、铁路、轻工、生态建设和环境工程、纺织化纤、煤炭、化工、通信信息、广播电影电视、水文地质、工程测量、岩土工程、水利工程、港口河海工程、城市轨道交通、市政公用工程
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p class="MsoNormal">
	　　<strong><span style="color:#E53333;">服务类型</span></strong>
</p>
<p class="MsoNormal">
	　　•规划咨询
</p>
<p class="MsoNormal">
	　　•项目投资与融资
</p>
<p class="MsoNormal">
	　　•项目投资策划
</p>
<p class="MsoNormal">
	　　•技术转化与落地
</p>
<p class="MsoNormal">
	　　•项目可行性研究
</p>
<p class="MsoNormal">
	　　•项目申请报告
</p>
<p class="MsoNormal">
	　　•资金申请报告
</p>
<p class="MsoNormal">
	　　•节能评估报告
</p>
<p class="MsoNormal">
	　　•环境评价报告
</p>
<p class="MsoNormal">
	　　•工程项目管理
</p>
<p class="MsoNormal">
	　　•投资价值分析报告
</p>
<p class="MsoNormal">
	　　•招标代理、工程监理
</p>
<p class="MsoNormal">
	　　•市场研究
</p>','诺美咨询','诺美咨询','原创','1398298103','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>


	我们的价值观 - <span style="color:#E53333;">研究观点</span>
</h2>
<br />
<div style="text-align:center;">
	<img src="/e/attached/image/20140424/20140424002429_93064.jpg" alt="" />
</div>
<br />
　　诺美咨询认为，咨询机构如一架搭载乘客的飞行器，准确的数据、丰富的经验和高度的责任心均是安全飞行（项目投资成功）的必要保障，诺美咨询以此为标准不断自觉提高咨询顾问的综合服务能力，完成了贴近、满足客户需求的研究成果，以专业的服务品质和精神，赢得客户的尊敬和信赖！<br />
<div>
	<br />
</div>
<br />
<h2>
	<span style="line-height:1.5;">我们的价值观&nbsp;- <span style="color:#E53333;">合作</span></span><span style="line-height:1.5;color:#E53333;">观点<br />
<br />
</span>
</h2>
<p>
	<div style="text-align:center;">
		<span style="line-height:1.5;"></span><img src="/e/attached/image/20140424/20140424002707_37509.jpg" alt="" />
	</div>
<br />
　　作为对社会负责任的企业，诺美咨询遵循法律法规和公认的国际商业关系准则，认真履行应尽的企业责任。诺美咨询以积极姿态参与经济体系变革和有关规则制定，参与广泛的有关投资领域的相关事务。以开放公平公正的胸怀寻求合作伙伴，按照责任、权利、实力相一致的原则，着眼公司、合作伙伴、社会三方共同利益，从自身能力出发，履行相应合作义务，发挥建设性作用。随着综合能力的不断增强，诺美咨询将力所能及地承担更多的社会责任。<br />
	<div>
		<br />
	</div>
</p>','诺美文化','','','1398298134','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	　　针对生产制造型企业，生产管理的精益程度完全可以代表这个企业生命力的强度和对市场的把控能力。根据多年对生产型企业做管理顾问的经验，我认为以下几点是我们在做咨询项目中一定要注意到的
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　首先我们来了解一下精益生产管理的特点：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>1</span>、工序间的关联性、时效性强
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　流水线的生产过程，是前后工序的有效结合，所有的工序相互牵连，任何一道工序出现怠工现象，所有的分段工序都会受到影响，尽可能做到的就是让工序做到<span>1+1&gt;=2</span>；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>2</span>、强调过程中的质量把控
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　把对成品质量的管控分解到每一道工序，让每个工序都能做为上一道工序的“质检员”，从而实现生产过程中对质量的检验与控制；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>3</span>、强调“<span>0</span>”库存的无极限靠近
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　俗话说“现金为王”，降低对现金的占有率，一定要降低成品及原材料的库存压力，别忘了所有的资金压在仓库里都有无形的成本流失。原材料的存量增加的同时无形中也会影响人们思想观念中的“浪费心念”；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>4</span>、强调订单的合理分解
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　订单的管理是精益生产的“重中之重”，是精准生产的管理之源。合理评估订单，精准的订单分解是采购、加工、仓储、物流、售后的一切开始，再配合<span>ERP</span>生产信息系统的使用，更能让精益生产准确无误。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>5</span>、强调新产品的创新能力
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　新兴的市场机制使得“大鱼吃小鱼”转变为“快鱼吃慢鱼”，因此对市场的快速反应是精益生产管理中对新产品创新能的最低要求，减化手续、认真负责、以客户为导向是创新的基本原则。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　现在我们重点的说明精益生产的几个关键点：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　任何企业生产活动最终都是以用户的需求为生产起点，以客户的服务为终点，追求原材料和成品的零库存。组织生产线依靠传递下一道工序向上一道需求的信息来提高效率。因此强调生产过程中生产单元之间的协调。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　精益生产管理要求在每一道工序进行过程中注意质量的检测与控制，及时发现质量问题，如果发现质量问题，只要情况允许，可以立即停止生产，直至解决问题，以免对不合格品对行无效加工。因此我们把最终的质量管理提前到生产过程的各个环节中，强调质量是生产出来而非检验出来的。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　每道工序是生产过程的重要环节，但是不能各自为战，要能上下相互协调沟通，随时调整节奏以配合其他工序的节奏，避免时间差引出的成本浪费，同时强调对上下游工序技能的熟练掌握，以便需要时能进行协助工作，保证生产任务的顺利进行。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　每道工序工作的基本氛围是信任，利益分担，相互监督，从而提高工作效率。强调团队协作的能力和技术的相互支持。
</p>','精益生产咨询','周炳','诺美','1398654716','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	<img alt="" src="/e/php/../attached/image/20140428/20140428033859_55142.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033859_53412.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033900_25174.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033901_76349.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033901_46436.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033901_59685.gif" /><img alt="" src="/e/php/../attached/image/20140428/20140428033902_76178.gif" />
</p>','服务流程','诺美','诺美','1398654694','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　农业类：</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>50000</span><span style="font-family:宋体;">吨农产品深加工项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　葡萄酒庄园项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年</span><span>2000</span><span style="font-family:宋体;">万吨现代物流运输中心项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　定兴县休闲食品包装产业园可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>500td</span><span style="font-family:宋体;">优质浮法玻璃生产线建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　鑫域国际文化体育公园建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　养猪场大型沼气工程建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　天麻种植及深加工建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　新建浓缩果汁和果浆生产建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>2500</span><span style="font-family:宋体;">吨不锈钢管项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国白酒制造项目投资可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　南漳县桔农发柑桔专业合作社</span><span>5</span><span style="font-family:宋体;">万吨柑桔储藏保鲜改扩建项目</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>2000</span><span style="font-family:宋体;">吨畜禽产品精深加工改扩建项目</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　富山居国际投资集团香港有限公司农产品深加工项目商业计划书</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>10</span><span style="font-family:宋体;">万亩优质冬枣基地建设项目商业计划书</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　湖北百味佳食品有限公司年产</span><span>4000</span><span style="font-family:宋体;">吨脱水疏菜项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　《草原豆思》动漫基地及主题乐园项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国味电子商务信息服务中心项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　环境监测及低碳节能示范工业园区建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　红豆杉种植及深加工建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　玫瑰种植及玫瑰精油系列产品项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>2.5</span><span style="font-family:宋体;">万吨浓香花生油扩建项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　黑龙江兰西干红葡萄酒生产项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　马铃薯产业技术转化基地可行性报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　新建浓缩果汁和果浆生产建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　化工专业</span> 
</p>
<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>6</span><span style="font-family:宋体;">万吨再生塑料项目可行性研究报告</span> 
</p>
<br />
&nbsp;<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>60</span><span style="font-family:宋体;">万吨润滑油加氢项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　包头市机械有限责任公司年加工各种重型汽车配件</span><span>20</span><span style="font-family:宋体;">万件建设项目可行性研究报告</span> 
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p>
	<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:宋体;">通辽电缆有限公司特种电缆及超高压电缆加工项目可行性研究报告</span>&nbsp;
</p>
<p>
	<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　北京力通高科技发展有限公司余热余压发电设备项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　湖南城陵矶临港产业新区数字化高频</span><span>X</span><span style="font-family:宋体;">射线机生产基地可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　岳阳威尔机器有限公司新型高效节能空气冷却结晶塔产业化示范项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　普利司通（惠州）合成橡胶有限公司干燥尾气蓄热燃烧设备（</span><span>RTO</span><span style="font-family:宋体;">）建设项目可行性研究报告</span> 
</p>
<br />
&nbsp;<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>5</span><span style="font-family:宋体;">万吨改质沥青项目可行性分析报告</span> 
</p>
<br />
&nbsp;<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　神华煤化股份有限公司</span><span>10</span><span style="font-family:宋体;">万吨∕年苯加氢项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　山西煤集团太焦化有限责任公司</span><span>150</span><span style="font-family:宋体;">万吨∕年焦化技术改造项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>1000</span><span style="font-family:宋体;">吨纳米氧化锌项目投资价值分析报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>1</span><span style="font-family:宋体;">万吨常压塑化法生产高品质再生胶建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　空气源热泵加热装置生产项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>PCB</span><span style="font-family:宋体;">板油墨项目投资价值分析报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　机械专业</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　定兴县高精机械制造产业园可行性研究报告</span> 
</p>
<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　定兴县高精机械制造产业园建设项目节能分析专项报告</span> 
</p>
<br />
&nbsp;<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">&nbsp;&nbsp;&nbsp; &nbsp;广西罗伊化工有限公司新建年产</span><span>3000</span><span style="font-family:宋体;">吨工业糠醛项目项目建议书</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 国瑞炭谷有限公司碳纤维及复合材料产业化基地建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 湖南兴旺液化气有限责任公司天然气（</span><span>LNG</span><span style="font-family:宋体;">、</span><span>CNG</span><span style="font-family:宋体;">、</span><span>LPG</span><span style="font-family:宋体;">）储配基地建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 </span><span style="font-family:宋体;">江华瑶族自治县姑山磷复肥有限责任公司年产五万吨钛白粉生产线可行性研究报告</span>&nbsp;
</p>
<p class="MsoNormal">
	<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 循环经济蚯蚓养殖及深加工项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 林西金易来砷业有限公司年产</span><span>2000</span><span style="font-family:宋体;">吨单质砷建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 贵州泰乐有限公司花草系列产品深加工项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 江西中科鑫星新材料有限公司年产8万吨超高分子</span><span style="font-family:宋体;">（</span><span>UHMWPE)</span><span style="font-family:宋体;">项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; </span><span>LED</span><span style="font-family:宋体;">芯片及封装项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 保定华建机械有限公司汽车配件生产建设项目节能分析专项报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　 年产万吨耐磨材料（钢球）、配重铁新建生产线项目</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　轻工专业</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp;</span><span style="font-family:宋体;">河北淀粉有限责任公司年加工</span><span>7000</span><span style="font-family:宋体;">吨马铃薯精淀粉建设项目可行性研究报告</span>&nbsp;
</p>
<p class="MsoNormal">
	<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 肉类加工有限责任公司年屠宰加工</span><span>20</span><span style="font-family:宋体;">万只羊建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　&nbsp;&nbsp;&nbsp; 辽宁河森木业有限公司年加工生产各种板材</span><span>1.31</span><span style="font-family:宋体;">万立方米建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　&nbsp;&nbsp;&nbsp; 宁夏宝迪食品有限公司年屠宰</span><span>30</span><span style="font-family:宋体;">万只羊</span><span>1</span><span style="font-family:宋体;">万头牛项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 山西翀森食品有限责任公司年产</span><span>25000</span><span style="font-family:宋体;">吨葵花籽仁技术改造项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp;&nbsp;贵州</span><span style="font-family:宋体;">仁怀市投资公司六千吨白酒仓储包装基地建设项目可研报告</span>
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;"></span>&nbsp;<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 贵州酒业有限公司五千吨白酒仓储包装技改建设项目可研报告</span> 
</p>
<br />
&nbsp;<br />
&nbsp;<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; </span><span>6</span><span style="font-family:宋体;">万吨</span><span>/</span><span style="font-family:宋体;">年无碱玻璃纤维池窑拉丝生产线（二期）可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　&nbsp; 新乡市思达纸业有限公司年产</span><span>2</span><span style="font-family:宋体;">万吨热敏纸生产项目</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　建筑专业</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　秦皇岛世源房地产开发有限公司思苑住宅小区建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　宁夏冶金物流园区建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span>
</p>
<p>
	<span style="font-family:宋体;">&nbsp;&nbsp;&nbsp; 年产</span><span>100</span><span style="font-family:宋体;">万吨高性能混凝土外加剂项目可行性报告</span>&nbsp;
</p>
<p>
	<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　武汉塔子湖城中村改造项目还建</span><span>H2</span><span style="font-family:宋体;">地块项目申请报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　武汉塔子湖城中村改造项目还建</span><span>H3</span><span style="font-family:宋体;">地块项目申请报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　武汉塔子湖城中村改造项目还建</span><span>H4</span><span style="font-family:宋体;">地块项目申请报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　生态小镇建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>3000</span><span style="font-family:宋体;">万</span><span>m2/a</span><span style="font-family:宋体;">纸面石膏板厂及建材大市场项目投资可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　水利工程专业</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　山东省南水北调配套工程辽河水库可行性研究报告</span> 
</p>
<p class="MsoNormal">
	&nbsp;
</p>
<p>
	<br />
&nbsp;<br />
&nbsp;<span style="font-family:宋体;">　 丰南市理务关镇水土保持项目二期工程可行性研究报告</span>
</p>
<p>
	<span style="font-family:宋体;"></span>&nbsp;<br />
&nbsp;
</p>
<p class="MsoNormal">
	<span style="font-family:宋体;">　　即墨市王村海堤</span><span>2009</span><span style="font-family:宋体;">年度加固工程可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　迁西县城段滦河河道综合治理工程可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　石家庄市区段防洪综合整治工程建设项目水资源论证报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>30</span><span style="font-family:宋体;">万套蠕墨铸铁柴油机缸体、缸盖项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>4</span><span style="font-family:宋体;">千辆</span><span>/</span><span style="font-family:宋体;">年煤炭专用环保型挂车生产线建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中大尺寸触摸屏生产线及电容式触摸屏生产线项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　</span><span>40</span><span style="font-family:宋体;">万吨／年水洗精选煤炭产品项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>5</span><span style="font-family:宋体;">万吨生物柴油生产可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　热镀锌项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　太阳能采暖</span><span>-</span><span style="font-family:宋体;">制冷</span><span>-</span><span style="font-family:宋体;">生活热水三联供系统商业计划书</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　超高亮度</span><span>LED</span><span style="font-family:宋体;">项目可行性研究报告报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　电热地膜投资项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　年产</span><span>160</span><span style="font-family:宋体;">万平米实木复合地板生产线项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　北京万隆汇洋家居建材市场有限公司天然气工程项目项目建议书</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　中国燕郊工美产业园——华粹苑建设项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　有源滤波电力节电器专利投资项目可行性研究报告</span> 
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　襄阳市大型货车驾驶证培训考试基地项目可行性研究报告</span> 
</p>
<br />
<br />','可行性研究报告','诺美','诺美','1398661267','nuomei','0','0','0','0','0','0','','0','','','0','','研究报告','','','0','','[{"image":"","show":""}]','')<{|}>

	目前生产的针状焦根据使用的原料不同，可分为<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%CA%AF%D3%CD">石油</a>系和煤系两类。石油系以美国为代表，煤系则以日本为代表。针状焦生产企业在全世界只有7家，集中在美国、英国、日本等几个国家。国际上针状焦生产技术主要被美国、英国、日本、德国等少数国家垄断。针状焦主要应用于电炉炼钢用石墨电极、锂电池、核电、航天等领域。2009年之后，随着针状焦各下游行业逐步复苏，全球针状焦需求量迅速回升。同期，全球针状焦行业巨头为操控价格而均未大幅扩张产能，从而使得全球针状焦市场供应持续紧张。2011年，全球针状焦供给缺口达19万吨，同比增长110%。而在全球最主要的针状焦消费国中，中国针状焦市场供应紧张情况最为显著。<br />
<br />
</div>
<p>
	由诺美咨询完成的《2012-2017年<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%D5%EB%D7%B4%BD%B9">针状焦</a>行业投资决策调研与趋势咨询报告》内容显示，我国针状焦生产技术落后，产量少，进口依赖度加大。因此需要对针状焦生产技术加大投入或引进技术进行研究开发，提高我国针状焦生产技术水平及扩大生产量。经过国内多年努力，针状焦实现了工业化生产，并用其成功生产出大规格超高功率石墨电极，在国内大型电弧炉使用效果良好。从多方面因素分析，我国针状焦需求将不断增长，但是，电炉炼钢电极消耗在不断降低，超高功率电炉每吨钢水消耗石墨电极约为2 kg左右，较好水平已经达到了1 kg。在一定程度上将影响针状焦需求的增长速度。由于国内产能不足，长期依赖进口，针状焦具有良好的市场前景。<br />
	<p>
		<br />
	</p>
</p>
<p style="text-indent:2em;">
	<br />
</p>
<div>
	近年来随着国内石墨电极行业产品结构持续优化，超高功率石墨电极比重不断增加，针状焦需求量增速明显加快。同期，由于中国针状焦生产企业数量少，技术基础薄弱，普遍存在稳定生产及产品质量控制方面的技术障碍，中国针状焦产能增长缓慢，针状焦产品供应缺口不断拉大。2009-2011年，中国针状焦需求量从16.1万吨增长到38.0万吨，年复合增长率达53.6%。同期，中国针状焦年产能仅从13.0万吨增长到13.2万吨。由于绝大部分新涉足针状焦业务企业存在诸多技术障碍，且行业内企业产能增长有限，预计未来中国针状焦市场供应紧张局面将会延续。预测到2015年我国的电炉钢比例将达到15％，以粗钢产量5.68亿吨为基数，则电炉钢的产量为0.852亿吨，需针状焦29.82万吨；2020年我国的电炉钢比例达到25％时，则需针状焦49.7万吨；由此可见，随着我国工业化进程的加快，对针状焦的需求量也在逐年增加。
</div>','焦','诺美咨询','诺美咨询','1399359801','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	煤炭机械行业竞争运行状况调研与盈利模式咨询报告-&nbsp;用途
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	·&nbsp;是行业新进入者了解市场现状、发掘投资机会、明确产品定位的必备调研资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ·&nbsp;此报告是煤炭机械行业企业中高层管理人员掌握市场行情、剖析竞争对手、洞悉行业发展趋势的有力参考资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ·&nbsp;是咨询公司、广告策划公司快速、深入地掌握行业现状和发展趋势的深度分析资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ·&nbsp;是私募基金公司、风险投资公司及其它投资机构摸清行业盈利能力和增长趋势，深入调查行业内重点企业的得力助手；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ·&nbsp;同时适用于其它需要对煤炭机械行业进行全面市场调研的机构或个人。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	煤炭机械行业竞争运行状况调研与盈利模式咨询报告-主要分析指标
</p>
<p style="text-indent:2em;">
	·&nbsp;全球煤炭机械市场发展形势&nbsp;<br />
&nbsp;&nbsp; &nbsp;·&nbsp;国内煤炭机械行业市场现状剖析&nbsp;<br />
&nbsp; &nbsp;&nbsp;·&nbsp;国内外主要企业竞争态势&nbsp;<br />
&nbsp; &nbsp;&nbsp;·&nbsp;外资企业在华运营情况&nbsp;<br />
&nbsp;&nbsp; &nbsp;·&nbsp;优势企业产销数据&nbsp;<br />
&nbsp;&nbsp;&nbsp; ·&nbsp;煤炭机械行业竞争格局&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;煤炭机械行业市场集中度分析&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;企业提高竞争力的途径&nbsp;<br />
&nbsp;&nbsp;&nbsp; ·&nbsp;煤炭机械行业盈利模式&nbsp;<br />
&nbsp;&nbsp;&nbsp;·&nbsp;优势企业经济指标分析&nbsp;<br />
&nbsp;&nbsp;&nbsp;·&nbsp;项目投资盈利前景预测
</p>
<p style="text-indent:2em;">
	煤炭机械行业竞争运行状况调研与盈利模式咨询报告-选择诺美咨询的理由
</p>
<p style="text-indent:2em;">
	·&nbsp;诺美咨询对煤炭机械行业项目进行全面且必要的前期市场调查与市场趋势预测；&nbsp;<br />
·&nbsp;采用国家统计局、工商局、税务局、海关总署、国务院发展研究中心、发改委、商务部等权威部门的数据；&nbsp;<br />
·&nbsp;长期聘请多名行业资深专家，对核心数据与观点进行反复论证；&nbsp;<br />
·&nbsp;结合行业历年供需关系变化规律，对我国煤炭机械行业发展趋势做出了定性与定量相结合的分析预测；&nbsp;<br />
·&nbsp;为企业制定发展战略、进行投资决策和企业经营管理提供权威、充分、可靠的决策依据与建议。
</p>','煤炭机械','诺美咨询','诺美咨询','1399359783','nuomei','0','0','0','0','0','0','','0','','','0','','诺美咨询','','','0','','[{"image":"","show":""}]','')<{|}>

	广义上的煤炭机械，按照煤矿开采的顺序，主要分为勘探设备、综合采掘设备、提升设备、洗选设备、<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%CC%BF">煤炭</a>安全设备和其他设备，以及露天矿设备等；狭义上的煤机指煤炭综合采掘设备，包括掘进机、采煤机、刮板输送机及液压支架，合称“三机一架”。
</div>
<div>
	由诺美咨询完成的《2012-2017年<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%CC%BF%BB%FA%D0%B5">煤炭机械</a>行业竞争运行状况调研与盈利模式咨询报告》内容显示，“十一五”期间，我国煤机装备制造业出现了全面高速发展的好势头，无论是行业规模、产业结构、技术水平，还是国际竞争力都有了大幅度的提升。2010年大中型煤炭机械制造企业资产总额达到1052.64亿元，完成工业总产值857.97亿元，实现销售收入891.21亿元，利润为68.25亿元。
</div>
<p style="text-indent:2em;">
	<br />
</p>
<div>
	“十二五”期间，在国家大力促进煤炭工业健康发展的政策背景下，受市场需求持续旺盛、煤矿结构调整以及国家实施大集团、大基地战略等积极因素驱动，我国煤机制造业将会维持快速发展态势，并有望迎来行业升级。预计到2015年，我国整个煤炭机械行业产值将达到1,499亿元，年均复合增长率达到22.8%；综采装备需求量将达到974亿元，平均复合增速超过20%。
</div>','诺美咨询','诺美咨询','诺美咨询','1399359820','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

　　3800万m2/a纸面石膏板厂项目节能评估报告<br />
　　定兴县高精机械制造产业园建设项目节能分析专项报告<br />
　　定兴县休闲食品包装产业园建设项目节能分析专项报告<br />
　　稀土分离生产线建设项目节能评估报告<br />
　　400万只肉鹅养殖加工项目节能评估报告<br />
　　年产100万吨混凝土外加剂项目节能登记表<br />
　　年产30万吨醇氨节能专篇<br />
　　<br />
　　3000t/d孰料水泥生产线及100万吨水泥粉磨工程项目节能评估报告<br />
　　利用煤炭开采废弃物年产50000吨腐植酸示范项目节能评估报告<br />
　　朝阳区霞光里5号、6号商业金融项目节能专篇<br />
　　<br />
　　秦皇岛秦龙国际实业有限公司年产200万吨球团矿项目节能评估报告<br />
　　<br />
　　秦皇岛股份有限公司3.5万吨级石化码头危险货物港口节能评估报告<br />
　　<br />
　　分离生产线建设项目节能评估报告<br />
　　<br />
　<br />
　　张家港联丰线缆科技有限公司高强度、低松弛预应力钢绞线项目节能评估报告<br />
　　<br />
　　保定华建机械有限公司汽车配件生产建设项目节能评估报告<br />
　　3800万m2/a纸面石膏板厂项目节能评估报告<br />
　　定兴县高精机械制造产业园建设项目节能分析专项报告<br />
　　定兴县休闲食品包装产业园建设项目节能分析专项报告<br />
　　稀土分离生产线建设项目节能评估报告<br />
　　400万只肉鹅养殖加工项目节能评估报告<br />
　　年产100万吨混凝土外加剂项目节能登记表<br />
　　年产30万吨醇氨节能专篇<br />
　　<br />
　　3000t/d孰料水泥生产线及100万吨水泥粉磨工程项目节能评估报告<br />
　　利用煤炭开采废弃物年产50000吨腐植酸示范项目节能评估报告<br />
　　朝阳区霞光里5号、6号商业金融项目节能专篇<br />
　　<br />
　　华锐风电科技有限公司内风电产业基地项目能评报告<br />
　　秦皇岛秦龙国际实业有限公司年产200万吨球团矿项目节能评估报告<br />
　　杭锦公司3000吨多晶硅项目节能评估报<br />
　　秦皇岛海龙股份有限公司2.5万吨级石化码头危险货物港口节能评估报告<br />
　　凌峡化工有限责任公司440吨P507生产线和年加工5000吨混合碳酸稀土分离生产线建设项目节能评估报告<br />
　　分离生产线建设项目节能评估报告<br />
　　中国航天科工集团公司 某研究院y-10高强纤维产业项目能源评估报告<br />
　　万利丰鹅业有限公司300万只肉鹅养殖加工项目节能评估报告<br />
　　张家港联丰线缆科技有限公司高强度、低松弛预应力钢绞线项目节能评估报告<br />
　　<br />
　　<br />
　　陕西省天然气股份有限公司白水县城市气化工程节能评估报告<br />
　　拓福（内蒙古）化工发展有限公司30kt/a无水氟酸项目节能评估<br />
　　<br />
　　<br />
　　呼伦贝尔煤化工有限公司30万吨年合成氨52万吨年尿素工程节能评估报告<br />
　　<br />
　　<br />
　　内蒙古化工有限公司年产6万吨聚甲醛项目节能评估<br />
　　 <br />','节能评估报告','诺美','诺美','1398661275','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	自2008年山西率先进行煤炭资源重组以来，陕西、河南、内蒙古等煤炭资源大省相继效仿山西省进行<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%CC%BF">煤炭</a>资源改革，加上中央和地方政府对煤矿安全和生产效率的要求不断提高，对国内煤炭机械设备市场需求产生了巨大的刺激效应。以鸡西煤机、太原矿山、西安煤机、天地上海分公司为代表的中国采煤机企业这两年均取得较好的经济效益。
</div>
<div>
	由诺美咨询完成的《2012-2017年<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%B2%C9%C3%BA%BB%FA">采煤机</a>行业投资决策调研与趋势咨询报告》内容显示，目前国内采煤机行业进入快速发展时期。国内采煤机生产企业，尤其是少数领先企业通过自主创新，加大新产品的研发力度，国产产品的品质和市场份额大幅提升，逐步打破了高端产品基本依赖进口的格局。我国采煤机市场潜力巨大，未来还将吸引众多的工程机械等企业进入，冲击现有采煤机的市场竞争格局。
</div>
<div>
	2011年，我国采煤机产销量约1000多台，产能达到1500台左右。“十二五”我国煤机行业发展将更为迅猛，目前产能已接近饱和，如果再加上进入中国市场的外资煤机企业的产能，我国煤机市场将在未来5年面临严重的产能过剩。
</div>
<div>
	从2012年4月份开始，中国煤炭市场开始出现大量滞销现象，煤价一度连续13周下跌，导致煤矿纷纷收缩产能；同时，钢铁行业遇冷也影响了焦炭行业的生产，这些因素都在一定程度上降低了市场对采煤机产品的需求。采煤机企业开始努力寻找“过冬”办法，并将目光瞄准了国际市场。
</div>
<p style="text-indent:2em;">
	<br />
</p>
<div>
	“十二五”期间全国煤炭市场需求旺盛，从工业生产和投资增速看，当前拉动煤炭需求增长的动力依然强劲，主要耗煤行业均保持较快增长，另外，大型煤炭企业的形成，加大行业的固定资产投资，从而给行业带来新的订单需求，预计到2015年我国采煤机市场规模将达到100亿元。
</div>','采煤机','诺美咨询','诺美咨询','1399359833','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	报告提纲
</p>
<p style="text-indent:2em;">
	第一章 煤炭项目投资价值分析报告简介
</p>
<p style="text-indent:2em;">
	1.1项目概况
</p>
<p style="text-indent:2em;">
	1.1.1 项目名称
</p>
<p style="text-indent:2em;">
	1.1.2 项目发起方
</p>
<p style="text-indent:2em;">
	1.1.3 项目法定代表
</p>
<p style="text-indent:2em;">
	1.1.4 项目公司介绍
</p>
<p style="text-indent:2em;">
	1.1.5 项目公司管理层介绍
</p>
<p style="text-indent:2em;">
	1.1.6 项目背景
</p>
<p style="text-indent:2em;">
	1.1.7 项目公司业务简介
</p>
<p style="text-indent:2em;">
	1.1.8 项目融资概况
</p>
<p style="text-indent:2em;">
	1.2 项目公司发展
</p>
<p style="text-indent:2em;">
	1.2.1 公司发展整体规划
</p>
<p style="text-indent:2em;">
	1.2.2 项目公司战略与战术
</p>
<p style="text-indent:2em;">
	第二章 煤炭项目行业发展
</p>
<p style="text-indent:2em;">
	2.1外部投资环境分析 ― pest分析
</p>
<p style="text-indent:2em;">
	2.1.1 政治环境
</p>
<p style="text-indent:2em;">
	2.1.2 经济环境
</p>
<p style="text-indent:2em;">
	2.1.3技术环境
</p>
<p style="text-indent:2em;">
	2.1.4社会环境
</p>
<p style="text-indent:2em;">
	2.2市场分析
</p>
<p style="text-indent:2em;">
	2.2.1行业的现状
</p>
<p style="text-indent:2em;">
	2.2.2行业发展
</p>
<p style="text-indent:2em;">
	2.3市场分析
</p>
<p style="text-indent:2em;">
	2.3.1市场的现状
</p>
<p style="text-indent:2em;">
	2.3.2市场的问题
</p>
<p style="text-indent:2em;">
	2.3.3市场的趋势
</p>
<p style="text-indent:2em;">
	第三章 煤炭项目市场战略
</p>
<p style="text-indent:2em;">
	3.1 swot分析
</p>
<p style="text-indent:2em;">
	3.1.1 项目优势
</p>
<p style="text-indent:2em;">
	3.1.2项目劣势
</p>
<p style="text-indent:2em;">
	3.1.3 项目机会
</p>
<p style="text-indent:2em;">
	3.1.4项目威胁
</p>
<p style="text-indent:2em;">
	3.2 市场战略选择
</p>
<p style="text-indent:2em;">
	3.3 市场定位
</p>
<p style="text-indent:2em;">
	3.4 营销策略
</p>
<p style="text-indent:2em;">
	3.4.1 价格策略
</p>
<p style="text-indent:2em;">
	3.4.2 销售执行
</p>
<p style="text-indent:2em;">
	第四章 煤炭项目风险控制
</p>
<p style="text-indent:2em;">
	4.1政策法律风险及其对策
</p>
<p style="text-indent:2em;">
	4.2 市场风险及其对策
</p>
<p style="text-indent:2em;">
	4.3 经营风险及其对策
</p>
<p style="text-indent:2em;">
	4.4 财务风险及其对策
</p>
<p style="text-indent:2em;">
	第五章 煤炭项目财务评价
</p>
<p style="text-indent:2em;">
	5.1资金的筹集与使用
</p>
<p style="text-indent:2em;">
	5.2财务预测
</p>
<p style="text-indent:2em;">
	5.2.1 基本假设
</p>
<p style="text-indent:2em;">
	5.2.2 主营业务收入预测
</p>
<p style="text-indent:2em;">
	5.2.3 成本及费用估算
</p>
<p style="text-indent:2em;">
	5.2.4 利润预测
</p>
<p style="text-indent:2em;">
	5.2.5 静态投资分析
</p>
<p style="text-indent:2em;">
	5.2.6 动态分析
</p>
<p style="text-indent:2em;">
	5.2.7 动态分析财务指标
</p>
<p style="text-indent:2em;">
	5.3 项目财务预测结论
</p>
<p style="text-indent:2em;">
	第六章 煤炭项目价值评估
</p>
<p style="text-indent:2em;">
	6.1 项目评估
</p>
<p style="text-indent:2em;">
	6.2 社会效益
</p>
<p style="text-indent:2em;">
	6.3 经济效益
</p>
<p style="text-indent:2em;">
	6.4 煤炭项目投资价值分析报告结论
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	第七章 煤炭项目投资价值分析报告附件
</p>','煤炭','诺美咨询','诺美咨询','1399359801','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　尊敬的各级领导、社会同仁、朋友们：</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　多年的艰难创业发展历程，我们诺美咨询公司能有如今的规模和业绩，离不开政府领导、业务精英、新闻媒体和广大朋友始终如一的支持和关注，还有公司所有员工的辛勤付出。然而，万物创新的今天，我们不敢停下脚步；智慧联盟的时代，我们携手同行。</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　公司由小到大的成长史与我们伟大的共产党的奋斗史可以说是相似的——前景光明，但道路极其曲折。我们公司为此走了很多弯路，也交了不少学费，但我相信人生处处是考场，人生事事是考试，人生人人为我师，就凭着一股子爱拼才会赢的劲，我在不断学习和不断摸索中曲折前进。</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　让我倍感荣幸的是，我并不是一个人在战斗。</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　这期间，我有幸结识了数以千计咨询行业的知名人士、友好合作的商业伙伴，还有一批不抛弃、不放弃的员工。他们，是我最大的财富，也是支撑我勇往直前的源动力。借此机会，我谨致以诚挚的谢意。</span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span></span>
</p>
<br />
<br />
<p class="MsoNormal">
	<span style="font-family:宋体;">　　一个人的成功不在于个人财富的最大化，而在于创造社会价值的多少。展望未来，我将坚持以企业为平台，致力于把诺美咨询打造成中国优秀的咨询企业。以诺美咨询的不断壮大，报效国家、回报社会、回报员工，实现自我价值的最大化。</span>
</p>
<br />
<br />','','','','1398661260','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	<p class="MsoNormal">
		　　概念
	</p>
	<p class="MsoNormal">
		　　所谓产业规划，是指综合运用各种理论分析工具，从当地实际状况出发，充分考虑国际国内及区域经济发展态势，对当地产业发展的定位、产业体系、产业结构、产业链、空间布局、经济社会环境影响、实施方案等做出一年以上的科学计划。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　现状
	</p>
	<p class="MsoNormal">
		　　一般地，科研机构或规划部门在做产业规划时，包括现状分析、发展战略、产业定位、产业体系、产业链条、建议项目、环境影响、实施方案等。但在人们心目中，多重视空间规划，强调规划者要有甲级或乙级资质，这其实是不了解产业规划是干什么的。一个地区经济发展，其核心是产业，要解决做什么、为什么、怎么做三个问题。产业的空间布局只是产业在区域内的分布设计，是“怎么做”这一环节的部分内容。有资质的规划单位，往往是从工程、建筑等角度出发，是对产业规划实施过程中工程性内容的设计，要承担因设计不合理而导致的风险责任，因此必需有资质。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　核心
	</p>
	<p class="MsoNormal">
		　　正如行业对一个人的发展的重要性一样，产业规划一定要告诉当地做什么产业，从国际国内产业发展趋势、市场容量、技术水平等多方面论证：必需而且只有做这些产业才有前途。方向是至关重要的。自古云：不能只埋头拉车，而且必需抬头看路。方向错了，越努力就错得越远。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　误区
	</p>
	<p class="MsoNormal">
		　　各地政府部门尤其是县级以下，许多工作人员认为：我们长期在当地工作，太熟悉当地情况了，要问我们应该干什么，我们最有发言权；因而对产业规划不够重视。事实上，长期的理所当然的发展并没有取得突破，也许正是产业规划的失误。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　在当前经济挂帅的政府工作中，产业规划尽管已从最初的个案，发展到今天日益受到重视。但长期以来，由于缺乏规划的体系结构的支撑，各地区编制的产业规划对理清产业发展思路、明确产业布局、建立实施措施等起到积极的作用的同时，也随着产业规划实践的逐渐深入而暴露出不少问题。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　<span>1</span>、产业规划的地位受到质疑。产业规划在时序上是先于城市规划，为其提供思路和依据的战略性规划，还是后于城市规划，为其提供落实保障的策略性规划，始终未有定论。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　<span>2</span>、产业规划的深度不够。很多产业规划在编制方法上只是对城市中的产业布局进行描述，或对产业发展现状进行提炼汇总，规划的技术（或专业）空间狭窄，缺乏对区域发展、产业发展等的深刻认识，导致规划内容比较单一，发挥的作用有限。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　<span>3</span>、是产业规划的操作性不强。由于产业规划的编制团队水平参差不平，对当地实际情况了解不透彻，对产业发展中的问题和障碍认识不足，导致产业规划与城市规划、土地利用规划等空间规划的衔接产生矛盾，产业规划的思路和布局难以落地。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　规划见解
	</p>
	<p class="MsoNormal">
		　　产业规划对市县经济发展具有不可取代的重要作用，因此并非随便任何人都可以去设计，一定要寻求具有较强理论水平、能够掌握国际国内产业发展现状及趋势的专家去做，而不是一味地从工程实施角度去寻求有工程规划资质的建设规划单位去做。更为重要的是，要注意专家的团队性，因为产业规划涉及到许多不同的产业，需要众多专家共同完成，而不是简单地交给某一个教授即可。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　地方投资
	</p>
	<p class="MsoNormal">
		　　如今，地方版产业规划密集出台，涉及投资额动辄上万亿元。市场人士指出，由地方政府主导的新一轮投资潮来临。据不完全统计，<span>7</span>月以来已公布的地方投资计划涉及金额约<span>7</span>万亿元。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　服务领域
	</p>
	<p class="MsoNormal">
		　　（<span>1</span>）区域产业规划：在明确区域整体战略基础上，对区域产业结构调整、产业发展布局进行整体布局和规划，同时注重协调好土地开发、生态保护、民生问题、基础设施建设等各方面关系。
	</p>
	<p class="MsoNormal">
		　　（<span>2</span>）专项产业规划：在明确区域产业规划的前提下，为主导产业、跟随产业和支撑产业的发展进行详细规划，理清产业的发展次序，解决产业聚集的关键问题，形成产业集群所必须的产业生态圈。
	</p>
	<p class="MsoNormal">
		　　（<span>3</span>）产业园区规划：在明确区域产业规划的前提下，为主导产业、跟随产业和支撑产业的发展规划若干专业的产业园区。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　方法
	</p>
	<p class="MsoNormal">
		　　城市规划过程中，产业规划有其规范方法：首先进行经济发展阶段和产业结构分析，以明确当前产业问题和预测未来发展方向。其次根据全球、区域或周边城市产业转移、区域政策和本地产业特征等，分析产业发展面临的机遇、挑战及优劣势。再次，针对现状和发展条件，提出产业发展的总体战略，如结构升级、集群化、高技术化、区域协调
分工等，并按一定标准确定优势<span>(</span>或主导<span>)</span>产业及其战略。最后，根据现状产业分布和“发展连片、企业进园”等原则，确定“点、轴、带、圈、片、区”的总体布局，或提出优势产业布局意向、明确各区区产业类型及规模：有些则将产业布局任务交给空间部分。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　总体规划
	</p>
	<p class="MsoNormal">
		　　概述
	</p>
	<p class="MsoNormal">
		　　产业规划就是对产业发展布局，三大产业结构调整进行整体布置和规划。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　研究内容
	</p>
	<p class="MsoNormal">
		　　主要包括现状分析、发展战略、产业定位与布局、重点建设项目、政策体系等内容。
	</p>
	<p class="MsoNormal">
		　　产业研究是指以三大产业中各产业为研究对象，通过系统分析和研究其内外环境以及相关因素，对产业现状进行深入的剖析，对产业未来提出科学的预测。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　研究方法
	</p>
	<p class="MsoNormal">
		　　第一部分
产业发展现状与趋势
	</p>
	<p class="MsoNormal">
		　　一、国际<span>XX</span>产业发展现状与趋势
	</p>
	<p class="MsoNormal">
		　　二、国内<span>XX</span>产业发展现状与趋势
	</p>
	<p class="MsoNormal">
		　　第二部分
当地产业发展现状与基础
	</p>
	<p class="MsoNormal">
		　　一、当地产业发展概况
	</p>
	<p class="MsoNormal">
		　　<span>1</span>、行业发展现状
	</p>
	<p class="MsoNormal">
		　　<span>2</span>、重点企业发展现状
	</p>
	<p class="MsoNormal">
		　　二、当地产业发展条件
	</p>
	<p class="MsoNormal">
		　　<span>1</span>、区位条件
	</p>
	<p class="MsoNormal">
		　　<span>2</span>、资源条件
	</p>
	<p class="MsoNormal">
		　　<span>3</span>、产业配套条件
	</p>
	<p class="MsoNormal">
		　　<span>4</span>、其他条件
	</p>
	<p class="MsoNormal">
		　　三、当地产业发展环境现状
	</p>
	<p class="MsoNormal">
		　　<span>1</span>、政策环境
	</p>
	<p class="MsoNormal">
		　　<span>2</span>、市场环境
	</p>
	<p class="MsoNormal">
		　　<span>3</span>、融资环境
	</p>
	<p class="MsoNormal">
		　　<span>4</span>、人才环境
	</p>
	<p class="MsoNormal">
		　　四、当地产业发展存在的问题
	</p>
	<p class="MsoNormal">
		　　第三部分
当地产业发展思路和目标
	</p>
	<p class="MsoNormal">
		　　一、指导思想
	</p>
	<p class="MsoNormal">
		　　二、产业定位
	</p>
	<p class="MsoNormal">
		　　三、发展目标
	</p>
	<p class="MsoNormal">
		　　第四部分
产业发展导向和产业链设计
	</p>
	<p class="MsoNormal">
		　　一、核心产业链及产品
	</p>
	<p class="MsoNormal">
		　　二、配套产业链和产品
	</p>
	<p class="MsoNormal">
		　　三、相关产业链与产品
	</p>
	<p class="MsoNormal">
		　　第五部分
产业发展空间布局
	</p>
	<p class="MsoNormal">
		　　一、产业发展的核心产业基地
	</p>
	<p class="MsoNormal">
		　　二、产业发展的重要拓展区
	</p>
	<p class="MsoNormal">
		　　第六部分
产业发展的政策保障
	</p>
	<p class="MsoNormal">
		　　一、组织保障
	</p>
	<p class="MsoNormal">
		　　二、招商引资
	</p>
	<p class="MsoNormal">
		　　三、政策扶持
	</p>
	<p class="MsoNormal">
		　　四、需要注意的问题
	</p>
	<p class="MsoNormal">
		　　第七部分
产业发展的重大培育工程
	</p>
	<p class="MsoNormal">
		　　一、产业基地的创建工程
	</p>
	<p class="MsoNormal">
		　　二、龙头企业的培育工程
	</p>
	<p class="MsoNormal">
		　　三、创新能力的提升工程
	</p>
	<p class="MsoNormal">
		　　四、合作平台的搭建工程
	</p>
	<p class="MsoNormal">
		　　五、推广运用的示范工程
	</p>
	<p class="MsoNormal">
		　　第八部分
附录
	</p>
	<p class="MsoNormal">
		　　附录<span>1</span>：当地现有企业基本状况
	</p>
	<p class="MsoNormal">
		　　附录<span>2</span>：主产业链概述
	</p>
	<p class="MsoNormal">
		　　附录<span>3</span>：产业发展目录
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　规划思路
	</p>
	<p class="MsoNormal">
		　　第一章
产业园区规划的背景
	</p>
	<p class="MsoNormal">
		　　主要包括目的、意义以及产业园区发展的有利条件等。
	</p>
	<p class="MsoNormal">
		　　第二章
产业园区的发展定位
	</p>
	<p class="MsoNormal">
		　　主要包括产业园区的区位选择、功能定位、产业定位等。
	</p>
	<p class="MsoNormal">
		　　第三章产业园区的规划布局
	</p>
	<p class="MsoNormal">
		　　主要包括产业园区的用地布局、各功能区的建设规模与产业布局。
	</p>
	<p class="MsoNormal">
		　　第四章
产业园区的投资成本与收益估算
	</p>
	<p class="MsoNormal">
		　　主要包括产业园区总投资、分阶段投资、成本估算、产值、销售收入及销售税金估算和社会效益、生态效益评估。
	</p>
	<p class="MsoNormal">
		　　第五章
产业园区适应性评价指标体系
	</p>
	<p class="MsoNormal">
		　　主要包括目标适应性指标、经济适应性指标以及社会适应性指标等。
	</p>
	<p class="MsoNormal">
		　　第六章
产业园区招商引资方案
	</p>
	<p class="MsoNormal">
		　　主要包括产业园区的品牌推广策略、团队管理及运作模式、招商引资目标企业推介等。
	</p>
<br />
</div>','产业规划','诺美咨询','诺美咨询','1398672250','nuomei','0','0','0','0','0','0','','0','','','0','','产业规划','','','0','','[{"image":"","show":""}]','')<{|}>

<img src="/e/attached/image/20140428/20140428083900_63475.jpg" alt="" /><br />','服务特色','诺美咨询','诺美咨询','1398672265','nuomei','0','1','0','0','0','0','upload/2014-05/08/201405080941_4605.jpg','0','','','0','','','','','0','','null','')<{|}>

	<br />
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	产业园规划设计是介于单体设计与规划设计之间，包含着单体设计和规划设计的、一个有特定需求的设计，是建筑设计与规划设计的充分融合。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	在做园区规划及建筑方案的设计时，提升设计的品质是考虑的首要因素，同时，还要注重生态环境、历史文脉、人们新的审美观念，以及人们对建筑环境质量和舒适度越来越高的要求。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	在设计中还要注意不能过分的去工业化，或过分的公用建筑化，导致建筑材料以及建筑空间的浪费。设计时应对企业文化，所处的地域特点，及产品的特性有充分深入的了解，注意工艺的需求,并在设计中予以体现。只有掌握好规划与建筑设计两个方面的侧重点，并将其灵活地加以融合使用，才能创造出环境良好、科技领先、人文和谐的兵器工业园区。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	<strong>方案概况</strong>：
</p>
<div style="margin-left:0.4in;vertical-align:baseline;">
	地块南北狭长，整个产业园区分为办公会展、科研开发、生产运营、后勤服务四大部分。
</div>
<div style="margin-left:0.4in;vertical-align:baseline;">
	<br />
<!--[endif]-->
</div>
<div style="margin-left:0.4in;vertical-align:baseline;">
	办公会展及主入口靠近基地南侧布置面对<span style="line-height:1.5;">外部绿化带和主干道望江西路，具有便捷</span><span style="line-height:1.5;">的可达性及良好的景观、朝向。</span> 
</div>
<p style="margin-left:0.4in;text-indent:2em;vertical-align:baseline;">
	<span style="line-height:1.5;">宽广的绿化带，以自然坡地和</span><span style="line-height:1.5;">高大乔木为主，良好地削弱了</span><span style="line-height:1.5;">生产车间带来的噪声干扰，同</span><span style="line-height:1.5;">时为员工提供一个安静舒适的</span><span style="line-height:1.5;">休憩空间。</span> 
</p>
<p style="margin-left:0.4in;text-indent:2em;vertical-align:baseline;">
	<span style="line-height:1.5;"><br />
</span> 
</p>
<p style="margin-left:0.4in;text-indent:2em;vertical-align:baseline;">
	<span style="line-height:1.5;"><br />
</span> 
</p>
<p style="text-indent:2em;">
	<br />
</p>','合肥美亚光电产业园','互联网','互联网','1398672244','nuomei','0','0','0','0','0','0','upload/2014-05/06/201405061004_3060.jpg','0','','','0','','','产业园规划设计是介于单体设计与规划设计之间、一个有特定需求的设计，是建筑设计与规划设计的充分融合','','0','','null','')<{|}>

	　　价格方面，一季度商品房销售均价<span>9194</span>元<span>/</span>平方米，同比增长<span>3.0%</span>；商品住宅销售均价<span>8517</span>元<span>/</span>平方米，增长<span>0.2%</span>。土地购置方面，一季度开发企业土地购置面积<span>278.10</span>万平方米，为近五年同期最低水平，同比减少<span>27.8%</span>，降幅较<span>1-2</span>月扩大<span>17.0</span>个百分点。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　从单月看，<span>3</span>月份全省商品房销售面积<span>719.51</span>万平方米，同比下降<span>7.8%</span>；销售金额<span>631.79</span>亿元，下降<span>10.4%</span>。尽管销量同比小幅回落，但与近五年数据相比，不论是<span>1-2</span>月还是<span>3</span>月的销售量，都处于次高水平。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　价格方面，一季度商品房销售均价<span>9194</span>元<span>/</span>平方米，同比增长<span>3.0%</span>；商品住宅销售均价<span>8517</span>元<span>/</span>平方米，增长<span>0.2%</span>。但与<span>1-2</span>月相比，商品房均价下降<span>318</span>元<span>/</span>平方米，商品住宅均价下降<span>206</span>元<span>/</span>平方米。总体来看，房价涨幅有不同程度的下滑，但仍处于盘整阶段。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　房企资金回笼压力大此外，一季度全省房地产开发企业到位资金总计<span>2497.57</span>亿元，同比增长<span>13.0%</span>，增速比<span>1-2</span>月大幅下滑<span>14.2</span>个百分点，较去年同期下滑<span>14.9</span>个百分点。自筹资金占比<span>29.17%</span>，同比提高<span>2.62</span>个百分点，较去年全年提高<span>2.35</span>个百分点。显示房企的资金压力正在加大，资金状况明显不如去年充裕。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　尤其值得注意的是，今年来各商业银行纷纷取消住房按揭贷款利率优惠甚至上浮基准利率，而且审批时间大幅拉长，放贷进度放缓。人民银行数据显示，一季度新增个人购房贷款<span>420.39</span>亿元，同比少增<span>131.15</span>亿元，降幅为<span>23.8%</span>。而从近年数据来看，房企的资金来源中，销售回笼资金为最主要来源，占比基本在<span>40%</span>以上。因而住房按揭的持续缩量大大增加了房企资金回笼的压力。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　另一方面，<span>2013</span>年新开工面积创历史新高，若按八成在今年达到预售计算，则今年批准预售面积可达<span>11400</span>万平方米左右，而一季度批准预售面积仅<span>2000</span>万平方米，这意味着后市可能迎来供应高峰。显示房企的去化压力未来有可能加大。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　不过从分区域供求关系看，广州、深圳两个中心城市销售率达<span>88.9%</span>，延续着过去几年的较高水平，销售率高于全省平均水平<span>18.1</span>个百分点；广深以外的珠三角城市和山区的销售率基本与全省平均水平相当；但粤东和粤西的销售率仅为<span>49.4%</span>、<span>48.4%</span>，低于全省平均水平<span>20</span>多个百分点。这说明东西两翼供过于求，房价下行压力较大。
</p>','商品房','','','1398675922','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	　　设计单位、建筑专家、房地产开发商、建材部品企业都是保证建筑品质的关键角色。<span>4</span>月<span>18</span>日，由中国房地产采购平台、新浪地产<span>(</span>微博<span>)</span>主办，宏源防水协办的“责任地产新标准，解码品质人居”沙龙举办。会上集结了建筑个关键角色为保证建筑安全，提升建筑品质建言献策。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　解决建筑品质现实问题需从多方发力水是无孔不入<span>,</span>做好建筑物地下防水是一项系统工程<span>,</span>从政策、设计、材料、施工<span>,</span>一直到管理<span>,</span>需要五位一体<span>,</span>缺一个都可能导致漏水。防水工程应该因地制宜，按需选材，
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　第一是政策方面，低价中标。抢工期现象严重，突破价格标准，违反科学规律，品质很难保证。另外讲求标新立异，重视建筑外观而不重视内部结构，也使得防水长期被忽视。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　第二是设计方面，设计单位针对建筑防水的设计，都多按照图集和规范，并没有具体问题具体分析。针对漏水节点没有给出合理意见。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　第三是材料方面，行业门槛低，一些企业生产非标产品，假冒伪劣产品充斥市场。也由于一些单位不负责任的低价中标，使得以次充好的产品流进工地。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　第四是施工方面，施工非常浮躁，目前我国没有真正的防水施工顾问，防水施工人员没有经过专业训练，也没有长期的实践，施工技术水平低下。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　第五维护管理不到位。做好的防水层在后去其他工序的施工中被破坏，引发漏水严重。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　宏源防水作为市场的第一线，体会最为深刻。也在长期的实践经验中，总结出一套行之有效的解决方案。目前开发商对防水重视不够，体主要现在不愿意投入，国外防水造价一般占到房屋总造价<span>5%</span>到<span>8%</span>的造价，国内可能只有<span>2%</span>，甚至<span>1%</span>，不断的压价的问题，造成了防水是老大难的问题。另外防水行业各样企业多达<span>3000</span>多家，能够满足市场的需求和提供全面解决方案的厂家却比较少，这些是行业的现状和问题。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　宏源防水从这几个方面提供一个适合的解决方案。建筑的形式是多变的，环境也是多样的，厂家要有实用丰富的防水材料供选择，仅靠一两种防水材料是不能解决问题的。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在生产方面，采购方面要把好，有相应的原材料的标准，对采购的供应商也要进行评审，入场进行严格的检测。具有施工资质的企业，进行施工方案的优化，如果我们自己施工的话，我们就要保证施工的方案、设计的理念得到切实的执行。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　战略技术的储备跟设计院加强设计的沟通，跟总包加强衔接的工作和施工的交流。解决防水问题最好的办法是与房企结成战略合作，包工包料，便于专业的防水企业在具体执行中对防水细节的把控。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　品质是在建筑质量与安全基础上的提升建筑品质是一个宽泛的命题，保证建筑安全、使用寿命是品质的基础，更需要提升到舒适性、科技化、人性化的人居环境。楼倒倒、屋漏漏的事件时有发生，一再提及的建筑品质，其实是在保证对建筑的最低要求。单针对房屋漏水而言，建筑物的寿命和防水有直接的关系，尤其是地下室。地下室因为漏水，钢筋产生腐蚀，然后钢筋膨胀，混凝土裂缝，严重损失建筑寿命。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　中国防水材料工业协会专家委员会副主任张玉玲认同防水会影响建筑寿命的说法，但是她认为，渗漏水对建筑的危害是长时间，对建筑寿命有影响，不是唯一的原因。结构的强度不够是最大的问题。目前建筑界太浮躁，设计是否合理，材料是否质优，施工是否精益求精，管理是否规范，都是影响建筑寿命的综合因素。我们国家的建筑寿命是<span>25</span>年到<span>30</span>年的水平，跟发达国家相比差距很大。改革开放后，为了解决老百姓住的问题，很多地方确实建造了一批快餐式的房子。由于规范标准体系跟不上建设速度，加上技术和资金方面的原因，建筑工程质量很难得到保证。目前中国不缺少先进的技术，也不缺少先进的材料，而是缺乏责任心。参与建筑的各方都没有向着百年建筑的目标努力，是建筑问题层出的原因。另外建筑方专业度不够，对各建材行业的技术水平和价格体系没有专业的认识。所以会出现低价中标的情况。比如建筑用的涂料、防水、门窗等系统，单独来说都是很好的产品，但是在建筑上结合到一起，容易出问题。在集成的过程中，责任心和专业度都没有达到。
</p>','','','','1398675906','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	　　共有产权房的最大问题并不在此，而是在于房地产市场行情一旦开始下行，还有多少人愿意购买共有产权房？尽管政府在推出共有产权房时宣称是为了解决中低收入阶层的住房问题，但公共租赁房和廉租房也可以解决中低收入阶层的住房，为何却没有获得市场的响应？很重要的一个原因是后两者只是单纯提供“居住”，居住者由于不是所有者，就无法获得房价上涨的收益。而在当下中国，房价上涨是无数国人致富的原因，正是基于此，很多中低收入阶层也想驶上房价上涨的致富快车道，而共有产权房毫无疑问就满足了这种想象。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　住建部日前在北京召开了一场共有产权房试点座谈会，会议确定北京、上海、深圳、成都、黄石、淮安<span>6</span>个城市明确被列为全国共有产权房试点城市。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　何为“共有产权房”，是指中低收入住房困难家庭在购房时，可按个人与政府的出资比例，共同拥有房屋产权。共有产权房自<span>2007</span>年起在江苏省淮安市进行试点，该模式已经在江苏省其他地区获得了推广。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　为什么这些房子需要房屋所有者和地方政府共有产权？很重要的一个原因是地方政府在出让土地的时候，让渡部分土地出让金，甚至通过一些税费减免的方式来降低建造成本。在以往的模式下，如果房子的所有权全都归于购房者，实际上就相当于让这部分购房者占了其他购房者的便宜。自从<span>1998</span>年房改以后，各地建设的经济适用房很大程度上都是获得了各种各样的收税减免，但是最后的收益却归于房产所有人，无论是对政府还是对其他纳税人，多少都是不公平的。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　为什么政府要摒弃经济适用房而推出共有产权房试点？除了政府没法享受房地产市场上涨所带来的收益外，更为重要的一个理由是此前政府在经济适用房和公共租赁房的试验并不成功所致。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在过去几年中，经济适用房之所以饱受诟病，一个很重要的原因就是无法挑选出适合的申请者，经济适用房往往流向与权力接近的居民。近年来不时传来经济适用房为权势者侵占的新闻，最典型的莫过于郑州二七区房管局原局长翟振锋一家<span>(8</span>个身份证）在经适房项目——兰亭名苑小区拥有<span>20</span>套住房。也正是如此，从<span>2012</span>年起，广东、江西、河南等省已经开始停止建设经济适用房。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　但停止经济适用房也带来了一些问题，那就是“夹心层”的住房没法得到解决。在此种背景下，很多地方推行公共租赁房——政府建造一大批以租赁而不是以出售为目的的公共住房，从而解决中低收入阶层的住房问题。尽管公租房解决了这些人的居住问题，但同样产生了一个问题：政府用于建设住宅的成本过于巨大，每年的租金收入完全弥补不了巨额建设成本，甚至连利息支出都不能覆盖。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　正是在这种背景下，共有产权房出世了。从理论上说，共有产权房避免了购房者获得全部房产价格上涨收益的可能：政府和购房者约定了所有权比例，一旦房产抛售，那么政府和购房者均可以获得相应的收益。事实上，“共有产权房”并非中国首创，其他国家也早有此先例。比如英国就有一类“阶梯式共有产权房”（<span>Shared ownership schemes</span>）：住户在购房时出资至少<span>25%</span>，另外的<span>75%</span>部分由政府机构“<span>Homes
and Communities Agency</span>”出资，而住户需支付<span>25%</span>的房屋抵押贷款，及<span>75%</span>的租金。在住户经济条件允许的情况下，可以逐步赎回剩余所有权，即类似一步一步上楼梯，所以称为“阶梯式共有产权”。这项措施一方面可以给中低收入（<span>6</span>万英镑以下）家庭以购房机会，一方面也可以让政府逐步退出以租赁为主的公屋市场。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　如果对比下英国的共有产权房计划，我们会发现中国和英国在共有产权房上存在着一个最大不同，那就是英国居民需要为共有产权房向政府缴纳租金，而中国的购房人不需要向政府缴纳租金。为何住户要向政府缴纳租金？因为住户并没有获得房屋的完全所有权，因此他有必要为其他部分的产权缴纳租金。在这种模式下，政府既是共同所有权人，同时也是房东；而住户既是共同所有权人，同时也是租户。在此模式下，住户可以根据市场环境来决定自己是否需要全额购入，而政府除了获得首付款以外，还可以通过租金收入来获得现金流。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　尽管不收租金是中国共有产权房设计中的瑕疵，不过在笔者看来，共有产权房的最大问题并不在此，而是在于房地产市场行情一旦开始下行，还有多少人愿意购买共有产权房？尽管政府在推出共有产权房时宣称是为了解决中低收入阶层的住房问题，但公共租赁房和廉租房也可以解决中低收入阶层的住房，为何却没有获得市场的响应？很重要的一个原因是后两者只是单纯提供“居住”，居住者由于不是所有者，就无法获得房价上涨的收益。而在当下中国，房价上涨是无数国人致富的原因，正是基于此，很多中低收入阶层也想驶上房价上涨的致富快车道，而共有产权房毫无疑问就满足了这种想象。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　但房价能永远一直上涨吗？至少从其他国家的例子来看，并没有这样的先例。而且中国房地产市场经过十来年的迅猛发展，目前很多城市的涨势已经趋于颓势，至少从今年以来，不少城市房价上涨势头得以遏制，甚至还有下跌的趋势。购买房产的一般心态是买涨不买跌，在目前房地产市场逐渐冷清的背景下推出共有产权房，还有多少居民愿意付出不菲的首付购买一个将来可能会下跌的房产？这可能要大打疑问。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　旨在让政府和居民共享房价上涨收益的共有产权房，最大的风险在于房价上涨趋势一旦停止，那么它就会变成让居民和政府一起分担房价下跌的风险，在这种情势下最大的可能性是居民停止购买共有产权房，由政府承担风险；但政府建设共有产权房的费用则是由其他纳税人支出，这意味着共有产权房的风险又要让纳税人来承担。为了满足一部分居民获得房价上涨的收益而把另外一部分居民拖入房价下跌的风险，这可能是当初的共有产权房的设计者所没有想到的问题。
</p>','','','','1398675941','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	日前，德国知名研究机构Ceresana对外公布了其关于欧洲市场塑料门窗在建筑行业应用的最新研究报告。报告指出，随着各国建筑该行业的逐渐回温，未来几年欧洲塑料门窗市场有望迎来发展高峰期。2020年整个欧洲市场上塑料门窗销量将新增2.25亿套。
</p>
<p style="text-indent:2em;">
	研究人员称，因气候不同，加之消费者偏好各异，欧洲各国对门窗材质的要求也有所差别。尽管如此，塑料尤其是PVC材质在欧洲门窗市场上占有举足轻重的地位，是该地区广大客户的首选材料。
</p>
<p style="text-indent:2em;">
	数据显示，波兰、俄罗斯和土耳其有65%以上的窗框为PVC，但北欧各国则更倾向于木框。近年来，塑料门窗的生产和应用发展较快，已成为门窗市场主导产品之一。楼市反弹将刺激市场，日益增长的非住宅与住宅建筑的出现，也是门窗需求大幅增长的主要原因。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	从建筑节能大局和行业发展确实而言，塑料门窗的未来是属于高质量、高档次的产品。塑料型材到门窗都要走高档产品的路子，要以高质量、高档次产品赢得市场。
</p>
<p style="text-indent:2em;">
	<br />
</p>','','','','1398675918','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	中共中央、国务院最近颁布的《国家新型城镇化规划（2014—2020）》明确提出：“随着内外部环境和条件的深刻变化，城镇化必须进入以提升质量为主的转型发展新阶段”。由此，加强对中国城市转型发展的研究，更成为学术界一项重大而紧迫的任务。新近出版的由中国（南京）城市发展战略研究院副院长、南京市社科院副院长李程骅教授所著《中国城市转型研究》一书（人民出版社，2013年12月版），已对此进行了颇具前瞻性、创新性和开拓性的研究。该书展示出以下几个显著的特点：
</p>
<p style="text-indent:2em;">
	一是以宏大的视野审视中国城市转型发展的战略定位。这部40万字的专著,是国内首部系统研究中国城市转型的著作，作者从世界城市化进程和城市转型发展的历史格局与发展大势，来审视当代中国城市转型的起因、内涵和意义，阐明在世界城市体系新一轮重组的过程中，中国城市所处的发展阶段、面临的挑战和机遇。在此前提下，从理论与实践的双重视角、在产业升级与空间优化的双重维度，有序展开中国城市转型发展战略的研究，并逻辑演绎一系列相关内容，由此构建起一个研究中国城市转型发展的学术框架和支撑体系。该书梳理西方理论、西方经验，植根中国国情、中国语境，大大拓展与深化了中国城市转型研究的内涵，既有利于我们自身充分把握中国城市转型的阶段性特征和要求，总结以往城市快速发展的经验和教训，为新一轮城镇化科学路径的选择提供依据，同时也有助于国际学界全面系统认知中国城市转型发展、创新发展的实践探索和价值追求，进而对“中国模式”、“中国道路”有更深的领悟。
</p>
<p style="text-indent:2em;">
	二是以准确的把握解析中国城市转型的核心动力和实践路径。新型城镇化战略下的城市转型发展、创新发展，必须以转变发展方式为主线，彻底扭转过去的“土地城市化”等倾向，将原先粗放式、低效率的发展模式，转变为低消耗、低排放和高质量的发展模式，并将产业升级、经济转型作为城市转型的核心动力。该书以准确的把握，解析中国城市转型的动力机制，围绕经济转型与城市转型相互作用的核心命题，逐层论述产业结构升级和新产业体系构建对中国城市转型与发展方式转变的作用机理，相应提出通过战略性新兴产业培育打造中国经济“升级版”，促进中国城市主动性转型与功能提升的实现机制。在此基础上，详细验证了服务业发展对城市化、城市转型的直接推动，提出了从“中国制造”到“中国创造”再到“中国服务”的中国城市转型升级的发展趋向和实践路径。同时系统剖析了文化创意产业的新业态、新内容对创新型经济发展和城市发展方式转换、空间功能提升等方面的战略引领。
</p>
<p style="text-indent:2em;">
	三是以深刻的思考探索城市与区域的联动转型。城市尤其是中心城市的转型发展，对区域转型发展起到重要的带动和引领作用。该书强调，世界大国崛起的规律表明，没有高度的城市化就不可能实现国家的现代化，但这种城市化必须是城市与区域联动发展、协同转型、共同受益的城市化。对于中国这样一个发展中的大国来说，全面实现现代化更须有区域现代化的先行探路，而区域的现代化又必须建立在高度城市化与城乡一体化的平台之上。因此，积极探索推进城市与区域联动的转型发展之路，特别是深入研究在"五位一体"总体布局下以城市化全方位推进区域现代化，又以区域现代化有力支撑和驱动高度城市化，显得至关重要。进一步看，中国新型城镇化背景下的城市与区域联动转型发展之路，不仅可以深度推进本国的现代化进程，而且可以在全球范围内为发展中国家和地区提供方向性的引领，还将为发达国家的城市再转型提供新的启示。作者在书中运用了长三角中的苏南现代化示范区、天津滨海新区中的中新生态城以及多个国家级新区的创新实践，来印证中心城市带动下的区域整体转型发展的可行性，展现了联动转型生动实践的巨大效应。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	四是以强烈的时代责任践行潜心研究中国城镇化健康发展的特殊使命。当代中国的快速城市化是“压缩型”的城市化，这种城市化模式固然提高了城市发展的速度和效率，但也浓缩了快速城市化所带来的诸多问题和矛盾，特别是城市快速扩张、粗放经济增长所带来的雾霾、交通拥挤、空间发展失衡等“城市病”越发严重。而且，当前中国处于城市化加速期和城市转型起步期的“叠加阶段”，一方面城市化的进程不能停步，另一方面城市转型的步伐还要加快，其间面临着诸多迫切需要解决难题。富有责任感的城市学者，应当努力站在研究的前沿，运用世界城市发展的理论和学术成果，从中国实际出发，进行深层次的学理探讨，并力求提出富有针对性的政策思路和解决方略，以此践行探索中国城镇化健康发展的特殊使命。从这个意义上看，该书的出版不仅是对城市科学发展的贡献，同时也是对中国城市经济学人不懈追求和担当精神的弘扬。
</p>','','','','1398675946','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	国家税务总局原副局长许善达日前表示，从去年10月底中央政治局召开的学习会传出的信息看，房地产政策已发生了战略性的调整。许善达称，这次会议之前，中央对房地产的调控都是抑制房地产价格过快的上涨，让房地产价格回归正常的水平，政府的政策是抑制房价，会议之后战略改变了，政府不再将自己的工作目标放在抑制房价上，”许善达说，政府的职责是帮助低收入群体解决住有所居的问题。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	许善达称，房地产政策跟税收有密切的关联。对于房产税立法的看法，他认为3年时间很难完成。“我认为，上海、重庆房产税的试点，作为初衷来说已经失败了，”
许善达说。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	“现在应该有新的思路。”许善达主张消费税移交给地方政府后，在房地产交易环节由地方政府决定征收交易税，调节目前所谓的房产中投资、投机的收益问题，这一政策是符合决策层在房地产政策上的新战略。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	分析：未来中国楼市将何去何从？
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	深圳市住房研究会常务副会长陈蔼贫：我们目前的房地产市场已经进行分化，三四线城市明显的我们说已经从过去的上涨阵营中分离出来，目前房价坚挺的仍然是一线城市，包括部分二线城市，那么三四线城市分化出去了以后，这种价格的下调下跌实际上在社会上也引起了恐慌。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	比如说对一线城市很可能要继续维持过去的三限政策，金融政策，以及我们说严厉调控的政策，而对于三四线城市我们说实际上是要放开，不仅要放开，还要鼓励这种房地产销售。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	而与此同时，去年12月召开的中共中央政治局会议又提出，要走新型城市化道路，做好住房保障和房地产市场调控工作，业内人士认为，将住房保障和房市调控并行提出，透露了中央要将房市调控工作重心放在大力增加保障房供应的意图上。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	中国综合开发研究院旅游与地产研究中心主任宋丁：未来就是双轨制，一方面有一部分比如说在我们中国可能大概是有差不多20%到30%是由政府完全包下来的这部分，就是完全进入到住房保障机制体系，剩下的可能百分之七八十仍然还是要走市场化的路，所以市场和保障双向机制结合就双轨制，我觉得是未来发展的方向，所以这次的两会所谈到的住房保障机制实际上是强调了一个过去缺失的部分，实际上在整个市场仍然是占一小部分。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	事实上，房产税不动产登记等问题屡屡在今年两会上被提及，国土部部长姜大明在两会期间接受记者采访时表示，今年国土部推行不动产登记要做到四件事，包括制度建立、地级市不动产登记局等机构的建立、不动产登记条例的出台以及信息共享平台的建立。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	陈蔼贫：今年的6月底，一定要做到不动产的登记的条例要出来，我觉得这是一个非常积极的信号，就说现在我们过去叫只见楼梯响不见人下来的现象，我觉得这次应该给我们一个明确的答复了，人要下来了，那就说这个立法中间的不动产登记的这件事要出来了。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	在中国，能够买的起房居有定所圆了自己的住房梦，算是老百姓的愿望之一，两会前，最新公布的调查显示，房价依然是网友最关心的话题，受访人数的53.7%表示，最希望房价问题在两会上被提及，有机构就梳理了历年政府工作报告内容之后发现今年的报告是十年以来政府工作报告中首次没有强调房地产调控的一次，他的重点是对住房保障机制做了大篇幅的描述，今年将开工七百万套以上的保障房。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	有分析就认为，在这个阶段，继续强调保障房工作是希望通过双轨制来解决城镇化的后顾之忧，同时，在长效性的调控机制尚未出台之前，以限购为主的行政手段还有其他的经济手段市场手段会并存，但是经济手段市场手段会逐渐的凸显出来。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	业内人士普遍认为，在经历了将近十年的楼市单向调控之后，现阶段的中国已经进入到一个深度调整期，种种迹象表明，本届政府正在努力做到从赌到输，积极为建立调控长效机制做准备，而未来，除了推进保障房的建设之外，扩大房产税试点范围，住房信息的系统联网以及不动产统一登记制度等等，都将逐步的推进，为限购等行政手段的最终退出做一个铺垫过度。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	汪云志行之：这次是什么失灵了?市场失灵?管制失灵?一起失灵?在这个博弈过程中谁是赢家呢?
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	曲子叶：取消限购会使房价掉头上涨吗？对地方政府来说，比房价下跌更糟糕的是地价也跌了、比地价下跌更更糟糕的是土地卖不动了。过去10年出台过43个房地产调控，但它却成房价推涨利器：购房者心理：因为要涨才会限——麻将投资定理：限什么投资什么。反之亦然：取消限购并鼓励买房：这预示着房价还会跌。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	限购取消之时
将是房市全面下跌之际！反对一切行政限制：让政府部门“法无授权不可为”。但我们在房地产上已铸就大错：已练成百年老妖。从把房地产作为支柱产业开始，这个大错就铸锭了。房地产是经济发展的结果。而我们却用它来拉动经济增长。一个闭合的循环。没人可以阻挡在飞驰的列车前面。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	光远看经济：这个调整是被动的，因为现在即使取消所有的调控，房价也不会再大涨了。房地产的预期已经逆转，而且来得比一般人预想的要快。
</p>','','','','1398675913','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	&nbsp; &nbsp; 今年以来，安防行业优质公司海康威视、大华股份股价分别下跌4.31%和26.13%，大幅跑输行业。投资者开始思考，海康、大华是否已经遇到市值瓶颈，还能不能长期持有？安防行业能否在未来三年甚至更长的时间持续高增长？设备厂商还是不是最受益的一环，有没有新的安防标的可供选择？
</p>
<p>
	　　我们看好安防行业未来几年的持续成长，更看好安防应用企业的投资机遇。
</p>
<p>
	　　城镇化推动——三、四线城市接力
</p>
<p>
	　　昆明暴力恐怖案呈现新特征，国内安全形势不容乐观，稳定压倒一切，安防投入将不断增加。与过去几次恐怖袭击事件相比，此次恐怖袭击事件在时间、地点和恶劣程度方面都呈现出一些新特征。昆明暴力恐怖案发生在两会前夕，意在传达恐怖分子的嚣张气焰；作案地点选择在安保相对薄弱的昆明，其他城市未来存在被袭击的可能；手段血腥，人员伤亡惨重，是近几年伤亡人数最多的恐怖事件。受“十八大”政府换届以及五年规划节奏的影响，过去两年安防行业招投标活动相对较少，处于阶段性“低谷”，预计2014年开始投入逐渐加速。
</p>
<p>
	　　未来十年城镇化率将不断提高，人口集聚从根本上要求增加安防投入。从国际经验来看，在城镇化率达到70%之前，城镇化进程都不会减速。与此同时，国务院总理李克强多次表态城镇化是扩大内需最大潜力，是经济结构调整的重要依托，将大力推进新型城镇化建设。而我国城镇化率目前刚达到50%左右，无论从国际经验还是国内政策来看，未来十年城镇化率将不断提高。城镇化将带来人口的集聚，安全隐患随之增加，从根本上要求增加安防投入。
</p>
<p>
	　　平安城市有望加速向三、四线城市渗透，市场空间扩大数倍。暴力恐怖案发生在西部，有望加快平安城市向中西部城市渗透进程。安防的核心推动因素是城镇化和不平衡，虽然国外经验表明一、二线城市是投入重点，但我们认为中国的三、四线城市投入占比会更高一些，贫富差距和不和谐因素在中西部体现得更明显，暴力恐怖案有望推动三、四线城市平安城市建设大潮。
</p>
<p>
	　　四化提升产值 应用迎春天
</p>
<p>
	　　数字化、高清化、网络化、智能化四大趋势将推动安防产值成倍提升。数字化和高清化主要是指包括摄像头在内的一整套设备的升级换代，更先进的设备需要更大的资金投入。而网络化和智能化除了硬件设备升级外，更主要是大平台建设和多应用落地。“四化”意味着更加先进和智能的设备，同时也意味着安防进入智能应用时代，软件应用平台在安防中的投入比例也将大大增加。
</p>
<p>
	　　安防建设进入深化应用阶段，应对恐怖活动将加速网络化智能化进程。一线城市在基础设施建设后，遇到了视频数据分析难题，无法高效地利用大量视频数据解决城市安全问题，因此，新一轮平安城市建设将更加侧重于软件平台的应用。而应对恐怖活动最有效的方式是事前预警，这就要求安防建设落后的三、四线城市在初始投入时就注重智能应用。据统计，美国有90%的恐怖活动经过事前预警得到了很好的控制。另外，新一轮平安城市建设很多采取BT或BOT建设模式，集成商由于垫资总包而拥有设备的采购权，获得了更大的议价能力和话语权。我们认为，安防行业价值链下移，应用集成商话语权增加，安防应用将迎来发展春天。
</p>
<p>
	　　总体而言，我们认为平安城市建设提速，聚焦高清智能监控领域，安防应用迎来春天。我们看好具备客户、资金和技术优势的安防应用上市公司，依次推荐佳都科技、东方网力、安居宝、华平股份等公司。同时，我们认为设备厂商受益于高清化、国际化浪潮，领先企业有望受益，依次推荐海康威视、大华股份、中威电子和英飞拓。
</p>','','','','1398675935','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	庞大的能源消耗已经构成我国经济发展最大的制约因素，发展绿色经济已经成为未来的趋势，而绿色建筑是发展绿色经济的一个重要组成部分。
</p>
<p style="text-indent:2em;">
	据数据表明，我国的建筑能耗占生产能耗的30%，按照联合国环境署的统计，我国建筑能耗占全球建筑总能耗的40%。去年中国的能源型消耗是32.6亿吨标准煤，按此计算，建筑能耗需要10亿吨标准煤。
</p>
<p style="text-indent:2em;">
	绿色低碳是建筑装饰行业的主流发展趋势已达成共识，实践绿色装饰，不仅将享有巨大的市场份额和可观的利润来源，更是对中国未来社会发展的一种责任和担当，所获得的也将是经济效益和社会效益的双丰收。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	发展绿色建筑不仅有利于节能环保，对整个建筑装饰行业的转型升级也具有重要意义，同时还能给企业带来可观的市场份额和利润。
</p>','','','','1398675908','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	谈建筑节能不研究辐射采暖、供冷是不可能的，建筑节能这里既包含建筑建设时的节能，也包含建筑使用阶段的节能。也就是说，这里既包括建筑的设计技术（优化设计）施工工艺、建筑产品、购件材料的节能，也包括供冷供热方式的节能。在建筑总能耗中，建筑建设能耗约占20%，使用阶段能耗约占80%.二者虽然能耗比例差距很大，但确是互为作用，相辅相成的。既可相互叠加，也能相互抵消。
</p>
<p style="text-indent:2em;">
	1.辐射采暖（供冷）。合理利用太阳能、潮能、风能、地热能、生物能等一次可再生能源及煤、石油、燃气等一次不可再生能源以及电、余热等二次能源，特别是大力开发利用低品位自然冷热源；科学选择冷热兼容的直燃机热泵，太阳能空调等前端设备，为用户终端夏季提供18℃-22℃中温冷水、冬季提供35℃-45℃低温热水，通过末端模板辐射系统实现冬季辐射供暖，夏季辐射供冷，也可常年供应生活用热水，其中热辐射模板系统已成功地应用在地面辐射供暖的工程实践中。辐射供冷在法国、德国、丹麦、泰国等国家已广泛应用。我国在新疆等地也有应用先例。在限定的供冷温度和供冷时间的条件下，冷辐射的基面未出现任何结露现象。因此本辐射供冷暖系统对于辐射供冷来说，采用提高供冷温度（18℃-22℃）增加辐射面积，加大供冷水流量，缩小供回水温差的办法，达到既能保证供冷冷量满足室内供冷效果，又能不冷凝结露。如果在湿度较大地区或环境温度较高的地区和季节，末端适当配置风机盘管系统，新风置换系统或净化去湿装置，即可提高供冷效果，缓解结露发生，也可改善室内空气质量。
</p>
<p style="text-indent:2em;">
	另外，用这满足冷负荷的同一供冷辐射面积去辐射供暖，供暖温度可降低20-30%，达到35℃-40℃。比单一的低温辐射地面供暖更加节能。
</p>
<p style="text-indent:2em;">
	2.建筑节能。建筑的规划设计、施工图设计的优化组合，施工中新技术、新工艺的应用，建筑结构的构件、新产品、新材料的选择都无不考虑保温、隔热，辐射、防辐射等与辐射紧密相关的因素。
</p>
<p style="text-indent:2em;">
	①施工图的优化设计——考虑环保节能，达到环保标准，节能标准。
</p>
<p style="text-indent:2em;">
	②屋面的保温、防辐射——由选材与施工保证。
</p>
<p style="text-indent:2em;">
	③外墙保温、隔热、防辐射——由选材与施工保证。
</p>
<p style="text-indent:2em;">
	④外门窗的热反射、热辐射——由选材与安装来保证。
</p>
<p style="text-indent:2em;">
	⑤墙体空心砖，其它轻体材料的选择与施工。暖通空调在线
</p>
<p style="text-indent:2em;">
	3.相互关系
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	冷暖辐射——生活能耗（即建筑使用期能耗）与建筑节能——建筑能耗（建筑建设期能耗）是建筑总能耗的两个部分。两者是相互作用，相互弥补的统一体。没有一个高标准的节能显着的建筑围护结构，使用期的能耗既降不下来，也更不会有一个良好的供冷供暖环境。反之，建筑节能标准再高，没有一个低能耗的供冷供暖系统，也达不到理想的供冷供暖的效果。因此，只有深入研究辐射原理及辐射能的应用，把冷暖辐射和建筑节能做为一个完整的课题集中研究，统筹考虑，建筑总能耗才能按照以下趋势：高能耗→低能耗→超低能耗→微能耗→零能耗，发展。<br />
&nbsp;
</p>','','','','1398675927','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	降低成本，提高利润率、生产率的需求对大型建筑企业而言，其承包的施工项目是企业产生利润的中心，项目是生产一线，直接发生产值，是企业利润的源泉。企业的生产管理必须围绕着项目活动而进行，企业的各职能部门的工作都是围绕项目工作而展开的。对项目生产之外的，企业核心竞争力之外的资源应尽可能的放弃。如低级的小型设备，对低层次的劳务管理，后勤服务等。虽然这些生产资源可能仍然可以产生利润，甚至可能利润可观，但可以通过对比甩掉这些“包袱”之后，产生的效益提高来进行判断决策。大型建筑企业，一旦抛弃这些低端资源，必定更多的将依赖于分包商来完成任务，分包管理能力要增强。这样做，一方面更突出了项目在产生利润为主的地位，专注于项目的管理，可以降低管理不当引起的资源浪费，压缩了企业规模，非常有效的降低企业运营成本，另一方面提高了核心竞争力，增强了企业的市场能力。对专业的分包队伍和劳务队来说，使用农民工，使队伍不稳定，技术水平低，机械化程度低。社会发展和城市化，可能会使劳动力成本逐渐上升，在竞争加剧的环境里，必须提高管理能力，技术水平，使用机械设备，提高生产率，来降低成本。趋专业化的分包企业，不仅产品质量有所进步，而且由于技术管理水平的提高，将获得更高的生产率和利润率。
</p>','','','','1398675904','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	生活在中国，你不能不关注楼市。进入2014，围绕房价的纠结继续萦绕在国人心头。一如既往地怒斥那些唱空房价的人“危言耸听”，地价太贵，“面粉贵过面包””，但另一方面又宣称“我对内地楼市很乐观，不要小看7.5%的GDP增长，买楼仍是国人积累财富后的第一选择。”房价显然存在泡沫。在京沪一线城市，30－40倍的房价收入比明显太离谱。“加州房价收入比在8－10倍，我们就觉得太高了。如果是8倍，就要花8年的总收入买房。”如此高的房价，基本“消灭了”城市中产阶级，对实现以消费为动力的经济转型相当不利。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	另一个不利因素来自趋紧的金融环境。2010年起中央收紧房地产商融资，进而迫使大量房地产企业借助影子银行渠道融资。问题在于，影子银行资金成本太高（20％左右很常见），一旦房地产出现长期滞销，房地产商将陷入资金困局。明确表态不搞大规模刺激，并开始引导货币政策从超级宽松走向中性，2013年即出现三次钱荒潮。杭州大幅降价的楼盘，应该就是由于开发商资金链紧张所导致的现象。2013年温州房地产市场的崩盘，也是由于资金链大面积断裂所致。
</p>','','','','1398675932','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	我国涂装生产线的发展经历了由手工到生产线、到自动生产线的发展过程。我国的涂装工艺可以简单归纳为；前处理→喷涂→干燥或固化→三废处理。我国的涂装工业真正起源于50年代苏联技术的引进之后。一些援建的项目中开始建立了涂装生产线，但这些生产线一般是钢板焊的槽子加钢结构的喷（涂）漆室和干燥室（炉）组合的，由电葫芦手工吊挂工件（少数用悬挂输送机）运行。当时的酸洗槽一般均为钢板衬铅，随着时代的发展，出现了衬玻璃钢或全部采用玻璃钢的槽子。从60年代开始，由于轻工业的发展，首先在自行车制造行业出现了机械化生产的流水线和自动化生产的流水线，以及在原有槽子流水线生产的基础上加上程序控制的小车形成的程控流水线，这些主要是在上海和天津地区。这期间我国涂装工业的主要任务还是以防腐为主。但随着我国经济的发展，以及国外涂装技术的发展，通过技术引进和与国外技术的交流，我国涂装技术开始飞速的发展，在涂装自动化生产方面，静电喷涂和电泳涂漆技术的推广应用、粉末喷涂技术的研制及推广，特别是我国家电行业、日用五金、钢制家具，铝材构件、电器产品、汽车工业等领域的蓬勃发展，使涂装事业有了明显的进步，在涂装生产线中还出现了智能化的喷涂机器人。
</p>
<p style="text-indent:2em;">
	作为前处理技术来说，最初前处理的传统方式为槽浸式，按工艺流程逐槽浸渍。随着工艺的改进和发展，出现了二合一（即除油、除锈）和三合一（即除油、除锈、钝化）工艺。目前，国外及国内的家电行业多采用喷淋式前处理，其特点是生产效率高，操作简便，易于实现生产自动化或半自动化，脱脂效果好，磷化膜致密均匀。但是不管怎么发展，表面处理的前处理工艺都是必须的，针对不同的涂层要求及对抗腐蚀的要求，除油、除锈、磷化等处理方法要视工件原材料的状况来选择。当然，在前处理工艺中，喷砂、抛丸或打磨工艺也在不同行业的不同部门按需要选择应用。时代的发展，表面处理工艺在发展，就水洗来说最初一般使用自来水，但是随着工艺要求及发展，现在水洗已采用蒸馏水或纯净水；前处理也有采用超声波的处理工艺。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	<br />
</p>','','','','1398675952','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	“房地产行业的末日到来这一说法可以说是危言耸听，中国房地产是不可能崩盘的。”中房股份在房地产行业中的地位并不高，中房股份之所以这么出名是因为它曾经顶着中房集团的名称。在很早之前，中房股份在房地产这一行业就没什么大的影响力，现在中房股份在中国房地产行业完全不具代表性，所以它的转型也同样不能代表中国房地产行业的转型，更不能说中国经济也因此被迫转型，而且国家经济已经开始转型了，以互联网、新能源为核心的相关行业都在高速增长。中国房地产未来的发展可能没有过去好，首先现在的货币政策紧缩，导房地产行业融资比过去难；其次，国家政策这一方面也并不明朗，限购、限贷等政策给房地产行业带来压力；此外，土地市场方面，土地价格持续偏高，房地产行业的成本很高。
</p>','','','','1398675917','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	互联网思维，本质上来讲就是因为互联网工具大规模使用，使我们在生活、工作、娱乐、购物等各个领域的习惯发生变化，进而对传统的业态模式造成了“颠覆革命”。比如我们更多的使用网购，那么线下的实体店就会受到影响冲击。比如我们更多的使用互联网理财产品，那么传统的金融业务就会受到影响。至于界定颠覆革命，就要看这些在线用户群体的规模了。如果只是小众的使用，就不会对传统的业态造成影响。需求发生了变化，才有后续的变化。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	东哥以为马佳佳考虑欠妥，互联网本质是要解放人，而不是固化到一个社区。另外房地产的互联网革命，必须满足几个条件，房子便宜，方便工作，方便生活。马佳佳的分析里面，只包含了方便工作和方便生活，但房子还是太贵。互联网思维开发房地产，绕不开土地，土地是政府控制拍卖就不会便宜，再互联网思维还是贵，不管是买还是租。而互联网则是让人不再局限于办公室，在风景秀丽的地方建立住宅社区，让城市人逃离城市！
</p>','','','','1398675945','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	有我们行业的一位老楼梯人,接受了中国建筑标准设计院来住建部立项编写成品木楼梯、钢木楼梯、工装楼梯的标准图集的工作，其中的立项书中须要提供国内外楼梯也发展状况，其中“国内楼梯产业发展与国际产业发展的差异情况”的内容。　　<br />
　　毕竟作为一个楼梯行业的老兵，为这个行业提供一些建议和素材,还是应该的。同样作楼梯行业的企业主，如果不知道国外楼梯行业的发展，那基本上是很难不走弯路的，毕竟我们捷步也算是最早引进国外楼梯品牌的楼梯企业之一，我们对于国外的楼梯行业的认识，也不是Copy一下就了解的，的确实花费了近10年的时间，不断地积累起自己对楼梯的一些认识，说起来真的不容易。　<br />
　　从2001年起，我基本上走过了近几十家国外的工厂，如意大利的DS、RL、CAST、MO、MI;法国的DB、LE;西班牙的TM、EA、FG;德国的企业就更多了DWE、DA、，我们为了购买德国的CNC的走访了近10多家德国的楼梯企业，从最少人的5个工人的工厂，到150人的大家具工厂，还有日本的IJ、DJ企业等等，当然还有美国的一些老牌的楼梯企业，这些企业有的与捷步曾有过代理的关系，有的曾和捷步有过深度的合作，但是由于各种原因，我们目前合作还是意大利的企业CAST楼梯企业。<br />
&nbsp;
</p>','','','','1398675903','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	大连市国土资源和房屋局2月14日消息，2013年，大连市房地产开发投资继续保持较快增长，开发规模持续扩大，商品房销售有所回落。全年大连市商品房销售面积达1222万平方米，销售额1010亿元，均增长13%以上，高于辽宁省8个多百分点。
</p>
<p style="text-indent:2em;">
	据介绍，2013年，大连市商品房施工面积6396万平方米，新开工面积2004.3万平方米，分别增长2.9%和24.1%。商品房竣工面积1046.6万平方米，增长39.5%，增速较上年高60.5个百分点，较商品房销售面积高26个百分点。
</p>
<p style="text-indent:2em;">
	其中，90平方米以下住房销售面积和销售额增幅双双跌至4.1%，几与去年持平，而90平方米以下住房的新开工面积、房屋竣工面积和待售面积增幅分别为62.1%、62.5%和96%，适度开发与盘活存量已经成为房地产市场亟待解决的问题。
</p>
<p style="text-indent:2em;">
	去年下半年，随着调控政策的实施、市场预期的变化以及上年同期基数不断抬高等影响，房地产市场销售增速连续6个月呈持续放缓之势。全年大连市商品房销售面积1222万平方米，销售额1010亿元，均增长13%以上，高于辽宁省8个多百分点。
</p>
<p style="text-indent:2em;">
	另外，受商品房销售持续增长和直接融资等因素影响，2013年，房地产开发企业资金到位情况良好，全年资金到位2495亿元，增长22%，增幅比上年高7.6个百分点，与房地产开发完成投资增幅基本持平。自筹资金和其他资金合计占比超过66%。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	此外，大连市去年房地产开发完成投资1710. 4亿元，投资完成额居辽宁省第二位，增长22.5%，增速高于全市投资平均增速7.3个百分点，较高辽宁省4.3个百分点，各月累计增速均保持20%以上的增长速度。其中，住宅完成投资1258亿元，增长19.2%；商业营业房、办公楼完成投资均增长50%以上。
</p>','','','','1398675936','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	作为官方唯一的房价发布平台，国家统计局每月发布的70大中城市房价数据颇受外界关注。对于2014年全国房价走势，多数机构都做出了“稳中有升”的判断。但不断披露的“空城”、“鬼城”、“公务员售楼”等案例说明，在许多区域，供大于求的风险在不断积聚、迅速膨胀。在房地产市场愈加分化的背景下，以70个大中城市为统计样本的房价数据，已不能反映整体市场的走势，甚至出现了明显背离。正视房价数据背后的楼市真相，形成对房地产行业发展前景更客观的预期，是包括房地产商和拟购房群体在内的社会各界都亟须面对的现实问题。
</p>
<p style="text-indent:2em;">
	价格信号是指导商品投资和消费的重要依据。当商品价格出现上涨或明确的上涨预期时，往往是追加投资的重要信号，反之亦然。房地产业的发展依托城镇化大背景，行业具有稳定而高昂的投资回报率，令很多社会资本趋之若鹜。与其他类型商品相比，房屋不仅有着消费功能，更具投资品属性。因此，房价变化已成为整个社会最敏感的神经。
</p>
<p style="text-indent:2em;">
	综合国家统计局数据可发现，在最近48个月里(2009年1月至2013年12月)，全国70个大中城市的新建住宅平均价格只有11个月出现环比下跌。在其余的37个月中，上述指标保持持平或增长，且涨幅远大于跌幅。其中，自2012年7月以来，上述指标已连续18个月保持上涨。房价的持续上涨虽令购房者怨声载道，但按照惯常的市场逻辑，也是追加投资的好时机。近期市场频繁出现的“地王”，不仅是高房价信号刺激的结果，也反过来对房价起到助推作用。
</p>
<p style="text-indent:2em;">
	但当前的房地产市场，真的需要那么多投资吗？近年来，一些三四线城市因大规模推进房地产开发而导致房屋过剩，“空城”、“鬼城”、“公务员售楼”的案例不断见诸报端。对于这些为数不少的城市而言，真正需要的显然不是追加投资，而是促进消化库存。
</p>
<p style="text-indent:2em;">
	由于经济发展水平和城市资源分配的不均衡，我国房地产市场表现出越来越显著的区域差异特征。一线城市和热点二线城市的吸引力大，房屋供应相对不足，房价上涨压力较大；广大三四线城市市场规模小，且产业支撑的缺乏导致人口聚集程度低，房屋消化困难，房价也陷入滞涨。
</p>
<p style="text-indent:2em;">
	在这种情况下，以70个大中城市房价变化作为依据，并对市场行动做出判断，显然已不合时宜。
</p>
<p style="text-indent:2em;">
	我国共有600多个城市，其中大部分是中小城市，这些城市的地理条件、资源禀赋、经济水平、人口基础各不相同，决定了其房地产市场形态也千差万别。当前纳入官方房价统计的70个大中城市，虽然覆盖了大部分省份，但就城市规模而言，已不具备反映整体市场形势的样本价值。这其中反映出的问题，非常值得我们重视。
</p>
<p style="text-indent:2em;">
	房地产市场是区域市场，总体的房价变化无法反映区域市场形势。对于市场参与者来说，要真正了解市场，需结合区域发展的各项政策和房地产投资、在建规模、供地情况等指标，对市场的供需形势做出判断。
</p>
<p style="text-indent:2em;">
	对于未纳入房价统计的广大中小城市而言，单个城市的市场容量并不大，但其总体规模却相当可观。缺乏这个庞大市场的数据，无疑是统计中的一大缺陷。对此，作为完善房地产调控的重要基础体系，个人住房信息系统、不动产登记系统等的建设和联网必须加快，从而获取更为全面和准确的数据信息。
</p>
<p style="text-indent:2em;">
	另外，在条件允许的情况下，可考虑扩大房价数据的样本范畴，将更多有代表性的中小城市房价变动情况纳入统计和发布范围，避免数据样本的片面性。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	“行政化手段逐退、市场机制主导”是未来房地产市场调控的大方向，但实现“市场主导”的前提，必须是信息的对称。房价作为房地产市场的重要信息，需要保持完整性和典型性，从而更为客观地反映市场现实。但与此同时，房价只是单一指标，只有透过房价表象，回归市场供需的基本面，才有助于对市场做出准确的判断。&nbsp;
</p>','','','','1398675906','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	　　在当今情况下，以房产来养老应该是很多人的想法。在房价不断上涨的今天，这不愧是一个很好的有前景的投资。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　“以房养老”方案或下月出台。伟业我爱我家副总裁胡景辉分析认为，“最近得到消息，让我们在<span>12</span>月份拿出方案，明年一季度要把这个产品推出来。”“以房养老”是一个金融产品。孟晓苏是“以房养老”首倡者。孟晓苏透露，十年前，他向刚就任总理的温家宝提交建议，温家宝随后批示建设部、保监会两部门研究。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　时隔十年之后，国务院首次提出开展“以房养老”试点。面对“以房养老”引发争议，孟晓苏回应称：“这不过是商业性的养老保险补充产品，是一个金融产品。”孟晓苏说，“以房养老”是欧洲发明的，<span>20</span>世纪<span>80</span>年代<span>(</span>价格动态
户型图 论坛<span>)</span>曾经在美国、日本、澳大利亚都得到了快速的发展。“以房养老”适合中国国情。伟业我爱我家市场研究院分析，“中国的老人缺什么<span>?</span>大家低工资没积蓄，多年缺乏养老保险。伟业我爱我家副总裁胡景辉分析认为，但是中国的老人有什么<span>?</span>中国老人有房产，特别是中国房改，很多老人通过房改用小钱就买下了价值较大的房屋。”孟晓苏认为，中国老人是典型的“住房富人、金钱穷人”，“以房养老”非常适合中国的国情，并且最适合有房而缺钱的老人。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　他随即算了一笔账：一个拥有<span>500</span>万元房产的<span>70</span>岁男性老人，如果购买“以房养老”产品，算上房产增值等各种因素，每个月也能拿到<span>27000</span>元钱。“一个老人把自己的房产做反向抵押以后，不仅可以继续的居住，而且还可以领取资金，领养终身，而且活多久就领多久。”
伟业我爱我家副总裁胡景辉分析认为，“以房养老”的几大好处，比如退休以前人养房、退休以后房养人，现金资助子女、终身保持尊严，房产抵押后，可避遗产税等。伟业我爱我家市场研究院分析，高雪坤一行先后来到太湖新城吴中片区永旺绿岛、太湖新城建设现场和太湖新城规划展示馆。永旺绿岛位于吴中区太湖新城最东侧，这里正在建设太湖岸线生态活动带。伟业我爱我家副总裁胡景辉分析认为，详细了解了这里的绿地面积、生态情况。高雪坤说，绿色、生态是太湖新城最大的亮点，一定要把保护生态、保证绿地面积等措施落到实处。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在太湖新城建设施工现场，当地相关负责人向市政协视察组介绍了建设进展情况。目前，已经完成<span>3500</span>亩土地绿化，启动区区域内已经基本完成绿化全覆盖，道路和部分管网建设正在全力推进。在太湖新城规划展示馆，高雪坤详细询问了太湖新城整体规划和产业支撑等情况。了解到整个区域内没有一家制造企业，全部引进文化创意等现代服务业，市政协视察组成员们表示赞许。伟业我爱我家副总裁胡景辉分析认为，发展现代服务业不仅可以给整个区域提供产业支撑，更重要的是确保了生态环境不受污染，文化创意产业已经成为苏州的热门产业，太湖新城要根据自身特色，准确定位和发展方向。“<span>2012</span>年年初的时候，花费<span>60</span>万元首付尚能在北京六环内买一套<span>80</span>平方米左右的房子，但现在可能首付支付<span>110</span>万元也无法买下来了。”
伟业我爱我家副总裁胡景辉分析认为，即使现在新开发的台湖板块，周边几乎没有什么配套设施的情况下，纯住宅预计销售价格也已经超过了<span>3</span>万元∕平方米，一套不足<span>90</span>平方米的新房首付可能要花费<span>100</span>万元左右。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　实际上，上述受访者的感慨已经成为现在北京多数刚需一族的共同慨叹。伟业我爱我家副总裁胡景辉分析认为，在北京房价连续上涨<span>20</span>个月后，有些购房者甚至被甩出了刚需一族。“已经买不起了。”一位受访者向记者表示，“这回倒不用纠结了”。不过，伟业我爱我家副总裁胡景辉分析认为，随着限价房进入市场，限价房与商品房之间<span>30%</span>的价格差距，可能会导致现在商品房市场部分需求离开当下的商品房市场，预计这一潜在购买力约占现在商品房市场需求的<span>50%-60%</span>。尽管如此，以近年来市场成交情况来看，伟业我爱我家副总裁胡景辉分析认为，目前北京新建住宅市场呈现“底部抬升”的趋势。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　近年来，一年内刚需“底部抬升”的差距是<span>50</span>万元。对此，伟业我爱我家副总裁胡景辉分析认为，北京楼市低端市场“底部抬升”现象非常明显，虽然尚未有剧烈抖动，呈现相对平缓的趋势，但“就像喜马拉雅山似的，几十年可能涨了几厘米，但确实在长高”。
</p>','','','','1398675926','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	我国利用高硫、劣质煤生产<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%BC%D7%B4%BC">甲醇</a>的技术处于世界前列，且原料来源稳定可靠，已初步形成了规模生产能力。在我国新一代煤化工技术的支撑下，开发推广煤制甲醇的时机已经成熟。
</div>
<div>
	由诺美咨询完成的《2012-2017年<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%D6%C6%BC%D7%B4%BC">煤制甲醇</a>行业情报深度分析及营销前景可行性报告》内容显示，<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%BB%AF%B9%A4">化工</a>产业的蓬勃发展拉动我国甲醇消费量快速增长。随着甲醇下游产品的开发和甲基叔<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%B6%A1%BB%F9%C3%D1">丁基醚</a>（MTBE）、<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C5%A9%D2%A9">农药</a>、<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%B4%D7%CB%E1">醋酸</a>、<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%BE%DB%BC%D7%C8%A9">聚甲醛</a>等新装置的建设，以及甲醇燃料的推广和应用，甲醇的需求市场进一步扩张。国内煤炭企业为增强核心竞争力、调整产品结构、延长产业链，注重上下游一体化发展，有效带动了大型煤制甲醇装置的建设。
</div>
<div>
	受制于中国的资源配置，国内甲醇生产主要以<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA">煤</a>为原料。截至2011年底，中国煤制甲醇企业237家，产能2178万吨；焦炉煤气制甲醇企业23家，产能297万吨。各路企业及资本对煤制甲醇项目投资热情高涨，一方面是看好其长远发展前景，另一方面由于甲醇是煤化工产业链中第一环节的产品，其下游可延伸至多种其他化工产品。甲醇可以按5%、15%或25%的比例添入汽油，得到的甲醇燃料称为M5、M15、M25，现有发动机无须改造即可使用，同时甲醇的下游产品二甲醚可作为柴油替代品。
</div>
<p style="text-indent:2em;">
	<br />
</p>
<div>
	根据国家规划，在2020年以前我国要建设七大煤化工产业基地，稳步发展煤制石油替代产品。规划中明确提出，要在煤炭资源丰富的地区建设大型煤制甲醇生产基地及输配系统，将产品输往消费市场。到2020年，我国煤制甲醇产能有望突破6000万吨。
</div>','煤制甲醇','诺美咨询','诺美咨询','1399359832','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%CC%BF">煤炭</a>在我国能源结构中长期居于战略地位，是我国能源安全的重要保证、同时，传统的煤炭开采、加工及利用技术效率较低，并带来了严重的环境污染。在环境保护日趋严峻的形势下，发展洁净煤技术是提高我国能源效率、减少环境污染的重要途径。当前，我国洁净煤技术研发及应用取得了较好的成效，并且政策也大力支持和鼓励洁净煤的发展，我国洁净煤行业迎来了较好的发展机遇。
</div>
<div>
	由诺美咨询完成的《2012-2017年<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%BD%E0%BE%BB%C3%BA">洁净煤</a>行业竞争运行状况调研与盈利模式咨询报告》内容显示，科技部2012年3月出台《洁净煤技术科技发展“十二五”专项规划》，确定了洁净煤技术发展重点方向和任务。《规划》提出，“十二五”期间，我国将在高参数发电锅炉材料、煤基天然气及高密度航油、狭窄空间高效低氮煤粉燃烧、冶金电炉非稳态废热回收等方面开发出10~15项关键、核心技术，形成约100项发明专利，形成一批达到国际领先或先进水平的技术及装备，整体达到洁净煤技术研发和产业应用国际领先水平。
</div>
<p style="text-indent:2em;">
	<br />
</p>
<div>
	“十二五”期间，我国将探索大规模高效煤基转化多联产技术集成示范。集成大型煤焦化、煤基清洁燃料集成加工、煤气净化与污染物控制及资源化利用、余能回收梯级利用与发电等专项技术，形成数百万吨级煤转化及煤基清洁燃料生产、数百万兆瓦以上发电规模。
</div>','洁净煤','诺美咨询','诺美咨询','1399359816','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	导读：由诺美咨询提供的《煤炭化学品报告-2012-2016年煤炭化学品专题研究及投资可行性评估报告》结合政府权威统计数据，整合煤炭化学品关联目标产业公司资料及本研究中心的调研数据，在行业专家及资深研究人员的协作努力下完成；针对当前工厂安全事故时有发生，在本报告中增加了工厂安全篇章，防患于未然；从这份报告中，您可以了解当前煤炭化学品产业以下方面基本信息：
</p>
<p style="text-indent:2em;">
	-煤炭化学品行业市场现状剖析<br />
-生产工艺技术<br />
-低碳经济对煤炭化学品行业的机遇与挑战<br />
-主要煤炭化学品生产企业情报<br />
-渠道剖析<br />
-煤炭化学品产业用户分析<br />
-原材料供给状况<br />
-煤炭化学品生产现状及消费情况<br />
-进出口情况<br />
-煤炭化学品行业区域竞争态势<br />
-工厂设计技术与安全策略<br />
-产业政策及环保规定<br />
-煤炭化学品项目投资财务评估分析<br />
-投资风险及对策<br />
-煤炭化学品项目可行性投资建议
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	【报告目录】<br />
第一章 煤炭化学品行业市场现状剖析<br />
第一节 产品行业现状及发展前景&nbsp;<br />
一、产品行业现状&nbsp;<br />
二、产品行业发展前景&nbsp;<br />
三、产品商业零售行业现状与发展前景<br />
第二节 市场分析&nbsp;<br />
一、目标市场<br />
二、市场潜力<br />
三、市场增长预测<br />
四、市场份额&nbsp;<br />
第三节 市场竞争及对策<br />
一、市场竞争情况&nbsp;<br />
二、竞争对策&nbsp;<br />
第四节 煤炭化学品定义及产业链分析<br />
一、煤炭化学品定义<br />
二、煤炭化学品产业链分析<br />
三、产业链模型介绍<br />
四、煤炭化学品产业链模型分析<br />
第五节 生产工艺技术进展及当前发展趋势
</p>
<p style="text-indent:2em;">
	第二章 煤炭化学品上游原材料供需评估<br />
第一节 原材料<br />
一、主要原材料<br />
二、上游原材料供应现状剖析<br />
三、原材料市场需求现状供应情况预测<br />
四、原材料市场供需变动因素分析<br />
第二节 主要原材料价格现状及预测<br />
一、2005-2011年价格状况分析<br />
二、2012-2016年价格预测分析
</p>
<p style="text-indent:2em;">
	第三章 国内外煤炭化学品生产消费情况分析<br />
第一节 2005-2011年国内外产品产能及产量概况<br />
一、2005-2011年国内产品产能及产量概况<br />
二、2005-2011年国外产品产能及产量概况<br />
第二节 2005-2011年国内外产品消费总体情况<br />
一、2005-2011年国内产品消费总体情况<br />
二、2005-2011年国外产品消费总体情况<br />
第三节 2005-2011年国内外产品主要消费领域<br />
一、2005-2011年国内产品主要消费领域<br />
二、2005-2011年国外产品主要消费领域<br />
第四节 国内外产品价格水平及其变动趋势<br />
一、国内产品价格水平及其变动趋势<br />
二、国外产品价格水平及其变动趋势<br />
第五节 产品的经销模式<br />
第六节 国内产品需求特点及地域分布分析<br />
第七节 2012-2016年国内供需格局预测<br />
第八节 2012-2016年产品市场盈利预测
</p>
<p style="text-indent:2em;">
	第四章 国内外煤炭化学品主要生产企业<br />
第一节 国外主要生产企业<br />
一、企业简介<br />
二、企业主营业务及产品<br />
三、企业总体经营情况分析<br />
（一）企业资产情况<br />
（二）盈利情况<br />
（三）投资情况<br />
四、企业投资经营策略<br />
（一）市场营销策略<br />
（二）投资策略<br />
（三）近期投资项目及未来业务规划情况<br />
五、2005-2011年企业产销量分析<br />
六、2012-2016年企业产销量预测<br />
第二节 国内主要生产企业<br />
一、企业简介<br />
二、企业主营业务及产品<br />
三、企业总体经营情况分析<br />
（一）企业资产情况<br />
（二）盈利情况<br />
（三）投资情况<br />
四、企业投资经营策略<br />
（一）市场营销策略<br />
（二）投资策略<br />
（三）近期投资项目及未来业务规划情况<br />
五、2005-2011年企业产销量分析<br />
六、2012-2016年企业产销量预测<br />
第三节2012-2016年国外产品生产消费情况的线性模型预测<br />
（具体企业详情请见报告内容）
</p>
<p style="text-indent:2em;">
	第五章 国内煤炭化学品产品价格走势及影响因素分析<br />
第一节 国内产品2005-2011年价格回顾<br />
第二节 国内产品当前市场价格及评述<br />
第三节 国内产品价格影响因素分析<br />
第四节 2012-2016年国内产品未来价格走势预测<br />
第六章 煤炭化学品进出口市场分析<br />
第一节 代表性国家和地区进出口市场分析<br />
第二节 全球进出口市场价格互动机制研究<br />
第三节 国内产品2009-2011年进出口数据分析<br />
第四节 2012-2016年国内产品未来进出口情况预测
</p>
<p style="text-indent:2em;">
	第七章 煤炭化学品产业用户分析<br />
第一节 煤炭化学品产业用户认知程度<br />
第二节 煤炭化学品产业用户关注因素<br />
第三节 用户的其它特性<br />
第四节 产品新市场开发潜力分析
</p>
<p style="text-indent:2em;">
	第八章 煤炭化学品产业渠道剖析<br />
第一节 渠道格局<br />
第二节 渠道形式<br />
第三节 渠道要素对比<br />
第四节 各区域主要代理商情况<br />
第五节 产业渠道定价策略<br />
一、煤炭化学品产品第一次定价策略<br />
二、煤炭化学品产品调价策略<br />
第六节 产品生产及销售投资运作模式分析<br />
一、国内生产企业投资运作模式&nbsp;<br />
二、国内营销企业投资运作模式<br />
三、外销与内销优势分析
</p>
<p style="text-indent:2em;">
	第九章 低碳经济对煤炭化学品行业的机遇与挑战<br />
第一节“低碳经济”提出的背景及概念<br />
第二节 低碳经济在中国的发展现状<br />
第三节 低碳技术创新在企业经济效益中的体现<br />
第四节 “碳关税”对进出口企业的影响<br />
第五节 “低碳认证”剖析<br />
第六节 中小企业应对“低碳经济”的策略<br />
第七节 “低碳经济”产业政策与发展风险
</p>
<p style="text-indent:2em;">
	第十章 我国煤炭化学品产业发展市场研究模型分析<br />
第一节“波特五力模型”分析<br />
一、供应商的讨价还价能力<br />
二、购买者的讨价还价能力<br />
三、潜在竞争者进入的能力<br />
四、替代品的替代能力<br />
五、行业内竞争者竞争能力<br />
第二节 SWOT模型分析<br />
一、优势<br />
二、劣势<br />
三、机会<br />
四、威胁
</p>
<p style="text-indent:2em;">
	第十一章 中国主要区域煤炭化学品行业竞争态势分析预测<br />
第一节 华东地区<br />
第二节 华北地区<br />
第三节 华中地区<br />
第四节 西北地区<br />
第五节 南部地区<br />
第六节 西部地区
</p>
<p style="text-indent:2em;">
	第十二章 宏观产业政策及环保规定<br />
第一节 国内相关产业政策<br />
第二节 国外相关产业政策<br />
第三节 国内相关环保规定<br />
第四节 国外相关环保规定
</p>
<p style="text-indent:2em;">
	第十三章 煤炭化学品行业投资风险及对策分析<br />
第一节 中国煤炭化学品行业投资风险分析<br />
一、市场风险<br />
二、竞争风险<br />
三、原材料价格变动风险<br />
四、技术风险<br />
五、经营管理风险<br />
六、融资风险<br />
第二节 煤炭化学品行业投资风险对策分析
</p>
<p style="text-indent:2em;">
	第十四章 工厂设计技术与安全策略建议<br />
第一节 厂址及厂区平面布局的对策措施<br />
第二节 工艺流程安全设计<br />
第三节 单元区域规划<br />
第四节 设备维护建议（防火、防爆对策措施）<br />
第五节 公用工程设施安全分析建议
</p>
<p style="text-indent:2em;">
	第十五章 煤炭化学品行业项目可行性投资建议<br />
第一节 建议项目规模<br />
第二节 建议投资区域<br />
第三节 投资策略<br />
一、品牌策略<br />
二、价格策略<br />
三、服务市场定位与组合策略<br />
四、销售方式与渠道营销策略<br />
五、广告策略<br />
六、促销策略<br />
七、公关策略<br />
第四节 发展战略
</p>
<p style="text-indent:2em;">
	第十六章 煤炭化学品项目财务指标评估分析<br />
第一节 经营效率评估分析<br />
第二节 毛利率评估分析<br />
第三节 项目利税评估分析<br />
第四节 净利润评估分析<br />
第五节 投资回报率评估分析
</p>
<p style="text-indent:2em;">
	第十七章 煤炭化学品项目投资注意事项分析<br />
第一节 产品技术应用注意事项<br />
第二节 项目投资注意事项<br />
第三节 产品生产开发注意事项<br />
第四节 产品销售注意事项<br />
第五节 配套管理体制注意事项
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	以下内容略......
</p>','煤炭化学品','诺美咨询','诺美咨询','1399359792','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	煤炭行业投资形势及产业运行策略深度调研报告-&nbsp;用途
</p>
<p style="text-indent:2em;">
	·&nbsp;此报告是煤炭行业企业中高层管理人员掌握市场行情、剖析竞争对手、洞悉行业发展趋势的有力参考资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;是行业新进入者了解市场现状、发掘投资机会、明确产品定位的必备调研资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;是咨询公司、广告策划公司快速、深入地掌握行业现状和发展趋势的深度分析资料；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;是私募基金公司、风险投资公司及其它投资机构摸清行业盈利能力和增长趋势，深入调查行业内重点企业的得力助手；&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;同时适用于其它需要对煤炭行业进行全面市场调研的机构或个人。
</p>
<p style="text-indent:2em;">
	煤炭行业投资形势及产业运行策略深度调研报告-主要分析指标
</p>
<p style="text-indent:2em;">
	·&nbsp;煤炭行业投资环境<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;煤炭行业上下游产业链<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;行业市场现状剖析<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;煤炭行业竞争格局<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;行业区域结构分析<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;产业政策驱动力分析<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;优势企业产销情况<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;项目运行策略建议<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;渠道及价格策略<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;行业发展前景预测<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;行业投资建议
</p>
<p style="text-indent:2em;">
	煤炭行业投资形势及产业运行策略深度调研报告-选择诺美咨询的理由
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	·&nbsp;诺美咨询对煤炭行业项目进行全面且必要的前期市场调查与市场趋势预测；&nbsp;<br />
·&nbsp;采用国家统计局、工商局、税务局、海关总署、国务院发展研究中心、发改委、商务部等权威部门的数据；&nbsp;<br />
·&nbsp;长期聘请多名行业资深专家，对核心数据与观点进行反复论证；&nbsp;<br />
·&nbsp;结合行业历年供需关系变化规律，对我国煤炭行业发展趋势做出了定性与定量相结合的分析预测；&nbsp;<br />
·&nbsp;为企业制定发展战略、进行投资决策和企业经营管理提供权威、充分、可靠的决策依据与建议。
</p>','煤炭行业','诺美咨询','诺美咨询','1399359806','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	煤炭化学品行业竞争运行状况调研与盈利模式咨询报告-选择诺美咨询的理由
</p>
<p style="text-indent:2em;">
	<ul>
		<li>
			诺美咨询对煤炭化学品行业项目进行全面且必要的前期市场调查与市场趋势预测；
		</li>
		<li>
			采用国家统计局、工商局、税务局、海关总署、国务院发展研究中心、发改委、商务部等权威部门的数据；
		</li>
		<li>
			长期聘请多名行业资深专家，对核心数据与观点进行反复论证；
		</li>
		<li>
			结合行业历年供需关系变化规律，对我国煤炭化学品行业发展趋势做出了定性与定量相结合的分析预测；
		</li>
		<li>
			为企业制定发展战略、进行投资决策和企业经营管理提供权威、充分、可靠的决策依据与建议。
		</li>
	</ul>
</p>
<div>
	煤炭化学品行业竞争运行状况调研与盈利模式咨询报告-&nbsp;用途
</div>
<p style="text-indent:2em;">
	<ul>
		<li>
			是行业新进入者了解市场现状、发掘投资机会、明确产品定位的必备调研资料；
		</li>
		<li>
			此报告是煤炭化学品行业企业中高层管理人员掌握市场行情、剖析竞争对手、洞悉行业发展趋势的有力参考资料；
		</li>
		<li>
			是咨询公司、广告策划公司快速、深入地掌握行业现状和发展趋势的深度分析资料；
		</li>
		<li>
			是私募基金公司、风险投资公司及其它投资机构摸清行业盈利能力和增长趋势，深入调查行业内重点企业的得力助手；
		</li>
		<li>
			同时适用于其它需要对煤炭化学品行业进行全面市场调研的机构或个人。
		</li>
	</ul>
</p>
<p style="text-indent:2em;">
	煤炭化学品行业竞争运行状况调研与盈利模式咨询报告-主要分析指标
</p>
<p style="text-indent:2em;">
	<ul>
		<li>
			全球煤炭化学品市场发展形势
		</li>
		<li>
			国内煤炭化学品行业市场现状剖析
		</li>
		<li>
			国内外主要企业竞争态势
		</li>
		<li>
			外资企业在华运营情况
		</li>
		<li>
			优势企业产销数据
		</li>
		<li>
			煤炭化学品行业竞争格局
		</li>
		<li>
			煤炭化学品行业市场集中度分析
		</li>
		<li>
			企业提高竞争力的途径
		</li>
		<li>
			煤炭化学品行业盈利模式
		</li>
		<li>
			优势企业经济指标分析
		</li>
		<li>
			项目投资盈利前景预测
		</li>
	</ul>
</p>','煤炭化学品','诺美咨询','诺美咨询','1399359780','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机遇与风险并存<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; “十二五”时期，<a href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=titlekeyword&amp;q=%C3%BA%CC%BF">煤炭</a>行业发展面临的形势更加复杂，虽然有不少机遇，但是，各种困难和挑战也更加严重。“十二五”期间，我国经济将继续保持平稳较快发展，能源需求呈现稳步增长态势。与之相应的是，我国油气资源相对不足，煤炭占化石能源资源储量的94％，煤炭主体能源地位还难以改变，煤炭消费总量仍将延续增长态势。但是，“十二五”规划纲要也提出，要合理控制能源消费总量，明确总量控制目标和分解落实机制。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 王显政说，远期来看，煤炭市场面临四大风险。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 一是煤炭资源保障程度低，资源供应面临潜在风险。我国大型整装煤田主要集中在晋陕蒙宁和新疆地区，其他大部分产煤地区资源赋存条件较差。煤炭资源开发越来越向晋陕蒙宁等西部地区集中，煤炭调出区与主要消费区的距离增加；原来一些煤炭调出省逐渐转为煤炭调入省，全国煤炭安全稳定供应保障的难度加大。特别要关注进入“十三五”以后，全国煤炭需求量在40 亿吨以上，而且还在逐年增长的煤炭资源保障问题。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 二是矿井数量多，产业布局趋同，非煤产值效益低，结构调整面临挑战。我国小型煤矿数量多，生产集中度低。目前，全国30 万吨以下的小型煤矿有1.2 万多处，占全国煤矿总数的80%以上。开采深度增加，煤炭生产风险增加。目前全国已经有千米深井39 处（其中，山东24 处、江苏5 处、辽宁7 处、河北2 处、安徽1处），最深的达到1450 米。煤矿深部开采面临的冲击地压、地热、高承压水、瓦斯等自然灾害与职业健康问题。在煤化工产业发展进程中，也存在“逢煤必化”、“以煤养化”、重复建设、产能过剩的问题。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 三是煤炭生产消费持续大幅增长，环境问题凸显，生态环境约束强化。目前，全国煤矿采空区土地塌陷累计达100 万公顷左右，每年新增采空区6 万公顷左右；煤矸石堆积占用大量土地，并造成严重土壤污染；二氧化硫、氮氧化物和有害重金属排放不断增加，酸雨面积达120 万平方公里。由于我国持续快速的煤炭消费增长，温室气体排放居高不下，面临着更加严峻的国际社会舆论压力。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 四是发展理念亟待更新，企业内部风险管理亟待加强。近年来，煤炭行业实现了快速发展，取得了辉煌成绩，难能可贵，但要实现转变经济发展方式，还有大量工作要做：实现煤炭工业由数量速度型向质量效益型转变的任务还很艰巨，距离落实科教兴煤战略、提升煤炭工业发展的科学化水平还有较大差距，加强人才培养、建设和谐矿区任重而道远。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;警惕煤炭产能过剩<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 王显政不止一次地提醒煤炭企业应警惕煤炭产能过剩，防止市场出现大起大落。他说：“现阶段，受国际金融危机深度影响，我国经济增速下行，煤炭市场需求放缓、价格下滑，煤炭产能过剩压力显现。”<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 他指出，近10 多年来，在市场需求大幅增长、煤炭价格上升、行业效益好转等多重因素引导下，煤炭产能建设速度加快，煤炭产量大幅增加。从煤炭投资与产能建设分析，“ 十一五”期间共完成投资1.25 万亿元，加上2011 年的4700 亿元，共计1.72 万亿元，按800 元/ 吨产能建设计算，可形成产能21 亿吨，其中5 亿吨转入“ 十三五”，“ 十二五”净增产能16 亿吨，加上现有煤矿产能，全国煤矿总产能近期过剩的问题明显。自去年第四季度以来，煤炭市场需求增速回落，价格下滑，库存增加，企业应收账款增加。从目前的数据来看，秦皇岛5500 大卡市场动力煤价格由去年11 月中旬的860 元/吨下降到目前的760 元/吨左右，下降100 元/吨。1 月末，重点发电企业存煤8078 万吨，可用22 天；2 月21 日，秦皇岛港存煤达到822 万吨，创历史新高；2011年全国大型煤炭企业应收账款达到1650 多亿元。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 他预测，今年二季度以前，全国煤炭市场将继续保持供需总体平衡、相对宽松态势。“ 煤炭企业要充分认识煤炭市场所面临的需求增长放缓及产能快速增长的形势，在确保安全的前提下，科学组织生产，按照市场需求适当调控产量，促进煤炭供需平衡，防止市场出现大起大落。”','煤炭业','诺美咨询','诺美咨询','1399359805','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	目 录<br />
第一章 项目概要<br />
1.1 项目公司<br />
1.2 项目简介<br />
1.3 客户基础<br />
1.4 市场机遇<br />
1.5 项目投资价值<br />
1.6 项目资金及合作<br />
1.7 项目成功关键<br />
1.8 公司使命<br />
1.9 经济目标<br />
第二章 公司介绍<br />
2.1 公司组织结构<br />
2.2 [历史]财务经营状况<br />
2.3 公司地理位置<br />
2.4 公司发展战略<br />
2.5 公司内部控制管理<br />
第三章 项目介绍<br />
3.1 金融项目开发目标<br />
3.2 金融项目开发思路<br />
3.3 金融服务条件同样资源<br />
3.4 项目地理位置与背景<br />
3.4.1 项目所在省会<br />
3.4.2 项目所在城市<br />
3.6 项目建设基本方案<br />
3.6.1 规划建设年限与阶段<br />
3.6.2 项目规划建设依据<br />
第四章 市场分析<br />
4.1 中国金融市场<br />
4.2 区域金融市场发展趋势<br />
4.3 城市金融市场发展特点<br />
4.4 目标市场分析<br />
4.6 竞争对手分析<br />
第五章 发展战略与实施计划<br />
5.1 执行战略<br />
5.2 竞争策略<br />
5.3 营销策略<br />
5.3.1 客源市场定位<br />
5.3.2 定价策略<br />
5.3.3 宣传促销策略<br />
5.3.4 整合传播策略与措施<br />
5.3.5 网络营销策略<br />
5.4 战略合作伙伴<br />
5.5 项目实施进度<br />
第六章 项目SWOT综合分析<br />
6.1 优势分析<br />
6.2 弱势分析<br />
6.3 机会分析<br />
6.4 威胁分析<br />
6.5 SWOT综合分析<br />
第七章 项目管理与人员计划<br />
7.1 项目管理<br />
7.2 服务质量控制系统<br />
7.3 项目工程进度管理体系<br />
7.4 人力资源开发及管理<br />
第八章 风险分析与规避对策<br />
8.1 风险分析<br />
8.2 风险规避<br />
第九章 投入估算与资金筹措<br />
9.1 项目融资需求与贷款方式<br />
9.2 项目资金使用计划<br />
9.3 融资资金使用计划<br />
9.4 贷款方式及还款保证<br />
第十章 财务预算<br />
10.1 收入预测<br />
10.2 财务假设与条件<br />
10.3 项目总成本与盈利估算<br />
10.4 项目现金流量<br />
10.5 项目重要财务指针<br />
10.6 盈亏平衡分析<br />
10.7 敏感性分析<br />
第十一章 公司无形资产价值分析<br />
11.1 分析方法的选择<br />
11.2 收益年限的确定<br />
11.3 基本数据<br />
11.4 无形资产价值的确定
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	附件<br />
.1 财务报表<br />
.2 相关证明文件
</p>','灯具零配件','诺美咨询','诺美咨询','1399359781','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	导读：《<a target="_blank" href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=title&amp;q=%C5%A9%B2%FA%C6%B7">农产品</a>深加工项目商业计划书》做为农产品深加工项目方全面展示自己综合实力的有效载体，从项目方所在行业的影响力、技术及产品的竞争优势、管理团体能力及市场运作能力、项目的风险控制能力和对资金的使用安排及企业长远战略规划等方面做了科学系统的描述，为投资方提供一个透明公正的沟通接口，提高效率降低成本；农产品深加工项目可以实现社会效益和经济效益的双赢目标，同时实现融资方和投资方共赢的最终目的。
</p>
<p style="text-indent:2em;">
	目录<br />
1、概述&nbsp;<br />
1.1项目概况&nbsp;<br />
1.1.1 项目名称&nbsp;<br />
1.1.2 项目性质&nbsp;<br />
1.1.3 项目建设单位&nbsp;<br />
1.1.4 建设地点&nbsp;<br />
1.1.5 建设规模&nbsp;<br />
1.1.6 建设期&nbsp;<br />
1.1.7 建设内容&nbsp;<br />
1.1.8 投资情况&nbsp;<br />
1.1.9 经济效益&nbsp;<br />
1.1.10 战略目标&nbsp;
</p>
<p style="text-indent:2em;">
	2、项目单位简介&nbsp;
</p>
<p style="text-indent:2em;">
	3、营养与产品&nbsp;<br />
3.1 大米产品&nbsp;<br />
3.2 小麦面粉产品&nbsp;<br />
3.3 植酸钙&nbsp;<br />
3.4 小麦白蛋白&nbsp;
</p>
<p style="text-indent:2em;">
	4、市场&nbsp;<br />
4.1 国外情况&nbsp;<br />
4.2 国内情况&nbsp;<br />
4.1.1 国内现状&nbsp;<br />
4.1.2 发展趋势&nbsp;
</p>
<p style="text-indent:2em;">
	5、优势分析&nbsp;<br />
5.1 区位优势&nbsp;<br />
5.1.1 地理位置&nbsp;<br />
5.1.2 交通优势&nbsp;<br />
5.1.3 能源条件优越&nbsp;<br />
5.2 农业优势&nbsp;<br />
5.3 政策<br />
&nbsp;<br />
6、建设基本方案&nbsp;<br />
6.1 大米加工&nbsp;<br />
6.2 面粉加工&nbsp;<br />
6.3 植酸钙&nbsp;<br />
6.4 小麦白蛋白制品&nbsp;<br />
6.5&nbsp;<a target="_blank" href="http://www.chinaprcc.com/a/jienenpinggubaogao/jiedu_zhengce/20111030/234.html">低碳经济</a>&nbsp;<br />
6.6&nbsp;<a target="_blank" href="http://www.chinaprcc.com/plus/search.php?kwtype=0&amp;searchtype=title&amp;q=%C8%C8%B1%C3">热泵</a>技术
</p>
<p style="text-indent:2em;">
	7、风险分析&nbsp;<br />
7.1 产品的市场分析&nbsp;<br />
7.2 风险分析和评价&nbsp;<br />
7.3 风险控制措施<br />
&nbsp;<br />
8、产品研究开发&nbsp;<br />
8.1 技术研究开发中心&nbsp;<br />
8.2 团队建设&nbsp;<br />
8.3 学术活动&nbsp;<br />
8.4 知识产权保护<br />
&nbsp;<br />
9、竞争策略&nbsp;<br />
9.1 品牌绿色形象&nbsp;<br />
9.2 广告宣传策略&nbsp;<br />
9.3 价格战略&nbsp;<br />
9.4 公关战略&nbsp;<br />
9.5 渠道战略&nbsp;<br />
9.6 营销人员管理策略&nbsp;<br />
9.7 技术创新战略&nbsp;<br />
9.8 产品组合战略&nbsp;<br />
9.9 国际市场进入策略&nbsp;<br />
9.10 人力资源激励与开发战略&nbsp;
</p>
<p style="text-indent:2em;">
	10、企业CIS战略&nbsp;<br />
10.1 公司MI（MIND IDENTITY）&nbsp;<br />
10.2 公司BI（BEHAVIOR IDENTITY）&nbsp;<br />
10.3 品牌<br />
&nbsp;<br />
11、公司管理&nbsp;&nbsp;<a target="_blank" href="http://www.chinaprcc.com/plus/list.php?tid=32">管理咨询</a><br />
11.1 公司组织结构&nbsp;<br />
11.2 关键人员引进&nbsp;<br />
11.1.1 公司生产管理&nbsp;<br />
11.1.2 成本费用分析与控制&nbsp;<br />
1.3 质量管理&nbsp;<br />
1.4 物流管理&nbsp;<br />
1.5 组织管理战略
</p>
<p style="text-indent:2em;">
	12、财务预测与分析&nbsp;<br />
12.1 投资估算&nbsp;<br />
12.2 生产班制及人员安排&nbsp;<br />
12.3 经济效益&nbsp;<br />
12.4 财务分析结论<br />
&nbsp;<br />
13、资金投入与退出&nbsp;<br />
13.1 投资建议&nbsp;<br />
13.1.1 融资方式：&nbsp;<br />
13.1.2 股本结构&nbsp;<br />
13.2 投资者权力安排&nbsp;<br />
13.3 投资者介入程度&nbsp;<br />
13.4 资金退出&nbsp;<br />
13.4.1 股份转让&nbsp;<br />
13.4.2 股份上市&nbsp;<br />
13.4.3 公司清算&nbsp;
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	14、结论&nbsp;<br />
14.1&nbsp;<a target="_blank" href="http://www.chinaprcc.com/plus/list.php?tid=59">项目管理</a>团队&nbsp;&nbsp;<br />
14.2 项目发展战略体系及实施策略&nbsp;<br />
14.3 项目市场前景&nbsp;<br />
14.4 项目定位&nbsp;<br />
14.5 项目监督机制&nbsp;<br />
14.6 项目政策性&nbsp;<br />
14.7 结束语&nbsp;
</p>','农产品深加工','诺美咨询','诺美咨询','1399359807','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	<strong></strong><span><strong><span style="color:#E53333;">规划范围</span></strong><br />
</span>
</p>
<div style="text-align:center;">
	<img src="/e/attached/image/20140507/20140507020441_59666.jpg" alt="" /> 
</div>
<p>
	<br />
</p>
<p style="vertical-align:baseline;">
	    以物流基地发展为契机，进一步突出半壁山镇物流节点的重要性，为环首都经济圈注入新的活力；以综合性物流基地（物流园区、物流中心、农产品展示展销、旅游开发等）建设、运营为主导，推动具有竞争优势的产业聚集，并积极配套相关交通基础设，促进多式联运发展；以现代化的信息对接平台建设为支撑，提升物流及配套产业服务水平；以土地、财税、金融、交通管理等政策为导向，促进企业物流向社会化物流转化，整合各方面资源并合理分配，促进第三方物流业发展壮大；以体制、机制创新为重点，营造有利于半壁山镇现代物流业发展的政策环境、服务环境和组织管理体制。
</p>
<br />
<p style="vertical-align:baseline;">
	<span style="color:#E53333;"><strong>项目总平图<br />
<br />
</strong></span>
</p>
<div style="text-align:center;">
	<strong><strong><img src="/e/attached/image/20140507/20140507020630_18681.jpg" alt="" /></strong> </strong>
</div>
<p>
	<br />
</p>
<br />
<br />
<p>
	<br />
</p>','河北省兴隆县半壁山国际物流园区规划','诺美咨询','诺美咨询','1399428609','nuomei','0','0','0','0','0','0','upload/2014-05/07/201405071004_4952.jpg','0','','','0','','','以物流基地发展为契机，进一步突出半壁山镇物流节点的重要性','','0','','null','')<{|}>

	<br />
</p>
<div style="text-align:left;">
	<p class="MsoNormal">
		<strong><span style="color:#E53333;">地理位置</span></strong> 
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　郑州国际物流园区位于郑州经济技术开发区以南，郑州航空港区以北，京珠高速以东，规划面积<span>85</span>平方公里。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		<strong><span style="color:#E53333;">功能分区</span></strong> 
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　郑州国际物流园区包括两个集装箱中心站、两个公路物流港和一个综合保税港区。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		<strong><span style="color:#E53333;">发展思路</span></strong> 
	</p>
	<p class="MsoNormal">
		<span style="color:#E53333;"><strong>&nbsp;</strong></span> 
	</p>
	<p class="MsoNormal">
		　　园区自成立以来，认真贯彻实施省、市产业发展战略，主动融入郑州都市区建设，努力构建支撑郑州都市区、中原经济区发展的现代物流服务网络和体系，并以此为基础，确定了园区的发展思路：
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　复合发展：主动承接郑州都市区的产业转移、功能转移，突出现代物流产业的发展特色。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　高端发展：依托郑州优越的区位优势，以培育产业链上下游协同和提高综合配套能力为核心，引导单一物流服务功能向物流产业链的深度和广度延伸。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　创新发展：以企业为主体，以创新驱动发展为路径，推进技术创新和机制创新，构建国家物流标准推广示范和物流新技术推广应用的平台，不断提高科技创新能力和整体发展水平。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　集约发展：统筹规划、协调推进，引领企业集中布局、产业集群发展、资源集约利用、功能集合构建，共享基础设施、商务服务资源，实现规模效益最优化。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　生态发展：尊重既有生态环境，整合自然资源，建设公共绿地、防护绿地、生态廊道和园区水系相结合的“蓝脉绿网”，创造人工环境与自然环境和谐共存、可持续发展的生态型园区。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span> 
	</p>
	<p class="MsoNormal">
		　　开放发展：以陆港体系建设为先导，强化公、铁、海、空等多种运输方式的高效衔接；以聚集国际知名物流服务品牌为手段，建设全球化的物流服务网络。
	</p>
<br />
</div>
<p>
	<br />
</p>','河南郑州国际物流园区案例','诺美咨询','诺美咨询','1399428634','nuomei','0','0','0','0','0','0','upload/2014-05/07/201405071008_8742.jpg','0','','','0','','','　　郑州国际物流园区位于郑州经济技术开发区以南，郑州航空港区以北，京珠高速以东，规划面积85平方公里。','','0','','null','')<{|}>

	　　工程咨询是指遵循独立、科学、公正的原则，运用工程技术、科学技术、经济管理和法律法规等多学科方面工程类<span>-</span>效果图的知识和经验，为政府部门、项目业主及其他各类客户的工程建设项目决策和管理提供咨询活动的智力服务，包括前期立项阶段咨询、勘察设计阶段咨询、施工阶段咨询、投产或交付使用后的评价等工作。工程咨询在国际上已有一百多年历史，在中国则是改革开放后出现的新事物、新用语。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">根据《工程咨询业管理暂行办法》规定，工程咨询的业务范围包括下述四个方面：</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　一、为国家、行业、地区、城镇、工业区等的经济发展提供规划和政策咨询或专题咨询；
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　二、为国内外各类工程项目提供全过程或分阶段的咨询；</span>
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　三、为现有企业的技术改造和管理提供咨询；</span>
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　四、为国内外客户提供投资选择、市场调查、概预算审查和资产评估等咨询服务。</span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">服务范围</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（一）规划咨询：含行业、专项和区域发展规划咨询；如城市规划咨询指与城市规划各阶段有关的各类咨询业务，包括城市总体规划阶段的城市性质、城市功能、城市规模、城市容量、城市发展形态等的咨询；城市控制性详细规划阶段对各类规划控制指标的确定及分析，包括建设用地性质、建筑高度、建筑密度、容积率、绿地率、区域交通规划研究、路网骨架构成及道路规划方案、设计方案及初步设计阶段咨询。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（二）编制项目建议书（含项目投资机会研究、预可行性研究）；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（三）编制项目可行性研究报告、项目申请报告、资金申请报告和节能评估报告；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（四）评估咨询：含项目建议书、可行性研究报告、项目申请报告、资金申请报告评估、节能评审报告，以及项目后评价、概预决算审查等；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（五）工程设计；指导项目设计单位进行各阶段设计工作，依据国家现行的设计规范、地方的规划要求，对各阶段设计成果文件进行复核及审查，纠正偏差和错误，提出优化建议，出具咨询报告。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">专业划分</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　工程咨询单位专业资格，按照以下<span>31</span>个专业划分：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（一）公路
</p>
<p class="MsoNormal">
	　　（二）铁路
</p>
<p class="MsoNormal">
	　　（三）城市轨道交通
</p>
<p class="MsoNormal">
	　　（四）民航
</p>
<p class="MsoNormal">
	　　（五）水电
</p>
<p class="MsoNormal">
	　　（六）核电、核工业
</p>
<p class="MsoNormal">
	　　（七）火电
</p>
<p class="MsoNormal">
	　　（八）煤炭
</p>
<p class="MsoNormal">
	　　（九）石油天然气
</p>
<p class="MsoNormal">
	　　（十）石化
</p>
<p class="MsoNormal">
	　　（十一）化工、医药
</p>
<p class="MsoNormal">
	　　（十二）建筑材料
</p>
<p class="MsoNormal">
	　　（十三）机械
</p>
<p class="MsoNormal">
	　　（十四）电子
</p>
<p class="MsoNormal">
	　　（十五）轻工
</p>
<p class="MsoNormal">
	　　（十六）纺织、化纤
</p>
<p class="MsoNormal">
	　　（十七）钢铁
</p>
<p class="MsoNormal">
	　　（十八）有色冶金
</p>
<p class="MsoNormal">
	　　（十九）农业
</p>
<p class="MsoNormal">
	　　（二十）林业
</p>
<p class="MsoNormal">
	　　（二十一）通信信息
</p>
<p class="MsoNormal">
	　　（二十二）广播电影电视
</p>
<p class="MsoNormal">
	　　（二十三）水文地质、工程测量、岩土工程
</p>
<p class="MsoNormal">
	　　（二十四）水利工程
</p>
<p class="MsoNormal">
	　　（二十五）港口河海工程
</p>
<p class="MsoNormal">
	　　（二十六）生态建设和环境工程
</p>
<p class="MsoNormal">
	　　（二十七）市政公用工程
</p>
<p class="MsoNormal">
	　　（二十八）建筑
</p>
<p class="MsoNormal">
	　　（二十九）城市规划
</p>
<p class="MsoNormal">
	　　（三十）综合经济（不受具体专业限制）
</p>
<p class="MsoNormal">
	　　<span>(</span>三十一<span>)</span>其他（按具体专业填写）。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<strong><span style="color:#E53333;">收费标准</span></strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　按照《国家计委关于印发建设项目前期工作咨询收费暂行规定的通知<span>(</span>计价格<span>[1999]1283)&nbsp; </span>》<span> ,</span>工程咨询收费具体参考如下：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　一、按建设项目估算投资额分档收费标准<span>(</span>单位：万元<span>)</span>
</p>
<p class="MsoNormal">
	<span>&nbsp;
	<table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td width="123" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">估算投资额</span><span style="font-family:Tahoma, sans-serif;"> <span></span></span>
					</p>
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">&nbsp;</span>
					</p>
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">咨询评估项目</span><span style="font-family:Tahoma, sans-serif;">&nbsp;&nbsp;&nbsp; </span>
					</p>
				</td>
				<td width="71" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">3000</span><span style="font-family:宋体;">万元</span><span style="font-family:Tahoma, sans-serif;">-1</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="83" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">1</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;">-5</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">5</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;">-10</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">10</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;">-50</span><span style="font-family:宋体;">亿元</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:Tahoma, sans-serif;">50</span><span style="font-family:宋体;">亿元以上</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
			</tr>
			<tr>
				<td width="123" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">一、编制项目建议书</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="71" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">6-14</span>
					</p>
				</td>
				<td width="83" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">14-37</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">37-55</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">55-100</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">100-125</span>
					</p>
				</td>
			</tr>
			<tr>
				<td width="123" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">二、编制可行性研究报告</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="71" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">12-28</span>
					</p>
				</td>
				<td width="83" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">28-75</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">75-110</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">110-200</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">200-250</span>
					</p>
				</td>
			</tr>
			<tr>
				<td width="123" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">三、评估项目建议书</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="71" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">4-8</span>
					</p>
				</td>
				<td width="83" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">8-12</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">12-15</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">15-17</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">17-20</span>
					</p>
				</td>
			</tr>
			<tr>
				<td width="123" valign="top">
					<p class="MsoNormal" align="left">
						<span style="font-family:宋体;">四、评估可行性研究报告</span><span style="font-family:Tahoma, sans-serif;"></span>
					</p>
				</td>
				<td width="71" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">5-10</span>
					</p>
				</td>
				<td width="83" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">10-15</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">15-20</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">20-25</span>
					</p>
				</td>
				<td width="93" valign="top">
					<p class="MsoNormal" align="center" style="text-align:center;">
						<span style="font-family:Tahoma, sans-serif;">25-35</span>
					</p>
				</td>
			</tr>
		</tbody>
	</table>
<br />
	<p class="MsoNormal" align="left">
		注：1.建设项目估算投资额是指项目建议书或者可行性研究报告的估算投资额。
	</p>
	<p class="MsoNormal" align="left">
		2. 建设项目的具体收费标准，根据估算投资额在相对应的区间内用插入法计算。
	</p>
	<p class="MsoNormal" align="left">
		3. 根据行业特点和各行业内部不同类别工程的复杂程度，计算咨询费用时可分别乘以行业调整系数和工程复杂程度调整系数（见附表二）。<br />
	</p>
	<p class="MsoNormal" align="left">
		<strong><span style="color:#E53333;">附件二</span></strong>
	</p>
	<p class="MsoNormal" align="left">
		二、按建设项目估算投资额分档收费的调整系数<br />
		<table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td width="319" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">行业</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="249" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">调整系数（以表一所列收费标准为</span><span style="font-family:Tahoma, sans-serif;">1</span><span style="font-family:宋体;">）</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
				</tr>
				<tr>
					<td width="319" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">一、行业调整系数</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
						<p class="MsoNormal" align="left">
							<span style="font-family:Tahoma, sans-serif;">1.</span><span style="font-family:宋体;">石化、化工、钢铁</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
						<p class="MsoNormal" align="left">
							<span style="font-family:Tahoma, sans-serif;">2.</span><span style="font-family:宋体;">石油、天然气、水利、水电、交通（水运）、化纤</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
						<p class="MsoNormal" align="left">
							<span style="font-family:Tahoma, sans-serif;">3.</span><span style="font-family:宋体;">有色、黄金、纺织、轻工、邮电、广播电视、医药、煤炭、火电（含核电）、机械（含船舶、航空、航天、兵器）</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
						<p class="MsoNormal" align="left">
							<span style="font-family:Tahoma, sans-serif;">4.</span><span style="font-family:宋体;">林业、商业、粮食、建筑</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
						<p class="MsoNormal" align="left">
							<span style="font-family:Tahoma, sans-serif;">5.</span><span style="font-family:宋体;">建材、交通（公路）、铁道、市政公用工程</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="249" valign="top">
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">&nbsp;</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">1.3</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">1.2</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">&nbsp;</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">1.0</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">&nbsp;</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">0.8</span>
						</p>
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">0.7</span>
						</p>
					</td>
				</tr>
				<tr>
					<td width="319" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">二、工程复杂程度调整系数</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="249" valign="top">
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">0.8-1.2</span>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="MsoNormal" align="left">
			注：工程复杂程度具体调整系数由工程咨询机构与委托单位根据各类工程情况协商确定。<br />
		</p>
		<p class="MsoNormal" align="left">
			<strong><span style="color:#E53333;">附件三</span></strong>
		</p>
		<p class="MsoNormal" align="left">
			三、工程咨询人员工日费用标准（<span style="line-height:1.5;">单位：元）</span>
		</p>
		<table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td width="284" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">咨询人员职级</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="284" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">工日费用标准</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
				</tr>
				<tr>
					<td width="284" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">一、高级专家</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="284" valign="top">
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">1000-1200</span>
						</p>
					</td>
				</tr>
				<tr>
					<td width="284" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">二、高级专业技术职称的咨询人员</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="284" valign="top">
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">800-1000</span>
						</p>
					</td>
				</tr>
				<tr>
					<td width="284" valign="top">
						<p class="MsoNormal" align="left">
							<span style="font-family:宋体;">三、中级专业技术职称的咨询人员</span><span style="font-family:Tahoma, sans-serif;"></span>
						</p>
					</td>
					<td width="284" valign="top">
						<p class="MsoNormal" align="center" style="text-align:center;">
							<span style="font-family:Tahoma, sans-serif;">600-800</span>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</p>
</span>
</p>','工程咨询','诺美咨询','诺美咨询','1399428615','nuomei','0','1','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

<span>组织诊断、组织结构设计、公司治理、部门职责与责任体系设计、事业部制改造、组织运行平台建设、集团化管控和母子公司体系设计、分权体系设计、内控体系规范与建设、全面风险管理体系建设、队伍行为职业化建设、管理流程设计与再造、业务流程设计与再造、企业改制、组织危机管理、组织变革推进、供应链管理。</span><br />
<span><br />
</span>
<p>
	<span style="color:#E53333;"><strong>项目经验：</strong></span>
</p>
<span>组织和流程咨询中心的人员自从业以来累计服务的客户超过200家，执行的咨询项目累计超过300个。</span><br />
<span><br />
</span>
<p>
	<span style="color:#E53333;"><strong>部分客户名单：</strong></span>
</p>
<span>扬子石化、中国电信、沃森生物、宏图三胞、中建钢构、滇虹药业、五矿发展、亲亲股份、人民教育出版社、中航重机、河南蓝天集团、联航食品、海南椰岛、沁和能源、一致药业、凯瑞化工、三环集团、亚宝药业、卓越教育、东北制药装备、华图教育、中原出版集团、中核钛白、中钞国鼎、信达证券、雅居乐、内蒙古富源实业、宝钢钢贸、民航房地产、得益乳业、仁和集团、原子高科、中弘卓业、鲁滨首饰、安徽高速广告公司、西安中建地产、中冶置业、山西煤炭运销集团、泰欣照明、一天电气、济南华联、大理旅游集团、海程邦达国际货运、会友线缆、海南新城区开发建设公司、中冶建筑研究总院有限公司、中央广播电视大学音像出版社、中国航空集团建设开发公司、中国兵器工业规划研究院、兰州空间技术物理研究所、江中制药、天津金利达纸业、文创太阳能……</span><br />','','','','1399428613','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

企业人力资源管理诊断及人力资源有效性分析、企业人<span style="color:#E53333;"></span>力资源管理系统设计、企业人力资源规划（数量、结构、能力提升）、职务分析与职务评价、素质模型潜能评价体系建设、企业任职资格标准体系建立、绩效考核体系设计、基于EVA的绩效考核、薪酬体系设计、以职业生涯为核心的人力资源开发体系设计、企业薪酬调查、企业招聘流程解决方案、企业高端人才猎头服务、企业员工EAP服务、人力资源外包、企业并购重组与人力资源管理整合方案设计、企业人力资源管理软件运用与人力资源管理信息化实施辅导、继任管理和企业接班人培训、基于人力资源管理的企业战略规划和组织再造。<br />
<br />
<br />
<strong><span style="color:#E53333;">项目经验：</span></strong><br />
人力资源管理咨询中心的人员从业以来累计服务的客户超过200家，执行的人力资源管理咨询项目累计超过400个。<br />
<br />
<br />
<strong><span style="color:#E53333;">部分客户名单：</span></strong><br />
新奥集团、东北制药集团、森马服饰、国信控股、首都信息、北京医大时代、丽江旅游、赤天化、兰州蓝星、南京新联电子、兵器装备集团、中国移动、中国网通、全国海关信息中心、华夏人寿、伊泰集团、亚联公务机、神东天隆集团、山西煤炭进出口集团、迈普通信、北京城建、中软股份、华立集团、玉溪红塔、中钞国鼎、青岛凯悦置业、天润置地、鹏润地产、中国航空集团资产管理公司、北京技术交易促进中心、恒泰证券、华北电力科学研究院、福建嘉达纺织、新疆神华、益丰医药、每伴食品、勐海茶业、红螺食品、天际电器、致道园林、北人印刷、二七蓝天科技培训学校、群成装饰、宏远集团、中建三局第一建设工程有限责任公司、云南省工业投资控股集团、中国工商银行青岛分行、中国电子系统工程总公司、中国石油管道公司、中国民航机场建设集团、美中互利（北京）国际贸易、天津天杰地祥生物、北京章光101科技、中航惠腾风电、首都信息发展、山东天泽规划、中国检验、中机十院国际工程、中国服装、捷成世纪、长春一汽国际物流中心、贵州安大航空锻造、杭州庄盛家具、北京亦庄国际、途牛旅游网……<br />','','','','1399428601','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

&nbsp;<br />
企业管理调查诊断系统，直接应用于如下领域：<br />
&nbsp; &nbsp; ★日常管理状态篮控(65项指标全面监控战略、运营、文化、人力资源、市场营销等、生产管理等1 5个方面的运营状态)<br />
&nbsp; &nbsp; ★行业领先企业管理状态对标分析<br />
&nbsp; &nbsp; ★战略实施进展状态监控(监控战略实施进展情况，为战略实施提供决策依据)<br />
&nbsp; &nbsp; ★员工满意度调查<br />
&nbsp; &nbsp; ★利益相关者满意度调查(股东、经销商等)<br />
&nbsp; &nbsp; ★企业文化诊断<br />
&nbsp; &nbsp; ★员工离职调查分析诊断<br />
&nbsp; &nbsp; ★岗位素质模型体系建设及落地实施平台<br />
&nbsp; &nbsp; ★岗位素质模型建模(应用和君独创的、被证明高效可靠的样本分析法)<br />
&nbsp; &nbsp; ★素质模型评价中心(在线系统平台，支持落地便捷应用)<br />
&nbsp; &nbsp; ★基于胜任素质模型的招聘、选拔、培训评估、绩效考核应用的落地实施方案<br />
&nbsp; &nbsp; ★基于胜任素质模型的人力资源配置效率评估<br />
&nbsp; &nbsp; ★在线人才测评系统，应用于如下领域：<br />
&nbsp; &nbsp; ★人才职业潜力素质测评<br />
&nbsp; &nbsp; ★员工领导力素质测评<br />
&nbsp; &nbsp; ★岗位胜任素质模型测评<br />
&nbsp; &nbsp; ★基于胜任素质模型的招聘选拔评估(用于大面积外部招聘人才的高效、精准筛选)<br />
&nbsp; &nbsp; ★团队领导力素质扫描与评估<br />
&nbsp; &nbsp; ★基于领导力素质的团队配置评估(用于组建团队、中高层管理者内部竞聘选拔)<br />
&nbsp; &nbsp; ★绩效考核在线评估系统<br />
&nbsp; &nbsp; ★基于EVA的绩效考核体系设计(员工绩效、部门绩效、团队绩效)<br />
&nbsp; &nbsp; ★360。定性考核与定量考核结合的评估模式<br />
&nbsp; &nbsp; ★便捷、高效、面向日常管理引用的在线绩效考核系统<br />
&nbsp; &nbsp; ★系统提供着眼于绩效改进与提升的深入分析功能<br />
&nbsp; &nbsp; ★后备干部选拔与继任者管理<br />
&nbsp; &nbsp; ★基于胜任素质模型对后备干部、高层管理继任者进行精准的选拔<br />
&nbsp; &nbsp; ★对后备干部、继任者的发展状况进行持续跟踪和反馈<br />
&nbsp; &nbsp; ★基于胜任素质模型对每一个后备干部、继任者提供针对性的培训提升方案<br />
&nbsp; &nbsp; ★岗位价值及薪酬在线评估分析系统<br />
&nbsp; &nbsp; ★在线岗位价值评估系统(对各个岗位提供全面、客观、精确的价值评估)<br />
&nbsp; &nbsp; ★在线薪酬评估与分析系统<br />
&nbsp; &nbsp; ★企业大学整体解决方案<br />
&nbsp; &nbsp; ★岗位学习地图(知识地图与技能地图)构建<br />
&nbsp; &nbsp; ★基于学习地图的培训课程体系构建<br />
&nbsp; &nbsp; ★企业大学E—leal’ning平台构建<br />
&nbsp; &nbsp; ★销售技能提升解决方案<br />
&nbsp; &nbsp; ★四类销售(猎手型、顾问型、关系型、展示型)模型框架<br />
&nbsp; &nbsp; ★基于四类销售模型框架的销售岗位设置合理性评估<br />
&nbsp; &nbsp; ★基于四类销售模型框架的销售人员素质选拔甄别系统<br />
&nbsp; &nbsp; ★基于四类销售模型框架的销售人员销售技能在线训练课程体系<br />
&nbsp; &nbsp; ★基于产品的销售标准语汇(话述本)定制开发<br />','','','','1399428645','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

（1）区域发展战略规划；（2）区域产业规划；（3）区域功能布局规划；（4）区域经济社会发展统筹规划；（5）园区经营商业模式设计；（6）园区开发模式设计；（7）园区经营/运营模式设计；（8）区域开发策略与实施步骤设计；（9）园区运营方管理咨询；（10）园区招商策略与招商模式设计；（11）园区招商辅导实施与招商代理；（12）区域或园区品牌核心价值定位、形象设计、管理体系与整合营销传播；（13）园区建设可行性研究；（14）会展场馆规划建设与运营管理。<br />
<strong><span style="color:#E53333;"><br />
</span></strong>
<p>
	<strong><span style="color:#E53333;">项目经验：</span></strong>
</p>
区域经济和园区规划中心的人员自从业以来累计服务的客户超过60家，执行项目累计超过70个。客户涵盖各级地方政府、经济技术开发区、高新区、产业园区、园区开发经营企业等各种类型。<br />
<strong><span style="color:#E53333;"><br />
</span></strong>
<p>
	<strong><span style="color:#E53333;">部分客户名单：</span></strong>
</p>
北京住宅建设规划、北京城市总体规划、北京轨道站点周边土地、北京土地储备规划、京津高铁亦庄站前枢纽区、北京顺义国门商务区、北京顺义新城、北京中关村永丰产业基地、北京市农委、北京市科委、北京丰台区、北京市大兴区、北京昌平区、北京密云区、北京昌平东扩新区土地、北京平谷中西论坛、北京怀柔高尔夫、北京通州永顺镇临空新村、中关村能源科技产业示范区、北京市朝阳区三间房动漫产业园、北京市朝阳区中国传媒大学传媒产业基地、华熙中环投资有限公司、北京北奥有限责任公司、上海张江高科技园区、海南新城区开发建设有限公司、苏州吴江市、苏州工业园区、深圳高新区、西安曲江文化集团、青岛北部新城、青岛四方、青岛李沧老工业区、济南西区高铁站点周边区域、安徽蚌埠城投集团、哈尔滨道外区政府、山东博远物流发展有限责任公司、新疆喀纳斯环境与旅游管理局、新疆喀纳斯环保规划局、兰州雁滩工业城总公司、廊坊开发区三浦友特园区、江西赣州城建集团有限公司、昆明湖滨生态城、天津轧钢一厂、青岛张村河、成都温江金马河区域、长春富峰镇、天津七里海、太原太钢、北京温榆河绿色生态走廊、厦门园博苑、昆明温泉山谷、成都温江金马河、青岛温泉镇高尔夫、昆明万辉星城、昆明野鸭湖、海尔雅世太原新凯、济南大学城、青岛欢乐村、长春康城、黑龙江哈尔滨道外区、鄂尔多斯市东联集团、广西北海市政府、横店影视基地、浙江新城开发区、廊坊市金有源集团、河北固安大规模开发、陕西鑫林实业、江西中油宝鹰、北京京煤集团金泰地产、河北绿洲地产、同仁医疗产业、中国华力控股、云南昆百大、云南城投集团……<br />','','','','1399428605','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','[{"image":"","show":""}]','')<{|}>

	外媒周三引述中国多家大银行官员的说法报道，中国人民银行在近期召见主要银行的高级管理人员，要求他们终止比特币相关业务，并对央行就虚拟货币的严格立场进行了进一步的强化。<br />
<br />
　　消息来源说，人民银行警告各银行，它们需要设立特别的团队来监控可能在进行比特币相关交易的账户，并声称，没有遵循这些严格规定的银行将会遭到公开谴责。<br />
<br />
　　中国人民银行最初对比特币表现出更加中立的态度，但是在2013年晚些时候，出于对虚拟货币可能被用于规避资本管制，逃避反洗钱监管等担忧而开始转变立场。央行在最近的发言中已经直接将比特币称为一种“投机工具”。<br />
<br />
　　与传统的货币不同，比特币由计算机生成，没有任何央行或者政府提供担保。中国曾经是比特币的一个关键性市场，这个世界第二大经济体对虚拟货币的需求曾导致其全球范围的价格飙升。在2013年12月4日，也就是中国人民银行发布首份对比特币业务进行限制的公告之前一天，比特币的价格是1147.25美元——根据总部设在伦敦的行业数据追踪企业Coindesk提供的指标，周三下午的时候，1比特币的市场价格是427.29美元。<br />
<br />
　　消息来源表示，在4月24日的一次会议中，来自人民银行的官员对包括五大国有银行在内的多家银行没有严格遵守央行的监管措施进行了申斥。消息来源称，央行官员在发言中说，虽然央行对这类做法提出了警告，所有五大国有银行还是继续允许开立新的比特币业务相关账户。<br />
<br />
　　以资产规模排列的中国最大银行工商银行拒绝对这一说法发表回应；建设银行、农业银行、中国银行以及交通银行均没有立即回应采访请求。人民银行没有立即对此发表回应。<br />
<br />
　　中国人民银行在2013年12月4日发送给商业银行的通知中指出，国内金融机构不得参与比特币相关的结算或者支付业务。央行也禁止信托公司和基金管理企业进行比特币相关投资，还建议保险商不要为比特币提供保险服务。<br />
<br />
　　华尔街日报在上个月曾报道，人民银行命令商业银行和支付企业在4月15日之前关闭所有比特币交易账户。<br />
<br />
　　在4月期间与主要商业银行管理人员的一次会议中，人民银行官员称比特币交易还是相当活跃，并表示各银行需要“全面认识”这类业务所具有的风险。央行官员在当时说，商业银行需要在5月10日之前发表声明，通知各自客户，使用银行账户进行比特币交易的做法已经被禁止。<br />
<br />
　　一名对央行近期发布的警告有所了解的银行官员说，“在收到央行最新的警告之后，我们正在对那些被怀疑和比特币业务有关联的账户进行清理。”<br />
<br />
　　以资产规模排列中国第四大银行的中国银行，以及列第六位的招商银行都在上个月宣布，机构和个人客户都被禁止使用在这两家银行开设的账户进行比特币交易，农业银行在周三通过网站发布了类似的声明。<br />
<br />
　　比特币在中国吸引了越来越严格的监管审查，相比美国和其他发达经济体，数字货币在该国的交易几乎完全是投机性的。在中国，仅有几家商家接受比特币作为购买商品和服务的付款形式。<br />
<br />
　　中国最大的数字货币交易所运营商BTC中国于上个月在上海安装了中国首台比特币自动提款机，并推出了一个允许个人买卖比特币的在线应用程序。不过这个自动提款机并没有与任何一家在中国的银行有关联。
</p>','','','腾讯财经','1399515016','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	根据现行成品油定价机制 “十个工作日一调”原则，国内油价新一轮调价窗口将于5月9日24时打开。中新网能源频道从多家分析机构获悉，因连日来国际原油宽幅震荡起伏，本次调价窗口或将因幅度不足50元/吨而搁浅。<br />
<br />
　　据中新网能源频道了解，自4月24日国内油价上调以后，国际油价在经历短暂上冲后，受美国原油库存连创新高打压从高位回落。受此带动，国内原油变化率在渐渐由起初的正向转向负向。中新网能源频道从卓创资讯获悉，截至第8个工作日(5月6日)卓创数据模型监测的原油变化率对应的上调幅度仅为5元/吨，依照目前调价幅度来看，此轮油价调整落空可能性极大。<br />
<br />
　　“由于国际油市担忧美国石油协会和能源署即将公布的原油库存继续攀升，原油期货价格或将延续消极走势。短期内国际原油仍存下行压力，变化率将低位震荡。而乌克兰东部城市局势依然紧张，且利比亚称重要的南部油田仍然关闭，受此支撑，原油期货价格跌势可能会较温和。”金银岛分析师于金波对中新网能源频道表示。<br />
<br />
　　他认为，近期变化率幅度将维持在0附近徘徊，本轮成品油零售价调整或难兑现。北京石油交易所分析师也表示，如在未来三个工作日无重大利好消息提振，预计国内成品油对应下调幅度在30元/吨左右，将因未达到50元/吨的调整幅度而搁浅。<br />
<br />
　　根据《石油价格管理办法(试行)》规定，国内汽柴油价格根据国际市场原油价格变化每10个工作日调整一次，当调价幅度低于50元/吨时，不作调整，纳入下次调价时累加或冲抵。<br />
<br />
　　据中新网能源频道了解，若此次调价搁浅将为今年国内油价第四次搁浅，上一轮搁浅为4月10日。截止5月7日，国内油价今年已经历三次下调、两次上调、三次搁浅。<br />
<br />
　　于金波还表示，由于本周期前期油价上扬，国内成品油市场受上调预期影响下游补货较为充足，所以目前市场仍处于去库存阶段。而搁浅的预期则让更多用户谨慎观望，入市操作稀少，目前成品油批发市场成交转入清淡。
</p>','','','中国新闻网','1399515004','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　在近日于上海举行的<span>2014</span>年中国国际化妆品、个人及家庭护理用品原料展览会（<span>PCHI</span>）上，个人及家庭护理用品生产、销售及代理商和消费者纷纷对那些设计具有时尚元素、功能多样、材质环保的个人护理用品侧目。这些具有环保、实用概念的创新个人护理用品和解决方案，备受好评。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　当今社会，消费者对自身的健康和高品质的生活越来越重视。“绿色、环保”已成为了一种健康生活、时尚生活的代名词。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　环保是产品的趋势
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　无毒安全、透明、耐磨、耐油耐水、抗霉菌的奶瓶安全级别的<span>PC</span>材料被广泛运用在<span>USB</span>消毒宝顶部遮罩中，该材料环保、实用且具有可塑性。杯子放入<span>USB</span>消毒宝消毒过程中不会产生任何异味或释放任何有毒物质。设计上更加人性化和功能多样化，凸显产品的时尚元素理念。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>USB</span>消毒宝是国内目前唯一一款专用于饮器消毒的个人护理小家电，即将于本月中旬上市。此款产品由知名电器企业格林盈璐推出。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　使用安全便捷和节能环保是该款产品的又一特性，这为办公室白领一族提供了高品质的生活保证。该产品在使用方式上，采用电脑<span>USB</span>电源供电方式：一键启动，保证安全和低能耗的同时达到最佳的消毒杀菌效果；在绿色环保方面，<span>USB</span>消毒宝通过利用臭氧，高效分解病菌细胞，从根源上破坏病菌的繁殖。臭氧在释放约<span>10</span>分钟后会自行分解成氧气，不会产生任何污染。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　格林盈璐从材质选用上把关，提供符合人体安全需要的高品质产品，体现其一贯秉承的“用材环保、对消费者健康负责”的理念。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　令环保成为一种时尚
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　环保是最有深度的时尚话题，个人护理用品行业开始关注降污、化污、消污及可氧化等一系列概念，从商品到包装、从原料材料到成分组成等细节注重对环境保护的坚持。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　随着人们对个人护理用品的安全问题越来越重视，及一些个人护理消毒产品行业负面新闻的影响，更多的人们开始喜欢选择一些绿色环保的产品。“顺应回归自然是时尚环保的潮流。而环保问题向来都是媒体的关注热点”，格林盈璐市场总监潘雪力认为，“绿色环保的产品能给公司带来许多无形的宣传，而违反环保原则的产品，可能就会成为环保主义者及媒体口诛笔伐的对象，在市场上没立足之地。这恰恰也是格林盈璐所一直密切关注的。”
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　格林盈璐凭借其自身的技术专长和有效的客户服务，不断地对其现有产品进行改善，着重在产品设计、功能及选材环保方面进行革新和开发。其个人护理用品<span>USB</span>消毒宝更是特定为办公室白领们开发设计。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　环保产品定位准确搏市场
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　格林盈璐<span>USB</span>消毒宝的市场定位是中高端消费群体，通过良好的产品质量、高效的使用效果和省心的售后服务来粘合这个消费中坚群体。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　我国是全球第三大的个人护理产品市场，仅次于美国和日本。此外，随着居民可支配收入的增加和城市化进程的加速，中国个人护理品市场每年保持着双位数的增长。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　“通过他们对我们所提供的优质产品和服务口口相传，来赢得市场对我们的信赖。”潘雪力在接受采访时说，“我国个人护理品市场潜力巨大，消费者对个人护理用品的苛求也与日俱增，对环保的诉求日益强烈。这均与格林盈璐产品的市场定位不谋而合。作为中国首家首推办公室白领个人护理用品消毒产品系列的格林盈璐来说，欲于迅速扩张的中国个人护理用品市场中争得一席之地，高品质的环保、安全产品自然是核心。”
</p>','','','中国新闻采编网','1399515051','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	未来机床的方向是数控化和逐步高端化，这些机床都需要使用大量plc和运动控制器/卡来逐步取代继电器或机械控制，使得机床的整体性能得到提升，因此从长远来看，plc和运动控制器/卡在机床行业的应用还是会很有潜力。<br />
<br />
　　数控设备是技术密集型和知识密集型的机、电一体化产品，其技术先进、结构复杂、价格昂贵，随着生产企业规模的不断扩大及设备自动化程度的不断提高，数控车间里所用的数控设备种类和数量也在不断增加。要想更好地利用数控机床，就必须对数控机床的结构功能及系统有充分的了解。<br />
<br />
　　数控机床的动作控制通常由两种方式来实现：一种是通过CNC系统的数字信息来控制，即“数字控制”，如数控机床工作台的前、后、左、右移动，主轴箱的上、下移动和围绕某一直线轴的旋转运动位移量等。这些控制是用插补计算出的理论位置与实际反馈位置比较后得到的差值对伺服进给电机进行控制而实现的。这种控制的核心是保证实现被加工零件的轮廓，即除点位加工外，各个轴的运动时刻都必须保持严格的比例关系；另一种是在数控机床运行过程中，以CNC系统内部和机床上各行程开关、传感器、按钮、继电器等开关量信号的状态为条件，并按照预先规定的逻辑顺序，对诸如主轴的开停、换向，刀具的更换，工件的夹紧、松开。液压、冷却、润滑系统的运行控制。这一类动作的控制主要是进行开关量信号的顺序控制，一般由PLC来完成。<br />
<br />
　　PLC为可编程控制器。在数控机床上所使用的PLC也称作PMC。它有以下优点：响应快。控制精度高，可靠性好，控制程序可随应用场合的不同而改变，与计算机的接口及维修方便。通常，数控机床上所使用的PLC程序包括系统程序和用户程序。其中系统程序包括监控程序、编译程序及诊断程序等，由PLC生产厂家提供，并固化在EPROM中，用户不能直接存取，也不需要用户干预。利用户程序是用户根据现场控制的需要，用PLC程序语言编制的应用程序，用以实现各种控制要求。常用的PLC程序设计语言主要有梯形囝、语句表、功能块图等。<br />
<br />
　　“机床行业在保持了近些年来的高速增长后，开始出现衰退现象，其中普通机床的影响尤为明显，库存开始增加，而数控机床的影响稍微少一些，从而给这个行业重新洗牌。而机床产品数控化高端化的发展带来巨大的plc和运动控制器/卡需求。”分析师罗百辉认为，未来机床的方向是数控化和逐步高端化，这些机床都需要使用大量plc和运动控制器/卡来逐步取代继电器或机械控制，使得机床的整体性能得到提升，从长远来看，plc和运动控制器/卡在机床行业的应用还是会很有潜力。
</p>','','','中国行业研究网','1399515035','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　这是一个“营销至上”的时代，各个品牌都在绞尽脑汁，传统的营销模式已经力不从心。在化妆品行业谈营销，会议营销是个绕不过去的槛，但会议营销发展到现在却饱受垢病。在不少企业看来，会议营销如同“鸡肋”——食之无味、弃之可惜，甚至有企业提出要取消这种营销模式。其实，模式本身无所谓好坏，看你怎么用。同样是开经销商大会，你相信吗，有些品牌居然可以做到让现场高潮持续<span>3</span>个小时，一场千人大会开到凌晨<span>1</span>点。确属业界罕见，但这确确实实是发生在九美子《印象·丽江》大会上的火爆场面。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　今年<span>3</span>月份九美子《印象·丽江》大会上，仅发布了一款产品的政策便将现场气氛引爆，持续高潮到凌晨一点。一支产品，一个政策，怎能引爆一场会议？且看曾勇是如何玩转会议营销、搭建快速分销平台的。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>Tip1</span>：选对地方，已成功一半
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在这个“谈会色变”的时代，把人请到现场，那可以说这场会已经成功一半了。但首先要清楚的是，会议邀约是面对一群开会开到烦开到怕的经销商，因此会议营销，给人的感觉功利性不能强，地点的选择、内容的安排尤为重要。但现在有一个误区就是开会一定要上豪华酒店、风景名胜，那是土豪的做派。细细研究九美子这些年来的那些场堪称行业标杆性会议，会发现九美子开会的地点与方式，从来都独具匠心，注重创造性、注重品牌理念推广。从<span>2009</span>年水立方《望，我的梦》，到<span>2010</span>年歌诗达邮轮《千人日韩赏樱之旅》，到<span>2013</span>年广州大剧院《中国好声音寻找真声音》千人大会，再到今年的玉龙雪山《印象丽江》大会，每一场会议都是用心在做，创造了“一直被模仿、从未被超越”的神话，如《印象丽江》选在气势磅礴的玉龙雪山下，既契合“美白大师”的品牌定位，又与“无需伪装，亦是最美”的品牌理念吻合。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>Tip2</span>：品牌硬实力，决定了<span>80%</span>效果
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　不论是经销商还是代理商在选择品牌的时候，其实就跟投资股票似的，保守稳健的紧跟优质股，胆大冒险的玩个潜力股，但不论优质股或潜力股，那都是有过硬实力或可预见大未来摆在眼前的。因此会议营销的效果<span>80%</span>取决于能否让参会者看到硬实力大未来。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　就拿九美子为例，每一场会议都是一部关于品牌大实力大未来的大电影，不仅提升了他们对九美子品牌的认知，加快了美白大师定位的推广。更重要的是，让经销商看到了美白大师的实力：
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　渠道强——四川、河南、广东三省将实现三年单省任务奔<span>1</span>亿。西北、华北发展迅猛，连新秀江西某区域代理商都认领了<span>1000</span>万的任务；一款面膜，誓言夺取<span>1</span>亿市场份额；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　广告多——<span>3</span>亿元广告投放，锁定浙江卫视顶级资源和其他成长性卫视；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　动销狂——终端动销王牌吸金利器、人称“痞子运动”的<span>MINI</span>演唱会以<span>250</span>场的规模席卷终端，每场<span>MINI</span>演唱会都在<span>1000</span>人以上，最高达<span>5000</span>多人。一掷千金投入，旨在掘金“粉丝经济”，促进品牌持续发展，如此疯狂，能不令人佩服？“粉丝经济”成效已初现端倪，最近九美子线上一个旗舰店，营运商首批开价<span>1000</span>万，握盘几年，渐露背后动机和实力。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　大气拓——支持力度大，<span>2000</span>台苹果<span>Ipad mini</span>开路，誓在<span>8</span>月<span>30</span>日之前将完成<span>2870</span>大店开发。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　一个个鲜活有热度的大数据，淋淋尽致的演绎了九美子品牌大实力，让身临其境的人总能真切感受到与九美子携手即将迎来的白金未来。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>Tip3</span>：倾听经销商的需求
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　会议的目的不是把货分销给经销商就完事了，商品只有卖到消费者手里才算成功。因此订货会，不要只想着分销，要与终端店主多沟通，了解他们的实际需求，共同探讨采用切实可行的具体措施将产品快速的销售到消费者手中去，为针对性极强的个性化动销方案的出台与执行奠定基础。区域内标杆性的“店王”或金牌店主的现身说法，也为终端更好的操作九美子品牌面授机宜。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　著名营销大师科特勒曾经说过，这个时代要实现“消费者”营销向“人”的营销的转化。从九美子的“会议营销”不难发现，它已经走向“人”的营销，注重合作伙伴之间的沟通，真正掌握对方需求。知己知彼，然后制定双赢政策。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>Tip4</span>：注重情感维护，遵从人性规律
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在气氛的烘托下，现场签单或许不是难事。但是否签了单就意味着大事告成？其实未然！从专业的角度来讲，路行百里半九十，要时刻具备忧患意识。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　要赢得最后的战争，你还要小心翼翼的去维护好与终端店主之间的关系，否则，对你的了解越多，反而感觉风险越大，这样的话就缺少临门一脚，竹篮打水一场空了。要遵从感情逐步加深的规律，消除对方意识中的最大风险，防止出现签了合同又反悔。这个时候，对店主的服务的提升比以往更重要。服务不是简单的派个美导过去，而是设身处地的体贴和关怀。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>Tip5</span>：敢做更要敢当，携手才有未来
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　成为合作伙伴就一劳永逸了吗？相爱容易相守难，在生意场上也是一样的道理，因此成为同心协力的合作伙伴才是终极目标。这也是永远对彼此忠诚的要求，现实是不完美的，但是畅想未来，规划远景才能一起走下去。竞争对手时时刻刻都在想着怎么撬走你的网点，你要做的工作就是对现在努力的内在说明，对品牌价值提升的未来远景，同时认真解决生活中的现有矛盾。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　因此，负责人的做法绝对不是把货压到终端店就万事大吉了，而应该和代理商一起，想办法怎么样快速的动销。彼此成为一条绳子上的蚂蚱，最终大家各得其所。这也印证了那句有名的广告语，大家好，才是真得好！
</p>','','','九州新闻网','1399515053','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　过剩时代，需求决定价格。这一定律或许在<span>2014</span>年的铁矿石市场将充分显现。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　全球铁矿石三巨头之一必和必拓<span>5</span>日透露，公司<span>Jimblebar</span>铁矿已于上周投产。该矿位于西澳铁矿资源最为丰富的皮尔巴拉地区，设计总产能<span>5500</span>万吨，其中初期<span>3500</span>万吨预计两年内达产。加上其他几大巨头的扩产产能，明年全球铁矿石市场供应大增几乎铁板钉钉。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　目前，世界前四大铁矿供应商巴西淡水河谷、澳洲力拓和必和必拓以及<span>FMG</span>均进入扩产高峰。一家权威机构预测，<span>2014</span>年全球新增铁矿产量将达到<span>1.2</span>亿吨，其中<span>1</span>亿吨来自四大主流供应商，<span>2000</span>万吨来自其他小矿山。其中，<span>2014</span>年澳洲铁矿新增产量非常确定，不确定的主要是印度、中国和巴西铁矿生产情况。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　上述权威机构透露，<span>2013</span>年铁矿石新增供应量预计<span>7000~7500</span>万吨，而新增需求也在这个区间，这种供求平衡格局使<span>2013</span>年铁矿石均价与去年水平基本相当，最初市场预期的铁矿石价格大幅下跌一幕并没有出现。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　对于<span>2014</span>年铁矿石新增需求，中国有着较大的不确定性。上述机构认为，“预计<span>2014</span>年全球钢铁新增产能<span>3%</span>左右，对应铁矿石新增需求<span>6000</span>万吨。”对于中国部分，他们是以中国明年<span>GDP</span>增长<span>7%</span>左右，对应钢材需求新增<span>3.5%</span>而言的。“不过中国需求最终是多少，不能确实。就如<span>2013</span>年年初预测和结果差距很大一样。”<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　最近几个月，铁矿石价格维持在<span>130</span>美元<span>/</span>吨上下，上述机构认为，铁矿石价格趋势是往下走，而库存数据则在预示着变盘可能。<span>"mysteel"</span>数据显示，<span>9</span>月底，中国进口铁矿石港口总库存还是<span>7200</span>万吨左右，但到上周，这一数据已攀升至<span>8108</span>万吨，两个月<span>12%</span>的增速，创下今年以来的最高值。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　上述权威人士认为，中国高成本的铁矿石将支撑铁矿价格下降的幅度。因为当市场价格低于生产成本时，高成本铁矿石供应商会关闭或停产，从而影响铁矿石供需，进而支撑价格反弹。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　铁矿石是钢铁生产企业的重要原材料，天然矿石（铁矿石）经过破碎、磨碎、磁选、浮选、重选等程序逐渐选出铁。是含有铁元素或铁化合物能够经济利用的矿物集合体。
</p>','','','中国矿产商业网','1399515030','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　一、
建筑电气工程中的节能技术
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>1. </span>天然光源的有效利用
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　有关建筑电气工程中的照明节能部分，我们要对太阳能这种节能技术进行重点的研究分析。由于大众对能源利用及环保问题的逐渐了解，导致建筑物在利用太阳能来实现照明、达到节能的目的的同时，也引起了建筑商及人们的广泛关注。太阳能是一种常见的可再生资源，具有取之不尽、用之不竭的特点。在对照明节能工程的实施过程中，要加大太阳能技术的应用，制定照明节能的标准，明确照明的方式，使太阳能技术完美的融入到照明设计中去。在白天的时候，充分的利用太阳能，这就要求建筑物要设立一个合理的光照条件。同时，把太阳能引入室内，起到更好的照明节能降耗效果，对室内温度的提升也有一定的效用。所以，使用太阳能技术对于建筑物的降低能耗有着非常重要的意义。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>2. </span>设计出高效性的照明控制系统
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　照明控制是照明设计中的一个重要环节，也是照明设计基本理论提到的重点内容。在建筑电气工程中，开展节能技术的设计是不可或缺的，其主要体现在如下两个方面。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>1</span>）可以创造一个良好的光环境
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　利用对光环境的控制来区分空间，可以对相同的空间进行不同的氛围设计，进而突出照明环境的舒适感。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>2</span>）有效的节能
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　通过对照明灯的使用发现，用户在需要的时候才进行开启，尽量减少不必要的开灯时间、次数和高照度，将有利于节能。尽管如今的照明设计标准还没有对照明控制规定具体的内容，并且政府及相应的施工部门也没有加大重视力度，但是工程设计师必须要认识到它的重要性。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>3</span>）对太阳能技术及产品的合理利用
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　众所周知，太阳能源是取之不尽、用之不竭的。通过对太阳能照明技术的应用，可以节约能源，降低排放，降低地球资源的使用及破坏，保护环境。在照明节能中合理的利用太阳能，在环保方面有着非常重要的意义。其次，太阳能照明技术的使用通常是使用太阳能进行光伏发电为基础，将太阳能直接转化为电能，进而达到节能降耗的目标。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　二、
建筑电气工程的节能技术重心
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>1. </span>对变压器的能源损耗进行降低
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>1</span>）合理判定负载率
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　如今，负载率被定为<span>75%.85%</span>。上世纪<span>80 </span>年代，人们将变压器的负载率定为<span>50%</span>。但实际上，<span>50%</span>的负载率仅仅能降低变压器的线损，对变压器的能量损耗没有起到降低作用，因此不能算为节能措施。对初装费、变压器以及建设投资、运营成本进行考虑，绝缘变压器在满负荷状态下的使用时长为<span>20 </span>年。过了这段时期，变压器有可能出现更好的。这就有机会进行设备的更换，进而使得建筑节能技术得到发展。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>2</span>）降低变压器的损耗
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在需要使用多个变压器负载条件的时候，我们就要对其进行合理的配置。尽可能的降低变压器的单位数量，最好选取大容量的变压器。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>2. </span>节能电动机
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　在建筑电气中，与空调、水道、施工中需要的各类型设备进行匹配的是电动机，电动机的使用可以在设计中选择变频调速器的应用。在负载降低时，变频调速器可以对其实行自动调节，来适应负载的变化情况。这种方式的采用，通常可以在负载降低是提升电动机的使用效率，达到节省能源的效果。还有一种方式是对节能软起动器的利用，其工作原理是通过对起动时间的控制来逐渐调整可控硅导通角，进而控制电压的变化。因为电压可以进行相应的调整，所以平稳的连续起动、完成起动后，进行全压投入使用。在电机容量较大的设备中，应该使用这种新技术。特别是需要多次起动的设备，比如电梯。这种新型的技术对于环境的要求也非常的高，对设备附近的电压要求较高的稳定性。因为它从初始操作到停止运转，电流的变化一般不会超过<span>3 </span>倍，以保证在其所规定的范围内进行电压的变动。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>3. </span>节能照明
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>1</span>）选取优良的点光源
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　对节能照明电光源的科学合理化选用，是现阶段建筑电气工程中满足节能要求的首要任务。节能电光源可以达到高效节能的目的，并且每瓦产生的光通量会增多。在过去的很长一段时间，照明应用最多的是白炽灯。因为其价格低廉，安装简便，但是它的最大的缺点就是发光率不高。其一般使用寿命能达到<span>1 000 h </span>左右，如果质量较好的有可能达到<span>2 000 h </span>左右。单端紧凑型的荧光灯一般有着<span>551 m/W</span>的总光通量，如果选用<span>3 000</span>～<span>5 000 H </span>型的细管荧光灯进行使用，可以节约大概<span>30%</span>的电力。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　（<span>2</span>）选用节能的照明电器配件
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　每一种电光源都需要配备相应的电器配件，镇流器是这类配件中比较高能量的设备。在以前使用直管荧光灯镇流器的时候，其可以达到<span>20%</span>左右的光源功率消耗量，这是一个非常高的比例。平均下来，<span>40 W </span>电灯的镇流器消耗<span>8 W </span>的电能，功率因数仅为<span>0.5</span>。但是节能镇流器可以达到<span>10%</span>以下的功能损失率，更高效的节能镇流器可以将损失率降低到<span>3%</span>～<span>5%</span>，功率因数可以达到<span>0.9</span>。所以，节能电子镇流器对能源的利用及能源的节省都有着非常显著的效果。
</p>','','','工控网','1399515004','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	张佳玮&nbsp;&nbsp;陈超&nbsp;&nbsp;陈晖　　
</p>
<p style="text-indent:2em;">
	千亿产业，这个浙江省温州市为之奋斗已久的产业“珠峰”，将不再只是一个梦想。
</p>
<p style="text-indent:2em;">
	温州来自电气、鞋业、服装、汽摩配、泵阀等传统优势产业的“种子选手”，多年来始终坚守实业、固本强基，向着千亿元大关不断发起冲刺。今年，电气产业有望脱颖而出，率先问鼎产值千亿元的高峰。最新统计数据显示，2013年温州市电气产业规上规下总产值已达900亿元，按照近年来年均10%以上的增速估算，突破千亿元大关指日可待。
</p>
<p style="text-indent:2em;">
	作为中国民营经济风向标的温州，从经济高速增长状态切换至“软着陆”后，正在着力探寻稳健增长的发展路径。跳出“低小散”的低端桎梏，舞动产业集群的“龙头”活力，迸发区域经济的带动效应，或将使温州实体经济脱胎换骨，更上层楼。
</p>
<p style="text-indent:2em;">
	“产城联动”搭平台
</p>
<p style="text-indent:2em;">
	“有了这项共性技术，我们一条流水线的产出效益可以提高10%以上。”在正泰集团的生产车间里，工作人员指着流水线上正在批量下线的低压断路器产品介绍说。原来，这项专业名称为“提高低压断路器可靠性若干关键技术研究及其产业化应用”的技术成果，来自浙江省低压电器技术创新服务平台。
</p>
<p style="text-indent:2em;">
	一个篱笆三个桩、一个好汉三个帮。从小打小闹、各自为政的家庭式小厂，到携手闯关、抱团突围的产业集群式发展，电气产业冲刺千亿元目标，已在共建平台上蓄势发力、起步快跑。
</p>
<p style="text-indent:2em;">
	浙江省低压电器技术创新服务平台，由温州市和乐清市两级政府引导，正泰、德力西、人民等多家龙头企业牵头，温州大学等高校参与，共16个单位联手共建而成。这个有着技术公益性质的服务平台，专攻低压电器产品的基础技术和智能电网低压端系统的网络技术，其对共性难题的解决，可以惠及上千家电气企业。目前，该平台攻克的多项技术被广泛应用于电气企业生产自动化中，已获授权专利25项，参与制定国家行业标准8项，组织实施关键技术攻关项目50余项，产生经济效益9.25亿余元。
</p>
<p style="text-indent:2em;">
	如果说技术创新平台，还只是提供了冲刺千亿级目标的一个支点，那么，产城联动则为冲刺开拓了一片广阔天地。
</p>
<p style="text-indent:2em;">
	乐清作为中国电气之都，率先奏响产城联动的春之圆舞曲。
</p>
<p style="text-indent:2em;">
	在乐清市柳市新区、北白象工贸区和乐清经济开发区，这个上世纪80年代就起步、欣欣向荣的电气产业“金三角”，正结合现代产业集群和现代城市集群的建设，打造生产、生活、生态融合的千亿产业发展新模式，逐步形成乐清经济开发区、柳市、北白象、虹桥等４个省级工业强镇，４个强产业基地和两大总部经济区、一个中国电器城，进一步形成绿色电气、智能电气、汽车电子等高端电气产业链。
</p>
<p style="text-indent:2em;">
	平台之上，各类政策利好正陆续推出。乐清市从效益激励、税收优惠、要素保障等10个方面，对实体经济给予力度空前的政策激励，工业转型升级专项资金扩大至２亿元，对优秀企业给予最高1000万元的奖励，技改补助一举提高10%。
</p>
<p style="text-indent:2em;">
	同时，最新的温州市电气产业产值超千亿元“行动纲领”正在规划论证中。深耕实业的播种平台，不断向着纵深延伸……
</p>
<p style="text-indent:2em;">
	千亿大关引聚变
</p>
<p style="text-indent:2em;">
	攀登千亿大关，是量的聚变，更是质的飞跃。
</p>
<p style="text-indent:2em;">
	回顾历史可以清晰地看到，温州电气产业的发展史几乎就是一部温州民营经济进化史。
</p>
<p style="text-indent:2em;">
	上个世纪７０年代末，在中央“开放搞活”政策方针指引下，乐清柳市首家电气门市部成立，以“前店后厂”的规模化生产和市场销售共繁荣的方式，为电气产业奠定了初步的市场集聚基础。
</p>
<p style="text-indent:2em;">
	忽如其来的迅速繁荣，曾令电气产业一度迷失自我。上世纪80年代中期，电气产品质量急剧下滑，引发产业整体危机，经过优胜劣汰的大调整，一批优秀的“正规军”自此茁壮成长，在正泰、德力西、天正、华仪、人民等一大批龙头企业带动下，温州市逐步形成电气产业块状经济的格局。
</p>
<p style="text-indent:2em;">
	日历翻到今天，传统经济模式已后续乏力，新的竞争态势催生新的转型升级。从单纯依靠要素拉动，转到通过创新多元驱动；从依靠劳动力密集的粗放型增长，转到精打细算的集约型提升，发展之变正在今天的温州大地上悄然萌动。
</p>
<p style="text-indent:2em;">
	华仪电气刚刚出炉的今年一季度报表就令业内人士直呼“亮瞎”了，因其一季度业绩增长竟然超过10倍，同比增幅达1050%。
</p>
<p style="text-indent:2em;">
	这一华丽转身，正是近年来温州电气产业从量变到质变的缩影。
</p>
<p style="text-indent:2em;">
	“目前温州的电气产品仍以低压为主，约占总量的60％－70%，要实现千亿产值，必须突破产业层次较低的短腿。”乐清输配电行业协会秘书长叶建东表示，向高压、环保、节能型电气转型，正是电气产业实现质变的突破口。
</p>
<p style="text-indent:2em;">
	华仪电气一季度的飘红战绩，来自高压电气业务和风电业务的双双放量。据悉，该公司目前握有2.9亿元的高压电气订单。今年甫一开年，华仪又拿下了中电投的9个风电场、总计444兆瓦的风机项目，以及UPC公司91.5兆瓦的风机订单。
</p>
<p style="text-indent:2em;">
	曾经，华仪转身进军高技术、高投入、高风险、高效益的风电行业，备受业界争议。“如果仅仅为了种好自己的一亩三分地，守住高压电器这个产业，华仪比其他企业有着先发的优势。”回忆当年“追风梦”的决策，华仪电气董事长陈道荣坦言：“如果没有这次转型，华仪不会失败倒闭，但肯定丧失了千载难逢的发展机遇。”
</p>
<p style="text-indent:2em;">
	同样，转型升级的先发探索，已在电气产业中全力启动。乐清市经信局透露，目前该市正酝酿组建浙江电气集团，由多家龙头企业牵头，培育具有较强行业影响力的国际知名企业集团，进一步强化从中低压到高压特高压，再到智能电气的全产业链“集团军”作战能力。
</p>
<p style="text-indent:2em;">
	“经济大象”舞新曲
</p>
<p style="text-indent:2em;">
	经过几十年的积累和辛勤耕耘，如今温州电子产业之花正迎春绽放，在这个春意盎然的大花园里，既有顶天立地的大企业，也有铺天盖地的“小巨人”。
</p>
<p style="text-indent:2em;">
	在乐清科技孵化器四楼不足1500平方米的小车间里，乐清市公认电气公司总经理张存源正和员工们一起在走廊上打包产品。“订单实在忙不过来，车间里的产品已经摆不下，就在走廊上边打包边发货。”张存源说，该公司已经在孵化器里待了3年，其主打产品是智能漏电断路器，可实现远程漏电保护和控制。去年该公司产值突破1000万元，今年上半年就打算从孵化器里圆满“毕业”了。
</p>
<p style="text-indent:2em;">
	“孵化器的暖箱培育，让我们这些初创企业避免了外界的风吹雨打，一门心思搞科研、跑市场。”张存源说，现在自家的翅膀已经硬了，打算飞出去寻找更广阔的天地。
</p>
<p style="text-indent:2em;">
	电气产业冲刺千亿元目标，同样离不开量大面广的“小巨人”。
</p>
<p style="text-indent:2em;">
	随着温州市大力推进小微企业园和科技孵化基地的建设，一大批中小企业齐头并进，逐步形成龙头企业做大做强、中小企业快速成长的专业化体系，建立起稳固坚实的供应、生产、销售链条，逐步构建协作配套的发展格局，打造支撑产业转型升级的多层次企业梯队。
</p>
<p style="text-indent:2em;">
	<br />
</p>
<p style="text-indent:2em;">
	有经济专家表示，千亿元产业因其规模庞大通常被誉为“大象”。可以预见，随着温州市电气产业攀上千亿元“珠峰”，这只经济大象将带领各产业象群，引发区域经济的结构调整、放量倍增。
</p>','','','中国创新网','1399515043','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　我国医药市场发展空间巨大，<span>2009</span>年我国医药工业总产值（即七大子行业：化学原料药、化学药品制剂、生物制剂、医疗器械、卫生材料、中成药、中药饮片）<span>10048</span>亿元，首次突破万亿元，同比增长<span>19.9%</span>，我国已成为全球第二大<span>OTC</span>药物市场。目前我国医药市场全球第三，预计<span>2015</span>年全球第二，预估<span>2020</span>年将与美国并列全球第一。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　目前，我国医药产业发展总体态势良好，体现在：产业规模持续增长；技术创新成果显著，以企业为主体，产学研相结合的医药创新体得到加强，一些科技内涵和质量水平高的创新药物投入市场，为保障人民健康和降低治疗费用创造了条件；企业实力显著增强，涌现出一批规模大综合实力强的大型企业集团。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>2002</span>年销售收入在<span>100</span>亿以上的企业<span>0</span>家，<span>2010</span>年有<span>10</span>家；国际化水平提升，<span>2011</span>年医药工业出口交货值<span>1440</span>亿，<span>10</span>年间复合增长率<span>19.6%</span>；通过国际原料药和制剂<span>GMP</span>认证的企业日渐增多；医药工业总产值平稳较快增长，<span>2011</span>年医药工业总产值为<span>15627.5</span>亿元，<span>2012</span>年为<span>18417.9</span>亿元，我国医药增长在全球范围内名列前茅，药品实物产量已跃居世界第一。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　虽然我国生物医药产业发展虽快，却“大而不强”，与工业发达国际仍有很大差距。据悉，我国医药企业数目众多，<span>2010</span>年，我国药厂<span>5000</span>家，医药批发企业<span>1.3</span>万家，药店有<span>38</span>万家，我国医药工业占<span>GDP</span>比重从<span>1978</span>年的<span>2.17%</span>到<span>2010</span>年的<span>3</span>，<span>16%</span>，对比看来，美国的医药工业占<span>GDP</span>的<span>2.13%</span>。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　总体来说，我国医药工业将继续保持较快速度增长。<span>2009</span>年至<span>2011</span>年，医药工业总产值实现了<span>21%</span>左右的增长，继续维持了新医改前的平均增长态势，预计”十二五“期间仍可保持平均<span>20%</span>的增长速度，<span>2015</span>年工业总产值将超过<span>3</span>万亿元。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　据了解，我国生物医药产业发展分为三步走战略：第一步，<span>90</span>年代，我国处于积累阶段，初步建立自主创新体系的框架和雏形；第二步，崛起阶段，居国际新药研发“第二方阵”的领先地位；第三步，到<span>2020</span>年，跨越阶段，在国际先进行列中占有一席之地。其中必须实现两个历史性转变的战略目标，即从仿制药为主走向创新为主，从制药大国走向医药强国。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　同时，我们还看到药物创新体系建设成绩显著，以一批综合性大平台为骨干的创新体系建设、一批富有特色的单向平台建设、以企业为核心的制药孵化基地和产学研联盟建设提升了我国的原始创新和集成创新能力。此外，我国学者在<span>4</span>种主要药物化学杂志发表的论文数量从<span>80</span>年代的<span>3</span>篇增长为仅<span>2010</span>年一年就<span>400</span>篇，这体现了我国药物创新能力的显著提高。<span></span>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　虽然，我国医药行业发展迅速并取得了一系列成就，然而还存在诸多挑战，比如科技创新和成果转化能力薄弱，药物研发仍以跟踪仿制为主，原始创新不足；产业结构亟待升级；产业集中度低，低水平重复现象突出，缺乏具有国际影响力的企业；药品质量安全保障水平亟待提高国际制药巨头加紧抢占国内市场：产学研联盟虚化，有利于创新的机制和坏境虚进一步营造：政策法规不够健全，管理能力需加强。
</p>','','','中国行业研究网','1399515014','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	辉瑞方面已经确认重新对阿斯利康提出收购意向。这一次重新收购意向的前因是，阿斯利康拒绝了辉瑞超过1000亿美元的收购邀约。<br />
<br />
　　在收购与被收购之间，两家对手公司或许还有更深层次的下文，据一家外资药企的高层透露，“辉瑞不会轻易放弃，收购正在逐渐逼近"强势"”。而由于阿斯利康方面的投资者关系因素，这场收购目前看来扑朔迷离。<br />
<br />
　　而眼下辉瑞与阿斯利康的收购案例，加上诺华、GSK、礼来的三角业务转换，使得2014年医药圈动荡不安，“这些巨头们在开始一轮新的市场布局了。”国内一家药企高层人士表示。<br />
<br />
　　尤其诺华和GSK业务的互换，这在医药界发展史上几乎是第一次，诺华方面表示，目前与GSK这项 200亿美金的业务转换，正在顺利进行中。“间接承认自己的软肋、甩掉疲软业务、提振强势业务。”一家外资药企高管认为，这样鲜有的业务整合手段在预示着巨头们的发展思路变了，未来将会出现一个治疗领域寡头细分的格局。<br />
<br />
　　全球医药巨头们的业务变化将给市场带来巨大变革，在多位跨国药企人士眼里，“这开创了划时代的意义，医药企业们似乎正在缔造一个新型的企业管理和发展模式。”<br />
<br />
　　即缩小大饼、专攻擅长领域，多研发新药提升某一领域的绝对领航地位。一改以往摊大饼、覆盖全领域的广泛模式。<br />
<br />
　　外资药企巨头们的思路似乎变了。而在这背后，隐含着的是各国卫生政策的“相挟”，和新药研发越来越难的多重因素。<br />
<br />
　　缔造新模式<br />
<br />
　　诺华、GSK、辉瑞的举动越来越微妙。他们正在从各自擅长的领域下手，通过抛弃疲软业务，使自己轻装上阵，从而让自己越来越强大。<br />
<br />
　　制药行业的一股新风，正在从这些药企们身上吹出来。<br />
<br />
　　一位外资药企人士将这一现象称作“未来寡头模式”，即药企巨头们各自细分治疗领域，如诺华专攻癌症，GSK专攻疫苗领域，辉瑞专攻呼吸道领域，礼来专攻动物保健领域。关于诺华、GSK、礼来的这次业务转换，业内人称，都各自认识到了自己的不足。<br />
<br />
　　这源于半年前诺华、GSK内部做的一次战略策划，来看自己的产品线、研发线，发现有些产品做的强，有些做的弱。<br />
<br />
　　而且，药企在管理和发展方面，一个大趋势是都希望把自己做得越大越好，把自己治疗领域铺得越宽越好。<br />
<br />
　　因为，这个理论可以避免一些风险，如做一两个、两三个治疗领域，万一几年之内做不出新药，公司就岌岌可危。此种心理融合企业管理、发展后，变成了都希望做的大而全的模式。<br />
<br />
　　但这一模式注定让企业的精力、财力不会过于集中某一领域。这也导致了一些领域的发展平平，成为拖累企业的疲软业务。<br />
<br />
　　如诺华的疫苗业务逊色于GSK，GSK的癌症领域则低于诺华的发展，这各自的两项业务虽然在现阶段以及未来治疗领域都是黄金市场，但对于公司来讲，由于研发创新、发展没有跟上，成为了“拖后腿”业务。<br />
<br />
　　于是一场新型的合作模式展开了，诺华与GSK一项200亿美金的业务资产互换诞生。<br />
<br />
　　诺华145亿美金买下葛兰素史克的抗癌药品系列，根据在黑素瘤药物的试验结果可能再另外支付15亿美元。<br />
<br />
　　GSK则以52.5亿美元购买诺华除流感疫苗之外的疫苗业务。2013年诺华疫苗业务的净销售额为14亿美元。<br />
<br />
　　此次业务转换，诺华将跻身全球第二大癌症领域，紧随罗氏之后。<br />
<br />
　　目前，诺华拥有全球制药行业内最大、最强健的肿瘤产品线之一，旗下有25个新分子实体瞄准关键的致癌分子途径，有24个重要的试验正在进行，并在研发16种新产品或新适应症。<br />
<br />
　　“新加入的葛兰素史克产品将拓展诺华在靶向治疗和小分子治疗方面的优势。”诺华方面表示。<br />
<br />
　　GSK的疫苗地位则同样得到提升。同时，两家企业还将成立消费保荐业务合资公司，双方的消费保健类产品，包括OTC药品、日化消费品都将放入这个公司。<br />
<br />
　　事实上，诺华还有另一疲软业务，动物保健，2013年净销售额仅为11亿美元，此次一并将这一包袱甩给了礼来。<br />
<br />
　　而原本占据全球动物保健第五位置的礼来则如虎添翼，跃升为全球第三。诺华600个动物保健品牌和54亿美金，成全了礼来在未来治疗领域的强势地位。<br />
<br />
　　在这场交易中，诺华得到了一条更强的肿瘤生产线，GSK获得了非常好的疫苗资源补充，礼来成全了自己在动物保健领域的愿望，且都甩掉了疲软包袱，这场看似三赢的交易，实际上将三家企业都推向了另一种发展模式上，“缩小摊大饼的习惯，细分治疗领域，专攻擅长。”一家外资药企人士说。<br />
<br />
　　巨头企业们的转型决心也已显露，“这些交易标志着诺华转型的重要时刻，也会提高我们的财务优势，并预计将立即拉动业绩增长和利润提升。通过与葛兰素史克的合资公司，我们还将共同组建世界领先的消费者保健业务。我们相信，出售规模较小的疫苗和动物保健业务将立即为我们的股东实现这些业务的价值，同时，这些部门都将成为各自业务领域全球领导企业的一部分，并将从中受益。”诺华集团全球首席执行官江慕忠表示。<br />
<br />
　　划时代路径<br />
<br />
　　在制药领域人士们的眼里，诺华、GSK开创了一种划时代的新经营模式。“这么多年来，几乎是药企们第一次愿意承认自己某些领域做得不好，愿意放弃一些领域。”张琦是一家跨国药企的高层，他认为这样把财力、精力集中于自己擅长的领域，收窄产品线，有助于提升质量和研发数量。<br />
<br />
　　相比以往广覆盖治疗领域的保守经营模式，这是一个大胆的创新。<br />
<br />
　　事实上，在多数医药界人士眼里，未来药企们专攻细分领域已经是一个不争的事实。<br />
<br />
　　近十几年来，医药企业们一直面临着一些问题，好研究的疾病领域，新药已经研究的较为广泛，而癌症等较为复杂的领域，新药的研发成果较为缓慢和耗费成本。<br />
<br />
　　一个新药用8-10年时间，耗费10亿美元研发成本，上市年销售额达到几十亿美元，成了停留在上世纪八九十年代的神话，难以复制。<br />
<br />
　　目前，让企业感到不适的现状是，研发成本越来越高，时间越来越长，且新药的销售额也不如此前。<br />
<br />
　　现在，全球各国政府都在推行全民医疗保险（放心保）。<br />
<br />
　　而全民医疗保险一个主要目的是为老百姓提供廉价的药品，这样新药出来，价格太高就与是和政府推的全民医疗保险相违背。但这一个现象，却影响着研发的进展和药企的经营。<br />
<br />
　　诺华、GSK的交易，无疑给医药行业的发展奠定了一个新的模式。“这从经济学上、商业运营上是效率更高的一种模式。”神威集团一位高层说。<br />
<br />
　　在研发与各国政府的医疗体制发展的大背景下，促使巨头们整合的另一个因素，其实还有自身的专利到期、收入增长等问题。<br />
<br />
　　2013年，诺华营收仅增长2%，在这两三年内包括代文、格列卫等多个重磅药物专利将过期，这或许是诺华作出出售非核心业务、重新聚集核心业务的直接动力。<br />
<br />
　　而GSK　2013年独揽FDA一共批准27个新药上市中的5个，诺华、礼来一个都没有。GSK在研发上的实力不容小觑。<br />
<br />
　　近日业内消息称辉瑞考虑收购阿斯利康，如果成真这将成为近年来世界医药领域最大的一起并购案。<br />
<br />
　　美国制药巨头辉瑞 2013年年报显示，公司2012年到2013年期间在全球不同市场到期的7款专利药，去年一年的收入就下滑了8.57亿美元。其近年来同样受困于专利到期、新药后继无力的局面。<br />
<br />
　　而阿斯利康两三个大产品，专利马上也要到期，近期之内产品研发线上没有新品出来，即将面临专利悬崖的困境。这对于辉瑞来说是个非常合适的收购机会。<br />
<br />
　　而辉瑞收购阿斯利康源于，前几年因为把做的不算太好的呼吸领域全部关闭，成为其空白，相反阿斯利康呼吸方面做的比较好。这引起了辉瑞的兴趣。<br />
<br />
　　但据外资药企人士透露，目前阿斯利康自己不想卖，辉瑞正在逼近于强行收购。<br />
<br />
　　4月28日，辉瑞方面称，由于阿斯利康的拒绝，辉瑞已经重新向对手阿斯利康提出收购意向，交易金额可能超过1000亿美元。在新的谈判中，希望有让双方公司和股东都能接受的交易计划。如果此次收购成功，辉瑞将奠定其在呼吸领域的强势地位。又一个细分领域的寡头格局正在形成。<br />
<br />
　　制药领域的大格局，随着这些巨头们发展思路的转变，新的格局和模式正在悄然变化。
</p>','','','中国行业研究网','1399515041','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	特斯拉依然在紧锣密鼓地为产品畅销中国开道。但它能一如既往地顺风顺水么？先看看这几步路它怎么走。第一步，在上海购买特斯拉能否享受补贴政策和免费上牌政策？<br />
<br />
　　就在上海特斯拉交车仪式的第二天，上海市新能源汽车推进办公室有关人士说，特斯拉目前还未被列入上海新能源车推荐目录，因此首批特斯拉上海车主还不能享受国家和上海市的新能源车补贴及相关优惠政策。但该人士也透露，上海市发改委、经信委、车管所等相关部门，目前正在研究针对特斯拉的新能源车政策，有可能特事特办，应该会尽快出台。如此表态，足见特斯拉在中国的推进力度。<br />
<br />
　　一旦上海对购买特斯拉用户给予补贴的政策出台，对中国市场破冰意义非同小可。其它城市政策将有松动效仿依据；其它外国品牌电动车也将步其后尘，不会放过政策庇护机会而奋力公关。但有两个因素可能导致政策出台受阻：仅上海的补贴兑现，就将需要财政承受上百亿元的代价；为购买奢侈品的中国富人提供补贴，易遭诟病，对绝大多数消费者说不通。<br />
<br />
　　假如无所不能的特斯拉最终能够拿到政策支持，那也很可能是上海个例，其它各地，未必愿意和能够提供相应的财力支持。而且，其它国外品牌电动车也未必有如此幸运，毕竟上海是“特事特办”。<br />
<br />
　　第二步，继续寻求外围合作。继联通、汉能之后，此前支付宝也已成为特斯拉合作伙伴。支付宝以为特斯拉中国提供在线预订付款通道为合作方式。阿里巴巴旗下的电商平台天猫，也是特斯拉争取合作谈判的重点。如果谈判顺利，特斯拉中国旗舰店可能进驻天猫商城。特斯拉中国还在为车载导航系统寻找供应商，而高德已进入特斯拉视野。至此，特斯拉依然保持无往不利的局面。<br />
<br />
　　第三步，谁将是特斯拉产品的国内合资生产伙伴？无论此前多么顺利，这一步注定艰难。特斯拉的合资对象容易选择，但合适又理想的，很难。马斯克曾向中国吉利集团抛出“绣球”，约见李书福，但遭到拒绝。李书福不愿被“收伏”，有“看不懂”的言论在先，还与吉利的战略转向有关。<br />
<br />
　　刚刚结束的第十三届北京车展，吉利的新闻发布会上，吉利集团宣布，电动汽车和混合动力汽车的研发推出，将成为今后吉利汽车近期和长期工作重点。笔者采访吉利副总裁孙晓东时提问，这是否意味着吉利企业战略的转向，得到的回答是肯定的。<br />
<br />
　　吉利重点转向新能源，底气源于沃尔沃。吉利精心打造的帝豪C ross插电式混合动力概念车首发本届北京车展，另一款帝豪EC 7油电混动车型也在车展亮相，吉利随后声称在混合动力领域的研发已经取得阶段性成果，并将迅速实现这些技术和车型的市场化，还有纯电动车已经研发成功，准备择机推向市场。上述车型混动技术和纯电动技术，虽然经过9年研发，但主要来源于沃尔沃。吉利声称自己的新能源产品拥有世界上最先进的技术，从未有过的自信，来自于对沃尔沃技术的移植和吸收。在此之前，吉利还低调顺手收购了一个电动汽车企业。既然如此，基础日渐雄厚的吉利不需要特斯拉，更不甘心逐渐强大的自己被特斯拉吞下。大不了竞技场上一较高下。这样看来，李书福拒绝马斯克的约见，就在情理之中了。<br />
<br />
　　最先开始新能源和传统能源并驾齐驱的中国汽车企业比亚迪，更有图强之心，十数年前就放言要通过电池技术，“废掉传统变速箱”，一直在与国外电动车赛跑，并与国外汽车企业合作研发电动车腾势，即将推向市场。比亚迪白手起家研发的电动车经深圳出租车大面积实验，反响很好，其混合动力产品比亚迪秦，官方0-100K m /h加速(s)5.9，国内同类车型销量第一，今年前三个月的销量超过去年全年。此次北京车展，比亚迪在双驱战略基础上提出542战略，将后续新能源车型性能指标设定为百公里加速5秒以内，全面极速电四驱，百公里油耗2升以内，从性能、安全、油耗三方面重新定义汽车标准，并声称助力中国汽车工业实现“弯道超车”。企业正值潜力释放期，多年耕耘今朝收获，其技术路径与特斯拉不同，比亚迪长于电池研发，特斯拉长于电池管理整合技术，二者缺少技术融合度和契合性，一旦合作，技术只有交叉冲撞，难有叠加。比亚迪也不需要特斯拉，只能把特斯拉视为不可掉以轻心的竞争对手。<br />
<br />
　　特斯拉最有可能合作的企业，是有一定规模和实力、缺少电动车资源的企业。在中国100多家企业中，这样的企业还不难找。<br />
<br />
　　4月23日的上海交车仪式透露，浦东新区人民政府与特斯拉签署的合作协议中说，远期将优先在浦东设立汽车制造厂。此言耐人寻味。远期，优先，是一种意向性合作，但目前为止任何外资品牌在中国生产，都离不开合资的形式，而浦东新区，显然没有可以合资的汽车企业。平地起高楼的“设立”工厂，采用合资的方式，将很难。<br />
<br />
　　特斯拉已经明确3- 4年之内在中国建厂生产特斯拉产品，这将倒逼其加速寻找合作伙伴。这将是特斯拉下一步的最大悬念。<br />
<br />
　　如果准许特斯拉和国内企业合资合作，中国有关方面至少应该提出一定准入条件，其中就应该包括设施联网通用，特斯拉的所有超级充电站，面对国内各电动车、混动车品牌免费开放。当然，中国企业的充电设施，也应该为特斯拉免费开放。<br />
<br />
　　竞争结局，中外电动车大战将鹿死谁手？特斯拉来了，中国新能源企业应该怎样应对？<br />
<br />
　　比亚迪、吉利、北汽和长安各自都有新能源车型规划，产品逐渐成熟，只需快马加鞭，在特斯拉的中低端产品推向市场之前，抢占市场份额，先入为主，通过高性价比和国家地方双重补贴，巩固专属阵地，如果各家联合作战，会增加胜算。中国自主品牌中低端新能源车型优势，特斯拉近期中期很难超过。其产品的出现，只能为市场提供另一种选择而已。<br />
<br />
　　特斯拉的高端豪华产品，将受到未来自主品牌高端产品的顽强抵抗。凭借国内企业技术基础，也将有所斩获。但与特斯拉抗衡，困难很大。<br />
<br />
　　特斯拉的鲶鱼效应在促进市场升温、新能源企业危急中发力的同时，或许会促成国内企业间的联合。至少应该有通用充电端口，各企业所有电动车和混动车，可以共用充电桩、充电站，避免绕过遍地林立的充电桩寻找自己品牌专用的充电设施。相关部门需要以新的姿态，审时度势，重新审视特斯拉效应，认真应对特斯拉带来的冲击，协助中国汽车人，实现中国汽车工业弯道超车的夙愿。
</p>','','','南方都市报','1399515017','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	<p class="MsoNormal">
		　　把握好三个关系
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　即当前现状和长远发展的关系、生产与生活的关系、守牢底线和留够空间的关系。在规划方法上，要更加重视公共参与。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　上海市第六次规划土地工作会议昨天上午举行。中共中央政治局委员、上海市委书记韩正强调，要按照中央要求，全面认识城市规划在城市发展中的重要引领作用，精心编制好上海新一轮城市总体规划。要坚持问题导向，深刻把握城市未来发展的重大问题，要搞好科学规划，引领城市全面协调可持续发展。“规划工作是百年大计，不能走弯路，不能出错误，否则将永远遗憾。编制规划既要积极、更要稳妥，既要有为、也要无为，重视留白。该守住不能变的，就要确保不突破底线，该与时俱进、面向未来的，就要为我们的子孙留足空间。”
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　会上，国土资源部部长姜大明对相关工作提出要求。上海市委副书记、市长杨雄对编制好新一轮城市总体规划进行全面部署。住房和城乡建设部副部长王宁讲话。市委常委、浦东新区区委书记沈晓明出席会议。副市长蒋卓庆主持。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　“看清大趋势、大方向”
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　韩正说，在城市发展中，规划处于龙头地位，具有重要的战略引领和先导作用。改革开放以来，上海先后编制了两个城市总体规划，引领我们朝着社会主义现代化国际大都市目标不断前进。当前，上海发展已经站在新的历史起点，机遇和挑战前所未有，我们需要科学把握大势、全面前瞻变化，抓紧启动编制新一轮城市总体规划，确定上海这座特大型城市长远发展的蓝图和框架。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　“编制好面向未来的新一轮城市总体规划，必须坚持问题导向，关键要把握好影响上海未来<span>20</span>年、<span>30</span>年或更长时间发展的重大问题，看清大趋势、大方向。”韩正说，要深入研究城市长远发展目标定位问题。城市总体规划好不好，首先看规划对城市未来发展的目标定位是不是科学合理、清晰明确。上海的发展目标定位，一是不能脱离自身的历史、现实、基础和优势，二是必须符合国家对上海发展的要求。上海的发展只有符合国家发展需要，才能不断发展完善，要从国家战略、从我国参与国际竞争和合作的大局出发，思考上海未来发展的目标定位。要深入研究城市发展基础性要素约束问题。城市规划管不管用、能不能实施，关键看对城市发展的基础性要素有没有全面考量。一是要对未来<span>20</span>到<span>30</span>年上海城市人口规模和结构有科学分析预测，二是对未来城市发展用地总量和结构有全面认识，三是对生态环境有全面科学评估，把生态环境约束作为城市发展的底线约束和红线约束。要深入研究城市发展总体布局结构问题。既要立足目前城市布局结构的基础性框架，也要实事求是看到城市功能和空间布局结构存在的问题，通过新一轮规划促进功能和空间布局结构的优化。要更加注重同长三角地区和沿江与沿海发展相衔接、相协调，布局结构更好体现服务长三角、服务沿江与沿海大通道发展。要更加注重中心城区与郊区协调发展，促进城乡一体化发展。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　“我们编制城市规划，一定要有前瞻性、预见性，善于把握变化，充分考虑不确定性，从而保证方向、目标的正确，不犯颠覆性错误。”韩正强调，编制新一轮城市规划，要牢牢把握好三个关系，即当前现状和长远发展的关系、生产与生活的关系、守牢底线和留够空间的关系。在规划方法上，要更加重视公共参与。城市规划是最重要的公共政策，现代政府的公共政策都离不开社会的广泛参与，要使新一轮城市总体规划的编制过程，成为凝聚市民共识的过程，让规划更好地呼应民声、汇聚民智。在规划理念上，要更加重视让全市人民更多更公平地享受改革发展成果，拥有更好的生活。编制新一轮城市的总体规划，必须明确未来发展不可逾越的底线，保护好不可复制的资源。如果没有这样的底线，规划就没有约束力。未来不可能完全预见，规划必须以变应变，充分留有余地，为未来发展留够空间。“三分规划、七分管理，最重要的是实施落实。”要强化规划的严肃性，将规划管理纳入法制化轨道，深化规划运作的监督机制，实现规划实施的全社会、全过程、全覆盖监督，及时发现、纠正和处置违法违规行为。各级领导干部要切实提高规划意识，一把手要带头学习学懂先进的规划理念，领导城市总规划的编制工作，严格按照规划推动经济社会发展。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　结合实际的创新性实践
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　姜大明指出，上海市新一轮城市总体规划编制工作贯彻落实了中央新型城镇化发展方针，切合上海实际，具有很强的引领和示范作用。上海确立的“四个转变”规划理念，体现了全面提高城镇化质量、加快转变城镇化发展方式的根本要求；明确的“六个突出”发展导向，坚持了中国特色新型城镇化道路；提出的“五量调控”发展策略，遵循了高效配置土地资源的基本原则。这些新理念、新思路、新举措，不仅全面贯彻了中央新型城镇化发展方针和战略部署，也是结合上海实际对加快城市转型发展的创新性实践。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　姜大明指出，要创新土地管理政策机制，推进土地利用方式转变与规划转型相融合，切实提高规划编制实施水平。规划转型与土地利用方式转变相辅相成，由经济导向、外延扩展、目标蓝图型规划向以人为本、内生增长、过程控制型规划转变，有赖于土地利用方式由外延扩张、增量为主、粗放低效向内涵发展、存量为主、集约高效转变；城市终极规模的锁定，有赖于土地规划的边界约束。结合新一轮城市总体规划编制和实施，在土地管理方面，要重点做好三项工作：一是科学划定“三条红线”，强化规划硬约束；二是同步修订土地利用总体规划，实现“多规合一”；三是创新节约集约用地制度机制，全面实施“五量调控”基本策略。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　姜大明强调，要落实和完善最严格的耕地保护制度和最严格的节约用地制度，慎重稳妥推进土地管理制度改革，为转型发展提供坚实的土地资源支撑。一是坚持最严格的耕地保护制度，严防死守耕地红线，持续提高耕地质量，确保国家粮食安全；二是坚持最严格的节约用地制度，节约集约用好土地，确保新型城镇化、工业化和农村健康发展；三是慎重稳妥推进土地管理制度改革，发挥好市场和政府作用，确保人民群众切身利益。
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　着力研究七类重大问题
	</p>
	<p class="MsoNormal">
		<span>&nbsp;</span>
	</p>
	<p class="MsoNormal">
		　　杨雄指出，要坚持高起点、高标准，坚持改革创新、充分运用新理念、新方法编制规划，坚持开门编规划，广泛汇集各方面的智慧和力量，着力研究、妥善解决七方面重大问题。一是发展目标。要与国家发展目标相衔接，高度体现国家战略要求；要与全球发展趋势相适应，充分反映国际大都市的竞争态势；要与现代城市发展规律相契合，追求更高的城市品质。二是城市规模。人口规模严格控制，建设用地规模只减不增，以土地资源利用方式转变倒逼城市发展转型。三是城市空间布局。要进一步立足中心城、跳出中心城，推进城市建设重心向郊区转移，使城市空间布局更科学、更合理。重点处理好功能布局和空间布局，经济空间与文化、社会、生态空间，地上与地下，当前与长远，以及上海与长三角、长江经济带的关系，加强统筹考虑。四是产业发展。要主动顺应新技术革命和产业变革趋势，必须保有适度规模的工业用地，坚持工业布局向园区集中不动摇，坚持工业区块调整转型方针不动摇；要加强第三产业布局的规划引导，高度关注互联网经济时代下的商业布局和办公楼宇。五是交通发展。立足于建设更加高效便捷、安全舒适、绿色低碳的综合交通体系，统筹考虑好上海与周边省市、市域交通网与机场港口铁路等对外枢纽、中心城区与郊区、绿色出行系统与全市交通网络的衔接。六是新型城镇化。抓紧深入研究城镇体系，清晰规划中心城、新城、新市镇、中心村的功能定位和建设重点。七是生态环境。积极探索高密度条件下建设生态宜居城市的新路子。核心是把生态保护红线划下去、落下去。绿化面积只增不减，水系规划刚性化、网络化。要坚决落实最严格的耕地保护制度和最严格的节约集约用地制度。基本农田牢牢守住，要在规划上落地，用规划来锁定，并加大执法力度。
	</p>
</p>','','','东方早报','1399515043','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　石家庄市政府日前出台《关于加快推进京津冀协同发展的实施意见》，作为目标任务，意见提出，将石家庄市打造成为首都经济圈重要的副中心城市和南部区域经济中心、战略性新兴产业和先进制造业基地、现代服务业基地、科技创新及成果转化基地、国家重要的综合交通枢纽和物流中心。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　确定产业发展重点
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　意见明确了推动京津冀协同发展的目标任务。战略性新兴产业方面，发挥生物医药、装备制造、电子信息等产业优势，打造具有全球竞争力和影响力的“中国药都”和高端装备制造、新能源汽车、半导体“光谷”等战略性新兴产业和先进制造业基地。到<span>2020</span>年规模以上战略性新兴产业增加值占全市规模以上工业比重超过<span>25%</span>。综合交通枢纽地位进一步凸显，发挥东出西联、承南接北区位交通优势，打造国家重要的综合交通枢纽和物流中心。到<span>2020</span>年高速铁路、高速公路通车里程分别达到<span>350</span>公里、<span>1000</span>公里，正定机场客运吞吐量达到<span>1300</span>万人次。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　意见提出构建布局合理互促共进的城镇发展体系。围绕京津冀城市群体系建设，以城市基础设施和公共服务设施建设为重点，推进中心城区升级、组团县市和次中心城市扩规、县城和小城镇提档，加快提升城镇承载能力，以城镇化促进对接合作。做好次中心城市、县城和小城镇的产城融合。融入京津冀协同发展，修订城镇建设规划，完善城镇基础设施和公共服务设施。吸引京津产业转移，形成与京津优势互补，分工专业化与协作一体化的特色产业集群。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　意见还提到，建设首都经济圈战略性新兴产业和先进制造业基地。以特色产业园区为载体，借力京津高端产业制造和研发优势，承接战略性新兴产业、高端产业制造环节或整体转移，培育壮大生物医药、高端装备制造、电子信息、节能环保等产业，打造战略性新兴产业和先进制造业基地。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　构建“一小时交通圈”
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　意见提到，建设首都经济圈科技创新及成果转化基地。以高新区、正定新区和与京津正在谋划共建的特色科技园区为重点，借力京津科技、教育、人才的资源优势，打造科技创新及成果转化基地。石家庄将以促进京津冀城市群发展为目标，以构建京津冀区域交通网络化为重点，以铁路、公路、航空等快速交通为主体，强化省会全国性交通枢纽功能，加快构建京津石“一小时交通圈”，将石家庄市打造成为京津冀城市群南部便捷、顺畅、高效的综合交通枢纽。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　推进京津冀协同发展体制机制创新成为此次意见关注的一个重要方面。石家庄将探索建立健全有利于吸引京津资源要素转移的制度安排，形成目标同向、措施一体、作用互补、利益相连的体制机制。加强与京津政策衔接，在产业转移、财税分享、平台共建、社保接续、社会管理等方面，建立互惠互利的体制机制，形成有利于承接首都功能疏解和京津产业转移、促进一体化发展的制度安排和政策体系。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　此外，石家庄还将加强与京津在大气污染联防联控和水资源保护等方面的深度合作。建立市场化与各级政府参与双导向的京津冀生态补偿机制，重点针对饮用水水源地、水土保持生态功能区、碳源功能区等开展生态补偿工作；探索建立主要污染物排放权交易制度和流域水资源使用权转让制度。
</p>','','李香才','中国证券报','1399515038','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　<span>5</span>月<span>7</span>日的兰州市发展循环经济工作现场会上，兰州重点要在工业、农业、服务业和社会等四大领域发展循环经济，要做实做深基地、园区、产业链、企业和项目“五大载体”。到<span>2015</span>年，兰州市要建成兰州石油化工冶金有色循环经济和“城市矿产”示范两大基地，成为全省发展循环经济示范区。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　发展新型城市供热方式
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　值得关注的是，兰州市以新型城市供热、余热余压综合利用、清洁生产、淘汰落后产能为重点，建设绿色工业发展体系。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　要发展新型城市供热，积极应用国家重点鼓励推广的新型高效煤粉锅炉节能技术，加快形成高效煤粉工业锅炉生产、运营、煤粉供应等产业链，实现煤粉资源高效综合利用。依托兰州锅炉制造公司，重点发展高效煤粉锅炉、煤粉研磨设备、煤粉存储设备、煤粉运输专用车、除尘设备等装备制造产业，力争将兰州打造成西北地区乃至全国高效煤粉锅炉产业制造基地。同时，在坪台地区和城乡结合部未供暖住宅改造中加大推广实施力度，鼓励扶持一批煤粉加工配送企业做大做强，形成具有一定规模的煤粉生产、加工、配送能力，积极发展煤粉配送物流产业，形成循环经济发展新亮点。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　新增公交、出租车全部使用清洁能源
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　要推进营运车辆清洁能源改造，将主城区营运车辆（除特种车、柴油车外）改造升级为<span>CNG</span>、<span>LNG</span>、电力驱动等清洁能源型车辆。<span>2014</span>年底，货运出租、城市货运配送车辆清洁能源改造达到<span>10%</span>，新增（包括报废更新）公交、出租、城市货运配送和出租车辆全部使用清洁能源。<span>2015</span>年力争规划建设一批<span>LNG</span>和电力驱动车充电站，营运车辆清洁能源改造达到<span>20%</span>。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　明年底完成<span>36</span>座以上天桥地道建设
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　要大力推行绿色交通，优先发展公共交通。积极探索公交专用道建设，对线路重复、同站线路多的公交站点进行整合、优化、调整、合并，提高公共交通的运营效率；加快公交场站建设，确保改造不小于<span>65</span>处的港湾式公交停靠站点。积极争取国家资金支持，建成综合化、智能化的公交（包括出租车）指挥调度中心；在黄河兰州段开通水上巴士，以调整高峰期尤其是轨道交通施工期间的客运需求。要倡导绿色出行方式，到<span>2015</span>年底<span>,</span>完成<span>36</span>座以上的天桥地道建设，逐步完成城市步行交通网络<span>;</span>将自行车纳入公共交通体系，试点推广公共租赁自行车。要加快试点推广新能源汽车，积极引导和帮助电动汽车及关键零部件企业申报各类项目，优先将电动汽车项目列入各级重大项目予以支持。研究制定补助办法，鼓励私人购买电动汽车，力争到<span>2015</span>年，兰州市共建成<span>10</span>座电动车充电站，<span>250</span>台直流充电桩。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　到明年建成“城市矿产”等两大基地
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　据悉，到<span>2015</span>年兰州市将初步建立以减量化、再利用、资源化为特征，集循环型农业、循环型工业、循环型服务业和循环型社会四位一体的循环经济体系。形成石油化工、有色冶金等<span>11</span>条循环经济产业链；培育<span>100</span>户示范企业，其中省级示范企业达到<span>30</span>户；实施<span>188</span>个重点项目，实现产值<span>1800</span>亿元，建成兰州石油化工冶金有色循环经济和“城市矿产”示范两大基地，基地各项指标领先于甘肃省平均水平，成为甘肃省发展循环经济示范区。两大基地建设。一个是兰州石油化工冶金有色循环经济示范基地建设。要突出石油化工、有色冶金、城市矿产利用三个重点产业，重点实施<span>188</span>个循环经济项目，到<span>2015</span>年，实现产值<span>1800</span>亿元，增加值<span>410</span>亿元。另一个是国家“城市矿产”示范基地建设。依托红古再生资源产业园建设再生资源回收利用中心，按照经营场地和功能分区进行统一规划，对回收的“四机一脑”、废旧汽车进行科学的拆解处理，形成年拆解废旧汽车<span>1</span>万台、“四机一脑”废旧电子产品<span>100</span>万台、加工处理废旧塑料<span>10</span>万吨、废橡胶<span>5</span>万吨、废金属<span>30</span>万吨、废纸<span>20</span>万吨的生产能力，促进资源循环化综合利用和节能减排。同时，积极准备“城市矿产”基地申报工作，力争“城市矿产”示范基地落户我市。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　工业绿色化改造方面，工业企业全部完成强制性生产审核，建成<span>100</span>家循环经济示范企业，完成国家和省上下达的淘汰落后产能任务。
</p>','','','兰州晚报','1399515006','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　据中国证券报周四报道，新疆维吾尔自治区发改委等部门已起草“丝绸之路经济带框架下促进新疆对外开放与经济发展规划”。规划提出了丝绸之路经济带上新疆三条通道的布局构想。下一阶段重点任务是充分发挥新疆地缘区位优势，加快构建联通内地与中亚、西亚、南亚以及欧洲、非洲的铁路、公路、航空、管道综合交通运输体系，全面提升新疆在丝绸之路经济带中国际大通道和交通枢纽作用。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　规划提出，在整体布局上，以北、中、南三条通道为发展主轴，辐射周边，可形成全境通过、全面覆盖、全线连通的新疆开放发展新格局，全面带动沿线中心城市、重点城镇及所有<span>17</span>个陆路口岸的开放与建设。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　规划显示，北通道是指，从伊吾进入，沿巴里坤、富蕴、北屯、阿勒泰，向北从布尔津过吉克普林口岸<span>(</span>待开放<span>)</span>到俄罗斯，向西过吉木乃口岸、阿黑土别克口岸<span>(</span>待开放<span>)</span>到哈萨克斯坦，向东辐射对蒙古的塔克什肯、红山嘴、老爷庙、乌拉斯台口岸。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　中通道是指，沿哈密、经乌鲁木齐、昌吉、石河子、奎屯、精河向西，一路从阿拉山口口岸出境，一路经伊宁，从察布查尔的都拉塔口岸、霍城的霍尔果斯口岸以及昭苏的木扎尔特口岸进入哈萨克斯坦。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　南通道是指，从格尔木进入若羌后，经且末、和田、莎车、喀什，至塔什库尔干从红其拉甫和卡拉苏口岸进入巴基斯坦和塔吉克斯坦。
</p>','','','大智慧阿思达克通讯社','1399515041','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　随着城镇化进程的加快，交通需求总量呈现快速增长。据统计，到<span>2012</span>年底，我国公路总里程达<span>424</span>万公里，其中高速公路通车里程达<span>9.6</span>万公里，公路桥梁达<span>71.3</span>万座、<span>3663</span>万米，公路隧道达<span>1</span>万余处、<span>805</span>万米，沿海和内河港口生产性泊位达<span>3.2</span>万个，亿吨大港达到<span>29</span>个。根据对各地高速公路隧道照明的费用调查，每月的费用在<span>2</span>～<span>4</span>万元<span>/</span>公里之间，按平均值<span>3</span>万元<span>/</span>公里计算，一年的照明费用约为<span>28.98</span>亿元，消耗能源约<span>127</span>万吨标准煤，排放二氧化碳约<span>356</span>万吨，隧道照明能源消耗及费用支出已经成为公路运营过程中的巨大负担。此外，港口照明、桥梁景观照明、服务区照明、收费广场照明等高额运营费用也已成为交通行业面临的现实问题。如何降低运行费用，提高能效，走绿色、低碳发展之路，是我们共同追寻的目标。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　由中国节能协会主办，中国节能协会交通运输节能专业委员会承办的“<span>2014</span>交通照明节能展览会暨交通照明节能高峰论坛”将于<span>2014</span>年<span>7</span>月<span>2</span>日至<span>4</span>日在北京国家会议中心举行。展会将集中展示交通绿色照明产品和智能交通信息化技术，为交通照明产业搭建专业、开放、共赢的平台。届时还将组织、邀请来自交通运输部门的相关单位、研究院所和交通运输部节能减排项目管理中心等业内专家到会参观并在高峰论坛上解读国家相关政策、解析相关应用技术和标准，探讨最新交通照明技术和设计思维。同时，我们还将邀请和组织地方交通部门及港口、交通规划设计院、交通建设公司、专业观众等参观并参与论坛活动。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　此次盛会将加强交通照明领域供应商、经销商、采购商等各方面的交流与合作，对行业前沿的节能产品与技术加以推广，促进安全、便捷、舒适、有序、低污染、高能效交通系统的建立。目前雷士照明、上海亚明、飞利浦、中微光、浙江阳光、四川鼎吉、美的等企业都有意向参展，中国交通报、中国交通节能网等<span>20</span>余家行业媒体将对此次展会进行跟踪报道与宣传，唤醒沉睡中的交通照明节能市场，为建设“美丽中国”，做出突出贡献。
</p>','','','中国城市发展网','1399515022','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	　　素有“长江情结”的武汉市<span>4</span>日宣布，计划在未来<span>6</span>年时间里投入<span>951</span>亿元，实施<span>50</span>个拓展航运枢纽能力项目，计划到<span>2020</span>年初步建成“长江中游航运中心”。武汉希望通过参与长江经济带建设，实现“建设国家中心城市”、“复兴大武汉”的雄心。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　而南京港、宁波港等也在积极谋划融入长江经济带，抓住这一轮发展机遇。宁波发展规划研究院副院长傅晓昨日对《第一财经日报》称，宁波港要在港口功能、网络完善、腹地拓展、管理效率提升等方面发力，加快宁波舟山港口一体化建设。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　航运大投入
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　<span>4</span>日，武汉市召开政府常务会，原则通过《武汉长江中游航运中心核心区建设规划及近期实施计划》<span>(</span>下文简称《计划》<span>)</span>，计划到<span>2025</span>年，将武汉港口集装箱吞吐能力，从现在的百万标箱提升至千万标箱，港口吞吐能力达到<span>5</span>亿吨以上。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　武汉市提出，力争通过<span>10</span>年的努力，将武汉建设成具有国际影响力的内河航运中心，汇聚集装箱运输基地、船舶制造基地、航运综合服务基地、物流及贸易基地、航运科技与教育基地、信息服务基地等<span>6</span>大基地，以及水运交通枢纽、物资集散枢纽、港口经济枢纽等<span>3</span>大枢纽。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　按照《计划》，在未来<span>6</span>年内，武汉市将投入<span>951</span>亿元，实施<span>50</span>个拓展航运枢纽能力项目，包括武汉船舶交易服务中心、华中汽车产业物流园、华中钢铁交易中心等重点项目，以此着力夯实航运中心的辐射功能、服务功能、交易功能、信息功能，进一步做实中西部地区外贸货物的“出海口”。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　武汉航运如此大规模投入，在湖北省近年来极为少见。上月<span>23</span>日，湖北省交通运输厅有关负责人表示，该省水运<span>3</span>年投资达<span>189</span>亿元，相当于“十一五”时期的<span>1.5</span>倍，有信心力争<span>2015</span>年形成以高等级航道圈为基础的武汉长江中游航运中心水运大通道。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　到目前，湖北高等级航道突破<span>1700</span>公里，环绕江汉平原的<span>810</span>公里的千吨级航道圈已经建成。去年，湖北完成水陆货运量<span>2.44</span>亿吨，港口货物吞吐量<span>2.6</span>亿吨，货物周转量<span>1791</span>亿吨公里，集装箱吞吐量<span>107</span>万标箱，分别比“十一五”末增长<span>56%</span>、<span>50%</span>、<span>40%</span>、<span>39%</span>，特别是开通了武汉至上海洋山江海直达航线、武汉至泸汉台集装箱快班航线、三峡库区滚装运输等精品航线，助推了长江物流大通道建设。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　该负责人表示，武汉港口基础设施综合规模良好，集装箱核心港区优势明显，货轮经长江可直达香港、台湾以及韩国、日本、越南、泰国等地，航线延伸和辐射区域居长江中上游首位。<span>2013</span>年，武汉新港货物吞吐量<span>1.32</span>亿吨，集装箱吞吐量<span>85</span>万标箱，今年一季度集装箱吞吐量同比增长<span>21%</span>。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　南京港董事长熊俊说，长江经济带的建设，必然带来产业格局的新调整，为港口发展中转业务规模创造新的市场空间。“十二五”末，长江太仓至南京段以下<span>12.5</span>米深水航道将建设完成，届时<span>5</span>万吨级海轮可直达南京，服务长江中上游广阔的经济腹地将为南京港拓展新空间，还可以发展大宗进出口商品仓储、交易平台等新业态。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　做好水文章
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　从<span>2009</span>年起宁波港就实施西进战略，向长江流域及西部地区开拓港口腹地，到<span>2013</span>年已开通了海铁联运城市<span>17</span>个。宁波港还与世界上<span>200</span>多个国家和地区的<span>600</span>多个港口开通了<span>235</span>条航线，去年完成货物吞吐量<span>4.96</span>亿吨，位居世界港口第<span>4</span>位。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　傅晓说，他们已经将融入长江经济带列入最新研究课题，希望将宁波港铁联运的优势发挥出来。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　也就在最近，武汉市政府有关领导表示，加快建设武汉长江中游航运中心，既是贯彻落实国家建设长江经济支撑带战略的具体行动，也是武汉建设“国家中心城市”、“复兴大武汉”的重要一招。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　最近，江苏省经信委研究室副主任刘耀武对媒体表示，国家曾提出建设“一线一轴”战略构想，即沿海一线、长江一轴，但由于东中西部经济发展高度不均衡，长江上中下游除水运经济互补外，并未形成实质经济体。多年过后，各地发展条件大大提升，此时将长江经济带上升为国家战略，不再局限于临江城市，而注重整个流域协调发展。
</p>
<p class="MsoNormal">
	<span>&nbsp;</span>
</p>
<p class="MsoNormal">
	　　长三角区域研究专家、浙江大学教授陈建军昨日接受《第一财经日报》记者采访时认为，长江经济带把东、中、西部三大经济区域天然连接在一起，向西与丝绸之路经济带连接后，形成东西双向开发开放的新格局。“在长三角、珠三角等压力下，作为中部核心城市之一的武汉，之前一直承受资源外流的尴尬。”
</p>','','陈周锡','第一财经日报','1399515008','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	&nbsp;　　阅读提示|5月3日下午，来自开封和郑州的十位专家学者在河南大学金明校区图书馆八楼的会议室里齐聚，就“构建开封新兴副中心城市战略规划”的议题进行专项研讨。对开封市建设新兴副中心城市的必要性和可行性进行了深入探讨。
</p>
<p>
	　　有经济学家，也有建筑和环境规划领域的专家，他们同属于一个科研机构—中原发展研究院。中原发展研究院是由河南省人民政府研究室、河南省发展和改革委员会与河南大学共建的省内首家高端智库型研究机构，由著名经济学家耿明斋教授担任院长。“构建开封新兴副中心城市战略规划”就是这一智库目前承担的主要研究课题。
</p>
<p>
	　　开封，曾经的世界中心
</p>
<p>
	　　北宋时开封作为国际第一的大都会，可谓是世界的中心，这点早已无须赘言。单就开封作为河南省首府的历史就不仅仅能用一个“悠久”来形容。
</p>
<p>
	　　据《开封市志》记载，自元代起一直到建国初期，开封就一直为河南省省会。中华人民共和国成立之初，河南省委的办公楼位于开封市北道门，而河南省政府办公楼就在省府前街北侧。直到1954年省会从开封迁移到郑州，才让开封丧失了河南省政治中心的位置。
</p>
<p>
	　　2005年5月22日，美国《纽约时报》在评论版罕见地以中文标题发表著名专栏作家克里斯托夫的评论文章《从开封到纽约—辉煌如过眼烟云》。公元1000年，坐落在泥沙淤塞的黄河岸边的古城开封，是世界上最重要的城市。文章回顾了1000年前全世界最繁荣城市开封衰败的历史，告诫纽约人应该以开封的历史为戒，树立忧患意识，不然“即使像纽约这样伟大的城市，总有一天也会堕落为哈得逊河（流经纽约市的一条河流）上的开封”。
</p>
<p>
	　　《纽约时报》的这篇文章让许多开封人读后愤愤不平，转而又陷入深深的失落。但是，开封中心城市地位的丧失却是不争的事实。开封人向来是不轻易低头认输的，以上种种，让倔强的开封人铆足了劲，开封的发展也引起省委、省政府的加倍重视。
</p>
<p>
	　　时任省委书记徐光春亲自批示：“要把开封建设好、发展好，使之成为现代化的城市，要采取特殊措施促进开封的发展，把振兴开封作为河南省‘十一五规划’的重点来实施。”随后，在中原城市群总体规划中，“郑汴一体化”被作为“中原城市群建设”的突破口，开封的发展被提升到了前所未有的战略高度。
</p>
<p>
	　　省委九届六次全体（扩大）会议审议通过的《中共河南省委关于科学推进新型城镇化的指导意见》明确提出“郑汴一体化取得新进展，开封向新兴副中心城市迈进”，这是省委在新阶段、新时期、新形势下所做出的重大战略决策，为开封市振兴与发展创造了重大历史机遇。
</p>
<p>
	　　郑州“块头”不够大开封正好来弥补
</p>
<p>
	　　中心城市是指在一定地域范围内具有辐射带动功能、居于主导地位、起着枢纽作用的大城市和特大城市。
</p>
<p>
	　　那么何为副中心城市呢？指的是一个省范围内，经济实力较周边地市强大，经济辐射力超出了自身管辖的行政区范围，拥有独特的优势资源或产业，且与主中心城市有一定距离、未来能够带动周边区域发展的大城市或特大城市。
</p>
<p>
	　　中原经济区和中原城市群是一个非常典型“一核两圈三层”构造的圈层结构，耿明斋认为，多年来，困扰河南的一个难题是郑州中心城市规模偏小，辐射带动能力不足，短期内难以成长为国家中心城市，难以担当带动中原经济区和中原城市群进入国家级行列的重任。由于郑州市实力欠缺，单靠郑州市难以形成对整个中原经济区强有力的辐射带动，就需要选取若干副中心城市。
</p>
<p>
	　　而中原城市群外围周边就有8个区域中心城市，一般经济区或城市群副中心城市不超过三个，所以副中心城市不可能从中原城市群外围产生，只能从中原城市群核心区内产生。由于开封市与郑州市距离很近，城市功能与产业结构具有很强的互补性，一体化发展具有天然优势，通过郑汴融城发展，建设开封副中心城市，可以弥补郑州市规模实力不足的缺陷，尽快打造郑汴都市区的副中心与核心增长板块，构建大郑汴都市区，协同带动全省跨越发展。
</p>
<p>
	　　着力探索三条“新兴”发展路径
</p>
<p>
	　　中原发展研究院“构建开封新兴副中心城市战略规划”课题组成员，河南省发展研究中心财政金融处处长刘战国在会上提交的一份报告中指出在具体的建设过程中，开封市应着力探索以下三条“新兴”发展路径：
</p>
<p>
	　　一是构建高速化的跨越发展模式。开封市区位优越、文化积淀丰厚，具有后发优势，厚积薄发，后起之秀，快速成长，河南省“一主两副”的战略布局需要开封市快速发展跨越发展，近几年的实践证明，开封市也有条件有能力实现快速发展跨越发展，辐射带动周边及全省发展。
</p>
<p>
	　　二是构建差异化的特色发展模式。具有不同于以往其他副中心城市的特点，具有自己独特功能，开封副中心与洛阳副中心城市在要素资源禀赋、经济腹地、辐射带动范围、产业结构、功能定位等方面都不一样，各有特色优势，围绕郑州主中心城市，郑汴洛需要差异化发展、错位发展、特色发展、互动发展、协同发展。充分发挥挖掘开封文化积淀丰厚的优势，着力培育具有开封特色的现代服务业，将郑州中心城市部分功能向开封疏解，形成郑汴在文化和服务方面的功能互补，错位发展。抓住郑州航空港经济综合实验区建设的机遇，发挥紧临国际空港物流枢纽的优势，扬长避短，重点突破，培育新的战略性新兴产业，形成新的经济增长板块，推动跨越发展，使开封尽快成为名副其实的新兴副中心城市。
</p>
<p>
	　　三是构建现代化的高端发展模式。开封市作为河南省副中心城市和大郑汴都市区的副中心，必须用国家级中心城市的一流标准来要求，产业结构必须向高端化演进升级，产业的发展是支撑现代化的基础，也是高端化的重点，选择主导产业至关重要，必须要有全球视野、世界眼光，瞄准未来产业和朝阳产业，抢占国际国内产业竞争制高点；同时还要发挥开封市的优势，扬长避短，重点突破；要以市场导向，敢于创新优势，自我突破，创新发展，培育新的主导产业；要发挥紧临国际空港物流枢纽的优势，发展电子信息、高端制造、航空经济、电商物流、文化旅游、创意产业等外向型、高技术、高附加值产业，延伸拉长产业链条，带动传统产业改造升级。
</p>','','','大河报','1399515040','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	<strong>　　一、前台</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　岗位职责：
</p>
<p class="MsoNormal">
	　　1、及时、准确接听/转接电话，如需要，记录留言并及时转达。
</p>
<p class="MsoNormal">
	　　2、接待来访客人并及时准确通知被访人员。
</p>
<p class="MsoNormal">
	　　3、收发公司邮件、报刊、传真和物品，并做好登记管理及传递工作。
</p>
<p class="MsoNormal">
	　　4、负责前台区域的环境维护，保证设备安全及正常运转（包括复印接、空调及饮水机等）。
</p>
<p class="MsoNormal">
	　　5、完成上级主管交办的其他工作。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职资格：
</p>
<p class="MsoNormal">
	　　1、女，形象、气质佳，年龄18-30岁，身高1.60以上。
</p>
<p class="MsoNormal">
	　　2、中专及以上学历，1年相关工作经验，文秘、行政管理等相关专业优先考虑。
</p>
<p class="MsoNormal">
	　　3、较强的服务意识，熟练使用电脑办公软件。
</p>
<p class="MsoNormal">
	　　4、具备良好的协调能力、沟通能力，有责任心，性格活泼开朗，具有亲和力。
</p>
<p class="MsoNormal">
	　　5、普通话标准流利。
</p>
<p class="MsoNormal">
	　　6、具备一定商务礼仪知识。
</p>
<p class="MsoNormal">
	　　7、综合能力强者优先考虑。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　工作时间：周一至周五 
9：00-18：00
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　<strong>二、咨询工程师</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　岗位职责：
</p>
<p class="MsoNormal">
	　　1、编制投资咨询报告，主要包括项目建议书、可行性研究报告、资金申请报告、社会稳定风险评估报告、节能评估报告等。
</p>
<p class="MsoNormal">
	　　2、对负责的项目进行论证调研并深入、细致分析，疑难及重要问题及时向项目经理或相关领导反映、汇报。
</p>
<p class="MsoNormal">
	　　3、按时保质完成所负责的业务工作，对负责的投资咨询报告进行校队，对报告质量负责。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职资格：
</p>
<p class="MsoNormal">
	　　1、土木、建筑、金融、城市轨道交通、火电、有色冶金、生态和环境工程、市政公用工程等相关专业大学本科及以上学历；
</p>
<p class="MsoNormal">
	　　2、二年以上相关工作经验，熟练使用财务分析软件、OFFICE办公软件等分析工具；
</p>
<p class="MsoNormal">
	　　3、具有敏锐的市场洞察力和行业信息捕捉能力，有较强的分析思考能力，获得国家注册咨询工程师资格证书优先；
</p>
<p class="MsoNormal">
	　　4、懂工程造价咨询者优先；
</p>
<p class="MsoNormal">
	　　5、专业基础知识扎实，熟悉相关法律法规、规范，有较强的学习能力；
</p>
<p class="MsoNormal">
	　　6、有正确的工作态度，认真细致负责，有创新意识，良好的团队合作精神，能够承受工作压力；
</p>
<p class="MsoNormal">
	　　7、较强的文字和沟通协调能力，执行能力强，具有敏锐的市场洞察力和良好的组织计划及逻辑分析能力。
</p>
<p class="MsoNormal">
	<strong> </strong> 
</p>
<p class="MsoNormal">
	<strong>　　三、网站编辑</strong><strong>/</strong><strong>网站运营</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　岗位职责：
</p>
<p class="MsoNormal">
	　　1、负责网站、微信等网络宣传平台有关栏目/频道的信息搜索、规范、整合编辑，并更新上线、审校等工作。
</p>
<p class="MsoNormal">
	　　2、完成信息内容的策划和日常更新与维护。
</p>
<p class="MsoNormal">
	　　3、编写网站宣传资料及相关产品资料。
</p>
<p class="MsoNormal">
	　　4、收集、研究和处理网络读者的意见和反馈信息。
</p>
<p class="MsoNormal">
	　　5、配合责任编辑组织策划推广活动，并参与执行。
</p>
<p class="MsoNormal">
	　　6、协助完成频道管理与栏目的发展规划，促进网站知名度的提高。
</p>
<p class="MsoNormal">
	　　7、加强与内部相关部门和组织外部的沟通与协作。
</p>
<p class="MsoNormal">
	　　8、配合网站运营人员进行网站的推广和优化工作。
</p>
<p class="MsoNormal">
	　　9、其他有关网站及宣传平台的工作。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职资格：
</p>
<p class="MsoNormal">
	　　1、中文、编辑、出版、新闻等相关专业大专或以上学历优先。
</p>
<p class="MsoNormal">
	　　2、门户类、教育类、财经类网站编辑工作经验者优先。
</p>
<p class="MsoNormal">
	　　3、了解基本操作常用的网页制作软件和熟悉掌握网络搜索工具，了解网站开发、运行与维护的相关知识。
</p>
<p class="MsoNormal">
	　　4、良好的文字功底，较强的网站专题策划和信息采编能力。
</p>
<p class="MsoNormal">
	　　5、具备一定的创新、策划能力并具备一定的新闻收集及对新闻内容、标题的加工能力。
</p>
<p class="MsoNormal">
	　　6、较高的职业素养、敬业精神及团队精神，擅于沟通。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　<strong>　四、产业规划师</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　职位描述：
</p>
<p class="MsoNormal">
	　　1、独立承担或者组织区域发展战略研究、区域产业布局研究、区域宏观经济分析，包括区域经济规划、旅游规划、文化产业园区规划、城镇体系规划、城市总体规划、分区规划和城市景观设计等备类规划任务；
</p>
<p class="MsoNormal">
	　　2、开展区域经济政策与产业布局、区域与城市发展策划、综合开发建设项目的评估、可行性研究等工作，包括区域经济功能与定位区域结构产业分析、城市交通与土地利用、小城镇发展规划及各类城市研究型项目及课题等；
</p>
<p class="MsoNormal">
	　　3、对研究项目板块提出总体的研究思路及方法，对城市战略及产业研究具有独到见解；
</p>
<p class="MsoNormal">
	　　4、根据研究中心的规定参与相关项目的沟通与协调及有关研究与写作，完成领导交办的其他任务。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职要求：
</p>
<p class="MsoNormal">
	　　1、拥有产业类、经济类、管理类（以公共管理、公共政策方向为主）本科及以上学历；
</p>
<p class="MsoNormal">
	　　2、1年以上相关产业研究、政府咨询工作经验；
</p>
<p class="MsoNormal">
	　　3、具有丰富的项目运作经验，驾驭复杂课题能力强；
</p>
<p class="MsoNormal">
	　　4、擅长从战略思考问题，有市场意识及危机意识；
</p>
<p class="MsoNormal">
	　　5、能够在项目经理统筹下，积极配合高质量完成相应工作。
</p>
<p class="MsoNormal">
	　　备注：欢迎在校大四、大五学生及在读研究生前来实习（长期有效）。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	<strong>　　五、城市规划师</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　职位描述：
</p>
<p class="MsoNormal">
	　　1、根据项目要求担任空间规划负责人。配合项目要求，独立主持本专业，负责本专业的整体运作、质量控制、时间控制；
</p>
<p class="MsoNormal">
	　　2、根据合同要求制定项目实施计划，安排时间进度，编制任务书和规划大纲，并对以上内容时行监控；
</p>
<p class="MsoNormal">
	　　3、负责与项目有关人员进行有效沟通，把握他们对项目的需求，关注项目组人员安排；
</p>
<p class="MsoNormal">
	　　4、参与和组织项目会议，组织有关专家参与方案讨论；
</p>
<p class="MsoNormal">
	　　5、项目结束后负责项目工作评估，总结经验经验教训，提炼研究成果；
</p>
<p class="MsoNormal">
	　　6、参与部门内部其他研究课题的讨论，完成部门临时安排的其他任务。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职资格：
</p>
<p class="MsoNormal">
	　　1、1年以上旅游规划、城市规划、区域经济、产业经济、管理咨询、广等告策划、项目投资等相关工作经验，注册规划师优先；
</p>
<p class="MsoNormal">
	　　2、了解区域开发、旅游和城市规划专业知识、设计规范与标准，以及相关法律、法规与政策，具备市政、景观、建筑设计和投资开发经验者优先。
</p>
<p class="MsoNormal">
	　　3、有国际和国内著名城市规划单位工作经验者优先。
</p>
<p class="MsoNormal">
	　　4、一年以上城市规划工作经验和主持过中、大型规划项目经验。
</p>
<p class="MsoNormal">
	　　5、具有较强的规划方案的创意及策划能力。
</p>
<p class="MsoNormal">
	　　6、具有一定的方案草图和计算机绘图能力。
</p>
<p class="MsoNormal">
	　　7、理论功底扎实，知识结构合理，学习新知识能力强，发现问题、分析问题和系统解决问题能力强。
</p>
<p class="MsoNormal">
	　　8、具备较强的沟通能力，能够与甲方、团队高效沟通。
</p>
<p class="MsoNormal">
	　　备注：欢迎在校大四、大五学生及在读研究生前来实习（长期有效）。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	<strong>　　六、网站制作人员</strong> 
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　岗位职责：
</p>
<p class="MsoNormal">
	　　1、负责公司网站的设计、改版、更新；
</p>
<p class="MsoNormal">
	　　2、负责公司产品的界面进行设计、编辑、美化等工作；
</p>
<p class="MsoNormal">
	　　3、对公司的宣传产品进行美工设计；
</p>
<p class="MsoNormal">
	　　4、负责完成所辖网站到呢个前台页面设计和编辑
</p>
<p class="MsoNormal">
	　　5、其他与美术设计相关的工作。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	　　任职资格：
</p>
<p class="MsoNormal">
	　　1、有扎实的美术功底，良好的创意思维和理解能力，能及时把握客户的需求；
</p>
<p class="MsoNormal">
	　　2、工作经验不限，有较佳作品或两年以上网页设计及平面设计工作经验者优先；
</p>
<p class="MsoNormal">
	　　3、有美术、平面设计相关专业，专科及以上学历优先；
</p>
<p class="MsoNormal">
	　　4、精通Photoshop/Dreamweaver/lllustrator/数据库/Mysql等设计软件及网站后台管理，对图片渲染和视觉效果有较好认识；
</p>
<p class="MsoNormal">
	　　5、善于与人沟通，良好的团队合作精神和高度的责任感，有创新精神，保证工作质量；
</p>
<p class="MsoNormal">
	　　6、应聘时请务必提供个人作品。
</p>
<p class="MsoNormal">
	<br />
</p>
<p class="MsoNormal">
	<span>　　</span>简历请发至邮箱 
13910628933@139.com
</p>
<p class="MsoNormal">
	　　工作地址：北京朝阳区东四环中路41号，嘉泰国际大厦B座九层（0907-0913）
</p>','人才招聘','诺美咨询','诺美咨询','1399515048','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	<strong>　　诚招条件</strong>
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　第一，认同诺美咨询价值观，了解诺美咨询的资源实力，愿意与诺美咨询一路走下去；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　第二，熟悉咨询顾问行业，有独到的优质渠道资源者优先；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　第三，彻底遵循属地化首要原则，具备较强的商务沟通协作能力，当地人优先考虑；
</p>
<p class="MsoNormal">
	<span>&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　第四，能够按照北京总部要求完成在该地区的战略布局，并完成一定的业绩。
</p>
<p class="MsoNormal">
	<span><br />
<img src="http://api.map.baidu.com/staticimage?center=116.493985,39.922884&zoom=18&width=558&height=360&markers=116.493985,39.922884&markerStyles=l,A" alt="" /><br />
&nbsp;</span> 
</p>
<p class="MsoNormal">
	　　联系方式
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　电话：</span><span style="line-height:1.5;">010-85860398-8033</span> 
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　邮箱：</span><span style="line-height:1.5;">13910628933@139.co</span> 
</p>
<p class="MsoNormal">
	<span style="line-height:1.5;">　　</span><span style="line-height:1.5;">Q&nbsp; Q:33285360</span> 
</p>','诚招全国各城市独家合作伙伴','诺美咨询','诺美咨询','1399515020','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>

	<strong><img src="http://api.map.baidu.com/staticimage?center=116.493985,39.922884&zoom=18&width=558&height=360&markers=116.493985,39.922884&markerStyles=l,A" alt="" /><br />
<br />
<br />
北京市朝阳区东四环中路41号嘉泰国际大厦B座九层</strong> 
</p>
<p style="background-color:#ffffff;font-family:Tahoma, Arial, 宋体, sans-serif;color:#333333;font-size:14px;">
	<strong>联系电话：010-85860398</strong> 
</p>
<p style="background-color:#ffffff;font-family:Tahoma, Arial, 宋体, sans-serif;color:#333333;font-size:14px;">
	<strong>网 
      址：www.chinaener.com</strong>
</p>
<p style="background-color:#ffffff;font-family:Tahoma, Arial, 宋体, sans-serif;color:#333333;font-size:14px;">
	<strong>邮 
      箱：13910628933@139.com</strong> 
</p>','联系方式','诺美咨询','诺美咨询','1399515002','nuomei','0','0','0','0','0','0','','0','','','0','','','','','0','','null','')<{|}>


  `bid` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(255) DEFAULT '0',
  `ip` varchar(40) DEFAULT NULL,
  `isok` int(1) DEFAULT '1',
  `addtime` int(30) DEFAULT '0',
  PRIMARY KEY (`bid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 <{|}>


  `channel_id` int(255) NOT NULL AUTO_INCREMENT,
  `channel_kid` int(20) DEFAULT '0' COMMENT '模块类别0为系统模块',
  `channel_root_id` int(11) DEFAULT '0',
  `channel_name` varchar(255) DEFAULT NULL,
  `channel_urlname` varchar(255) DEFAULT NULL,
  `channel_urlok` int(1) DEFAULT '0',
  `channel_ename` varchar(255) DEFAULT NULL,
  `channel_order` int(255) DEFAULT '0',
  `channel_hit` int(255) DEFAULT '0',
  `intro_meo` text,
  `channel_ifdel` int(1) DEFAULT '0' COMMENT '是否删除',
  `channel_ip` varchar(20) DEFAULT NULL COMMENT '操作ip',
  `jibie` int(10) DEFAULT '1',
  `tjchar` varchar(255) DEFAULT NULL,
  `mbname` varchar(255) DEFAULT NULL,
  `channel_istop` int(2) DEFAULT '0',
  `isdesk` int(1) DEFAULT '0',
  `channel_ico` varchar(255) DEFAULT NULL,
  `addtime` int(20) DEFAULT '0',
  `number_test` int(30) DEFAULT '0' COMMENT '已有多少人测试',
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 <{|}>



















































  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ccid` int(255) DEFAULT '0',
  `csid` int(255) DEFAULT '0',
  `cname` varchar(255) DEFAULT NULL,
  `purl` varchar(255) DEFAULT NULL,
  `cosj` int(5) DEFAULT '3',
  `plurl` varchar(255) DEFAULT NULL,
  `pcurl` varchar(255) DEFAULT NULL,
  `charset` varchar(10) DEFAULT NULL,
  `cc_lurl` varchar(255) DEFAULT NULL,
  `cc_curl` varchar(255) DEFAULT NULL,
  `ctitle` varchar(255) DEFAULT NULL,
  `ccomfrom_ruler` varchar(255) DEFAULT NULL,
  `cauthor_ruler` varchar(255) DEFAULT NULL,
  `ctitle_ruler` text,
  `ccontent` longtext,
  `ccontent_ruler` longtext,
  `time_ruler` longtext,
  `liebiao_ruler` longtext,
  `liebiao_nrruler` longtext,
  `addsj` int(11) DEFAULT NULL,
  `isid` int(2) DEFAULT '0',
  `idurl` varchar(255) DEFAULT NULL,
  `cc_bid` varchar(255) DEFAULT NULL,
  `cc_eid` varchar(255) DEFAULT NULL,
  `cc_buno` int(10) DEFAULT '1',
  `isurl` int(2) DEFAULT '0',
  `urlcontent` longtext,
  `isok` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 <{|}>


  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) DEFAULT '0',
  `cid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `collect_sj` timestamp NULL DEFAULT NULL,
  `is_collect` int(2) DEFAULT '0',
  `is_collecting` int(2) DEFAULT '0',
  `fullurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 <{|}>


  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `coid` int(255) DEFAULT '0',
  `ccid` int(255) DEFAULT '0',
  `csid` int(255) DEFAULT '0',
  `lieurl` varchar(255) DEFAULT NULL,
  `lieurlno` int(255) DEFAULT '0',
  `isco` int(1) DEFAULT '0',
  `cosj` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 <{|}>


  `de_id` int(255) NOT NULL AUTO_INCREMENT,
  `de_name` varchar(255) DEFAULT NULL COMMENT '部门名称',
  `de_jingli` int(255) DEFAULT '0' COMMENT '部门经理',
  `de_intro` longtext,
  `de_ifdel` int(11) DEFAULT '0' COMMENT '是否删除',
  `de_ip` varchar(20) DEFAULT NULL COMMENT '操作IP',
  `addtime` int(20) DEFAULT '0',
  PRIMARY KEY (`de_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 <{|}>














  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_extention` varchar(255) DEFAULT NULL,
  `file_add_time` datetime DEFAULT NULL,
  `file_add_user` varchar(255) DEFAULT NULL,
  `addtime` int(20) DEFAULT '0',
  `uid` int(11) DEFAULT '0' COMMENT '添加人的id',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 <{|}>






























  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_kid` int(255) DEFAULT '0',
  `site_name` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_comment` longtext,
  `ordno` int(11) DEFAULT '0',
  `fstyle` int(11) DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 <{|}>


  `gid` int(255) NOT NULL AUTO_INCREMENT,
  `msgkid` int(255) NOT NULL DEFAULT '0',
  `mid` int(255) DEFAULT '0',
  `uid` int(255) DEFAULT '0',
  `uname` varchar(255) DEFAULT NULL,
  `msgtitle` varchar(255) DEFAULT NULL,
  `msgurl` varchar(255) DEFAULT NULL,
  `readchar` varchar(255) DEFAULT NULL,
  `isread` int(1) DEFAULT '0',
  `isdel` int(1) DEFAULT '0',
  `addtime` int(20) DEFAULT '0',
  `getip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 <{|}>


  `lid` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(255) DEFAULT '0',
  `log_kid` int(255) DEFAULT '0',
  `log_admin_name` varchar(255) DEFAULT NULL,
  `log_msg` text,
  `log_ip` varchar(30) DEFAULT NULL,
  `log_time` int(30) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=9944 DEFAULT CHARSET=utf8 <{|}>








































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































