var oopen = '';
function switchto(former,toer){
	if(typeof(viewonehide)!="undefined"){
		clearTimeout(viewonehide);
	}
	
	// if(){

	// }
	console.log(former+'!'+toer);
	if(former!=toer && toer!='mone'){
		clearTimeout(mtime);
	}

	if(former == ''){
		clearTimeout(mtime);
		$("#list").transition('scale');
		$("#"+toer+"").transition('scale');
	}
	
	if(former != '' && toer != ''){
		if(former == toer){
			// mtime=setInterval(messageAdd,refreshtime*1000);
			mtime=setTimeout(messageAdd,refreshtime*1000);
			$("#"+toer+"").transition('scale');
			$("#list").transition('scale');
		}else{
			$("#"+former+"").transition('scale');
			$("#"+toer+"").transition('scale');
		}
	}
	if(toer == 'sign' && former != 'sign'){
		if(!opened){
			mperson=setInterval(personAdd,300);
			qdqopen = 1;
			persondata();
		}else if(opened==1){
			clearInterval(mperson);
			qdqopen = 0;
			opened = 2;
		}
	}else if(former == 'sign'){
		clearInterval(mperson);
		qdqopen = 0;
	}
	if(former == toer){
		oopen = '';
	}else{
		oopen = toer;
	}
	return oopen;	
}