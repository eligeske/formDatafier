var formDatafier = function(object,consoleIt){
	var formData = new FormData();				
	var append = function(item, name){
		formData.append(name, item); 
		if(consoleIt){ console.log(name+" = "+item); } 
	}
	var objectLooper = function(object, parentString){
		$.each(object,function(i,item){
			formField(i,item,parentString);
		});
	}
	var formField = function(key, item, parentString){
		var t = jQuery.type(item);
		if(item instanceof File){ t = "File"; }
		if(item instanceof FileList){ t = "FileList"; }					
		var name = (parentString)?parentString+"["+((typeof key == "number")?"":key)+"]":key;					
		switch(t){
			case "string":  append(item,name); break;
			case "boolean": append((item)?1:0,name); break;					
			case "object": objectLooper(item,name); break;
			case "array": objectLooper(item,name); break;
			case "File": append(item,name); break;
			case "FileList": objectLooper(item,name); break;
		}				
	}
	
	objectLooper(object);
	
	return formData;
}
