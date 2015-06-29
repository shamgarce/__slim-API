-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-06-29 18:14:26
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dy_user`
--

INSERT INTO `dy_user` (`uid`, `user_login`, `user_password`, `user_name`, `user_tel`, `device_id`, `open_id`, `f_logintime`, `f_loginip`, `f_regtime`, `enable`, `phonenumber`, `category`) VALUES
(1, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
