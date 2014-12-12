<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>function PCMSAD(PID) {
  this.ID        = PID;
  this.PosID  = 0; 
  this.ADID		  = 0;
  this.ADType	  = "";
  this.ADName	  = "";
  this.ADContent = "";
  this.PaddingLeft = 0;
  this.PaddingTop  = 0;
  this.Width = 0;
  this.Height = 0;
  this.IsHitCount = "N";
  this.UploadFilePath = "";
  this.URL = "";
  this.SiteID = 0;
  this.ShowAD  = showADContent;
  this.Stat = statAD;
}

function statAD(id) {
	var sp = document.createElement("SCRIPT");
	sp.type = "text/javascript";
	sp.src = "<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show&siteid="+this.SiteID+"&id="+id+"&spaceid="+this.PosID;
	document.body.appendChild(sp);
}

function showADContent() {
  var content = this.ADContent;
  var isIE=!!window.ActiveXObject;
  var str = "<div id='PCMSAD_"+this.PosID+"'>";
  var AD = eval('('+content+')');
  var count = 0;
  if(AD.ADImage.length){
	  count = AD.ADImage.length;
  }
  for(var i=0;i<count;i++){
	if (isIE){

		if (document.readyState=="complete"){
			this.Stat(AD.ADImage[i].imgID);
		} else {
			document.onreadystatechange=function(){
				if(document.readyState=="complete") this.Stat(AD.ADImage[i].imgID);
			}
		}
	} else {
		this.Stat(AD.ADImage[i].imgID);
	}
	  str += "<li><a href='"+this.URL+"&siteid="+this.SiteID+"&id="+AD.ADImage[i].imgID+"&url="+AD.ADImage[i].imgADLinkUrl+"' target='_blank'><img alt='"+AD.ADImage[i].imgADAlt+"' title='"+AD.ADImage[i].imgADAlt+"' src='"+this.UploadFilePath+AD.ADImage[i].ImgPath+"' ";
	  var sizeStr = "";
	  if(this.Width==0&&this.Height>0){
		  sizeStr = " height='"+this.Height+"' ";
	  }else if(this.Width>0&&this.Height==0){
		  sizeStr = " width='"+this.Width+"' ";
	  }else{
		  sizeStr = (this.Width < this.Height) ? " width='"+this.Width+"' " : " height='"+this.Height+"' ";
	  }
	  str += sizeStr;
	  str += " style='border:0px;'/></a></li>";
	}
  str += "</div>";
  document.write(str);
}
 
var cmsAD_<?php echo $pinfo['0']['id'];?> = new PCMSAD('cmsAD_<?php echo $pinfo['0']['id'];?>'); 
cmsAD_<?php echo $pinfo['0']['id'];?>.PosID = <?php echo $spaceid;?>; 
cmsAD_<?php echo $pinfo['0']['id'];?>.ADID = <?php echo $pinfo['0']['id'];?>; 
cmsAD_<?php echo $pinfo['0']['id'];?>.ADType = "<?php echo $pinfo['0']['type'];?>"; 
cmsAD_<?php echo $pinfo['0']['id'];?>.ADName = "<?php echo $pinfo['0']['name'];?>"; 
cmsAD_<?php echo $pinfo['0']['id'];?>.ADContent = "{'ADImage':[<?php $n=1;if(is_array($pinfo)) foreach($pinfo AS $p) { ?> <?php if($n!=1) { ?>,<?php } ?> {'imgID':'<?php echo $p['id'];?>','imgADLinkUrl':'<?php echo urlencode($p['setting'][1]['linkurl']);?>','imgADAlt':'<?php echo $p['setting']['1']['alt'];?>','ImgPath':'<?php echo $p['setting']['1']['imageurl'];?>','imgADLinkTarget':'New','showAlt':'Y'} <?php $n++;}unset($n); ?>]}"; 
cmsAD_<?php echo $pinfo['0']['id'];?>.URL = "<?php echo APP_PATH;?>index.php?m=poster&c=index&a=poster_click"; 
cmsAD_<?php echo $pinfo['0']['id'];?>.SiteID = <?php echo $siteid;?>; 
cmsAD_<?php echo $pinfo['0']['id'];?>.Width = <?php echo $width;?>; 
cmsAD_<?php echo $pinfo['0']['id'];?>.Height = <?php echo $height;?>; 
cmsAD_<?php echo $pinfo['0']['id'];?>.UploadFilePath = ""; 
cmsAD_<?php echo $pinfo['0']['id'];?>.ShowAD();
