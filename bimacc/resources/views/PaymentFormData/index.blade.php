<script  src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>


<center><img src="https://www.aazp.in/wp-content/uploads/2017/12/InternetSlowdown_Day.gif" style="margin-top:17%;width:10%;"/></center>

<form style="" name="Formdata" id="Formdata" method="POST" action="https://uat-etendering.axisbank.co.in/easypay2.0/frontend/api/payment" >
    <textarea name="i" id="i"><?php echo $i; ?></textarea>
    <input class="btn btn-primary" type="submit" value="Submit" >       
</form>


<script>
$(document).ready(function(){ 
	$("#Formdata").submit(); 
});
</script>