<html><title>SmoothProxy</title>
<body>
Please fill out the form below and click submit. <br />
<p>
Run ipconfig to find your IP if you don't know it.<br />
<strong>Make sure you have already updated IP in settings.json!</strong>
<p>
It will take a couple minutes to process. Be patient. 
<form action="sstv_init.php" method="post">
<table width="200" border="1">
  <tr>
    <td>Username:</td>
    <!--hardcode your username by adding it next to value -->
    <td><input name="username" type="text" value=""></td>
  </tr>
  <tr>
    <td>Password:</td>
    <!--hardcode your password by adding it next to value -->
    <td><input name="password" type="text" value=""></td>
  </tr>
  <tr>
    <td>Service:</td>
    <!--hardcode your service by adding selected next to it-->
    <td><select name="service" size="1">
    <option value="view247"> Live247</option>
    <option value="viewms" selected>MyStreams</option>
    <option value="viewss"> StarStreams</option>
    <option value="viewstvn">StreamTVNow</option>
    </select></td>
  </tr>
  <tr>
    <td>Server:</td>
    <td><select name="server" size="1">
   <!--hardcode your service by adding selected next to it-->
  <option value="dap">Asia/Oceana</option>
  <option value="deu">Euro Mix</option>
  <option value="deu-de">Euro DE Mix</option>
  <option value="deu-nl">Euro NL Mix</option>
    <option value="deu_nl1">EU NL1 (i3d)</option>
  <option value="deu_nl2">EU NL2 (i3d)</option>
    <option value="deu_nl3">EU NL3 (Amsterdam)</option>
  <option value="deu_nl4">EU NL4 (Breda)</option>
    <option value="deu_nl5">EU NL5 (Enschede)</option>
  <option value="deu-uk">Euro UK Mix</option>
    <option value="deu-uk1">EU UK1 (io)</option>
  <option value="deu-uk2">EU UK2 (100TB)</option>
    <option value="dna" >US/CA Server Mix</option>
    <option value="dnae">US/CA East Mix</option>
  <option value="dnae1">US/CA East 1 (NJ)</option>
    <option value="dnae2" selected>US/CA East 2 (VA)</option>
  <option value="dnae3">US/CA East 3 (MTL)</option>
    <option value="dnae4">US/CA East 4 (TOR)</option>
  <option value="dnae6">US/CA East 6 (NY)</option>
    <option value="dnaw">US/CA West Mix</option>
  <option value="dnaw1">US/CA West 1 (PHX)</option>
    <option value="dnaw2">US/CA West 2 (LAX)</option>
  <option value="dnaw3">US/CA West 3 (SJ)</option>  
  <option value="dnaw4">US/CA West 4 (CHI)</option> 
    </select></td>
  </tr>
  <tr>
    <td>IP:</td>
    <!--hardcode your service by editing it below-->
    <!--make sure it is also updated in config.json-->
    <td><input name="ip" type="text" value="192.168.x.x" /></td>
  </tr>
</table>
<p>
<input type="submit">
</form>
</body>
</html> 