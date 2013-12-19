formDatafier
============

Converts javascript object into FormData object with corresponding attr name values. Supports Object, Array, Boolean, String, File and FileList

**Requires jQuery**

**Example: **

**(Input)**
<pre>
var myData = {
	myString: "my value",
	myBoolean: true,
	myBoolean2: false,
	object: {myKey: "myValue", mySecondKey: ["array1",'arr2']}, 
	myArray:["asdfas","asdfasdf"],
	myFile: File(),
	myFileList: FileList()
}
myFormData = formObjectifier(myData);
</pre>
**(Output / consoled)**
<pre>
myString = my value
myBoolean = 1 
myBoolean2 = 0 
object[myKey] = myValue 
object[mySecondKey][] = array1 
object[mySecondKey][] = arr2 
myArray[] = asdfas 
myArray[] = asdfasdf 
myFile = [object File] 
myFileList[] = [object File] 
</pre>
