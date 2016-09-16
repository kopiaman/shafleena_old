function LatestNews(){
	//alert("hello");
	$.ajax({
	   type: "POST",
	   url: "../admin/includes/jsondata.php",
	   data: {  
				'function': 'getNews'
			 },
	   dataType: "json",
	   success: function(data){
          			 var i;
            //$("#map_canvas").gMap('removeAllMarkers');
			//conlose.log();
			//console.log(data.RequestData[0].id);
			var options = '';
					  for(i = 0; i < data.RequestData.length; i += 1) {
						  
						 
							 options += '<span class="style1"><span class="style4">'+ data.RequestData[i].fdate+'</span> - <strong>'+ data.RequestData[i].tittle+'</strong></span><br />'+ data.RequestData[i].summary+'..<a href="../index.php?pg=5&id='+ data.RequestData[i].id +'" ><img src="images/more.png" alt="more" width="44" height="13" border="0" /></a></p>';


						//options += '<option value="' + data.RequestData[i].id + '">' + data.RequestData[i].typeName + '</option>';
					  }      
					  $("#RecentNews .Content").html(options);		   
	   }
		});   
}