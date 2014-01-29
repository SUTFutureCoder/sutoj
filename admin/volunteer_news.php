<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>控制中心</title>
	<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
	<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
</head>
<body>
<?php
require("../include/user.class.php");
@session_start();
if($_SESSION['U'] -> getU_id() != "admin"){
echo "非法操作";
exit(0);}
require('../include/db_info.inc.php');
?>

<form class="form-horizontal" name="form" action="newsupdate.php" method="post" >
        <fieldset>
          <legend>志愿者滚屏更改 </legend>

          <div class="control-group">
            <label class="control-label" for="textarea">滚屏内容</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" rows="7" name="volunteer_news"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">保存更改</button>
            <button type="reset" class="btn">清除</button>
          </div>
        </fieldset>
      </form>

</body>
</html>
