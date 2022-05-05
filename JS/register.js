
//initializing DOM elements
let fname = document.querySelector("#fname")
let lname = document.querySelector("#lname")
let uid = document.querySelector("#uid")


//Data add func
const addData = (u_id,f_name,l_name)=>{
    let dataString = `uid=${u_id}&fname=${f_name}&lname=${l_name}&addUser=`;
    console.log(dataString)
       $.ajax({
           type: "POST",
           url: `./API/insertData.php?`,
           data: dataString,
           crossDomain: true,
           cache: false,
           success: function(e) {
               if (e == "done") {
                   //runs if success
                   alert("User Added");
                   window.open(`./addImg.php?uid=${u_id}`, "_self") //opens addImg.php with userID param
               }
               else if (e == "err") {
                   //runs if an error occurs
                   alert("Error");
               }
               else if(e=="userErr"){
                   //runs if userID already in the DB. Prompt will be showed to continue with the uID or cancel
                   let option = confirm(`Entered User ID is already in the database. Do you wish to add photos to User ID : ${u_id} ?`);
                   (option)?window.open(`./addImg.php?uid=${u_id}`, "_self"):console.log("Canceled") //opens addImg.php with uid para if selected ok
               }
           }
       });
};

//user add button event listener
document.querySelector("#submit").addEventListener('click',()=>{
   (uid.value.length>0 && fname.value.length>0 && lname.value.length>0)?addData(uid.value,fname.value,lname.value):alert("Can not be empty");
});