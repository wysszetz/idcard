# Vitale.Wang API idcard PHP Client 身份号码信息解析

 这是Vitale.Wang API的PHP版本封装开发包，由Vitale.Wang提供，一般支持最新的 API 功能。

 > 支持的 PHP 版本: 5.3.3 ～ 5.6.x, 7.0.x
 ## Installation

 #### 使用 Composer 安装

 - 在项目中的 `composer.json` 文件中添加 Organize 依赖：

```json
{
  "require": {
     "peter-wan/idcard": "dev-master"
  }
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
 
      $idcardObj = new Idcard('11xxxxxxxxxxxxxxxx');
 
  ...
  ```
 
  OR
 
  ```php
  $idcardObj = new \Idcard\IdcardInit('11xxxxxxxxxxxxxxxx');
  ```
  ### 检查身份证是否生效，生效返回TRUE，失效情况下在初始化阶段抛出异常
  ```php
    $check = $idcardObj->getParams("check");
  ```
  ### 判端性别
  ```php
    //可自定义返回性别值
    $gender = $idcardObj->gender()->getGender($male = '男', $female = '女');
  ```
  ### 获取年龄、出生年月、生肖、星座
  ```php
    $birthdayObj = $idcardObj->birth()->getIdCardBirthInfo();
    //年龄
    $age = $birthdayObj->age;
    //出生年月日
    $birthday = $birthdayObj->birthday;
    //出生年份
    $year = $birthdayObj->birthday_year;
    //出生月份
    $month = $birthdayObj->birthday_month;
    //出生日
    $day = $birthdayObj->birthday_day();
    //生肖
    $ChineseZodiac = $birthdayObj->chinese_zodiac();
    //星座
    $Constellation = $birthdayObj->constellation;
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
  ### 身份证工具
  ```php
      //补全15位身份证号码
      $newIdcard = $idcardObj->tools()->get18LengthFrom15Length();
      //隐藏位数 1333***********1111 可自定义隐藏替代字符，左右值为非负整数，$left + $right <= 10 & >=0
      $format = $idcardObj->tools()->getIdcardFormat($format = '*', $left = 4, $right = 4);
    ```
   ## Contributing
  
   Bug reports and pull requests are welcome on GitHub at https://github.com/PerterWan/idcard
  
   ## License
  
   The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
 