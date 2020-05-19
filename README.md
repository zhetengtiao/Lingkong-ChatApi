# Lingkong-ChatApi
****轻量级的留言板api，使用Mysql****

灵感：来自于某个秘密QQ群，被启发所做出的

（特别感谢那位“预言帝”，预言一下彩票可否啊亲？）

语言使用php动态网页语言，暂时只可以做到以下几种选项（如果不够你可以自己修改）
（我开发用的是php7.4和mysql5）

|  选项（o）   | 描述  |
|  ----  | ----  |
| v  | Version，版本信息 |
| r  | reload，在数据库内安装ChatApi |
| a  | add，在数据库内新建一个apikey |
| l  | list，列出指定apikey中的留言，返回为json |
| n | new，在指定apikey中新建留言 |

| 参数 | 描述 | 是否必填 |
|  ----  | ----  | ----|
| passwd | 管理员密码，可在index.php中设置|在使用r和a选项时必填|
| o | option，选项|必填|
| r | reload，r选项的设置|当使用自定义数据库时必须填no_CD，no_CD指的是不创建chatapi数据库，在开头设置的数据库内直接安装|
| apikey | 在使用a选项时返回的随机字符串 | 在l和n两个选项中必填|
| text | 留言内容 | 在n选项中必填|

l选项返回值的实例
```$xslt
[{"TEXT":"test","reg_date":"2020-05-19 14:22:43"},{"TEXT":"test","reg_date":"2020-05-19 14:23:12"}]
```
TEXT就是留言内容，reg_date就是留言时间。上述示例中有两个留言，内容为text

实例：（get方法）
```$xslt
http://localhost/index.php?o=r&passwd=Ab1234
```
使用get方式获取运行结果也好，浏览器直接访问也可以

index.php开头有配置用的，使用前需先去那里配置好

如有任何使用问题加我QQ：1410007625
-------------------
```
What you laughed at me yesterday, I turned it into motivation today.
And I will never forget the "power" you gave me.
Don't forget that there are more powerful people besides you, and don't be arrogant.
Otherwise that's how you get in the way of yourself.
I hope you can remember that,Don't be like them.
:)
```
这就是我想对那群人说的和对你说的，希望你能记得:)