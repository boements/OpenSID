<?php if(empty($new)){?>
<script>
$(function(){
 var nik = {};
 nik.results = [
<?php foreach($penduduk as $data){?>
{id:'<?php echo $data['id']?>',name:"<?php echo $data['nik']." - ".($data['nama'])?>",info:"<?php echo ($data['alamat'])?>"},
<?php }?>{id:0,name:'<a href="form/0/1"><h5>Tambah Data Penduduk Baru</h5></a>',info:''}
 ];
nik.total = nik.results.length;

$('#nik_kepala').flexbox(nik, {
resultTemplate: '<div><label></label>{name}</div><div>{info}</div>',
watermark: 'Ketik no nik di sini..',
 width: 260,
 noResultsText :'<a href="form/0/1"><h5>Tambah Data Penduduk Baru</h5></a>',
 onSelect: function(){
$('#mainform').form.submit();
 }
});
$("#nik_detail").show();
});
</script>
<?php }?>

<style>
table.form.detail th{
 padding:5px;
 background:#fafafa;
 border-right:1px solid #eee;
}
table.form.detail td{
 padding:5px;
}
</style>

<div id="pageC">
<table class="inner">
<tr style="vertical-align:top">
<td style="background:#fff;padding:0px;">

<div class="content-header">
<h3>Form Manajemen KK</h3>
</div>
<div id="contentpane">
<form id="mainform" name="mainform" action="<?php echo $form_action?>" method="post" enctype="multipart/form-data">
<div class="ui-layout-center" id="maincontent" style="padding: 5px;">

<table class="form">

<?php if(empty($new)){?><tr>
<th width="120">Nomor KK</th>
<td><input class="inputbox <?php if($new > 0 AND $rt_sel > 0){?>required<?php }?>" type="text" name="no_kk" id="no_kk" size="25" value="<?php echo $kk['no_kk']?>"></td>
</tr><?php }?>

<tr>
<?php if($new){?><th width="120">Data Kepala KK Baru</th><?php }else{?><th>NIK / Nama Kepala KK</th><?php }?>
<td>
<div id="nik_kepala" name="nik_kepala"></div>
</td>
</tr>
<?php if($kk){?>

<?php }elseif($new){?>
<input type="hidden" name="new" value="1">

<tr>
<th width="100">Dusun</th>
<td><select name="dusun" onchange="formAction('mainform','<?php echo site_url('keluarga/form/0/1')?>')" <?php if($dusun){?>class="required"<?php }?>>
<option value="">Pilih Dusun</option>
<?php foreach($dusun as $data){?>
<option value="<?php echo $data['dusun']?>" <?php if($dus_sel==$data['dusun']){?>selected<?php }?>><?php echo unpenetration(ununderscore($data['dusun']))?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>RW</th>
<td><select name="rw" onchange="formAction('mainform','<?php echo site_url('keluarga/form/0/1')?>')" <?php if($rw){?>class="required"<?php }?>>
<option value="">Pilih RW</option>
<?php foreach($rw as $data){?>
<option value="<?php echo $data['rw']?>" <?php if($rw_sel==$data['rw']){?>selected<?php }?>><?php echo $data['rw']?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>RT</th>
<td><select name="rt" onchange="formAction('mainform','<?php echo site_url('keluarga/form/0/1')?>')" <?php if($rt){?>class="required"<?php }?>>
<option value="">Pilih RT</option>
<?php foreach($rt as $data){?>
<option value="<?php echo $data['id']?>" <?php if($rt_sel==$data['id']){?>selected<?php }?>><?php echo $data['rt']?></option>
<?php }?></select>
</td>
</tr>
<?php if($rt_sel){?>




<tr>
<th class="top">Foto</th>
<td>
<div class="userbox-avatar">
<img src="<?php echo base_url()?>assets/files/user_pict/kuser.png" alt=""/>
</div>
</td>
</tr>

<tr>
<th>Ganti Foto</th>
<td><input type="file" name="foto" value="<?php echo $penduduk_kk['foto']?>"/> <span style="color: #aaa;">(Kosongi jika tidak ingin mengubah foto)</span></td>
</tr>

<tr>
<th width="120">Nomor KK</th>
<?php
// $penduduk dipakai kalau validasi data gagal
  if ($penduduk_kk):
    $no_kk = $penduduk_kk['no_kk'];
  else:
    $no_kk = $kk['no_kk'];
  endif;
?>
<td><input class="inputbox required" type="text" name="no_kk" id="no_kk" size="25" value="<?php echo $no_kk ?>"/></td>
</tr>

<tr>
<th>Nama</th>
<td><input name="nama" type="text" class="inputbox required" size="60" value="<?php echo strtoupper(unpenetration($penduduk_kk['nama']))?>"/></td>
</tr>


<tr>
<th>NIK</th>
<td><input name="nik" type="text" class="inputbox required" size="30" value="<?php echo $penduduk_kk['nik']?>"/></td>
</tr>


<tr>
<th>Jenis Kelamin</th>
<td>
<div class="uiradio">
<input type="radio" id="sx1" name="sex" value="1" <?php if($penduduk_kk['sex'] == '1' OR $penduduk_kk['sex'] == ''){echo 'checked';}?>/>
<label for="sx1">Laki-laki</label>
<input type="radio" id="sx2" name="sex" value="2" <?php if($penduduk_kk['sex'] == '2'){echo 'checked';}?>/>
<label for="sx2">Perempuan</label>
</div>
</td>
</tr>

<tr>
<th>Tempat Lahir</th>
<td><input name="tempatlahir" type="text" class="inputbox" size="65" value="<?php echo strtoupper($penduduk_kk['tempatlahir'])?>"/></td>
</tr>

<tr>
<th>Tanggal Lahir</th>
<td><input name="tanggallahir" type="text" class="inputbox datepicker" size="20" value="<?php echo $penduduk_kk['tanggallahir']?>"/></td>
</tr>

<tr>
<th>Agama</th>
<td><select name="agama_id" class="required">
<option value="">Pilih Agama</option>
<?php foreach($agama as $data){?>
<option value="<?php echo $data['id']?>"<?php if($penduduk_kk['agama_id']==$data['id']){?>selected<?php }?>><?php echo $data['nama']?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Pendidikan dalam KK</th>
<td><select name="pendidikan_kk_id">
<option value="">Pilih Pendidikan</option>
<?php foreach($pendidikan_kk as $data){?>
<option value="<?php echo $data['id']?>" <?php if($penduduk_kk['pendidikan_kk_id']==$data['id']){?>selected<?php }?>><?php echo $data['nama']?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Pekerjaan</th>
<td><select name="pekerjaan_id">
<option value="">Pilih Pekerjaan</option>
<?php foreach($pekerjaan as $data){?>
<option value="<?php echo $data['id']?>" <?php if($penduduk_kk['pekerjaan_id']==$data['id']){?>selected<?php }?>><?php echo $data['nama']?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Status Perkawinan</th>
<td><select name="status_kawin">
<option value="">Pilih Status</option>
<?php foreach($kawin as $data){?>
<option value="<?php echo $data['id']?>" <?php if($penduduk_kk['status_kawin']==$data['id']){?>selected<?php }?>><?php echo strtoupper($data['nama'])?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Hubungan dalam Keluarga</th>
<td><select name="kk_level">
<option value="">Pilih Hubungan</option>
<?php foreach($hubungan as $data){?>
<option value="<?php echo $data['id']?>" <?php if($penduduk_kk['kk_level']==$data['id']){?> selected<?php }?>><?php echo $data['nama']?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Kewarganegaraan</th>
<td><select name="warganegara_id">
<option value="">Pilih warganegara</option>
<?php foreach($warganegara as $data){?>
<option value="<?php echo $data['id']?>" <?php if($penduduk_kk['warganegara_id']==$data['id']){?>selected<?php }?>><?php echo strtoupper($data['nama'])?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>No Pasport</th>
<td><input name="dokumen_pasport" type="text" class="inputbox" size="20" value="<?php echo strtoupper($penduduk_kk['dokumen_pasport'])?>"/></td>
</tr>

<tr>
<th>No Kitas/Kitap</th>
<td><input name="dokumen_kitas" type="text" class="inputbox" size="20" value="<?php echo strtoupper($penduduk_kk['dokumen_kitas'])?>"/></td>
</tr>

<tr>
<th>NIK Ayah</th>
<td><input name="ayah_nik" type="text" class="inputbox" size="30" value="<?php echo $penduduk_kk['ayah_nik']?>"/></td>
</tr>

<tr>
<th>NIK Ibu</th>
<td><input name="ibu_nik" type="text" class="inputbox" size="30" value="<?php echo $penduduk_kk['ibu_nik']?>"/></td>
</tr>

<tr>
<th>Nama Ayah</th>
<td><input name="nama_ayah" type="text" class="inputbox" size="60" value="<?php echo strtoupper(unpenetration($penduduk_kk['nama_ayah']))?>"/></td>
</tr>

<tr>
<th>Nama Ibu</th>
<td><input name="nama_ibu" type="text" class="inputbox" size="60" value="<?php echo strtoupper(unpenetration($penduduk_kk['nama_ibu']))?>"/></td>
</tr>

<tr>
<th>Golongan Darah</th>
<td><select name="golongan_darah_id" class="required">
<option value="">Pilih Golongan Darah</option>
<?php foreach($golongan_darah as $data){?>
<option value="<?php echo $data['id']?>"<?php if($penduduk_kk['golongan_darah_id']==$data['id']){?>selected<?php }?>><?php echo strtoupper($data['nama'])?></option>
<?php }?></select>
</td>
</tr>

<tr>
<th>Status</th>
<td>
<div class="uiradio">
<input type="radio" id="group1" name="status" value="1" <?php if($penduduk_kk['status'] == "1" OR $penduduk_kk['status'] == ""){echo 'checked';}?>><label for="group1">Tetap</label>
<input type="radio" id="group2" name="status" value="2" <?php if($penduduk_kk['status'] == "2"){echo 'checked';}?>><label for="group2">Tidak Aktif</label>
</div>
</td>
</tr>


<?php }
}?></table>
</div>



<div class="ui-layout-south panel bottom">
<div class="left">
<a href="<?php echo site_url()?>keluarga" class="uibutton icon prev">Kembali</a>
</div>
<div class="right">
<div class="uibutton-group">
<button class="uibutton" type="reset">Clear</button>
<button class="uibutton confirm" type="submit" >Simpan</button>
</div>
</div>
</div>
</form>
</div>
</td></tr>
</table>
</div>
