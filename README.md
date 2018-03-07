# Vitale.Wang API idcard PHP Client 身份号码信息解析

 这是Vitale.Wang API的PHP版本封装开发包，由Vitale.Wang提供，一般支持最新的 API 功能。

 > 支持的 PHP 版本: 5.3.3 ～ 5.6.x, 7.0.x
 ## Installation

 #### 使用 Composer 安装

 - 在项目中的 `composer.json` 文件中添加 Organize 依赖：

 ```json
 "require": {
     "wangyi/idcard": "dev-master"
 }
 ```

 - 执行 `$ php composer.phar install` 或 `$ composer install` 进行安装。

 #### 直接下载源码安装

 > 直接下载源代码也是一种安装 SDK 的方法，不过因为有版本更新的维护问题，所以这种安装方式**十分不推荐**，但由于种种原因导致无法使用 Composer，所以我们也提供了这种情况下的备选方案。

 - 下载源代码包，解压到项目中
 - 在项目中引入 autoload：

 ```php
 require 'path_to_sdk/autoload.php';
 ```

 #### 初始化
  ```php
  use \Idcard\IdcardInit as Idcard;
  ...
  ...
 
      $idcard = new Idcard('11xxxxxxxxxxxxxxxx');
 
  ...
  ```
 
  OR
 
  ```php
  $client = new \Idcard\IdcardInit('11xxxxxxxxxxxxxxxx');
  ```
  ### 检查身份证是否生效
  ```php
    $check = $idcard->check()->check();
  ```
  ### 判端性别
  ```php
    $sex = $idcard->getSex()->getSex();
  ```
  ### 获取年龄、出生年月、生肖、星座
  ```php
    //年龄
    $age = $idcard->getAge()->getAge();
    //出生年月日，默认返回格式为Y-m-d,可自定义
    $birthday = $idcard->getAge()->getBirthday('Y年m月d日');
    //出生年份
    $year = $idcard->getAge()->getBirthdayYear();
    //出生月份
    $month = $idcard->getAge()->getBirthdayMonth();
    //出生日
    $day = $idcard->getAge()->getBirthdayDay();
    //生肖
    $ChineseZodiac = $idcard->getAge()->getChineseZodiac();
    //星座
    $Constellation = $idcard->getAge()->getConstellation();
  ```
  ### 获取地域信息
  ```php
    //获取省份：河北省
    $province = $idcard->getArea()->getProvince();
    //获取城市：河北省石家庄市
    $city = $idcard->getArea()->getCity();
    //获取详细地址信息
    $area = $idcard->getArea()->getArea();
  ```
   ## Contributing
  
   Bug reports and pull requests are welcome on GitHub at https://github.com/HowieBird/idcard
  
   ## License
  
   The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
 