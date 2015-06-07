# BookMS
A simple book management system.

## Documentation

### Dependences

* php
* mysql
* apache

### 表关系

* 身份（身份名称，可借本数，借阅期限）
* 读者（读者ID，密码，姓名，邮箱，身份）
* 工作人员（工号，密码，姓名）
* 管理员（账号，密码，姓名）
* 借阅（处理编号，读者ID，条码，借阅时间，归还/应还时间，是否已归还）
* 图书单册信息（条码，ISBN，馆藏，状态，是否可借阅）
* 图书基本信息（ISBN，书名，作者，出版社，年份，索引号）

