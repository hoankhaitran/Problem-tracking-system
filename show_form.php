<body>
<div id="content">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="new problem">
        <table width="703" border="1">
  <tr>
    <th width="135" align="left" scope="row">Problem Subject</th>
    <td id="cell" width="552" align="left" onMouseOver="changeColor('808080', this.id);" onMouseOut="changeColor('FFFFFF', this.id);"><label for="problem subject"></label>
      <input type="text" name="problem_subject" id="problem_subject" /></td>
  </tr>
  <tr>
    <th height="111" align="left" scope="row">Problem Description</th>
    <td id="cell1" align="left" onMouseOver="changeColor('808080', this.id);" onMouseOut="changeColor('FFFFFF', this.id);"><label for="problem_desc"></label>
      <textarea name="problem_desc" id="problem_desc" cols="60" rows="6"  ></textarea></td>
  </tr>
  <tr>
    <th align="left" scope="row">Category:</th>
    <td align="left"><label for="category">
      <select name="category" id="category">
        <option>Mouse</option>
        <option>Keyboard</option>
        <option>Printer</option>
        <option>Hardware</option>
        <option>Software</option>
        <option>Locked System</option>
        <option>Other</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <th scope="row" align="left">Date Due:</th>
    <td align="left"><input name="date_due" type="text" class="tcal" id="date_due" value="" readonly /></td>
  </tr>
  <tr>
    <th scope="row" align="left">System Type:</th>
    <td align="left">
      <select name="system_type" size="1" id="system_type">
        <option>pc</option>
        <option>mac</option>
        <option>laptop</option>
        <option>others</option>
      </select></td>
  </tr>
  <tr>
    <th scope="row" align="left">Room:</th>
    <td align="left"><select name="room" size="1" id="room">
      <option>RVR</option>
      <option>SCL</option>
      <option>ARC</option>
    </select><label><strong>Number</strong></label>
    <label for="room_number"></label>
    <input name="room_number" type="text" id="room_number" size="6" /> ####</td>
  </tr>
  <tr>
    <th scope="row"align="left">Position Room:</th>
    <td align="left"><input type="text" name="position_room" id="position_room" /></td>
  </tr>
  <tr>
    <th scope="row" align="left">Where:</th>
    <td align="left"><select name="where" size="1" id="where">
    <option>Lab</option>
	<option>faculty</option>
    <option>staff</option>
    <option>student</option>
    <option>cpe-eee_labs</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row" align="left">Computer Name:</th>
    <td align="left"><input type="text" name="computer_name" id="computer_name" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">First Name:</th>
    <td align="left"><input type="text" name="first_name" id="first_name" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Last Name:</th>
    <td align="left"><input type="text" name="last_name" id="last_name" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Email Address:</th>
    <td align="left"><input type="text" name="reporter_email" id="reporter_email" /></td>
  </tr>
  <tr>
    <th scope="row"align="left">Your Phone Number:</th>
    <td align="left"><input type="text" name="reporter_phone" id="reporter_phone" /> ###-###-#### (i.e 916-327-1432)</td>
  </tr>
  <tr>
    <th scope="row"align="left">Question</th>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" scope="row"align="center"><input type="submit" name="report" id="report" value="Report Problem" /></th>
    </tr>
</table>

        </form>
  
  		
</div>
</body>
