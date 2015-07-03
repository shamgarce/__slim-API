-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-07-03 18:05:36
-- 服务器版本： 5.5.40
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nsv1`
--

-- --------------------------------------------------------

--
-- 表的结构 `dy_samplecondition`
--

CREATE TABLE IF NOT EXISTS `dy_samplecondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odd_id` varchar(32) DEFAULT NULL,
  `three` varchar(16) DEFAULT NULL,
  `two` varchar(16) DEFAULT NULL,
  `xianghao` varchar(16) DEFAULT NULL,
  `xuhao` varchar(16) DEFAULT NULL,
  `one` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dy_sampleform`
--

CREATE TABLE IF NOT EXISTS `dy_sampleform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(64) DEFAULT NULL,
  `SampleFormNumber` varchar(16) DEFAULT NULL,
  `OnLine` tinyint(2) DEFAULT '0',
  `for` varchar(2) DEFAULT NULL,
  `sampleCondition.` char(8) DEFAULT NULL,
  `sampleCondition.sampleUnit` varchar(64) DEFAULT NULL,
  `sampleCondition.checkNumber` varchar(64) DEFAULT NULL,
  `sampleCondition.sampleNumber` varchar(64) DEFAULT NULL,
  `sampleCondition.sampleIncludeMaterial` varchar(64) DEFAULT NULL,
  `sampleCondition.sampleUnitsNumber` varchar(64) DEFAULT NULL,
  `sampleSpot.` char(8) DEFAULT NULL,
  `sampleSpot.samplePlace` varchar(64) DEFAULT NULL,
  `sampleSpot.storeTemperature` varchar(64) DEFAULT NULL,
  `sampleSpot.storePlace` varchar(64) DEFAULT NULL,
  `sampleSpot.storeHnmidity` varchar(64) DEFAULT NULL,
  `sampleDepartment.` char(8) DEFAULT NULL,
  `sampleDepartment.sampleDepartmentHandler` varchar(64) DEFAULT NULL,
  `sampleDepartment.sampleDate` varchar(64) DEFAULT NULL,
  `sampleDepartment.sampleDepartmentPhone` varchar(64) DEFAULT NULL,
  `sampleDepartment.sampleDepartment` varchar(64) DEFAULT NULL,
  `labelCheck.` char(8) DEFAULT NULL,
  `labelCheck.others` varchar(64) DEFAULT NULL,
  `labelCheck.unitsNumber` tinyint(1) DEFAULT '0',
  `labelCheck.validityPeriod` tinyint(1) DEFAULT '0',
  `labelCheck.productDepartment` tinyint(1) DEFAULT '0',
  `labelCheck.packageGuiGe` tinyint(1) DEFAULT '0',
  `labelCheck.specification` tinyint(1) DEFAULT '0',
  `labelCheck.pharmaceuticalName` tinyint(1) DEFAULT '0',
  `labelCheck.number` tinyint(1) DEFAULT '0',
  `labelCheck.lotNumber` tinyint(1) DEFAULT '0',
  `labelCheck.registerNumber` tinyint(1) DEFAULT '0',
  `sampleResult.` char(8) DEFAULT NULL,
  `sampleResult.jiLu` varchar(64) DEFAULT NULL,
  `sampleResult.sampleJieLun` varchar(64) DEFAULT NULL,
  `checkDepartment.` char(8) DEFAULT NULL,
  `checkDepartment.checkDepartmentPhone` varchar(64) DEFAULT NULL,
  `checkDepartment.checkDepartmentAddress` varchar(64) DEFAULT NULL,
  `checkDepartment.checkDepartmentHandler` varchar(64) DEFAULT NULL,
  `checkDepartment.checkDepartment` varchar(64) DEFAULT NULL,
  `packageCondition.` char(8) DEFAULT NULL,
  `packageCondition.inPackageMaterial` varchar(64) DEFAULT NULL,
  `packageCondition.outPackageMaterial` varchar(64) DEFAULT NULL,
  `packageCondition.sealing` varchar(64) DEFAULT NULL,
  `packageCondition.outPackage` varchar(64) DEFAULT NULL,
  `othersInformation.` char(8) DEFAULT NULL,
  `othersInformation.shangPinDanJia` varchar(64) DEFAULT NULL,
  `othersInformation.sellerDepartment` varchar(64) DEFAULT NULL,
  `othersInformation.tongGuanDanHao` varchar(64) DEFAULT NULL,
  `othersInformation.suiHuoWuTL` varchar(64) DEFAULT NULL,
  `othersInformation.suiHuoWu` varchar(64) DEFAULT NULL,
  `othersInformation.kouAnJu` varchar(64) DEFAULT NULL,
  `othersInformation.shangPinZongjia` varchar(64) DEFAULT NULL,
  `othersInformation.shouHuoDepartment` varchar(64) DEFAULT NULL,
  `othersInformation.jinKouKouAn` varchar(64) DEFAULT NULL,
  `othersInformation.shangPinCode` varchar(64) DEFAULT NULL,
  `othersInformation.tiYunDanHao` varchar(64) DEFAULT NULL,
  `othersInformation.maiFangDepartment` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.` char(8) DEFAULT NULL,
  `pharmaceuticalInforamation.storeConditionl` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.chineseName` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.validityPeriod` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.productDepartment` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.lotNumber` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.doseModel` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.checkInformNumber` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.productRegion` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.englishName` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.piJianHao` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.teJinXuKe` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.zhiXingBiaoZhun` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.compactNumber` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.packageGuiGe` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.specification` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.pharmaceuticalName` varchar(64) DEFAULT NULL,
  `pharmaceuticalInforamation.registerNumber` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `SampleFormNumber` (`SampleFormNumber`),
  KEY `OnLine` (`OnLine`),
  KEY `for` (`for`),
  KEY `UserName` (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dy_suihuowu`
--

CREATE TABLE IF NOT EXISTS `dy_suihuowu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odd_id` varchar(32) DEFAULT NULL,
  `productDepartment` varchar(64) DEFAULT NULL,
  `piHao` varchar(64) DEFAULT NULL,
  `shuLiang` varchar(64) DEFAULT NULL,
  `mingCheng` varchar(64) DEFAULT NULL,
  `guiGe` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dy_typeoddid`
--

CREATE TABLE IF NOT EXISTS `dy_typeoddid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` varchar(16) DEFAULT NULL,
  `odd_id` varchar(16) DEFAULT NULL,
  `openid` varchar(16) DEFAULT NULL,
  `used` tinyint(2) DEFAULT NULL,
  `device_id` varchar(16) DEFAULT NULL,
  `up` tinyint(2) DEFAULT NULL,
  `enable` tinyint(2) DEFAULT NULL,
  `f` varchar(8) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `dy_typeoddid`
--

INSERT INTO `dy_typeoddid` (`id`, `type_id`, `odd_id`, `openid`, `used`, `device_id`, `up`, `enable`, `f`, `user`) VALUES
(1, '', 'J462015000001', '', 1, '', 0, 1, 'J', ''),
(2, '', 'J462015000002', '', 1, '', 0, 1, 'J', ''),
(3, '', 'J462015000003', '', 1, '', 0, 1, 'J', ''),
(4, NULL, 'J462015000004', NULL, 1, NULL, 0, 1, 'J', ''),
(5, NULL, 'J462015000005', NULL, 1, NULL, 0, 1, 'J', ''),
(6, '', 'J462015000006', '', 1, '', 0, 1, 'J', ''),
(7, '', 'J462015000007', '', 1, '', 0, 1, 'J', ''),
(8, '', 'J462015000008', '', 1, '', 0, 1, 'J', ''),
(9, NULL, 'J462015000009', NULL, 1, NULL, 0, 1, 'J', ''),
(10, NULL, 'J462015000010', NULL, 1, NULL, 0, 1, 'J', ''),
(11, NULL, 'J462015000011', NULL, 1, NULL, 0, 1, 'J', ''),
(12, NULL, 'J462015000012', NULL, 1, NULL, 0, 1, 'J', ''),
(13, NULL, 'J462015000013', NULL, 1, NULL, 0, 1, 'J', ''),
(14, NULL, 'J462015000014', NULL, 1, NULL, 0, 1, 'J', ''),
(15, NULL, 'J462015000015', NULL, 1, NULL, 0, 1, 'J', ''),
(16, '', 'J462015000016', '', 1, '', 0, 1, 'J', ''),
(17, NULL, 'J462015000017', NULL, 1, NULL, 0, 1, 'J', ''),
(18, NULL, 'J462015000018', NULL, 1, NULL, 0, 1, 'J', ''),
(19, NULL, 'J462015000019', NULL, 1, NULL, 0, 1, 'J', ''),
(20, NULL, 'J462015000020', NULL, 1, NULL, 0, 1, 'J', ''),
(21, NULL, 'J462015000021', NULL, 1, NULL, 0, 1, 'J', ''),
(22, NULL, 'J462015000022', NULL, 1, NULL, 0, 1, 'J', ''),
(23, NULL, 'J462015000023', NULL, 1, NULL, 0, 1, 'J', ''),
(24, NULL, 'J462015000024', NULL, 1, NULL, 0, 1, 'J', ''),
(25, NULL, 'J462015000025', NULL, 1, NULL, 0, 1, 'J', ''),
(26, '', 'G462015000001', '', 1, '', 0, 1, 'G', ''),
(27, '', 'G462015000002', '', 1, '', 0, 1, 'G', ''),
(28, NULL, 'G462015000003', NULL, 1, NULL, 0, 1, 'G', ''),
(29, NULL, 'J462015000026', NULL, 1, NULL, 0, 1, 'J', ''),
(30, NULL, 'J462015000027', NULL, 1, NULL, 0, 1, 'J', '');

-- --------------------------------------------------------

--
-- 表的结构 `dy_user`
--

CREATE TABLE IF NOT EXISTS `dy_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(32) NOT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `user_name` varchar(32) DEFAULT NULL,
  `user_tel` varchar(32) DEFAULT NULL,
  `device_id` varchar(32) DEFAULT NULL,
  `open_id` varchar(32) DEFAULT NULL,
  `f_logintime` int(11) DEFAULT NULL,
  `f_loginip` varchar(32) DEFAULT NULL,
  `f_regtime` int(11) DEFAULT NULL,
  `enable` tinyint(2) DEFAULT NULL,
  `phonenumber` varchar(32) DEFAULT NULL,
  `category` varchar(32) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `authkey` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `dy_user`
--

INSERT INTO `dy_user` (`uid`, `user_login`, `user_password`, `user_name`, `user_tel`, `device_id`, `open_id`, `f_logintime`, `f_loginip`, `f_regtime`, `enable`, `phonenumber`, `category`, `groupid`, `authkey`, `accessToken`) VALUES
(16, 'irones', 'irones', '', '', '', '39e64b8aa83e9f8d', 1435917623, '192.168.1.200', 1435634485, 1, '156666666', 'SAMPLEPERSON', 0, '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `dy_zh_samplecondition`
--

CREATE TABLE IF NOT EXISTS `dy_zh_samplecondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odd_id` varchar(32) DEFAULT NULL,
  `three` varchar(16) DEFAULT NULL,
  `two` varchar(16) DEFAULT NULL,
  `xianghao` varchar(16) DEFAULT NULL,
  `xuhao` varchar(16) DEFAULT NULL,
  `one` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dy_zh_sampleform`
--

CREATE TABLE IF NOT EXISTS `dy_zh_sampleform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(64) DEFAULT NULL,
  `SampleFormNumber` varchar(32) DEFAULT NULL,
  `OnLine` tinyint(2) DEFAULT '0',
  `PictureSrc` varchar(128) DEFAULT NULL,
  `inLandSampleSpot.` char(8) DEFAULT NULL,
  `inLandSampleSpot.saleUsedState` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.sampleSpot` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.unitsNumber` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.saledPrice` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.storeTemperature` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.priceUnit` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.stockAmount` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.salePricePerUnit` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.storeHnmidity` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.jiJianDanWei` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.pricePerUnit` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.stockAmountUnit` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.storeSpotCategory` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.saleTotalPrice` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.productAmountUnit` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.storeSpot` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.sampledDepartmentNature` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.huoWuJianShu` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.productAmount` varchar(64) DEFAULT NULL,
  `inLandSampleSpot.totalPrice` varchar(64) DEFAULT NULL,
  `inLandSampleResult.` char(8) DEFAULT NULL,
  `inLandSampleResult.jiLu` varchar(64) DEFAULT NULL,
  `inLandSampleResult.chouYangJieLun` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.` char(8) DEFAULT NULL,
  `inLandProductDepartment.zhiLiangGuanLiGuiFanMingCheng` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.yingYeZhiZhaoHao` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.quYuLeiXing` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.xian` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.guiMo` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.yeTai` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.shengChanDanWeiDianHua` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.zuiXiaoDiZhi` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.zhen` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.shengChanDanWeiLianXiRen` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.suoYouZhi` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.xiang` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.diQu` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.zhiLiangGuanLiGuiFanZhengHao` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.sheng` varchar(64) DEFAULT NULL,
  `inLandProductDepartment.xuKeZhengBianHao` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.` char(8) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentFaRenDianHua` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentPostCode` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.zhiLiangGuanLiGuiFanMingCheng` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.quYuLeiXing` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.yingYeZhiZhaoHao` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentAddress` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentFaRen` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.xian` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.guiMo` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentHandlerPhone` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.yeTai` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.zuiXiaoDiZhi` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartment` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.zhen` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.suoYouZhi` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.xiang` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentHandler` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sampledDepartmentPhone` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.diQu` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.zhiLiangGuanLiGuiFanZhengHao` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.sheng` varchar(64) DEFAULT NULL,
  `inLandSuperviseOffereeSign.xuKeZhengBianHao` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.` char(8) DEFAULT NULL,
  `inLandSampleCondition.caiYangBaoZhuangGuiGe` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.sampleUnit` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.chouYangYangPinBaoZhuang` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.sampleNumber` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.yangPinCunChuZhuangTai` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.caiYangHuanJie` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.chouYangFangShi` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.sampleIncludeMaterial` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.sampleUnitsNumber` varchar(64) DEFAULT NULL,
  `inLandSampleCondition.chouYangGongJu` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.` char(8) DEFAULT NULL,
  `inLandPhaInformation.weiTuoShengChanDanWei` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.zhiXingBiaoZhunHao` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.productDepartmentPostCode` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.storeCondition` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.validityPeriod` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.productDepartment` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.approvalNumber` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.lotNumber` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.doseModel` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.chinessName` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.yangPinXingTai` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.chanPinTiaoXingMa` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.englishName` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.shangBiao` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.shelfLife` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.phaName` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.executiveStandard` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.preparationGuiGe` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.productDepartmentAddress` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.yangPinLaiYuan` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.packageGuiGe` varchar(64) DEFAULT NULL,
  `inLandPhaInformation.weiTuoShengChanDanWeiDiZhi` varchar(64) DEFAULT NULL,
  `inLandPackageCondition.` char(8) DEFAULT NULL,
  `inLandPackageCondition.middlePackage` varchar(16) DEFAULT NULL,
  `inLandPackageCondition.noBorer` int(8) DEFAULT NULL,
  `inLandPackageCondition.noMildeu` int(8) DEFAULT NULL,
  `inLandPackageCondition.leastInPackage` varchar(16) DEFAULT NULL,
  `inLandPackageCondition.sealing` int(8) DEFAULT NULL,
  `inLandPackageCondition.packageNoDamaged` int(8) DEFAULT NULL,
  `inLandPackageCondition.inPackage` varchar(16) DEFAULT NULL,
  `inLandPackageCondition.noPollution` int(8) DEFAULT NULL,
  `inLandPackageCondition.smallPackage` varchar(16) DEFAULT NULL,
  `inLandPackageCondition.noWaterPrint` int(8) DEFAULT NULL,
  `inLandBasicInformation.` char(8) DEFAULT NULL,
  `inLandBasicInformation.yaoPinDaLei` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.checkInstitution` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.yaoPinZhongLei` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.phaIngredient` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.yaoPinXiaoLei` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.phaPreparations` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.taskCategory` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.sampleGoal` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.specialPha` varchar(64) DEFAULT NULL,
  `inLandBasicInformation.basePharmaceutical` varchar(64) DEFAULT NULL,
  `inLandOthers.` char(8) DEFAULT NULL,
  `inLandOthers.beiZhu` varchar(64) DEFAULT NULL,
  `inLandOthers.pinZhongChanZhi` varchar(64) DEFAULT NULL,
  `inLandOthers.pinZhongNianXiaoShouE` varchar(64) DEFAULT NULL,
  `inLandOthers.pinZhongJinChuKou` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.` char(8) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartmentHandler` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartmentPhone` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.youBian` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartmentJiBie` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartment` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDate` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.dianHua` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartmentFuZeRen` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.chuanZhen` varchar(64) DEFAULT NULL,
  `inLandEnforcementUnitSign.sampleDepartmentDiZhi` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `SampleFormNumber` (`SampleFormNumber`),
  KEY `OnLine` (`OnLine`),
  KEY `for` (`PictureSrc`),
  KEY `UserName` (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `userapi`
--

CREATE TABLE IF NOT EXISTS `userapi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `v` varchar(32) DEFAULT NULL,
  `api` varchar(128) DEFAULT NULL,
  `ys` varchar(32) DEFAULT NULL,
  `dis` varchar(256) DEFAULT NULL,
  `request` text,
  `response` text,
  `enable` tinyint(1) NOT NULL,
  `debug` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `userapi`
--

INSERT INTO `userapi` (`id`, `name`, `v`, `api`, `ys`, `dis`, `request`, `response`, `enable`, `debug`, `sort`) VALUES
(1, 'com_注册用户', 'v1', 'adduser', 'enter/adduser', '注册用户\n之前会进行设备权限检查1', '{\n"username":"irones",\n"password":"irones",\n"phonenumber":"156666666",\n"category":"SAMPLEPERSON"\n}', '{\n"code":"200",\n"msg":"succeed",\n"data":[]\n}', 1, 0, 88),
(10, '-', 'v1', 'getInfo/rrttt', 'r/s', '', '{\n"code":200,\n"msg":"注册成功",\n"data":""\n}', '{\n"code":200,\n"msg":"注册成功",\n"data":""\n}', 1, 1, 99),
(11, '测试', 'v1', 'enter/test/:count', 'enter/test', '', ' {"phaForm":"{\\"inLandSampleSpot\\":{\\"saleUsedState\\":\\"\\u800c\\u90a3\\u9898\\",\\"sampleSpot\\":\\"\\u80f3\\u818a\\u4f53\\u80fd\\",\\"unitsNumber\\":\\"\\u7b2c\\u6b27\\u9646\\",\\"saledPrice\\":\\"\\u513f\\u5973\\",\\"storeTemperature\\":\\"95487343\\",\\"priceUnit\\":\\"\\u800c\\u4f60\\",\\"stockAmount\\":\\"\\u9887\\u5177\\",\\"salePricePerUnit\\":\\"\\u4e8c\\u725b\\",\\"storeHnmidity\\":\\"95487343\\",\\"pricePerUnit\\":\\"\\u800c\\u52aa\\u529b\\",\\"stockAmountUnit\\":\\"\\u4e8c\\u54e6\\",\\"storeSpotCategory\\":\\"\\u4f4e\\u843d\\",\\"saleTotalPrice\\":\\"\\u5730\\u4e3b\\",\\"productAmountUnit\\":\\"\\u4f60\\u725b\\",\\"storeSpot\\":\\"95487343\\",\\"sampledDepartmentNature\\":\\"\\u70ed\\u64adTim\\",\\"productAmount\\":\\"\\u5730\\u7801\\u5934\\",\\"totalPrice\\":\\"egg\\u4f59\\"},\\"inLandPhaInformation\\":{\\"productDepartmentPostCode\\":\\"95487343\\",\\"storeCondition\\":\\"95487343\\",\\"validityPeriod\\":\\"95487343\\",\\"productDepartment\\":\\"95487343\\",\\"approvalNumber\\":\\"95487343\\",\\"lotNumber\\":\\"95487343\\",\\"doseModel\\":\\"95487343\\",\\"chinessName\\":\\"95487343\\",\\"englishName\\":\\"95487343\\",\\"shelfLife\\":\\"95487343\\",\\"phaName\\":\\"95487343\\",\\"executiveStandard\\":\\"95487343\\",\\"preparationGuiGe\\":\\"95487343\\",\\"productDepartmentAddress\\":\\"95487343\\",\\"packageGuiGe\\":\\"95487343\\"},\\"inLandPackageCondition\\":{\\"middlePackage\\":\\"95487343\\",\\"noBorer\\":1,\\"noMildeu\\":1,\\"leastInPackage\\":\\"95487343\\",\\"sealing\\":1,\\"packageNoDamaged\\":1,\\"inPackage\\":\\"95487343\\",\\"noPollution\\":1,\\"smallPackage\\":\\"95487343\\",\\"noWaterPrint\\":1},\\"inLandBasicInformation\\":{\\"checkInstitution\\":\\"95487343\\",\\"phaIngredient\\":\\"95487343\\",\\"phaPreparations\\":\\"95487343\\",\\"taskCategory\\":\\"95487343\\",\\"comment\\":\\"\\u60a8\\u9519\\",\\"sampleGoal\\":\\"95487343\\",\\"specialPha\\":\\"95487343\\",\\"basePharmaceutical\\":1},\\"inLandEnforcementUnitSign\\":{\\"sampleDepartmentHandler\\":\\"95487343\\",\\"sampleDate\\":\\"2015-04-01\\",\\"sampleDepartmentPhone\\":\\"95487343\\",\\"sampleDepartmentList\\":[{\\"jingshouren\\":\\"1234\\",\\"xuhao\\":\\"1\\",\\"mima\\":\\"1234\\"}],\\"sampleDepartment\\":\\"\\u914d\\u5076\\u4e0d\\"},\\"inLandSupervoseOfferee\\":{\\"productionLicense\\":\\"95487343\\",\\"enforceInstruction\\":\\"95487343\\",\\"businessLicense\\":\\"95487343\\",\\"telephone\\":\\"95487343\\",\\"legalPerson\\":\\"95487343\\",\\"svoCategory\\":\\"95487343\\"},\\"inLandSuperviseOffereeSign\\":{\\"sampledDepartmentHandlerPhone\\":\\"95487343\\",\\"sampledDepartmentHandler\\":\\"95487343\\",\\"sampledDepartmentPostCode\\":\\"95487343\\",\\"sampledDepartmentPhone\\":\\"95487343\\",\\"sampledDepartment\\":\\"\\u5f88\\u4e0d\\"},\\"OnLine\\":0,\\"inLandSampleCondition\\":{\\"sampleConditionList\\":[{\\"three\\":\\"1\\",\\"two\\":\\"1\\",\\"xianghao\\":\\"1\\",\\"xuhao\\":\\"1\\",\\"one\\":\\"1\\"}],\\"sampleUnit\\":\\"95487343\\",\\"SampleNumber\\":\\"3\\",\\"sampleIncludeMaterial\\":\\"95487343\\",\\"sampleUnitsNumber\\":\\"1\\"},\\"SampleFormNumber\\":\\"G462015000002\\"}","type_cv1":"javascript_debug"} ', '', 1, 1, 99),
(12, 'fo_进口 _ 上传抽样单', 'v1', 'enter/uploading', 'enterfo/uploading', '录入模块中的上传模块，将抽样单中的所有信息通过json串上传，\n上传成功后code返回200，上传失败返回505。', '{\n"phaForm":"{\\"pharmaceuticalForm\\": {\\"OnLine\\": 0,\\"SampleFormNumber\\": \\"J462015000021\\",\\"UserName\\": \\"Zhangbo\\",\\"checkDepartment\\": {\\"checkDepartment\\": \\"efef\\",\\"checkDepartmentHandler\\": \\"geefe\\",\\"checkDepartmentPhone\\": \\"150\\"},\\"labelCheck\\": {\\"lotNumber\\": 0,\\"number\\": 0,\\"others\\": \\"95487343\\",\\"packageGuiGe\\": 0,\\"pharmaceuticalName\\": 1,\\"productDepartment\\": 1,\\"registerNumber\\": 0,\\"specification\\": 1,\\"unitsNumber\\": 0,\\"validityPeriod\\": 1},\\"othersInformation\\": {\\"jinKouKouAn\\": \\"95487343\\",\\"kouAnJu\\": \\"95487343\\",\\"maiFangDepartment\\": \\"95487343\\",\\"sellerDepartment\\": \\"95487343\\",\\"shangPinCode\\": \\"95487343\\",\\"shangPinDanJia\\": \\"95487343\\",\\"shouHuoDepartment\\": \\"95487343\\",\\"suiHuoWu\\": \\"95487343\\",\\"suiHuoWuTL\\": [{\\"guiGe\\": \\"12\\",\\"mingCheng\\": \\"12\\",\\"piHao\\": \\"12\\",\\"productDepartment\\": \\"12\\",\\"shuLiang\\": \\"12\\"},{\\"guiGe\\": \\"42\\",\\"mingCheng\\": \\"2\\",\\"piHao\\": \\"2\\",\\"productDepartment\\": \\"12\\",\\"shuLiang\\": \\"23\\"},{\\"guiGe\\": \\"12\\",\\"mingCheng\\": \\"1\\"piHao\\": \\"12\\",\\"productDepartment\\": \\"12\\",\\"shuLiang\\": \\"12\\"}],\\"tiYunDanHao\\": \\"95487343\\",\\"tongGuanDanHao\\": \\"95487343\\"},\\"packageCondition\\": {\\"inPackageMaterial\\": \\"95487343\\",\\"outPackage\\": \\"95487343\\",\\"outPackageMaterial\\": \\"95487343\\",\\"sealing\\": \\"95487343\\"},\\"pharmaceuticalInforamation\\": {\\"checkInformNumber\\": \\"95487343\\",\\"chineseName\\": \\"95487343\\",\\"compactNumber\\": \\"95487343\\",\\"doseModel\\": \\"95487343\\",\\"englishName\\": \\"95487343\\",\\"lotNumber\\": \\"95487343\\",\\"pharmaceuticalName\\": \\"95487343\\",\\"productDepartment\\": \\"95487343\\",\\"productRegion\\": \\"95487343\\",\\"registerNumber\\": \\"95487343\\",\\"specification\\": \\"95487343\\",\\"storeConditionl\\": \\"95487343\\",\\"teJinXuKe\\": \\"95487343\\",\\"validityPeriod\\": \\"95487343\\"},\\"sampleCondition\\": {\\"checkNumber\\": \\"95487343\\",\\"sampleConditionList\\": [{\\"one\\": \\"12\\",\\"three\\": \\"11\\",\\"two\\": \\"11\\",\\"xianghao\\": \\"2\\",\\"xuhao\\": \\"1\\"}],\\"sampleIncludeMaterial\\": \\"95487343\\",\\"sampleNumber\\": \\"34\\",\\"sampleUnit\\": \\"95487343\\",\\"sampleUnitsNumber\\": \\"1\\"},\\"sampleDepartment\\": {\\"sampleDate\\": \\"2015-05-0\\",\\"sampleDepartment\\": \\"1233\\",\\"sampleDepartmentHandler\\": \\"345\\",\\"sampleDepartmentPhone\\": \\"120\\"},\\"sampleSpot\\": {\\"samplePlace\\": \\"95487343\\",\\"storeHnmidity\\": \\"36\\",\\"storePlace\\": \\"95487343\\",\\"storeTemperature\\": \\"16\\"}}}"\n}', '{ "code":200,"msg":"succeed","data":{"name":"name"}}', 1, 0, 55),
(13, 'com _ 进口 _ 上传预定 ', 'v1', 'enter/book/', 'enter/book', '模块 : 抽样单号管理\n\n说明 : 本接口为上传预定的接口;\n\n参数 : 为要预定的抽样单号的数量;\n\n成功 : code返回200并且在data数组中返回所预定的抽样单号号码\n\n失败 : 预定失败则返回506.', '{\n"count":"2"\n}', '{\n"code":"200",\n"msg":"succeed",\n"data":["s1222121","a3543434"]\n}', 1, 0, 77),
(14, 'com _ 进口 _ 返还抽样单号', 'v1', 'enter/chexiao', 'enter/chexiao', '模块 :录入\n说明 :录入模块中的撤销功能，此功能会把手机端数据库中没有用过的抽样单号返回给数据库。\n参数 :SimpleNumber\n成功 :"code"的值为200\n失败 :“code”的值为-200', '{\n    "SimpleNumber":"[\n    \\"J462015000005\\",\n    \\"J462015000006\\"\n]"\n}', '{\n"code":"200",\n"data":[],\n"msg":"succeed"\n}', 1, 0, 66),
(15, '请求对应科室的医生数据', 'v3', 'docnav/hos_spec/:hos_id/:spec_id', 'r/s', '模块 :求医导航\n说明 :求医导航具体医院的专科医生信息\n参数 :hos_id医院id,spec_id专科id\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": {\n"id":"0",\n"doc":[{"name":"张三","job":"专家","url":"xxxx"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"},{"name":"李四","job":"专家","url":"zzz"}]\n}\n    \n    \n}', 1, 1, 0),
(16, '获取专科医院排名的科室索引', 'v3', 'docnav/special_list', 'r/s', '模块 :求医问药\n说明 :求医问药模块专科排行榜的科室索引\n参数 :\n成功 :\n失败 :', '', '{\n"code":200,\n"msg":"succeed",\n"data":{\n"department":["aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc",\n"aa","bb","cc"]\n}\n}', 1, 1, 0),
(17, '获取对应科室的详细数据', 'v3', 'docnav/spec_detail/:index', 'r/s', '模块 :求医导航\n说明 :求医导航模块专科排名的对应科室的详细数据\n参数 :index表示对应科室的id\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": {\n        "last": {\n            "id": "11",\n            "hospital_name": [\n                "北京大学附属肿瘤医院",\n                "第三医院"\n            ],\n            "hospital_rank": "11"\n        },\n        "rank": [\n            {\n                "id": "0",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "1",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "2",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "2",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "2",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "3",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "5",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "6",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            },\n            {\n                "id": "1",\n                "hospital_name": "复旦大学附属肿瘤医院",\n                "hospital_rank": "2",\n                "hospital_state": "不变",\n                "hospital_score": "8.8888"\n            }\n        ]\n    }\n}', 1, 1, 0),
(18, '获取最佳医院排名', 'v3', 'docnav/best_hosptail_list', 'r/s', '模块 :求医导航模块\n说明 :获取最佳医院排名及对应医院的科室排名\n参数 :缺省为获取最佳医院排名\n成功 :\n失败 :', '', '{\n"code":200,\n"msg":"succeed",\n"data":\n\n[{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"1",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n},\n{\n"id":"0",\n"hospital_name":"复旦大学附属肿瘤医院",\n"hospital_rank":"2",\n"hospital_spec":"5.5",\n"hospital_edu":"11",\n"hospital_score":"8.8888"\n}]\n}', 1, 1, 0),
(19, '请求某个最佳医院的详细信息', 'v3', 'docnav/best_hosptail/:spec_index', 'r/s', '模块 :求医导航\n说明 :请求某个医院的详细信息.\n参数 :spec_index,为发起请求的医院id\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": {\n        "id": "0",\n        "content": [\n            {\n                "rank_name": "第一名",\n                "rank_content": [\n                    "风湿病",\n                    "妇产科",\n                    "普通外科"\n                ]\n            },\n            {\n                "rank_name": "第二名",\n                "rank_content": [\n                    "病理科",\n                    "呼吸科",\n                    "麻醉科",\n                    "内分泌科"\n                ]\n            }\n        ]\n    }\n}', 1, 1, 0),
(20, 'fo_进口_检索 根据单号', 'v1', 'search/searchsampleforminformation', 'enterfo/simplenumber', '模块 :检索模块中的抽样单详细信息检索\n说明 :此接口用于实现在服务器上根据抽样单号\n参数 :"phaSimpleNumber":要查询的抽样单号\n成功 :查询成功"code"返回200，同时"data"中带有查询到的抽样单表的信息\n失败 :查询失败"code"返回508', '{\n"SampleFormNumber":"1"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":{\n        "OnLine": 0,\n        "SampleFormNumber": "98",\n        "checkDepartment": {\n            "checkDepartment": "天津报验",\n            "checkDepartmentHandler": "小天报",\n            "checkDepartmentPhone": "120"\n        },\n        "labelCheck": {\n            "lotNumber": 1,\n            "number": 1,\n            "others": "4884486",\n            "packageGuiGe": 1,\n            "pharmaceuticalName": 1,\n            "productDepartment": 1,\n            "registerNumber": 1,\n            "specification": 1,\n            "unitsNumber": 1,\n            "validityPeriod": 1\n        },\n        "packageCondition": {\n            "inPackageMaterial": "6464946",\n            "outPackage": "4844848",\n            "outPackageMaterial": "3446646",\n            "sealing": "4848646"\n        },\n        "pharmaceuticalInforamation": {\n            "checkInformNumber": "5754545",\n            "chineseName": "3424545",\n            "compactNumber": "8484845",\n            "doseModel": "0488486",\n            "englishName": "8454545",\n            "lotNumber": "9487878",\n            "pharmaceuticalName": "2454545",\n            "productDepartment": "2754545",\n            "productRegion": "8448755",\n            "registerNumber": "6484845",\n            "specification": "2457455",\n            "storeConditionl": "2457755",\n            "validityPeriod": "3446488"\n        },\n        "sampleCondition": {\n            "checkNumber": "1848489",\n            "sampleConditionList": [\n                {\n                    "one": "1",\n                    "three": "1",\n                    "two": "1",\n                    "xianghao": "1",\n                    "xuhao": "1"\n                },\n                {\n                    "one": "2",\n                    "three": "2",\n                    "two": "2",\n                    "xianghao": "2",\n                    "xuhao": "2"\n                },\n                {\n                    "one": "3",\n                    "three": "3",\n                    "two": "3",\n                    "xianghao": "3",\n                    "xuhao": "3"\n                }\n            ],\n            "sampleIncludeMaterial": "3464545",\n            "sampleNumber": "18",\n            "sampleUnit": "8484849",\n            "sampleUnitsNumber": "3"\n        },\n        "sampleDepartment": {\n            "sampleDepartment": "北京抽样",\n            "sampleDepartmentHandler": "小北抽",\n            "sampleDepartmentList": [\n                {\n                    "jingshouren": "小北抽",\n                    "mima": "123",\n                    "xuhao": "1"\n                }\n            ],\n            "sampleDepartmentPhone": "101"\n        },\n        "sampleSpot": {\n            "samplePlace": "8457676",\n            "storeHnmidity": "8478646",\n            "storePlace": "1845455",\n            "storeTemperature": "3745848"\n        }\n    }\n}', 1, 0, 55),
(21, 'zh_国内_检索 根据单号', 'v1', 'search/searchsampleforminformation_inland', 'enterzh/simplenumber_zh', '模块 :检索模块中的抽样单详细信息检索\n说明 :此接口用于实现在服务器上根据抽样单号\n参数 :"SampleFormNumber":要查询的抽样单号\n成功 :查询成功"code"返回200，同时"data"中带有查询到的抽样单表的信息\n失败 :查询失败"code"返回-200', '{\n"SampleFormNumber":"1"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":{\n    "OnLine": 1,\n    "inLandBasicInformation": {\n        "basePharmaceutical": 1,\n        "checkInstitution": "95487343",\n        "comment": "49494949",\n        "phaIngredient": "95487343",\n        "phaPreparations": "95487343",\n        "sampleGoal": "95487343",\n        "specialPha": "95487343",\n        "taskCategory": "95487343"\n    },\n    "inLandEnforcementUnitSign": {\n        "sampleDate": "",\n        "sampleDepartment": "1515466",\n        "sampleDepartmentHandler": "95487343",\n        "sampleDepartmentList": [\n            {\n                "jingshouren": "1234",\n                "mima": "1234",\n                "xuhao": "1"\n            }\n        ],\n        "sampleDepartmentPhone": "95487343"\n    },\n    "inLandPackageCondition": {\n        "inPackage": "95487343",\n        "leastInPackage": "95487343",\n        "middlePackage": "95487343",\n        "noBorer": 1,\n        "noMildeu": 1,\n        "noPollution": 1,\n        "noWaterPrint": 1,\n        "packageNoDamaged": 1,\n        "sealing": 1,\n        "smallPackage": "95487343"\n    },\n    "inLandPhaInformation": {\n        "approvalNumber": "95487343",\n        "chinessName": "95487343",\n        "doseModel": "95487343",\n        "englishName": "95487343",\n        "executiveStandard": "95487343",\n        "lotNumber": "95487343",\n        "packageGuiGe": "95487343",\n        "phaName": "95487343",\n        "preparationGuiGe": "95487343",\n        "productDepartment": "95487343",\n        "productDepartmentAddress": "95487343",\n        "productDepartmentPostCode": "95487343",\n        "shelfLife": "95487343",\n        "storeCondition": "95487343",\n        "validityPeriod": "95487343"\n    },\n    "inLandSampleCondition": {\n        "sampleConditionList": [\n            {\n                "one": "1",\n                "three": "1",\n                "two": "1",\n                "xianghao": "1",\n                "xuhao": "1"\n            }\n        ],\n        "sampleIncludeMaterial": "95487343",\n        "sampleNumber": "3",\n        "sampleUnit": "95487343",\n        "sampleUnitsNumber": "1"\n    },\n    "inLandSampleSpot": {\n        "pricePerUnit": "466464",\n        "priceUnit": "64646",\n        "productAmount": "646464",\n        "productAmountUnit": "6644",\n        "salePricePerUnit": "644646",\n        "saleTotalPrice": "846446",\n        "saleUsedState": "949494646",\n        "saledPrice": "66464",\n        "sampleSpot": "49494999",\n        "sampledDepartmentNature": "94949494",\n        "stockAmount": "464646",\n        "stockAmountUnit": "49464",\n        "storeHnmidity": "95487343",\n        "storeSpot": "95487343",\n        "storeSpotCategory": "49464664",\n        "storeTemperature": "95487343",\n        "totalPrice": "54464",\n        "unitsNumber": "644646"\n    },\n    "inLandSuperviseOffereeSign": {\n        "sampledDepartment": "1515466",\n        "sampledDepartmentHandler": "95487343",\n        "sampledDepartmentHandlerPhone": "95487343",\n        "sampledDepartmentPhone": "95487343",\n        "sampledDepartmentPostCode": "95487343"\n    },\n    "inLandSupervoseOfferee": {\n        "businessLicense": "95487343",\n        "enforceInstruction": "95487343",\n        "legalPerson": "95487343",\n        "productionLicense": "95487343",\n        "svoCategory": "95487343",\n        "telephone": "95487343"\n    }\n}\n}', 1, 0, 33),
(22, 'fo_进口_检索 详细', 'v1', 'search/search', 'enterfo/search', '模块 :检索模块中的抽样单位检索\n说明 :本接口能够实现检索模块中的抽样单位检索功能\n参数 :"SampleFormNumber":抽样单号,"sampledate":抽样日期,"startDate":开始日期,"endDate":终止日期,"simpleName":检品名称,"sampleDepartment":抽样单位,"pageSize":每次访问能够返回的最大数据量,"page":第几页,"UserName":用户名。\n成功 :查询成功，"code"的返回值为200，并且在"data"数组中有返回的', '{\n"SampleFormNumber":"5",\n"sampledate":"2015-02-12",\n"startDate":"2015-01-11",\n"endDate":"2015-02-28",\n"sampleName":"wahaha",\n"UserName":"Zhangbo",\n"sampleDepartment":"sampleDepartment",\n"pageSize":"10",\n"page":"1"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":[\n{\n"SampleFormNumber":"5",\n"pharmaceuticalName":"95487343",\n"OnLine":"1"\n},\n{\n"SampleFormNumber":"6",\n"pharmaceuticalName":"95487343",\n"OnLine":"1"\n}\n]\n}', 1, 0, 55),
(23, '求医问药问题库', 'v3', 'docnav/ask/:diseaseName', 'r/s', '模块 :求医问药\n说明 :求医问药模块问题库按照疾病名字请求数据\n参数 :diseaseName,疾病名称\n成功 :\n失败 :', '', '{\n"code":200,\n"msg":"succeed",\n"data":{\n"name":"青春痘",\n"symptom":"起了好多痘痘",\n"cause":"年青",\n"prevented":"变老",\n"asked":[\n{"question":"如何治疗0",\n"to":"不要放弃治疗0"\n},{"question":"如何治疗1",\n"to":"不要放弃治疗1"\n},{"question":"如何治疗2",\n"to":"不要放弃治疗2"\n},{"question":"如何治疗3",\n"to":"不要放弃治疗3"\n}\n]\n}\n}', 1, 1, 0),
(24, 'com _ 登录', 'v1', 'login', 'enter/login', '模块 :登录模块；\n说明 :本接口能够实现登录功能；\n参数 :"username":用户名，"password":密码；\n成功 :登陆成功"code"的返回值为"200"，data中的数据为用户的角色；\n失败 :返回值待定。', '{\n"username":"Avatarar",\n"password":"avatarar"\n}', '{\n"code":"200",\n"msg":"succeed",\n"data":“SAMPLEPERSON”\n}', 1, 0, 88),
(25, '院内导诊获取所有医院名字', 'v3', 'docnav/hospitalguidelist', 'r/s', '模块 :求医导航之院内导诊\n说明 :获取所有有导航数据的医院的名字\n参数 :\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "name": "1北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "2北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "3北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "4北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "5北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "6北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "7北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "8北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "2北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "3北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "4北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "5北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "6北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "7北京人民医院",\n            "id": "1"\n        },\n        {\n            "name": "8北京人民医院",\n            "id": "1"\n        },\n\n        {\n            "name": "北京人民医院",\n            "id": "1"\n        }, {\n            "name": "人民医院",\n            "id": "1"\n        }\n    ]\n}', 1, 1, 0),
(26, '获取院区分布图', 'v3', 'docnav/hospitalmap/:name', 'r/s', '模块 :求医导航院内导诊\n说明 :获取院区分布图\n参数 ::name医院名称\n成功 :\n失败 :', '', '{\n"code":200,\n"msg":"succeed",\n"data":{"route":"从南到北方","image":"http:192.168.0.200/mm"}\n}', 1, 1, 0),
(27, '获取门诊分布图', 'v3', 'docnav/outpatientmap/:name', 'r/s', '模块 :求医导航院内导诊\n说明 :获取门诊分布图\n参数 ::name医院名称\n成功 :\n失败 :', '', '{\n"code":200,\n"msg":"succeed",\n"data":{"route":"从南到北方","image":"http:192.168.0.200/mm"}\n}', 1, 1, 0),
(28, 'com _ 国内___窗口返回本地剩余的抽样单号', 'v1', 'enter/chexiao_inland', 'enter/chexiao', '模块 :录入\n说明 :录入模块中的撤销功能，此功能会把手机端数据库中没有用过的抽样单号返回给数据库。\n参数 :SimpleNumber\n成功 :"code"的值为200\n失败 :“code”的值为-200', '{\n    "SimpleNumber":"[\\"G462015000002\\",\\"G462015000001\\"]"\n}', '{\n"code":"200",\n"data":[],\n"msg":"succeed"\n}', 1, 0, 66),
(29, 'com _ 国内药品上传预定', 'v1', 'enter/book_inland', 'enter/book_gn', '模块 :录入模块；\n说明 :此接口为录入模块的上传功能；\n参数 :data：存储抽样单信息的数组；\n成功 :"code"返回值为200；\n失败 :“code”返回值待定。', '{\n"count":"1"\n}', '{\n"code":200,\n"message":"succeed",\n"data":["b131"]\n}', 1, 0, 77),
(30, 'zh_国内药品采样窗口的检索', 'v1', 'search/search_inland', 'enterzh/search_gn', '模块 :国内药品采样窗口的检索模块；\n说明 :根据传入的查询条件进行检索，成功后返回符合条件的数据；\n参数 :"SampleFormNumber":抽样单号,"sampledate":抽样日期,"startDate":开始日期,"endDate":终止日期,"simpleName":检品名称,"sampledDepartment":被抽样单位,"pageSize":每次访问能够返回的最大数据量,"page":第几页,"UserName":用户名。\n成功 :查询成功，"code"的返回值为200，并且在"da', '{\n"SampleFormNumber":"5",\n"sampledate":"2015-02-12",\n"startDate":"2015-01-11",\n"endDate":"2015-02-28",\n"sampleName":"wahaha",\n"UserName":"Zhangbo",\n"sampledDepartment":"adfsd",\n"pageSize":"10",\n"page":"1"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":[{\n"SampleFormNumber":"7",\n"pharmaceuticalName":"95487343",\n"OnLine":"1"\n},\n{\n"SampleFormNumber":"8",\n"pharmaceuticalName":"95487343",\n"OnLine":"1"\n}]\n}', 1, 0, 33),
(31, '登录', 'v3', 'user/login', 'Sse/login', '模块 :登录模块\n说明 :\n参数 :username登录用户名,pwd用户密码\n成功 :\n失败 :', '{"username":"",\n"pwd":""\n}', '{\n"code":200,\n"msg":"succeed",\n"data":""\n}', 1, 1, 999),
(32, '注册', 'v3', 'user/register', 'Sse/register', '模块 :用户注册\n说明 :\n参数 :username用户名pwd用户密码\n成功 :\n失败 :', '{\n"username":"",\n"pwd":""\n\n}', '{"code":200,\n"msg":"succeed",\n"data":""\n}', 1, 0, 999),
(33, '获取最新版本号', 'v3', 'user/updateApp', 'Sse/updateApp', '模块 :更新版本\n说明 :获取最新的app版本,url为最新版本的下载地址,version为最新版本号\n参数 :\n成功 :\n失败 :', '', '{"code":200,\n"msg":"succeed",\n"data":\n{\n"path":"http://gdown.baidu.com/data/wisegame/bd47bd249440eb5f/shenmiaotaowang2.apk",\n"version":"2.0",\n"description":"可以中大奖"\n}\n\n\n}', 1, 0, 999),
(34, '--------------------------------', 'v3', 'vvvvvvvvv/分割线', 'Sse/test', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '{\n"name":"zhangbo",\n"age":"23"\n}', '{\n"code":300,\n"msg":"898998899",\n"data":{\n"name":"zhangbo",\n"age":"23"\n}\n}', 1, 1, 988),
(35, '保存以及更新用户个人信息', 'v3', 'user/updateUserInfo', 'Sse/updateUserInfo', '模块 :个人信息设置\n说明 :保存以及更新个人信息\n参数 :\n"nickname":昵称,\n"name":姓名\n"gender":性别,\n"birth":生日,记录年月日,\n"stature":身高(单位cm),\n"weight":体重(单位kg)\n"region":地区\n"address":地址\n\n成功 :\n失败 :', '{\n"nickname":"zhai",\n"name":"name",\n"gender":"nan",\n"birth":"24",\n"stature":"1",\n"weight":"1",\n"region":"d",\n"address":"z"\n\n\n}', '{"code":200,\n"msg":"succeed",\n"data":""\n}', 1, 0, 999),
(36, '意见反馈', 'v3', 'user/feedback', 'Sse/feedback', '模块 :设置模块\n说明 :设置模块中的意见反馈\n参数 :content:用户反馈的内容\n成功 :\n失败 :', '{\n"content":"山东省地发斯蒂芬"\n}', '{"code":200,\n"msg":"succeed",\n"data":""\n}', 1, 0, 999),
(37, '获取用户信息', 'v5', 'getUserInfo', 'r/s', '模块: 个人信息设置\n说明 :获取个人信息\n参数 :username用户名\n成功 :\n失败 :', '{\n"username":"张三"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":{\n"nickname":"李白",\n"gender":"男",\n"birth":"1992.05",\n"stature":"180",\n"weight":"88"\n}\n}', 1, 1, 99),
(38, '修改用户密码', 'v3', 'user/changepassword', 'r/s', '模块 :设置模块修改密码\n说明 :\n参数 :"username":用户名,\n"orgpwd":原来密码,\n"newpwd":新密码\n成功 :\n失败 :', '{"username":"张三",\n"orgpwd":"123456",\n"newpwd":"abcdefg"\n}\n', '{\n"code":200,\n"msg":"修改成功",\n"data":""\n}', 1, 1, 999),
(39, '获取养生文章', 'v3', 'comm/healthknowledge', 'r/s', '模块 :获取养生文章\n说明 :\n参数 :"page":代表获取的第几页\n成功 :\n失败 :', '{\n"page":"1"\n}', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "article_id": "0010101",\n            "article_title": "别轻乎9个小征兆恐是心脏病前兆",\n            "article_detail": "现今由于医疗发达，健康饮食教育也更加普及，死于心脏疾病的人数已较过去少",\n            "article_url": "http://yidianzixun.com/n/08emCWIg/?s=9",\n            "article_author": "温州二手网",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010102",\n            "article_title": "给心脏上道“康复险”",\n            "article_detail": "年龄不是心脏康复的障碍",\n            "article_url": "http://192.168.1.200/xx",\n            "article_author": "39健康网",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010103",\n            "article_title": "老人勤刷牙_巧防心脏病",\n            "article_detail": "英国科学家日前发觉，口腔卫生状况不佳也会增加罹患心脏病的风险",\n            "article_url": "http://192.168.1.200/xx",\n            "article_author": "红牛养生堂",\n            "article_time": "2015-01-01"\n        }\n    ]\n}', 1, 1, 0),
(40, 'zh_国内采样单上传', 'v1', 'enter/uploading_inland', 'enterzh/uploading_inland', '模块 :国内药品采样窗口的录入模块\n说明 :本接口实现的是国内药品采样窗口的录入模块中的上传抽样单的功能。\n参数 :"inLandPhaForm"，国内药品抽样单的抽样单详细信息的json字符串\n成功 :"code"的值为200\n失败 :', ' {"phaForm":"{\\"UserName\\":\\"Zhangbo\\",\\"inLandSampleSpot\\":{\\"saleUsedState\\":\\"\\u800c\\u90a3\\u9898\\",\\"sampleSpot\\":\\"\\u80f3\\u818a\\u4f53\\u80fd\\",\\"unitsNumber\\":\\"\\u7b2c\\u6b27\\u9646\\",\\"saledPrice\\":\\"\\u513f\\u5973\\",\\"storeTemperature\\":\\"95487343\\",\\"priceUnit\\":\\"\\u800c\\u4f60\\",\\"stockAmount\\":\\"\\u9887\\u5177\\",\\"salePricePerUnit\\":\\"\\u4e8c\\u725b\\",\\"storeHnmidity\\":\\"95487343\\",\\"pricePerUnit\\":\\"\\u800c\\u52aa\\u529b\\",\\"stockAmountUnit\\":\\"\\u4e8c\\u54e6\\",\\"storeSpotCategory\\":\\"\\u4f4e\\u843d\\",\\"saleTotalPrice\\":\\"\\u5730\\u4e3b\\",\\"productAmountUnit\\":\\"\\u4f60\\u725b\\",\\"storeSpot\\":\\"95487343\\",\\"sampledDepartmentNature\\":\\"\\u70ed\\u64adTim\\",\\"productAmount\\":\\"\\u5730\\u7801\\u5934\\",\\"totalPrice\\":\\"egg\\u4f59\\"},\\"inLandPhaInformation\\":{\\"productDepartmentPostCode\\":\\"95487343\\",\\"storeCondition\\":\\"95487343\\",\\"validityPeriod\\":\\"95487343\\",\\"productDepartment\\":\\"95487343\\",\\"approvalNumber\\":\\"95487343\\",\\"lotNumber\\":\\"95487343\\",\\"doseModel\\":\\"95487343\\",\\"chinessName\\":\\"95487343\\",\\"englishName\\":\\"95487343\\",\\"shelfLife\\":\\"95487343\\",\\"phaName\\":\\"95487343\\",\\"executiveStandard\\":\\"95487343\\",\\"preparationGuiGe\\":\\"95487343\\",\\"productDepartmentAddress\\":\\"95487343\\",\\"packageGuiGe\\":\\"95487343\\"},\\"inLandPackageCondition\\":{\\"middlePackage\\":\\"95487343\\",\\"noBorer\\":1,\\"noMildeu\\":1,\\"leastInPackage\\":\\"95487343\\",\\"sealing\\":1,\\"packageNoDamaged\\":1,\\"inPackage\\":\\"95487343\\",\\"noPollution\\":1,\\"smallPackage\\":\\"95487343\\",\\"noWaterPrint\\":1},\\"inLandBasicInformation\\":{\\"checkInstitution\\":\\"95487343\\",\\"phaIngredient\\":\\"95487343\\",\\"phaPreparations\\":\\"95487343\\",\\"taskCategory\\":\\"95487343\\",\\"comment\\":\\"\\u60a8\\u9519\\",\\"sampleGoal\\":\\"95487343\\",\\"specialPha\\":\\"95487343\\",\\"basePharmaceutical\\":1},\\"inLandEnforcementUnitSign\\":{\\"sampleDepartmentHandler\\":\\"95487343\\",\\"sampleDate\\":\\"2015-04-01\\",\\"sampleDepartmentPhone\\":\\"95487343\\",\\"sampleDepartment\\":\\"\\u914d\\u5076\\u4e0d\\"},\\"inLandSupervoseOfferee\\":{\\"productionLicense\\":\\"95487343\\",\\"enforceInstruction\\":\\"95487343\\",\\"businessLicense\\":\\"95487343\\",\\"telephone\\":\\"95487343\\",\\"legalPerson\\":\\"95487343\\",\\"svoCategory\\":\\"95487343\\"},\\"inLandSuperviseOffereeSign\\":{\\"sampledDepartmentHandlerPhone\\":\\"95487343\\",\\"sampledDepartmentHandler\\":\\"95487343\\",\\"sampledDepartmentPostCode\\":\\"95487343\\",\\"sampledDepartmentPhone\\":\\"95487343\\",\\"sampledDepartment\\":\\"\\u5f88\\u4e0d\\"},\\"OnLine\\":0,\\"inLandSampleCondition\\":{\\"sampleConditionList\\":[{\\"three\\":\\"1\\",\\"two\\":\\"1\\",\\"xianghao\\":\\"1\\",\\"xuhao\\":\\"1\\",\\"one\\":\\"1\\"}],\\"sampleUnit\\":\\"95487343\\",\\"SampleNumber\\":\\"3\\",\\"sampleIncludeMaterial\\":\\"95487343\\",\\"sampleUnitsNumber\\":\\"1\\"},\\"SampleFormNumber\\":\\"G462015000002\\"}"} ', '{\n"code":200,\n"msg":"succeed",\n"data";{}\n}', 1, 0, 33),
(41, '获取心脏疾病列表', 'v3', 'comm/heartdiseaselist', 'r/s', '模块 :健康科普\n说明 :获取疾病名字等信息的列表\n参数 :\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "disease_id": "h_001",\n            "disease_name": "冠心病",\n            "disease_detail": "许多冠心病发作是可以预防的",\n            "disease_url": "http://192.168.1.200/v3/comm/diseaseitem"\n        },\n        {\n            "disease_id": "h_002",\n            "disease_name": "心律不齐",\n            "disease_detail": "心律不齐小问题大反应",\n            "disease_url": "http://192.168.1.200/xx"\n        },\n        {\n            "disease_id": "h_003",\n            "disease_name": "心肌炎",\n    "disease_detail": "心肌,生命力的关键",\n            "disease_url": "http://192.168.1.200/xx"\n        },\n        {\n            "disease_id": "h_004",\n            "disease_name": "心血管",\n"disease_detail": "生命流通的通道",\n            "disease_url": "http://192.168.1.200/xx"\n        }\n    ]\n}', 1, 1, 0),
(42, '获取疾病的子条目', 'v3', 'comm/diseaseitem', 'r/s', '模块 :知识模块\n说明 :获取疾病的详细条目\n参数 :disease_id要获取的疾病的id\n成功 :\n失败 :', '{\n"disease_id":"0001"\n}', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": \n      [\n            {\n                "item_id": "01",\n                "item_title": "什么是冠心病发作？",\n                "item_url": "http://hao.360.cn/?a1004"\n            },\n            {\n                "item_id": "02",\n                "item_title": "引起冠心病发作和脑卒中的原因有哪些",\n                "item_url": "http://192.168.1.200"\n            },\n  {\n                "item_id": "02",\n                "item_title": "什么是冠心病发作的症状",\n                "item_url": "http://192.168.1.200"\n            }\n        ,\n{\n                "item_id": "02",\n                "item_title": "冠心病发作时怎样做",\n                "item_url": "http://192.168.1.200"\n            }\n        \n    ]\n}', 1, 1, 0),
(43, '获取糖尿病接口', 'v3', 'comm/diabetes', 'r/s', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '{\n"page":"1"\n}', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "article_id": "0010101",\n            "article_title": "糖尿病的早期症状",\n            "article_detail": "糖尿病是一组以高血糖为特征的代谢性疾病。",\n            "article_url": "http://baike.baidu.com/link?url=gQWynIzi6YldjmgmdAvjNfYWuF8FxT9Kc-l7eDIK_Rsy3RnCtb9kVJ0mzJi0fbph#2",\n            "article_author": "百科名医网",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010102",\n            "article_title": "糖尿病的饮食治疗",\n            "article_detail": "糖尿病的饮食是很重要的，这也是很多患者都知道的问题.",\n            "article_url": "http://tnb.xywy.com/zhiliao/698037.html",\n            "article_author": "寻医问药社区",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010103",\n            "article_title": "糖尿病的自我疗法",\n            "article_detail": "糖尿病的发病原因是因为患者身体内血糖过高，胰岛素是身体内控制、消耗血糖的唯一有效激素。",\n            "article_url": "http://jingyan.baidu.com/article/375c8e19a2d33b25f3a22944.html",\n            "article_author": "糖尿病",\n            "article_time": "2015-01-01"\n        },\n {\n            "article_id": "0010104",\n            "article_title": "糖尿病的最佳疗法",\n            "article_detail": "糖尿病的发病原因是因为患者身体内血糖过高，胰岛素是身体内控制、消耗血糖的唯一有效激素。",\n            "article_url":"http://tnb.xywy.com/teseliaofa/808026.html",\n            "article_author": "糖尿病",\n            "article_time": "2015-01-01"\n        }\n    ]\n}', 1, 1, 0),
(44, '获取糖尿病专家建议', 'v3', 'comm/expertdiabetes', 'r/s', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '{\n"page":"1"\n}', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "article_id": "0010101",\n            "article_title": "糖尿病并发症有哪些，怎么预防",\n            "article_detail": "关于糖尿病的危害可以说很多人都知道晚期的时候就很难治愈了，所以预防称为了糖尿病患者的主要活动项目。",\n            "article_url": "http://jingyan.baidu.com/article/e52e36158991b440c60c51f1.html",\n            "article_author": "保健养生",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010102",\n            "article_title": "糖尿病酮症酸中毒 规范治疗五要点”",\n            "article_detail": "糖尿病酮症酸中毒是由于血糖控制差而发生的一种非常严重的情况，糖尿病患者能够充分认识到这一点，重视血糖的控制，是预防糖尿病酮症酸中毒发生的根本措施。",\n            "article_url": "http://www.haodf.com/jibing/zhuanti/tangniaobing.htm",\n            "article_author": "专家访谈",\n            "article_time": "2015-01-01"\n        },\n        {\n            "article_id": "0010103",\n            "article_title": "眼睛干涩 小心糖尿病视网膜病变",\n            "article_detail": "糖尿病视网膜病变（简称糖网）是糖尿病眼病中最严重的并发症，也是致盲的重要原因之一，在各种致盲眼病中约占8%",\n            "article_url": "http://www.haodf.com/jibing/zhuanti/tangniaobing/lable.htm?&page=2",\n            "article_author": "专家访谈",\n            "article_time": "2015-01-01"\n        }\n    ]\n}', 1, 1, 0),
(45, 'com_上传_图片', 'v1', 'enter/picture', 'enter/upfile', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '', '', 1, 0, 88),
(46, '登陆-电话', 'v5', 'con/logintel', 'r/s', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '{\n"usertel":"1388069199",\n"password":"Zhangbo",\n"verify":"asdfasdf"\n}', '{\n"code":"200",\n"msg":"succeed"\n}', 1, 1, 99),
(47, '--------------------------------', 'v3', 'vvvvvvvvv/分割线', 'r/s', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '', '', 1, 1, -1),
(48, '修改密码', 'v1', 'user/changepassword', 'enter/changepassword', '模块 :用户模块\n说明 :此接口为用户模块的修改密码接口\n参数 :"username"，用户名，“newPassword”,新密码\n成功 :返回值为"200"\n失败 :', '{\n"username":"username",\n"newPassword":"newPassword"\n}', '{\n"code":200,\n"message":"succeed",\n"data":[]\n}', 1, 0, 0),
(49, '检查更新', 'v1', 'user/checkupdate', 'r/s', '模块 :个人信息模块；\n说明 :此接口为个人信息模块的检查更新接口；\n参数 :“vercode”客户端的版本号；\n成功 :访问成功“code"的返回值为200,如果当前版本与最新版本一致，则data的值为1，如果不一致，data的返回值为0；\n失败 :”code“的返回值为不为200。', '{\n"vercode":"1"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":0\n}', 1, 1, 0),
(50, '-', '', '', 'r/s', '', '', '', 1, 1, 0),
(51, '知识页面获取疾病列表', 'v3', 'comm/diseaselist', 'r/s', '模块 :知识模块\n说明 :获取知识页面的疾病列表\n参数 :\n成功 :\n失败 :', '', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "disease_id": "h_001",\n            "disease_name": "冠心病",\n          \n            "disease_url": "http://192.168.1.200/v3/comm/diseaseitem"\n        },\n        {\n            "disease_id": "h_002",\n            "disease_name": "糖尿病",\n         \n            "disease_url": "http://192.168.1.200/xx"\n        },\n        {\n            "disease_id": "h_003",\n            "disease_name": "痛风",\n        \n            "disease_url": "http://192.168.1.200/xx"\n        },\n        {\n            "disease_id": "h_004",\n            "disease_name": "高血压",\n          \n            "disease_url": "http://192.168.1.200/xx"\n        }\n    ]\n}', 1, 1, 0),
(52, '获取某疾病的一个条目', 'v3', 'comm/diseasedetail', 'r/s', '模块 :\n说明 :\n参数 :\n成功 :\n失败 :', '{"disease_id":"001"\n"item_id":"001"\n}', '{\n    "code": 200,\n    "msg": "succeed",\n    "data": [\n        {\n            "disease_id": "h_001",\n"item_id":"001",\n            "item_title": "冠心病形成原因",\n          "item_content":"冠心病的形成原因是冠心病的形成原因是冠心病的形成原因是冠心病的形成原因是"\n           \n        }\n       \n        \n    ]\n}', 1, 1, 0),
(53, '更新进口药品抽样单', 'v1', 'enter/importmodification', 'enterfo/update', '模块 :录入模块；\n说明 :此接口为录入模块的更新进口药品抽样单接口，主要的是实现对进口药品抽样单的更新功能；\n参数 :"phaForm":药品抽样单；\n成功 :"code"的返回值为200；\n失败 :"code"的返回值不为200。', '{\n"phaForm":"{\\"pharmaceuticalForm\\": {\\"OnLine\\": 0,\\"SampleFormNumber\\": \\"J462015000021\\",\\"UserName\\": \\"Zhangbo\\",\\"checkDepartment\\": {\\"checkDepartment\\": \\"efef\\",\\"checkDepartmentHandler\\": \\"geefe\\",\\"checkDepartmentPhone\\": \\"150\\"},\\"labelCheck\\": {\\"lotNumber\\": 0,\\"number\\": 0,\\"others\\": \\"95487343\\",\\"packageGuiGe\\": 0,\\"pharmaceuticalName\\": 1,\\"productDepartment\\": 1,\\"registerNumber\\": 0,\\"specification\\": 1,\\"unitsNumber\\": 0,\\"validityPeriod\\": 1},\\"othersInformation\\": {\\"jinKouKouAn\\": \\"95487343\\",\\"kouAnJu\\": \\"95487343\\",\\"maiFangDepartment\\": \\"95487343\\",\\"sellerDepartment\\": \\"95487343\\",\\"shangPinCode\\": \\"95487343\\",\\"shangPinDanJia\\": \\"95487343\\",\\"shouHuoDepartment\\": \\"95487343\\",\\"suiHuoWu\\": \\"95487343\\",\\"tiYunDanHao\\": \\"95487343\\",\\"tongGuanDanHao\\": \\"95487343\\"},\\"packageCondition\\": {\\"inPackageMaterial\\": \\"95487343\\",\\"outPackage\\": \\"95487343\\",\\"outPackageMaterial\\": \\"95487343\\",\\"sealing\\": \\"95487343\\"},\\"pharmaceuticalInforamation\\": {\\"checkInformNumber\\": \\"95487343\\",\\"chineseName\\": \\"95487343\\",\\"compactNumber\\": \\"95487343\\",\\"doseModel\\": \\"95487343\\",\\"englishName\\": \\"95487343\\",\\"lotNumber\\": \\"95487343\\",\\"pharmaceuticalName\\": \\"95487343\\",\\"productDepartment\\": \\"95487343\\",\\"productRegion\\": \\"95487343\\",\\"registerNumber\\": \\"95487343\\",\\"specification\\": \\"95487343\\",\\"storeConditionl\\": \\"95487343\\",\\"teJinXuKe\\": \\"95487343\\",\\"validityPeriod\\": \\"95487343\\"},\\"sampleCondition\\": {\\"checkNumber\\": \\"95487343\\",\\"sampleConditionList\\": [{\\"one\\": \\"12\\",\\"three\\": \\"11\\",\\"two\\": \\"11\\",\\"xianghao\\": \\"2\\",\\"xuhao\\": \\"1\\"}],\\"sampleIncludeMaterial\\": \\"95487343\\",\\"sampleNumber\\": \\"34\\",\\"sampleUnit\\": \\"95487343\\",\\"sampleUnitsNumber\\": \\"1\\"},\\"sampleDepartment\\": {\\"sampleDate\\": \\"2015-05-0\\",\\"sampleDepartment\\": \\"1233\\",\\"sampleDepartmentHandler\\": \\"345\\",\\"sampleDepartmentPhone\\": \\"120\\"},\\"sampleSpot\\": {\\"samplePlace\\": \\"95487343\\",\\"storeHnmidity\\": \\"36\\",\\"storePlace\\": \\"95487343\\",\\"storeTemperature\\": \\"16\\"}}}"\n}', '{\n"code":200,\n"msg":"succeed",\n"data":[]\n}', 1, 0, 0);
INSERT INTO `userapi` (`id`, `name`, `v`, `api`, `ys`, `dis`, `request`, `response`, `enable`, `debug`, `sort`) VALUES
(54, '更新国内药品抽样单', 'v1', 'enter/inlandmodification', 'enterzh/update', '模块 :录入模块；\n说明 :此接口为录入模块的更新国内药品抽样单接口，实现的是更新国内药品抽样单的功能；\n参数 :"phaForm":药品抽样单；\n成功 :"code"的返回值为200；\n失败 :"code"的返回值不为200。', ' {"phaForm":"{\\"UserName\\":\\"Zhangbo\\",\\"inLandSampleSpot\\":{\\"saleUsedState\\":\\"\\u800c\\u90a3\\u9898\\",\\"sampleSpot\\":\\"\\u80f3\\u818a\\u4f53\\u80fd\\",\\"unitsNumber\\":\\"\\u7b2c\\u6b27\\u9646\\",\\"saledPrice\\":\\"\\u513f\\u5973\\",\\"storeTemperature\\":\\"95487343\\",\\"priceUnit\\":\\"\\u800c\\u4f60\\",\\"stockAmount\\":\\"\\u9887\\u5177\\",\\"salePricePerUnit\\":\\"\\u4e8c\\u725b\\",\\"storeHnmidity\\":\\"95487343\\",\\"pricePerUnit\\":\\"\\u800c\\u52aa\\u529b\\",\\"stockAmountUnit\\":\\"\\u4e8c\\u54e6\\",\\"storeSpotCategory\\":\\"\\u4f4e\\u843d\\",\\"saleTotalPrice\\":\\"\\u5730\\u4e3b\\",\\"productAmountUnit\\":\\"\\u4f60\\u725b\\",\\"storeSpot\\":\\"95487343\\",\\"sampledDepartmentNature\\":\\"\\u70ed\\u64adTim\\",\\"productAmount\\":\\"\\u5730\\u7801\\u5934\\",\\"totalPrice\\":\\"egg\\u4f59\\"},\\"inLandPhaInformation\\":{\\"productDepartmentPostCode\\":\\"95487343\\",\\"storeCondition\\":\\"95487343\\",\\"validityPeriod\\":\\"95487343\\",\\"productDepartment\\":\\"95487343\\",\\"approvalNumber\\":\\"95487343\\",\\"lotNumber\\":\\"95487343\\",\\"doseModel\\":\\"95487343\\",\\"chinessName\\":\\"95487343\\",\\"englishName\\":\\"95487343\\",\\"shelfLife\\":\\"95487343\\",\\"phaName\\":\\"95487343\\",\\"executiveStandard\\":\\"95487343\\",\\"preparationGuiGe\\":\\"95487343\\",\\"productDepartmentAddress\\":\\"95487343\\",\\"packageGuiGe\\":\\"95487343\\"},\\"inLandPackageCondition\\":{\\"middlePackage\\":\\"95487343\\",\\"noBorer\\":1,\\"noMildeu\\":1,\\"leastInPackage\\":\\"95487343\\",\\"sealing\\":1,\\"packageNoDamaged\\":1,\\"inPackage\\":\\"95487343\\",\\"noPollution\\":1,\\"smallPackage\\":\\"95487343\\",\\"noWaterPrint\\":1},\\"inLandBasicInformation\\":{\\"checkInstitution\\":\\"95487343\\",\\"phaIngredient\\":\\"95487343\\",\\"phaPreparations\\":\\"95487343\\",\\"taskCategory\\":\\"95487343\\",\\"comment\\":\\"\\u60a8\\u9519\\",\\"sampleGoal\\":\\"95487343\\",\\"specialPha\\":\\"95487343\\",\\"basePharmaceutical\\":1},\\"inLandEnforcementUnitSign\\":{\\"sampleDepartmentHandler\\":\\"95487343\\",\\"sampleDate\\":\\"2015-04-01\\",\\"sampleDepartmentPhone\\":\\"95487343\\",\\"sampleDepartment\\":\\"\\u914d\\u5076\\u4e0d\\"},\\"inLandSupervoseOfferee\\":{\\"productionLicense\\":\\"95487343\\",\\"enforceInstruction\\":\\"95487343\\",\\"businessLicense\\":\\"95487343\\",\\"telephone\\":\\"95487343\\",\\"legalPerson\\":\\"95487343\\",\\"svoCategory\\":\\"95487343\\"},\\"inLandSuperviseOffereeSign\\":{\\"sampledDepartmentHandlerPhone\\":\\"95487343\\",\\"sampledDepartmentHandler\\":\\"95487343\\",\\"sampledDepartmentPostCode\\":\\"95487343\\",\\"sampledDepartmentPhone\\":\\"95487343\\",\\"sampledDepartment\\":\\"\\u5f88\\u4e0d\\"},\\"OnLine\\":0,\\"inLandSampleCondition\\":{\\"sampleConditionList\\":[{\\"three\\":\\"1\\",\\"two\\":\\"1\\",\\"xianghao\\":\\"1\\",\\"xuhao\\":\\"1\\",\\"one\\":\\"1\\"}],\\"sampleUnit\\":\\"95487343\\",\\"SampleNumber\\":\\"3\\",\\"sampleIncludeMaterial\\":\\"95487343\\",\\"sampleUnitsNumber\\":\\"1\\"},\\"SampleFormNumber\\":\\"G462015000002\\"}"} ', '{\n"code":200,\n"msg":"succeed",\n"data":[]\n}', 1, 0, 0),
(55, '----------------------------', 'v1', '-', '', '', '', '', 1, 1, 0),
(56, '帮助', 'v3', 'user/helps', 'r/s', '模块 :帮助和隐私中获取帮助\n说明 :data中返回帮助页面所在的url\n参数 :\n成功 :\n失败 :', '', '{ "code": 200,\n    "msg": "succeed",\n    "data": "http://"\n}', 1, 1, 0),
(57, '申明', 'v3', 'user/declare', 'r/s', '模块 :隐私和帮助模块用户获取申明内容\n说明 :data中返回申明内容所在的url\n参数 :\n成功 :\n失败 :', '', '{ "code": 200,\n    "msg": "succeed",\n    "data": "http://"\n}', 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
