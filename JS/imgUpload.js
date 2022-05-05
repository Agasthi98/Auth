
// initializing DOM elements
let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");
let imgDataBox = document.querySelector("#imgData")
let userid = document.querySelector("#userID")
let uploadPhoto = document.querySelector("#upload-photo")
let base64ImgData;

//disabalng capture button and upload button for null safety
click_button.disabled = true;
uploadPhoto.disabled = true;

camera_button.addEventListener('click', async function() {
   	let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
	video.srcObject = stream;

	//re-enabling capture button and upload button
	click_button.disabled = false;
	uploadPhoto.disabled = false;
});

click_button.addEventListener('click', function() {
   	canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
   	let base64Data = canvas.toDataURL('image/jpeg');

   	//console.log(base64Data);
    imgDataBox.textContent = base64Data
	base64ImgData = base64Data
	

});


uploadPhoto.addEventListener('click',()=>{
	(base64ImgData != null)?sendData(userid.value, base64ImgData):alert("No photo captured to upload")
	//sendData(userid.value, base64ImgData)
});


let sendData = (userID,imgData)=>{
	let dataParam = `userID=${userID}&imageData=${imgData}&addImages=`;
	//console.log(dataParam)
	$.ajax({
		type: "POST",
		url: `./API/insertData.php?`,
		data: dataParam,
		crossDomain: true,
		cache: false,
		success: function(e) {
			if (e == "done") {
				alert("Photo Added");
			}
			else if (e == "err") {
				alert("Coul not add the photo");
			}
			else if(e=="userErr"){
				alert("Please check the User ID")
			}
		}
	});
}
