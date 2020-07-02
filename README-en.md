<h1 align="center"> Ip </h1>

<p align="center"> A PHP component that gets location information based on IpV4 and IpV6 addresses</p>

[![Build Status](https://travis-ci.org/TIM168/Ip.svg?branch=master)](https://travis-ci.org/TIM168/Ip)
[![Latest Stable Version](https://poser.pugx.org/tim168/ip/v/stable)](https://packagist.org/packages/tim168/ip)
[![License](https://poser.pugx.org/tim168/ip/license)](https://packagist.org/packages/tim168/ip)
[![Latest Unstable Version](https://poser.pugx.org/tim168/ip/v/unstable)](https://packagist.org/packages/tim168/ip)
[![Total Downloads](https://poser.pugx.org/tim168/ip/downloads)](https://packagist.org/packages/tim168/ip)
[![composer.lock](https://poser.pugx.org/tim168/ip/composerlock)](https://packagist.org/packages/tim168/ip)

README: [中文](https://github.com/TIM168/Ip/blob/master/README.md "中文")/[English](https://github.com/TIM168/Ip/blob/master/README-en.md "English")

## Install

```shell
$ composer require tim168/ip
```

## Use
    require __DIR__ .'/vendor/autoload.php';

    use Tim168\Ip\Ip;
	
    $ip = new Ip('zh-CN');  //Support the following languages
## Supported language formats
|  character| describe  |
| :------------ | :------------ |
| en | english  |
| de  | german  |
| es  | spanish  |
| pt-BR  | portuguese  |
| fr  | french  |
| ja | japanese  |
| zh-CN  | chinese  |
| ru  | russian  |
## Get Ip location information
    $res = $ip->get('json','116.234.222.36')
	
## Example
	{
        "status": "success",  
        "country": "China",
        "countryCode": "CN",
        "region": "SH",
        "regionName": "Shanghai",
        "city": "Shanghai",
        "zip": "",
        "lat": 31.0449,
        "lon": 121.4012,
        "timezone": "Asia/Shanghai",
        "isp": "China Telecom (Group)",
        "org": "Chinanet SH",
        "as": "AS4812 China Telecom (Group)",
        "query": "116.234.222.36"
    }
## Get Xml Format
    $res = $ip->get('xml','116.234.222.36')
## Example
    <?xml version="1.0" encoding="UTF-8"?>
    <query>
    	<status>success</status>
    	<country>China</country>
    	<countryCode>CN</countryCode>
    	<region>SH</region>
    	<regionName>Shanghai</regionName>
    	<city>Shanghai</city>
    	<zip></zip>
    	<lat>31.0449</lat>
    	<lon>121.4012</lon>
    	<timezone>Asia/Shanghai</timezone>
    	<isp>China Telecom (Group)</isp>
    	<org>Chinanet SH</org>
    	<as>AS4812 China Telecom (Group)</as>
    	<query>116.234.222.36</query>
    </query>
## GET Csv Format
    $res = $ip->get('csv','116.234.222.36')
## Example
	success,China,CN,SH,Shanghai,Shanghai,,31.0449,121.4012,Asia/Shanghai,China Telecom (Group),Chinanet SH,AS4812 China
    Telecom (Group),116.234.222.36
## Get Serialization Format
    $res = $ip->get('php','116.234.222.36')
## Example
    a:14:{s:6:"status";s:7:"success";s:7:"country";s:5:"China";s:11:"countryCode";s:2:"CN";s:6:"region";s:2:"SH";s:10:"regionName";s:8:"Shanghai";s:4:"city";s:8:"Shanghai";s:3:"zip";s:0:"";s:3:"lat";d:31.0449;s:3:"lon";d:121.4012;s:8:"timezone";s:13:"Asia/Shanghai";s:3:"isp";s:21:"China
    Telecom (Group)";s:3:"org";s:11:"Chinanet SH";s:2:"as";s:28:"AS4812 China Telecom
    (Group)";s:5:"query";s:14:"116.234.222.36";}
## IpV4 to IpV6
	$res = $ip->IpV4toV6('116.234.222.36')
	
## Example
	0000:0000:0000:0000:0000:ffff:74ea:de24

## IpV6 to IpV4
	$res = $ip->IpV6toV4('0000:0000:0000:0000:0000:ffff:74ea:de24')
	
## Example
	116.234.222.36
## License
**MIT**

## End
#### Thank you for giving me a star
