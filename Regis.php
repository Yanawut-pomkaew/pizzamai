<!DOCTYPE html>
<html>
<style>
    .title_bar {
        width: 96.1%;
        height: auto;
        padding: 30px;
        background-color: rgb(255, 0, 0);
        position: absolute;
        top: 0px;
        left: 0px;
        color: #FFFFFF;
        text-align: center;
        font-size: 40px;
    }
    .center {
        margin-top: 70px;
        margin-left: 30%;
        margin-right: 30%;
        font-size: 20px;
        position: relative;
    }
    input[type=text] {
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid rgb(215, 232, 235);
        background-color: rgb(215, 232, 235);
    }
    .button {
    position: absolute;
    background-color: #fffb00;
    border: none;
    color: rgb(0, 0, 0);
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    width: 30%;
    right: 35%;
    border-radius: 25px;
    }
    .button1 {
    background-color: #fffb00; 
    color: black; 
    border: 2px solid #000000;
    }

    .button1:hover {
    background-color: #aab02f;
    color: rgb(0, 0, 0);
    }
</style>
<head>
    <meta charset='utf-8'>
    <title>Register Page</title>
    
</head>
    <div class="title_bar">
        Member Register
    </div>    
    <div style = "position:relative; left:5px; top:0px;">
        <img src="PizzaMai.png" width="100" height="100">
    </div>
    <div class = 'center'>
        <form>
            ชื่อ<br>
            <input type="text" id="fname" name="fname" placeholder="ชื่อจริง" style="width: 40%;"><input type="text" id="lname" name="lname" placeholder="นามสกุล" style="width: 40%;right: 15%;position: absolute;">
            <br>ที่อยู่<br>
            <input type="text" id="homenumber" name="homenumber" placeholder="บ้านเลขที่" style="width: 20%;"><input type="text" id="vill" name="vill" placeholder="ตึก/หมู่บ้าน" style="width: 35%;left: 25%;position: absolute"><input type="text" id="street" name="street" placeholder="ถนน/ซอย" style="width: 35%;right: 0%;position: absolute;">
            <br>
            <input type="text" id="canton" name="canton" placeholder="เขต" style="width: 20%;"><input type="text" id="district" name="district" placeholder="แขวง" style="width: 35%;left: 25%;position: absolute"><input type="text" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" style="width: 35%;right: 0%;position: absolute;"><br>
            <input type="text" id="country" name="country" placeholder="จังหวัด" style="width: 29%;">
            <br>เบอร์โทรศัพท์<br>
            <input type="text" id="country" name="country" placeholder="0XX-XXX-XXXX" style="width: 33%;">
        </form>
        <br><br>
        <button class="button button1">Register</button>
    </div>
</body>
</html>