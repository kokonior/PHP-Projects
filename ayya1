<label><h3>Tambah Catatan</h3></label>
<form method="post" action="./model/proses.php" name="form1" id="form1" onSubmit="return valregister()">
	<div class="table-responsive">
	  <table class="table">
	   <tr>
	   	<td style="border-top:none;">
  			<textarea class="form-control" rows="10" name="note" id="note"></textarea>
	   	</td>
	   </tr>
	   <tr>
	   		<td style="border-top:none;">
	   			<button type="submit" name="simpan_note" id="save" onclick="saveForm(); return false;" class="btn btn-success">Simpan</button>
	   		</td>
	   </tr>
	  </table>
	</div>
</form>
<script type="text/javascript">
function valregister(){
            if(form1.note.value==""){
                        alert("Catatan tidak boleh kosong");
                        form1.note.focus();
                        return false;
            } 
             return true; 
}
</script>
