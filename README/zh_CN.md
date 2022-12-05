# Ban User-Agent [![Listed in Awesome YOURLS!](https://img.shields.io/badge/Awesome-YOURLS-C5A3BE)](https://github.com/YOURLS/awesome-yourls/)
- 需要安装 [YOURLS](https://yourls.org) 大于或等于`1.91`版本
- 当前页面语言为： :cn: [中文(简体)](./zh_CN.md)

---
## 特点
:bulb: 介绍: 在某些浏览器中禁止访问简短的地址，并提示在其他浏览器中打开这些地址

:bulb: 介绍(E): 去他妈的微信和QQ浏览器

基于[这个项目](https://github.com/8Mi-Tech/short-url-mini-cn)的主要功能设计，适配[YOURLS](https://yourls.org)

---
## 如何安装?

:bulb: 这是一个展示如何安装软件包的好地方。方法如下。

1. 在`/user/plugins`中，创建一个名为`yourls-ban-useragent`的新文件夹。(或者你可以使用`git clone`)
2. 把这些文件放到该目录中。
3. 进入插件管理页面（例如：`http://sho.rt/admin/plugins.php`）并激活该插件。
4. 玩得开心!

---
## 目标清单
状态标志    :x: 未解决    :o: 解决   :question: 未知状态
| 状态 | 问题 |  解决方案 |
|-|-|-|
| :x: | 识别User-Agent |
| :o: | 跳转页面 | [pls-use-other-ua.php](../pls-use-othher-ua.php) |
| :x: | 使 [urlads](https://github.com/8Mi-Tech/yourls-conditional-urlads) 插件支持 | 

---
## License

本项目采用[GPLv3](../LICENSE)许可协议.
