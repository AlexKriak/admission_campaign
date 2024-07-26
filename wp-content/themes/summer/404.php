
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - Page nof fount</title>
</head>
<style>
  *{
    padding: 0;
    margin: 0;
  }
  .center_div_error {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  .error_code{
    text-align: center;
    font-size: 300px;
    color: #494949;
  }
  .under_error{
      text-align: center;
      font-size: 40px;
      color: #494949;
  }
  .back_home{
      border: 2px solid #494949;
      display: block;
      width: 150px;
      line-height: 40px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      margin: 0 auto;
      margin-top: 40px;
      color: #000;
      font-weight: bold;
      transition: 0.3s;
  }
  .back_home:hover{
      background: #494949;
      color: #fff;
  }
</style>
<body>
    <div class="center_div_error">
        <div class="error_code">404</div>
        <div class="under_error">Page Not Fount</div>
        <a href="<?php echo home_url(); ?>" class="back_home">Go Home</a>
    </div>
</body>
</html>
